<?php 
	require __DIR__."/index_act.php";
?>



<div class="row">
	<div class="col-12 col-lg-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">AGENDA SURAT</h5>
				<div class='col-lg-12 col-12'>
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
											<a href="<?=$BASE_URL."statics/surat_masuk/".$value->pathfile?>" class="btn btn-sm btn-primary" target="_blank">
													<i class="fas fa-download"></i>&nbsp;Download
												</a>
											<?php if($value->pathfile==='default.png'):?>
												No Action Need
											<?php else: ?>
												<a href="?pages=agenda/save&id=<?=$value->id?>" class="btn btn-success btn-sm">
                                                    Agendakan
                                                </a>
                                                <a href="?pages=agenda/tolak&id=<?=$value->id?>" class="btn btn-danger btn-sm">
                                                    Tolak
                                                </a>
											<?php endif; ?>
											
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
