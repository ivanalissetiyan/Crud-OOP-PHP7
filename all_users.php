<?php 

session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
//include('header.php');
include('header.php');

$userYangLogin = $_SESSION['username'];

require_once('fungsi/fungsi_ukm.php');

$conn = new jalankanFungsi();

$table = 'tb_users';

if(!empty($_POST)){

     // loop data field
     foreach ($_POST['id'] as $key=>$val) {
      $id = (int) $_POST['id'][$key];

      // delete data
      $sql = $conn->deleteUser($id);

    }
    header('Location: all_users.php');
}

?>
<body id="page-top">

    <!-- Navigation -->
    <?php include('nav.php') ?>
    <!--end Navigation-->

    <div class="content-wrapper py-3">

        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">All Users</li>
            </ol>
            
            <?php include('notif.php') ?>
            
            <!-- Example Tables Card -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Data Table Example
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                    <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Delete</th>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>Option</th>
                                </tr>
                            </thead>                            
                        
                            <tbody> 

                                <?php 

                                    $result = $conn->tampil($table);

                                    $no = 0;

                                    while($row = mysqli_fetch_array($result)){
                                        $no++;
                                        echo '<tr>
                                                <td><input name="id[]" type="checkbox" value='.$row['id_user'].' />
                                                </td>
                                                <td>'.$no.'</td>
                                                <td>'.$row['username'].'</td>
                                                <td>'.$row['email'].'</td>
                                                <td>'.$row['level'].'</td>
                                                <td><a href="" class="delete" data-id='.$row['id_user'].' title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>&nbsp;
                                                    <a href="" data-toggle="modal" data-target="#myModal" class="update" data-id='.$row['id_user'].' title="Update"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>';
                                    }
                                    
                                ?>                                                         
                                
                             
                            </tbody>
                        </table>
                            <div class="form-group">
                                <input type="submit" name="" value="delete" class="btn btn-danger">
                            </div>
                        </form>
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('.delete').click(function(){
                                        var id_user = $(this).data('id');
                                        
                                        if (confirm("Sure want delete it ?") == true) {
                                            
                                            $.ajax({
                                                url : 'core/deleteUser.php',
                                                type: 'POST',
                                                data: 'id_user='+id_user,
                                                success:function(data){
                                                          
                                                } 

                                            });

                                            alert('success delete user');
                                            window.location.href='all_users.php';  
                                        } else {
                                            txt = "You pressed Cancel!";
                                        }
                                        
                                });

                                $('.update').click(function(){
                                    var id_user = $(this).data('id');
                                    //alert(id_user);
                                    $.ajax({
                                        url: 'core/getidUser.php',
                                        type: 'GET',
                                        data: 'id_user='+id_user,
                                        success:function(data){
                                            $('#result').html(data);
                                        }
                                    });
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class="card-footer small text-muted">
                    Updated yesterday at 11:59 PM

                </div>

                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update User</h4>
                      </div>
                      <div class="modal-body">
                        <div id="result">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

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