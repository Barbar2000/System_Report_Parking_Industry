@extends('layouts.sidebar')
@section('title', 'Edit Departemen')
@section('content')
{{-- {{$dept}} --}}
    <section class="content-header">
        <div class="container-fluid">
            <h3>Edit Departemen</h3>
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
                        <form action="/dept-update/{{$dept->id}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Departemen</label>
                                    <input name="name" type="text" class="form-control" id="name"
                                        value="{{ $dept->name }}" required>
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
