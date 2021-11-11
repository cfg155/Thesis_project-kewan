<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Binatang</title>
    <link rel="stylesheet" href="/css/mewarnai-hewan.css">
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

        <!-- content -->
        <div class="content">
            <h1 class="text-center my-5">Pilih Gambar</h1>
            <div class="list-binatang d-flex justify-content-center row">
                <?php for ($i = 0; $i < count($data); $i++) { ?>
                    <div class="card item col-md-3 my-3" style="width: 18rem;">
                        <a href="/mewarnai-hewan-detail/<?php echo $data[$i]['list_binatang_id'] ?>">
                            <img src="<?php echo $data[$i]['foto_referensi'] ?>" class="card-img-top image-hewan" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php echo $data[$i]['nama_binatang'] ?></h5>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- Footer -->
        <?= $this->include('component/footer'); ?>
    </div>
</body>

</html>

<script>
    linkItem +=
        `
                        <div class="card item col-md-3 my-3" style="width: 18rem;">
                            <a href="/mewarnai-hewan-detail/${data.list_binatang[i].list_binatang_id}">
                                <img src="${data.svg_hewan[i].foto_referensi}" class="card-img-top image-hewan" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center">${data.list_binatang[i].nama_binatang}</h5>
                                </div>
                            </a>
                        </div>
                        `
</script>