<?php
$tempKriteria = json_decode($_POST['kriteria']);
$tempValues = json_decode($_POST['values']);
$tempNama = json_decode($_POST['nama']);

$kriteria = array();
$values = array();
$nama = array();
$rank = array();

foreach ($tempKriteria as $index => $value) {
	$temp = array();
	foreach ($value as $i => $isi) {
		array_push($temp, $isi);
	}
	array_push($kriteria, $temp);
}

foreach ($tempValues as $index => $value) {
	$temp = array();
	foreach ($value as $i => $isi) {
		array_push($temp, $isi);
	}
	array_push($values, $temp);
}

foreach ($tempNama as $index => $value) {
	array_push($nama, $value);
}

$N = normalisasi($kriteria, $values);
$Fstar = pembobotan($kriteria, $N);
$S = utilityS($Fstar);
$R = regretR($Fstar);
$Splus = plus($S);
$Smin = minus($S);
$Rplus = plus($R);
$Rmin = minus($R);
$V = 0.5;
$dq = perankinganQ($S, $R, $V);

for ($i = 0; $i < sizeof($nama); $i++) {
	$temp = array();
	for ($j = 0; $j < 2; $j++) {
		if ($j == 0)
			array_push($temp, $nama[$i]);
		else
			array_push($temp, $dq[$i]);
	}
	array_push($rank, $temp);
}

function sortByRank($a, $b)
{
	return $a[1] <=> $b[1];
}

usort($rank, 'sortByRank');
