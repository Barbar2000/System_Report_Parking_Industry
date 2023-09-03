<?php

namespace App\Http\Controllers;

use App\Events\InputNipEvent;
use App\Models\Absensi;
use App\Models\Available_jadwal;
use App\Models\Dept;
use App\Models\Jadwal;
use App\Models\Worker;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $absensi = Absensi::with(['worker.dept', 'jadwal.available_jadwal'])
            ->where('tanggal', 'LIKE', '%' . $keyword . '%')
            ->orWhere('jam_absen', 'LIKE', '%' . $keyword . '%')
            ->orWhere('deskripsi', 'LIKE', '%' . $keyword . '%')
            ->orWhereHas('worker', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            })
            ->orWhereHas('worker', function ($query) use ($keyword) {
                $query->where('nip', 'LIKE', '%' . $keyword . '%');
            })
            ->orWhereHas('worker.dept', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            })
            ->orWhereHas('jadwal.available_jadwal', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            })
            ->paginate(5);

        return view('absensi', ['absensi' => $absensi]);
    }

    public function masuk()
    {
        $absensi = Absensi::with(['worker.dept'])->get();
        return view('absensi-masuk', ['absensi' => $absensi]);
    }

    public function keluar()
    {
        $absensi = Absensi::with(['worker.dept'])->get();
        return view('absensi-keluar', ['absensi' => $absensi]);
    }

    public function absen(Request $request)
    {
        $date = date('Y-m-d');
        $getWorker = Worker::with('dept')->select('workers.*', 'available_jadwal.name as name_jadwal', 'jadwal.id as jadwal_id')
            ->join('jadwal', function ($query) use ($date) {
             $query->on('workers.id', '=', 'jadwal.worker_id');
             $query->where([['tanggal_mulai', '<=', $date], ['tanggal_akhir', '>=', $date]]);
            })->join('available_jadwal', 'jadwal.available_jadwal_id', '=', 'available_jadwal.id')->where('nip', '=', $request->nip)->first();
        if (!is_null($getWorker)) {
            $time = date('H:i:s');
            $absensi = new Absensi();
            $absensi->worker_id = $getWorker->id;
            $absensi->tanggal = $date;
            $absensi->jam_absen = $time;
            $absensi->deskripsi = $request->type;
            $absensi->jadwal_id = $getWorker->jadwal_id;
            $absensi->save();
            $data['worker'] = $getWorker;
            $data['date'] = $date;
            $data['time'] = $time;
            return response()->json(['message' => "Absen Berhasil", "success" => true, "data" => $data], 200);
        }
        // dd($data);
        return response()->json(['message' => "Jadwal Karyawan Tidak Sesuai", "success" => false, "data" => []], 200);
    }

    public function edit(Request $request, $id)
    {
        $absensi = Absensi::with(['worker', 'jadwal.available_jadwal'])->findOrFail($id);
        //  dd($absensi);
        $absensi->update($request->all());
        return view('absensi-edit', ['absensi' => $absensi]);
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $absensi = Absensi::findOrFail($id);

        $absensi->update($request->all());
        if ($absensi) {
            $notification = array
                (
                'message' => 'Absensi Karyawan Berhasil Diperbarui',
                'alert-type' => 'success',
            );
        }
        return redirect('absensi')->with($notification);
    }

    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->delete();
        if ($absensi) {
            $notification = array
                (
                'message' => 'Data Absensi Karyawan Berhasil Dihapus',
                'alert-type' => 'success',
            );
        }
        return redirect('absensi')->with($notification);
    }

    public function index_report()
    {
        $available_jadwal = Available_jadwal::get();
        $dept = Dept::select('id', 'name')->get();
        // dd($worker);
        return view('absensi-index', ['available_jadwal' => $available_jadwal, 'dept' => $dept]);
    }

    public function report(Request $request)
    {

        $dateStart = $request->tanggal_mulai ?? date('Y-m-d');
        $dateEnd = $request->tanggal_akhir ?? date('Y-m-d');
        $dateRange = new \DatePeriod(
            new \DateTime($dateStart),
            new \DateInterval('P1D'),
            new \DateTime($dateEnd)
        );
        $workers = Worker::with('dept')->select('workers.*')->get();
        $jadwal = array();

        foreach ($workers as $worker) {
            $merge = [];
            $jadwal[$worker->id] = Jadwal::query()
            ->select('jadwal.*', 'available_jadwal.name')
            ->where([['tanggal_akhir', '>=', $dateStart], ['tanggal_mulai', '<=', $dateEnd]])
            ->where('jadwal.worker_id', '=', $worker->id)
            ->join('available_jadwal', 'jadwal.available_jadwal_id', '=', 'available_jadwal.id')
            ->get()->toArray();
            foreach ($jadwal[$worker->id] as $data) {
                $absen = Absensi::query()
                    ->where('jadwal_id', '=', $data['id'])
                    ->where('worker_id', '=', $worker->id)
                    ->get()->toArray();
                $data['absen'] = $absen;
                $merge[] = $data;
            }
            $jadwal[$worker->id] = $merge;
        }
        $data = [
            'dateRange' => $dateRange,
            'workers' => $workers,
            'jadwal' => $jadwal,
        ];
        return view('absensi-report', $data);
    }

    public function upload(Request $request)
    {
        $nip = $request->nip;

        event(new InputNipEvent($nip));
        $date = date('Y-m-d');
        $getWorker = Worker::with('dept')->join('jadwal', function ($query) use ($date) {
            $query->on('workers.id', '=', 'jadwal.worker_id');
            $query->where([['tanggal_mulai', '<=', $date], ['tanggal_akhir', '>=', $date]]);
        })->join('available_jadwal', 'jadwal.available_jadwal_id', '=', 'available_jadwal.id')->where('nip', '=', $nip)->exists();

        if ($getWorker) {
            return response("NIP valid", 200);
        }

        return response("NIP invalid", 404);
    }
}
