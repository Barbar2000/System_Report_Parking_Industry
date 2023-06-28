<?php

namespace App\Http\Controllers;

use App\Models\Dept;
use App\Models\Positions;
use Illuminate\Http\Request;

class DeptController extends Controller
{
    public function index(Request $request)
    {
        $keyword  = $request->keyword;
        $dept = Dept::with(['workers'])->where('name', 'LIKE', '%'.$keyword.'%')->paginate(5);
        $positions = Positions::with(['workers'])->where('name', 'LIKE', '%'.$keyword.'%')->paginate(5);
        return view('dept', ['deptList' => $dept, 'positionsList' => $positions]);
    }

    public function create()
    {
        $dept = Dept::select('id','name')->get();
        return view ('dept-add',['dept'=>$dept]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $dept = Dept::create($request->all());
        if ($dept)
        {
            $notification=array
            (
                'message'=>'Nama Departemen Berhasil Ditambahkan',
                'alert-type'=>'success'
            );
        }
        return redirect('dept')->with($notification);
    }

    public function edit(Request $request, $id)
    {
        // dd($id);
        $dept = Dept::findOrFail($id);
        // dd($dept);
        $dept->update($request->all());
        return view('dept-edit', ['dept'=> $dept]);
    }

    public function update(Request $request, $id)
    {
        // dd($id);
        $dept = Dept::findOrFail($id);
        // dd($dept);
        $dept->update($request->all());
        if ($dept)
        {
            $notification=array
            (
                'message'=>'Nama Departemen Berhasil Diperbarui',
                'alert-type'=>'success'
            );
        }
        return redirect('dept')->with($notification);
    }

    public function destroy($id)
    {
        // dd($id);
        $dept = Dept::findOrFail($id);
        $dept->delete();
        if ($dept)
        {
            $notification=array
            (
                'message'=>'Data Departemen Berhasil Dihapus',
                'alert-type'=>'success'
            );
        }
        return redirect('dept')->with($notification);
    }

    public function deletedDept()
    {
        $dept  = Dept::onlyTrashed()->get();
        $positions = Positions::onlyTrashed()->get();
        return view('dept-deletedlist', ['dept' => $dept, 'positions' => $positions]);

    }

    public function restore($id)
    {
        $dept = Dept::withTrashed()->where('id', $id)->restore();
        if ($dept)
        {
            $notification=array
            (
                'message'=>'Data Departemen Berhasil Dipulihkan',
                'alert-type'=>'success'
            );
        }
        return redirect('dept')->with($notification);
    }
}
