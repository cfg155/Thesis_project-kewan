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
                        <button>Suara Hewan</button>
                        <button>Suara Paragraf</button>
                    </div>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque dolorem saepe earum debitis odit beatae ea architecto, corrupti laboriosam quisquam iure excepturi, veritatis exercitationem consequuntur tempore cupiditate laudantium reiciendis vitae expedita molestiae nemo non voluptatibus? Est deleniti pariatur quis ipsa eveniet aspernatur, nisi asperiores suscipit quae. Nobis excepturi eos, blanditiis atque non iusto dolores velit maxime reiciendis adipisci nulla repudiandae nesciunt et earum quos accusamus? Possimus sequi amet, sunt excepturi laborum suscipit totam vero, dolorum doloremque inventore, in facilis harum. Veritatis cum soluta sed temporibus excepturi, delectus omnis est? Quo molestiae autem praesentium minus accusantium error, ea ullam necessitatibus at!</p>
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
</script>