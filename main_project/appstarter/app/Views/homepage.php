<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/homepage.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="content__wrapper">
        <!-- Header -->
        <?= $this->include('component/header'); ?>

        <div class="content">
            <div class="logo">
                <img src="./image/kewan-logo.png" alt="">
            </div>
            <div class="navigation row">
                <div class="mewarnai-hewan col-md-4 d-flex justify-content-center">
                    <a href="/mewarnai-hewan" class="feature">
                        <img src="./image/Group 13.png" alt="">
                        <h1><b>Mewarnai Hewan</b></h1>
                    </a>
                </div>
                <div class="tebak-hewan col-md-4 d-flex justify-content-center">
                    <a href="/tebak-hewan" class="feature">
                        <img src="./image/Group 15.png" alt="">
                        <h1><b>Tebak Hewan</b></h1>
                    </a>
                </div>
                <div class="koleksi-hewan col-md-4 d-flex justify-content-center">
                    <a href="/koleksi" class="feature">
                        <img src="./image/Group 16.png" alt="">
                        <h1><b>Koleksi</b></h1>
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<script>
    document.querySelector('.back__wrapper').style.opacity = 0
</script>