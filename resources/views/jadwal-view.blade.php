@extends('layouts.sidebar')
@section('title', 'Schedule Karyawan')
@section('content')
    {{-- {{$jadwal}} --}}
    <section class="content-header">
        <div class="container-fluid">
        </div>
        <!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <form action="" method="get">
                                    <div class="input-group input-group-sm" style="width: 300px;">
                                        <input type="text" name="keyword" class="form-control float-right"
                                            placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div>
                                {{-- <a href="absensi-masuk" class="btn btn-primary btn-sm">
                                    <ion-icon name="add-circle-sharp"></ion-icon> add data
                                </a> --}}
                                {{-- <a href="worker-deleted" class="btn btn-dark btn-sm">
                                    <ion-icon name="refresh-circle-sharp"></ion-icon> Restore
                                </a> --}}
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive" style="height: 350px;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th style="width: 10px">Edit</th>
                                        <th style="width: 10px">Del</th>
                                        <th style="width: 40px">NIP</th>
                                        <th>Nama</th>
                                        <th>Departemen</th>
                                        <th>Tanggal</th>
                                        <th>Jadwal Kerja</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadwal as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="/jadwal-karyawan-edit-{{$data->id}}" title="Edit" class="btn btn-xs btn-primary">
                                                    <ion-icon name="create-sharp"></ion-icon>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="#">
                                                    <button class="btn btn-xs btn-danger confirm-delete" title="Delete">
                                                        <ion-icon name="trash-sharp"></ion-icon>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>{{$data->worker->nip}}</td>
                                            <td>{{$data->worker->name}}</td>
                                            <td>{{$data->worker->dept->name}}</td>
                                            <td>{{$data->tanggal}}</td>
                                            <td>{{$data->available_jadwal->name}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">


                            <ul class="pagination pagination-sm m-2 float-right">
                                {{$jadwal->withQueryString()->links()}}
                            </ul>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
