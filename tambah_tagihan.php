<?php 
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
//include('header.php');

$userYangLogin = $_SESSION['username'];


include('header.php');


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
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item active">Tambah Tagihan Pelanggan</li>
            </ol>
            <!-- Example Tables Card -->
            <div class="card mb-3">
                <div class="card-block">
                   
                </div>
                
                    <div class="card-footer small text-muted">
                        <form id="form-data" method="POST">
                            <div class="form-group">
                                
                                <label>periode</label>
                                <input type="text" name="periode" class="form-control" id="periode">
                            </div>
                            <div class="form-group">
                                <label>mata_uang</label>
                                <input type="text" name="mata_uang" class="form-control" id="mata_uang">
                            </div>
                            <div class="form-group">
                                <label>jumlah_tagihan</label>
                                <input type="text" name="jumlah_tagihan" class="form-control" id="jumlah_tagihan">
                            </div>
                            <div class="form-group">
                                <label>belum_bayar</label>
                                <input type="text" name="belum_bayar" class="form-control" id="belum_bayar">
                            </div>
                            <div class="form-group">
                                <label>status_pembayaran</label>
                                <input type="text" name="status_pembayaran" class="form-control" id="status_pembayaran">
                            </div>
                            <div class="form-group">
                                <label>lokasi_pembayaran</label>
                                <input type="text" name="lokasi_pembayaran" class="form-control" id="lokasi_pembayaran">
                            </div>
                            <div class="form-group">
                                <label>cicilan</label>
                                <input type="text" name="cicilan" class="form-control" id="cicilan">
                            </div>
                            <div class="form-group">
                                <label>tanggal</label>
                                <input type="text" name="tanggal" class="form-control" id="tanggal">
                            </div>
                            <div class="form-group">
                                <label>jam</label>
                                <input type="text" name="jam" class="form-control" id="jam">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Simpan</button>
                                <br>
                                <div id="response">Loading ....</div>
                            </div>
                        </form>        
                    </div>
                </div>
            </div>

            </div>
            
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->
    <script type="text/javascript">
        $(document).ready(function(e){
            $("#response").hide();
            $("#form-data").on('submit', function(e){
                e.preventDefault();
                
                $.ajax({
                        url: 'core/tagihan/addTagihan.php',
                        type: 'POST',
                        data:new FormData(this),
                        contentType:false,
                        cache:false,
                        processData:false,
                        beforeSend: function(data){
                            $("#response").show();
                        },
                        success:function(data){
                            $("#response").hide();
                            $('#form-data')[0].reset(); 
                            window.location="data_tagihan.php";
                        } 
                });
                
            });
        });
    </script>
    <?php include('footer.php') ?>

</body>

</html>