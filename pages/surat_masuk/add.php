<?php 
	require __DIR__."/add_act.php";
?>



<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">SURAT MASUK</h5>
				<form action="?pages=surat_masuk/save" method="POST">
					<div class="row">
						<div class="col-md-6 col-12">
							<div class="mb-3">
								<label required for="" class="form-label">Tanggal Surat</label>
								<input type="date" name="tanggal_surat" class="form-control">
							</div>
							<div class="mb-3">
								<label for="" class="form-label">Nomor Surat</label>
								<input required type="text" maxlength="100" name="nomor" class="form-control">
							</div>
							<div class="mb-3">
								<label for="" class="form-label">Perihal Surat</label>
								<input required type="text"  name="perihal" class="form-control">
							</div>
							<div class="mb-3">
								<label for="" class="form-label">Sifat Surat</label>
								<select required name="sifat_surat" id="" class="form-control">
									<option value="Segera">Segera</option>
									<option value="Sangat Segera">Sangat Segera</option>
									<option value="Rahasia">Rahasia</option>
								</select>	
							</div>
						</div>
						<div class="col-md-6 col-12">
							<div class="mb-3">
								<label for="" class="form-label">Lampiran Surat </label>
								<input required type="text"  name="lampiran" class="form-control">
							</div>
							<div class="mb-3">
								<label for="" class="form-label">Pengirim</label>
								<input required type="text" name="pengirim" class="form-control">
							</div>
							<div class="mb-3">
								<label for="" class="form-label">Tujuan Surat</label>
								<select required name="jabatan_tujuan_id" id="" class="form-control">
										<option value="">--PILIH PENERIMA--</option>
									<?php foreach ($penerima as $key => $value): ?>
										<option value="<?=$value->id?>"><?=$value->name?></option>
									<?php endforeach ?>
								</select>
							</div>							
						</div>
					</div>
					<div class="mb-3">
						<button class="btn btn-primary btn-sm">Kirim</button>
					</div>	
				</form>
			</div>
		</div>
		
	</div>
</div>
