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
                                    <div style="margin: 10px; background: white;" class="body_red">
                                        <div class="row" style="background:white;border-radius: 10px">
                                            <div class="col-sm-8 col-md-4 col-xs-12">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h4></h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="text" class="transparant" id="nip"
                                                                    placeholder="SCAN NIP HERE" maxlength="7"
                                                                    minlength="7"
                                                                    style="height: 40px; text-transform: uppercase; font-weight: bold; font-size: 20px; text-align: center;"
                                                                    tabindex="1"
                                                                    autofocus="autofocus">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div>
                                                                    <br>
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
                                                                            <span id="hours"></span>
                                                                            <span id="min"></span>
                                                                            <span id="sec"></span>
                                                                            <span id="time"></span>
                                                                        </div>
                                                                        <div id="date">
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
                                            <div class="col-sm-1 col-xs-1">
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <table class="table" id="table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <font style="font-size: 15px; font-weight: bold;">TANGGAL</font>
                                                            </td>
                                                            <td>:</td>
                                                            <td style="width: 200px;">
                                                                <span
                                                                    style="height: 15px; text-transform: uppercase; font-size: 15px; font-weight: bold;"
                                                                    id="tanggal">
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <font style="font-size: 15px; font-weight: bold;">JAM</font>
                                                            </td>
                                                            <td>:</td>
                                                            <td>
                                                                <span
                                                                    style="height: 15px; text-transform: uppercase; font-size: 15px; font-weight: bold;"
                                                                    id="jam">
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 100px;">
                                                                <font style="font-size: 15px; font-weight: bold;">NIP</font>
                                                            </td>
                                                            <td style="width: 1px;">:</td>
                                                            <td style="width: 200px;">
                                                                <span
                                                                    style="height: 15px; text-transform: uppercase;  font-size: 15px; font-weight: bold;"
                                                                    id="nip_detail">
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <font style="font-size: 15px; font-weight: bold;">NAMA</font>
                                                            </td>
                                                            <td>:</td>
                                                            <td>
                                                                <span
                                                                    style="height: 15px; text-transform: uppercase;  font-size: 15px; font-weight: bold;"
                                                                    id="name_detail">
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <font style="font-size: 15px; font-weight: bold;">DEPT </font>
                                                            </td>
                                                            <td>:</td>
                                                            <td>
                                                                <span
                                                                    style="height: 15px; text-transform: uppercase;  font-size: 15px; font-weight: bold;"
                                                                    id="dept_detail">
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <font style="font-size: 15px; font-weight: bold;">JADWAL </font>
                                                            </td>
                                                            <td>:</td>
                                                            <td>
                                                                <span
                                                                    style="height: 15px; text-transform: uppercase;  font-size: 15px; font-weight: bold;"
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
                                if (response.success === false) {
                                    toastr.warning(response.message, 'Gagal !');
                                    $('#nip').val("");
                                    document.getElementById('nip').focus();
                                } else {
                                    console.log(response);
                                    $('#nip_detail').text(response.data.worker.nip)
                                    $('#name_detail').text(response.data.worker.name)
                                    $('#dept_detail').text(response.data.worker.dept.name);
                                    $('#jadwal_detail').text(response.data.worker.name_jadwal);
                                    $('#tanggal').text(response.data.date);
                                    $('#jam').text(response.data.time);
                                    toastr.success(response.message, 'Berhasil !');
                                    $('#nip').val("");
                                    document.getElementById('nip').focus();
                                }
                            }
                        });
                    }
                });
            });
        </script>
         @vite(['resources/js/app.js'])
         <script type="module">
             window.onload=function() {
                 Echo.channel('input-nip')
                     .listen('InputNipEvent', (e) => {
                         $('#nip').val(e.nip);
                         $('#nip').keyup();
                     })
             }
         </script>
@endsection
