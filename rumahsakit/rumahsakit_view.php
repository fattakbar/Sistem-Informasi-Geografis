<?php

					if(isset($_GET['act'])) {
						$id = $_GET['id'];
						$sql = "delete from rumahsakit where idrumahsakit='$id' ";
						mysql_query($sql) or die(mysql_error());

					}
					?>

<div>
	<h2 id="headings"> Data Rumah Sakit</h2>
	<table  class="table table-striped table-condensed">
		<thead>
			<th><td><b>Nama </b></td><td><b>Jenis</b></td><td><b>No telp</b></td><td><b>Alamat</b></td><td><b>Aksi</b></td></th>
		</thead>
		<tbody>
<?php
$batas='10';
$halaman=$_GET['halaman'];
$posisi=null;
if(empty($halaman)){
$posisi=0;
$halaman=1;
}else{
$posisi=($halaman-1)* $batas;
}
$query="SELECT rs.idrumahsakit,rs.nama,rs.jenis,k.nama as nama_kabupaten,rs.no_telp,rs.alamat
from rumahsakit as rs,kabupaten as k
where rs.idkabupaten=k.idkabupaten
limit $posisi,$batas ";
$result=mysql_query($query) or die(mysql_error());
$no=1;

while($rows=mysql_fetch_object($result)){

			?>
			<tr>
				<td><?php echo  $posisi+$no
				?></td>
				<td><?php		echo $rows -> nama;?></td>
				<td><?php		echo $rows -> jenis;?></td>
						<td><?php		echo $rows -> alamat;?></td>
				<td><?php echo $rows -> nama_kabupaten;?></td>
				<td>
					<a href="index.php?mod=rumahsakit&pg=peta&id=<?php echo 	$rows -> idrumahsakit;?>"

				class='btn'> <i class="icon-map-marker"></i></a>
					<a href="index.php?mod=rumahsakit&pg=rumahsakit_form&id=<?php echo 	$rows -> idrumahsakit;?>"

				class='btn'> <i class="icon-pencil"></i></a><a href="index.php?mod=rumahsakit&pg=rumahsakit_view&act=del&id=<?php echo 	$rows -> idrumahsakit;?>"
				onclick="return confirm('Yakin data akan dihapus?') ";
				class='btn'> <i class="icon-trash"></i></a></td>
			</tr>
			<?php

      $no++;
	}?>

			<tr>
				<td colspan='5' ></td><td><a href="index.php?mod=rumahsakit&pg=rumahsakit_form"
				class='btn'	><i class="icon-plus"></i></a></td>
			</tr>
		</tbody>
	</table>
	<?php

$tampil2 = mysql_query("SELECT idrumahsakit from rumahsakit");

$jmldata = mysql_num_rows($tampil2);
$jumlah_halaman = ceil($jmldata / $batas);

echo "<div class='pagination'> <ul>";
for($i = 1; $i <= $jumlah_halaman; $i++)

	echo "<li><a href='index.php?mod=rumahsakit&pg=rumahsakit_view&halaman=$i'>$i</a></li>";

?>
	</ul>
</div>
<br>
Jumlah data :<?php echo $jmldata;?>

<?php

if(isset($_GET['status'])) {
	if($_GET['status'] == 0) {
		echo " Operasi data berhasil";
	} else {
		echo "operasi gagal";
	}
}

?>

</div>
