@extends('layouts.admin')

@section('title') Detail Peserta @endsection
@section('back_button')
<a href="{{route('app.competitor.index')}}" class="mb-2 d-block"><small><i class="fa fa-arrow-left"></i> Kembali</small></a>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card mb-3">
            <div class="card-header text-gray-800">
                <b>Detail Peserta</b>
            </div>
            <div class="card-body text-gray-800">
              <b class="">{{$models->number()}}</b>
              <p>Lomba : {{$models->competitionCategory->name()}}</p>
              
              <b>Detail Peserta</b> <br>
              <small>
                @if($models->team_name != "") Nama Tim :  {{$models->team_name}} <br>  @endif  
                No HP : {{$models->phone}}
              </small> <br>
              <small>Catatan : </small> <br>
              {!!$models->statusPembayaran()!!} 
                        {!!$models->statusKarya()!!}  
       
              
              
            </div>
          </div>

          
    </div>
    <div class="col-lg-8">
        @if($models->competitor_status > 0)
        @if(date('Y-m-d H:i:s') > '2021-02-05 06:00:00')
        @if($models->isTilawah())
        <div class="card mb-3">
            <div class="card-header text-gray-800">
                <b>Tilawah</b>
            </div>
            <div class="card-body text-gray-800">
                @if($models->surah_id == "")
                    Anda belum memilih Maqro <br>
                    <a onclick="set('{{route('app.competitor.chooseSurah', $models->uuid)}}')" href="javascript:void(0)" class="btn btn-success btn-sm">Pilih Maqro</a>
                @else
                    <b>{{$models->surah->surah}}</b> <br>
                    Ayat : {{$models->surah->ayat}} <br>
                    Halaman : {{$models->surah->halaman}}
                @endif
            </div>
        </div>
        @endif
        @endif
        @if($models->isPopReligi())
        <div class="card mb-3">
            <div class="card-header text-gray-800">
                <b>Lagu</b>
            </div>
            <div class="card-body text-gray-800">
                @if($models->songs_id == "")
                    <form action="{{route('app.competitor.chooseSong',$models->uuid)}}" method="post">
                        @csrf
                        <small><b>Silahkan pilih lagu terlebih dahulu </b></small> : <br> <br>
                        <div class="form-group">
                            <select name="songs_id" class="form-control" id="">
                                @foreach ($song as $items)
                                    @if($items->competitor_count($models->competition_category_id)->count() < 3)
                                    <option value="{{$items->id}}">{{$items->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                        </div>
                    </form>
                @else
                    <p>{{$models->song->name}}</p>
                @endif
            </div>
        </div>
        @endif

        <div class="card mb-3">
            <div class="card-header text-gray-800">
                <b>Detail Pembayaran</b>
            </div>
            <div class="card-body text-gray-800">
            No Invoice : <a href="{{route('app.payment.show', $models->invoice->uuid)}}">{{$models->invoice->invoice()}}</a> <br>
            No Kwitansi : {{$models->kwitansi()}}
            </div>
        </div>
        @endif

        <div class="card mb-3">
            <div class="card-header text-gray-800">
                <b>Detail Peserta</b>
            </div>
            <div class="card-body text-gray-800">
                @foreach ($models->competitorDetail as $i => $detail)

                    @php
                        $er = 0;
                        $li = "";
                    @endphp

                    @if($detail->birth_date == '')
                        @php
                            $li .= "<li>Tanggal lahir belum diisi</li>";    
                            $er++;
                        @endphp
                    @endif
                    @if($detail->birth_place == '')
                        @php
                            $li .= "<li>Tempat lahir belum diisi</li>";    
                            $er++;
                        @endphp
                    @endif
                    @if($detail->image == '')
                        @php
                            $li .= "<li>Pas foto belum diisi</li>";    
                            $er++;
                        @endphp
                    @endif
                    @if($detail->student_identity == '')
                        @php
                            $li .= "<li>Identitas belum diisi</li>";    
                            $er++;
                        @endphp
                    @endif

                    @if( $er > 0)
                        <div class="alert alert-danger">
                           <small> {!!$li!!}</small>
                        </div>
                    @endif


                    <li>
                        <small style="display: inline-block;"><b>{{$detail->name}}</b> <br>
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        Tempat Lahir
                                    </td>
                                    <td></td>
                                    <td>
                                        : {{$detail->birth_place}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tanggal Lahir
                                    </td>
                                    <td></td>
                                    <td>
                                        : {{date('d M Y', strtotime($detail->birth_date))}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Asal Sekolah
                                    </td>
                                    <td></td>
                                    <td>
                                        : {{$detail->from}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Kelas
                                    </td>
                                    <td></td>
                                    <td>
                                        : {{$detail->class}} 
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Gender
                                    </td>
                                    <td></td>
                                    <td>
                                        : {{$detail->gender}} 
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>Dokumen</b> :</td>
                                </tr>
                                <tr>
                                    <td>Pas Foto</td>
                                    <td>:</td>
                                <td>@if($detail->image != null) <span class="badge badge-success"><span class="fa fa-check"></span></span> <a target="_blank" href="{{$detail->getFile('image')}}"><i class="fa fa-eye"></i></a> @else <span class="badge badge-danger"><span class="fa fa-times"></span></span> @endif</td>
                                </tr>
                                <tr>
                                    <td>Identitas</td>
                                    <td>:</td>
                                    <td>@if($detail->student_identity != null) <span class="badge badge-success"><span class="fa fa-check"></span></span> <a target="_blank" href="{{$detail->getFile('identity')}}"><i class="fa fa-eye"></i></a> @else <span class="badge badge-danger"><span class="fa fa-times"></span></span> @endif</td>
                                </tr>
                                
                            </table>

                           
                        </small>
                        <br> <br>
                        @if(\Session::has('success_'.$detail->uuid))
                       
                        <div class="row">
                          <div class="col-md-12">
                            <small>
                              <div class="alert alert-success alert-dismissible fade show">
                                {{\Session::get('success_'.$detail->uuid)}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                            </small>
                          </div>
                        </div>
                        
                         @endif
                    
                    @if($detail->identity_lock == 0)
                        <form action="{{route('app.competitor.detail.update',$detail->uuid )}}" method="POST" class="text-gray-800" enctype="multipart/form-data">
                                <label for=""><b>Lengkapi Data</b></label>
                                @csrf
                            <input type="hidden" name="competitor_id" value="{{$models->uuid}}">
                                
                            <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for=""><small>Nama</small></label>
                                            <input required type="text" value="{{$detail->name}}" class="form-control" name="name" id="" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for=""><small>Asal Sekolah</small></label>
                                            <input required type="text" value="{{$detail->from}}"  class="form-control" name="from" id="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for=""><small>Kelas</small></label>
                                            <input required type="number" value="{{$detail->class}}"  class="form-control" name="class" min="{{$models->competitionCategory->minKelas()}}"  max="{{$models->competitionCategory->maxKelas()}}" id="">
                                        </div>
                                    </div>
                                
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for=""><small>Tempat Lahir</small></label>
                                            <input required type="text" value="{{$detail->birth_place}}" class="form-control" name="birth_place" id="" placeholder="ex: Denpasar">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for=""><small>Tanggal Lahir</small></label>
                                            <input required type="date" value="{{$detail->birth_date}}"  class="form-control" name="birth_date" id="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for=""><small>Pas Foto (3x4)</small></label>
                                            <input type="file" class="form-control-file" name="image" id="">
                                        </div>
                                        <a href="/img/general/pas_foto.jpg" target="_blank">Lihat contoh pas foto :</a>
                                    </div>
                                    <div class="col-6">
                                    <div class="form-group">
                                            <label for=""><small>Foto Identitas (Kartu Pelajar/Rapor)</small></label>
                                            <input type="file" class="form-control-file" name="student_identity" id="">
                                    </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-sm btn-block">Simpan Data</button>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    @else
                        <a href="{{\Request::url()}}?access_edit=yes&detail={{$detail->uuid}}" class="btn btn-success btn-sm">Request Edit</a>
                    @endif

                        
                    </li>
                    <hr>
              @endforeach
            </div>
        </div>

    </div>
</div>
@endsection

@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function set(id) {
      Swal.fire({
        title: "Memilih Maqro?",
        text: "Maqro akan ditentukan secara acak. Setelah dipilih, peserta tidak bisa mengubahnya lagi",
        icon: "info",
        showCancelButton: true,
        buttons: true,
        dangerMode: false,
      })
      .then((willDelete) => {
        if (willDelete.isConfirmed) {
            window.location.href = id;
            Swal.fire(
            'Success!',
            'Macro Berhasil dipilih',
            'success',
        //   $(id).unbind('submit').submit()
          
        )} else {
          return false;
        }
      });
    }
</script>
@endsection