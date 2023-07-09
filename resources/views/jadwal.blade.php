@extends('layouts.sidebar')
@section('title', 'Schedule Karyawan')
@section('content')
    {{-- {{$jadwal}} --}}
    <section class="content-header">
        <div class="container-fluid">
        </div>
        <!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="container-fluid">
                @if (Auth::user()->id != 1)
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-12">
                        <a href="/jadwal-karyawan">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning"><i class="far fa-calendar-alt"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Lihat Jadwal Karyawan</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @else
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-12">
                            <a href="/jadwal-karyawan-add">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Input Jadwal Karyawan</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <a href="/jadwal-karyawan">
                                <div class="info-box">
                                    <span class="info-box-icon bg-warning"><i class="far fa-calendar-alt"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Lihat Jadwal Karyawan</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <a href="/jadwal-add">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success"><i class="fas fa-copy"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Input Jadwal</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
