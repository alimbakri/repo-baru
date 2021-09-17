<?php 
	require __DIR__."/list_act.php";
?>
<div class="row">
	<div class="col-12 col-lg-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">DISPOSISI SURAT</h5>
				<div class="col-lg-12 col-12">
					<table class='table table-bordered'>
						
					</table>
				</div>
				<div class='col-lg-12 col-12'>
					<div class="table-responsive">	
						<table class="table table-bordered" style="width:100%">
							<thead>	
								<tr>
									<th style="widrh:5em;">NOMOR AGENDA</th>
									<th><?=$lists[0]->nomor_agenda?></th>
									<th>ASAL SURAT</th>
									<th colspan=2><?=$lists[0]->asal_surat?></th>
								</tr>
								<tr>
									<th>NOMOR SURAT</th>
									<th><?=$lists[0]->nomor_surat?></th>
									<th>PERIHAL</th>
									<th colspan=2><?=$lists[0]->perihal?></th>
								</tr>
								<tr>
									<th colspan="5">
										DAFTAR DISPOSISI
									</th>
								</tr>
								<tr>
									
									
									<th>No.</th>
									<th>Tujuan</th>
									<th>Jabatan Tujuan</th>
									<th>Instruksi</th>
									<th>Catatan</th>
								</tr>
							</thead>
							<tbody>	
								<?php 
									$i=1;
									foreach ($lists as $key => $value):?>
									<tr>
										
										<td><?=$i?></td>
										<td><?=$value->tujuan->name?></td>
										<td><?=$value->tujuan->jname?></td>
										<td><?=$value->instruksi?></td>
										<td><?=$value->catatan?></td>
									</tr>
								<?php $i++;endforeach;?>
							</tbody>
						
						</table>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
