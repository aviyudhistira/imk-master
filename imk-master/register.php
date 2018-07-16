<?php

require_once("config.php");

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $nama_lengkap = filter_input(INPUT_POST, 'nama_lengkap', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    // menyiapkan query
    $sql = "INSERT INTO data (nama_lengkap, email, password) 
            VALUES (:nama_lengkap, :email, :password)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":nama_lengkap" => $nama_lengkap,
        ":password" => $password,
        ":email" => $email
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: login.php");
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div id="header">
    <div id="menu" class="container">
        <ul>
            <li class="current_page_item"><a href="index.html" accesskey="1" title="">Homepage</a></li>
            <li><a href="jurusan.html" accesskey="1" title="">Jurusan</a></li>
            <li><a href="about.html" accesskey="3" title="">About Us</a></li>
            <li><a href="register.php" accesskey="3" title="">SIGN UP</a></li>
            <li><a href="login.php" accesskey="3" title="">LOG IN</a></li>
        </ul>
    </div>
</div>
<div id="logo" class="container">
    <h1><a href="learning.com" class="icon icon-tasks"><span>Tempat belajar online
yang Lengkap, Seru, dan Bikin Ketagihan</span></a></h1>
</div>
<div id="page" class="container">
    <div id="content">
        <div class="title">
            <h2>Welcome to Learning</h2>
            <span class="byline">Ujian Itu Mudah</span>
        </div>
        <p>Ini Adalah Sebuah Website  <strong>Learning</strong>, yang memakai konsep dan fitur yang sangat menarik dan mudah di <a href="index.html" rel="nofollow">gunakan</a>.Website Ini menggunakan suber yang tepercaya seperti <a href="http://video.quipper.com">Quipper</a> dan<a href="http://ruangguru.com/"> Ruang Guru </a>.</p>
    </div>
    <div id="sidebar"><a href="#" class="image image-full"><img src="images/1.png" alt="" /></a></div>
</div>

        <form action="" method="POST">

            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input class="form-control" type="text" name="name" placeholder="Nama kamu" />
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Alamat Email" />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" />
            </div>

            <input type="submit" class="btn btn-success btn-block" name="register" value="Daftar" />

        </form>
            
       <div id="contact" class="container">
        <div class="major">
            <h2>HUBUNGI KAMI</h2>
            <span class="byline">Silahkan Hubungi Kami Dari Berbagai Media Di Bawah Ini</span>
        </div>
        <ul class="contact">
            <li><a href="#" class="icon icon-twitter"><span>Twitter</span></a></li>
            <li><a href="#" class="icon icon-facebook"><span></span></a></li>
            <li><a href="#" class="icon icon-dribbble"><span>Pinterest</span></a></li>
            <li><a href="#" class="icon icon-tumblr"><span>Google+</span></a></li>
            <li><a href="#" class="icon icon-rss"><span>Pinterest</span></a></li>
        </ul>
</div>
<div id="copyright" class="container">
    <p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://learning.com" rel="nofollow">TEMPLATED</a> |Hak Cipta Website E-Learnig Di Lindungi Oleh Hukum.</p>
</div>
</div>

</body>
</html>