@extends('layouts.sidebar')
@section('title', 'Tambah Jadwal')
@section('content')
    {{-- {{$available_jadwal}} --}}
    <section class="content-header">
        <div class="container-fluid">
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <form action="" method="get">
                                    <div class="input-group input-group-sm" style="width: 150px;">
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
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive" style="height: 400px;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th style="width: 10px">Edit</th>
                                        <th style="width: 10px">Del</th>
                                        <th>Nama Jadwal</th>
                                        <th>Jam Mulai</th>
                                        <th>Jam Selesai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($available_jadwal as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="/jadwal-edit-{{ $data->id }}" title="Edit" class="btn btn-xs btn-primary">
                                                    <ion-icon name="create-sharp"></ion-icon>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="/jadwal-destroy-{{ $data->id }}">
                                                    <button class="btn btn-xs btn-danger confirm-delete" title="Delete">
                                                        <ion-icon name="trash-sharp"></ion-icon>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>{{ $data->name }}</td>
                                            @if (is_null($data->jam_mulai))
                                                <td><span>-</span></td>
                                            @else
                                                <td>{{ $data->jam_mulai }}</td>
                                            @endif
                                            @if (is_null($data->jam_mulai))
                                                <td><span>-</span></td>
                                            @else
                                                <td>{{ $data->jam_selesai }}</< /td>
                                            @endif

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-2 float-right">
                                {{ $available_jadwal->withQueryString()->links() }}
                            </ul>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header" >
                            <h1 style="width: 150px;"> </h1>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form action="jadwal-add-save" method="POST">
                            @csrf
                            <div class="card-body" style="height: 400px;">
                                <div class="form-group">
                                    <label for="name">Nama Jadwal Baru</label>
                                    <input name="name" type="text" class="form-control" id="name"
                                        placeholder="Nama Jadwal" style="text-transform: uppercase" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Jam Mulai</label>
                                    <input name="jam_mulai" type="time" class="form-control" id="jam_mulai">
                                </div>
                                <div class="form-group">
                                    <label for="name">Jam Selesai</label>
                                    <input name="jam_selesai" type="time" class="form-control" id="jam_selesai">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer float-right">
                                <button type="submit" class="btn btn-primary">Tambah Jadwal Baru</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
