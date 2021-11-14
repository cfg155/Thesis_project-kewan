<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="<?= base_url('css/masuk-akun.css') ?>">
</head>

<body>

    <div class="content__wrapper">
        <!-- Header -->
        <?= $this->include('component/header'); ?>

        <!-- content -->
        <div class="content">
            <div class="login-form__wrapper">
                <h2>Masuk akun</h1>
                    <form action="<?= base_url() ?>/Pengguna/login" method="POST">
                        <table class="table">
                            <tr>
                                <td><input type="text" name="login-email" placeholder="masukan Email" class="form-control"></td>
                                <td><input type="text" name="login-password" placeholder="masukan Password" class="form-control"></td>
                                <td><input type="submit" name="login-submit" class="btn" style="background-color: #fff;"></td>
                            </tr>
                        </table>
                    </form>
            </div>
            <hr>
            <div class="register-form__wrapper">
                <div class="form__wrapper">
                    <h2>Belum punya akun? daftar sekarang</h2>
                    <form action="<?= base_url() ?>/Pengguna/insertNewAcc" method="POST">
                        <table class="table">
                            <tr>
                                <td>Masukan Nama</td>
                                <td><input type="text" class="form-control" name="r-nama"></td>
                            </tr>

                            <tr>
                                <td>Masukan Email</td>
                                <td><input type="text" class="form-control" name="r-email"></td>
                            </tr>

                            <tr>
                                <td>Masukan Tanggal Lahir</td>
                                <td><input class="form-control" type="date" name="r-bod"></td>
                            </tr>
                            <tr>
                                <td>Pilih Sekolah</td>
                                <td>
                                    <select name="r-sekolah" id="">
                                        <option value="0">Lainnya</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>Kelas berapakah kamu</td>
                                <td><input type="text" class="form-control" name="r-kelas"></td>
                            </tr>

                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>
                                    <input type="radio" name="r-gender" value="Laki-laki">Laki - Laki
                                    <input type="radio" name="r-gender" value="Perempuan">Perempuan
                                </td>
                            </tr>

                            <tr>
                                <td>Masukan Password</td>
                                <td><input type="text" class="form-control" name="r-password"></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td><input type="submit" name="submit" class="register"></td>
                            </tr>
                        </table>
                    </form>


                </div>
            </div>
        </div>
        <!-- Footer -->
        <?= $this->include('component/footer'); ?>
    </div>

</body>

</html>