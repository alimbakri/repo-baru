<?php 
	require __DIR__."/index_act.php";
?>



<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">SURAT MASUK</h5>
				<p>
					<a href="?pages=surat_masuk/add" class="btn btn-primary btn-sm">
						<i class="fas fa-plus"></i>
					</a>
				</p>
				<p>
					<div class="table-responsive">	
						<table class="table table-bordered" style="width:100%">
							<thead>	
								<tr>
									<th>Tanggal Masuk</th>
									<th>Nomor Surat</th>
									<th>Tanggal Surat</th>
									<th>Pengirim</th>
									<th>Tujuan Surat</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>	
								<?php foreach ($rs_array as $key => $value):?>
									<tr>
										<td><?=$value->tanggal_masuk?></td>
										<td><?=$value->nomor?></td>
										<td><?=$value->tanggal_surat?></td>
										<td><?=$value->pengirim?></td>
										<td><?=$value->tujuan?></td>
										<td>
											<?php if($value->pathfile==='default.png'):?>
												<a href="?pages=surat_masuk/upload&id=<?=$value->id?>" class="btn btn-primary btn-sm">
													<i class="fas fa-upload"></i>
												</a>
											<?php else: ?>
												<a target="_blank" href="<?=$BASE_URL."statics/surat_masuk/".$value->pathfile?>" class="btn btn-success btn-sm">
													<i class="fas fa-file"></i>
												</a>
												<a href="?pages=surat_masuk/upload&id=<?=$value->id?>" class="btn btn-primary btn-sm">
													<i class="fas fa-upload"></i>
												</a>
											<?php endif; ?>
										</td>
										
									</tr>
								<?php endforeach;?>
							</tbody>
						
						</table>
					</div>
				</p>
			</div>
		</div>
		
	</div>
</div>
