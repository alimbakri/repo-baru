<?php 
	require __DIR__."/index_act.php";
?>



<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Manajemen User</h5>
				<p>
					<a href="?pages=user/add" class="btn btn-primary btn-sm">
						<i class="fas fa-plus"></i>
					</a>
				</p>
				<p>

					<table class="table table-bordered">
						<tr>
							<th>Email</th>
							<th>Username</th>
							<th>Role</th>
							<th><center>Aksi</center></th>
						</tr>
						<?php foreach ($lists as $key => $value): ?>
							<tr>
								<td><?=$value->email?></td>
								<td><?=$value->username?></td>
								<td><?=$value->role?></td>
								<td>
									<a href="?pages=user/view&id=<?=$value->id?>&action=none" class="btn btn-sm btn-primary">
										<i class="fas fa-edit"></i>
										Edit
									</a>
								
								<a href="?pages=user/hapus&id=<?= $value->id?>&action=hapus"
										  class="btn btn-sm btn-primary" onclick="return confirm('Yakin ingin menghapus?')">Hapus</span>
										
										</a>   
						
								</td>
							</tr>
						<?php endforeach ?>
					</table>
				</p>
			</div>
		</div>
		
	</div>
</div>
