<div class="container">
<div class="row my-4">
  <div class="col">
    <div class="card">
      <h5 class="card-header">Tambah Post</h5>
      <div class="card-body">
        <form action="<?= base_url() ?>post/Tambah" method="POST">
          <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" name="judul" id="judul"  placeholder="Masukan Judul" required>
          </div>
          <div class="form-group">
            <label for="isi">Isi</label>
            <textarea class="form-control" name="isi" id="isi"  placeholder="Masukan Isi" rows="10" required></textarea>
            </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="<?= base_url() ?>post" class="btn btn-secondary">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>

</div>