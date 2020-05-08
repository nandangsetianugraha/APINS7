<?php

include("../../../assets/db_connect.php");
include("../../../assets/db.php");
$kelas=$_GET['kelas'];
$ab=substr($kelas,0,1);
$smt=$_GET['smt'];
if($kelas==0){
?>
<div class="alert alert-info alert-dismissible">
											<h4><i class="icon fa fa-info"></i> Informasi</h4>
											Silahkan Pilih Kelas
										</div>
<?php
}else{
	?>
<div class="modal-body">
							<div class="form-group form-group-default">
								<label>Kelas</label>
								<p class="form-control-static"><?=$kelas;?></p> 
								<input type="hidden" name="kelas" class="form-control" value="<?php echo $kelas;?>">
							</div>
							<div class="form-group form-group-default">
								<label>Semester</label>
								<p class="form-control-static"><?=$smt;?></p>
								<input type="hidden" name="smt" class="form-control" value="<?php echo $smt;?>">
							</div>
							<div class="form-group form-group-default">
								<label>Tema</label>
								<input type="text" name="tema" autocomplete=off class="form-control" placeholder="Tema">
							</div>
							<div class="form-group form-group-default">
								<label>Nama Tema</label>
								<input type="text" name="nama_tema" autocomplete=off class="form-control" placeholder="Nama Tema">
							</div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info btn-border btn-round btn-sm" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-info btn-border btn-round btn-sm">Simpan</button>
                        </div>
<?php }; ?>