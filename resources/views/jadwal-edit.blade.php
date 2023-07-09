@extends('layouts.sidebar')
@section('title', 'Edit Jadwal')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h1 style="width: 150px;"> </h1>
                    </div>
                    <!-- form start -->
                    <form action="/jadwal-update-{{ $available_jadwal->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body" style="height: 350px;">
                            <div class="form-group">
                                <label for="name">Ubah Nama Jadwal</label>
                                <input name="name" type="text" class="form-control" id="name"
                                    value="{{ $available_jadwal->name }}" style="text-transform: uppercase" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Jam Mulai</label>
                                <input name="jam_mulai" type="time" class="form-control" id="jam_mulai"
                                    value="{{ $available_jadwal->jam_mulai }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Jam Selesai</label>
                                <input name="jam_selesai" type="time" class="form-control" id="jam_selesai"
                                    value="{{ $available_jadwal->jam_selesai }}">
                            </div>
                        </div>
                         <!-- /.card-body -->
                        <div class="card-footer float-right">
                            <button type="submit" class="btn btn-success">Update Jadwal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
