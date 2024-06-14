<?php
    include "koneksi.php";

    $npm = $_GET['id'];

    $proses = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $npm") or die (mysqli_error($koneksi));

    if ($proses) {
        echo "
            <script>
                alert('Data berhasil dihapus');
                window.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal dihapus');
                window.location.href = 'index.php';
            </script>
        ";
    }
?>