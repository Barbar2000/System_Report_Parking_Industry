{{-- @foreach ($absensi as $item)
    - {{ $item }} <br>
    {{ $item->jadwal->name }}<br>
    <br>
    <br>
@endforeach --}}
@extends('layouts.sidebar')
@section('title', 'Absensi Keluar')
@section('content')
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
                            </div>
                            <div class="d-grid gap-4 d-md-flex">
                                <a href="absensi-masuk" class="btn btn-success btn">
                                    <ion-icon name="arrow-undo"></ion-icon> Absen Masuk
                                </a>
                                <a href="absensi-keluar" class="btn btn-danger btn">
                                    <ion-icon name="arrow-redo"></ion-icon> Absen Keluar
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid col-md-12 col-sm-12 col-xs-12">
                                <div class="container-fluid col-sm-8 col-xs-12"
                                    style="background-color: #d9534f; padding: 10px; border-radius: 10px">
                                    <div style="margin: 15px; background: white;" class="body_red">
                                        <div class="row" style="background:white;border-radius: 10px">
                                            <div class="col-sm-4 col-xs-4">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h4></h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="nip" class="transparant"
                                                                    id="nip" placeholder="SCAN NIP HERE"
                                                                    maxlength="7" minlength="7"
                                                                    style="height: 40px; text-transform: uppercase; font-weight: bold; font-size: 20px; text-align: center;"
                                                                    fdprocessedid="0slq2h">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <br>
                                                                <div class="alert alert-success" id="alert_sukses"
                                                                    hidden="hidden">
                                                                    <p id="alert_proses_sukses" style="font-size: 24px;">

                                                                    </p>
                                                                </div>
                                                                <div class="alert alert-danger" id="alert_gagal">
                                                                    <p id="alert_proses">

                                                                    </p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span
                                                                    style="height: 30px; text-transform: uppercase; font-weight: bold; font-size: 20px; text-align: center;">
                                                                    <div class="jam_aktual">
                                                                        <div class="days">
                                                                            <span id="sun">MG</span>
                                                                            <span id="mon">SN</span>
                                                                            <span id="tus">SL</span>
                                                                            <span id="wed">RB</span>
                                                                            <span id="thu">KM</span>
                                                                            <span id="fri">JM</span>
                                                                            <span id="sat">SB</span>
                                                                        </div>
                                                                        <div class="text">
                                                                            <span id="hours"></span> :
                                                                            <span id="min"></span> :
                                                                            <span id="sec"></span> :
                                                                            <span id="time"></span>
                                                                        </div>
                                                                        <div id="date">
                                                                            <span id="cal"> </span>
                                                                            <span id="day"></span>
                                                                            <span id="month"></span>
                                                                            <span id="year"></span>
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-sm-8 col-xs-8">
                                                <table class="table" id="table-borderless">

                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <font style="font-size: 20px;">TANGGAL</font>
                                                        </td>
                                                        <td>:</td>
                                                        <td style="width: 200px;">
                                                                <span
                                                                    style="height: 30px; text-transform: uppercase; font-size: 20px;" id="tanggal">
                                                                </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <font style="font-size: 20px;">JAM</font>
                                                        </td>
                                                        <td>:</td>
                                                        <td>
                                                                <span
                                                                    style="height: 30px; text-transform: uppercase; font-size: 20px;" id="jam">
                                                                </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 100px;">
                                                            <font style="font-size: 20px;">NIP</font>
                                                        </td>
                                                        <td style="width: 1px;">:</td>
                                                        <td style="width: 200px;">
                                                                <span
                                                                    style="height: 30px; text-transform: uppercase;  font-size: 20px;"
                                                                    id="nip_detail">
                                                                </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <font style="font-size: 20px;">NAMA</font>
                                                        </td>
                                                        <td>:</td>
                                                        <td>
                                                                <span
                                                                    style="height: 30px; text-transform: uppercase;  font-size: 20px;"
                                                                    id="name_detail">
                                                                </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <font style="font-size: 20px;">DEPT </font>
                                                        </td>
                                                        <td>:</td>
                                                        <td>
                                                                <span
                                                                    style="height: 30px; text-transform: uppercase;  font-size: 20px;"
                                                                    id="dept_detail">
                                                                </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <font style="font-size: 20px;">JADWAL </font>
                                                        </td>
                                                        <td>:</td>
                                                        <td>
                                                                <span
                                                                    style="height: 30px; text-transform: uppercase;  font-size: 20px;"
                                                                    id="jadwal_detail">
                                                                </span>
                                                        </td>
                                                    </tr>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#nip').on('keyup', function(event) {

                var nip = $(this).val();
                console.log(nip);

                totLength = nip.length;
                if (totLength >= 7) {
                    $.ajax({
                        url: "{{ url('inputabsen') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "post",
                        data: {
                            nip: nip,
                            type: "keluar"
                        },
                        success: function(response) {
                            if(response.success === false){
                                toastr.info(response.message, 'Info !');
                            }else{
                                console.log(response);
                                $('#nip_detail').text(response.data.worker.nip)
                                $('#name_detail').text(response.data.worker.name)
                                $('#dept_detail').text(response.data.worker.dept.name);
                                $('#jadwal_detail').text(response.data.worker.name_jadwal);
                                $('#tanggal').text(response.data.date);
                                $('#jam').text(response.data.time);
                            }
                        },
                        error: function(data) {
                            alert("Error!! Hubungi IT");
                        }
                    });
                }
            });
        });
    </script>
@endsection
