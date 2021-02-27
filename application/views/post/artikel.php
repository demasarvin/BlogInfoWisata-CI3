<div class="container">
    <?php foreach($post as $post): ?>
      <h3 class="my-3" align="center"><?= $post['judul'] ?> </h3>
      <hr>
          <p class="text-justify"><?= $post['isi'] ?></p>
          <a href="<?= base_url() ?>post" class="btn btn-secondary">Kembali</a>
      <hr>
    <?php endforeach; ?>
</div>

