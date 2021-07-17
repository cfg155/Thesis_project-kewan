function drawingCanvasFeature(){
    const canvas = document.querySelector('.drawing-canvas')
    const ctx = canvas.getContext('2d')

    let paintingStatus = false
    canvas.width = window.innerWidth
    canvas.height = window.innerHeight

    // start painting function
    function startPainting(e){
        paintingStatus = true
        ctx.moveTo(e.clientX,e.clientY)
    }

    // painting function
    function isPainting(e){
        if(!paintingStatus) return

        ctx.lineWidth = 10
        ctx.lineCap = 'round'

        ctx.lineWidth = 1
        ctx.strokeStyle = 'red'

        // console.log(e.clientX)
        // console.log(e.clientY)
        ctx.lineTo(e.clientX,e.clientY)
        ctx.stroke()
        ctx.beginPath()
        ctx.moveTo(e.clientX,e.clientY)
    }

    // finished painting
    function finishedPainting(){
        paintingStatus = false
    }

    // event listener 
    canvas.addEventListener('mousedown',startPainting)
    canvas.addEventListener('mousemove',isPainting)
    canvas.addEventListener('mouseup',finishedPainting)
}

drawingCanvasFeature()