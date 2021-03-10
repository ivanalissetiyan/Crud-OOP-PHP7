<nav id="mainNav" class="navbar static-top navbar-toggleable-md navbar-inverse bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Politeknik Batam</a>
        <div class="collapse navbar-collapse" id="navbarExample">
<?php 

require_once("fungsi/fungsi_ukm.php"); 

$conn = new jalankanFungsi();
$level = $_SESSION['level'];

$result = $conn->menus($level);

if($level == 1){
    $url = array('accountAdmin'=>'accountAdmin.php',
                    'tambahUkm' => 'tambah_ukm.php',
                    'data_status_internet' => 'data_status_internet.php',
                    'keluhan_pelanggan' => 'data_keluhan.php', 
                    'data_pelanggan' => 'data_pelanggan.php', 
                    'data_tagihan' => 'data_tagihan.php', 
                    'changePassword' => 'changePassword.php',
                    'dataUsers' => 'all_users.php',
                    'tambahUser' => 'tambah_user.php',
                    'data_kelas' => 'data_kelas.php',
                    'data_komputer' => 'data_komputer.php',
                    'data_dosen' => 'data_dosen.php',
                    'data_kurikulum' => 'data_kurikulum.php'
                );
    echo '<ul class="sidebar-nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href='.$url['accountAdmin'].'><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents"><i class="fa fa-users"></i> Master Data</a>
                    <ul class="sidebar-second-level collapse" id="collapseComponents">
                        <li>
                                <a href='.$url['data_kelas'].'>Data Kelas</a>
                        </li> 
                        <li>
                                <a href='.$url['data_komputer'].'>Data Komputer</a>
                        </li>  
                        <li>
                                <a href='.$url['data_dosen'].'>Data Dosen</a>
                        </li>
                        <li>
                                <a href='.$url['data_kurikulum'].'>Data Kurikulum</a>
                        </li>  
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents2"><i class="fa fa-database"></i> Status</a>
                    <ul class="sidebar-second-level collapse" id="collapseComponents2">
                        <li>
                                <a href='.$url['data_status_internet'].'>Status Internet</a>
                        </li> 
                    </ul>
                </li>
                               
                <li class="nav-item">
                    <a class="nav-link" href='.$url['changePassword'].'><i class="fa fa-database" aria-hidden="true"></i>  changePassword</a>
                </li>
            </ul>';

}else if($level == 2){
    $url = array('index' => 'index.php', 
                    'tampilUkm' => 'allDataUkm.php', 
                    'changePassword' => 'changePassword.php');

    echo '<ul class="sidebar-nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href='.$url['index'].'><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-fw fa-area-chart"></i> Charts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-fw fa-table"></i> Tables</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='.$url['tampilUkm'].'><i class="fa fa-users" aria-hidden="true"></i>  Data Ukm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='.$url['changePassword'].'><i class="fa fa-database" aria-hidden="true"></i>  Change Password</a>
                </li>
            </ul>';

}else if($level == 0){

    $url = array('index' => 'index.php', 'changePassword' => 'changePassword.php');

    echo '<ul class="sidebar-nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href='.$url['index'].'><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-fw fa-area-chart"></i> Charts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-fw fa-table"></i> Tables</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='.$url['changePassword'].'><i class="fa fa-database" aria-hidden="true"></i>  Change Password</a>
                </li>
            </ul>';

} 

?>
            
            <!-- right navigation-->
            <?php include('right_nav.php') ?>
            
        </div>
    </nav>