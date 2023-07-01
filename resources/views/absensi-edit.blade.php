@extends('layouts.sidebar')
@section('title', 'Edit Absensi Karyawan')
@section('content')
    {{-- {{$absensi->jadwal->available_jadwal->name}} --}}
    <section class="content-header">
        <div class="container-fluid">
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h1 style="width: 150px;"> </h1>
                    </div>
                    <form action="/absensi-karyawan-update-{{ $absensi->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body" style="height: 400px;">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input name="" type="text" class="form-control" id=""
                                    value="{{ $absensi->worker->nip }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Karyawan</label>
                                <input name="" type="text" class="form-control" id=""
                                    value="{{ $absensi->worker->name }}" readonly>
                            </div>
                            <div class="row">
                                <div class="form-group col-5">
                                    <label for="tanggal">Tanggal</label>
                                    <input name="tanggal" type="date" class="form-control" id="tanggal"
                                        value="{{ $absensi->tanggal }}" required>
                                </div>
                                <div class="form-group col-5">
                                    <label for="Tanggal">Jam Absen</label>
                                    <input name="jam_absen" type="time" class="form-control" id="jam_absen"
                                        value="{{ $absensi->jam_absen }}" required>
                                </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-5">
                                <label for="">Deskripsi</label>
                                <select name="deskripsi" class="custom-select rounded-0" id="deskripsi" required>
                                    <option value="{{ $absensi->deskripsi }}">
                                        @if ($absensi->deskripsi == 'masuk')
                                            MASUK
                                        @else
                                            KELUAR
                                        @endif
                                    </option>
                                    @if ($absensi->deskripsi == 'masuk')
                                        <option value="keluar">KELUAR</option>
                                    @else
                                        <option value="masuk">MASUK</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-5">
                                <label for="nip">Jadwal</label>
                                <input name="" type="text" class="form-control" id=""
                                    value="{{ $absensi->jadwal->available_jadwal->name }}" readonly>
                            </div>
                            </div>
                        </div>
                        <div class="card-footer float-right">
                            <button type="submit" class="btn btn-success">Update Jadwal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
