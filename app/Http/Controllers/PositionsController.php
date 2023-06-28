<?php

namespace App\Http\Controllers;

use App\Models\Positions;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
      public function index()
    {
        $positions = Positions::with(['workers'])->get();

        return view('positions', ['positionsList' => $positions]);
    }

    public function create()
    {
        $positions = Positions::select('id','name')->get();
        return view ('positions-add',['positions'=>$positions]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $positions = Positions::create($request->all());
        if ($positions)
        {
            $notification=array
            (
                'message'=>'Nama Jabatan Berhasil Ditambahkan',
                'alert-type'=>'success'
            );
        }
        return redirect('dept')->with($notification);
    }

    public function edit(Request $request, $id)
    {
        // dd($id);
        $positions = Positions::findOrFail($id);
        // dd($positions);
        $positions->update($request->all());
        return view('positions-edit', ['positions'=> $positions]);
    }

    public function update(Request $request, $id)
    {
        // dd($id);
        $positions = Positions::findOrFail($id);
        // dd($positions);
        $positions->update($request->all());
        if ($positions)
        {
            $notification=array
            (
                'message'=>'Nama Jabatan Berhasil Diperbarui',
                'alert-type'=>'success'
            );
        }
        return redirect('dept')->with($notification);
    }

    public function destroy($id)
    {
        // dd($id);
        $positions = Positions::findOrFail($id);
        $positions->delete();
        if ($positions)
        {
            $notification=array
            (
                'message'=>'Data Jabatan Berhasil Dihapus',
                'alert-type'=>'success'
            );
        }
        return redirect('dept')->with($notification);
    }

    public function restore($id)
    {
        $positions = Positions::withTrashed()->where('id', $id)->restore();
        if ($positions)
        {
            $notification=array
            (
                'message'=>'Data Jabatan Berhasil Dipulihkan',
                'alert-type'=>'success'
            );
        }
        return redirect('dept')->with($notification);
    }
}
