<?php
    include "tampil_data.php";
   

    $data_edit = isset($_GET['id']) ? mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id = " . $_GET['id'])) : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
    <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <style>
        @media print{
            .x {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="span9" id="content">
        
        <div class="row-fluid">
            
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="x muted pull-left">Data Mahasiswa</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <form action= "<?php echo isset($data_edit['id']) ? 'edit_data.php?id=' . $data_edit['id'] . '&proses=1' : 'proses.php'; ?>" method="POST" class="x form-horizontal">
                            <fieldset>
                            <legend>Input Data Mahasiswa</legend>
                            <div class="control-group">
                                <label class="control-label" for="nama">NAMA MAHASISWA</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge focused" id="NPM" name="nama" value="<?php echo isset($data_edit['nama_mahasiswa']) ? $data_edit['nama_mahasiswa'] : ''; ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="prodi">PRODI MAHASISWA</label>
                                <div class="controls">
                                <input type="text" class="input-xlarge focused" id="NPM" name="prodi" value="<?php echo isset($data_edit['prodi']) ? $data_edit['prodi'] : ''; ?>">
                                </div>
                            </div>

                            

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">PROSES</button>
                                <button type="reset" class="btn">CANCEL</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
             <div class="navbar navbar-inner block-header">
                <form action="index.php" method="GET" class="x form-inline" style="margin-top: 20px;">
                    <input type="text" name="search" class="input-xlarge focused" placeholder="Ketikkan nama atau prodi" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                    <button type="submit" class="btn">Search</button>
                     <button onclick="printTable()" class="btn btn-primary" style="margin-left: 400px">Print</button>
                </form>
            </div>  
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Data Mahasiswa</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID Mahasiswa</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Prodi Mahasiswa</th>
                                    <th class="x">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $search_query = '';
                                    if (isset($_GET['search'])) {
                                        $search = $_GET['search'];
                                        $search_query = " WHERE nama_mahasiswa LIKE '%$search%' OR prodi LIKE '%$search%'";
                                    }

                                    $result = mysqli_query($koneksi, "SELECT * FROM mahasiswa" . $search_query);
                                    while ($data = mysqli_fetch_assoc($result)) {
                                ?>
                                <?php
                                ?>

                                <tr>
                                    <td><?php echo $data['id'] ?></td>
                                    <td><?php echo $data['nama_mahasiswa'] ?></td>
                                    <td><?php echo $data['prodi'] ?></td>
                                    <td class="x">
                                        <a href="index.php?id=<?php echo $data['id']; ?>">Edit |</a> 
                                        <a href="hapus_data.php?id=<?php echo $data['id']; ?>">Hapus</a>
                                    </td>
                                </tr>

                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>