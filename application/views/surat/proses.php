<?php
// print_r($siswa);
if (!empty($penduduk)) {
  echo (
  $penduduk[0]['id']."|".
  $penduduk[0]['nik'].'|'.
  $penduduk[0]['nama']."|".
  $penduduk[0]['tempat_lahir']."|".
  $penduduk[0]['tanggal_lahir']."|".
  $penduduk[0]['kewarganegaraan']."|".
  $penduduk[0]['agama']."|".
  $penduduk[0]['alamat']);
}
else {
  echo "Not Found|Not Found";
}
/*print_r (explode("|",$datamix));*/


?>
