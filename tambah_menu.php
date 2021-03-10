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

    if(empty($_POST['menu']) || empty($_POST['link']) || empty($_POST['level'])){

        echo '<script>alert("Form tidak boleh kosong");</script>';
    }else{

        $namaMenu = trim($_POST['menu']);
        $url = trim($_POST['link']);
        $level = trim($_POST['level']);

        $result = $conn->tambahMenu($namaMenu, $url, $level);

        echo '<script>alert("Sukses Menambah Menu Baru");window.location="tambah_menu.php";</script>';
    }

}

?>
<body id="page-top">

    <!-- Navigation -->
    <?php include('nav.php') ?>
    <!--end Navigation-->

    <div class="content-wrapper py-3">

        <div class="container-fluid">

        <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Tambah Menu</li>
            </ol>

            <?php include('notif.php') ?>
            <!-- Example Tables Card -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Data Table Example
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        	<div class="form-group">
                        		<label>Menu</label>
                        		<input type="text" name="menu" class="form-control" placeholder="Nama menu">
                        	</div>
                        	<div class="form-group">
                        		<label>Link</label>
                        		<input type="text" name="link" class="form-control" placeholder="Masukan Url">
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
