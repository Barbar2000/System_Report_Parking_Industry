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
                                @if (Auth::user()->id !=1)
                                <a href="worker-add" class="btn btn-primary btn-sm disabled">
                                    <ion-icon name="add-circle-sharp"></ion-icon> add data
                                </a>
                                <a href="worker-deleted" class="btn btn-dark btn-sm disabled">
                                    <ion-icon name="refresh-circle-sharp"></ion-icon> Restore
                                </a>
                                @else
                                <a href="worker-add" class="btn btn-primary btn-sm">
                                    <ion-icon name="add-circle-sharp"></ion-icon> add data
                                </a>
                                <a href="worker-deleted" class="btn btn-dark btn-sm">
                                    <ion-icon name="refresh-circle-sharp"></ion-icon> Restore
                                </a>
                                @endif

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
                                        <th style="width: 40px">Gender</th>
                                        <th>Departemen</th>
                                        <th>Jabatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($workerList as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            @if (Auth::user()->id !=1)
                                            <td><a href="#" title="Edit"
                                                class="btn btn-xs btn-primary disabled">
                                                <ion-icon name="create-sharp"></ion-icon>
                                            </a>
                                            </td>
                                            <td>
                                                <form action="">
                                                    <button class="btn btn-xs btn-danger confirm-delete disabled" title="Delete">
                                                        <ion-icon name="trash-sharp"></ion-icon>
                                                    </button>
                                                </form>
                                            </td>
                                            @else
                                            <td><a href="/worker-edit-{{ $data->id }}" title="Edit"
                                                    class="btn btn-xs btn-primary">
                                                    <ion-icon name="create-sharp"></ion-icon>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="/worker-destroy/{{ $data->id }}">
                                                    <button class="btn btn-xs btn-danger confirm-delete" title="Delete">
                                                        <ion-icon name="trash-sharp"></ion-icon>
                                                    </button>
                                                </form>
                                            </td>
                                            @endif
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
                            <ul class="pagination pagination-sm m-2 float-right">
                                {{ $workerList->withQueryString()->links() }}
                            </ul>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
