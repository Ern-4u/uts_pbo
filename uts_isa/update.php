<!DOCTYPE html>
<html>
<head>
    <title>Form Barang</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body class = "background">

<div class="container">
    <?php

    //Include file koneksi, untuk koneksikan ke database
    include "database.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_peserta
    if (isset($_GET['id_barang'])) {
        $id_barang=input($_GET["id_barang"]);

        $sql="select * from tbl_barang where id_barang=$id_barang";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_barang=htmlspecialchars($_POST["id_barang"]);
        $nama_barang=input($_POST["nama_barang"]);
        $stok=input($_POST["stok"]);
        $harga_beli=input($_POST["harga_beli"]);
        $harga_jual=input($_POST["harga_jual"]);

        //Query update data pada tabel anggota
        $sql="update tbl_barang set
			nama_barang='$nama_barang',
			stok='$stok',
			harga_beli='$harga_beli',
			harga_jual='$harga_jual'
			where id_barang=$id_barang";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }

    ?>
    <br>
    <h2>
        <center>Update Data</center>
    </h2>
    <br>
    <br>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        
        <div class="form-group row">
            <label for="colFormLabelSm" class="col-sm-2 col-form-label ">NAMA BARANG</label>
            <div class="col-sm-10">
                <input type="text" class="form-control " id="colFormLabel" placeholder="Masukan Nama Barang" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabelSm" class="col-sm-2 col-form-label ">STOK</label>
            <div class="col-sm-10">
                <input type="int" class="form-control " id="colFormLabel" placeholder="Masukan Jumlah Stok Barang" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabelSm" class="col-sm-2 col-form-label ">HARGA BELI</label>
            <div class="col-sm-10">
                <input type="int" class="form-control " id="colFormLabel" placeholder="Masukan Harga Beli" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabelSm" class="col-sm-2 col-form-label ">HARGA JUAL</label>
            <div class="col-sm-10">
                <input type="int" class="form-control " id="colFormLabel" placeholder="Masukan Harga jual" required/>
            </div>
        </div>
        <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
