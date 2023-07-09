@extends('layouts.sidebar')
@section('title', 'Reset Password')
@section('content')
{{-- {{$dept}} --}}
    <section class="content-header">
        <div class="container-fluid">
            <h3></h3>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h1> </h1>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/reset-password-save" method="post">
                            @csrf
                            <div class="card-body" style="height: 350px;">
                                <div class="form-group">
                                    <label for="oldpassword">Password Lama</label>
                                    <input name="old_password" type="password" class="form-control" id="oldpassword"
                                        value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="newpassword">Password Baru</label>
                                    <input name="new_password" type="password" class="form-control" id="newpassword"
                                        value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="repeatpassword">Konfirmasi Password</label>
                                    <input name="repeat_password" type="password" class="form-control" id="repeatpassword"
                                        value="" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer float-right">
                                <button type="submit" class="btn btn-success">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
