<?php
$conn = mysqli_connect("localhost","root","","inventaris_kantor");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambahpinjam($data){
    global $conn;
    $nip = $data["nip"];
    $kode = $data["kode"];
    $nama = $data["nama"];
    $dom = $data["dom"];
    $tgl = $data["tgl"];

        // query insert data
        $query = "INSERT INTO peminjam
        VALUES
        ('$nip', '$kode', '$nama', '$dom', '$tgl', '') ";  
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapuspinjam($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM peminjam WHERE nip_peminjam = $id");
    return mysqli_affected_rows($conn);
}


function updatepinjam($data){
    global $conn;
    $id = $data ["id"];
    $kode = $data["kode"];
    $nama = $data["nama"];
    $dom = $data["dom"];
    $tgl = $data["tgl"];
    $bit = $data["bit"];

        // query insert data
        $query = "UPDATE peminjam SET 
        
        kode_barang = '$kode',
        nama_peminjam = '$nama',
        domisili_peminjam ='$dom',
        tanggal_pinjam = '$tgl',
        IS_DELETED = '$bit'
        WHERE nip_peminjam = $id
        ";  

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function caripmj($keyword) {
    $query = "SELECT * FROM peminjam 
    WHERE
    nama_peminjam LIKE '%$keyword%' OR
    nip_peminjam LIKE '%$keyword%' OR
    domisili_peminjam LIKE '%$keyword%'
    ";
    return query ($query);
}


function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);


    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if( mysqli_fetch_assoc($result) ) {
        echo "
        <script>
        alert('Username sudah terdaftar')
        </script>";
        return false;
        
    }

    if ($password !== $password2) {
        echo "<script>
        alert('Konfirmasi Password tidak sesuai')
        </script>";
    return false;    
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES('', '$username'
    , '$password','user')");

    return mysqli_affected_rows($conn);
}



function caripj($keyword) {
    $query = "SELECT * FROM pj_barang 
    WHERE
    nama_pj LIKE '%$keyword%' OR
    nip_pj LIKE '%$keyword%' OR
    domisili_pj LIKE '%$keyword%'
    ";
    return query ($query);
}

function hapuspj($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM pj_barang WHERE nip_pj = $id");
    return mysqli_affected_rows($conn);
}


function tambahpj($data){
    global $conn;
    $nip = $data["nip"];
    $kode = $data["kode"];
    $nama = $data["nama"];
    $dom = $data["dom"];

        // query insert data
        $query = "INSERT INTO pj_barang
        VALUES
        ('$nip', '$nama', '$kode', '$dom', '') ";  
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function updatepj($data){
    global $conn;
    $id = $data ["id"];
    $kode = $data["kode"];
    $nama = $data["nama"];
    $dom = $data["dom"];
    $bit = $data["bit"];

        // query insert data
        $query = "UPDATE pj_barang SET 
        
        kode_barang = '$kode',
        nama_pj = '$nama',
        domisili_pj ='$dom',
        IS_DELETED = '$bit'
        WHERE nip_pj = $id
        ";  

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function caribarang($keyword) {
    $query = "SELECT * FROM barang
    WHERE
    nama_barang LIKE '%$keyword%' OR
    kondisi_barang LIKE '%$keyword%' 
    ";
    return query ($query);
}

function tambahbarang($data){
    global $conn;
    $kondisi = $data["kondisi"];
    $kode = $data["kode"];
    $nama = $data["nama"];
    $tgl = $data["tgl"];

        // query insert data
        $query = "INSERT INTO barang
        VALUES
        ('$kode', '$nama', '$kondisi', '$tgl', '') ";  
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusbarang($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM barang WHERE kode_barang = $id");
    return mysqli_affected_rows($conn);
}

function updatebarang($data){
    global $conn;
    $id = $data ["id"];
    $tgl = $data["tgl"];
    $nama = $data["nama"];
    $kon = $data["kon"];
    $bit = $data["bit"];

        // query insert data
        $query = "UPDATE barang SET 
        
        tanggal_beli = '$tgl',
        nama_barang = '$nama',
        kondisi_barang ='$kon',
        IS_DELETED = '$bit'
        WHERE kode_barang = $id
        ";  

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


?>