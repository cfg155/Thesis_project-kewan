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
    <link rel="stylesheet" href="/css/mewarnai-hewan-detail.css">
</head>

<body>
    <div class="super__container">
        <div class="modal-validation">
            <div class="modal-validation__wrapper">
                <div class="arrow-back__wrapper">
                    <button class="btn-arrow-back">Kembali</button>
                </div>
                <div class="storedImage__wrapper">
                    <?= $dataHewan['svg_code'] ?>
                </div>
                <div class="ref-image__wrapper">
                    <img src="<?= $dataHewan['gambar_validasi'] ?>" alt="">
                </div>
                <a href="" class="btn btn-completed"><b>Yuk Pelajari Lebih Lanjut!</b></a>
            </div>
        </div>

        <div class="content__wrapper" style="position: relative;">
            <!-- Header -->
            <?= $this->include('component/header'); ?>

            <div class="content">
                <div class="drawing">
                    <?= $dataHewan['svg_code'] ?>
                    <div class="btn-validasi__wrapper">
                        <button class="btn btn-validasi">Selesai</button>
                    </div>
                </div>
                <div class="color-pallete">
                    <div class="color-circle__wrapper">
                        <div class="color-circle clear" data-color="white">Hapus</div>
                        <input type="color" id="color-input" class="color-input">
                        <div class="color-circle" data-color="#FF0000"></div>
                        <div class="color-circle" data-color="#008000"></div>
                        <div class="color-circle" data-color="#FFFFFF"></div>
                        <div class="color-circle" data-color="#FFFF00"></div>
                        <div class="color-circle" data-color="#800080"></div>
                    </div>
                </div>
            </div>
            <div class="footer position-relative">
                <div class="logo-kewan__wrapper">
                    <img src="/image/kewan-logo.png" alt="" class="logo-kewan">
                </div>
            </div>
        </div>
    </div>


</body>

</html>

<script>
    let getBinatangId = <?= $dataHewan['binatang_id'] ?>

    document.querySelector('.btn-completed').href = `<?= base_url('koleksi-detil/') ?>/${getBinatangId}`

    function appendColor(color) {
        let divColor = ''
        color.forEach(color => {
            divColor += `<div class="color-circle" data-color="${color}"></div>`
        })
        document.querySelector('.color-circle__wrapper').innerHTML += divColor
    }

    appendColor(<?= $dataHewan['warna_array'] ?>)

    let colorCircle = document.querySelectorAll('.color-circle')
    let fillComponent = []
    let currentColor = '#fff'

    let colorInput = document.getElementById('color-input')

    colorInput.addEventListener('input', () => {
        currentColor = colorInput.value
    })

    function getColor() {
        function storeColor(e) {
            currentColor = this.getAttribute('data-color')
        }

        colorCircle.forEach((circle, idx) => {
            let getColor = circle.getAttribute('data-color')
            circle.style.backgroundColor = getColor

            circle.addEventListener('click', storeColor)
        })
    }

    getColor()

    let storeComponentColor = {}
    let limitFillComponent = <?= $dataHewan['component_limit']; ?>

    function coloring() {
        for (let i = 1; i < limitFillComponent + 1; i++) {
            fillComponent[i] = document.querySelector(`.drawing #d${i}`)
        }

        function setColor(e) {
            this.style.fill = currentColor

            storeComponentColor[this.id.slice(1, 5)] = currentColor
        }

        fillComponent.forEach(component => {
            component.addEventListener('click', setColor)
        })
    }

    coloring()

    function doneColoring() {
        let modalValidation = document.querySelector('.modal-validation')

        // create click function
        document.querySelector('.btn-validasi').addEventListener('click', () => {
            modalValidation.style.display = 'block'

            let fillComponent2 = []

            for (let i = 1; i < limitFillComponent + 1; i++) {
                fillComponent2[i] = document.querySelector(`.storedImage__wrapper #d${i}`)

                if (storeComponentColor[i] != null || storeComponentColor[i] != undefined) {
                    fillComponent2[i].style.fill = storeComponentColor[i]
                }
            }

        })

        // create arrow back function
        function arrowBack() {
            document.querySelector('.btn-arrow-back').addEventListener('click', () => {
                modalValidation.style.display = 'none'
            })
        }

        arrowBack()
    }

    doneColoring();
</script>