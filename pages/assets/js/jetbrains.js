

// Select
document.querySelectorAll('.select').forEach(function (selectWrapper) {
    const selectBtn = selectWrapper.querySelector('.select__button')
    const selectList = selectWrapper.querySelector('.select__list')
    const selectListItems = selectWrapper.querySelectorAll('.select__list-item')
    const selectInput = selectWrapper.querySelector('.select__input')

    function selectClose() {
        if(selectList.getAttribute('open') === null){return}
        selectList.setAttribute('closing', '')
        selectList.addEventListener(
            "animationend",
            () => {
                selectList.removeAttribute("closing");
                selectList.removeAttribute('open')
            },
            {
                once: true
            }
        );
    }

    // Клик по кнопки. Открыть / Закрыть select
    selectBtn.addEventListener('click', function (event){
        if(selectList.getAttribute('open') === null){
            selectList.setAttribute('open', '')
        }else{
            selectClose()
        }
    })

    // Выбор элемента из списка
    selectListItems.forEach(function (listItem) {
        listItem.addEventListener('click', function (event) {
            event.stopPropagation()
            selectBtn.innerText = this.innerText
            selectBtn.focus()
            selectClose()
            selectInput.value = this.dataset.value
        })
    })

    // Клик по документу
    document.addEventListener('click', function (event) {
        // Закрыть select
        if (event.target !== selectBtn){
            selectClose()
        }
    })

    // Нажание на Tab или Escape
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Tab' || event.key === 'Escape'){
            // Закрыть select
            selectClose()
        }
    })
})
// End select

// Drop-down
document.querySelectorAll('.drop-down').forEach(function (dropDownWrapper) {
    const dropDownBtn = dropDownWrapper.querySelector('.drop-down__button')
    const dropDownList = dropDownWrapper.querySelector('.drop-down__list')
    const dropDownListItems = dropDownWrapper.querySelectorAll('.drop-down__list-item')

    function dropDownClose() {
        if(dropDownList.getAttribute('open') === null){return}
        dropDownList.setAttribute('closing', '')
        dropDownList.addEventListener(
            "animationend",
            () => {
                dropDownList.removeAttribute("closing");
                dropDownList.removeAttribute('open')
            },
            {
                once: true
            }
        );
    }

    // Клик по кнопки. Открыть / Закрыть Drop-down
    dropDownBtn.addEventListener('click', function (event){
        if(dropDownList.getAttribute('open') === null){
            dropDownList.setAttribute('open', '')
        }else{
            dropDownClose()
        }
    })

    // Выбор элемента из списка
    dropDownListItems.forEach(function (listItem) {
        listItem.addEventListener('click', function (event) {
            event.stopPropagation()
            dropDownBtn.focus()
            dropDownClose()
        })
    })

    // Клик по документу
    document.addEventListener('click', function (event) {
        // Закрыть select
        if (event.target !== dropDownBtn){
            dropDownClose()
        }
    })

    // Нажание на Escape
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape'){
            // Закрыть select
            dropDownClose()
        }
    })
})
// End Drop-down

// Modal
function showModal(modal) {
    modal.setAttribute('open', '')
}
function closeModal(modal){
    if(modal.getAttribute('open') === null){return}
    modal.setAttribute('closing', '')
    modal.addEventListener(
        "animationend",
        () => {
            modal.removeAttribute("closing");
            modal.removeAttribute('open')
        },
        {
            once: true
        }
    );
}

document.querySelectorAll('.modal').forEach(function (modalWrapper) {
    modalWrapper.querySelector('.modal-content').addEventListener('click', function (event) {
        event.stopPropagation()
    })
    modalWrapper.addEventListener('click', function (event){
        closeModal(this)
    })
    modalWrapper.addEventListener('mouseenter', function (event) {
        document.body.style.overflow = 'hidden'
    })
    modalWrapper.addEventListener('mouseleave', function (event) {
        document.body.style.overflow = 'auto'
    })
})
// End modal

function showModal1(){
    showModal(document.querySelector('#modal-1'))
}
function closeModal1(){
    closeModal(document.querySelector('#modal-1'))
}

function showModal2(){
    showModal(document.querySelector('#modal-2'))
}
function closeModal2(){
    closeModal(document.querySelector('#modal-2'))
}


// Tree
function treeRecursive(node, level= 1, dblclick= false){
    if (level === 1){
        dblclick = node.getAttribute('dblclick') !== null
    }

    node.querySelectorAll(':scope > li').forEach(function (tree_item_li) {
        const tree_item = tree_item_li.querySelector('.tree-item')
        tree_item.style.paddingLeft = (level * (16 + 4) + (4 + 2)) + 'px'
        tree_item.style.setProperty('--arrow-left-position', (level * (16 + 4) + 4) + 'px')

        function nodeOpen(node){
            const tree_nested = node.parentElement.querySelector('.tree-nested')
            node.classList.toggle('tree-active')
        }

        if (dblclick){
            tree_item.addEventListener('dblclick', function (event) {
                nodeOpen(this)
            })
        }else{
            tree_item.addEventListener('click', function (event) {
                nodeOpen(this)
            })
        }

        const tree_nested = tree_item_li.querySelector('.tree-nested')
        if (tree_nested !== null){
            treeRecursive(tree_nested, level + 1, dblclick)
        }
    })
}
document.querySelectorAll('.tree').forEach(function (tree) {
    treeRecursive(tree)
})
// End tree

// Circle background
document.querySelectorAll('.circle-background').forEach(function (circle_background) {
    circle_background.addEventListener('mousemove', function (event) {
        const div_pos = circle_background.getBoundingClientRect()
        let color = circle_background.getAttribute('hovercolor')
        if (color === null){
            color = 'rgb(22, 125, 255)'
        }
        circle_background.style.background = 'radial-gradient(circle at ' + (event.x - div_pos.x) + 'px ' + (event.y - div_pos.y) + 'px, ' + color + ' 0%, rgba(22, 125, 255, 0) calc(0% + 200px)) no-repeat border-box border-box rgba(0, 0, 0, 0)'
        //background: radial-gradient(circle at 159px 63px, rgb(22, 125, 255) 0%, rgba(22, 125, 255, 0) calc(0% + 200px)) no-repeat border-box border-box rgba(0, 0, 0, 0);
    })
    circle_background.addEventListener('mouseout', function (event) {
        circle_background.style.background = 'none'
    })
})
// End  circle background