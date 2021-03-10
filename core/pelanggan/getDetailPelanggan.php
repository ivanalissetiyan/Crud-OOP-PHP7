<?php 

require_once('../../fungsi/fungsi_ukm.php');

$conn = new jalankanFungsi();

if(isset($_GET['id'])){

    $table = "tb_data_pelanggan";
	$id =  $_GET['id'];

	$result = $conn->detail($id, $table);

	$row = mysqli_fetch_array($result);
    
    
}

?>   

<table>
    <tr>
        <td width="100">No Internet</td>
        <td width="10">:</td>
        <td><?php echo $row['no_internet'] ?></td>
    </tr>
    <tr>
        <td width="100">No Telpon</td>
        <td width="10">:</td>
        <td><?php echo $row['no_telp'] ?></td>
    </tr>
    <tr>
        <td width="200">Tanggal Pasang</td>
        <td width="10">:</td>
        <td><?php echo $row['tanggal_pasang'] ?></td>
    </tr>
    <tr>
        <td width="200">Segment</td>
        <td width="10">:</td>
        <td><?php echo $row['segment'] ?></td>
    </tr>
    <tr>
        <td width="200">nama</td>
        <td width="10">:</td>
        <td><?php echo $row['nama'] ?></td>
    </tr>
    <tr>
        <td width="200">Alamat</td>
        <td width="10">:</td>
        <td><?php echo $row['alamat'] ?></td>
    </tr>
    <tr>
        <td width="200">Kelurahan</td>
        <td width="10">:</td>
        <td><?php echo $row['kelurahan'] ?></td>
    </tr>
    <tr>
        <td width="200">Kota</td>
        <td width="10">:</td>
        <td><?php echo $row['kota'] ?></td>
    </tr>
    <tr>
        <td width="200">Kontak</td>
        <td width="10">:</td>
        <td><?php echo $row['contact_person'] ?></td>
    </tr>
    <tr>
        <td width="200">Email</td>
        <td width="10">:</td>
        <td><?php echo $row['email'] ?></td>
    </tr>
</table>