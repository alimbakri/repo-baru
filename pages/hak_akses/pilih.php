<?php 
	require __DIR__."/pilih_act.php";
$script = '
	<script>
		$(document).ready(()=>{
			window.onChangeValue = (obj)=>{
				let checked = obj.prop("checked")
				let id = obj.data("id");
				let xxid = `input[xid="${id}"]`
				if(checked){
					$(xxid).val(id)
				}else{
					$(xxid).val("")
				}
			}
		});
	</script>
';
?>


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Hak Akses Untuk Jabatan <?= $data->name?></h5>
				
				<p>
					<form method="POST" action="?pages=hak_akses/pilih&action=save&id=<?=$data->id?>">
						<p>
							<table class="table table-bordered">
								<tr>
									<th>Menu</th>
									<th>+</th>
								</tr>
								<?php foreach ($list_mnu as $key => $value):?>
									<tr>
										<td><?=$value->caption?></td>
										<td>
											<input type="hidden" name="menu_id[]" xid="<?=$value->id?>" value="">
											<input onchange="onChangeValue($(this))" data-id="<?=$value->id?>" <?=(!$value->role->is_valid ? "":"checked")?>  id="menu-<?=$value->id?>" type="checkbox">
											<label for="menu-<?=$value->id?>" class="text-primary">Pilih</label>
										</td>
									</tr>
								<?php endforeach ?>
							</table>
						</p>
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
