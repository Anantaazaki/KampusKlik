<?php
    include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cari Data Mahasiswa</h1>
    <form action="cari_data.php" method="POST">
        <input type="text" name="query" placeholder="Ketikkan nama mahasiswa atau program studi">
        <input type="submit" value="Search">
    </form>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $query = $_POST['query'];
        $sql = "SELECT * FROM users WHERE nama_mahasiswa LIKE '%$query%' OR email LIKE '%$query%'";
        $result = $koneksi->query($sql);
        
        if ($result->num_rows > 0) {
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>NAMA MAHASISWA</th>
                        <th>PRODI MAHASISWA</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"]. "</td>
                        <td>" . $row["nama_mahasiswa"]. "</td>
                        <td>" . $row["prodi"]. "</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    }

    $koneksi->close();
?>
