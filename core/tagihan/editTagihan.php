<?php 

require_once('../../fungsi/fungsi_ukm.php');

$conn = new jalankanFungsi();

if(isset($_GET['id'])){

    $table = "tb_tagihan_pelanggan";
	$id =  $_GET['id'];

	$result = $conn->detail($id, $table);

	$row = mysqli_fetch_array($result);
    
}

?>   

<form id="form-data-edit" method="POST">
<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <div class="form-group">
                                
                                <label>periode</label>
                                <input type="text" name="periode" value="<?php echo $row['periode'] ?>" class="form-control" id="periode">
                            </div>
                            <div class="form-group">
                                <label>mata_uang</label>
                                <input type="text" name="mata_uang" value="<?php echo $row['mata_uang'] ?>" class="form-control" id="mata_uang">
                            </div>
                            <div class="form-group">
                                <label>jumlah_tagihan</label>
                                <input type="text" name="jumlah_tagihan" value="<?php echo $row['jumlah_tagihan'] ?>" class="form-control" id="jumlah_tagihan">
                            </div>
                            <div class="form-group">
                                <label>belum_bayar</label>
                                <input type="text" name="belum_bayar" value="<?php echo $row['belum_bayar'] ?>" class="form-control" id="belum_bayar">
                            </div>
                            <div class="form-group">
                                <label>status_pembayaran</label>
                                <input type="text" name="status_pembayaran" value="<?php echo $row['status_pembayaran'] ?>" class="form-control" id="status_pembayaran">
                            </div>
                            <div class="form-group">
                                <label>lokasi_pembayaran</label>
                                <input type="text" name="lokasi_pembayaran" value="<?php echo $row['lokasi_pembayaran'] ?>" class="form-control" id="lokasi_pembayaran">
                            </div>
                            <div class="form-group">
                                <label>cicilan</label>
                                <input type="text" name="cicilan" value="<?php echo $row['cicilan'] ?>" class="form-control" id="cicilan">
                            </div>
                            <div class="form-group">
                                <label>tanggal</label>
                                <input type="text" name="tanggal" value="<?php echo $row['tanggal'] ?>"  class="form-control" id="tanggal">
                            </div>
                            <div class="form-group">
                                <label>jam</label>
                                <input type="text" name="jam" value="<?php echo $row['jam'] ?>"  class="form-control" id="jam">
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
                        url: 'core/tagihan/updateTagihan.php',
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
                            window.location="data_tagihan.php";
                            
                        } 
                });
                
            });
  
    });
</script>