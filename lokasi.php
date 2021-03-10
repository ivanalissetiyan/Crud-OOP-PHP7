<?php

//require_once("header.php");
require_once("fungsi/fungsi_ukm.php");

$conn =  new jalankanFungsi();

if(isset($_GET['id_ukm'])){

  $id_ukm = $_GET['id_ukm'];
  $result = $conn->detailLokasi($id_ukm);

  var_dump($result);
}
?>
  <style type='text/css'>
  #peta {
  width: 100%;
  height: 600px;

} </style>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyAATj04FZVxMmpwYZm05sLxKzUd7YVb8Jw" type="text/javascript"></script>

   <script type="text/javascript">
    
  (function() {
  window.onload = function() {
var map;
    var locations = [
   <?php
              
      while($data=mysqli_fetch_object($result)){

      $status_akhir = $data->nama_pemilik;
      $alamat_pemilik = $data->alamat_pemilik;


      $lokasi = $data->lokasi_usaha;
      $str =  $lokasi;

      $getMaps =  (explode(",",$str));
                          
      $lat = $getMaps[0];
      $lon = $getMaps[1];

      ?>
      ['<?=$data->nama_pemilik;$alamat_pemilik;?>', <?=$lat;?>, <?=$lon;?>],
         <?php
          }
      ?>
        
    
    ];
     
    //Parameter Google maps
    var options = {
      zoom: 12, //level zoom
    //posisi tengah peta
      center: new google.maps.LatLng(1.045626, 104.030454),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };


    
   // Buat peta di 
    var map = new google.maps.Map(document.getElementById('peta'), options);

   // Tambahkan Marker 
  
    var infowindow = new google.maps.InfoWindow();

    var marker, i;
    var iconeMarker = 'img/'; 

    var statusIcone =  [
      iconeMarker + 'active_ukm.png',
      iconeMarker + 'pin2.png',
      iconeMarker + 'pin3.png'
    ] 

    var color = 'Submited (Terbuka)';

    if(color == 'Submited (Terbuka)'){
       iconCounter = 0;
    }else if(color == 'Proses (Terbuka)'){
      iconCounter = 1;
    }else if(color == 'Selesai (Tutup)'){
      iconCounter = 2;
    }

    /* kode untuk menampilkan banyak marker */
    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
    icon: statusIcone[iconCounter]
      });
     /* menambahkan event clik untuk menampikan
       infowindows dengan isi sesuai denga
      marker yang di klik */
    
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  

  };

})();

  </script>
   <div id="peta"></div>
   


   