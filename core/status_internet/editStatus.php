<?php 

require_once('../../fungsi/fungsi_ukm.php');

$conn = new jalankanFungsi();

if(isset($_GET['id'])){

    $table = "tb_status_internet";
	$id =  $_GET['id'];

	$result = $conn->detail($id, $table);

	$row = mysqli_fetch_array($result);
    
}

?>   

<form id="form-data-edit" method="POST">
<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <div class="form-group">
                                
                                <label>no_internet</label>
                                <input type="text" name="no_internet" value="<?php echo $row['no_internet'] ?>" class="form-control" id="no_internet">
                            </div>
                            <div class="form-group">
                                <label>no_telp</label>
                                <input type="text" value="<?php echo $row['no_telp'] ?>" name="no_telp" class="form-control" id="no_telp">
                            </div>
                            <div class="form-group">
                                <label>nama</label>
                                <input type="text" name="nama" value="<?php  echo $row['nama']  ?>" class="form-control" id="nama">
                            </div>
                            <div class="form-group">
                                <label>alamat</label>
                                <input type="text" name="alamat" value="<?php echo $row['alamat'] ?>" class="form-control" id="alamat">
                            </div>
                            <div class="form-group">
                                <label>status</label>
                                <input type="text" name="status" value="<?php echo $row['status'] ?>" class="form-control" id="status">
                            </div>
                            <div class="form-group">
                                <label>status_port</label>
                                <input type="text" name="status_port" value="<?php echo $row['status_port'] ?>" class="form-control" id="status_port">
                            </div>
                            <div class="form-group">
                                <label>status_bayar</label>
                                <input type="text" name="status_bayar" value="<?php echo $row['status_bayar'] ?>" class="form-control" id="status_bayar">
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
                        url: 'core/status_internet/updateStatus.php',
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
                            window.location="data_status_internet.php";
                            
                        } 
                });
                
            });
  
    });
</script>