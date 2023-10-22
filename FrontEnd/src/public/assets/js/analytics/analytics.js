
const tableForkliftersBody = document.querySelector('#tableForkliftersBody')

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const date_from = urlParams.get('date-from')
const date_to = urlParams.get('date-to')
console.log(date_to);

function selectForklift(forklifter_id){
    let query = ''
    if (date_from){
        if (query !== ''){query += '&'}
        query += 'date-from=' + date_from
    }
    if (date_to){
        if (query !== ''){query += '&'}
        query += 'date-to=' + date_to
    }
    window.location = analytics_url + '/' + forklifter_id + '?' + query
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
        result_table += '<tr onclick="selectForklift(' + forklifter['id'] + ')"><td>' + forklifter['id'] + '</td><td>' + forklifter_status + '</td><td>' + ((forklifter['task_id']) ? forklifter['task_id'] : '-') + '</td></tr>'
    })
    tableForkliftersBody.innerHTML = result_table
}

// Медленный цикл (для запросов на сервер)
function lazy_loop(){
    const urlGetForklifts = 'http://localhost:8100/api/forklifts'
    httpRequest(urlGetForklifts, 'GET', null, false, function (response) {
        const forklifts_data = JSON.parse(response.response)
        // Перерисовка таблицы
        setTableForklifters(forklifts_data)
    })
}

async function lazy_loop_start() {
    lazy_loop()
    await new Promise((resolve, reject) => {
        setTimeout(() => resolve(''), 1000)
    })
    await lazy_loop_start()
}
lazy_loop_start()
