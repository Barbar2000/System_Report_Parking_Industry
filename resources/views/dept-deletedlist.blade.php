@extends('layouts.sidebar')
@section('title', 'Departemen | Jabatan')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <a href="dept" class="btn btn-primary btn-xs">
                                    <ion-icon name="arrow-back-outline"></ion-icon> Kembali
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive" style="height: 350px;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th style="width: 10px">Restore</th>
                                        <th>Nama Departemen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dept as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <form action="/dept/{{ $data->id }}/restore">
                                                    <button title="Restore" class="btn btn-xs btn-warning confirm-restore">
                                                        <ion-icon name="refresh-sharp"></ion-icon>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>{{ $data->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <div>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive" style="height: 350px;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th style="width: 10px">Restore</th>
                                        <th>Nama Jabatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($positions as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <form action="/positions/{{ $data->id }}/restore">
                                                    <button title="Restore" class="btn btn-xs btn-warning confirm-restore">
                                                        <ion-icon name="refresh-sharp"></ion-icon>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>{{ $data->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
