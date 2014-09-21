<table>
<th>No.</th>
<th>NIM</th>
<th>Nama Mahasiswa</th>
<th>Kode MK</th>
<th>Mata Kuliah</th>
<th>Nama Dosen</th>
<th>Nilai</th>
<?php

	$nama_file = $_POST['nim']."_laporan_nilai.xls";

	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
	header("Content-Type: application/force-download");
	header("Content-Type: application/octet-stream");
	header("Content-Type: application/download");
	header("Content-Disposition: attachment;filename=".$nama_file."");
	header("Content-Transfer-Encoding: binary ");

	include('konfig.php');
	$q = mysql_query("SELECT * FROM eva_tr_nilai left join (ja_mst_dosen,ja_mst_mk,pw_mst_mahasiswa) on 
	eva_tr_nilai.kode_dosen=ja_mst_dosen.kode_dosen and eva_tr_nilai.kode_mk=ja_mst_mk.kode_mk and eva_tr_nilai.nim=pw_mst_mahasiswa.nim where 
	eva_tr_nilai.nim='$_POST[nim]'");

	$no = 1;

	while ($data = mysql_fetch_array($q))
	{
	   echo "<tr><td>".$no."</td>";
	   echo "<td>".$data['nim']."</td>";
	   echo "<td>".$data['nama_mhs']."</td>";
	   echo "<td>".$data['kode_mk']."</td>";
	   echo "<td>".$data['nama_mk']."</td>";
	   echo "<td>".$data['nama_dosen']."</td>";
	   echo "<td>".$data['grade']."</td></tr>";
	   $no++;
	}

?>
</table>
