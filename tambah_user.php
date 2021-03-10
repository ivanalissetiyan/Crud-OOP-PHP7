<?php 

session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
//include('header.php');

$userYangLogin = $_SESSION['username'];


include('header.php');

?>
<script type="text/javascript">
    $(document).ready(function(e){
        $("#formInput").on('submit', function(e){
            e.preventDefault();

            var username = $("#txtusername").val();
            var password = $("#txtpassword").val();
            var cpassword = $("#txtcpassword").val();
            var email = $("#txtemail").val();

            if(username == ''){
                alert('username is required');
            }else if(password == ''){
                alert('password is required');
            }else if(cpassword != password){
                alert('password not same');
            }else if(email == ''){
                alert('email is required');
            }else {
                //alert('success');
                $.ajax({
                    url: 'core/addUser.php',
                    type: 'POST',
                    data:new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    success:function(data){
                        alert("Success add new user");
                        $('#formInput')[0].reset();  
                    } 
                });
            }
            
        });
    });
</script>
<body id="page-top">

    <!-- Navigation -->
    <?php include('nav.php') ?>
    <!--end Navigation-->

    <div class="content-wrapper py-3">

        <div class="container-fluid">

        <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Tambah Users</li>
            </ol>
            
            <?php include('notif.php') ?>
            <!-- Example Tables Card -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Data Table Example
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <form method="post" id="formInput">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="username" id="txtusername">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="password" id="txtpassword">
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input type="password" name="c_password" class="form-control" placeholder="Konfirmasi password" id="txtcpassword">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Example@email.com" id="txtemail">
                            </div>
                            <div class="form-group">
                                <label>Level : </label>
                                <div class="btn-group">
                                    <label class="btn btn-default">
                                        <input type="radio" name="level" value="1">
                                        <span>Admin</span>
                                    </label>
                                    <label class="btn btn-default">
                                        <input type="radio" name="level" value="2">
                                        <span>User Biasa</span>
                                    </label>
                                    <label class="btn btn-default">
                                        <input type="radio" name="level" value="0">
                                        <span>Guest</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">                                
                                <input type="submit" class="btn btn-success">
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