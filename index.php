<title>Export data ke dalam format Excell dengan PHP</title>
<form method="POST" action="ubah_format.php">
<select name="nim">
<?php
include('konfig.php');
$q = mysql_query("SELECT * FROM pw_mst_mahasiswa");

$noData = 1;

while ($data = mysql_fetch_array($q))
{
   echo "<option value='".$data['nim']."'>".$data['nama_mhs']."</option>";
}
?>
</select>
<input type="submit" value="Export Data">
</form>
