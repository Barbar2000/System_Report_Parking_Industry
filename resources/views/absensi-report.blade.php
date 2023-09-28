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
                            {{-- <div class="card-tools"> --}}
                                {{-- <form action="" method="">
                                    <div class="input-group input-group-sm" style="width: 300px;">
                                        <input type="text" name="keyword" class="form-control float-right"
                                            placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form> --}}
                            {{-- </div> --}}
                        </div>
                        <div class="card-body table-responsive p-0" style="height: 430px;">
                            <table class="table table-sm table-bordered table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="text-align: center">NIP</th>
                                        <th style="text-align: center">Nama</th>
                                        <th style="text-align: center">Departemen</th>
                                        @foreach ($dateRange as $value)
                                            <th style="text-align: center">{{ $value->format('D') }}
                                                <br>
                                                {{ $value->format('d M Y') }}
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach ($workers as $worker)
                                        <?php $no++; ?>
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $worker->nip }}</td>
                                            <td>{{ $worker->name }}</td>
                                            <td>{{ $worker->dept->name }}</td>
                                            @foreach ($dateRange as $value)
                                                @if (count($jadwal[$worker->id]) > 0)
                                                    <td>
                                                        <?php
                                                        $getJadwal = collect($jadwal[$worker->id])
                                                            ->where('tanggal_mulai', '<=', $value->format('Y-m-d'))
                                                            ->where('tanggal_akhir', '>=', $value->format('Y-m-d'))
                                                            ->first();
                                                        ?>
                                                        @if (!is_null($getJadwal))
                                                            <p style="line-height: 10px; text-align:center">{{ $getJadwal['name'] }}</p>
                                                            @if (strtolower($getJadwal['name']) != 'libur')
                                                                @if (count($getJadwal['absen']) > 0)
                                                                    @if (strtolower($getJadwal['name']) == 'shift 3')
                                                                        <?php
                                                                        $dataMasuk = collect($getJadwal['absen'])
                                                                            ->where('deskripsi', '=', 'masuk')
                                                                            ->where('tanggal', '=', $value->format('Y-m-d'))
                                                                            ->first();
                                                                        $dataKeluar = collect($getJadwal['absen'])
                                                                            ->where('deskripsi', '=', 'keluar')
                                                                            ->where('tanggal', '=', $value->modify('+1 day')->format('Y-m-d'))
                                                                            ->first();
                                                                        ?>
                                                                        <p style="line-height: 5px">In&emsp;: {{ $dataMasuk['jam_absen'] }}</p>
                                                                        <p style="line-height: 5px">Out : {{ $dataKeluar['jam_absen'] }}</p>
                                                                    @else
                                                                        <?php
                                                                        $dataAbsenMasuk = collect($getJadwal['absen'])
                                                                            ->where('deskripsi', '=', 'masuk')
                                                                            ->where('tanggal', '=', $value->format('Y-m-d'));
                                                                        $dataAbsenKeluar = collect($getJadwal['absen'])
                                                                            ->where('deskripsi', '=', 'keluar')
                                                                            ->where('tanggal', '=', $value->format('Y-m-d'));
                                                                        ?>
                                                                        @foreach ($dataAbsenMasuk as $data)
                                                                            @if ($loop->first)
                                                                                <p style="line-height: 5px">In&emsp;: {{ $data['jam_absen'] }}
                                                                                </p>
                                                                            @endif
                                                                        @endforeach
                                                                        @foreach ($dataAbsenKeluar as $data)
                                                                            @if ($loop->last)
                                                                                <p style="line-height: 5px">Out : {{ $data['jam_absen'] }}
                                                                                </p>
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                @else
                                                                @endif
                                                            @endif
                                                        @else
                                                            Jadwal Kosong
                                                        @endif
                                                    </td>
                                                @else
                                                    <td>
                                                        Jadwal Kosong
                                                    </td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
