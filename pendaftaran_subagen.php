<?php 
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
//include('header.php');

$userYangLogin = $_SESSION['username'];


include('header.php');
require_once('fungsi/fungsi_ukm.php');

$conn = new jalankanFungsi();

if(!empty($_POST)){

    $tanggal = $_POST['tanggal'];
    $nama_karyawan = $_POST['karyawan'];
    $no_registrasi = $_POST['no_registrasi'];
    $penanggung_jawab = $_POST['png_jawab'];
    $no_ktp = $_POST['no_ktp'];
    $no_hp = $_POST['no_hp'];
    $tanggal_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $kelurahan = $_POST['kelurahan'];
    $kecamatan = $_POST['kecamatan'];
    $kota = $_POST['kota'];
    $provinsi = $_POST['provinsi'];
    $kode_pos = $_POST['kd_pos'];
    $status_lokasi = $_POST['status_lokasi'];
    $domisili_usaha = $_POST['domisili_usaha'];
    $photocopy_ktp = $_POST['copy_ktp'];
    $photo_lokasi = $_POST['denah_lokasi'];
    $photo_denah_lokasi = $_POST['photo_denah_lokasi'];
    $desperindag = $_POST['desperindag'];
    $surat_izin_rt = $_POST['surat_izin_rt'];
    $data_warga = $_POST['data_warga'];
    $pas_photo = $_POST['pas_photo'];

    $result = $conn->pendaftaranAdd($tanggal,
                                    $nama_karyawan,
                                    $no_registrasi,
                                    $penanggung_jawab,
                                    $no_ktp,
                                    $no_hp,
                                    $tanggal_lahir, 
                                    $alamat,
                                    $rt,
                                    $rw,
                                    $kelurahan,
                                    $kecamatan,
                                    $kota,
                                    $provinsi,
                                    $kode_pos,
                                    $status_lokasi,
                                    $domisili_usaha,
                                    $photocopy_ktp,
                                    $photo_lokasi,
                                    $photo_denah_lokasi,
                                    $desperindag,
                                    $surat_izin_rt,
                                    $data_warga,
                                    $pas_photo);

    if($result) {
        header("location:index.php");
    }
    else{
        header("Gagal menambah data");
    }

}

?>
<style>
      #map {
        width:500px;
        height: 300px;
      }
.controls {
  margin-top: 10px;
  border: 1px solid transparent;
  border-radius: 2px 0 0 2px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  height: 32px;
  outline: none;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}

#pac-input {
  background-color: #fff;
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
  margin-left: 0px;
  padding: 0 11px 0 13px;
  text-overflow: ellipsis;
  width: 300px;
}

#pac-input:focus {
  border-color: #4d90fe;
}

.pac-container {
  font-family: Roboto;
}

#type-selector {
  color: #fff;
  background-color: #4d90fe;
  padding: 5px 11px 0px 11px;
}

#type-selector label {
  font-family: Roboto;
  font-size: 13px;
  font-weight: 300;
}

    </style>
<body id="page-top">

    <!-- Navigation -->
    <?php include('nav.php') ?>
    <!--end Navigation-->

    <div class="content-wrapper py-3">

        <div class="container-fluid">

        <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Pendaftaran Sub Agen</li>
            </ol>
            <!-- Example Tables Card -->
            <div class="card mb-3">
                <div class="card-block">
                    <div class="table-responsive">
                        <form id="formInput" method="POST" class="inline" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="text" id="datepicker" name="tanggal" id="txttanggal" class="form-control" placeholder="tanggal">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama karyawan</label>
                                        <input type="text" name="karyawan" id="txtkaryawan" class="form-control" placeholder="karyawan">                                        
                                    </div> 
                                    <div class="form-group">
                                        <label>No Registrasi</label>
                                        <input type="text" name="no_registrasi" id="txtno_registrasi" class="form-control" placeholder="no_registrasi">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Sub Agen</label>
                                        <input type="text" name="nm_subagen" id="txtnm_subagen" class="form-control" placeholder="nm_subagen">
                                    </div>
                                    <div class="form-group">
                                        <label>Penanggung Jawab</label>
                                        <input type="text" name="png_jawab" id="txtpng_jawab" class="form-control" placeholder="png_jawab">
                                    </div>
                                    <div class="form-group">
                                        <label>No Ktp</label>
                                        <input type="text" name="no_ktp" id="txtno_ktp" class="form-control" placeholder="no_ktp">
                                    </div>
                                    <div class="form-group">
                                        <label>No Hp</label>
                                        <input type="text" name="no_hp" id="txtno_hp" class="form-control" placeholder="no_hp">
                                    </div> 
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="text" name="tgl_lahir" id="txttgl_lahir" class="form-control" placeholder="tgl_lahir">
                                    </div>                                     
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" id="txtalamat" class="form-control" placeholder="alamat">
                                    </div> 
                                    <div class="form-group">
                                        <label>RT</label>
                                        <input type="text" name="rt" id="txtrt" class="form-control" placeholder="rt">
                                    </div>   
                                    <div class="form-group">
                                        <label>RW</label>
                                        <input type="text" name="rw" id="txtrw" class="form-control" placeholder="rw">
                                    </div>
                                    <div class="form-group">
                                        <label>kelurahan</label>
                                        <input type="text" name="kelurahan" id="txtkelurahan" class="form-control" placeholder="kelurahan">
                                    </div>
                                    <div class="form-group">
                                        <label>kecamatan</label>
                                        <input type="text" name="kecamatan" id="txtkecamatan" class="form-control" placeholder="kecamatan">
                                    </div>
                                    <div class="form-group">
                                        <label>Kota</label>
                                        <input type="text" name="kota" id="txtkota" class="form-control" placeholder="kota">
                                    </div>
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <input type="text" name="provinsi" id="txtprovinsi" class="form-control" placeholder="provinsi">
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Pos</label>
                                        <input type="text" name="kd_pos" id="txtkd_pos" class="form-control" placeholder="kd_pos">
                                    </div>
                                </div>
                            </div>
                             <h5> Berkas Dan Lain-lain</h5>
                             <hr>   
                             <div class="form-group">
                                    <label>Kode Pos</label>
                                    <input type="text" name="kd_pos" id="txtkd_pos" class="form-control" placeholder="kd_pos">
                            </div>
                            <div class="form-group">
                                    <label>Status Lokasi</label>
                                    <input type="text" name="status_lokasi" id="txtstatus_lokasi" class="form-control" placeholder="status_lokasi">
                            </div>
                            <div class="form-group">
                                    <label>Domisili Usaha</label>
                                    <input type="text" name="domisili_usaha" id="txtdomisili_usaha" class="form-control" placeholder="domisili_usaha">
                            </div> 
                            <div class="form-group">
                                    <label>Copy KTP</label>
                                    <input type="text" name="copy_ktp" id="txtcopy_ktp" class="form-control" placeholder="copy_ktp">
                            </div>
                            <div class="form-group">
                                    <label>Denah Lokasi</label>
                                    <input type="text" name="denah_lokasi" id="txtdenah_lokasi" class="form-control" placeholder="denah_lokasi">
                            </div>
                            <div class="form-group">
                                    <label>Denah Lokasi</label>
                                    <input type="text" name="photo_denah_lokasi" id="txtdenah_lokasi" class="form-control" placeholder="denah_lokasi">
                            </div>
                            <div class="form-group">
                                    <label>Desperindag</label>
                                    <input type="text" name="desperindag" id="txtdesperindag" class="form-control" placeholder="desperindag">
                            </div>
                            <div class="form-group">
                                    <label>Surat izin RT</label>
                                    <input type="text" name="surat_izin_rt" id="txtsurat_izin_rt" class="form-control" placeholder="surat_izin_rt">
                            </div>
                            <div class="form-group">
                                    <label>Data Warga</label>
                                    <input type="text" name="data_warga" id="txtdata_warga" class="form-control" placeholder="data_warga">
                            </div>
                            <div class="form-group">
                                    <label>Pas Foto</label>
                                    <input type="file" name="pas_photo" id="txtpas_foto" class="form-control" placeholder="pas_foto">
                            </div>               	
                        	<div class="form-group">
                                <div class="col-lg-3">
                        		    <input type="submit" class="btn btn-success" value="simpan">                		
                                </div> 
                        	</div>
                        </form>
                    </div>
                </div>
                <div class="card-footer small text-muted">
                    Updated yesterday at 11:59 PM
                </div>
            </div>

            </div>
            
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

    <?php include('footer.php') ?>

</body>

</html>