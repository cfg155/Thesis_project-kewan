let canvas = document.querySelector('.canvas')
let ctx = canvas.getContext('2d')
let img = document.querySelector('.Layer_1')

canvas.width = window.innerWidth
canvas.height = window.innerHeight

// ctx.strokeStyle = 'white'
// ctx.lineWidth = 10
// ctx.moveTo(0,0)
// ctx.lineTo(50,25)
// ctx.stroke()

// ctx.drawImage(img,0,0)

document.querySelector('.img').addEventListener('click',()=>{
    console.log('clicked')
})

document.querySelector('#rect').addEventListener('click',()=>{
    document.querySelector('#rect').style.fill = 'blue'
})