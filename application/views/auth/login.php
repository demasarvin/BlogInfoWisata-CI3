<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(); ?>">Plesire Jateng</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
 
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url(); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url(); ?>post">Artikel</a>
                    </li>
 
                </ul>
                <form action="" method="POST" class="form-inline my-2 mx-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" 
                    placeholder="Cari Judul" name="keyword" autocomplete="off">
                    <button class="btn btn-outline-dark my-2 my-sm-0" 
                    type="submit" name="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <main class="bg-light vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mt-5">
                    <div class="card-body">
                        <form method="POST" action="">
                            <h1 align="center">Form Login</h1>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="example@mail.com" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="pl-3 text-danger">', '</small>'); ?>
                                <?= $this->session->flashdata('message'); ?>
                                <?php unset($_SESSION['message']) ?>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                                <?= form_error('password', '<small class="pl-3 text-danger">', '</small>'); ?>
                                <?= $this->session->flashdata('message1'); ?>
                                <?php unset($_SESSION['message1']) ?>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                        </form>
                        <small>Belum punya akun? <a href="<?= base_url('auth/'); ?>register" class="font-weight-bold">Daftar</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


