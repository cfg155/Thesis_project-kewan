<div class="header">
    <div class="back__wrapper">
        <!-- <button>Kembali</button> -->
    </div>
    <div class="right__wrapper">
        <div class="login__wrapper">
            <a href="/masuk-akun" class="btn btn-masuk-akun" style="background-color: #fff;">Masuk/Daftar Akun</a>
        </div>

        <div class="sound__wrapper">
            <button>Matikan Lagu</button>
        </div>
    </div>
</div>

<script>
    if (localStorage.getItem('pengguna_id') != null) {
        document.querySelector('.btn-masuk-akun').remove();

        let logOutBtn = `<button class="btn btn-log-out" style="background-color: #fff;">Keluar Akun</button>`

        document.querySelector('.login__wrapper').innerHTML += logOutBtn
    }

    document.querySelector('.btn-log-out').addEventListener('click', () => {
        localStorage.removeItem('pengguna_id')
        alert('Kamu telah keluar dari akun mu')
        window.location.replace('/')
    })
</script>