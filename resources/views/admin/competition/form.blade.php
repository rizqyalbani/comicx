@extends('layouts.admin')
@section('title')
Edit Lomba
@endsection
@section('back_button')
<a href="{{route('admin.competition.index')}}" class="mb-2 d-block"><small><i class="fa fa-arrow-left"></i> Kembali</small></a>
@endsection
@section('content')
<div class="card shadow mb-4">
	<!-- Card Bodys -->
	<div class="card-body ">
		<form action="{{route('admin.competition.update',$data['models']->id)}}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="label">Nama</label>
							{{-- <input type="text" class="form-control" autocomplete="off" name="name" required value="{{$data['models']->competitionType->name}}"> --}}
							<select class="form-control" id="exampleFormControlSelect1" name="name">
								@forelse ($type as $item)
								<option value="{{$item->id}}" {{$data['models']->competition_type_id === $item->id ? "selected" : ""}} >{{$item->name}}</option>
								@empty
									
								@endforelse
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="label">Jenjang</label>
							<select class="form-control" id="exampleFormControlSelect1" name="level">
								@forelse ($level as $item)
								<option value="{{$item->id}}" {{$data['models']->competition_level_id === $item->id ? "selected" : ""}} >{{$item->id}}</option>
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
								<option value="1" {{$data['models']->isTeam() === "Ya" ? "selected" : ""}} >Ya</option>
								<option value="0" {{$data['models']->isTeam() === "Tidak" ? "selected" : ""}} >Tidak</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="" class="label">Lokasi Lomba</label>
							<select class="form-control" id="exampleFormControlSelect1" name="online">
								<option value="1" {{$data['models']->isOnline() === "Online" ? "selected" : ""}} >Online</option>
								<option value="0" {{$data['models']->isOnline() === "Offline" ? "selected" : ""}} >Offline</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="" class="label">Minimal Member</label>
							<input type="number" class="form-control" autocomplete="off" name="min_member" required value="{{$data['models']->min_member}}">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="" class="label">Member</label>
							<input type="number" class="form-control" autocomplete="off" name="member" required value="{{$data['models']->member}}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="" class="label">Kelas</label>
							<input type="text" class="form-control" autocomplete="off" name="class" required value="{{$data['models']->class}}">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="" class="label">Harga</label>
							<input type="number" class="form-control" autocomplete="off" name="price" required value="{{$data['models']->price}}">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="" class="label">Gender</label>
							<select class="form-control" id="exampleFormControlSelect1" name="gender">
								@forelse ($gender as $item)
								<option value="{{$item->id}}" {{$data['models']->competition_gender_id === $item->id ? "selected" : ""}} >{{$item->name}}</option>
								@empty
									
								@endforelse
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="" class="label">Kuota</label>
							<input type="number" class="form-control" autocomplete="off" name="quota" required value="{{$data['models']->quota}}">
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
<script>hljs.initHighlightingOnLoad();</script>
@endsection