<?php 
	require __DIR__."/view_act.php";

$script = "
	<script>
		$(document).ready(()=>{
			$('#save-btn').hide();
			$('#save-btn-act').show();
			window.aktif = ()=>{
				$('#save-btn').show();
				$('#save-btn-act').hide();
				$('input').attr('readonly',false)
				$('input').focus()

			}

			})
	</script>
";
?>


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Jabatan</h5>
				
				<p>
					<form method="POST" action="?pages=jabatan/index&action=update&id=<?=$_GET['id']?>">
						<div class="mb-3">
							<label for="" class="form-label">Jabatan</label>
							<input name="name" readonly value="<?=$data['name']?>" type="text" required class="form-control">
						</div>
						<div class="mb-3">
							<button id="save-btn" class="btn btn-success">
								Update
							</button>
							<a href="#" onclick = "aktif()" id="save-btn-act" class="btn btn-success">
								Edit
							</a>
						</div>
					</form>
				</p>
			</div>
		</div>
		
	</div>
</div>


