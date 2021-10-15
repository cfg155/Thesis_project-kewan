<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .image__container {
        display: flex;
    }

    .image__wrapper {
        width: 400px;
        height: 400px;
        position: relative;
    }

    .image__wrapper img {
        width: 100%;
        height: 100%;
    }

    .box__wrapper {
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .box__wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
    }

    .question__wrapper {
        padding: 20px 0;
    }

    .box {
        cursor: pointer;
    }

    .hint__wrapper {
        margin-top: auto;
        margin-left: 20px;
    }
</style>

<body>
    <div class="container">
        <h1>Hewan apakah ini?</h1>
        <div class="image__container">
            <div class="image__wrapper">
                <div class="box__wrapper">
                    <div class="box" style="background-color: black;"></div>
                    <div class="box" style="background-color: black;"></div>
                    <div class="box" style="background-color: black;"></div>
                    <div class="box" style="background-color: black;"></div>
                    <div class="box" style="background-color: black;"></div>
                    <div class="box" style="background-color: black;"></div>
                    <div class="box" style="background-color: black;"></div>
                    <div class="box" style="background-color: black;"></div>
                    <div class="box" style="background-color: black;"></div>
                </div>
                <img src="image/tebak-hewan/lion-image.jpg" alt="" class="image">
            </div>
            <div class="hint__wrapper">
                <button class="btn--hint">Petunjuk Selanjutnya</button>
            </div>
        </div>

        <div class="petunjuk__wrapper">
            <span class="petunjuk">Kalimat Petunjuk 1</span><br>
            <span style="color: red;">text ini akan dibuat suara</span>
        </div>

        <div class="answer__wrapper">
            <button>Singa</button>
            <button>Ikan</button>
            <button>Monyet</button>
            <button>Harimau</button>
            <span style="color: red;">text ini akan dibuat suara</span>
        </div>
    </div>
</body>

</html>

<script>
    let imageWrapper = document.querySelector('.image__wrapper')
    let image = document.querySelector('.image')
    let boxWrapper = document.querySelector('.box__wrapper')
    let box = document.querySelectorAll('.box')

    let boxSize = imageWrapper.clientWidth / 3

    box.forEach(box => {
        box.style.width = `${boxSize}px`
        box.style.height = `${boxSize}px`
    })

    // revealed array box
    let revealedBox = []

    function checkNumber(number) {
        if (revealedBox.includes(number)) return true

        revealedBox.push(number)

        // sort array
        revealedBox.sort(function(a, b) {
            return a - b
        })
        // console.log(revealedBox)

        // remove box
        console.log(number)
        box[number].style.backgroundColor = 'transparent'
        return false
    }

    function generateRandomNumber() {
        let tmpNum

        if (revealedBox.length == 9) return;

        do {
            tmpNum = Math.floor(Math.random() * 9)
        } while (checkNumber(tmpNum))
    }

    function generateTimes(times) {
        for (let i = 0; i < times; i++) {
            generateRandomNumber()
        }
    }

    let btnHint = document.querySelector('.btn--hint')
    let petunjukCount = 1
    document.querySelector('.hint__wrapper').addEventListener('click', () => {
        generateTimes(2)
        document.querySelector('.petunjuk').innerHTML = `Kalimat Petunjuk ${++petunjukCount}`
    })

    generateTimes(2)
</script>