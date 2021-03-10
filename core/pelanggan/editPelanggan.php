<?php 

require_once('../../fungsi/fungsi_ukm.php');

$conn = new jalankanFungsi();

if(isset($_GET['id'])){

    $table = "tb_data_pelanggan";
	$id =  $_GET['id'];

	$result = $conn->detail($id, $table);

	$row = mysqli_fetch_array($result);
    
    
}

?>   

<form id="form-data-edit" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <div class="form-group"> 
                                <label>No Internet</label>
                                <input type="text" value="<?php echo $row['no_internet'] ?>" name="no_internet" class="form-control" id="no_internet">
                            </div>
                            <div class="form-group">
                                <label>No Telpon</label>
                                <input type="text" value="<?php echo $row['no_telp'] ?>" name="no_telp" class="form-control" id="no_telp">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pasang</label>
                                <input type="text" value="<?php echo $row['tanggal_pasang'] ?>" name="tgl_pasang" class="form-control" id="tgl_pasang">
                            </div>
                            <div class="form-group">
                                <label>Segment</label>
                                <input type="text" value="<?php echo $row['segment'] ?>" name="segment" class="form-control" id="segment">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" value="<?php echo $row['nama'] ?>" name="nama" class="form-control" id="nama">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" value="<?php echo $row['alamat'] ?>" name="alamat" class="form-control" id="alamat">
                            </div>
                            <div class="form-group">
                                <label>Kelurahan</label>
                                <input type="text" value="<?php echo $row['kelurahan'] ?>" name="kel" class="form-control" id="kel">
                            </div>
                            <div class="form-group">
                                <label>Kota</label>
                                <input type="text" value="<?php echo $row['kota'] ?>" name="kota" class="form-control" id="kota">
                            </div>
                            <div class="form-group">
                                <label>Contact Person</label>
                                <input type="text" value="<?php echo $row['contact_person'] ?>" name="contact_person" class="form-control" id="contact_person">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" value="<?php echo $row['email'] ?>" name="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Simpan</button>
                                <br>
                                <div id="response">Loading ....</div>
                            </div>
                        </form> 
                        
<script>
    $(document).ready(function(){
        $("#response").hide();
        $("#form-data-edit").on('submit', function(e){
                e.preventDefault();
                
                $.ajax({
                        url: 'core/pelanggan/updatePelanggan.php',
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
                            $('#form-data-edit')[0].reset(); 
                            window.location="data_pelanggan.php";
                            
                        } 
                });
                
            });
  
    });
</script>