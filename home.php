<?php
    include("yonetim/ayar.php");
    error_reporting(0);
    session_start();
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <title>Ana Sayfa</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="lib/js/jquery.min.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="hero">
        <header class="header">
            <nav class="nav">
                <a href="home.php" aria-label="home"><img src="images/logo.png" class="logo" alt=""></a>
                <ul class="dropdown">
                    <li><a><img src="images/bar.png" class="bar"></a>
                        <ul>
                            <li><a href="home.php" class="active">Ana Sayfa</a></li>
                            <li><a href="about1.php">Hakkımızda</a></li>
                            <li><a href="travels.php">Seyahatler</a></li>
                            <li><a href="contact.php">İletişim</a></li>
                        </ul>
                    </li>
                </ul>
                <img src="images/moon.png" id="icon" alt="">
            </nav>
            <script>
                var icon = document.getElementById("icon");
                icon.onclick = function() {
                    document.body.classList.toggle("dark-theme");
                    if (document.body.classList.contains("dark-theme")) {
                        icon.src = "images/sun.png";
                    } else {
                        icon.src = "images/moon.png";
                    }
                };
            </script>
            <div class="home">
                <div class="home-box">
                <video src="images/tacmahal.mp4" muted autoplay loop class="slider active"></video>
                <img src="images/gemi.jpg" class="slider" alt="">
                <video src="images/ucak.mp4" muted autoplay loop class="slider"></video>
                    <div class="content active" data-aos="fade-up">
                        <h1>Hindistan Ziyaretimiz Yakında</h1>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed
                            to using 'Content here, content here', making it look like readable English.</p>
                        <a href="travels.php" class="btn">İncele</a>
                    </div>
                    <div class="content" data-aos="fade-up">
                        <h1>Okyanus Seyahatlerimiz</h1>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed
                            to using 'Content here, content here', making it look like readable English.</p>
                        <a href="travels.php" class="btn">İncele</a>
                    </div>
                    <div class="content" data-aos="fade-up">
                        <h1>Kaliteli Ulaşım Hizmeti</h1>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed
                            to using 'Content here, content here', making it look like readable English.</p>
                    </div>
                </div>
                <div class="slider-navigation">
                    <div class="nav-btn"></div>
                    <div class="nav-btn"></div>
                    <div class="nav-btn"></div>
                </div>
                <script>
                    const btns = document.querySelectorAll('.nav-btn');
                    const slides = document.querySelectorAll('.slider');
                    const contents = document.querySelectorAll('.content');
                    var sliderNav = function(index) {
                        btns.forEach((btn) => {
                            btn.classList.remove('active');
                        });
                        slides.forEach((slide) => {
                            slide.classList.remove('active');
                        });
                        contents.forEach((content) => {
                            content.classList.remove('active');
                        });
                        btns[index].classList.add('active');
                        slides[index].classList.add('active');
                        contents[index].classList.add('active');
                    }
                    btns.forEach((btn, i) => {
                        btn.addEventListener('click', () => {
                            sliderNav(i);
                        });
                    });
                </script>
            </div>
        </header>
        <div class="class">
            <section class="seasons">
                <h1 class="heading"><span>Mevsim Turları</span>
                    <hr class="hr">
                </h1>
                <div class="seasons-box" data-aos="fade-up">
                    <div class="season">
                        <div class="season-box">
                            <h2>Yaz Turları</h2>
                            <img src="images/fas.jpg" alt="">
                            <a href="travels.php"><input type='submit' value='İncele' name='see' class='btn'></a>
                        </div>
                    </div>
                    <div class="season">
                        <div class="season-box">
                            <h2>Bahar Turları</h2>
                            <img src="images/cinbaharı.jpg" alt="">
                            <a href="travels.php"><input type='submit' value='İncele' name='see' class='btn'></a>
                        </div>
                    </div>
                    <div class="season">
                        <div class="season-box">
                            <h2>Kış Turları</h2>
                            <img src="images/norvec.jpg" alt="">
                            <a href="travels.php"><input type='submit' value='İncele' name='see' class='btn'></a>
                        </div>
                    </div>
                </div>
            </section><br><br>
            <section class="news">
                <h1 class="heading"><span>Gezi Günlüğü</span>
                    <hr class="hr">
                </h1>
                <div class="container" data-aos="fade-up">
                <?php
                    $sorgu = $baglan->query("select * from anasayfa_gezig");
                    while ($satir = $sorgu->fetch_object()) {
                    $resim = substr($satir->resim,3);
                    echo "
                    <div class='box'>
                        <img class='icon' src='$resim' alt=''>
                        <h3>$satir->baslik</h3>
                        <p>$satir->yazi</p>
                    </div>";
                }?>
                </div>
            </section><br><br>
            <section class="works">
                <h1 class="heading"><span>Seyahatlerimiz</span>
                    <hr class="hr">
                </h1>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper" data-aos="fade-up">
                    <?php
                        $sorgu = $baglan->query("select * from anasayfa_slider");
                        while ($satir = $sorgu->fetch_object()) {
                        $resim = substr($satir->resim,3);
                        echo "
                        <div class='swiper-slide'>
                            <h2>$satir->baslik</h2>
                            <img src='$resim' id='zoom'>
                            <a href='travels.php'><input type='submit' value='İncele' name='see' class='btn'></a>
                        </div>";}?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
                <script>
                    var swiper = new Swiper(".mySwiper", {
                        slidesPerView: 3,
                        spaceBetween: 30,
                        freeMode: true,
                        pagination: {
                            el: ".swiper-pagination",
                            clickable: false,
                        },
                        breakpoints: {
                            0: {
                                slidesPerView: 1,
                            },
                            520: {
                                slidesPerView: 2,
                            },
                            950: {
                                slidesPerView: 3,
                            },
                        },
                    });
                </script>
            </section>
        </div>
        <section class="back">
            <h3 class="heading"><span>AVUSTRALYA TURU İÇİN REZERVASYON</span></h3>
            <div class="sayim" data-aos="fade-up">
                <div>
                    <p id="days">00</p>
                    <span>Gün</span>
                </div>
                <div>
                    <p id="hours">00</p>
                    <span>Saat</span>
                </div>
                <div>
                    <p id="minutes">00</p>
                    <span>Dakika</span>
                </div>
                <div>
                    <p id="seconds">00</p>
                    <span>Saniye</span>
                </div>
            </div>
            <a href="travels/ek4.php" class="btn" data-aos="fade-up">İncele</a>
            <script>
                var countDownDate = new Date("July 10, 2023 00:00:00").getTime();
                var x = setInterval(function() {
                    var now = new Date().getTime();
                    var distance = countDownDate - now;

                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    document.getElementById("days").innerHTML = days;
                    document.getElementById("hours").innerHTML = hours;
                    document.getElementById("minutes").innerHTML = minutes;
                    document.getElementById("seconds").innerHTML = seconds;

                    if (distance < 0) {
                        clearInterval(x);
                        document.getElementById("days").innerHTML = "00";
                        document.getElementById("hours").innerHTML = "00";
                        document.getElementById("minutes").innerHTML = "00";
                        document.getElementById("seconds").innerHTML = "00";
                    }

                }, 1000);
            </script>
        </section>
        <footer>
            <div class="container" data-aos="fade-up">
                <div class="ek" id="ek">
                    <h3>hazır linkler</h3>
                    <div><a href="home.php">Ana Sayfa</a></div>
                    <div><a href="about1.php">Hakkımızda</a></div>
                    <div><a href="travels.php">Seyahatlerimiz</a></div>
                    <div><a href="contact.php">İletişim</a></div>
                </div>
                <div class="ek" id="ek">
                    <h3>Seyahatler</h3>
                    <div><a href="travels.php">Yurt İçi Turlar</a></div>
                    <div><a href="travels.php">Yurt Dışı Turlar</a></div>
                    <div><a href="travels.php">Mevsim Turları</a></div>
                    <div><a href="travels.php">Gemi Turları</a></div>
                </div>
                <div class="ek" id="ek">
                    <h3>İletişim bilgileri</h3>
                    <div>
                        <a href="#"><i class="fas fa-phone"></i>+0213-589-74-10</a>
                    </div>
                    <div>
                        <a href="#" class="lower"><i class="fas fa-envelope"></i>asilturizm@gmail.com</a>
                    </div>
                </div>
                <div class="ek">
                    <h3>Sosyal Medya</h3>
                    <div class="social_icon">
                        <div>
                            <a><i class="fab fa-facebook-f"></i></a>

                            <a><i class="fab fa-instagram"></i></a>

                            <a><i class="fab fa-twitter"></i></a>

                            <a><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>

                </div>
            </div>
            <hr class="hr">
            <p>Mezuniyet Projesi | 2023</p>
        </footer>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 3000,
            once: true,
        });
    </script>
    <script src="lib/js/jquery.min.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>