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
                                               <td>
                                                   <?php
                                                   $getJadwal = collect($jadwal[$worker->id])->where('tanggal_mulai', '<=', $value->format('Y-m-d'))->where('tanggal_akhir', '>=', $value->format('Y-m-d'))->first();
                                                   ?>
                                                   @if(!is_null($getJadwal))
                                                       <p>{{$getJadwal['name']}}</p>
                                                       @if(strtolower($getJadwal['name']) != 'libur')
                                                           @if(count($getJadwal['absen']) > 0)
                                                               @if(strtolower($getJadwal['name']) == 'shift 3')
                                                                       <?php
                                                                       $dataMasuk = collect($getJadwal['absen'])->where('deskripsi', '=', 'masuk')->where('tanggal', '=', $value->format('Y-m-d'))->first();
                                                                       $dataKeluar = collect($getJadwal['absen'])->where('deskripsi', '=', 'keluar')->where('tanggal', '=', $value->modify('+1 day')->format('Y-m-d'))->first();

                                                                       ?>
                                                                       <p>{{$dataMasuk['deskripsi'].' : '.$dataMasuk['jam_absen']}}</p>
                                                                        <p>{{$dataKeluar['deskripsi'].' : '.$dataKeluar['jam_absen']}}</p>
                                                               @else
                                                                   <?php
                                                                       $dataAbsen = collect($getJadwal['absen'])->where('tanggal', '=', $value->format('Y-m-d'));
                                                                       ?>
                                                                   @foreach($dataAbsen as $data)
                                                                       <p>{{$data['deskripsi'].' : '.$data['jam_absen']}}</p>
                                                                   @endforeach
                                                               @endif
                                                           @else
                                                               Absen
                                                           @endif
                                                       @endif
                                                   @endif
                                               </td>
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
