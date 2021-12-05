@extends('layouts.admin')
@section('title')
Edit Profile
@endsection
@section('content')
<ul class="nav nav-pills mt-2 mb-4" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="home" aria-selected="true">Umum</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="security-tab" data-toggle="tab" href="#security" role="tab" aria-controls="profile" aria-selected="false">Password</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane row fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
    <div class="col-lg-6">
       <div class="card">
          <div class="card-body">
            <form action="{{route('account.store')}}" method="POST">
               @csrf
               @method('POST')
                <div class="form-group">
                   <label class="text-muted">Nama Lengkap</label>
                   <input class="form-control" type="text" name="name" value="{{$models->name}}"  required>
                </div>
                <div class="form-group">
                   <label class="text-muted">Alamat Email</label>
                   <input class="form-control" disabled type="text" name="email" value="{{$models->email}}"  required>
                </div>
                <div class="form-group">
                   <label class="text-muted">No Telepon</label>
                   <input class="form-control number-format" type="text" name="phone" value="{{$models->phone}}" required>
                </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-success">Simpan</button>
                </div>
             </form>
          </div>
       </div>
    </div>
  </div>
  <div class="tab-pane fade row" id="security" role="tabpanel" aria-labelledby="security-tab">
    <div class="col-lg-6">
       <div class="card">
          <div class="card-body">
              <form action="{{route('account.store')}}?type=password" method="POST">
                @csrf
                <div class="form-group">
                  <label class="text-muted" for="current-password">Password Lama</label>
                  <input type="password" class="form-control" id="current-password" aria-describedby="emailHelp" name="password_old" required >
                </div>
                <div class="form-group">
                  <label class="text-muted" for="new-password">Password Baru</label>
                  <input type="password" class="form-control" id="new-password" name="password_new" required >
                </div>
                <div class="form-group">
                  <label class="text-muted" for="new-password-confirm">Konfirmasi Password Baru</label>
                  <input type="password" class="form-control" id="new-password-confirm" name="password_new_confirm" required >
                </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-success">Simpan</button>
                </div>
             </form>
          </div>
       </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
   $('.number-format').keyup(function () {
           this.value = this.value.replace(/[^0-9\.]/g,'');
           });
</script>
@endsection
