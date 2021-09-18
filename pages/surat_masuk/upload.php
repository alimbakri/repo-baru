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
						<input type="file" class="form-control" name="file" id="pdf" onchange="setFile($(this))">
					</div>
					<div class="mb-3" id="content64">
						
					</div>
					<div class="mb-3">
						<button id="btn-kirim" class="btn btn-primary btn-sm">Kirim</button>
						<a  onclick="previewFile()" class="btn btn-primary btn-sm" href="#">View File</a>	
				</form>
			
			</div>
		</div>
		
	</div>
</div>
<script>
	function getBase64(file) {
		return new Promise((resolve, reject) => {
			const reader = new FileReader();
			reader.readAsDataURL(file);
			reader.onload = () => resolve(reader.result);
			reader.onerror = error => reject(error);
		});
	}
	$(document).ready(()=>{
		var fileName;
		$("#btn-kirim").hide();
		var iframe = `<iframe width='100%' height='800px' src='_CONTENT64_'></iframe>`
		window.setFile=(obj)=>{
			console.log(obj[0].value)
			fileName = obj[0].files[0]
			if(fileName.type!=="application/pdf"){
				alert("Hanya Menerima File PDF trabisa file laeng")
				$("#btn-kirim").hide();
			}else{
				$("#btn-kirim").show();
				
			}

		}

		window.previewFile = ()=>{
			let file = fileName
			let base64 = "";
			getBase64(file).then((result)=>{
				base64 = result;
				let iframex = iframe.replace(/_CONTENT64_/g,base64)
				$("#content64").html(iframex)
			})
		}

	})

</script>