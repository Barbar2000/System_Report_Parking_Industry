@extends('layouts.sidebar')
@section('title', 'Tambah Jabatan')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <h3>Tambah Jabatan Baru</h3>
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
                    <form action="positions-add-save" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama Jabatan</label>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Nama Jabatan" required>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer float-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
