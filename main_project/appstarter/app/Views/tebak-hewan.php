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
    <link rel="stylesheet" href="./css/tebak-hewan.css">
</head>

<body>
    <div class="content__wrapper">
        <!-- Header -->
        <div class="header">
            <div class="sound__wrapper">
                <button>Sound On</button>
            </div>
        </div>
        <!-- content -->
        <div class="content">
            <h1 class="text-center">Hewan apakah ini?</h1>
            <div class="image__container ">
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
                </div>
            </div>

            <div class="answer__wrapper">
                <h2 class="text-center">Pilihan Jawaban</h2>
                <div class="answer">
                    <button id="ans1">Beruang</button>
                    <button id="ans2">Gajah</button>
                    <button id="ans3">Kuda</button>
                    <button id="ans4">Rusa</button>
                    <button id="ans5">Singa</button>
                </div>
            </div>

            <div class="hint__wrapper">
                <button class="btn--reload">Coba Lagi</button>
                <button class="btn--hint">Petunjuk Selanjutnya</button>
            </div>
        </div>

        <div class="modal-check__wrapper">
            <div class="modal-check">
                <div class="msg-panel">
                    <h1 class="check-msg text-center"></h1>
                    <div class="btn__wrapper">
                        <button class="btn--reload">Coba lagi</button>
                        <button class="btn--pelajari">Pelajari lebih lanjut</button>
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
</body>

</html>

<script>
    function fetchData() {
        let linkContainer = ''
        $.ajax({
            url: `<?= site_url('TebakHewan/getData') ?>`,
            dataType: 'json',
            success: function(data, status, xhr) {
                // to get random image
                function getRandomImage(animalId) {
                    let getImage = data[animalId].image_array.split(',')
                    let randomImageIdx = Math.round(Math.random() * (getImage.length - 1))
                    let imagePath = `image/tebak-hewan/${animalId+1}/${getImage[randomImageIdx]}`

                    // assign answer
                    $(`#ans${animalId+1}`).addClass('correct')

                    return imagePath
                }

                let randomAnimalNumber = Math.floor(Math.random() * data.length) + 1

                let imgContainer = ` <img src="${getRandomImage(randomAnimalNumber - 1)}" alt="" class="image">`

                $('.image__wrapper').append(imgContainer)

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

                    // remove box
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

                let btnAnswer = document.querySelector('.answer').children
                console.log(btnAnswer)

                for (let i = 0; i < btnAnswer.length; i++) {
                    btnAnswer[i].addEventListener('click', () => {
                        document.querySelector('.modal-check').style.transform = 'translate(-50%, -50%)'
                        document.querySelector('.modal-check').style.transition = 'all 1s'

                        if ($(`#ans${i+1}`).attr('class') == 'correct') {
                            $('.check-msg').html('Horee kamu benar')
                        } else {
                            $('.check-msg').html('Yah kamu kurang beruntung, Yuk coba lagi')
                        }
                    })
                }

                function btnReload() {
                    $('.btn--reload').on('click', function() {
                        location.reload()
                    })
                }

                btnReload()
            }
        })
    }

    fetchData()
</script>