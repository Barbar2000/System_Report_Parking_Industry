@extends('layouts.sidebar')
@section('title', 'Absensi Karyawan')
@section('content')
{{-- {{$hasil}} --}}

<section class="content-header">
        <div class="container-fluid">
        </div>
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
                            </div>
                        </div>

                        <div class="card-body table-responsive" style="height: 80vh;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th style="width: 40px">NIP</th>
                                        <th>Nama</th>
                                        <th>Departemen</th>
                                        @foreach($dateRange as $value)
                                        <th>{{$value->format('Y-m-d')}}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no = 0; ?>
                                @foreach($workers as $worker)
                                    <?php $no++ ?>
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$worker->nip}}</td>
                                        <td>{{$worker->name}}</td>
                                        <td>{{$worker->dept->name}}</td>
                                        @foreach($dateRange as $value)
                                           @if(count($jadwal[$worker->id]) > 0)
{{--                                               @foreach($jadwal[$worker->id] as $absen)--}}
                                                <?php
                                                    $absens = collect($jadwal[$worker->id])->where('tanggal_mulai', '=', $value->format('Y-m-d'))->orWhere('tanggal_akhir', '=', $value->format('Y-m-d'));
                                                    ?>
                                                   @if(!is_null($absens))
                                                   <td>
                                                       @foreach($absens as $absen)
                                                           {{ $absen['deskripsi'] == 'masuk' ? $absen['jam_absen'] : $absen['jam_absen'] }}
                                                       @endforeach
                                                   </td>
                                                   @else
                                                    @endif
{{--                                               @endforeach--}}
                                           @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-2 float-right">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
