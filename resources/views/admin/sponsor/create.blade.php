<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('admin.sponsor.index')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
              <div class="form-group">
                  <label for="" class="label">Name</label>
                  <input type="text" class="form-control" autocomplete="off" name="name" required>
                  <input type="hidden" name="status" value="1">
              </div>
            <div class="form-group">
                <label for="" class="label">Tipe</label>
                <select name="type" id="" class="form-control">
                    <option value="1">Sponsor</option>
                    <option value="2">Media Partner</option>
                </select>
            </div>
            <div class="form-group">
                <label for="" class="label">Sponsor Utama</label>
                <select name="main" id="" class="form-control">
                    <option value="0">Tidak</option>
                    <option value="1">Ya</option>
                </select>
            </div>
            <div class="form-group">
              <input type="file" name="image" class="form-control-file" accept="image/*" required  id="image-source" >
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
