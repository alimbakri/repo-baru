<?php 

require __DIR__."/env.php";
require __DIR__."/surat_masuk_keluar.php";
$post = [];
$get = [];
if (isset($_POST)) {
	$post = $_POST;
}

if (isset($_GET)) {
	$get = $_GET;
}
function ToObj($value=[])
{
	return json_decode(json_encode($value));
}

function HashPassword($value){
	return md5($value);
}
function CreateFullDate()
{
	$tgl  = date("d.m.Y");
	$expl = explode(".", $tgl);
	$fullDate = "";
	switch ($expl[1]) {
		case '01':
			$fullDate = "$expl[0] Januari $expl[2]";
			break;
		case '02':
			$fullDate = "$expl[0] Februari $expl[2]";
			break;
		case '03':
			$fullDate = "$expl[0] Maret $expl[2]";
			break;
		case '04':
			$fullDate = "$expl[0] April $expl[2]";
			break;
		case '05':
			$fullDate = "$expl[0] Mei $expl[2]";
			break;
		case '06':
			$fullDate = "$expl[0] Juni $expl[2]";
			break;
		case '07':
			$fullDate = "$expl[0] Juli $expl[2]";
			break;
		case '08':
			$fullDate = "$expl[0] Agustus $expl[2]";
			break;
		case '09':
			$fullDate = "$expl[0] September $expl[2]";
			break;
		case '10':
			$fullDate = "$expl[0] Oktober $expl[2]";
			break;
		case '11':
			$fullDate = "$expl[0] November $expl[2]";
			break;	
		default:
			$fullDate = "$expl[0] Desember $expl[2]";	
			break;
	}
	return $fullDate;
}