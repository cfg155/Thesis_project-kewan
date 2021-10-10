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
</head>
<style>
    .content__wrapper {
        height: 100vh;
        width: 100%;
        margin: auto;
        background-image: url('../image/bg.jpg');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
    }

    .drawing {
        width: 35%;
        display: grid;
        align-items: center;
        z-index: 99;
        background-color: #fff;
    }

    #Layer_1 {
        width: 100%;
    }

    .body-part {
        cursor: pointer;
    }

    .color-circle__wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-column-gap: 10px;
        grid-row-gap: 10px;
        width: 100px;
    }

    .color-circle {
        width: 50px;
        height: 50px;
        border: 1px solid #000;
        cursor: pointer;
        border-radius: 100%;
    }

    .clear {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .ref-img {}

    .ref-img__wrapper {
        width: 100px;
        height: 100px;
        display: grid;
        align-items: center;
    }

    .ref-img__wrapper object {
        width: 100%;
    }

    .color-pallete {
        position: absolute;
        right: 40px;
    }

    #color-input {
        width: 50px;
        height: 50px;
        cursor: pointer;
    }

    .content {
        width: 100%;
        background-color: #fff;
        padding: 50px 0;
    }
</style>

<body>
    <div class="content__wrapper" style="position: relative;">
        <h1 class="text-center" style="height: 100px;display: grid;align-items: center;"><?= $dataHewan['nama_binatang'] ?></h1>
        <div class="content d-flex justify-content-center">
            <div class="drawing">
                <?= $dataHewan['svg_code'] ?>
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
        <ul style="color: red;" style="position: absolute;bottom: 0;left: 0;">
            <li>Note, things to add</li>
            <li>generating correct color for the image</li>
        </ul>
    </div>

</body>

</html>

<script>
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

    function coloring() {
        let limitFillComponent = <?= $dataHewan['component_limit']; ?>

        for (let i = 0; i < limitFillComponent; i++) {
            fillComponent[i] = document.getElementById(`d${i+1}`)
        }

        function setColor(e) {
            this.style.fill = currentColor

            // let colorInput = document.getElementById('color-input')
            // console.log(colorInput.value)
        }

        fillComponent.forEach(component => {
            component.addEventListener('click', setColor)
        })
    }

    coloring()
</script>