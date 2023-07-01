@extends('layouts.sidebar')
@section('title', 'Edit Jadwal Karyawan')
@section('content')
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
                    <form action="/jadwal-karyawan-update-{{ $jadwal->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body" style="height: 400px;">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input name="" type="text" class="form-control" id=""
                                    value="{{ $jadwal->worker->nip }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Karyawan</label>
                                <input name="" type="text" class="form-control" id=""
                                    value="{{ $jadwal->worker->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input name="tanggal" type="date" class="form-control" id="tanggal"
                                    value="{{ $jadwal->tanggal }}" required>
                            </div>
                            <div class="form-group">
                                <label for="Tanggal">Tanggal</label>
                                <select name="available_jadwal_id" class="custom-select rounded-0" id="available_jadwal_id" required>
                                    <option value="{{ $jadwal->available_jadwal->id }}">
                                        {{ $jadwal->available_jadwal->name }}</option>
                                    @foreach ($available_jadwal as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
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
