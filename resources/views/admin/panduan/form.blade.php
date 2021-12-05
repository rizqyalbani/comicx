@extends('layouts.admin')
@section('title')
@if($models->exists) Edit @else Tambah @endif Panduan
@endsection
@section('back_button')
<a href="{{route('admin.panduan.index')}}" class="mb-2 d-block"><small><i class="fa fa-arrow-left"></i> Kembali</small></a>
@endsection
@section('content')
<div class="card shadow mb-4">

    <!-- Card Body -->
   <div class="card-body ">
    <form action="@if($models->exists)  {{route('admin.panduan.update',$models->id)}} @else  {{route('admin.panduan.store')}} @endif" method="POST" enctype="multipart/form-data">
        @csrf
        
        @if($models->exists) @method('PUT') @else @method('POST') @endif
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="label">Judul</label>
                        <input type="text" class="form-control" autocomplete="off" name="name" required value="{{$models->name}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="label">Deskripsi</label>
                        <textarea id="editor" class="form-control" name="description" rows="20" cols="50">{!!$models->description!!}</textarea>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="label">Video Desktop</label>
                        <textarea required name="video_desktop" class="form-control" rows="4">{{old('video_desktop', $models->video_desktop)}}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="label">Video Mobile</label>
                        <textarea required name="video_mobile" class="form-control" rows="4">{{old('video_mobile', $models->video_mobile)}}</textarea>
                    </div>
                </div>
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

