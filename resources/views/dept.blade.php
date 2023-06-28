@extends('layouts.sidebar')
@section('title', 'Departemen | Jabatan')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
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
                            <div>
                                <a href="dept-add" class="btn btn-primary btn-sm">
                                    <ion-icon name="add-circle-sharp"></ion-icon> add data
                                </a>
                                <a href="dept-deleted" class="btn btn-dark btn-sm">
                                    <ion-icon name="refresh-circle-sharp"></ion-icon> Restore
                                </a>
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
                                        <th>Nama</th>
                                        <th>Staff</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deptList as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="dept-edit/{{ $data->id }}" title="Edit"
                                                    class="btn btn-xs btn-primary">
                                                    <ion-icon name="create-sharp"></ion-icon>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="/dept-destroy/{{ $data->id }}">
                                                    <button class="btn btn-xs btn-danger confirm-delete" title="Delete">
                                                        <ion-icon name="trash-sharp"></ion-icon>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>{{ $data->name }}</td>
                                            <td>
                                                @foreach ($data->workers as $workers)
                                                    {{ $workers['name'] }}
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-2 float-right">
                                {{ $deptList->withQueryString()->links() }}
                            </ul>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
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
                            <div>
                                <a href="positions-add" class="btn btn-primary btn-sm">
                                    <ion-icon name="add-circle-sharp"></ion-icon> add data
                                </a>
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
                                        <th>Nama</th>
                                        <th>Staff</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($positionsList as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="positions-edit/{{ $data->id }}" title="Edit"
                                                    class="btn btn-xs btn-primary">
                                                    <ion-icon name="create-sharp"></ion-icon>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="/positions-destroy/{{ $data->id }}">
                                                    <button class="btn btn-xs btn-danger confirm-delete" title="Delete">
                                                        <ion-icon name="trash-sharp"></ion-icon>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>{{ $data->name }}</td>
                                            <td>
                                                @foreach ($data->workers as $workers)
                                                    {{ $workers['name'] }}
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-2 float-right">
                                {{ $positionsList->withQueryString()->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
