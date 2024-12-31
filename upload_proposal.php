<?php
session_start();
include('koneksi.php');
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
$user_id = $_SESSION['user_id'];
$judul = $_POST['judul'];
$file = $_FILES['file_proposal']['name'];
$target = "uploads/" . basename($file);

if (move_uploaded_file($_FILES['file_proposal']['tmp_name'], $target)) {
    $query = "INSERT INTO proposals (id_user, id_dosen, judul, file_proposal, tanggal_upload) VALUES (?, ?, ?, NOW())";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iss", $user_id, $judul, $target);

    if ($stmt->execute()) {
        header('Location: index.php#table-proposal');
    } else {
        echo "Upload failed: " . $stmt->error;
    }
} else {
    echo "Failed to upload file.";
}
?>
