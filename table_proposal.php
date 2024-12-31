<?php
include ('koneksi.php'); 
?>
<?php
$result = $conn->query("SELECT * FROM proposal_dosen");
?>

<style>
/* Style umum untuk body */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f4f9;
  color: #333;
  line-height: 1.6;
}

/* Container utama untuk dashboard */
.dashboard-container {
  display: flex;
  min-height: 100vh;
}

/* Sidebar style */
.sidebar {
  width: 200px;
  background-color: #f4f4f4;
  padding: 20px;
  box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
}

.sidebar h3 {
  margin-bottom: 10px;
}

.sidebar ul {
  list-style: none;
  padding: 0;
}

.sidebar ul li {
  margin-bottom: 10px;
}

.sidebar ul li a {
  text-decoration: none;
  color: #333;
  transition: color 0.3s;
}

.sidebar ul li a:hover {
  color: #007BFF;
}

/* Konten utama */
.content {
  flex-grow: 1;
  padding: 20px;
}

/* Detail profil */
.profile-details {
  background: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.profile-image {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  margin-top: 10px;
}

/* Style untuk tabel */
table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  background-color: #f4f4f4;
}

table thead {
  background-color: #333;
  color: white;
}

table th, table td {
  padding: 12px;
  text-align: left;
  border: 1px solid #ddd;
}

/* Hover effect untuk baris tabel */
table tbody tr:hover {
  background-color: #e0e0e0;
}

/* Style untuk link aksi */
a {
  color: #007bff;
  text-decoration: none;
  font-weight: bold;
}

a:hover {
  text-decoration: underline;
}

form {
  margin: 20px 0;
  padding: 20px;
  background-color: #f4f4f4;
  border-radius: 5px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

form label {
  display: block;
  margin-bottom: 8px;
  font-weight: bold;
}

form input[type="text"],
form input[type="file"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ddd;
  border-radius: 5px;
  box-sizing: border-box;
}

form button {
  background-color: #007bff;
  color: white;
  border: none;
  padding: 10px 15px;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  font-weight: bold;
}

form button:hover {
  background-color: #0056b3;
}
</style>
<table>
    <thead>
        <tr>
            <th>ID Proposal</th>
            <th>ID Dosen</th>
            <th>Judul</th>
            <th>File Proposal</th>
            <th>Tanggal Upload</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id_proposal']; ?></td>
                <td><?php echo $row['id_dosen']; ?></td>
                <td><?php echo $row['judul']; ?></td>
                <td><?php echo $row['file_proposal']; ?></td>
                <td><?php echo $row['tanggal_upload']; ?></td>
                <td>
                    <a href="edit_proposal.php?id=<?php echo $row['id_proposal']; ?>">Edit</a> |
                    <a href="delete_proposal.php?id=<?php echo $row['id_proposal']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<form action="add_proposal.php" method="POST" enctype="multipart/form-data">
    <label>Judul</label>
    <input type="text" name="judul" required><br>
<label>File Proposal</label>
    <input type="file" name="file_proposal" required><br>
    <button type="submit">Tambah Proposal</button>
    <a href="index.php" style="text-decoration: none;">
    <button type="button" style="background-color: blue; color: white; border: none; padding: 10px 20px; cursor: pointer;">
        Kembali ke Dashboard
    </button></a>
</form>

