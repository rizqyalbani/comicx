<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('admin.user.index')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
              <div class="form-group">
                  <label for="" class="label">Nama</label>
              <input type="text" class="form-control" value="{{old('name')}}" autocomplete="off" name="name" required>
                  <input type="hidden" name="status" value="1">
              </div>
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="label">Telepon</label>
                        <input type="tel" class="form-control" value="{{old('phone')}}" autocomplete="off" name="phone" required >
                    </div>
                </div>
                <div class="col-md-6">
                    
                    <div class="form-group">
                        <label for="" class="label">Email</label>
                        <input type="email" class="form-control" value="{{old('email')}}" autocomplete="off" name="email" required >
                    </div>
                    
                </div>
            </div>
            <div class="form-group">
              <label for="" class="label">Tipe Akun</label>
              <select name="isAdmin" id="" class="form-control">
                  <option value="0">User</option>
                  <option value="1">Admin</option>
              </select>
          </div>
            <div class="form-group">
                <label for="" class="label">Password </label>
                <input type="password" required class="form-control" autocomplete="off" name="password" >
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
