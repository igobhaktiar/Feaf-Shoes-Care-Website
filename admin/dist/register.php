<?php
include "koneksi.php"
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form action="register_process.php" method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="nama">Nama</label>
                                                <input class="form-control py-4" name="nama" type="text" placeholder="Masukkan nama anda" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="username">Username</label>
                                                <input class="form-control py-4" name="username" type="text" aria-describedby="emailHelp" placeholder="Masukkan username" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="password">Password</label>
                                                <input class="form-control py-4" name="password" type="password" placeholder="Masukkam password" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="alamat">Alamat</label>
                                                <input class="form-control py-4" name="alamat" type="text" aria-describedby="emailHelp" placeholder="Masukkan Alamat" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="jek">Jenis Kelamin</label>
                                            </div>
                                            <select class="form-control" name="kelamin" name="kelamin" required>
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                            </select>
                                            <div class="form-group">
                                                <label class="small mb-1" for="alamat">Level</label>
                                            </div>
                                            <select class="form-control" name="level" name="level" required>
                                                    <option value="admin">Admin</option>
                                                    <option value="karyawan">Karyawan</option>
                                                    <option value="pemilik">Pemilik</option>
                                            </select>
                                            <div class="form-group mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
