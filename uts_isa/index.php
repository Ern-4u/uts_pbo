<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>
    Muhammad Isa Irawanto
</title>
<body class = "p-3 mb-2 bg-dark text-white">
    <nav class="navbar">
            <span class="navbar-brand">UTS Muhammad Isa Irawanto (42423049) </span>
    </nav>
<div class="container">
    <br>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
    <h4>TABEL BARANG</h4>
    <br>
    <p>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
    </p>
<?php

    require "database.php";


    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id_barang'])) {
        $id_barang=htmlspecialchars($_GET["id_barang"]);

        $sql="delete from tbl_barang where id_barang='$id_barang' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


    <table class="table-bordered" >
        <thead class= "my-3 table table-bordered">
            <tr class="bg-primary"> 
                      
                <th >No</th>
                <th >Nama Barang</th>
                <th >Stok</th>
                <th >Harga Beli</th>
                <th >Harga Jual</th>
                <th >Aksi</th>

            </tr>
        </thead>

        <?php
        require_once "database.php";

        $sql="select * from tbl_barang order by id_barang desc";
        
        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
        <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama_barang"]; ?></td>
                <td><?php echo $data["stok"];   ?></td>
                <td><?php echo $data["harga_beli"];   ?></td>
                <td><?php echo $data["harga_jual"];   ?></td>
                <td>
                    <a href="update.php?id_barang=<?php echo htmlspecialchars($data['id_barang']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_barang=<?php echo $data['id_barang']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
        </tbody>
            <?php
        }
        ?>
    </table>
</div>
</body>
</html>
