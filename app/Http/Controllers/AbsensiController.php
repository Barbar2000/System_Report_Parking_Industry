<?php

namespace App\Http\Controllers;

USE App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $keyword  = $request->keyword;
        $absensi = Absensi::with(['worker.dept'])
        ->where('tanggal', 'LIKE', '%'.$keyword.'%')
        ->orWhere('jam_absen', 'LIKE', '%'.$keyword.'%')
        ->orWhere('deskripsi', 'LIKE', '%'.$keyword.'%')
        ->orWhereHas('worker', function($query) use($keyword){
            $query->where('name', 'LIKE', '%'.$keyword.'%');
        })
        ->orWhereHas('worker', function($query) use($keyword){
            $query->where('nip', 'LIKE', '%'.$keyword.'%');
        })
        ->orWhereHas('worker.dept', function($query) use($keyword){
            $query->where('name', 'LIKE', '%'.$keyword.'%');
        })->paginate(5);

        return view('absensi', ['absensi' => $absensi]);
    }

    public function masuk()
    {
        $absensi =Absensi::with(['worker.dept'])->get();
        return view('absensi-masuk', ['absensi' => $absensi]);
    }

    public function keluar()
    {
        $absensi =Absensi::with(['worker.dept'])->get();
        return view('absensi-keluar', ['absensi' => $absensi]);
    }

    public function absen(Request $request)
    {
        $date = date('Y-m-d');
        $getWorker = Worker::with('dept')->select('workers.*', 'available_jadwal.name as name_jadwal', 'jadwal.id as jadwal_id')->join('jadwal', function ($query) use($date){
            $query->on('workers.id', '=', 'jadwal.worker_id');
            $query->where([['tanggal_mulai','<=',$date],['tanggal_akhir','>=', $date]]);
        })->join('available_jadwal', 'jadwal.available_jadwal_id', '=', 'available_jadwal.id')->where('nip', '=', $request->nip)->first();
        if(!is_null($getWorker)){
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
}
