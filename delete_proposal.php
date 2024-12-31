<?php
include('koneksi.php');
$id = $_GET['id'];
$query = "DELETE FROM proposal_dosen WHERE id_proposal = $id";
if ($conn->query($query) === TRUE) {
    header("Location: table_proposal.php");
} else {
    echo "Error: " . $conn->error;
}
?>
