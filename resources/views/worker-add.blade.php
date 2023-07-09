@extends('layouts.sidebar')
@section('title', 'Tambah Karyawan')
@section('content')
    <section class="content-header">
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h1> </h1>
                        </div>
                        <form action="worker-add-save" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input name="nip" type="text" class="form-control" id="nip"
                                        placeholder="IKD0051" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input name="name" type="text" class="form-control" id="name"
                                        placeholder="Nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select name="gender" class="custom-select rounded-0" id="gender" required>
                                        <option value="">Pilih Salah Satu</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="dept">Departemen</label>
                                        <select name="dept_id" class="custom-select rounded-0" id="dept" required>
                                            <option value="">Pilih Salah Satu</option>
                                            @foreach ($dept as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="positions">Jabatan</label>
                                        <select name="positions_id" class="custom-select rounded-0" id="positions" required>
                                            <option value="">Pilih Salah Satu</option>
                                            @foreach ($positions as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer float-right">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
