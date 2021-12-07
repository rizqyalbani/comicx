@extends('layouts.template')
@section('title')Lomba {{$models->name}}
@endsection
@section('content')
     
<!--page title section-->
<section class="inner_cover parallax-window" data-parallax="scroll" data-image-src="{{$models->getImage()}}">
    <div class="overlay_dark"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <div class="inner_cover_content">
                    <h3>
                       Lomba {{$models->name}}
                    </h3>
                </div>
            </div>
        </div>

        <div class="breadcrumbs">
            <ul>
                <li><a href="/" style="color: #fff">Beranda</a>  |   </li>
                <li><span>Lomba {{$models->name}}</span></li>
            </ul>
        </div>
    </div>
</section>
<!--page title section end-->


<!--events section -->
<section class="pt100 pb100" style="background-color: #191919">
    <div class="container">

        <div class="event_box">
            <div class="event_info">
                <div class="event_title" style="color: #fff">
                    Lomba {{$models->name}}
                </div>
            </div>
            <div class="event_word">
                <div class="row justify-content-center">
                    
                    <div class="col-md-12 col-12" style="color: #fff">
                        {!!$models->description!!}
                    </div>
                </div>
            </div>
            <div >
                <a href="{{route('register')}}" class="btn btn-primary btn-rounded">Daftar Perlombaan</a>
                <a href="/dokumen/Booklet_COMIC_x.pdf" target="_blank" style="background :#54c0af; border-color: #54c0af;"  class="btn btn-primary btn-rounded">Download Booklet Perlombaan</a>
            </div>

            <br><br>
            @if (env('HASIL_TM') == 'on')
                <h4>Hasil Technical Meeting</h4>
                <hr>
                {!!$models->tm_video!!}

                <br>
                <a href="{{$models->tm_file}}" target="_blank" class="btn btn-primary btn-rounded">Lihat Dokument TM</a>
                <br><br>
                <hr>
            @endif

            @if($models->id == 3) 
            <hr>
            <h5 class="text-white">Sisa Slot Lagu SMP</h5>
            <ul>
                @foreach ($data['smp'] as $item)
                <li>{{$item->name}} | <u>Sisa Slot : {{3-$item->competitor_count("7")->count()}}</u> </li>
                @endforeach
                
            </ul>
            <hr>
            <h5 class="text-white">Sisa Slot Lagu SMA</h5>
            <ul>
                @foreach ($data['smp'] as $item)
                <li>{{$item->name}} | <u>Sisa Slot : {{3-$item->competitor_count("8")->count()}}</u> </li>
                @endforeach
                
            </ul>
            <hr>
            @endif

            <h5 style="color: white;">Lihat lomba lainnya : </h5>
            <ul>
                @foreach ($other as $item)
                <li>
                    <a style="color: white" href="{{route('competition.detail', $item->slug)}}">{{$item->name}}</a>
                </li>
                @endforeach
            </ul>

            
        </div>
    </div>
</section>
<!--event section end -->


 @endsection