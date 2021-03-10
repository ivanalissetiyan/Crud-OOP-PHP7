<?php 

require_once('../../fungsi/fungsi_ukm.php');

$conn = new jalankanFungsi();

if(isset($_GET['id'])){

    $table = "tb_data_keluhan";
	$id =  $_GET['id'];

	$result = $conn->detail($id, $table);

	$row = mysqli_fetch_array($result);
    
}

?>   

<form id="form-data-edit" method="POST">
<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <div class="form-group">
                                
                                <label>references</label>
                                <input type="text" name="references" value="<?php echo $row['referensi'] ?>" class="form-control" id="references">
                            </div>
                            <div class="form-group">
                                <label>Date create</label>
                                <input type="text" name="date_create" value="<?php echo $row['date_create'] ?>" class="form-control" id="date_create">
                            </div>
                            <div class="form-group">
                                <label>Service number</label>
                                <input type="text" name="service_number" value="<?php echo $row['service_number'] ?>" class="form-control" id="service_number">
                            </div>
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" name="subject" value="<?php echo $row['subject_p'] ?>" class="form-control" id="subject">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" value="<?php echo $row['nama'] ?>" class="form-control" id="nama">
                            </div>
                            <div class="form-group">
                                <label>Contact person</label>
                                <input type="text" name="contact_person" value="<?php echo $row['contact_person'] ?>" class="form-control" id="contact_person">
                            </div>
                            <div class="form-group">
                                <label>No pengaduan</label>
                                <input type="text" name="no_pengaduan" value="<?php echo $row['no_pengaduan'] ?>" class="form-control" id="no_pengaduan">
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
                        url: 'core/keluhan/updateKeluhan.php',
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
                            window.location="data_keluhan.php";
                            
                        } 
                });
                
            });
  
    });
</script>