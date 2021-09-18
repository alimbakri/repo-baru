
<?php 

require __DIR__."/config.php";

try{
	echo "Create table Jabatan";
	$sql = "CREATE TABLE IF NOT EXISTS jabatan(
		id INT(11) PRIMARY KEY AUTO_INCREMENT,
		name VARCHAR(20)
	)";
	$conn->query($sql);
	echo "\nCreate table Jabatan Complete\n";
	echo "Create table User";
	$sql = "CREATE TABLE IF NOT EXISTS user(
		id INT(11) PRIMARY KEY AUTO_INCREMENT,
		name VARCHAR(40),
		email VARCHAR(60),
		password VARCHAR(100),
		jabatan_id INT(11),
		INDEX user_jab_idx(jabatan_id),
		FOREIGN KEY (jabatan_id)
			REFERENCES jabatan(id)
			ON UPDATE CASCADE
			ON DELETE CASCADE
	)";
	$conn->query($sql);
	echo "\nCreate table User Complete\n";
	echo "ADD UNIQUE EMAIL on table User";
	$sql ="ALTER TABLE user ADD UNIQUE(email)";
	$conn->query($sql);
	echo "\nADD UNIQUE EMAIL on table User Complete\n";
	echo "Create table Menu";
	$sql = "CREATE TABLE IF NOT EXISTS menus(
				id INT(11) PRIMARY KEY AUTO_INCREMENT,
				kode_menu VARCHAR(100),
				caption VARCHAR(100),
				grup_menu ENUM('Data Referensi','Data Transaksi','Laporan')
			)";
	$conn->query($sql);
	echo "\nCreate table Menu Complete\n";
	echo "Create table Roles\n";
	$sql = "CREATE TABLE IF NOT EXISTS roles(
					id INT(11) PRIMARY KEY AUTO_INCREMENT,
					menu_id INT(11),
					jabatan_id INT(11),
					INDEX menu_role_idx(menu_id),
					INDEX jab_role_idx(jabatan_id),
					FOREIGN KEY (jabatan_id)
						REFERENCES jabatan(id)
						ON UPDATE CASCADE
						ON DELETE CASCADE,
					FOREIGN KEY (menu_id)
						REFERENCES menus(id)
						ON UPDATE CASCADE
						ON DELETE CASCADE
				)";
	$conn->query($sql);
	echo "Create table Roles Complete\n";

	echo "Create table surat masuk \n";
	$sql = "CREATE TABLE surat_masuk(
			id INT(11) PRIMARY KEY AUTO_INCREMENT,
			nomor VARCHAR(40),
			tanggal_masuk TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
			tanggal_surat DATE,
			user_id INT(11),
			jabatan_tujuan_id INT(11),
			perihal VARCHAR(100),
			lampiran VARCHAR(50),
			pengirim VARCHAR(40),
			sifat_surat VARCHAR(40),
			pathfile VARCHAR(225) DEFAULT 'default.png',
			INDEX surat_in_user_idx(user_id),
			INDEX surat_in_jabatan_tujuan_idx(jabatan_tujuan_id),
			FOREIGN KEY (user_id)
				REFERENCES user(id)
				ON UPDATE CASCADE
				ON DELETE CASCADE,
			FOREIGN KEY (jabatan_tujuan_id)
				REFERENCES jabatan(id)
				ON UPDATE CASCADE
				ON DELETE CASCADE
			)";
	$conn->query($sql);
	echo "\nCreate table surat complete\n";
	$sql = "CREATE TABLE agenda(
		id INT(11) PRIMARY KEY AUTO_INCREMENT,
		nomor VARCHAR(20),
		tanggal_agenda TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		surat_masuk_id INT(11),
		user_id INT(11),
		INDEX disp_surat_in_idx(surat_masuk_id),
		INDEX disp_user_idx(user_id),
		FOREIGN KEY (user_id)
			REFERENCES user(id)
			ON UPDATE CASCADE ON DELETE CASCADE,
		FOREIGN KEY (surat_masuk_id)
			REFERENCES surat_masuk(id)
			ON UPDATE CASCADE ON DELETE CASCADE)";
	$conn->query($sql);

	$sql = "CREATE TABLE disposisi(
		id INT(11) PRIMARY KEY AUTO_INCREMENT,
		teruskan_ke INT(11),
		agenda_id INT(11),
		user_id INT(11),
		instruksi LONGTEXT,
		catatan LONGTEXT,
		tanggal_disposisi TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		INDEX disp_terusan_idx(teruskan_ke),
		INDEX disp_user_idx(user_id),
		INDEX disp_agenda_idx(agenda_id),
		FOREIGN KEY (agenda_id)
			REFERENCES agenda(id)
			ON DELETE CASCADE ON UPDATE CASCADE,
		
		FOREIGN KEY (user_id)
			REFERENCES user(id)
			ON DELETE CASCADE ON UPDATE CASCADE,
		FOREIGN KEY (teruskan_ke)
			REFERENCES user(id)
			ON DELETE CASCADE ON UPDATE CASCADE
		
	)";
	$conn->query($sql);
	echo "\nCreate table surat complete\n";
	echo "ADD index  on table surat";

	$sql ="ALTER TABLE surat_masuk ADD UNIQUE(nomor)";
	$conn->query($sql);
	echo "\nADD index  on table surat complete\n";
	echo "Add Record To Role\n";
	$sql = "TRUNCATE jabatan,user";
	$conn->query($sql);
	$sql = "INSERT INTO jabatan(name) VALUES('Administrator Sistem')";
	$conn->query($sql);
	echo "Add Record To User\n";
	$sql = "INSERT INTO user(name,email,password,jabatan_id) VALUES('Administrator Sistem','katombo@gmail.com',MD5('admin'),1)";
	$conn->query($sql);
	$sql = "
	DROP TRIGGER insert_agenda;
	CREATE TRIGGER insert_agenda 
		BEFORE INSERT ON agenda 
		FOR EACH ROW 
			BEGIN
				INSERT INTO disposisi(teruskan_ke,agenda_id,user_id,instruksi,catatan)VALUES(NEW.user_id,NEW.id,NEW.user_id,'-','-');
			END;
	
	";
	$conn->multi_query($sql);
	var_dump($conn->errno);
}catch(\Exception $r){
	?>
	<pre>
		<?php var_dump($r) ?>
	</pre>
	<?php	
}
