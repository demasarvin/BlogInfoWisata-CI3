<div class="container">
<div class="row my-4">
  <div class="col">
    <?php foreach($post as $post): ?>
    <div class="card">
      <h5 class="card-header">Update Post</h5>
      <div class="card-body">
        <form action="<?= base_url() ?>post/Update/<?= $post['id_post'] ?>" method="POST">
          <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" name="judul" id="judul"  placeholder="Masukan Judul" value="<?= $post['judul'] ?>" required>
          </div>
          <div class="form-group">
            <label for="isi">Isi</label>
            <textarea class="form-control" name="isi" id="isi"  placeholder="Masukan Isi" rows="10" required><?= $post['isi'] ?></textarea>
            </div>
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="<?= base_url() ?>post" class="btn btn-secondary">Batal</a>
        </form>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>

</div>