<?php
include('koneksi.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $file_proposal = $_FILES['file_proposal']['name'];
    $file_tmp = $_FILES['file_proposal']['tmp_name'];
     if ($file_proposal) {
        move_uploaded_file($file_tmp, "uploads/" . $file_proposal);
        $query = "UPDATE proposals SET judul = '$judul', file_proposal = '$file_proposal' WHERE id_proposal = $id";
    } else {
        $query = "UPDATE proposals SET judul = '$judul' WHERE id_proposal = $id";
    }

    if ($conn->query($query) === TRUE) {
        header("Location: table_proposal.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
