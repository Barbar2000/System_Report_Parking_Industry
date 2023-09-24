@extends('layouts.sidebar')
@section('title', 'Report Absensi')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <form action="/report-absensi" method="get">
                                <div class="card-header">
                                    <div class="card-tools">
                                    </div>
                                    <div class="row">
                                        <div class="input-group col-6">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Tanggal Mulai</span>
                                            </div>
                                            <input name="tanggal_mulai" id="tanggal_mulai" type="date"
                                                class="form-control" required>
                                        </div>
                                        <div class="input-group col-6">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Tanggal Akhir</span>
                                            </div>
                                            <input name="tanggal_akhir" id="tanggal_akhir" type="date"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body table-responsive" style="height: 350px;">
                                    <div class="input-group col-12">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 110px">NIP </span>
                                        </div>
                                        <input name="nip" type="text" class="form-control" id="nip"
                                            style="text-transform: uppercase" placeholder="ALL">
                                    </div>
                                    <br>
                                    <div class="input-group col-12">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 110px">Nama </span>
                                        </div>
                                        <input name="name" type="text" class="form-control" id="name"
                                            style="text-transform: uppercase" placeholder="ALL">
                                    </div>
                                    <br>
                                    <div class="input-group col-12">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 110px">Departemen</span>
                                        </div>
                                        <select name="dept" class="custom-select rounded-0" id="dept">
                                            <option value="">ALL</option>
                                            @foreach ($dept as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                    <div class="input-group col-12">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 110px">Jadwal</span>
                                        </div>
                                        <select name="available_jadwal_id" class="custom-select rounded-0"
                                            id="available_jadwal_id">
                                            <option value="">
                                                ALL</option>
                                            @foreach ($available_jadwal as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>

                                </div>
                                <div class="card-footer float-right">
                                    <button type="submit" class="btn btn-success btn-sm" style="width: 100px">View</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
