<table class="table" id="table-borderless">
    <tbody><tr>
      <td><font style="font-size: 30px;">JAM</font></td>
      <td>:</td>
      <td>
        <input style="font-size: 30px;" type="text" name="jam" id="jam" class="transparant" readonly="" fdprocessedid="cqpo4">
      </td>
    </tr>
              <tr>
      <td style="width: 100px;"><font style="font-size: 30px;">NIP</font></td>
                  <td style="width: 1px;">:</td>
                  <td style="width: 200px;">
                      <input type="hidden" readonly="" name="jenis" id="jenis" value="masuk">
                      <input style="font-size: 30px;" type="text" name="nip_detail" id="nip_detail" class="transparant" readonly="" fdprocessedid="wiei0r">
                  </td>
              </tr>
              <tr>
                  <td><font style="font-size: 30px;">NAMA</font></td>
                  <td>:</td>
                  <td>
                      <input style="font-size: 30px;" type="text" name="nama_detail" id="nama_detail" class="transparant" readonly="" fdprocessedid="hyg7dj">
                  </td>
              </tr>
              <tr>
      <td><font style="font-size: 30px;">DEPT </font></td>
                  <td>:</td>
                  <td>
                      <input style="font-size: 30px;" type="text" name="departemen_detail" id="departemen_detail" class="transparant" readonly="" fdprocessedid="oxtac">
                  </td>
              </tr>
    <tr>
      <td><font style="font-size: 30px;">JADWAL </font></td>
                  <td>:</td>
                  <td>
                      <span style="font-size: 30px;" id="jam_jadwal"></span>
                  </td>
    </tr>
          </tbody></table>

<script type="text/javascript">

    $(document).ready(function(){
      $("#nip").keydown(function(e){
          if(e.which==17 || e.which==74 || e.keyCode == 13){
              e.preventDefault();
          }

          nip = $('#nip').val().length;
          totLength = $('#nip').val().length;
          if(totLength>5)
          {
            $.ajax({
              url    : "http://cms.ikadceramic.com/hrd/absensi_kartu/get_karyawan",
              type   : "POST",
              data   : {nip : nip},
              success: function(data)
              {
                hasil = JSON.parse(data);
                $("#nip_detail").val(hasil.nip_detail);
                $("#nama_detail").val(hasil.nama_detail);
                $("#jabatan_detail").val(hasil.jabatan_detail);
                $("#bagian_detail").val(hasil.bagian_detail);
                $("#departemen_detail").val(hasil.dept_detail);
                $("#jam").val(hasil.jam);

              },
              error: function(data)
              {
                alert("Error!! Hubungi IT");
              }
            });
          }
      })
    });

      $("#nip").bind("change input",function() {
      nip 		= $('#nip').val();
      totLength = $('#nip').val().length;
      $("#alert_sukses").attr("hidden","hidden");

      if(totLength>=5)
      {
        get_karyawan(nip);
      }
      else
      {
        $("#alert_proses").html('<strong>GAGAL, SILAHKAN COBA LAGI</strong>');
        $("#alert_gagal").removeAttr("hidden");
      }
    });

      function get_karyawan(nip='')
      {
        jenis = $("#jenis").val();
        $.ajax({
          url    : "http://cms.ikadceramic.com/hrd/absensi_kartu/get_karyawan",
          type   : "POST",
          data   : {nip : nip, jenis : jenis},
          success: function(data)
          {
            hasil = JSON.parse(data);
            $("#jam").val(hasil.jam);

            if(hasil.nip_detail!=="")
            {
              $("#alert_gagal").attr("hidden","hidden");
              $("#nip_detail").val(hasil.nip_detail);
              $("#nama_detail").val(hasil.nama_detail);
              $("#jabatan_detail").val(hasil.jabatan_detail);
              $("#bagian_detail").val(hasil.bagian_detail);
              $("#departemen_detail").val(hasil.dept_detail);
              simpan_data();
              document.getElementById("body_absen").style.background = "white";
              all = document.getElementsByClassName('body_red');
                for (var i = 0; i < all.length; i++) {
                  all[i].style.background = 'white';
                }
            }
            else
            {
              if(hasil.status_kar==="kosong")
              {
                $("#nip").val("");
                $("#nip_detail").val("");
                $("#nama_detail").val("");
                $("#jabatan_detail").val("");
                $("#bagian_detail").val("");
                $("#departemen_detail").val("");
                document.getElementById("nip").focus();
                $("#alert_proses").html('<strong>'+nip+' '+hasil.nama_detail+' ( '+hasil.dept_detail+' ) GAGAL, SILAHKAN COBA LAGI</strong>');
                document.getElementById("body_absen").style.background = "white";
                all = document.getElementsByClassName('body_red');
                for (var i = 0; i < all.length; i++) {
                  all[i].style.background = 'white';
                }
              }
              else if(hasil.status_kar==="monitoring")
              {
                $("#nip").val("");
                $("#nip_detail").val("");
                $("#nama_detail").val("");
                $("#jabatan_detail").val("");
                $("#bagian_detail").val("");
                $("#departemen_detail").val("");

                document.getElementById("nip").focus();
                $("#alert_proses").html('<strong>'+nip+' '+hasil.nama_detail+' ( '+hasil.dept_detail+' ) HARAP MENGHUBUNGI SATPAM</strong>');
                $("#alert_gagal").removeAttr("hidden");
                all = document.getElementsByClassName('body_red');
                for (var i = 0; i < all.length; i++) {
                  all[i].style.background = 'red';
                }
              }
              else if(hasil.status_kar==="monitoring_k")
              {
                $("#nip").val("");
                $("#nip_detail").val("");
                $("#nama_detail").val("");
                $("#jabatan_detail").val("");
                $("#bagian_detail").val("");
                $("#departemen_detail").val("");

                document.getElementById("nip").focus();
                $("#alert_proses").html('<strong>NIP '+nip.toUpperCase()+' '+hasil.pesan+'</strong>');
                $("#alert_gagal").removeAttr("hidden");
                all = document.getElementsByClassName('body_red');
                for (var i = 0; i < all.length; i++) {
                  all[i].style.background = 'red';
                }
              }
            }
          },
          error : function(data)
          {
            alert("Error!! Hubungi IT");
          }
        });
      }

      function simpan_data()
      {
        nip     = $('#nip').val();
        $.ajax({
          url    : "http://cms.ikadceramic.com/hrd/absensi_kartu/simpan_data",
          type   : "POST",
          data   : $("#form_absen_kartu").serialize(),
          success: function(data)
          {
            hasil = JSON.parse(data);
            if((hasil.pesan==="ok") && ((hasil.status_masuk=="OK") || (hasil.status_dispen=="OK")) && ((hasil.status_telat=="OK") || (hasil.status_dispen=="OK")))
            // if(hasil.pesan==="ok")
            {
              $("#alert_gagal").attr("hidden","hidden");
              $("#alert_sukses").removeAttr("hidden");
              $("#alert_proses_sukses").html('<strong><font style="font-size:24px;">BERHASIL, TERIMAKASIH</font></strong>');
              document.getElementById("body_absen").style.background = "white";
              $("#nip").val("");
              document.getElementById("nip").focus();
              get_karyawan_2(nip);
            }
            else if ((hasil.status_masuk=="MERAH")||(hasil.status_telat=="MERAH") || (hasil.status_dispen=="MERAH")){
              if(hasil.cek_masuk=="L"){
                $("#alert_proses").html('<strong>Absen Berhasil. <br>Jadwal Anda Libur. Tidak Sesuai Jadwal!!</strong>');
              }
              else {
                if(hasil.status_masuk=="MERAH"){
                    $("#alert_proses").html('<strong>Absen Berhasil. <br>Jam Masuk Lebih Cepat '+hasil.cek_masuk+' Menit.</strong>');
                } else {
                  $("#alert_proses").html('<strong>Absen Berhasil. <br>Jam Masuk Telat '+hasil.cek_masuk+' Menit. <br>Tidak Sesuai Jadwal!!</strong>');
                }
              }


                $("#alert_gagal").removeAttr("hidden");
                all = document.getElementsByClassName('body_red');
                for (var i = 0; i < all.length; i++) {
                  all[i].style.background = 'red';
                }
                $("#nip").val("");
                document.getElementById("nip").focus();
                get_karyawan_2(nip);
            }

            if(hasil.pesan_sidik_jari!=="OK"){
              tampil_pesan_sidik_jari(nip,hasil.pesan_sidik_jari)
            }
          },
          error : function(data){
            alert("Error!! Hubungi IT");
          }
        });
      }

      function tampil_pesan_sidik_jari(nip,pesan){
        $("#data_detail").html(nip+' Silahkan '+pesan+'<br>Abaikan Pesan Ini Jika Sudah Daftar.<br>Terimakasih')
        $("#modal_detail").modal("show")
        setTimeout(close_modal, 4000);
      }

      function close_modal(){
        $("#modal_detail").modal("hide")
        $("#nip").focus()
      }

      function get_karyawan_2(nip)
      {
        totLength = nip.length;
        if(totLength>=5)
        {
          $.ajax({
            url    : "http://cms.ikadceramic.com/hrd/absensi_kartu/get_karyawan",
            type   : "POST",
            data   : {nip : nip},
            success: function(data)
            {
              hasil = JSON.parse(data);
              if(hasil.nip_detail!==""){
                $("#nip_detail").val(hasil.nip_detail);
                $("#nama_detail").val(hasil.nama_detail);
                $("#jabatan_detail").val(hasil.jabatan_detail);
                $("#bagian_detail").val(hasil.bagian_detail);
                $("#departemen_detail").val(hasil.dept_detail);
                $("#jam_jadwal").html(hasil.jam_jadwal)
              }
              $("#jam").val(hasil.jam);
            },
            error: function(data)
            {
              alert("Error!! Hubungi IT");
            }
          });
        }
      }
  </script>
