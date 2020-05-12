<?php
require_once "../assets/db_connect.php";
//upload.php

if(!empty($_FILES))
{
	if(is_uploaded_file($_FILES['uploadFile']['tmp_name']))
	{
		sleep(1);
		$source_path = $_FILES['uploadFile']['tmp_name'];
		$namalogo=$_FILES['uploadFile']['name'];
		$target_path = '../images/' . $_FILES['uploadFile']['name'];
		if(move_uploaded_file($source_path, $target_path))
		{
			echo '<label>Gambar Login</label>';
			echo '<img class="card-img-top" src="'.$target_path.'">';
			$sql = "UPDATE konfigurasi SET image_login='$namalogo' WHERE id_conf='1'";
			$query = $connect->query($sql);
		}
	}
}

?>