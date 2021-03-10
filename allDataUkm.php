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
$table = 'tb_masterukm';

?>
<body id="page-top">

    <!-- Navigation -->
    <?php include('nav.php') ?>
    <!--end Navigation-->

    <div class="content-wrapper py-3">

        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Ukm</li>
            </ol>
            
            <?php include('notif.php') ?>

            <!--detail lokasi -->
            <div id="result">
                    
            </div>            
            <!-- Example Tables Card -->
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-4"><i class="fa fa-table"></i> Data Table Example</div>
                        <div class="col-lg-8">
                            <div class="text-right">
                                <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-file-excel-o" aria-hidden="true"></i>  Export to exel</button>
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                    <form>
                        <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Delete</th>
                                    <th>No</th>
                                    <th>Pemilik</th>
                                    <th>Produk</th>
                                    <th>Jenis</th>
                                    <th>Alamat</th>
                                    <th>Alamat Usaha</th>
                                    <th>Berdiri</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Delete</th>
                                    <th>No</th>
                                    <th>Pemilik</th>
                                    <th>Produk</th>
                                    <th>Jenis</th>
                                    <th>Alamat</th>
                                    <th>Alamat Usaha</th>
                                    <th>Berdiri</th>
                                    <th>Option</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php 
                            $result = $conn->tampil($table);
                            $no = 0;
                            while($row = mysqli_fetch_array($result)){
                                $no++;
                                ?>
                                <tr>
                                    <td><input type="checkbox" name="tes"></td>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $row['nama_pemilik'] ?></td>
                                    <td><?php echo $row['nama_produk'] ?></td>
                                    <td><?php echo $row['id_jenisusaha'] ?></td>
                                    <td><?php echo $row['alamat_pemilik'] ?></td>
                                    <td><?php echo $row['alamat_usaha'] ?></td>
                                    <td><?php echo $row['tahun_berdiri'] ?></td>                         
                                    <td>
                                    <a href="detailUkm.php?id_ukm=<?php echo $row['id_ukm'] ?>" class="detail" data-id=""><i class="fa fa-search-plus" aria-hidden="true"></i>
                                    </a>            
                                    </td>
                                </tr>
                            <?php    
                                }
                            ?>
                            </tbody>
                        </table>
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>   
                    </div>
                </div>
                <div class="card-footer small text-muted">
                    Updated yesterday at 11:59 PM
                </div>                
                
            </div>
                        
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

    <?php include('footer.php') ?>

</body>

</html>