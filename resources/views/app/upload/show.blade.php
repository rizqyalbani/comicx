@extends('layouts.admin')

@section('title') Upload Karya {{$models->number()}} @endsection
@section('back_button')
<a href="{{route('app.upload.index')}}" class="mb-2 d-block"><small><i class="fa fa-arrow-left"></i> Kembali</small></a>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card mb-3">
            <div class="card-body text-gray-800">
              <b class="">{{$models->number()}}</b>
              <p>{{$models->competitionCategory->name()}}</p>
              <b>Detail Peserta</b> <br>
              <small>
                @if($models->team_name != "") Nama Tim :  {{$models->team_name}} <br>  @endif  
                No HP : {{$models->phone}}
                @if($models->songs_id != "")
                    <hr>
                    <b>Lagu</b> : {{$models->song->name}}
                @endif

                @if($models->surah_id != "")
                    <hr>
                    <b>Maqro</b> : <br>
                    <b>{{$models->surah->surah}}</b> <br>
                    Ayat : {{$models->surah->ayat}} <br>
                    Halaman : {{$models->surah->halaman}}
                @endif
              </small>
             
              @foreach ($models->competitorDetail as $detail)
              <hr>
                    <li>
                        
                        <small style="display: inline-block;"><b>{{$detail->name}}</b> <br>
                            <table>
                                <tr>
                                    <td>
                                        Asal
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
                            </table>
                        </small>
                        
                    </li>
              @endforeach
              
            </div>
          </div>
    </div>
    <div class="col-lg-8">
        @if ($models->competitionCategory->competitionType->date_start >= date('Y-m-d H:i:s'))
        <div class="card">
            <div class="card-header text-gray-800">
                <b>Upload Karya</b> <a href="{{route('panduan.index')}}?target=melakukan-upload-karya" target="_blank" class="btn btn-info btn-sm float-right">Panduan</a>
                </div>
            <div class="card-body text-center text-gray-800">
                <div class="alert alert-info">
                    Form upload karya saat ini belum dibuka
                </div>
                <br>
                Tanggal upload karya
                <h3>{{date('d M Y', strtotime($models->competitionCategory->competitionType->date_start))}}</h3>
                <br>
            </div>
        </div>
        @else
        <div class="card mb-3">
            <div class="card-header text-gray-800">
            <b>Upload Karya</b> <a href="{{route('panduan.index')}}?target=melakukan-upload-karya" target="_blank" class="btn btn-info btn-sm float-right">Panduan</a>
            </div>
            <div class="card-body">
                <small>
                    <div class="alert alert-info">
                        <li>
                            Upload hasil karya berupa video ataupun gambar ke <b>google drive</b>. Link karya harus bersifat <b>publik</b>.
                        </li>
                    </div>
                </small>
                <form id="formUpdate" action="{{route('app.upload.update', $models->uuid)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="text-gray-800 font-weight-bold">Link karya</label>
                        <input type="text" class="form-control" value="{{old('submission_url', $models->submission_url)}}" name="submission_url">
                    </div>
                    <div class="form-group">
                        <label class="text-gray-800 font-weight-bold">Deskripsi</label>
                        <textarea name="submission_description" class="form-control" rows="4">{!!old('submission_description', $models->submission_description)!!}</textarea>
                    </div>

                    <div class="form-group">
                        
                        <button type="button" onclick="updateData('#formUpdate')" id="btnUpload"  class="btn btn-block btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header text-gray-800">
                <b>Riwayat Upload</b>
            </div>
            <div class="card-body">
                @forelse ($models->submissionLog as $item)
                    <span class="badge badge-{{$item->type}}">{{$item->type}}</span> <br>
                    <small class="text-gray-800">
                        <b>{{$item->description}}</b> <br>
                        {{$item->date()}}
                    </small>
                    <hr>
                @empty
                    <p class="text-gray-800">Belum ada riwayat upload</p>
                @endforelse
            </div>
        </div>
        @endif
        

        
    </div>
</div>
@endsection

@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
     @if(\Session::has('success'))
         Swal.fire({
             title: "Selamat!",
             text: "Upload karya telah berhasil dilakukan, proses pengecekan membutuhkan waktu maksimal 2x24 jam",
             icon: "success",
             button: "Okay",
         });
     @endif

    function updateData(id) {
      Swal.fire({
        title: "Yakin ingin menyimpan data?",
        text: "Setelah data dikunci panitia, Anda tidak akan dapat merubah data tersebut",
        icon: "warning",
        showCancelButton: true,
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $(id).unbind('submit').submit();
          $("#btnUpload").attr('disabled', true);
          Swal.fire(
            'Success!',
            'Data Berhasil dikunci',
            'success'
          
        } else {
          return false;
        }
      });
    }
</script>
@endsection


