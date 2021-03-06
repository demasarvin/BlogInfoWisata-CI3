<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
 
    <title>Plesire</title>
    <style>
        body {
            height:100%;
            flex: 1 0 auto;
        }
        footer{
            flex-shrink: none;
        }
    </style>

</head>
 
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
                    <form action="<?= base_url(); ?>post" method="POST" class="form-inline my-2 my-lg-0">
                        <input type="hidden" value="" name="keyword">
                        <button class="nav-link btn" type="submit" name="submit">Artikel
                        </button>
                    </form>
                </ul>
                <form action="" method="POST" class="form-inline my-2 mx-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" 
                    placeholder="Cari Judul" name="keyword" autocomplete="off">
                    <button class="btn btn-outline-dark my-2 my-sm-0" 
                    type="submit" name="submit">Search</button>
                </form>
                <?php if(logged_in()) : ?>
                <a href="<?= base_url('auth/'); ?>logout" class="btn btn-danger">Logout</a>
                <?php else : ?>
                <a href="<?= base_url('auth'); ?>" class="btn btn-outline-success">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>