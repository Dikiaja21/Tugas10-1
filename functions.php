<?php
//koneksi Database
$conn = mysqli_connect("localhost", "root", "", "fazztrack");

//tampilkan data ke home
$result = mysqli_query($conn, "SELECT * FROM prodak");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $row = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    $nama_produk = $data["nama_produk"];
    $keterangan = $data["keterangan"];
    $harga = $data["harga"];
    $jumlah = $data["jumlah"];

    //query insert data
    $query = "INSERT INTO prodak VALUE ('', '$nama_produk','$keterangan','$harga','$jumlah')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    $id = $data["id"];
    $nama_produk = $data["nama_produk"];
    $keterangan = $data["keterangan"];
    $harga = $data["harga"];
    $jumlah = $data["jumlah"];

    //query insert data
    $query = "UPDATE prodak SET
            nama_produk = '$nama_produk',
            keterangan = '$keterangan',
            harga = '$harga',
            jumlah = '$jumlah'
            WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM prodak WHERE id = $id");
    return mysqli_affected_rows($conn);
}
