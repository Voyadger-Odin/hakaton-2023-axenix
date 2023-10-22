let stock_canvas_parent_react = document.querySelector('#stock_canvas_parent').getBoundingClientRect()
let stock_canvas = document.querySelector('#stock_canvas')
let stock_data

const tableForkliftersBody = document.querySelector('#tableForkliftersBody')
const meter = 25


let sensors = {}
let sensors_list = {}
let end_points = {}
let rows = {}

const mainCanvas = new MainCanvas(stock_canvas, stock_canvas_parent_react, '#eee', meter)


const StartX = stock_canvas_parent_react.width - 100
const StartY = stock_canvas_parent_react.height - 100

stock_canvas.addEventListener('mousemove', function (event) {
    const div_pos = stock_canvas.getBoundingClientRect()
    const x = (event.x - div_pos.x)
    const y = (event.y - div_pos.y)
    mainCanvas.hover(x, y)
    //loader_1.setPosition(x, y)
})

stock_canvas.addEventListener('click', function (event) {
    const div_pos = stock_canvas.getBoundingClientRect()
    const x = (event.x - div_pos.x)
    const y = (event.y - div_pos.y)
    mainCanvas.click(x, y)
    //loader_1.setPosition(x, y)
})


function drawSensors(parent, name, x, y){
    const sensor = new SensorObj(mainCanvas, name, x, y)
    for (let sensor_key in parent['next']){
        let x_child = x
        let y_child = y
        if (parent['next'][sensor_key]['is_endpoint']){
            x_child -= meter * parent['next'][sensor_key]['length']
        }else{
            y_child -= meter * parent['next'][sensor_key]['length']
        }
        drawSensors(parent['next'][sensor_key], sensor_key, x_child, y_child)
    }
}


function drawLineSensors(parent, x, y) {
    for (let sensor_key in parent['next']){
        let x_child = x
        let y_child = y
        if (parent['next'][sensor_key]['is_endpoint']){
            x_child -= meter * parent['next'][sensor_key]['length']
        }else{
            y_child -= meter * parent['next'][sensor_key]['length']
        }
        const line_1 = new LineObj(mainCanvas, x, y, x_child, y_child)
        drawLineSensors(parent['next'][sensor_key], x_child, y_child)
    }
}

function drawRows(stack, number, x, y, width){
    const stack_1 = new StackObj(mainCanvas, x, y, width, stack)
}

function drawStock(x, y) {
    // Draw sensors
    for (let sensor_key in sensors){
        drawLineSensors(sensors[sensor_key], x, y)
        drawSensors(sensors[sensor_key], sensor_key, x, y)
    }

    // Draw stack
    for (let row_key in rows){
        let row_data = {}
        let width = 0

        rows[row_key].forEach((endpoint) => {
            const sensor = end_points[endpoint]['sensor']
            row_data[endpoint] = sensors_list[sensor]
            width = row_data[endpoint]['x']
        })

        const first_endpoint = rows[row_key][0]
        const first_sensor = end_points[first_endpoint]['sensor']
        const row_start = sensors_list[first_sensor]

        drawRows(row_data, row_key, x - 4 * meter, y - (row_start['y'] - 2) * meter, width)
    }
}


// Получение формы склада
let urlGetStock = 'http://' + SERVER_IP + ':8100/api/stock'
httpRequest(urlGetStock, 'GET', null, false, function (response) {
    stock_data = JSON.parse(response.response)

    // Генерация дерева
    let row = 0
    // Генерирует дерево
    for (let item_key in stock_data){
        let prev = sensors
        let parent = null
        let parent_name = null
        let length = 0
        let is_end_point = false
        stock_data[item_key]['path_sequence'].forEach((sensor) => {
            if (sensor['check_point_name'] === stock_data[item_key]['path_sequence'][stock_data[item_key]['path_sequence'].length - 1]['check_point_name']){
                if (!parent['is_endpoint']){
                    row += 1
                }
                is_end_point = true
            }else{
                is_end_point = false
            }

            // Если не было записи, создать новую
            if (!sensors_list[sensor['check_point_name']]){
                let x = 0
                let y = 0
                if (sensors_list[parent_name]){
                    x = sensors_list[parent_name]['x']
                    y = sensors_list[parent_name]['y']
                }
                if (is_end_point){
                    x += length
                }else{
                    y += length
                }
                sensors_list[sensor['check_point_name']] = {
                    'x': x,
                    'y': y
                }
            }

            if (prev[sensor['check_point_name']] == null){
                prev[sensor['check_point_name']] = {
                    'length': length,
                    'is_endpoint': is_end_point,
                    'row': (is_end_point) ? row : null,
                    'next': {}
                }
            }
            length = sensor['next_check_point_distance']

            parent = prev[sensor['check_point_name']]
            parent_name = sensor['check_point_name']
            prev = prev[sensor['check_point_name']]['next']

        })
        end_points[stock_data[item_key]['target_rack_id']] = {
            'sensor': stock_data[item_key]['path_sequence'][stock_data[item_key]['path_sequence'].length - 1]['check_point_name'],
            'row': row
        }
        if (!rows[row]){
            rows[row] = []
        }
        rows[row].push(stock_data[item_key]['target_rack_id'])
    }
    drawStock(StartX, StartY)
})


function openStock(url){
    window.location = url
}


function setTableForklifters(forklifts_data){
    let result_table = ''
    forklifts_data.forEach((forklifter) => {
        let forklifter_status = 'Ожидаю заказ'
        if (forklifter['status'] === 'run_to_order'){
            forklifter_status = 'Еду за заказом'
        }else if (forklifter['status'] === 'back_with_order'){
            forklifter_status = 'Возвращаюсь с заказом'
        }else if (forklifter['status'] === 'wait'){
            forklifter_status = 'Ожидаю заказ'
        }
        result_table += '<tr><td>' + forklifter['id'] + '</td><td>' + forklifter_status + '</td><td>' + ((forklifter['task_id']) ? forklifter['task_id'] : '-') + '</td></tr>'
    })
    tableForkliftersBody.innerHTML = result_table
}


let forklifters = {}
const spead = 1

// Цикл (для движения)
function loop(){
    for (let forklifters_key in forklifters){
        const forklifterOgj = forklifters[forklifters_key]['forklifter']
        const currentPosition = forklifterOgj.getPosition()
        const targetPosition = forklifters[forklifters_key]['target_position']
        forklifterOgj.move(
            (targetPosition['x'] - currentPosition['x']) * (0.05),
            (targetPosition['y'] - currentPosition['y']) * (0.05)
        )
    }
}

// Медленный цикл (для запросов на сервер)
function lazy_loop(){
    const urlGetForklifts = 'http://' + SERVER_IP + ':8100/api/forklifts/' + stock_id
    httpRequest(urlGetForklifts, 'GET', null, false, function (response) {
        const forklifts_data = JSON.parse(response.response)
        // Перерисовка таблицы
        setTableForklifters(forklifts_data)

        // Создание погрузчиков
        forklifts_data.forEach((forklifter) => {
            if (!forklifters[forklifter['id']]){
                forklifters[forklifter['id']] = {}
                let sensorPosition = {'x': 0, 'y': 0}
                if (forklifter['position'] !== null){
                    sensorPosition = sensors_list[forklifter['position']]
                }else{
                    sensorPosition = {'x': 0, 'y': -2.3}
                }
                forklifters[forklifter['id']]['target_position'] = {'x': StartX - sensorPosition['x'] * meter, 'y': StartY - sensorPosition['y'] * meter}
                forklifters[forklifter['id']]['target'] = forklifter['position']
                forklifters[forklifter['id']]['forklifter'] = new ForklifterObj(mainCanvas, StartX - sensorPosition['x'] * meter, StartY - sensorPosition['y'] * meter, forklifter['id'])
            }else{
                let sensorPosition = {'x': 0, 'y': 0}
                if (forklifters[forklifter['id']]['target'] !== null){
                    sensorPosition = sensors_list[forklifters[forklifter['id']]['target']]
                }else{
                    sensorPosition = {'x': 0, 'y': -2.3}
                }
                // Достиг ли точки
                if (forklifter['position'] !== forklifters[forklifter['id']]['target']){
                    forklifters[forklifter['id']]['forklifter'].setPosition(StartX - sensorPosition['x'] * meter, StartY - sensorPosition['y'] * meter)

                    if (forklifter['position'] !== null){
                        sensorPosition = sensors_list[forklifter['position']]
                    }else{
                        sensorPosition = {'x': 0, 'y': -2.3}
                    }
                    forklifters[forklifter['id']]['target_position'] = {'x': StartX - sensorPosition['x'] * meter, 'y': StartY - sensorPosition['y'] * meter}
                    forklifters[forklifter['id']]['target'] = forklifter['position']
                }
            }
        })
    })
}



// Loop
async function lazy_loop_start() {
    lazy_loop()
    await new Promise((resolve, reject) => {
        setTimeout(() => resolve(''), 300)
    })
    await lazy_loop_start()
}
lazy_loop_start()

async function loop_start() {
    await new Promise((resolve, reject) => {
        setTimeout(() => resolve(''), 50)
    })
    loop()
    await loop_start()
}
loop_start()
