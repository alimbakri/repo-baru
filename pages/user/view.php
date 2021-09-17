<?php 
	require __DIR__."/view_act.php";
	$script='
		<script>
			$(document).ready(()=>{
			
				window.activeButtons=()=>{
					$("#edit-button").hide(100);
					$("#activate-button").show(100);
					$("input").attr("readonly",true);
					$("select").attr("readonly",true);
				}
				window.deactiveButtons=()=>{
					$("#edit-button").show(100);
					$("#activate-button").hide(100);
					$("input").attr("readonly",false);
					$("select").attr("readonly",false);
					$("#email").attr("readonly",true);
				}
				activeButtons()
				window.EDIT = ()=>{
					deactiveButtons();
				}
			})
		</script>
	';
?>


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Manajemen User</h5>
				<p>
					<form method="POST" action="?pages=user/update&id=<?=$data->id?>">
						<div class="mb-3">
							<label for="" class="form-label">Email</label>
							<input id="email"readonly value="<?=$data->email?>" name="email" required type="email" required class="form-control">
						</div>
						<div class="mb-3">
							<label for="" class="form-label">Nama</label>
							<input value="<?=$data->name?>" name="name" required type="text" required class="form-control">
						</div>
						<div class="mb-3">
							<label for="" class="form-label">Password</label>
							<input name="password" required type="password" required class="form-control">
						</div>
						<div class="mb-3">
							<label for="" class="form-label">Role</label>
							<select value="<?=$data->email?>" name="jabatan_id" required id="" class="form-control">
								<option value="">--PILIH--</option>
								<?php foreach ($roles as $key => $value): ?>
									<option <?=($value->id===$data->jabatan_id ? "selected":"")?> value="<?=$value->id?>"><?=$value->name?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="mb-3">
							<button id="edit-button" class="btn btn-primary">
								Update
							</button>
							<a href="#" onclick="EDIT()" id="activate-button" class="btn btn-success btn-sm">
								Edit
							</a>
						
						</div>
			
					</form>
					
				</p>
			</div>
		</div>
		
	</div>
</div>
