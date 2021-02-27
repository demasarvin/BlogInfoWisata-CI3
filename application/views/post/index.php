<div class="container">
    <?php if($this->session->flashdata('pesan')): ?>
        <div class="row">
            <div class="container alert-<?= $this->session->flashdata('tipe')?> alert">Post Berhasil<?= $this->session->flashdata('pesan')?></div>
        </div>
    <?php endif?>
    <?php unset($_SESSION['pesan']) ?>
    
    <div class="container">
        <h1 align="center">Artikel Terbaru</h1>
            <?php if(logged_in()): ?>
                <a href="<?= base_url() ?>post/tambah" class="btn btn-outline-primary align-self-center">Tambah Post</a>
            <?php endif; ?>
    </div>

    <hr>
    <div class="row mt-3">
        <?php foreach ($posts as $post) : ?>
            <div class="col-md-6 mb-3">
                <h3 class="mb-2 text-truncate"><?= $post['judul']; ?></h3>
                <p class="text-justify" style="-webkit-line-clamp:3; overflow:hidden; text-overflow:ellipsis; display: -webkit-box; -webkit-box-orient:vertical;"><?= $post['isi']; ?></p>
                <a role="button" href="<?= base_url(); ?>post/artikel/<?= $post['id_post']; ?>" class="btn btn-outline-primary">Lihat &raquo;</a>
                    <?php if(logged_in()): ?>
                        <a role="button" href="<?= base_url(); ?>post/update/<?= $post['id_post']; ?> " class="btn btn-outline-success">Update</a>
                        <a role="button" href="<?= base_url(); ?>post/hapus/<?= $post['id_post']; ?> " class="btn btn-outline-danger" onclick="return confirm('Yakin ingin menghapus Post?')">Hapus</a>
                    <?php endif; ?>
                <hr>
            </div>
        <?php endforeach; ?>
    </div>
    <div>
        <?= $this->pagination->create_links(); ?>
    </div>
</div>