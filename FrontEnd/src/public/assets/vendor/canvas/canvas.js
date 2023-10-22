class MainCanvas {
    constructor(canvas, rect, mainColor, meter) {
        this.canvas = canvas
        this.rect = rect
        this.context = canvas.getContext('2d')
        this.canvas.width = rect.width
        this.canvas.height = rect.height
        this.objects = []
        this.mainColor = mainColor
        this.meter = meter
        this.clear()
    }

    addObject(obj){
        this.objects.push(obj)
        this.repaint()
    }

    clear(){
        this.context.beginPath()
        this.context.moveTo(0, 0)
        this.context.rect(0, 0, this.rect.width, this.rect.height)
        this.context.fillStyle = this.mainColor
        this.context.fill()
    }

    hover(x, y) {
        this.objects.forEach((obj) => {
            obj.hover(x, y)
        })
    }

    click(x, y) {
        this.objects.forEach((obj) => {
            obj.click(x, y)
        })
    }

    repaint(){
        this.clear()
        this.objects.forEach((obj) => {
            obj.print()
        })
    }

    getMeter(){
        return this.meter
    }
}

class CanvasObj {
    constructor(mainCanvas) {
        this.mainCanvas = mainCanvas
    }

    print(){}
    hover(x, y){}
    click(x, y){}

    getMeter(){
        return this.mainCanvas.getMeter()
    }
}

