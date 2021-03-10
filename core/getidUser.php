<?php 

require_once('../fungsi/fungsi_ukm.php');

$conn = new jalankanFungsi();

if(isset($_GET['id_user'])){

	$id =  $_GET['id_user'];

	$result = $conn->getUserId($id);

	$row = mysqli_fetch_array($result);

	$level = $row['level'];

	if($level == 1){
		$status = 'Admin';
	}else if($level == 2){
		$status = 'User Biasa';
	}else {
		$status = 'Guest';
	}
}

?>   
<script type="text/javascript">
$(document).ready(function(){
	$("#update").click(function(){
		var id = $('#txtid').val();
		var username = $('#txtusername').val();
		var level = $('#txtlevel').val();
		$.ajax({
			url: 'core/updateUser.php',
			type: 'POST',  
			data: {username:username,level:level,id:id},
			success:function(data){
				alert('success');			}
		});
	});
});	
</script>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Update user</a></li>
    <li class="breadcrumb-item active">Level : <?php echo $status ?></li>
</ol>
<div id="result"></div>
<form method="post">
	<input type="hidden" name="" value="<?php echo $id ?>" id="txtid">
	<div class="form-group">
		<input type="text" name="username" class="form-control" value="<?php echo $row['username'] ?>" id="txtusername">
	</div>
	<div class="form-group">
		<input type="text" name="email" class="form-control" value="<?php echo $row['email'] ?>" id="txtemail">
	</div>
	<div class="form-group">
        <label>Level : </label>
        <select name="level" id="txtlevel" class="form-control">
        	<option value="1">Admin</option>
        	<option value="2">User Biasa</option>
        	<option value="0">Guest</option>
        </select>
        </div>
	<input type="submit" name="" value="update" class="btn btn-success" id="update">
</form>
