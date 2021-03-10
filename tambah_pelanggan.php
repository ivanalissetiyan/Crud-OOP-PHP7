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
                <li class="breadcrumb-item active">Tambah Pelanggan</li>
            </ol>
            <!-- Example Tables Card -->
            <div class="card mb-3">
                <div class="card-block">
                   
                </div>
                
                    <div class="card-footer small text-muted">
                        <form id="form-data" method="POST">
                            <div class="form-group">
                                
                                <label>No Internet</label>
                                <input type="text" name="no_internet" class="form-control" id="no_internet">
                            </div>
                            <div class="form-group">
                                <label>No Telpon</label>
                                <input type="text" name="no_telp" class="form-control" id="no_telp">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pasang</label>
                                <input type="text" name="tgl_pasang" class="form-control" id="tgl_pasang">
                            </div>
                            <div class="form-group">
                                <label>Segment</label>
                                <input type="text" name="segment" class="form-control" id="segment">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="alamat">
                            </div>
                            <div class="form-group">
                                <label>Kelurahan</label>
                                <input type="text" name="kel" class="form-control" id="kel">
                            </div>
                            <div class="form-group">
                                <label>Kota</label>
                                <input type="text" name="kota" class="form-control" id="kota">
                            </div>
                            <div class="form-group">
                                <label>Contact Person</label>
                                <input type="text" name="contact_person" class="form-control" id="contact_person">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" id="email">
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
                        url: 'core/pelanggan/addPelanggan.php',
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
                            window.location="data_pelanggan.php";
                        } 
                });
                
            });
        });
    </script>
    <?php include('footer.php') ?>

</body>

</html>