<?php 
	require __DIR__."/index_act.php";
?>



<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Role</h5>
				<p>
					<a href="?pages=jabatan/add" class="btn btn-primary btn-sm">
						<i class="fas fa-plus"></i>
					</a>
				</p>
				<p>

					<table class="table table-bordered">
						<tr>
							<th>Jabatan</th>
							<th>Aksi</th>
						</tr>
						<?php foreach($rows as $key => $value): ?>
							<tr>
								<td><?=$value->name?></td>
								<td>
									<a href="?pages=jabatan/view&action=none&id=<?=$value->id?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i> Edit</a>
									<a href="?pages=hak_akses/pilih&action=none&id=<?=$value->id?>" class="btn btn-sm btn-primary"><i class="fas fa-cog"></i> Hak Akses</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</table>
				</p>
			</div>
		</div>
		
	</div>
</div>
