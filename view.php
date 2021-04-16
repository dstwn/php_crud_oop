<?php
    include 'database.php';
    $db = new Database();  
?>
<h1>CRUD OOP PHP</h1>
<h3>Data User</h3>
<?php
    if (isset($_GET['msg1']) == "insert") {
      echo "Berhasil input data!";
      } 
    if (isset($_GET['msg2']) == "update") {
      echo "Berhasil update data!";
    }
    if (isset($_GET['msg3']) == "delete") {
      echo "Berhasil menghapus data!";
    }
?>
<br>
<a href="input.php">Input Data</a>
<table border="1">
	<tr>
		<th>No</t	h>
		<th>Nama</th>
		<th>Alamat</th>
		<th>Usia</th>
		<th>Opsi</th>
	</tr>
	<?php
	$no = 1;
	$users  = $db->render();
	if(is_array($users)){
		foreach($users as $x){
		?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $x['nama']; ?></td>
				<td><?php echo $x['alamat']; ?></td>
				<td><?php echo $x['usia']; ?></td>
				<td>
					<a href="edit.php?id=<?php echo $x['id']; ?>&aksi=edit">Edit</a>
					<a href="proses.php?id=<?php echo $x['id']; ?>&aksi=destroy">Hapus</a>			
				</td>
			</tr>
		<?php 
		}
	}
	?>
</table>
