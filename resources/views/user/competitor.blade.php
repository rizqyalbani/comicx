@extends('layouts.template')
@section('title')Peserta COMIC IX
@endsection
@section('head')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
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
                        Peserta COMIC IX
                    </h3>
                </div>
            </div>
        </div>

        <div class="breadcrumbs">
            <ul>
                <li><a href="/">Beranda</a>  |   </li>
                <li><span>Peserta COMIC IX</span></li>
            </ul>
        </div>
    </div>
</section>
<!--page title section end-->


<!--events section -->
<section class="pt100 pb100">
    <div class="container">
        <div class="col-md-12">
        <label>
            Pilih Lomba
        </label>                  
            <select class="form-control select2" id="kdLomba" onchange="loadPesertaLomba()">
               @foreach($models as $key=>$val)
                <option value="{{$val->id}}">{{$val->name()}}</option>
               @endforeach
           </select>

           <div class="event_box">
            <div class="event_word">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-12" style="color: #222;">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" onkeyup="filterTable(this)" onkeydown="filterTable(this)" class="form-control" placeholder="Cari Peserta">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Peserta</th>
                                            <th>Nama Peserta</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Sekolah</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyPeserta">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <br><br>
                        <div align="center">
                            <a href="{{url('/maintenance')}}" class="btn btn-primary btn-rounded">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
       
    </div>
</section>
<!--event section end -->
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2();
        loadPesertaLomba();        
    });


    function loadPesertaLomba(){
            var txt = "";
            var id = $('#kdLomba').val();
            $.getJSON("{{route('api.pesertaLomba')}}?id="+id,function(data){      
                $.each(data, function(key, val){
                    txt +="<tr>";
                    txt +="<td>"+(key+1)+"</td>";
                    txt +="<td>"+val.code+"</td>";
                    txt +="<td>"+val.name+"</td>";
                    if(val.gender == 'L'){
                        txt +="<td>Laki - laki</td>";
                    }else{
                        txt +="<td>Perempuan</td>";
                    }
                    txt +="<td>"+val.from+"</td>";
                    txt +="</tr>";
                });
            }).done(function(){
                $('#tbodyPeserta').html(txt);
            });        
        }
    function filterTable(e){   
            var value = $(e).val().toLowerCase();
            $("#tbodyPeserta tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        }
</script>
 @endsection