<?php 
include "../asset/db/koneksi.php";

include "../asset/layout/navbar_ns.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Time Produk</title>
    <style>
        .cont{
            font-family: Arial, sans-serif;
            /* background-image: url("../asset/img/banner.jpg"); */
            margin-top: 200px;
            margin-bottom: 400px;
        }
        .isi{
            margin-top: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 200px;
            margin-left: 6%;
            height: 100vh;
        }
        h1{
            margin-top: 20px;
            text-align: center;
            justify-content: center;
            margin-bottom: 200px;
            font-family: cambria;
        }
        .video-container {
            margin-top: 200px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .video-frame {
            width: 100%;
            max-width: 350px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        .video-frame:hover {
            transform: scale(1.05);
        }

        iframe {
            width: 100%;
            height: 200px;
            border: none;
        }

        p {
            padding: 10px;
            text-align: center;
        }

    </style>
</head>
<body>
    <div class="kon">
        <h1>Live Time Produk</h1>
        <div class="cont">
            <div class="isi">
                <div class="video-container">
                    <?php
                    // Array video dan deskripsi
                    $videos = array(
                        array('https://www.youtube.com/embed/v7O2sYIUpKw?si=nbV1TH7423LDcyCy', 
                        '<b>Desain Kaos</b><br><br>
                        Desain Kaos Merupakan salah satu jasa yang disediakan oleh perusahaan kami, dalam membuat kaos 3 dasar yang kami lakukan yaitu :<br> <br>
                        1. Originalitas : Desain yang unik dan tidak umum akan menarik perhatian pembeli.<br>
                        2. Kreativitas : Desain yang kreatif dan inovatif dapat menciptakan daya tarik visual yang kuat.<br>
                        3. Kualitas Grafis : Pastikan gambar dan elemen grafis dalam desain kaos memiliki kualitas tinggi.'),

                        array('https://www.youtube.com/embed/rPJCqEC6xis?si=-uD6OdAA1G366wUd',
                        '<b>Print Foto</b><br><br>
                        Jasa kedua yang disediakan oleh layanan kami, dalam cetak foto kita sesuaikan dengan ukuran yang dibutuhkan.<br>
                        Konsumen sendiri meruapakan hal yang paling kami butuhkan, karena konsumen merupakan nilai utama dalam usaha kita.'),

                        array('https://www.youtube.com/embed/A8tYiGlEIvY?si=naadSYlH301JlRmC',
                        '<b>Sablon Kaos</b><br><br>
                        Hai Sobat Kreatif! Mari kita berpetualang bersama dalam dunia keahlian yang menakjubkan! Apa yang membuat sebuah kaos menjadi lebih dari sekadar pakaian? Jawabannya terletak pada detail terkecilnya, dalam sentuhan kreatif yang membentuk karakter, dan pada keajaiban yang dihasilkan oleh keahlian sablon kaos.'),

                        array('https://www.youtube.com/embed/4Uy2jeoymNc?si=NLvajhfFjnw1u6zi',
                        '<b>Cetak Gelas</b><br><br>
                        Dengan hati penuh dedikasi, tim kami menghasilkan cetakan gelas berkualitas tinggi yang tidak hanya memenuhi standar estetika tinggi, tetapi juga mencerminkan cerminan kepribadian Anda. Apakah Anda mencari hiasan rumah yang indah, hadiah yang personal, atau pernak-pernik khusus untuk acara istimewa, kami memiliki keahlian untuk membuatnya terjadi.'),

                        array('https://www.youtube.com/embed/-t5aGULOvL4?si=eWsYinumgSlllTBx',
                        '<b>Cetak Banner</b><br><br>
                        Dalam pembuatan bannner sendiri kita menggunakan bahan yang memiliki kualitas sangat baik, dikarenakan kita lebih fokus terhadap memberikan pelayanan terbaik kepada konsumen.'),

                        array('https://www.youtube.com/embed/XPoUl6mDQa4?si=Umhxjwl78o6xs1oF',
                        '<b>Cetak Lanyard</b><br><br>
                        Produk selanjutnya kami adalah membuat layar atau biasanya kita sebut dengan gantungan kunci. produk tersebut sangat banyak peminatnya karena banyak anak kuliah yang digunakan sebagai aksesoris dalam kunci motor dan juga biasanya kami memberikan promosi kepada pemesanan kaos akan mendaptkan gratis lanyard.')
                    );
            
                    // Menampilkan video dan deskripsi
                    foreach ($videos as $video) {
                        echo '<div class="video-frame">';
                        echo '<iframe width="500" height="315" src="' . $video[0] . '" frameborder="0" allowfullscreen></iframe>';
                        echo '<p>' . $video[1] . '</p>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php 
include "../asset/layout/footer.php";
?>
</body>
</html>
