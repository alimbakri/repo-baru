<?php 
	require __DIR__."/upload_act.php";
?>


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">UPLOAD FILE SURAT MASUK</h5>
				<form action="?pages=surat_masuk/upload_save&id=<?=$id?>" enctype="multipart/form-data" method="POST">
					<div class="mb-3">
						<input type="file" class="form-control" name="file">
					</div>
					<div class="mb-3">
						<button class="btn btn-primary btn-sm">Kirim</button>
						<button class="btn btn-primary btn-sm">View File</button>	
				</form>
			
			</div>
		</div>
		
	</div>
</div>
