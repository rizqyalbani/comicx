@extends('layouts.admin')
@section('title')
Edit Tipe Lomba
@endsection
@section('back_button')
<a href="{{route('admin.competitionType.index')}}" class="mb-2 d-block"><small><i class="fa fa-arrow-left"></i> Kembali</small></a>
@endsection
@section('content')
<div class="card shadow mb-4">

    <!-- Card Body -->
   <div class="card-body ">
    <form action="{{route('admin.competitionType.update',$models->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="label">Nama</label>
                        <input disabled type="text" class="form-control" autocomplete="off" name="name" required value="{{$models->name}}">
                    </div>
                </div>
                <div class="col-md-6">
                    
                    <div class="form-group">
                        <label for="" class="label">Kode</label>
                        <input disabled type="text" class="form-control" autocomplete="off" name="code" required value="{{$models->code}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
            <label for="" class="label">Deskripsi</label>

              <textarea id="editor" class="form-control" name="description" rows="20" cols="50">{!!$models->description!!}</textarea>
            </div>

            <div class="form-group">
                <label for="" class="label">Gambar</label>
                <input type="file" name="image" class="form-control-file" accept="image/*"  id="image-source" >
                @if($models->image != null)

                    <img src="{{$models->getImage()}}" class="mt-2" alt="" style="width: 200px;"> 
                    
                @endif
            </div>
            <br>
            <div class="form-group">
              <hr>
              <h4 class="text-gray-800">Hasil Technical Meeting</h4>
              <div class="form-group">
                  <label for="" class="label">Video Embed Hasil TM (Upload Youtube)</label>
                  <textarea class="form-control" name="tm_video" rows="4">{{$models->tm_video}}</textarea>
              </div>
              <div class="form-group">
                  <label for="" class="label">Link Dokumen Hasil TM (Upload Google Drive)</label>
                  <input  type="text" class="form-control" autocomplete="off" name="tm_file"  value="{{$models->tm_file}}">
              </div>
              <br>
            </div>
            
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-danger">Reset</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
   </div>
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
<script>hljs.initHighlightingOnLoad();</script>
@endsection

