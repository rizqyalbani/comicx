@extends('layouts.admin')

@section('title') Tambah Peserta (Individu) @endsection
@section('head')
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> --}}
@endsection
@section('back_button')
<a href="{{route('app.competitor.index')}}" class="mb-2 d-block"><small><i class="fa fa-arrow-left"></i> Kembali</small></a>
@endsection
@section('content')

@if(true == false)

<p>Pendaftaran telah <strong>ditutup</strong></p>
@else
<a href="{{route('panduan.index')}}?target=mendaftar-sebagai-peserta" target="_blank" class="btn btn-info btn-block mb-2">Lihat Panduan</a>

<form id="formSubmit" method="POST" action="{{route('app.competitor.store')}}">
    @csrf
<div class="row">
    <div class="col-md-5">
        <div class="card shadow mb-4">
            <div class="card-header text-gray-800">
                <span class="badge badge-primary">1</span> Pilih Lomba
            </div>
           <div class="card-body " style="overflow: hidden;">
            <ul class="nav nav-pills">
                <li class="nav-item">
                <a class="nav-link active btn-sm" href="{{route('app.competitor.create')}}">Individu</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn-sm" href="{{route('app.competitor.createTeam')}}">Kelompok</a>
                </li>
                </li>
              </ul>
              <br>
              <select class="js-example-basic-single form-control select2 competition" id="comp" name="competition">
                @foreach ($competition as $item)
                    @if($item->competitor->count() < $item->quota)
                    <option data-class="{{$item->class}}" data-gender="{{$item->competition_gender_id}}"  data-min-member="{{$item->min_member}}" data-max-member="{{$item->member}}" @if($item->competitionType)  data-url="{{route('competition.detail', $item->competitionType->slug)}}" @endif value="{{$item->id}}">{{$item->name()}}</option>
                    @endif
                @endforeach
              </select>
             
              <div id="detail-lomba" class="mt-2">
                
                <a href="">Lihat detail lomba</a>
              </div>
              <div class="alert alert-info mt-3 text-center">
                <h4><i class="fa fa-file-word"></i></h4>
                <strong>Guide Book Lomba</strong> <br>
                <a href="/dokumen/Booklet_COMIC_9.pdf" target="_blank" class="btn btn-info mt-2 btn-sm">Download</a>

              </div>
              
              <hr>
              <b class="text-gray-800">Catatan : </b> <br>
              <div class="text-gray-800">
                <b>PA</b> = Laki-Laki <br>
                <b>PI</b> = Perempuan <br>
                <b>A</b> = Kelas 1,2,3 <br>
                <b>B</b> = Kelas 4,5,6
              </div>
           </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card shadow mb-4">
            <div class="card-header text-gray-800">
                <span class="badge badge-primary">2</span> <b>Data Peserta</b> 
            </div>
           <div class="card-body" id="detail">
                <div id="detail-competitor-container">
                    <div class="detail-competitor">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-gray-800 text-bold">Nama Lengkap</label>
                                <input required type="text" value="" class="form-control" name="name[]" placeholder="Masukkan nama ...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-gray-800">Jenis Kelamin</label>
                                    <select required name="gender[]" class="form-control jk" id="">
                                        <option value="" selected hidden>Pilih Jenis Kelamin</option>
                                        <option value="P">Perempuan</option>
                                        <option value="L">Laki-Laki</option>
                                    </select>
                                </div>
                            </div>
                        </div>
        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-gray-800">Nomor Telepon</label>
                                    <input type="text" value="" pattern="\d+" required class="form-control number-format" name="phone[]" placeholder="Ex : 08xxxxxx">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-gray-800">Nama Sekolah</label>
                                    <input type="text" class="form-control" required name="from[]" placeholder="Masukkan asal sekolah ...">
                                </div>
                            </div>
                        </div>
        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-gray-800">Kelas</label>
                                    <input type="number" min="1" max="12" required class="form-control kelas" name="class[]" placeholder="1 - 12">
                                </div>
                            </div>
                            
                        </div>
                        <hr>
                    </div>
                </div>

                <a href="javascript:void(0)" id="add-competitor"><i class="fa fa-plus"></i> Tambah Peserta Lain</a>


           </div>
        </div>


        <div class="card shadow mb-4">
            <div class="card-body">
                <button id="submit-btn" type="submit" class="btn btn-block btn-success">Daftar</button>
            </div>
        </div>
    </div>
   
</div>
</form>


@endif

@endsection

@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
       $(document).ready(function() {

        @if(\Session::has('alert-success'))
            Swal.fire({
                title: "Selamat!",
                text: "Proses pendaftaran berhasil, silahkan lakukan pembayaran. Pastikan pembayaran sudah terupload dalam waktu maksimal 4 hari ke depan.",
                icon: "success",
                button: "Okay",
            });
        @endif

        var kelas = $('#comp option:selected').attr('data-class');
        var gender = $('#comp option:selected').attr('data-gender');
        var url = $('#comp option:selected').attr('data-url');

        $('#detail-lomba').html("<a target='_blank' href="+url+">Lihat detail lomba</a>");


        $('#add-competitor').click(function(){
            var component = '<div class="detail-competitor">';
            component += '<div class="row">';
             component += '                <div class="col-md-12 text-right"><span class="text-danger removeel" onclick="removeEl(this)"><i class="fa fa-times"></i></span></div>';
             component += '                <div class="col-md-6">';
             component += '                    <div class="form-group">';
             component += '                        <label class="text-gray-800 text-bold">Nama Lengkap</label>';
             component += '                        <input required type="text" class="form-control" name="name[]" placeholder="Masukkan nama ...">';
             component += '                     </div>';
             component += '                </div>';
             component += '                <div class="col-md-6">';
             component += '                    <div class="form-group">';
             component += '                        <label class="text-gray-800">Jenis Kelamin</label>';
             component += '                        <select required name="gender[]" class="form-control jk" id="">';
             component += '                            <option value="" selected hidden>Pilih Jenis Kelamin</option>';
             component += '                            <option value="P">Perempuan</option>';
             component += '                            <option value="L">Laki-Laki</option>';
             component += '                        </select>';
             component += '                    </div>';
             component += '                </div>';
             component += '            </div>';
             component += '';
             component += '            <div class="row">';
             component += '                <div class="col-md-6">';
             component += '                    <div class="form-group">';
             component += '                        <label class="text-gray-800">Nomor Telepon</label>';
             component += '                        <input type="text" onkeyup="validateNumber(this)" value="" pattern="\\d+" required class="form-control number-format" name="phone[]" placeholder="Ex : 08xxxxxx">';
             component += '                    </div>';
             component += '                </div>';
             component += '                <div class="col-md-6">';
             component += '                    <div class="form-group">';
             component += '                        <label class="text-gray-800">Nama Sekolah</label>';
             component += '                        <input type="text" class="form-control" required name="from[]" placeholder="Masukkan asal sekolah ...">';
             component += '                    </div>';
             component += '                </div>';
             component += '            </div>';
             component += '';
             component += '            <div class="row">';
             component += '                <div class="col-md-6">';
             component += '                    <div class="form-group">';
             component += '                        <label class="text-gray-800">Kelas</label>';
             component += '                        <input type="number" min="1" max="12" required class="form-control kelas" name="class[]" placeholder="1 - 12">';
             component += '                    </div>';
             component += '                </div>';
             component += '';
             component += '            </div>';
             component += '            <hr>';
             component += '        </div>';

            $('#detail-competitor-container').append(component);
        });


        $('#comp').change(function(){
            $(this).find('option:selected')

            kelas = $('#comp option:selected').attr('data-class');
            gender = $('#comp option:selected').attr('data-gender');
            url = $('#comp option:selected').attr('data-url');

            $('#detail-lomba').html("<a  target='_blank' href="+url+">Lihat detail lomba</a>");

        });


        $('#formSubmit').on('submit', function(e){
            e.preventDefault();
            var isValid = 1;
            // 1,2,3,4,5,6,7,8,9,10,11,12
            $('.kelas').each(function(){
                var ck = $(this).val();
                var arr = kelas.split(',');
                if(jQuery.inArray( ck, arr) == -1){
                    isValid = 0;
                    $(this).addClass('is-invalid');
                    $(this).parent().children('.notification').remove();
                    $(this).parent().append('<small class="text-danger notification">Pilih lomba sesuai kelas</small>')
                } else {
                    $(this).removeClass('is-invalid');
                    $(this).parent().children('.notification').remove();
                }
            });

            $('.jk').each(function(){
                var jenisKel = $(this).find('option:selected').attr('value');
                if(jenisKel == 'L') {
                    jenisKel = 'PA';
                } else if(jenisKel == 'P'){
                    jenisKel = 'PI';
                }
                if(gender != 'U' && gender != jenisKel) {
                    isValid = 0;
                    $(this).addClass('is-invalid');
                    $(this).parent().children('.notification').remove();
                    $(this).parent().append('<small class="text-danger notification">Pilih lomba sesuai jenis kelamin</small>')
                } else {
                    $(this).removeClass('is-invalid');
                    $(this).parent().children('.notification').remove();
                }
            });

            if(isValid == 0) {
                Swal.fire({
                    title: "Data tidak valid",
                    text: "Mohon isi data dengan benar",
                    icon: "warning"
                });
            } else {
                $('#submit-btn').attr('disabled','true');
                $('#formSubmit').unbind('submit').submit();
            }

        });

        $('.removeel').click(function(){
            alert('aa');
        });
        
       
            
        });

        function removeEl(el){
            $(el).parents('.detail-competitor').remove()
        }

        function validateNumber(el) {
            el.value = el.value.replace(/[^0-9\.]/g,'');
        }

        $('.number-format').each(function(e){
            $(this).keyup(function () {
                this.value = this.value.replace(/[^0-9\.]/g,'');
            });
        });

    </script>
    
@endsection

