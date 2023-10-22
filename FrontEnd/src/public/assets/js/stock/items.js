// Линия
class LineObj extends CanvasObj{

    color = '#000'

    constructor(mainCanvas, x, y, x2, y2) {
        super();
        this.mainCanvas = mainCanvas
        this.x = x
        this.y = y
        this.x2 = x2
        this.y2 = y2
        mainCanvas.addObject(this)
    }

    print() {
        const context = this.mainCanvas.context
        context.beginPath()
        context.moveTo(this.x, this.y)
        context.lineTo(this.x2, this.y2)
        context.lineWidth = 3
        context.fillStyle = this.color
        context.stroke()
    }
}

// Погрузчик
class ForklifterObj extends CanvasObj{

    mainColor = '#333'
    hoverColor = '#f33'
    color = this.mainColor

    constructor(mainCanvas, x, y, id) {
        super();
        this.mainCanvas = mainCanvas
        this.x = x
        this.y = y
        this.id = id
        this.width = 20
        this.height = 30
        mainCanvas.addObject(this)
    }

    setPosition(x, y){
        this.x = x
        this.y = y
        this.mainCanvas.repaint()
    }
    move(x, y){
        this.x += x
        this.y += y
        this.mainCanvas.repaint()
    }
    getPosition(){
        return {'x': this.x, 'y': this.y}
    }

    print() {
        const context = this.mainCanvas.context
        context.beginPath()
        context.moveTo(this.x, this.y)
        context.rect(this.x - this.width / 2, this.y - this.height / 2, this.width, this.height)
        context.moveTo(this.x - this.width / 4, this.y - this.height / 2)
        context.lineTo(this.x - this.width / 4, this.y - this.height / 1.2)
        context.moveTo(this.x + this.width / 4, this.y - this.height / 2)
        context.lineTo(this.x + this.width / 4, this.y - this.height / 1.2)
        context.lineCap = 'round'
        context.lineWidth = 3
        context.fillStyle = this.color
        context.stroke()
        context.fill()

        context.fillStyle = '#fff'
        context.textAlign = 'center'
        context.textBaseline = 'middle'
        context.font = "bold 8pt sans-serif";
        context.fillText(this.id, this.x, this.y);
    }

    hover(x, y) {
        if (
            x >= this.x - this.width / 2 &&
            x <= this.x + this.width / 2 &&
            y >= this.y - this.height / 2 &&
            y <= this.y + this.height / 2
        ){
            this.color = this.hoverColor
        }else{
            this.color = this.mainColor
        }
        this.mainCanvas.repaint()
    }

    click(x, y){
        if (
            x >= this.x - this.width / 2 &&
            x <= this.x + this.width / 2 &&
            y >= this.y - this.height / 2 &&
            y <= this.y + this.height / 2
        ){
            alert(this.id)
        }
    }

}

// Датчик
class SensorObj extends CanvasObj{
    constructor(mainCanvas, name, x, y) {
        super()
        this.mainCanvas = mainCanvas
        this.name = name
        this.x = x
        this.y = y
        this.size = 1.4 * this.getMeter()
        mainCanvas.addObject(this)
    }

    setPosition(x, y){
        this.x = x
        this.y = y
        this.mainCanvas.repaint()
    }

    print() {
        const context = this.mainCanvas.context
        const color = '#000'
        context.beginPath()
        context.moveTo(this.x, this.y)
        context.rect(this.x - this.size / 2, this.y - this.size / 2, this.size, this.size)
        context.lineCap = 'round'
        context.lineWidth = 3
        context.fillStyle = color
        context.stroke()
        context.fill()
        context.fillStyle = '#fff'
        context.textAlign = 'center'
        context.textBaseline = 'middle'
        context.font = "bold 10pt sans-serif";
        context.fillText(this.name, this.x, this.y);
    }

}

// Стеллаж
class StackObj extends CanvasObj{
    constructor(mainCanvas, x, y, width, items) {
        super()
        this.mainCanvas = mainCanvas
        this.name = name
        this.x = x
        this.y = y
        this.widthSection = 200
        this.items = items
        this.width = width
        this.height = 1.5 * this.getMeter()
        mainCanvas.addObject(this)
    }

    setPosition(x, y){
        this.x = x
        this.y = y
        this.mainCanvas.repaint()
    }

    print() {
        const context = this.mainCanvas.context
        const color = '#111'
        context.beginPath()
        context.moveTo(this.x, this.y)
        context.rect(this.x - this.width * this.getMeter(), this.y - this.height / 2, this.width * this.getMeter(), this.height)
        context.lineCap = 'round'
        context.lineWidth = 3
        context.fillStyle = color
        context.stroke()
        context.fill()

        for (let item_key in this.items){
            context.fillStyle = '#fff'
            context.textAlign = 'center'
            context.textBaseline = 'middle'
            context.font = "20px sans-serif";
            context.fillText(item_key, this.x - this.items[item_key]['x'] * this.getMeter() + 40, this.y);
        }
    }

}
