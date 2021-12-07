@extends('layouts.maintenance')
@section('title')Beranda @endsection

@section('content')
<!--cover section slider -->
<section id="home" class="home-cover">
    <div class="cover_slider owl-carousel owl-theme">
        <div class="cover_item" style="background-image: url('assets/img/bg/pattern.jpeg');">
             <div class="slider_content">
                <div class="slider-content-inner">
                    <div class="container">
                        <div class="slider-content-center" style="max-width: 100%">
                            <h2 class="cover-title">
                                Website sedang dalam Maintenance
                            </h2>
                            <h3 class="cover-title">
                                Terimakasih telah mendaftar
                            </h3>
                            <strong class="cover-xl-text">COMIC X!</strong>
                            <p class="cover-date">
                                <strong>Mohon atas ketidaknyamanannya, silahkan kembali nanti</strong>
                            </p>
                             {{-- <a href="/zoom" style="background :#54c0af; border-color: #54c0af;" class=" btn btn-primary btn-rounded  mb-2" >
                                    Username Zoom
                            </a> --}}
                            {{-- <a href="#more" class="mb10 btn btn-rounded" style="background-color: #FF7C55; color: #fff" >
                                Pelajari Selengkapnya
                            </a> --}}
                            @if (env('HASIL_TM') == 'on')
                                <a href="#competition" style="background :#54c0af; border-color: #54c0af;" class=" btn btn-primary btn-rounded" >
                                    Lihat HASIL TM
                                </a>
                            @endif
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="cover_nav" >
        <a href="#more">
            <ul class="btn btn-rounded" style="background-color: #191919">
                <span class="fa fa-arrow-down" style="color: #FF7C55"></span>
            </ul>
        </a>
    </div> --}}
</section>
<!--cover section slider end -->
@endsection

@section('script')
    <script>
     //$('#myModal').modal('show');
</script>
@endsection