<?php

class jalankanFungsi {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "dewi_fitri";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function login($username, $password){
		$link = $this->conn;
		$sql = "SELECT * FROM tb_users WHERE username ='$username' AND password ='$password'";
		$result = mysqli_query($link, $sql);

		return $result;
	}

	function menus($level){
		$link = $this->conn;
		$sql  = "SELECT * FROM tb_menus WHERE level='$level'";
		$result = mysqli_query($link, $sql);
		return $result;
	}

	function pesanBarang($nama_barang, $merek, $jumlah_barang){
		$link = $this->conn;
		$sql  = "INSERT INTO order_barang (nama_barang, merek, jumlah, status) VALUES ('$nama_barang', '$merek', '$jumlah_barang', 'in')";
		$result = mysqli_query($link, $sql);
		return $result;
	}

	function tambahMenu($namaMenu, $url, $level){
		$link = $this->conn;
		$sql  ="INSERT INTO tb_menus (menu, link, level) VALUES ('$namaMenu', '$url', '$level')";
		$result = mysqli_query($link, $sql);
		return $result;
	}

	function tampil($table){
		$link = $this->conn;
		$sql = "SELECT * FROM $table";
		$result = mysqli_query($link, $sql);

		return $result;
	}
	
	function addUser($username, $password, $email, $level){
		$link = $this->conn;
		$sql = "INSERT INTO tb_users (username, password, email, level) VALUES ('$username', '$password', '$email', '$level')";
		$result = mysqli_query($link, $sql);

		return $result;
	}

	// Tampil data pelanggan 
	function tampilDataKelas()
	{
		$link = $this->conn;
		$sql = "select * from data_kelas";
		$result = mysqli_query($link, $sql);

		return $result;
	}

	function addKelas($nama_kelas, $kode_kelas, $tanggal){
		$link = $this->conn;
		$sql = "INSERT INTO data_kelas(nama_kelas, kode_kelas, tanggal) VALUES ('$nama_kelas', '$kode_kelas', '$tanggal')";
		$result = mysqli_query($link, $sql);

		return $result;
	}

	function addData($table, $nama_dosen, $lulusan, $tahun){
		$link = $this->conn;
		$sql  = "INSERT INTO $table (nama_dosen, lulusan, tahun) VALUES ('$nama_dosen', '$lulusan', '$tahun')";
		$result = mysqli_query($link, $sql);

		return $result;
	}

	function addDataKurikulum($table, $nama_kurikulum, $semester, $tanggal){
		$link = $this->conn;
		$sql  = "INSERT INTO $table (nama_kurikulum, semester, tanggal) VALUES ('$nama_kurikulum', '$semester', '$tanggal')";
		$result = mysqli_query($link, $sql);

		return $result;
	}

	function showData($table, $order)
	{
		$link = $this->conn;
		$sql  = "SELECT * FROM 	$table ORDER BY $order DESC";
		$result = mysqli_query($link, $sql);

		return $result;
	}

	function showChartDataKomputer()
	{
		$link = $this->conn;
		$sql  = "SELECT
					count(*) as total,
					tahun, 
					bulan
				FROM
					v_data_komputer
				GROUP BY bulan";

		$result = mysqli_query($link, $sql);

		$dt = [];
		foreach($result as $key => $row)
		{
			if(!isset($dt[$row['tahun']])){
				for ($i=1; $i <=12 ; $i++) { 
					$dt[$row['tahun']][$i] = 0;				
				}
			}	
			
			$dt[$row['tahun']][$row['bulan']] = $row['total'];
		
		}	

		return $dt;
	
		
	}

	function showChartDataKelas()
	{
		$link = $this->conn;
		$sql  = "SELECT
					count(*) as total,
					tahun, 
					bulan
				FROM
					v_data_kelas
				GROUP BY bulan";

		$result = mysqli_query($link, $sql);

		$dt = [];
		foreach($result as $key => $row)
		{
			if(!isset($dt[$row['tahun']])){
				for ($i=1; $i <=12 ; $i++) { 
					$dt[$row['tahun']][$i] = 0;				
				}
			}	
			
			$dt[$row['tahun']][$row['bulan']] = $row['total'];
		
		}	

		return $dt;
	
		
	}

	function showChartDataDosen()
	{
		$link = $this->conn;
		$sql  = "SELECT
					count(*) as total,
					tahun, 
					bulan
				FROM
					v_data_dosen
				GROUP BY bulan";

		$result = mysqli_query($link, $sql);

		$dt = [];
		foreach($result as $key => $row)
		{
			if(!isset($dt[$row['tahun']])){
				for ($i=1; $i <=12 ; $i++) { 
					$dt[$row['tahun']][$i] = 0;				
				}
			}	
			
			$dt[$row['tahun']][$row['bulan']] = $row['total'];
		
		}	

		return $dt;
	
		
	}

	function showChartDataKurikulum()
	{
		$link = $this->conn;
		$sql  = "SELECT
					count(*) as total,
					tahun, 
					bulan
				FROM
					v_data_kurikulum
				GROUP BY bulan";

		$result = mysqli_query($link, $sql);

		$dt = [];
		foreach($result as $key => $row)
		{
			if(!isset($dt[$row['tahun']])){
				for ($i=1; $i <=12 ; $i++) { 
					$dt[$row['tahun']][$i] = 0;				
				}
			}	
			
			$dt[$row['tahun']][$row['bulan']] = $row['total'];
		
		}	

		return $dt;
	
		
	}

	function showChartKurikulum2(){
		$link = $this->conn;
		$sql  = "SELECT
					count(*) as total,
					tahun, 
					bulan
				FROM
					v_data_kurikulum
				GROUP BY bulan";

		$result = mysqli_query($link, $sql);
		$dt = [];

		foreach($result as $key => $row)
		{
			$dt[$key] = $row['total'];
		}

		echo $dt;
		
	}
	
	
	//Tampil data pendaftaran

	function tampilDataPelanggan()
	{
		$link = $this->conn;
		$sql  = "SELECT * FROM tb_data_pelanggan ORDER BY id DESC";

		$result = mysqli_query($link, $sql);

		return $result;
	}

	function detail($id, $table)
	{
		$link = $this->conn;
		$sql  = "SELECT * FROM $table WHERE id = '$id' ORDER BY id DESC";

		$result = mysqli_query($link, $sql);

		return $result;
	}

	function addPelanggan($no_internet, $no_telp, $tgl_pasang, $segment, $nama, $alamat, $kelurahan, $kota, $contact, $email)
	{
		$link = $this->conn;
		$sql = "INSERT INTO tb_data_pelanggan (no_internet, 
												no_telp, 
												tanggal_pasang, 
												segment, 
												nama, 
												alamat, 
												kelurahan, 
												kota, 
												contact_person, 
												email) VALUES ('$no_internet', 
																'$no_telp', 
																'$tgl_pasang', 
																'$segment', 
																'$nama', 
																'$alamat', 
																'$kelurahan', 
																'$kota', 
																'$contact',
																'$email')";

		$result = mysqli_query($link, $sql);

		return $result;
	}

	function updatePelanggan($id,$no_internet,$no_telp,$tgl_pasang,$segment,$nama,$alamat,$kelurahan,$kota,$contact,$email){
		
		$link = $this->conn;
		$sql  = "UPDATE tb_data_pelanggan SET no_internet = '$no_internet',
										  		no_telp = '$no_telp',        
										  		tanggal_pasang = '$tgl_pasang',   
										  		segment = '$segment',        
										  		nama = '$nama',           
									      		alamat = '$alamat',         
										  		kelurahan = '$kelurahan',     
										  		kota = '$kota',           
										  		contact_person = '$contact',        
										  		email = '$email'
										  WHERE id=".$id;
		$result = mysqli_query($link, $sql);

		return $result;
	}

	// Keluhan

	function addKeluhan($references,$date_create,$service_number,$subject,$nama,$contact_person,$no_pengaduan)
	{
		$link = $this->conn;
		$sql = "INSERT INTO tb_data_keluhan(referensi, 
												date_create, 
												service_number, 
												subject_p, 
												nama, 
												contact_person, 
												no_pengaduan) VALUES ('$references', 
																'$date_create', 
																'$service_number', 
																'$subject', 
																'$nama', 
																'$contact_person', 
																'$no_pengaduan')";

		$result = mysqli_query($link, $sql);

		return $result;
	}

	function updateKeluhan($id,$references,$date_create,$service_number,$subject,$nama,$contact_person,$no_pengaduan){
		
		$link = $this->conn;
		$sql  = "UPDATE tb_data_keluhan SET referensi = '$references',
										  		date_create = '$date_create',        
										  		service_number = '$service_number',   
										  		subject_p = '$subject',        
										  		nama = '$nama',           
									      		contact_person = '$contact_person',         
										  		no_pengaduan = '$no_pengaduan'
										  WHERE id=".$id;
		$result = mysqli_query($link, $sql);

		return $result;
	}


	// Status Internet
	function addStatus($no_internet,$no_telp,$nama,$alamat,$status,$status_port,$status_bayar)
	{
		$link = $this->conn;
		$sql = "insert into tb_status_internet(no_internet, 
												no_telp, 
												nama, 
												alamat, 
												status, 
												status_port, 
												status_bayar) values ('$no_internet', 
																'$no_telp', 
																'$nama', 
																'$alamat', 
																'$status', 
																'$status_port', 
																'$status_bayar')";

		$result = mysqli_query($link, $sql);

		return $result;
	}

	function updateStatus($id,$no_internet,$no_telp,$nama,$alamat,$status,$status_port,$status_bayar){
		
		$link = $this->conn;
		$sql  = "update tb_status_internet set no_internet = '$no_internet',
										  		no_telp = '$no_telp',        
										  		nama = '$nama',   
										  		alamat = '$alamat',        
										  		status = '$status',           
									      		status_port = '$status_port',         
										  		status_bayar = '$status_bayar'
										  where id=".$id;
		$result = mysqli_query($link, $sql);

		return $result;
	}

	// Tagihan Pelanggan
	function addTagihan($periode,$mata_uang,$jumlah_tagihan,$belum_bayar,$status_pembayaran,$lokasi_pembayaran,$cicilan,$tanggal,$jam){
		
		$link = $this->conn;
		$sql = "insert into tb_tagihan_pelanggan(periode, 
												mata_uang, 
												jumlah_tagihan, 
												belum_bayar, 
												status_pembayaran, 
												lokasi_pembayaran, 
												cicilan,
												tanggal,
												jam) values ('$periode', 
															'$mata_uang', 
															'$jumlah_tagihan', 
															'$belum_bayar', 
															'$status_pembayaran', 
															'$lokasi_pembayaran', 
															'$cicilan',
															'$tanggal',
															'$jam')";

		$result = mysqli_query($link, $sql);

		return $result;
	}

	function updateTagihan($id,$periode,$mata_uang,$jumlah_tagihan,$belum_bayar,$status_pembayaran,$lokasi_pembayaran,$cicilan,$tanggal,$jam){
		
		$link = $this->conn;
		$sql  = "update tb_tagihan_pelanggan set periode = '$periode',
										  		mata_uang = '$mata_uang',        
										  		jumlah_tagihan = '$jumlah_tagihan',   
										  		belum_bayar = '$belum_bayar',        
										  		status_pembayaran = '$status_pembayaran',           
									      		lokasi_pembayaran = '$lokasi_pembayaran',         
												cicilan = '$cicilan',
												tanggal = '$tanggal',
												jam = '$jam'
										  where id=".$id;
		$result = mysqli_query($link, $sql);

		return $result;
	}

	function delete($id, $table)
	{
		$link = $this->conn;
		$sql = "DELETE FROM $table WHERE id = '$id'";
		$result = mysqli_query($link, $sql);

		return $result;
	}


	
	//detail ukm
	function detailLokasi($id_ukm){
		$link = $this->conn;
		$sql = "SELECT * FROM tb_masterukm WHERE id_ukm ='$id_ukm'";
		$result = mysqli_query($link, $sql);

		return $result;
	}	

	function tampilUsers(){
		$link = $this->conn;
		$sql = "SELECT * FROM users ORDER BY id ASC";
		$result = mysqli_query($link, $sql);

		return $result;
	}

	function getUserId($id){
		$link = $this->conn;
		$sql = "SELECT * FROM tb_users WHERE id_user = '$id'";
		$result = mysqli_query($link, $sql);

		return $result;
	}

	function updateUser($username, $level, $id){
		$link = $this->conn;
		$sql  = "UPDATE tb_users SET level = '$level', username = '$username' WHERE id_user = '$id'";
		$result = mysqli_query($link, $sql);

		return $result;
	}

	function tampilBarang($id){
		$link = $this->conn;
		$sql  = "SELECT * FROM order_barang WHERE id = '$id'";
		$result = mysqli_query($link, $sql);

		return $result;
	}

	function deleteUser($id){
		$link = $this->conn;
		$sql = "DELETE FROM tb_users WHERE id_user = '$id'";
		$result = mysqli_query($link, $sql);

		return $result;
	}

	function deleteUkm($id_ukm){

		$link = $this->conn;
		$sql = "DELETE FROM tb_masterukm WHERE id_ukm = '$id_ukm'";
		$result = mysqli_query($link, $sql);

		return $result;
	}
}

?>