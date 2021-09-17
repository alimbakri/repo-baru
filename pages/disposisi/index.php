<?php 
	require __DIR__."/index_act.php";
?>



<div class="row">
	<div class="col-12 col-lg-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">DISPOSISI SURAT</h5>
			
				<div class='col-lg-12 col-12'>
					<div class="table-responsive">	
						<table class="table table-bordered" style="width:100%">
							<thead>	
								<tr>
									<th>Nomor Surat</th>
									<th>Nomor Agenda</th>
									<th>Tanggal Agenda</th>
									<th>Sifat Surat</th>
									<th>Pengirim</th>
									<th>Perihal</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>	
								<?php foreach ($rs_array as $key => $value):?>
									<tr>
										<td><?=$value->nomor_surat?></td>
										<td><?=$value->nomor_agenda?></td>
										<td><?=$value->tanggal_agenda?></td>
										<td><?=$value->sifat_surat?></td>
										<td><?=$value->pengirim?></td>
										<td><?=$value->perihal?></td>
										<td>
											<?php if($value->disp_key&&$value->disp_btn):?>
												<a href="?pages=disposisi/view&id=<?=$value->id?>" class="btn btn-sm btn-success">
													<i class="fas fa-paper-plane"></i>&nbsp;Disposisi
												</a>
												<a href="?pages=disposisi/list&id=<?=$value->id?>" class="btn btn-sm btn-primary">
													<i class="fas fa-search"></i>&nbsp;Cek Disposisi
												</a>
												
											<?php elseif($value->disp_key):?>
												
											<?php endif;?>
											<a href="<?=$BASE_URL."statics/surat_masuk/".$value->pathfile?>" class="btn btn-sm btn-primary" target="_blank">
													<i class="fas fa-download"></i>&nbsp;Download
												</a>
										</td>
									</tr>
								<?php endforeach;?>
							</tbody>
						
						</table>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
