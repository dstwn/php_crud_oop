<?php
class Database{
    //variable yg kita butuhkan
    var $host      = "localhost:3309";
    var $uname     = "root";
    var $pass      = "";
    var $db        = "oop";
    var $koneksi;

    //kontruktor, akan di eksekusi saat kelas parent dipanggil
    function __construct(){
        $this->koneksi = new mysqli(
            $this->host,
            $this->uname,
            $this->pass,
            $this->db
        );
        if(mysqli_connect_errno()){
            echo "koneksi gagal : ".mysqli_connect_error();
        }else {
            return $this->koneksi;
        }
    }
    // Fungsi untuk fetch semua data, 
    // akan meretrun dalam bentuk Array dan akan ditampilkan di view
    function render(){
        $query = "SELECT * FROM user";
        $data = $this->koneksi->query($query);
        if($data->num_rows>0){
            $result = array();
            while($d = $data->fetch_assoc()){
                $result[] = $d;
            }
            return $result;
        }else{
            echo "Tidak ada data";
        }
        
    }
    //FUngsi untuk menyimpan data ke database dengan menerima parameter $nama $alamat $usia
    function save($nama,$alamat,$usia){
        $query = "INSERT INTO user(nama,alamat,usia) VALUES('$nama','$alamat','$usia')";
		$sql   = $this->koneksi->query($query);
        if($sql == true){
            header("Location:view.php?msg1=insert");
        }else{
            echo "gagal input data";
        }
	}	
    // Fungsi untuk render view berdasarkan id tertentu, 
    // akan meretrun dalam bentuk Array dan akan ditampilkan di view
    function getById($id){
        $query = "SELECT * FROM user WHERE id='$id'";
        $sql = $this->koneksi->query($query);
        if($sql->num_rows>0){
            while($d = $sql->fetch_assoc()){
                $result[] = $d;
            }
        return $result; 
        }else {
            echo "data tidak ada";
        }
    }
    //Fungsi untuk update data, dengan menerima parameter $id sebagai identitas dan data yang dibawa
    //$nama $alamat $usia 
    function update($id,$nama,$alamat,$usia){
        $query = "UPDATE user SET nama='$nama',alamat='$alamat',usia='$usia' WHERE id='$id'";
        $sql = $this->koneksi->query($query);
        if($sql == true){
            header("Location:view.php?msg2=update");
        }else{
            echo "gagal memperbarui data!";
        }
    }
    //FUngsi untuk menghapus data berdasarkan ID tertentu
    function destroy($id){
        $query = "DELETE FROM user WHERE id='$id'";
        $sql = $this->koneksi->query($query);
        if($sql == true){
            header("Location:view.php?msg3=delete");
        }else{
            echo "Gagal hapus data!";
        }   
    }

}
?>