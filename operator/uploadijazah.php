<?php
// Load file koneksi.php
include "../assets/db.php";

if($_FILES["file"]["name"] != '')
{
$ids=$_GET['ids'];
 $test = explode('.', $_FILES["file"]["name"]);
 $ext = end($test);
 $name = 'ijazah_'.rand(). '.' . $ext;
 $location = '../../images/ijazah/' . $name;  
 move_uploaded_file($_FILES["file"]["tmp_name"], $location);
 $sql_query = "SELECT * FROM ijazah WHERE peserta_didik_id = '".mysqli_escape_string($koneksi, $ids)."'";		
		$resultset = mysqli_query($koneksi, $sql_query) or die("database error:". mysqli_error($koneksi));	
$ada=mysqli_num_rows($resultset);		
		if($ada>0) {     
			$ava=mysqli_fetch_array($resultset);
			$flama=$ava['nama'];
			$hapusFile = "../../images/ijazah/".$flama;
			if(file_exists($hapusFile)){
				unlink($hapusFile);
			};
			$sql_update = "UPDATE ijazah set nama='".mysqli_escape_string($koneksi,$name)."' WHERE peserta_didik_id = '".mysqli_escape_string($koneksi, $ids)."'";
			mysqli_query($koneksi, $sql_update) or die("database error:". mysqli_error($koneksi));
		}else{
			$sql_update = "INSERT INTO ijazah(id,peserta_didik_id,nama) VALUES('','".$ids."','".$name."')";
			mysqli_query($koneksi, $sql_update) or die("database error:". mysqli_error($koneksi));
		};
?>
<object data="<?=$location;?>" type="application/pdf">
						<embed src="<?=$location;?>" type='application/pdf'>
					</object>
<?php
}
?>
