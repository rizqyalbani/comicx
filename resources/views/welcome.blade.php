@extends('layouts.template')
@section('title')Beranda @endsection

@section('content')
<!--cover section slider -->
<section id="home" class="home-cover">
    <div class="cover_slider owl-carousel owl-theme">
        <div class="cover_item" style="background-image: url('assets/img/bg/bg-comic.jpg');">
             <div class="slider_content">
                <div class="slider-content-inner">
                    <div class="container">
                        <div class="slider-content-center">
                            <h2 class="cover-title">
                                Siapkan Dirimu Untuk
                            </h2>
                            <strong class="cover-xl-text">COMIC X!</strong>
                            <p class="cover-date">
                                <strong>Ahad, 20 Februari 2022</strong> <br>
                                Secara Online
                            </p>
                             {{-- <a href="/zoom" style="background :#54c0af; border-color: #54c0af;" class=" btn btn-primary btn-rounded  mb-2" >
                                    Username Zoom
                            </a> --}}
                            <a href="#more" class="mb10 btn btn-rounded" style="background-color: #FF7C55; color: #fff" >
                                Pelajari Selengkapnya
                            </a>
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
    <div class="cover_nav" >
        <a href="#more">
            <ul class="btn btn-rounded" style="background-color: #191919">
                <span class="fa fa-arrow-down" style="color: #FF7C55"></span>
            </ul>
        </a>
    </div>
</section>
<!--cover section slider end -->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Pengumuman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--Berikut merupakan username zoom yang akan digunakan pada saat technical meeting :-->
        <!--<br><br>-->
        <!--<a href="/zoom" class="btn btn-primary btn-block">Username Zoom</a>-->
       Join Zoom Meeting
        <br>
        <a style="color: blue;" href="https://us02web.zoom.us/j/85389803796?pwd=RHd6aFMvVWZBVS94YTlrMkdxL1RQdz09">https://us02web.zoom.us/j/85389803796?pwd=RHd6aFMvVWZBVS94YTlrMkdxL1RQdz09</a>
        <br>
        Meeting ID: 853 8980 3796 <br>
        
        Passcode: stikombali
        <br><br>
        <a href="https://us02web.zoom.us/j/85389803796?pwd=RHd6aFMvVWZBVS94YTlrMkdxL1RQdz09" class="btn btn-primary btn-block">Join Zoom</a>
      </div>
  
    </div>
  </div>
</div>
<!--event info -->
<section class="pt100 pb100 mt-75" style="background-color: #191919"  id="more">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 col-md-3  ">
                <div class="icon_box_two">
                    <i class="ion-ios-calendar-outline" style="color: #77d1c5;"></i>
                    <div class="content">
                        <h5 class="box_title">
                          <b>Tanggal Pelaksanaan</b>
                        </h5>
                        <p>
                            20 Februari 2022
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3  ">
                <div class="icon_box_two">
                    <i class="ion-ios-location-outline" style="color: #77d1c5;"></i>
                    <div class="content">
                        <h5 class="box_title">
                            <b>Lokasi</b>
                        </h5>
                        <p>
                            Online
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3  ">
                <div class="icon_box_two">
                    <i class="ion-ios-person-outline" style="color: #77d1c5;"></i>
                    <div class="content">
                        <h5 class="box_title">
                            <b>Peserta</b>
                        </h5>
                        <p>
                            SD, SMP, SMA / Sederajat tingkat Nasional
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3  ">
                <div class="icon_box_two">
                    <i class="ion-ios-pricetag-outline" style="color: #77d1c5;"></i>
                    <div class="content">
                        <h5 class="box_title">
                            <b>Biaya Daftar</b>
                        </h5>
                        <p>
                            Mulai dari Rp35.000,- per lomba 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--event info end -->


<!--event countdown -->
<section class="bg-img pt70 pb70" style="background-image: url('assets/img/bg/comic_alt.JPG');">
    <div class="overlay_dark"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <h4 class="mb30 text-center color-light">Countdown to COMIC X 2022!</h4>
                <div class="countdown"></div>
            </div>
        </div>
    </div>
</section>
<!--event count down end-->


<section class="pt100 pb100" style="background-color: #191919">
    <div class="container">
        <div class="section_title">
            <h3 class="title">
                Apa Sih Comic Itu?
            </h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/yKuIpdcqIZY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="col-12 col-md-6" >
                <p style="color: #fff">
                    COMIC adalah singkatan dari Competition of Islamic Creativity, merupakan ajang perlombaan yang diadakan oleh UKM MCOS STIKOM Bali untuk berkompetisi dalam berbagai bidang dalam Islam. COMIC diikuti oleh peserta dari berbagai jenjang seperti SD, SMP dan SMA atau Sederajat tingkat Nasional.
                </p>
                <p style="color: #fff">
                    COMIC sudah diselenggarakan sebanyak 8 (delapan) kali, yang artinya pada tahun 2021 mendatang merupakan penyelenggaraan dari COMIC IX.
                </p>
            </div>
        </div>

    </div>
</section>


<!--speaker section-->
<section class="pb100" style="background-color: #0f0f0f">
    <div class="container">
        <div class="section_title mb50">
            <h3 class="title">
               Jenis Lomba COMIC IX
            </h3>
            <a target="_blank" href="{{asset('dokumen/Booklet_COMIC_X.pdf')}}" class=" btn btn-primary btn-rounded">
                Download Booklet Perlombaan
            </a>
        </div>
        
    </div>
    <div class="row justify-content-center no-gutters" id="competition">
        
        @foreach ($competition as $item)
        <div class="col-md-3 col-sm-6">
            <div class="speaker_box">
            <a href="{{route('competition.detail', $item->slug)}}">
                    <div class="speaker_img">
                        <img src="{{$item->getImage()}}" alt="{{$item->name}}">
                        <div class="info_box">
                            <h5 class="name">{{$item->name}}</h5>
                            <p class="position">{{$item->class}}</p>
                        </div>
                    </div>
                </a>
                
            </div>
        </div>
        @endforeach
        
    </div>
</section>
<!--speaker section end -->

<section class="pt100 pb10" style="padding-top: 0 !important; background-color: #191919">
    <div class="container">
        <div class="section_title">
            <h3 class="title">
                Syarat Pendaftaran COMIC IX
            </h3>
        </div>
        <div class="row">
          <div class="col-md-12">
            <p>
              </p><ol style="color: white;font-weight: 500;">
                <li>Beragama Islam</li>
                <li>Tercatat sebagai Siswa/Siswi sampai tanggal 14 februari 2021</li>
                <li>Mengunggah foto Peserta ukuran 3x4</li>
                {{-- <li>Batas booking lomba 4 hari. Jika lewat dari batas, akan dihapus</li> --}}
                {{-- <li>Peserta yang sakit saat perlombaan dianggap mengundurkan diri, kecuali sudah ijin 4 hari sebelum lomba &amp; digantikan dengan Peserta yang lain</li> --}}
                {{-- <li>Mengisi surat pernyataan dan dibawa pada saat <b>Technical Meeting</b> berupa <b>Hard Copy</b> untuk ditukarkan dengan nametag Peserta
                  <br>Surat pernyataan dapat di download pada tombol di bawah.
                </li> --}}
                {{-- <li>Wajib membawa kupon &amp; Hard Copy surat pernyataan saat Technical Meeting sebagai syarat penukaran nametag</li> --}}
                <li>Untuk peserta yang sudah membayar apabila ingin melakukan pembatalan, maka uang yang sudah dibayar tidak bisa dikembalikan</li>
                {{-- <li>Pembagian name tag dilakukan saat <b>Technical Meeting</b> &amp; kehilangan nametag yang terjadi saat hari H <b>bukan merupakan tanggung jawab panitia</b></li> --}}
              </ol>
              <br>
                <!--<a target="_blank" href="/dokumen/Surat_Pernyataan.pdf" class=" btn btn-primary btn-rounded mb-2">-->
                <!--    Download Surat Pernyataan-->
                <!--</a>-->
                <a href="{{route('register')}}" class=" btn btn-primary btn-rounded">
                    Daftar Sekarang
                </a>                
            <p></p>
          </div>
        </div>

        <!--event features-->
        <div class="row justify-content-center mt30">

        </div>
        <!--event features end-->
    </div>
</section>

<!--event calender-->
<section class="pb100 pt40" style="background-image: url('assets/img/bg/pattern.jpeg'); background-size: cover;">
    <div class="container">
        <div class="row timeline ">
            <div class="col-md-12">
                <div class="section_title">
                    <span class="title">Rangkaian Agenda COMIC X</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="pt20 col-md-12 text-center">
                <img src="{{asset('assets/img/pendaftaran-comic.svg')}}" class="m-auto" style="width: 100px; height: 100px"  alt="event">
                <h5 class="mt-3" style="color: #fff">Pendaftaran Online</h5>
                <span style="display: block">06 Desember 2021 - 06 Februari 2022</span>
                <img src="{{asset('assets/img/customIcon/Arrow-down.svg')}}" class="m-auto" style="width: 50px; height: 80px; position: relative" alt="Aroow down">
            </div>
        </div>
        <div class="row">
            <div class="pt20 col-md-12 text-center">
                <img src="{{asset('assets/img/tm-comic.svg')}}" class="m-auto" style="width: 90px; height: 90px" alt="event">
                <h5 class="mt-3" style="color: #fff">Technical Meeting</h5>
                <span style="display: block">Ahad, 13 Februari 2022</span>
                <img src="{{asset('assets/img/customIcon/Arrow-down.svg')}}" class="m-auto" style="width: 50px; height: 80px; position: relative" alt="Aroow down">
            </div>
        </div>
        <div class="row">
            <div class="pt20 col-md-12 text-center">
                <img src="{{asset('assets/img/upload-comic.svg')}}" style="width: 100px; height: 100px" class="m-auto" alt="event">
                <h5 class="mt-3" style="color: #fff">Pengumpulan Karya</h5>
                <span style="display: block">Kamis, 17 Februari 2022</span>
                <img src="{{asset('assets/img/customIcon/Arrow-down.svg')}}" class="m-auto" style="width: 50px; height: 80px; position: relative" alt="Aroow down">
            </div>
        </div>
        <div class="row">
            <div class="pt20 col-md-12 text-center">
                <img src="{{asset('assets/img/comic-x.png')}}" class="m-auto" style="width: 120px; height: 100px" alt="event">
                <h5 class="mt-3" style="color: #fff">Puncak Acara & Pengumuman Juara</h5>
                <span>Ahad, 20 Februari 2022</span>
            </div>
        </div>
        {{-- <div class="table-responsive">
            <table class="table event_calender ">
                <thead class="event_title" >
                <tr>
                    <th  colspan="2">
                        <i class="ion-ios-calendar-outline"></i>
                        <span >Rangkaian Agenda COMIC X</span>
                    </th>
                </tr>
                </thead>
                <tbody style="background-color: #191919">
                <tr>
                    <td class="text-center " style="color: #fff">
                        <img src="/assets/img/pendaftaran-comic.svg" class="m-auto" style="width: 250px; height: 250px"  alt="event">
                    </td>
                    <td style="event_date" colspan="2">
                        <h5 class="mt-3" style="color: #fff">Pendaftaran Peserta</h5>
                        <span>25 November 2020 - 5 Februari 2021</span>
                    </td>
                </tr>
                <tr>
                    <td class="event_date" style="color: #fff">
                        <img src="/assets/img/tm-comic.svg" class="m-auto" style="width: 250px; height: 250px" alt="event">
                    </td>
                    <td>
                        <h5 class="mt-3" style="color: #fff">Technical Meeting</h5>
                        <span>6 Februari 2021</span>
                    </td>
                </tr>

                <tr>
                    <td class="event_date" style="color: #fff">
                        <img src="/assets/img/upload-comic.svg" style="width: 250px; height: 250px" class="m-auto" alt="event">
                    </td>
                    <td>
                        <h5 class="mt-3" style="color: #fff">Upload Karya</h5>
                        <span>11-12 Februari 2021</span>
                    </td>
                </tr>
               
                <tr>
                    <td>
                        <img src="/assets/img/comic-x.png" class="m-auto" alt="event">
                    </td>
                    <td>
                        <h5 class="mt-3" style="color: #fff">Penjurian dan Pengumuman</h5>
                        <span>14 Februari 2021</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div> --}}
    </div>
</section>
<!--event calender end -->

<!--brands section -->
<section class="pt100 pb100" style="background-color: #191919">
    <div class="container mb-5">
        <div class="section_title mb50">
            <h3 class="title">
                Sponsorship
            </h3>
        </div>
        <div class="text-center">
            @if ($sponsor_utama->count() > 0)
            @foreach ($sponsor_utama as $item)
                <img class="sponsorship" data-toggle="tooltip" data-placement="bottom" src="{{$item->getImage()}}" alt="{{$item->name}}">
            @endforeach
            
            <br> <br>
            @endif
            
            @forelse ($sponsor as $item)
                <img class="media-partner" src="{{$item->getImage()}}" alt="{{$item->name}}">
            @empty
                <p style="text-align:left;">Slot tersedia</p>
            @endforelse
        
        </div>
    </div>
    <br>
    <div class="container">
        <div class="section_title mb50">
            <h3 class="title">
                Media Partner
            </h3>
        </div>
        <div class="text-center">
            
            @forelse ($media as $item)
                <img class="media-partner" src="{{$item->getImage()}}" alt="{{$item->name}}">
            @empty
                <p style="text-align:left;">Slot tersedia</p>
            @endforelse
            
        </div>
    </div>
</section>
<!--brands section end-->
@endsection

@section('script')
    <script>
     //$('#myModal').modal('show');
</script>
@endsection