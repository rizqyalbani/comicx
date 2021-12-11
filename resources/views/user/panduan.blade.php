@extends('layouts.template')
@section('title')Panduan
@endsection
@section('head')
<style type="text/css">
    .form-control {
        font-size: 12px;
        padding: 12px 15px;
        height: 50px;
        border-radius: 1px;
         background-color: #ffff; 
        border: solid 1px #e2e6f1;
        margin-bottom: 25px;
        outline: 0 !important;
        font-style: italic;
        -webkit-transition: all ease-in-out 0.4s;
        transition: all ease-in-out 0.4s;
    }

    select.form-control:not([size]):not([multiple]) {
        height: calc(2.25rem + 10px);
        max-width: 300px;
        font-style: normal;
    }
</style>
@endsection
@section('content')
     
<!--page title section-->
<section class="inner_cover parallax-window" data-parallax="scroll" data-image-src="{{url('/assets/img/bg/comic.JPG')}}">
    <div class="overlay_dark"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <div class="inner_cover_content">
                    <h3>
                        Panduan
                    </h3>
                </div>
            </div>
        </div>

        <div class="breadcrumbs">
            <ul>
                <li><a href="/">Beranda</a>  |   </li>
                <li><span>Panduan</span></li>
            </ul>
        </div>
    </div>
</section>
<!--page title section end-->


<!--events section -->
<section class="pt100 pb100 bg-black">
    <div class="container">

        <div class="row">
            <div class="col-12 ">
                <h5>Pilih Panduan :</h5>
                <select name="" id="panduan-list" class="form-control" onchange="changePanduan()">
                    @foreach ($models as $item)
                        <option @if(\Request::get('target') == $item->slug) selected @endif value="{{$item->id}}" data-desktop="{{$item->video_desktop}}" data-mobile="{{$item->video_mobile}}" data-description="{{$item->description}}" data-title="{{$item->name}}">{{$item->name}}</option>
                    @endforeach
                </select>
                <br>
            </div>

            <div class="col-md-6 ">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#desktop" role="tab" aria-controls="desktop" aria-selected="true">Panduan Desktop</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#mobile" role="tab" aria-controls="mobile" aria-selected="false">Panduan Mobile</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <br>
                    <div class="tab-pane fade show active" id="desktop" role="tabpanel" aria-labelledby="home-tab">
                        
                    </div>
                    <div class="tab-pane fade" id="mobile" role="tabpanel" aria-labelledby="profile-tab">
                        
                    </div>
                    <br>
                  </div>
            </div>
            <div class="col-md-6 text-gray-800">
               
                <h5>Deskripsi Panduan</h5>
                <hr>

                <div id="description-container">

                </div>

            </div>
        </div>
        
    </div>
</section>
<!--event section end -->
@endsection

@section('script')
    <script>
        changePanduan();
        function changePanduan() {
            $('#description-container').html('');
            var title = $('#panduan-list').find('option:selected').attr('data-title');
            var desktop = $('#panduan-list').find('option:selected').attr('data-desktop');
            var mobile = $('#panduan-list').find('option:selected').attr('data-mobile');
            var description = $('#panduan-list').find('option:selected').attr('data-description');

            $('#description-container').append('<h6>'+title+'</h6>');
            $('#description-container').append(description);

            $('#desktop').html(desktop);
            $('#mobile').html(mobile);
        }
    </script>
@endsection