<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function resetpassword()
    {
        return view('layouts.reset-password');
    }

    public function resetpost(Request $request)
    {
        if(!Hash::check($request->old_password, auth()->user()->password)){
            {
                $cekpassword=array
                (
                    'message'=>'Password lama yang anda masukkan tidak sesuai !',
                    'alert-type'=>'error'
                );
            }
            return back()->with($cekpassword);
        }

        if($request->new_password != $request->repeat_password){
            {
                $cekrepeat=array
                (
                    'message'=>'Password Baru dan Konfirmasi Password yang anda masukkan tidak sama !',
                    'alert-type'=>'error'
                );
            }
            return back()->with($cekrepeat);
        }
        auth()->user()->update(['password' => Hash::make($request->new_password)]);
        {
            $notification=array
            (
                'message'=>'Password berhasil diubah !',
                'alert-type'=>'success'
            );
        }
        return back()->with($notification);

    }
}
