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

if(isset($_GET['id_ukm'])){

  $id_ukm = $_GET['id_ukm'];

  $result = $conn->detailLokasi($id_ukm);
  $row = mysqli_fetch_array($result);

  $nama_pemilik = $row['nama_pemilik'];
  $nama_produk = $row['nama_produk'];
  $lokasi_usaha = $row['lokasi_usaha'];
  $alamat_usaha = $row['alamat_usaha'];
  $no_telp = $row['no_telp'];
  $jenis_ukm = $row['jenis_ukm'];
  $status = $row['status'];
  $geo = $row['geolocation'];

  $latlong = (explode(",",$lokasi_usaha));

  $lat = $latlong[0];
  $long = $latlong[1];

  if($status == 'active'){
      $icon = 'img/active_ukm.png';
  }else if($status == 'tidak_active'){
      $icon = 'img/inactive_ukm.png';
  }

}

?>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyAATj04FZVxMmpwYZm05sLxKzUd7YVb8Jw" type="text/javascript"></script>
    <script>
      // In the following example, markers appear when the user clicks on the map.
      // Each marker is labeled with a single alphabetical character.
      var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      var labelIndex = 0;

      var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading"><?php echo $nama_produk ?></h1>'+
            '<div id="bodyContent">'+
            '<p>Nama Produk : <?php echo $nama_produk ?></p></br>'+
            '</div>'+
            '</div>';

      var infowindow = new google.maps.InfoWindow({
          content: contentString
        });      


      function initialize() {

        var bangalore = { lat: <?php echo $lat ?>, lng: <?php echo $long ?> };
        //var bangalore = { lat: <?php echo $lat ?>, lng: <?php echo $long ?> };
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: bangalore
        });

        // Add a marker at the center of the map.
        addMarker(bangalore, map);
      }

      // Adds a marker to the map.
      function addMarker(location, map) {
        // Add the marker at the clicked location, and add the next-available label
        // from the array of alphabetical characters.
        var marker = new google.maps.Marker({
          position: location,
          label: labels[labelIndex++ % labels.length],
          map: map,
          icon: '<?php echo $icon ?>'
        });

        //untuk menambah keterangan lokasi 
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });

      }

      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
<style>
  #map{
    width: 100%;
    height: 500px;
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
                <li class="breadcrumb-item"><a href="#">Data Ukm</a></li>
                <li class="breadcrumb-item active">Detail lokasi</li>
            </ol>

            <?php include('notif.php') ?>
            <!-- Example Tables Card -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Nama Produk : <?php echo $nama_produk ?> Alamat Usaha : <?php echo $alamat_usaha ?> 
                </div>
                <div class="card-block">
                    <div class="table-responsive">

                        <div id="map"></div>
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
