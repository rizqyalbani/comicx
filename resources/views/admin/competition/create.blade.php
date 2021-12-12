@extends('layouts.admin')
@section('title')
Tambah Lomba
@endsection
@section('back_button')
<a href="{{route('admin.competition.index')}}" class="mb-2 d-block"><small><i class="fa fa-arrow-left"></i> Kembali</small></a>
@endsection
@section('content')
  <div class="card shadow mb-4">
    <!-- Card Bodys -->
    <div class="card-body ">
      <form action="{{route('admin.competition.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="" class="label">Nama</label>
                {{-- <input type="text" class="form-control" autocomplete="off" name="name" required value="{{$data['models']->competitionType->name}}"> --}}
                <select class="form-control" id="exampleFormControlSelect1" name="name">
                  @forelse ($types as $item)
                  <option value="{{$item->id}}" >{{$item->name}}</option>
                  @empty
                    
                  @endforelse
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="" class="label">Jenjang</label>
                <select class="form-control" id="exampleFormControlSelect1" name="level">
                  @forelse ($levels as $item)
                  <option value="{{$item->id}}">{{$item->id}}</option>
                  @empty
                    
                  @endforelse
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="" class="label">Tim</label>
                {{-- <input  disabled type="text" class="form-control" autocomplete="off" name="code" required value="{{$data['models']->isteam()}}"> --}}
                <select disabled class="form-control" id="exampleFormControlSelect1">
                  <option value="1">Ya</option>
                  <option value="0">Tidak</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="" class="label">Lokasi Lomba</label>
                <select class="form-control" id="exampleFormControlSelect1" name="online">
                  <option value="1"}} >Online</option>
                  <option value="0"}} >Offline</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="" class="label">Minimal Member</label>
                <input type="number" class="form-control" autocomplete="off" name="min_member" required value="">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="" class="label">Member</label>
                <input type="number" class="form-control" autocomplete="off" name="member" required value="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="" class="label">Kelas</label>
                <input type="text" class="form-control" autocomplete="off" name="class" required value="">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="" class="label">Harga</label>
                <input type="number" class="form-control" autocomplete="off" name="price" required value="">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="" class="label">Gender</label>
                <select class="form-control" id="exampleFormControlSelect1" name="gender">
                  @forelse ($genders as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                  @empty
                    
                  @endforelse
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="" class="label">Kuota</label>
                <input type="number" class="form-control" autocomplete="off" name="quota" required value="">
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="form-group">
          <label for="" class="label">Deskripsi</label>
          <textarea id="editor" class="form-control" name="description" rows="20" cols="50">{!!$models->description!!}</textarea>
        </div>
        <div class="form-group">
          <label for="" class="label">Gambar</label>
          <input type="file" name="image" class="form-control-file" accept="image/*"  id="image-source" >
          @if($models->image != null)
          <img src="{{$models->getImage()}}" class="mt-2" alt="" style="width: 200px;"> 
          @endif
        </div> --}}
    </div>
    <div class="modal-footer">
      <button type="reset" class="btn btn-danger">Reset</button>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
  </div>

@endsection

@section('script')
<script src="{{asset('editor/ckeditor/ckeditor.js')}}"></script>
<link href="{{ asset('editor/ckeditor/plugins/codesnippet/lib/highlight/styles/default.css') }}" rel="stylesheet">
<script src="{{ asset('editor/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js') }}"></script>
<script>
  var konten = document.getElementById("editor");
    CKEDITOR.replace(konten,{
    language:'en-gb'
  });
  CKEDITOR.config.allowedContent = true;
</script>
<script>
  function angka(event) {
      var angka = (event.which) ? event.which : event.keyCode
      if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
          return false;
      return true;
  }
</script>
<script>hljs.initHighlightingOnLoad();</script>
@endsection

