<?php
require 'koneksi.php';
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];

mysqli_query($koneksi, "INSERT INTO users(nama,email,password) VALUES('$nama','$email','$password')");

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'ravickys94@gmail.com'; // Gmail kamu
$mail->Password = 'xcby yhbl eivu cuzo'; // App Password 16 digit
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('ravickys94@gmail.com', 'Admin Registrasi'); // harus sama dengan Username
$mail->addAddress($email, $nama);
$mail->Subject = 'Konfirmasi Pendaftaran';
$mail->Body = "Halo $nama, pendaftaran kamu berhasil!";

if($mail->send()){
    echo "Registrasi berhasil, cek email konfirmasi!";
} else {
    echo "Gagal kirim email.";
}
?>
