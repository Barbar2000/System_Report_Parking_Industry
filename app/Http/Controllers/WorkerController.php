<?php

namespace App\Http\Controllers;

use App\Models\Dept;
use App\Models\Positions;
use App\Models\worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index(Request $request)
    {
        $keyword  = $request->keyword;

        $worker = Worker::with(['dept', 'positions'])
        ->where('name', 'LIKE', '%'.$keyword.'%')
        ->orWhere('nip', 'LIKE', '%'.$keyword.'%')
        ->orWhereHas('dept', function($query) use($keyword){
            $query->where('name', 'LIKE', '%'.$keyword.'%');
        })
        ->orWhereHas('positions', function($query) use($keyword){
            $query->where('name', 'LIKE', '%'.$keyword.'%');
        })
        ->paginate(5);

        return view('worker', ['workerList' => $worker]);
    }

    public function create()
    {
        $dept = Dept::select('id', 'name')->get();
        $positions = Positions::select('id', 'name')->get();
        return view('worker-add', ['dept' => $dept, 'positions' => $positions]);
    }

    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'nip' => 'unique:worker'
        // ]);
        // dd($request->all());
        $worker = Worker::create($request->all());
        if ($worker)
        {
            $notification=array
            (
                'message'=>'Data Karyawan Berhasil Ditambahkan',
                'alert-type'=>'success'
            );
        }
        return redirect('workers')->with($notification);
    }

    public function edit(Request $request, $id)
    {
        // dd($id);
        $worker = Worker::with(['dept', 'positions'])->findOrFail($id);
        // dd($worker);

        $dept = Dept::where('id','!=', $worker->dept_id)->get(['id', 'name']);
        $positions = Positions::where('id','!=', $worker->positions_id)->get(['id', 'name']);
        return view('worker-edit', ['worker' => $worker, 'dept'=> $dept, 'positions' => $positions]);
    }

    public function update(Request $request, $id)
    {
        // dd($id);
        $worker = Worker::findOrFail($id);
        // dd($worker);
        $worker->update($request->all());
        if ($worker)
        {
            $notification=array
            (
                'message'=>'Data Karyawan Berhasil Diperbarui',
                'alert-type'=>'success'
            );
        }
        return redirect('workers')->with($notification);
    }

    public function destroy($id)
    {
        // dd($id);
        $worker = Worker::findOrFail($id);
        $worker->delete();
        if ($worker)
        {
            $notification=array
            (
                'message'=>'Data Karyawan Berhasil Dihapus',
                'alert-type'=>'success'
            );
        }
        return redirect('workers')->with($notification);
    }
    public function deletedWorker()
    {
        $worker  = Worker::onlyTrashed()->get();
        return view('worker-deletedlist', ['worker' => $worker]);

    }

    public function restore($id)
    {
        $worker = Worker::withTrashed()->where('id', $id)->restore();
        if ($worker)
        {
            $notification=array
            (
                'message'=>'Data Karyawan Berhasil Dipulihkan',
                'alert-type'=>'success'
            );
        }
        return redirect('workers')->with($notification);
    }
}
