@extends('layouts.sidebar')
@section('title', 'Karyawan')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
        </div><!-- /.container-fluid -->
    </section>
    {{-- <p> {{$workerList}};</p> --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 300px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a href="workers" class="btn btn-primary btn-sm">
                                    <ion-icon name="arrow-back-outline"></ion-icon> Kembali
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive" style="height: 300px;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th style="width: 10px">Restore</th>
                                        <th style="width: 40px">NIP</th>
                                        <th>Nama</th>
                                        <th style="width: 40px">Gender</th>
                                        <th>Departemen</th>
                                        <th>Jabatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($worker as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <form action="/worker/{{ $data->id }}/restore">
                                                    <button title="Restore" class="btn btn-xs btn-warning confirm-restore">
                                                        <ion-icon name="refresh-sharp"></ion-icon>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>{{ $data->nip }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>
                                                @if ($data->gender == 'P')
                                                    <span class="badge bg-danger">P</span>
                                                @else
                                                    <span class="badge bg-primary">L</span>
                                                @endif
                                            </td>
                                            <td>{{ $data->dept['name'] }}</td>
                                            <td>{{ $data->positions['name'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">


                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card-body -->

                @endsection
