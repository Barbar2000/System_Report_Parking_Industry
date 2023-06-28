<?php

namespace App\Http\Controllers;

use App\Models\Available_jadwal;
use App\Models\Jadwal;
use App\Models\Worker;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        return view('jadwal');
        // dd($jadwal);
    }

    public function view_jadwal()
    {
        $jadwal = Jadwal::with(['worker.dept', 'available_jadwal'])->paginate(5);
        return view('jadwal-view', ['jadwal' => $jadwal]);
        // dd($jadwal);
    }

    public function create()
    {
        $available_jadwal = Available_jadwal::paginate(6);

        return view('jadwal-add', ['available_jadwal' => $available_jadwal]);
    }

    public function store(Request $request)
    {
        $jadwal = Available_jadwal::create($request->all());
        if ($jadwal) {
            $notification = array
                (
                'message' => 'Jadwal Berhasil Ditambahkan',
                'alert-type' => 'success',
            );
        }
        return redirect('jadwal-add')->with($notification);
    }

    public function edit(Request $request, $id)
    {
        //  dd($id);
        $available_jadwal = Available_jadwal::findOrFail($id);
        //  dd($jadwal);
        $available_jadwal->update($request->all());
        return view('jadwal-edit', ['available_jadwal' => $available_jadwal]);
    }

    public function update(Request $request, $id)
    {
        // dd($id);
        $available_jadwal = Available_jadwal::findOrFail($id);
        // dd($available_jadwal);
        $available_jadwal->update($request->all());
        if ($available_jadwal) {
            $notification = array
                (
                'message' => 'Data Jadwal Berhasil Diperbarui',
                'alert-type' => 'success',
            );
        }
        return redirect('jadwal-add')->with($notification);
    }

    public function destroy($id)
    {
        $jadwal = Available_jadwal::findOrFail($id);
        $jadwal->delete();
        if ($jadwal) {
            $notification = array
                (
                'message' => 'Data Jadwal Berhasil Dihapus',
                'alert-type' => 'success',
            );
        }
        return redirect('jadwal-add')->with($notification);
    }

    public function create_jadwal_karyawan(Request $request)
    {
        $available_jadwal = Available_jadwal::get();
        $keyword = $request->keyword;
        $worker = Worker::with(['dept', 'positions'])
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('nip', 'LIKE', '%' . $keyword . '%')
            ->orWhereHas('dept', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            })
            ->orWhereHas('positions', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            })->paginate(5);
        return view('jadwal-karyawan-add', ['worker' => $worker, 'available_jadwal' => $available_jadwal]);
    }

    public function store_jadwal_karyawan(Request $request)
    {
//        dd($request);
        $workers = $request->worker_id;
        foreach ($workers as $worker){
            $jadwal = new Jadwal;
            $jadwal->tanggal_mulai = $request->tanggal_mulai;
            $jadwal->tanggal_akhir = $request->tanggal_akhir;
            $jadwal->available_jadwal_id = $request->available_jadwal_id;
            $jadwal->worker_id = $worker;
            $jadwal->save();
        }
        $notification = array
        (
            'message' => 'Jadwal Karyawan Berhasil Ditambahkan',
            'alert-type' => 'success',
        );
        return redirect('jadwal-karyawan-add')->with($notification);

        // $ids = $request->ids;
        // Jadwal::whereIn('id',$ids)->save();
        // return response()->json(["success"=>"Jadwal have been created!"]);
    }

    public function edit_jadwal_karyawan(Request $request, $id)
    {
        $jadwal = Jadwal::with(['worker', 'available_jadwal'])->findOrFail($id);

        $worker = Worker::where('id', '!=', $jadwal->worker_id)->get(['id', 'name']);
        $available_jadwal = Available_jadwal::where('id', '!=', $jadwal->available_jadwal_id)->get(['id', 'name']);
        return view('jadwal-karyawan-edit', ['jadwal' => $jadwal, 'worker' => $worker, 'available_jadwal' => $available_jadwal]);
    }

    public function update_jadwal_karyawan(Request $request, $id)
    {

        $jadwal = Jadwal::findOrFail($id);

        $jadwal->update($request->all());
        if ($jadwal) {
            $notification = array
                (
                'message' => 'Jadwal Karyawan Berhasil Diperbarui',
                'alert-type' => 'success',
            );
        }
        return redirect('jadwal-karyawan')->with($notification);
    }
}
