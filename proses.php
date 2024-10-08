<?php

require_once 'config.php';
switch ($_GET['act'] ?? '') {
    case 'tambah-pengguna':
        $gambar = $_FILES['gambar']['tmp_name'];
        $isigambar = addslashes(file_get_contents($gambar));
        $username = $_POST['username'];
        $nama_user = $_POST['nama_user'];
        $telpon_user = $_POST['telpon_user'];
        $alamat_user = $_POST['alamat_user'];
        $level = $_POST['level'];
        $password = md5($_POST['password']);
        $sql = "INSERT INTO user (username, password, level, nama_user, telpon_user, alamat_user, gambar) VALUES ('$username', '$password', '$level', '$nama_user', '$telpon_user', '$alamat_user', '$isigambar')";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
    case 'edit-pengguna':
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
            $gambar = $_FILES['gambar']['tmp_name'];
            $isigambar = addslashes(file_get_contents($_FILES['gambar']['tmp_name']));
            $username = $_POST['username'];
            $nama_user = $_POST['nama_user'];
            $telpon_user = $_POST['telpon_user'];
            $alamat_user = $_POST['alamat_user'];
            $level = $_POST['level'];
            $kode_user = $_POST['id'];
            $sql = "UPDATE user SET username = '$username', nama_user = '$nama_user', telpon_user = '$telpon_user', alamat_user = '$alamat_user', gambar = '$isigambar' WHERE kode_user = '$kode_user'";

            $result = $conn->query($sql);
            if ($result) {
                http_response_code(200);
            } else {
                http_response_code(500);
                echo $conn->error;
            }
        } else {
            $username = $_POST['username'];
            $nama_user = $_POST['nama_user'];
            $telpon_user = $_POST['telpon_user'];
            $alamat_user = $_POST['alamat_user'];
            $level = $_POST['level'];
            $kode_user = $_POST['id'];
            $sql = "UPDATE user SET username = '$username', nama_user = '$nama_user', telpon_user = '$telpon_user', alamat_user = '$alamat_user', level = '$level' WHERE kode_user = '$kode_user'";
            $result = $conn->query($sql);
            if ($result) {
                http_response_code(200);
            } else {
                http_response_code(500);
                echo $conn->error;
            }
        }
        break;
    case 'hapus-pengguna':
        $kode_user = $_POST['id'];
        $sql = "DELETE FROM user WHERE kode_user = '$kode_user'";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
    case 'ganti-password':
        $password = md5($_POST['password']);
        $sql = "UPDATE user SET password = '$password' WHERE kode_user = '$_POST[id]'";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
    case 'tambah-kas-masuk':
        $kode_kas = $_POST['kode_kas'];
        $keterangan = $_POST['keterangan'];
        $jumlah = $_POST['jumlah'];
        $kode_user = $_POST['id'];
        $tanggal = $_POST['tanggal'];
        $kode_rekening = $_POST['kode_rekening'];
        $kode_kategori = $_POST['kode_kategori'];
        $sql = "INSERT INTO kas (kode_kas, tanggal, keterangan, debit, kode_user, kode_rekening, kode_kategori) VALUES ('$kode_kas', '$tanggal', '$keterangan', '$jumlah', '$kode_user', '$kode_rekening', '$kode_kategori')";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
    case 'hapus-kas-masuk':
        $kode_kas = $_POST['id'];
        $sql = "DELETE FROM kas WHERE kode_kas = '$kode_kas'";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
    case 'edit-kas-masuk':
        $kode_kas = $_POST['kode_kas'];
        $keterangan = $_POST['keterangan'];
        $jumlah = $_POST['jumlah'];
        $kode_user = $_POST['id'];
        $tanggal = $_POST['tanggal'];
        $kode_rekening = $_POST['kode_rekening'];
        $kode_kategori = $_POST['kode_kategori'];
        $sql = "UPDATE kas SET keterangan = '$keterangan', debit = '$jumlah', kode_user = '$kode_user', tanggal = '$tanggal', kode_rekening = '$kode_rekening', kode_kategori = '$kode_kategori' WHERE kode_kas = '$kode_kas'";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
    case 'tambah-kas-keluar':
        $kode_kas = $_POST['kode_kas'];
        $keterangan = $_POST['keterangan'];
        $jumlah = $_POST['jumlah'];
        $kode_user = $_POST['id'];
        $tanggal = $_POST['tanggal'];
        $kode_rekening = $_POST['kode_rekening'];
        $kode_kategori = $_POST['kode_kategori'];
        $sql = "INSERT INTO kas (kode_kas, tanggal, keterangan, kredit, kode_user, kode_rekening, kode_kategori) VALUES ('$kode_kas', '$tanggal', '$keterangan', '$jumlah', '$kode_user', '$kode_rekening', '$kode_kategori')";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
    case 'hapus-kas-keluar':
        $kode_kas = $_POST['id'];
        $sql = "DELETE FROM kas WHERE kode_kas = '$kode_kas'";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
    case 'edit-kas-keluar':
        $kode_kas = $_POST['kode_kas'];
        $keterangan = $_POST['keterangan'];
        $jumlah = $_POST['jumlah'];
        $kode_user = $_POST['id'];
        $tanggal = $_POST['tanggal'];
        $kode_rekening = $_POST['kode_rekening'];
        $kode_kategori = $_POST['kode_kategori'];
        $sql = "UPDATE kas SET keterangan = '$keterangan', kredit = '$jumlah', kode_user = '$kode_user', tanggal = '$tanggal', kode_rekening = '$kode_rekening', kode_kategori = '$kode_kategori' WHERE kode_kas = '$kode_kas'";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
    // input rekening
    case 'tambah-rekening':
        $nama_akun = $_POST['nama_akun'];
        $nama_rekening = $_POST['nama_rekening'];
        $nomor_rekening = $_POST['nomor_rekening'];
        $nomor_akun = $_POST['nomor_akun'];
        $jenis_akun = $_POST['jenis_akun'];
        $sql = "INSERT INTO rekening (nama_akun, nama_rekening, nomor_rekening, nomor_akun, jenis_akun) VALUES ('$nama_akun', '$nama_rekening', '$nomor_rekening', '$nomor_akun', '$jenis_akun')";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
    case 'edit-rekening':
        $id = $_POST['kode_rekening'];
        $nama_akun = $_POST['nama_akun'];
        $nama_rekening = $_POST['nama_rekening'];
        $nomor_rekening = $_POST['nomor_rekening'];
        $nomor_akun = $_POST['nomor_akun'];
        $jenis_akun = $_POST['jenis_akun'];
        $sql = "UPDATE rekening SET nama_akun = '$nama_akun', nama_rekening = '$nama_rekening', nomor_rekening = '$nomor_rekening', nomor_akun = '$nomor_akun', jenis_akun = '$jenis_akun' WHERE kode_rekening = '$id'";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
    case 'hapus-rekening':
        $id = $_POST['id'];
        $sql = "DELETE FROM rekening WHERE kode_rekening = '$id'";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;

    case 'tambah-kategori':
        $nama_kategori = $_POST['nama_kategori'];
        $sql = "INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;

    case 'edit-kategori':
        $id = $_POST['kode_kategori'];
        $nama_kategori = $_POST['nama_kategori'];
        $sql = "UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE kode_kategori = '$id'";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;

    case 'hapus-kategori':
        $id = $_POST['id'];
        $sql = "DELETE FROM kategori WHERE kode_kategori = '$id'";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;

}