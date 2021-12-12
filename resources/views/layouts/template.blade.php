<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta name="description" content="Competition of Islamic Creativity, merupakan ajang perlombaan yang diadakan oleh UKM MCOS STIKOM Bali untuk berkompetisi dalam berbagai bidang dalam Islam">
    <meta name="keywords" content="Competition of Islamic Creativity, merupakan ajang perlombaan yang diadakan oleh UKM MCOS STIKOM Bali untuk berkompetisi dalam berbagai bidang dalam Islam">
    <meta name="author" content="Muhamad Saddam Hidayatul Firdaus">
    <meta property="og:image" content="http://127.0.0.1:8000/img/general/comic-x.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- ========== Title ========== -->
    <title>@yield('title') - {{config('app.name')}}</title>
    <!-- ========== Favicon Ico ========== -->
    <link rel="icon" href="/assets/img/comic-x.png">
    <!-- ========== STYLESHEETS ========== -->
    <!-- Bootstrap CSS -->
    <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Fonts Icon CSS -->
    <link href="{{url('assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/et-line.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/ionicons.min.css')}}" rel="stylesheet">
    <!-- Carousel CSS -->
    <link href="{{url('assets/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="/assets/css/animate.min.css">
    <!-- Custom styles for this template -->
    <link href="{{url('assets/css/main.css?ver=1')}}" rel="stylesheet">
    @yield('head')
</head>
<body>
<!--<div class="loader">-->
<!--    <div class="loader-outter"></div>-->
<!--    <div class="loader-inner"></div>-->
<!--</div>-->

<!--header start here -->
<header class="header navbar fixed-top navbar-expand-md">
    <div class="container">
        <a class="navbar-brand logo" href="/">
            <img src="/assets/img/comic-x.png" alt="COMIC IX"/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headernav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="lnr lnr-text-align-right"></span>
        </button>
        <div class="collapse navbar-collapse flex-sm-row-reverse" id="headernav">
            <ul class=" nav navbar-nav menu">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('competitior.index')}}">Peserta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('panduan.index')}}">Panduan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('qa.index')}}">Pertanyaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#kontak">Kontak</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link " href="{{route('login')}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('register')}}">Daftar Sekarang</a>
                </li>
            </ul>
        </div>
    </div>
</header>
<!--header end here-->

@yield('content')

<!--get tickets section -->
<section class=" pt100 pb100" style="background-image: url({{asset('assets/img/bg/pattern.jpeg')}}); background-size: cover">
    <div class="overlay_dark"></div>
    <div class="container">
        <div class="section_title mb30">
            <h3 class="title color-light">
                Tunggu Apa Lagi?
            </h3>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-9 text-md-left text-center color-light">
                Daftarkan diri Anda segera, jadilah bagian dari kompetisi {{config('app.name')}} dan raih juaranya!
            </div>
            <div class="col-md-3 text-md-right text-center">
            <a href="{{route('register')}}" class="btn btn-secondary btn-rounded mt30">Daftar Sekarang</a>
            </div>
        </div>
    </div>
</section>
<!--get tickets section end-->

<!--footer start -->
<footer>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-6">
                <div class="footer_box">
                    <div class="footer_header">
                        <div class="footer_logo">
                            <img src="/assets/img/comic-x.png" alt="COMIC X STIKOM BALI" style="width: 120px; height: 100px;">
                        </div>
                    </div>
                    <div class="footer_box_body">
                        <p>
                            COMIC adalah singkatan dari Competition of Islamic Creativity, merupakan ajang perlombaan yang diadakan oleh UKM MCOS STIKOM Bali untuk berkompetisi dalam berbagai bidang dalam Islam. COMIC diikuti oleh peserta dari berbagai jenjang seperti SD, SMP dan SMA atau Sederajat se-Bali, Jawa, Lombok, Aceh, Kalimantan, Sulawesi, dan Sumatra
                        </p>
                        <ul class="footer_social">
                            
                            <li>
                                <a href="http://instagram.com/comicstikombali" target="_blank"><i class="ion-social-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="footer_box">
                    <div class="footer_header">
                        <h4 class="footer_title" id="kontak">
                            Menu Utama
                        </h4>
                    </div>
                    <div class="footer_box_body">
                        <ul class=" nav navbar-nav menu">
                            <li class="nav-item">
                                <a class="nav-link active" href="/">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('competitior.index')}}">Peserta</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('panduan.index')}}">Panduan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#kontak">Kontak</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('qa.index')}}">Pertanyaan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('login')}}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('register')}}">Daftar Sekarang</a>
                            </li>
                        
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="footer_box">
                    <div class="footer_header">
                        <h4 class="footer_title" id="kontak">
                            Kontak Kami
                        </h4>
                    </div>
                    <div class="footer_box_body">
                        <h5 class="contact_person">
                            Sabil <br> 
                            <p class="contact_person_numbers">
                                <i class="ion-android-call"></i> <a href="http://wa.me/6281529039723" target="_blank" rel="noopener noreferrer">081529039723</a> <br>
                                <i class="ion-chatboxes"></i> <a href="http://line.me/ti/p/~sabilquar" target="_blank">@sabilquar(LINE)</a>
                            </p>
                        </h5>
                        <h5 class="contact_person">
                            Anggita <br> 
                            <p class="contact_person_numbers">
                                <i class="ion-android-call"></i> <a href="http://wa.me/6285330096712" target="_blank" rel="noopener noreferrer">085330096712</a> <br>
                                <i class="ion-chatboxes"></i> <a href="http://line.me/ti/p/~4nggita01" target="_blank">@4nggita01 (LINE)</a>
                            </p>
                        </h5>
                        <h5 class="contact_person">
                            Erla <br> 
                            <p class="contact_person_numbers">
                                <i class="ion-android-call"></i> <a href="http://wa.me/6287897362113" target="_blank" rel="noopener noreferrer">6287897362113</a> <br>
                                <i class="ion-chatboxes"></i> <a href="http://line.me/ti/p/~erlaayuu" target="_blank">@erlaayuu (LINE)</a>
                            </p>
                        </h5>

                       
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</footer>
<div class="copyright_footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p style="text-align: center"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by IT Support {{config('app.name')}}
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
            
        </div>
    </div>
</div>
<!--footer end -->

<!-- jquery -->
<script src="{{url('assets/js/jquery.min.js')}}"></script>
<!-- bootstrap -->
<script src="{{url('assets/js/popper.js')}}"></script>
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets/js/waypoints.min.js')}}"></script>
<!--slick carousel -->
<script src="{{url('assets/js/owl.carousel.min.js')}}"></script>
<!--parallax -->
<script src="{{url('assets/js/parallax.min.js')}}"></script>
<!--Counter up -->
<script src="{{url('assets/js/jquery.counterup.min.js')}}"></script>
<!--Counter down -->
<script src="{{url('assets/js/jquery.countdown.min.js')}}"></script>
<!-- WOW JS -->
<script src="{{url('assets/js/wow.min.js')}}"></script>
<!-- Custom js -->
<script src="{{url('assets/js/main.js')}}"></script>
@yield('script')
<script type="text/javascript">
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});
</script>
</body>
</html>