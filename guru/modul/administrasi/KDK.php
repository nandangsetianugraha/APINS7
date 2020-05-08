<?php 
require_once '../../../assets/db_connect.php';
$kelas=$_GET['kelas'];
$ab=substr($kelas,0,1);
$peta=$_GET['aspek'];
$mpid=$_GET['mp'];
?>
<?php if($mpid==0){ ?>
<div class="alert alert-info alert-dismissible">
											<h4><i class="icon fa fa-info"></i> Informasi</h4>
											Silahkan Pilih Mata Pelajaran
										</div>
<?php }else{ ?>
		<table id="KDTablek" class="table table-bordered table-hover">
									<thead>
							   <tr>
									<th>KD</th>
									<th>Deskripsi</th>
									<th></th>
								</tr>
							</thead>
									<tbody>	
		<?php 
		$sql = "select * from kd where kelas='$kelas' and aspek='$peta' and mapel='$mpid' order by kd asc";
		$query = $connect->query($sql);
		$ada=$connect->query("select * from kd where kelas='$kelas' and aspek='$peta' and mapel='$mpid'")->num_rows;
		if($ada>0){
		while($s=$query->fetch_assoc()) {
			$ids=$s['id_kd'];

			$actionButton = '
			<a href="#editKD" class="btn btn-icon btn-link btn-xs" type="button" id="'.$ids.'" data-toggle="modal" data-id="'.$ids.'"><i class="fa fa-edit"></i></a>
			<button class="btn btn-icon btn-link btn-xs" data-toggle="modal" data-target="#removeKDModal" onclick="removeKD('.$s['id_kd'].')"> <i class="fa fa-trash"></i></button>
			';
		?>
		<tr>
			<td><?=$s['kd'];?></td>
			<td><?=$s['nama_kd'];?></td>
			<td><?=$actionButton;?></td>
		</tr>
		<?php
		}}else{
		?>
		<tr>
			<td colspan="3">Data Belum Ada</td>
		</tr>
		<?php }; ?>
																	
									</tbody>
								</table>
		<?php if($mpid==0){}else{ ?>
		<div class="modal fade" id="tambahKDk">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">KD Ketrampilan Kelas <?=$ab;?></h4>
              </div>
              <form class="form" action="../modul/administrasi/tambahKDk.php" method="POST" id="createKDFormk">
                        <div class="modal-body">
							<div class="form-group form-group-default">
								<label>Mata Pelajaran</label>
								<input type="hidden" id="kelas" name="kelask" class="form-control" value="<?php echo $ab;?>">
								<input type="hidden" id="mapel" name="mapelk" class="form-control" value="<?php echo $mpid;?>">
								<input type="hidden" id="aspek" name="aspekk" class="form-control" value="4">
								<?php $nmp=$connect->query("select * from mapel where id_mapel='$mpid'")->fetch_assoc();?>
								<input type="text" class="form-control" placeholder="Name" value="<?php echo $nmp['nama_mapel'];?>">
							</div>
							<div class="form-group form-group-default">
								<label>Kompetensi Dasar</label>
								<input type="text" id="kd" name="kdk" autocomplete=off class="form-control" placeholder="Name" value="4.">
							</div>
							<div class="form-group form-group-default">
								<label>Deskripsi KD</label>
								<textarea id="deskripsi" name="deskripsik" class="form-control" aria-label="With textarea"></textarea>
							</div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-danger waves-effect waves-light">Simpan</button>
                        </div>
						</form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		
		<!--Delete KD-->
		<div class="modal fade" id="removeKDModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus</h4>
              </div>
                        <div class="modal-body">
							<p>Hapus KD ini dari Kelas <?=$ab;?>?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-danger waves-effect waves-light" id="removeBtn">Ya</button>
                        </div>
			</div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		<?php }}; ?>