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
            <h1 class="text-center my-5">Mewarnai Hewan</h1>
            <div class="list-binatang d-flex justify-content-center row"></div>
        </div>
        <!-- Footer -->
        <?= $this->include('component/footer'); ?>
    </div>
</body>

</html>

<script>
    $('document').ready(function() {
        let linkContainer = ''
        $.ajax({
            url: `<?= site_url('MewarnaiHewan/getData') ?>`,
            dataType: 'json',
            success: function(data, status, xhr) {
                for (let i = 0; i < data.length; i++) {
                    let linkItem =
                        `
                    <div class="card" class="item col-md-3" style="width: 18rem;">
                        <a href="/mewarnai-hewan-detail/${data[i].binatang_id}">
                            <img src="${data[i].gambar_validasi}" class="card-img-top image-hewan" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center">${data[i].nama_binatang}</h5>
                            </div>
                        </a>
                    </div>
                    `

                    linkContainer += linkItem

                }
                console.log(linkContainer)
                $('.list-binatang').append(linkContainer)

            }
        })

    })
</script>