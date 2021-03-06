<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/koleksi.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<style>
    .btn {
        font-size: 24px;
    }
</style>

<body>
    <div class="content__wrapper">
        <!-- Header -->
        <div class="header">
            <div class="sound__wrapper">
                <button>Sound On</button>
            </div>
        </div>
        <!-- content here -->
        <div class="content row">
            <div class="left-content col-md-6">
                <div class="scene "></div>
                <div class="animal-photo row">
                    <div class="box col-md-3"></div>
                    <div class="box col-md-3"></div>
                    <div class="box col-md-3"></div>
                    <div class="box col-md-3"></div>
                </div>
            </div>
            <div class="right-content col-md-6">
                <div class="youtube__wrapper">
                    <iframe width="560" height="315" src="<?= $dataHewan['youtube_link'] ?>autoplay=1&&controls=0&&mute=1&&loop=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="animal-description">
                    <div class="animal-description--header">
                        <h1><?= $dataHewan['nama_binatang'] ?></h1>
                        <button class="btn btn-light">Suara Hewan</button>
                        <button class="btn btn-primary">Suara Paragraf</button>
                    </div>
                    <table class="table" style="font-size: 24px;">
                        <tr>
                            <th>Makanan</th>
                            <td><?= $dataHewan['makanan'] ?></td>
                        </tr>
                        <tr>
                            <th>Tempat Tinggal</th>
                            <td><?= $dataHewan['tempat_tinggal'] ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Hewan</th>
                            <td><?= $dataHewan['jenis_hewan'] ?></td>
                        </tr>
                        <tr>
                            <th>Berkembang Biak dengan</th>
                            <td><?= $dataHewan['berkembang_biak'] ?></td>
                        </tr>
                    </table>
                    <div class="fun-fact">
                        <h2><strong>Fakta tentang <?= $dataHewan['nama_binatang'] ?>!</strong></h2>
                        <p class="fact-desc" style="font-size: 24px;"></p>
                        <button class="btn btn-light btn-next">Selanjutnya</button>
                    </div>
                </div>
            </div>

        </div>

        <!-- Footer -->
        <div class="footer position-relative">
            <div class="logo-kewan__wrapper">
                <img src="/image/kewan-logo.png" alt="" class="logo-kewan">
            </div>
        </div>
    </div>

    <script src="<?= $dataHewan['script_src'] ?>" type="module"></script>
</body>

</html>

<script>
    let binatangId = <?= $dataHewan['binatang_id'] ?>

    let animal = '<?= $dataHewan['gambar_array'] ?>'

    let getAnimalArray = animal.split(',')

    console.log(binatangId)

    let box = document.querySelectorAll('.box')
    box.forEach((box, idx) => {
        box.style.backgroundImage = `url(../image/koleksi/${binatangId}/${getAnimalArray[idx]})`
    })

    // get data with AJAX
    $.get("<?= base_url('/Koleksi/getFunFact') ?>", function(data, status) {
        let parsedJSON = JSON.parse(data)
        console.log(parsedJSON)

        let getFunFact = []
        console.log(parsedJSON[0].fun_fact)

        for (let i = 0; i < parsedJSON.length; i++) {
            if (parsedJSON[i].binatang_id == binatangId) {
                getFunFact.push(parsedJSON[i].fun_fact)
            }
        }

        let counter = 0
        $('.fact-desc').html(getFunFact[counter])

        $('.btn-next').click(function() {
            counter += 1
            if (counter == getFunFact.length - 1) counter == 0

            $('.fact-desc').html(getFunFact[counter])
        })
    });
</script>