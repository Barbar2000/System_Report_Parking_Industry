<?php

namespace App\Http\Controllers;

USE App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\Status;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with(['worker.dept','jadwal'])->paginate(5);
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
            if($request->type == 'absen_masuk'){
                $absensi = new Absensi();
                $absensi->worker_id = $getWorker->id;
                $absensi->tanggal = $date;
                $absensi->jadwal_id = $getWorker->jadwal_id;
                $absensi->save();

                $status = new Status();
                $status->absensi_id = $absensi->id;
                $status->jam_absen = date('H:i:s');
                $status->deskripsi = "masuk";
                $status->save();
            }
            $data['worker'] = $getWorker;
            return response()->json(['message' => "Absen Berhasil", "success" => true, "data" => $data], 200);
        }
        // dd($data);
         return response()->json(['message' => "nip tidak ditemukan", "success" => false, "data" => []], 200);
    }
}
