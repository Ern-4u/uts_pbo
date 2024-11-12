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
   
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama_barang=input($_POST["nama_barang"]);
        $stok=input($_POST["stok"]);
        $harga_beli=input($_POST["harga_beli"]);
        $harga_jual=input($_POST["harga_jual"]);
        


        //Query input menginput data kedalam tabel anggota
        $sql="insert into tbl_barang (nama_barang,stok,harga_beli,harga_jual) values
		('$nama_barang','$stok','$harga_beli','$harga_jual')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

    
        if ($hasil) {
            echo "<div class='alert alert-success'>Data berhasil disimpan!</div>";
            header("Location: index.php");
        } else {
            echo "<div class='alert alert-danger'>Data Gagal disimpan. Error: " . mysqli_error($kon) . "</div>";
        }
        

    }
    ?>
    <br>
    <h2>
        <center>Input Data</center>
    </h2> 
    <br>
    <br>
    


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
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
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
