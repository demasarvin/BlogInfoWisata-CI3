<style>
.jumbotron{
  background-image: url('<?php echo base_url()?>image/background.jpg');
  background-repeat: no-repeat;
  background-size: cover;
  height: 100vh;
  flex: 1 0 auto;
}
footer{
    flex-shrink: none;
}
</style>

<body>
        <header class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="row my-auto mt-5 pt-5">
                    <div class="col-lg-10 align-self-end mt-5 pt-5">
                        <h1>Selamat Datang di Plesire Jateng</h1>
                        <hr class="divider my-4" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p>Informasi seputar destinasi terbaik yang ada di Jawa Tengah.</p>
                        <a class="btn btn-primary" href="<?= base_url() ?>post">Lihat Artikel</a>
                    </div>
                </div>
            </div>
        </header>
  </body>

