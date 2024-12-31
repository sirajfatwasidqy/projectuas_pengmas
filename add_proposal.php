<?php
include('koneksi.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $file_proposal = $_FILES['file_proposal']['name'];
    $file_tmp = $_FILES['file_proposal']['tmp_name'];
    $tanggal_upload = date('Y-m-d H:i:s');
    move_uploaded_file($file_tmp, "uploads/" . $file_proposal);
$query = "INSERT INTO proposals (id_user, id_dosen, judul, file_proposal, tanggal_upload) 
              VALUES (1, '$judul', '$file_proposal', '$tanggal_upload')";  
if ($conn->query($query) === TRUE) {
        header("Location: table_proposal.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
