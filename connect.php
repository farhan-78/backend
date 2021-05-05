<?php 
class database{
	var $host = "localhost";
	var $username = "root";
	var $email = "";
    var $tanggal_lahir = "";
    var $umur = "";
    var $jeniskelamin = "";
    var $telpon = "";
    var $password = "";
    var $alamat = "";
	var $database = "info";
	var $koneksi;
 
	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
	}
 
 
	function register($username,$email,$tanggal_lahir,$umur,$jeniskelamin,$telpon,$password,$alamat)
	{	
		$insert = mysqli_query($this->koneksi,"insert into acc values ('','$username','$email','$tanggal_lahir','$umur','$jeniskelamin','$telpon','$password','$alamat')");
		return $insert;
	}
 
	function login($username,$password,$remember)
	{
		$query = mysqli_query($this->koneksi,"select * from acc where username='$username'");
		$data_user = $query-> fetch_array();
		if(password_verify($password,$data_user['password']))
		{
			
			if($remember)
			{
				setcookie('username', $username, time() + 
					(60 * 60 * 24 * 4), '/');
				setcookie('nama', $data_user['nama'], time() + 
					(60 * 60 * 24 * 4), '/');
			}
			$_SESSION['username'] = $username;
			$_SESSION['nama'] = $data_user['nama'];
			$_SESSION['is_login'] = TRUE;
			return TRUE;
		}
	}
 
	function relogin($username)
	{
		$query = mysqli_query($this->koneksi,"select * from acc where username='$username'");
		$data_user = $query-> fetch_array();
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $data_user['nama'];
		$_SESSION['is_login'] = TRUE;
	}
} 
 
 
?>