<?php 
	require __DIR__."/add_act.php";

?>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Manajemen User</h5>
				
				<p>
					<form method="POST" action="?pages=user/save">
						<div class="mb-3">
							<label for="" class="form-label">Email</label>
							<input name="email" required type="email" required class="form-control">
						</div>
						<div class="mb-3">
							<label for="" class="form-label">Nama</label>
							<input name="name" required type="text" required class="form-control">
						</div>
						<div class="mb-3">
							<label for="" class="form-label">Password</label>
							<input name="password" required type="password" required class="form-control">
						</div>
						<div class="mb-3">
							<label for="" class="form-label">Role</label>
							<select name="jabatan_id" required id="" class="form-control">
								<option value="">--PILIH--</option>
								<?php foreach ($roles as $key => $value): ?>
									<option value="<?=$value->id?>"><?=$value->name?></option>
								<?php endforeach; ?>
							</select>
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
