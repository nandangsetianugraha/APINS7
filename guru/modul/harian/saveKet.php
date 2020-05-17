<?php
include_once("../../../assets/db.php");
$idp=$_REQUEST['id'];
$smt=$_REQUEST['smt'];
$tapel=$_REQUEST['tapel'];
$mpid=$_REQUEST['mp'];
$ab=$_REQUEST['kelas'];
$nilai=$_REQUEST['value'];
$tema=$_REQUEST['tema'];
$kd=$_REQUEST['kd'];
$jns=$_REQUEST['jns'];
$cek="select * from nk where id_pd='$idp' AND kelas='$ab' AND smt='$smt' AND tapel='$tapel' AND mapel='$mpid' and tema='$tema' and kd='$kd' and jns='$jns'";
$hasil=mysqli_query($koneksi,$cek);
$ada = mysqli_num_rows($hasil);
if(is_numeric($nilai)){
    if($nilai>100){
		
	}else{
        if ($ada>0){
			$utt=mysqli_fetch_array($hasil);
			$idn=$utt['idNH'];
        	if($nilai==0 or $nilai==""){
        		$sql="DELETE FROM nk WHERE idNH='$idn'";
				mysqli_query($koneksi, $sql) or die("database error:". mysqli_error($koneksi));
				echo "saved";
        	}else{ 
        		$sql = "UPDATE nk SET nilai='$nilai' WHERE idNH='$idn'";
				mysqli_query($koneksi, $sql) or die("database error:". mysqli_error($koneksi));
				echo "saved";
        	};
        }else{
        	$sql = "INSERT INTO nk VALUES('','$idp','$ab','$smt','$tapel','$mpid','$tema','$kd','$jns','$nilai')";
			mysqli_query($koneksi, $sql) or die("database error:". mysqli_error($koneksi));
			echo "saved";
        };
        
    };
};
?>