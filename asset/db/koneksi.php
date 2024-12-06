<?php 
session_start();

$host = "localhost:3306";
$user = "root";
$password = "";
$dbname = "db_printing";

$conn = mysqli_connect($host, $user, $password, $dbname);

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function formatHarga($angka) {
    $formattedHarga = "Rp. " . number_format($angka, 0, ',', '.');
    return $formattedHarga;
}



// ========================================================= LOGIN =========================================

function getadmin($username) {
    $result = query("SELECT * FROM tb_admin WHERE username_admin = '$username'")[0];
    return $result;
}

function getUsername($username) {
    $result = query("SELECT * FROM tb_user WHERE username = '$username'")[0];
    return $result;
}

function addUser($data) {
    global $conn;
    $nama = $data["nama_user"];
    $alamat = $data["alamat"];
    $username = $data["username"];
    $password = $data["password"];

    $query = "INSERT INTO tb_user VALUES('', '$nama', '$alamat', '$username', '$password')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// ========================================================== TABEL USER ===============================================

function edit_user($data) {
    global $conn ;
    $id = $_SESSION["id_user"];
    if ($data["oldpw"] == $_SESSION["password"]){
        $usn = $data["username"];
        $pw = $data["newpw"];

        $query = "UPDATE tb_user 
                SET username = '$usn',
                password = '$pw' 
                WHERE id_user = '$id'";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
}



// ================================================== TABEL KERANJANG ============================================

function addkeranjang($data) {
    global $conn;
    $idbarang = $data["id_barang"];
    $qty = $data["qty"];
    $keranjang = query("SELECT * FROM keranjang WHERE id_barang = $idbarang");
    $harga_satuan = $data["harga_satuan"];
    $total = $harga_satuan * $qty;
    $iduser = $_SESSION["id_user"];
    
    if (empty($keranjang)){
        $query = "INSERT INTO keranjang VALUES('', '$total', '$idbarang', '$qty', $iduser )";
    } else {
        $currentTotalQuery = "SELECT total_harga FROM keranjang WHERE id_barang = $idbarang";
        $result = mysqli_query($conn, $currentTotalQuery);
        $currentTotal = mysqli_fetch_assoc($result)['total_harga'];

        $newTotal = $currentTotal + ($harga_satuan * $qty);

        $query = "UPDATE keranjang 
                SET qty = qty + $qty, 
                total_harga = $newTotal 
                WHERE id_barang = $idbarang";
    }
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function deletekeranjang($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM keranjang WHERE id_user = '$id'");
    return mysqli_affected_rows($conn);
}

function deletekp($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM keranjang_print WHERE id_kp = '$id'");
    return mysqli_affected_rows($conn);
}


// ================================================== TABEL TRANSAKSI ==============================================
function addtransaksi($data){
    global $conn ;
    $iduser = $_SESSION["id_user"];
    $tgl = $data["tanggal"];
    $metode = $data["metode"];
    $total = $data["total"];
    $bukti = NULL;
    if ($bukti == NULL) {
        $status = "belum bayar";
    }
    $konfir = NULL;

    $query = "INSERT INTO tb_transaksi VALUES('', '$iduser', '$tgl', '$status', '$metode', '$total', '$bukti', '$konfir' )";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function bukti($data){
    global $conn;
    $id = $data["id_transaksi"];
    $status = $data["status"];
    $bukti = $data["bukti_pembayaran"];
    
    $query = "UPDATE tb_transaksi SET
            status_transaksi = '$status',
            bukti_pembayaran = '$bukti'
            WHERE id_transaksi = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function konfir($data) {
    global $conn;
    $id = $data["id_transaksi"];
    $status = $data["status_transaksi"];
    $konfir = $data["konfirmasi_transaksi"];

    $query = "UPDATE tb_transaksi SET
            status_transaksi = '$status',
            konfirmasi_transaksi = '$konfir'
            WHERE id_transaksi = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function konfir_desain($data) {
    global $conn;
    $id = $data["id_tp"];
    $status = $data["status_tp"];
    $konfir = $data["confirm_tp"];

    $query = "UPDATE tb_transaksi_print SET
            status_tp = '$status',
            confirm_tp = '$konfir'
            WHERE id_tp = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function addtp($data){
    global $conn ;
    $iduser = $_SESSION["id_user"];
    $tgl = $data["tanggal"];
    $metode = $data["metode"];
    $total = $data["total"];
    $bukti = NULL;
    if ($bukti == NULL) {
        $status = "belum bayar";
    }
    $konfir = NULL;

    $query = "INSERT INTO tb_transaksi_print VALUES('', '$iduser', '$tgl', '$status', '$metode', '$total', '$bukti', '$konfir' )";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function bukti_tp($data){
    global $conn;
    $id = $data["id_tp"];
    $status = $data["status"];
    $bukti = $data["bukti_tp"];
    
    $query = "UPDATE tb_transaksi_print SET
            status_tp = '$status',
            bukti_tp = '$bukti'
            WHERE id_tp = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// ======================================= TABEL DETAIL TRANSAKSI =================================

function adddetail($data) {
    global $conn;

    $idtr = $data["id_transaksi"];
    $idbr = $data["id_barang"];
    $harga = $data["harga_satuan"];
    $qty = $data["qty"];

    // Iterate through each item in the array
    for ($i = 0; $i < count($idbr); $i++) {
        $currentIdBarang = $idbr[$i];
        $currentHarga = $harga[$i];
        $currentQty = $qty[$i];

        $query = "INSERT INTO detail_transaksi_barang VALUES('$idtr', '$currentIdBarang', '$currentHarga', '$currentQty')";
        mysqli_query($conn, $query);
    }

    return mysqli_affected_rows($conn);
}

function adddetail_tp($data) {
    global $conn;

    $idtr = $data["id_tp"];
    $id_ker = $data["id_kp"];
    $jenis = $data["jenis"];
    $ukuran = $data["ukuran"];
    $qty = $data["qty"];
    $img = $data["img"];
    $quality = $data["quality"];


    $query = "INSERT INTO detial_transaksi_print VALUES('$idtr', '$id_ker','$jenis', '$ukuran', '$qty', '$img', '$quality')";
    mysqli_query($conn, $query);
    // }

    return mysqli_affected_rows($conn);
}

// ========================================= tb chat ===========================================
function chat($data) {
    global $conn;
    $idu = 1;
    $ida = 1;
    $waktu = $data["waktu_user"];
    $pesan1 = NULL;
    $pesan2 = NULL;
    $waktuadmin = $data["waktu_admin"];

    $query = "INSERT INTO tb_chat VALUES('$idu', '$ida', $waktu , $pesan1, $pesan2, $waktuadmin)";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// ==================================================== tb barang =========================================
function minstok($data) {
    global $conn;
    $id = $data["id_barang"];
    $stok = $data["stok"];
    $qty = $data["qty"];
    $now = $stok - $qty;

    $query = "UPDATE tb_barang SET
            stok = '$now'
            WHERE id_barang = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function addbarang($data){
    global $conn;
    $nama = $data["nama"];
    $stok = $data["stok"];
    $harga = $data["harga"];
    $supp = $data["supplier"];
    $ket = $data["keterangan"];
    $kategori = $data["kategori"];
    $img = "../asset/img/".$data["img"];

    $query = "INSERT INTO tb_barang VALUES('', '$nama', '$stok', '$harga', '$supp', '$ket', '$kategori', '$img')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM tb_barang WHERE nama_barang LIKE '%$keyword%'";
    return query($query);
}

function cari_cabang($keyword) {
    $query = "SELECT * FROM tb_cabang WHERE cabang LIKE '%$keyword%'";
    return query($query);
}


// ============================================ SUPPLIER ======================================

function form_supp($data) {
    global $conn;
    $nama = $data["nama_supp"];
    $alamat = $data["alamat_supp"];
    $telp = $data["telp_supp"];
    $desc = $data["desc_supp"];

    $query = "INSERT INTO form_sup VALUES('', '$nama', '$alamat', '$telp', '$desc')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

function addsupp($data) {
    global $conn;
    $nama = $data["nama"];
    $alamat = $data["alamat"];
    $telp = $data["telp"];
    $img = "../asset/img/".$data["img"];

    $query = "INSERT INTO tb_supplier VALUES('', '$nama', '$telp', '$alamat', '$img')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

function delete_sup($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM form_sup WHERE id_form = '$id'");
    return mysqli_affected_rows($conn);
}

// ===================================================== LOKER ===============================================

function loker($data){
    global $conn;
    $nama = $data["nama"];
    $alamat = $data["alamat"];
    $email = $data["email"];
    $umur = $data["umur"];
    $cv = "../asset/Images/".$data["cv"];

    $query = "INSERT INTO tb_loker VALUES('', '$nama', '$email', '$alamat', '$umur', '$cv')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// ============================================= PRINT ==============================================

function banner($data){
    global $conn;
    $panjang = $data["panjang"];
    $lebar = $data["lebar"];
    $ukuran = $data["lebar"] + $data["panjang"];
    $harga = 15000;

    $nama = $data["nama"];
    $user = $_SESSION["id_user"];
    $jenis = $data["tipe"];
    $qty = 1;
    $total = $harga * $ukuran;
    $size = $data["panjang"] ." m X ". $data["lebar"] . " m";
    $img = "../asset/Images/".$data["img_print"];
    $kualitas = "Bagus";

    $query = "INSERT INTO keranjang_print VALUES('', '$user', '$nama', '$jenis', '$qty','$total', '$size', '$img', '$kualitas')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function stiker($data){
    global $conn;
    // $panjang = $data["panjang"];
    // $lebar = $data["lebar"];

    $kualitas = $data["kualitas"];
    $charge = 0;
    if ($data["kualitas"] == "biasa"){
        $charge += 0;
    }else{
        $charge += 500;
    }

    $qty = $data["qty"];
    $harga = 1500 + $charge;


    $nama = $data["nama"];
    $user = $_SESSION["id_user"];
    $jenis = $data["tipe"];
    $total = $qty * $harga;
    $size = $data["panjang"] ." cm X ". $data["lebar"] . " cm";
    $img = "../asset/Images/".$data["img_print"];

    $query = "INSERT INTO keranjang_print VALUES('', '$user', '$nama', '$jenis', '$qty', '$total', '$size', '$img', '$kualitas')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function printing($data){
    global $conn;

    $kualitas = $data["kualitas"];
    $charge = 0;
    if ($data["kualitas"] == "Hitam Putih"){
        $charge += 0;
    }else{
        $charge += 500;
    }

    $qty = $data["qty"];
    $harga = 500 + $charge;


    $nama = $data["nama"];
    $user = $_SESSION["id_user"];
    $jenis = $data["tipe"];
    $total = $qty * $harga;
    $size = $data["ukuran"];
    $img = $data["img_print"];

    $query = "INSERT INTO keranjang_print VALUES('', '$user', '$nama', '$jenis', '$qty', '$total', '$size', '$img', '$kualitas')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


// ===================================================== TB PROMO =============================================

function add_promo($data) {
    global $conn;
    $nama = $data["nama"];
    $tanggal = $data["tanggal"];
    $keterangan = $data["keterangan"];
    $img = "../asset/img/".$data["img"];

    $query = "INSERT INTO tb_promo VALUES('', '$nama', '$tanggal', '$keterangan', '$img')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}



// ================================================ CLAIM =====================================================

function claim($data){
    global $conn;
    $id = $_SESSION["id_user"];
    $claim = $data["claim"];

    $query = "UPDATE tb_user SET
            claim = '$claim'
            WHERE id_user = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function del_prom($data) {
    global $conn;
    $id = $data["id"];
    $claim = $data["claim"];
    $query = "UPDATE tb_user SET
            claim = '$claim'
            WHERE id_user = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


// =========================================== REFUND DANA   =================================================

function refund_dana($data) {
    global $conn;
    // $id = $_SESSION["id_user"];
    $nama = $data["nama"];
    $barang = $data["barang"];
    $tanggal = $data["tanggal"];
    $alasan = $data["alasan"];
    $img = $data["img"];

    $query = "INSERT INTO tb_refund_dana VALUES ('','$nama','$barang','$alasan','$tanggal','../asset/img/$img')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>