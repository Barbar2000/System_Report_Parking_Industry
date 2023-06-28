@extends('layouts.sidebar')
@section('title', 'Edit Karyawan')
@section('content')
    <section class="content-header">
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h1> </h1>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/worker-update/{{$worker->id}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input name="name" type="text" class="form-control" id="name"
                                        value="{{ $worker->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select name="gender" class="custom-select rounded-0" id="gender" required>
                                        <option value="{{ $worker->gender }}">
                                            @if ($worker->gender == 'L')
                                                Laki-laki
                                            @else
                                                Perempuan
                                            @endif
                                        </option>
                                        @if ($worker->gender == 'L')
                                            <option value="P">Perempuan</option>
                                        @else
                                            <option value="L">Laki-laki</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="dept">Departemen</label>
                                    <select name="dept_id" class="custom-select rounded-0" id="dept" required>
                                        <option value="{{ $worker->dept->id }}">{{ $worker->dept->name }}</option>
                                        @foreach ($dept as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="positions">Jabatan</label>
                                    <select name="positions_id" class="custom-select rounded-0" id="positions" required>
                                        <option value="{{ $worker->positions->id }}">{{ $worker->positions->name }}
                                        </option>
                                        @foreach ($positions as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer float-right">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
