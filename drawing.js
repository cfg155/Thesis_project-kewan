window.addEventListener('load',()=>{
    document.getElementById('hair')

    let drawingCanvasFeature = () =>{
        const canvas = document.querySelector('.drawing-canvas')
        const ctx = canvas.getContext('2d')
    
        let paintingStatus = false
        canvas.width = 500
        canvas.height = 500

        // let img = document.getElementById('img')
        // ctx.drawImage(img,0,0)
    
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
    
            ctx.lineTo(e.clientX,e.clientY)
            ctx.stroke()
            ctx.beginPath()
            ctx.moveTo(e.clientX,e.clientY)
        }
    
        // finished painting
        function finishedPainting(){
            paintingStatus = false
        }

        // cursor is out of the container
        let offContainer = ()=>{
            paintingStatus = false
            ctx.beginPath()
        } 

        // pick color function
        let color = () => {
            let colorCircle = document.querySelectorAll('.color-circle')

            function pickColor(){
                let choosenColor = this.getAttribute('id')
                ctx.strokeStyle = choosenColor
            }

            colorCircle.forEach(container => {
                container.addEventListener('click',pickColor)
            })
        }

        color()

        // fill feature
        function fill() {
            let fillPath = () => {
                canvas.removeEventListener('mousedown',startPainting)
                canvas.removeEventListener('mousemove',isPainting)
                canvas.removeEventListener('mouseup',finishedPainting)
            }

            document.querySelector('.btn--fill').addEventListener('click',fillPath)
        }

        fill()
    
        // event listener 
        function addAllListener(){
            canvas.addEventListener('mousedown',startPainting)
            canvas.addEventListener('mousemove',isPainting)
            canvas.addEventListener('mouseup',finishedPainting)
            canvas.addEventListener('mouseout',offContainer)
        }

        addAllListener()
    }
    
    drawingCanvasFeature()
})
