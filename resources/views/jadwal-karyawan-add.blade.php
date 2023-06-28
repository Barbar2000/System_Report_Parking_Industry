@extends('layouts.sidebar')
@section('title', 'Input Jadwal Karyawan')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
        </div>
        <!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-tools">
                                    <form action="" method="get">
                                        <div class="input-group" style="width: 300px;">
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
                                <form action="jadwal-karyawan-save" method="POST" name="form_jadwal" id="form_jadwal">
                                    @csrf
                                    <div class="row">
                                        <div class="input-group col-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Tanggal Mulai</span>
                                            </div>
                                            <input name="tanggal_mulai" id="tanggal_mulai" type="date" class="form-control"
                                                required>
                                        </div>
                                        <div class="input-group col-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Tanggal Akhir</span>
                                            </div>
                                            <input name="tanggal_akhir" id="tanggal_akhir" type="date" class="form-control"
                                                   required>
                                        </div>
                                        <div class="input-group col-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Jadwal</span>
                                            </div>
                                            <select name="available_jadwal_id" class="custom-select rounded-0"
                                                id="available_jadwal_id" required>
                                                <option value="">Pilih Salah Satu</option>
                                                @foreach ($available_jadwal as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                            </div>


                            <div class="card-body table-responsive" style="height: 370px;">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" name="" id="select_all_ids"></th>
                                            <th style="width: 10px">No</th>
                                            <th style="width: 40px">NIP</th>
                                            <th>Nama</th>
                                            <th>Departemen</th>
                                            <th>Jabatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($worker as $data)
                                            <tr id="worker_ids{{$data->id}}">
                                                <td style="width: 40px; font-size: 20px;" class="center-align"><input
                                                        type="checkbox" name="worker_id[]" value="{{ $data->id }}"
                                                        id="ids" class="checkbox_ids"></td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->nip }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->dept['name'] }}</td>
                                                <td>{{ $data->positions['name'] }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success btn-sm" id="createAllSelectedRecord"><i class="fas fa-save"></i>
                                    SIMPAN</button>
                                </form>
                                <label> </label>
                                <a href="jadwal" class="btn btn-outline-dark btn-sm"><i class="fas fa-times-circle"></i>
                                    BATAL</a>
                                <ul class="pagination pagination-sm m-2 float-right">
                                    {{ $worker->withQueryString()->links() }}
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script>
        $(function (e) {
            $('#select_all_ids').click(function() {
                $('.checkbox_ids').prop('checked',$(this).prop('checked'));
            });

            // $('#createAllSelectedRecord').click(function(e){
            //     e.preventDefault();
            //     var all_ids = [];
            //     $('input:checkbox[name=ids]:checked').each(function(){
            //         all_ids.push($(this).val());
            //     });

            //     $.ajax({
            //         url:"{{route('worker.create')}}",
            //         type:"POST",
            //         data:{
            //             ids:all_ids
            //         },
            //         success:function(response){
            //             $.each(all_ids,function(key,val){
            //                 $('worker_ids'+val).save();
            //             })
            //         }
            //     });
            // });
        });
    </script>
@endsection
