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
                                @if (Auth::user()->id != 1)
                                    <a href="dept-add" class="btn btn-primary btn-sm disabled">
                                        <ion-icon name="add-circle-sharp"></ion-icon> add data
                                    </a>
                                    <a href="dept-deleted" class="btn btn-dark btn-sm disabled">
                                        <ion-icon name="refresh-circle-sharp"></ion-icon> Restore
                                    </a>
                                @else
                                    <a href="dept-add" class="btn btn-primary btn-sm">
                                        <ion-icon name="add-circle-sharp"></ion-icon> add data
                                    </a>
                                    <a href="dept-deleted" class="btn btn-dark btn-sm">
                                        <ion-icon name="refresh-circle-sharp"></ion-icon> Restore
                                    </a>
                                @endif
                            </div>
                        </div>
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
                                            @if (Auth::user()->id != 1)
                                                <td><a href="dept-edit-{{ $data->id }}" title="Edit"
                                                        class="btn btn-xs btn-primary disabled">
                                                        <ion-icon name="create-sharp"></ion-icon>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="/dept-destroy/{{ $data->id }}">
                                                        <button class="btn btn-xs btn-danger confirm-delete disabled"
                                                            title="Delete">
                                                            <ion-icon name="trash-sharp"></ion-icon>
                                                        </button>
                                                    </form>
                                                </td>
                                            @else
                                                <td><a href="dept-edit-{{ $data->id }}" title="Edit"
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
                                            @endif
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
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-2 float-right">
                                {{ $deptList->withQueryString()->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                @if (Auth::user()->id != 1)
                                    <a href="positions-add" class="btn btn-primary btn-sm disabled">
                                        <ion-icon name="add-circle-sharp"></ion-icon> add data
                                    </a>
                                @else
                                    <a href="positions-add" class="btn btn-primary btn-sm">
                                        <ion-icon name="add-circle-sharp"></ion-icon> add data
                                    </a>
                                @endif
                            </div>
                        </div>
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
                                            @if (Auth::user()->id != 1)
                                                <td><a href="positions-edit-{{ $data->id }}" title="Edit"
                                                        class="btn btn-xs btn-primary disabled">
                                                        <ion-icon name="create-sharp"></ion-icon>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="/positions-destroy/{{ $data->id }}">
                                                        <button class="btn btn-xs btn-danger confirm-delete disabled" title="Delete">
                                                            <ion-icon name="trash-sharp"></ion-icon>
                                                        </button>
                                                    </form>
                                                </td>
                                            @else
                                                <td><a href="positions-edit-{{ $data->id }}" title="Edit"
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
                                            @endif
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
