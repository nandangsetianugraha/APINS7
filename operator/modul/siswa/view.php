<?php
// Load file koneksi.php
require_once '../../../assets/db.php';
$ids=$_GET['ids'];
$query = "SELECT * FROM ijazah where peserta_didik_id='$ids' ORDER BY id DESC"; // Tampilkan semua data gambar dan urut berdasarkan yang terbaru
$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
	while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql

?>
<object data="../../../../images/ijazah/<?=$data['nama'];?>" type="application/pdf">
						<embed src="../../../../images/ijazah/<?=$data['nama'];?>" type='application/pdf'>
					</object>
<?php		
	}
}else{ // Jika data tidak ada
	echo "Belum Ada File Ijazah";
}
?>
</table>
