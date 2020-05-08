<?php
/**
 * Created by PhpStorm.
 * User: Abu Dzakiyyah
 * Date: 3/27/2018
 * Time: 9:23 PM
 */
include "../assets/db.php";
session_start();
$username = addslashes(trim($_POST['username']));
$username=filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$password = addslashes($_POST['password']);
$tapel=$_POST['tpl'];
$query			= mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username ='$username' and password='$password'")); // Check the table 
if($query>0){
	$nama	= mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username ='$username' and password='$password'")); // Check the table 
	$_SESSION['userid'] 	= $nama['ptk_id'];
	$_SESSION['level'] 		= $nama['level'];
	$_SESSION['guru']='pengelola';
	$_SESSION['tapel']=$tapel;
	$response = array("status"=>"login_sukses","level"=>$nama['level']);
}else{
	$response = array("status"=>"error_login");
};

echo json_encode($response);