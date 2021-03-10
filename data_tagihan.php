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
$table = "tb_tagihan_pelanggan";
$datanya = $conn->tampil($table);


?>
<style>
      #map {
        width:500px;
        height: 300px;
      }
.controls {
  margin-top: 10px;
  border: 1px solid transparent;
  border-radius: 2px 0 0 2px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  height: 32px;
  outline: none;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}

#pac-input {
  background-color: #fff;
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
  margin-left: 0px;
  padding: 0 11px 0 13px;
  text-overflow: ellipsis;
  width: 300px;
}

#pac-input:focus {
  border-color: #4d90fe;
}

.pac-container {
  font-family: Roboto;
}

#type-selector {
  color: #fff;
  background-color: #4d90fe;
  padding: 5px 11px 0px 11px;
}

#type-selector label {
  font-family: Roboto;
  font-size: 13px;
  font-weight: 300;
}
.modal-lg {
    max-width: 80% !important;
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
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Tagihan Pelanggan</li>
            </ol>
            <button onClick="tambahTagihan()" style="margin-bottom:10px;" class="btn btn-primary btn-xs">Tambah</button>
            <button id="btnExport" style="margin-bottom:10px;" class="btn btn-warning btn-xs"><i class="fa fa-file-excel-o "></i> Cetak excel</button>
            <!-- Example Tables Card -->
            <div class="card mb-3">
                <div class="card-block">
                    <div class="table-responsive" id="cetak-hasil">
                        <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>periode</th>
                                    <th>mata_uang</th>
                                    <th>jumlah_tagihan</th>
                                    <th>belum_bayar</th>
                                    <th>status_pembayaran</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach ($datanya as $key => $row) {
                                    
                                        ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $row['periode'] ?></td>
                                        <td><?php echo $row['mata_uang'] ?></td>
                                        <td><?php echo $row['jumlah_tagihan'] ?></td>
                                        <td><?php echo $row['belum_bayar'] ?></td>
                                        <td><?php echo $row['status_pembayaran'] ?></td>
                                        <td><button  data-id="<?php echo $row['id'] ?>" data-toggle="modal" data-target="#modalEdit" class="btn btn-success btn-sm btn-edit">Edit</button> <button  data-id="<?php echo $row['id'] ?>" class="btn btn-danger btn-sm delete-p">Hapus</button></td>
                                    </tr>
                                    <?php    
                                    }
                                    ?>
                                </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">
                    Updated yesterday at 11:59 PM
                </div>
            </div>

            </div>
            
        </div>
        <!-- /.container-fluid -->

        <!-- Modal -->
        

        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Detail Pelanggan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div id="result_modal"></div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                </div>

                </div>
            </div>
        </div>
        <!-- End Modal -->

        <!-- The Modal -->
        <div class="modal" id="modalEdit">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Tagihan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div id="result_modal_edit"></div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                </div>

                </div>
            </div>
        </div>
        <!-- End Modal -->


    </div>
    <!-- /.content-wrapper -->
    <script type="text/javascript">
    $(document).ready(function(){
        $('.delete-p').click(function(){
        var id_p = $(this).data('id');
                                            
        if (confirm("Sure want delete it ?") == true) {
                                                
            $.ajax({
            url : 'core/tagihan/deleteTagihan.php',
            type: 'POST',
            data: {id:id_p},
            success:function(data){
                alert('success delete tagihan pelanggan');
                window.location.href='data_tagihan.php';    
                } 
            });                        
            } else {
                txt = "You pressed Cancel!";
            }
                                            
        });


        $('.btn-edit').click(function(){
        var id_p = $(this).data('id');
        //alert(id_user);
            $.ajax({
                url: 'core/tagihan/editTagihan.php',
                type: 'GET',
                data: {id:id_p},
                success:function(data){
                    $('#result_modal_edit').html(data);
                }
            });
        });

        $('#btnExport').click(function(){

            var tableID = 'dataTable';
            var filename = 'Data Tagihan Pelanggan'
            var downloadLink;
            var dataType = 'application/vnd.ms-excel';
            var tableSelect = document.getElementById(tableID);
            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
            
            // Specify file name
            filename = filename?filename+'.xls':'excel_data.xls';
            
            // Create download link element
            downloadLink = document.createElement("a");
            
            document.body.appendChild(downloadLink);
            
            if(navigator.msSaveOrOpenBlob){
                var blob = new Blob(['\ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob( blob, filename);
            }else{
                // Create a link to the file
                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
            
                // Setting the file name
                downloadLink.download = filename;
                
                //triggering the function
                downloadLink.click();
                }
            });
        
        });
        
    </script>

    <?php include('footer.php') ?>
    <script>
    function tambahTagihan()
    {
        window.location="tambah_tagihan.php";
    }
    </script>
    
</body>

</html>