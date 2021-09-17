<?php 
	require __DIR__."/view_act.php";
?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Disposisi Surat</h5>
				
				<p>
					<form method="POST" action="?pages=disposisi/save&id=<?=$get['id']?>">
						<div class="row">

							<div class="col-lg-6 col-12">
								<div class="mb-3">
									<label for="" class="form-label">Asal Surat</label>
									<div><?=$disp->pengirim?></div>
								</div>
								<div class="mb-3">
									<label for="" class="form-label">No. Surat</label>
									<div><?=$disp->nomor_surat?></div>
								</div>
								<div class="mb-3">
									<label for="" class="form-label">Tanggal Surat</label>
									<div><?=$disp->tanggal_surat?></div>
								</div>
							</div>
							
							<div class="col-lg-6 col-12">
								<div class="mb-3">
									<label for="" class="form-label">Diterima Tanggal</label>
									<div><?=$disp->tanggal_agenda?></div>
								</div>
								<div class="mb-3">
									<label for="" class="form-label">Nomor Agenda</label>
									<div><?=$disp->nomor?></div>
								</div>
							
								<div class="mb-3">
									<label for="" class="form-label">Sifat Surat</label>
									<div><?=$disp->sifat_surat?></div>
								</div>
							</div>
							<div class="col-lg-12 col-12">
								<hr>
								<div class="mb-3">
									<label for="" class="form-label">Perihal</label>
									<div><?=$disp->perihal?></div>
								</div>
								<hr>
							</div>
							
							<div class="col-lg-6 col-12">
								<div class="mb-3">
									<label for="" class="form-label">Diteruskan Ke</label>
									<select name="teruskan_ke" id="" class="form-control">
										<?php foreach($arr as $key => $value):?>
											<option value="<?=$value->id?>"><?=$value->name?> (<?=$value->roles?>)</option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							
							<div class="col-lg-6 col-12">
								<div class="mb-3">
									<label for="" class="form-label">Instruksi</label>
									<input type="text" name="instruksi" class="form-control">
								</div>
							</div>
							<div class="col-lg-12 col-12">
								<div class="mb-3">
									<label for="" class="form-label">Catatan</label>
									<textarea name="catatan" id="" cols="30" rows="10" class="form-control"></textarea>
								</div>
							</div>


						</div>
						<div class="mb-3">
							<button class="btn btn-primary">
								Simpan
							</button>
						</div>
					</form>
				</p>
			</div>
		</div>
		
	</div>
</div>
