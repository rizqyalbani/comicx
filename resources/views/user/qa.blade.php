@extends('layouts.template')
@section('title')Pertanyaan
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

    .text-gray-800 {
        color: #222;
    }
    
    .qa a{
        color: #03a6e1;
        text-decoration: underline;
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
                        Pertanyaan
                    </h3>
                </div>
            </div>
        </div>

        <div class="breadcrumbs" s>
            <ul>
                <li><a tyle="color: #ffff !important" href="/">Beranda</a>  |   </li>
                <li><span>Pertanyaan</span></li>
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
                <h5>Pilih Pertanyaan :</h5>
                <select name="" id="pertanyaan-list" class="form-control" onchange="changePertanyaan()">
                <option data-description="{{$question}}" value="">Umum</option>
                    @foreach ($models as $item)
                        <option data-description="{{$item->question_shows()}}" value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                <hr>
            </div>

            <div class="col-12" id="pertanyaan-container">
                
            </div>
            @if (Auth::check())
            
            <div class="col-12 mt-3">
                <br>
                <h5>Ajukan Pertanyaan</h5> 
                @if(\Session::has('info'))
                        <div class="row">
                        <div class="col-md-12">
                            <small>
                            <div class="alert alert-info alert-dismissible fade show">
                                {{\Session::get('info')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            </small>
                        </div>
                        </div>
            @endif
                <form action="{{route('qa.store')}}" method="post">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <label for="">Pilih Jenis Pertanyaan</label>
                        <select name="competition_type_id"  class="form-control">
                            <option value="">Umum</option>
                                @foreach ($models as $item)
                                    <option  value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tulis Pertanyaan</label>
                        <textarea name="question" class="form-control" rows="2" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-rounded">Tanyakan Sekarang</button>
                    </div>
                </form>
            </div>

            @else
            <div class="col-12 mt-3">
                <br>
                <h5>Ajukan Pertanyaan</h5> 
                <p>Silahkan login untuk mengajukan pertanyaan</p>
                <a class="btn btn-rounded btn-primary" href="{{route('login')}}">Login</a>
            </div>
            @endif
            
        </div>
    </div>
</section>
<!--event section end -->


 @endsection

 @section('script')
     <script>
        
        function changePertanyaan() {
            $('#pertanyaan-container').html('');
            var data_json = JSON.parse($('#pertanyaan-list').find('option:selected').attr('data-description'));
            
            var data = "";
            $.each(data_json, function(key, val){
                data += '<div class="card-q-and-a" style="display: block;">';
                data += '                <div class="card card-primary mb-2">';
                data += '                    <div class="card-header">';
                data += '                        <h6 style="margin: 0; color:#000;">';
                data += val.question;
                data += '                        </h6>';
                data += '                    </div>';
                data += '                    <div class="qa card-body text-gray-800">';
                data += '                        <b>Jawaban : </b><br>'+val.answer;
                data += '                    </div>';
                data += '                </div>';
                data += '            </div>';
            });
            
            $('#pertanyaan-container').html(data);

        }

        $(document).ready(function() {
                changePertanyaan();
            });
     </script>
 @endsection