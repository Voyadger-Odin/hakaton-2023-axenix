<style>

    .input-group{
        display: flex;
        align-items: center;
    }

    /* Buttons */
    .btn{
        padding: 6px 12px;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 13px;
        font-weight: 500;
        line-height: 16px;
        font-style: normal;
        cursor: pointer;
        transition: .1s;
    }
    .btn-min-size{
        min-width: 72px;
        min-height: 28px;
    }

    /* Secondary */
    .btn-secondary{
        background: var(--gray-14);
        color: var(--gray-1);
        border: 1px solid var(--gray-9);
    }
    .btn-secondary:hover{
        background: var(--gray-14);
        color: var(--gray-1);
        border: 1px solid var(--gray-8);
    }
    .btn-secondary:active{
        background: var(--gray-13);
        color: var(--gray-1);
        border: 1px solid var(--gray-7);
    }

    /* Mono */
    .btn-mono{
        background: var(--gray-12);
        color: var(--gray-1);
    }
    .btn-mono:hover{
        background: var(--gray-11);
        color: var(--gray-1);
    }
    .btn-mono:active{
        background: var(--gray-12);
        color: var(--gray-1);
    }

    /* Link */
    .btn-link{
        padding: 0;
        color: var(--blue-2);
        text-decoration: none;
        background: none;
    }
    .btn-link:hover{
        color: var(--blue-2);
        text-decoration-line: underline;
    }
    .btn-link:active{
        color: var(--blue-2);
    }

    /* Primary */
    .btn-primary{
        background: var(--blue-4);
    }
    .btn-primary:hover{
        background: var(--blue-5);
        color: white;
    }
    .btn-primary:active{
        background: var(--blue-4);
        color: white;
    }

    /* Success */
    .btn-success{
        background: var(--green-4);
    }
    .btn-success:hover{
        background: var(--green-5);
        color: white;
    }
    .btn-success:active{
        background: var(--green-4);
        color: white;
    }

    /* Danger */
    .btn-danger{
        background: var(--red-4);
    }
    .btn-danger:hover{
        background: var(--red-5);
        color: white;
    }
    .btn-danger:active{
        background: var(--red-4);
        color: white;
    }

    /* Warning */
    .btn-warning{
        background: var(--yellow-4);
        color: var(--gray-1);
    }
    .btn-warning:hover{
        background: var(--yellow-5);
        color: var(--gray-1);
    }
    .btn-warning:active{
        background: var(--yellow-4);
        color: var(--gray-1);
    }

    /* Light */
    .btn-light{
        background: var(--gray-12);
        color: var(--gray-1);
    }
    .btn-light:hover{
        background: var(--gray-11);
        color: var(--gray-1);
    }
    .btn-light:active{
        background: var(--gray-12);
        color: var(--gray-1);
    }

    /* Dark */
    .btn-dark{
        background: var(--gray-2);
        color: var(--gray-12);
    }
    .btn-dark:hover{
        background: var(--gray-3);
        color: var(--gray-12);
    }
    .btn-dark:active{
        background: var(--gray-2);
        color: var(--gray-12);
    }

    .btn-stop{
        width: 16px;
        height: 16px;
        padding: 0px;
        background: url("../icons/stop.svg");
    }

    .btn-help{
        width: 24px;
        height: 24px;
        padding: 4px;
        font-size: 16px;
        color: var(--gray-6);
        border: 1px solid var(--gray-9);
        border-radius: 100%;
        background: var(--gray-14);
    }

    /* Disabled */
    .btn:disabled{
        background: var(--gray-12);
        color: var(--gray-8);
        border: none;
        cursor: not-allowed;
    }

    /* Dark theme */
    /* Secondary */
    .theme-dark>* .btn-secondary{
        background: none;
        color: var(--gray-12);
        border: 1px solid var(--gray-5);
    }
    .theme-dark>* .btn-secondary:hover{
        background: none;
        color: var(--gray-12);
        border: 1px solid var(--gray-7);
    }
    .theme-dark>* .btn-secondary:active{
        background: var(--gray-2);
        color: var(--gray-12);
        border: 1px solid var(--gray-7);
    }
    /* Primary */
    .theme-dark>* .btn-primary{
        background: var(--blue-6);
    }
    .theme-dark>* .btn-primary:hover{
        background: #3369D6;
        color: white;
    }
    .theme-dark>* .btn-primary:active{
        background: #315FBD;
        color: white;
    }

    .theme-dark>* .btn-help{
        color: var(--gray-8);
        border: 1px solid var(--gray-5);
        background: var(--gray-1);
    }

    /* Mono */
    .theme-dark>* .btn-mono{
        background: var(--gray-3);
        color: var(--gray-12);
    }
    .theme-dark>* .btn-mono:hover{
        background: var(--gray-4);
        color: var(--gray-12);
    }
    .theme-dark>* .btn-mono:active{
        background: var(--gray-3);
        color: var(--gray-12);
    }

    /* Link */
    .theme-dark>* .btn-link{
        padding: 0;
        color: var(--blue-9);
        text-decoration: none;
        background: none;
    }
    .theme-dark>* .btn-link:hover{
        color: var(--blue-9);
        text-decoration-line: underline;
    }
    .theme-dark>* .btn-link:active{
        color: var(--blue-9);
    }

    /* Disabled */
    .theme-dark>* .btn:disabled{
        background: var(--gray-5);
        color: var(--gray-8);
        border: none;
        cursor: not-allowed;
    }
    /* End dark theme */
    /* End buttons */

    /* Input */
    .input{
        width: 100%;
        border: 1px solid var(--gray-9);
        border-radius: 4px;
        color: var(--gray-1);
        background: var(--gray-14);
        padding: 6px 10px;
        font-size: 13px;
    }
    .input:focus{
        outline: none;
        border: 1px solid var(--blue-4);
    }

    .input-fill{
        color: var(--gray-3);
        background: var(--gray-12);
        border: none;
    }
    .input-fill:focus{
        color: var(--gray-1);
        background: var(--gray-12);
        border: none;
    }

    .input-validated{
        border: 1px solid var(--red-9);
    }
    .input-validated:focus{
        border: 1px solid var(--red-4);
    }


    .input:disabled{
        background: var(--gray-13);
        border: 1px solid var(--gray-11);
        color: var(--gray-8);
        cursor: not-allowed;
    }

    .input-large{
        font-size: 19px;
    }

    /* Dark theme */
    .theme-dark>* .input{
        border: 1px solid var(--gray-5);
        color: var(--gray-12);
        background: var(--gray-1);
    }
    .theme-dark>* .input:focus{
        outline: none;
        border: 1px solid var(--blue-6);
    }

    .theme-dark>* .input-fill{
        color: var(--gray-10);
        background: var(--gray-2);
        border: none;
    }
    .theme-dark>* .input-fill:focus{
        color: var(--gray-12);
        background: var(--gray-2);
        border: none;
    }

    .theme-dark>* .input-validated{
        border: 1px solid var(--red-2);
    }
    .theme-dark>* .input-validated:focus{
        border: 1px solid var(--red-6);
    }

    .theme-dark>* .input:disabled{
        background: var(--gray-1);
        border: 1px solid var(--gray-5);
        color: var(--gray-7);
    }
    /* End dark theme */
    /* End input */

    /* Select */
    .select{
        position: relative;
    }
    .select__button{
        position: relative;
        display: block;
        width: 100%;
        text-align: left;
        padding: 6px 10px;
        cursor: pointer;
        color: var(--gray-3);
        background: var(--gray-13);
        border: 1px solid var(--gray-13);
        border-radius: 4px;
    }
    .select__button:focus{
        outline: none;
        border: 1px solid var(--blue-4);
    }
    .select__button::after{
        content: "";
        position: absolute;
        top: 50%;
        right: 6px;
        transform: translateY(-50%);
        width: 16px;
        height: 16px;
        transition: .3s;

        border-color: #0000 transparent transparent transparent;
        background: url("../icons/arrow-bottom.svg");

        pointer-events: none;
    }

    .select__list{
        display: block;

        position: absolute;
        left: 0;
        top: 30px;
        width: 100%;
        margin: 0;
        list-style-type: none;
        overflow: hidden;
        z-index: 1;
        padding: 8px 12px;
        border-radius: 8px;

        border: 0.5px solid var(--gray-9);
        background: var(--gray-13);
        box-shadow: 0px 6px 20px 0px rgba(145, 145, 145, 0.47);
    }
    .select__list:not([open]){
        display: none;
    }
    .select__list[open]{
        animation: fade-in 200ms forwards, slide-in 200ms forwards;
    }

    .select:has(>.select__list[open]):not(:has(>.select__list[closing])) .select__button::after{
        transform: translateY(0) rotate(180deg);
        top: 25%;
    }
    .select__list[closing] {
        display: block;
        pointer-events: none;
        animation: fade-out 200ms forwards, slide-out 200ms forwards;
    }

    .select__list-item{
        margin: 0;
        padding: 4px 8px;
        cursor: pointer;
        border-radius: 4px;
    }
    .select__list-item:hover{
        background: var(--blue-11);
    }

    .select__list-delimiter{
        width: 100%;
        height: 1px;
        background: var(--gray-12);
        margin: 5px 0;
    }

    /* Large */
    .select-large>.select__button{
        font-size: 19px;
    }

    .select-large>.select__list{
        top: 38px;
    }
    .select-large>.select__list>.select__list-item{
        font-size: 19px;
    }

    /* End large */

    /* Dark theme */
    .theme-dark>* .select__button{

        border: 1px solid var(--gray-5);
        color: var(--gray-12);
        background: var(--gray-1);
    }
    .theme-dark>* .select__list{
        border: 0.5px solid var(--gray-3);
        background: var(--gray-2);
        box-shadow: 0px 8px 32px 0px rgba(0, 0, 0, 0.40);
    }
    .theme-dark>* .select__list-item:hover{
        background: var(--blue-6);
    }
    .theme-dark>* .select__list-delimiter{
        background: var(--gray-4);
    }
    /* End dark theme */
    /* End select */

    /* Drop-down */
    .drop-down{
        position: relative;
        width: max-content;
    }
    .drop-down__button{
        color: var(--blue-2);
        cursor: pointer;
    }
    .drop-down__button:hover{
        text-decoration-line: underline;
    }
    .drop-down__list{
        display: block;

        position: absolute;

        left: 0;
        top: 20px;
        width: max-content;
        margin: 0;
        list-style-type: none;
        overflow: hidden;
        z-index: 1;
        padding: 8px 12px;
        border-radius: 8px;

        border: 0.5px solid var(--gray-9);
        background: var(--gray-13);
        box-shadow: 0px 6px 20px 0px rgba(145, 145, 145, 0.47);
    }
    .drop-down__list-right{
        left: unset;
        right: 0;
    }
    .drop-down__list:not([open]){
        display: none;
    }
    .drop-down__list[open]{
        animation: fade-in 200ms forwards, slide-in 200ms forwards;
    }
    .drop-down__list[closing] {
        display: block;
        pointer-events: none;
        animation: fade-out 200ms forwards, slide-out 200ms forwards;
    }

    .drop-down__list-item{
        margin: 0;
        padding: 4px 8px;
        cursor: pointer;
        border-radius: 4px;
        width: 100%;
    }
    .drop-down__list-item > *{
        display: inline-block;
        width: 100%;
    }

    .drop-down__list-delimiter{
        width: 100%;
        height: 1px;
        background: var(--gray-12);
        margin: 5px 0;
    }

    /* Dark theme */
    .theme-dark>* .drop-down__button{
        color: var(--blue-9);
    }
    .theme-dark>* .drop-down__list{
        border: 0.5px solid var(--gray-3);
        background: var(--gray-2);
        box-shadow: 0px 8px 32px 0px rgba(0, 0, 0, 0.40);
    }
    .theme-dark>* .drop-down__list-delimiter{
        background: var(--gray-4);
    }
    /* End dark theme */
    /* End drop-down */

    /* Link */
    .link{
        color: var(--blue-2);
        text-decoration: none;
    }
    .link:hover{
        color: var(--blue-2);
        text-decoration-line: underline;
    }
    .link-underline-none{
        text-decoration: none !important;
    }

    .link-default, .link-default:hover{
        color: var(--gray-1);
    }

    .link-disabled, .link-disabled:hover{
        color: var(--gray-8);
        text-decoration: none;
    }

    /* Dark theme */
    .theme-dark>* .link{
        color: var(--blue-9);
    }
    .theme-dark>* .link:hover{
        color: var(--blue-9);
    }
    .theme-dark>* .link-default, .theme-dark>*  .link-default:hover{
        color: var(--gray-14);
    }
    .theme-dark>* .link-disabled, .theme-dark>*  .link-disabled:hover{
        color: var(--gray-7);
    }
    /* End dark theme */
    /* End link */

    /* Loader */
    .loader{
        width: 40px;
        height: 40px;
        background-image: url('../icons/loader40-40.svg');
        animation: loader .8s steps(8) infinite;
    }
    .loader-small{
        width: 14px;
        height: 14px;
        background-image: url('../icons/loader14-14.svg');
    }
    /* End loader */

    /* Progress */
    .progress{
        display: inline-block;
        width: 100%;
    }
    .progress-loader{
        display: flex;
        align-items: center;

    }
    .progress-btn{
        display: inline-block;
        width: max-content;
    }
    .progress-vertical{
        flex-direction: column;
        align-items: start;
    }
    .progress-bar{
        background: var(--gray-11);
        display: inline-block;
        width: 100%;
        height: 4px;
        margin-top: 6px;
        margin-bottom:6px;
        border-radius: 4px;
        overflow: hidden;
        position: relative;
    }
    .progress-label{
        color: var(--gray-6);
        margin-right: 12px;
        width: max-content;
    }
    .progress-label-top{
        font-size: 13px;
        font-style: normal;
        font-weight: 500;
        line-height: 16px; /* 123.077% */
    }
    .progress-bar::-webkit-progress-bar{
        background: var(--gray-11);
    }
    .progress-bar::-webkit-progress-value{
        background: var(--blue-6);
        border-radius: 4px;
    }

    /* Dark theme */
    .theme-dark>* .progress-bar{
        background: var(--gray-4);
    }
    .theme-dark>* .progress-bar::-webkit-progress-bar{
        background: var(--gray-4);
    }
    .theme-dark>* .progress-label{
        color: var(--gray-7);
    }
    .theme-dark>* .progress-bar::-webkit-progress-value{
        background: var(--blue-6);
        border-radius: 4px;
    }
    /* End dark theme */
    /* End progress */

    /* Segment */
    .segment{
        background: var(--gray-13);
        width: max-content;
        padding: 6px 0;
        border: 1px solid var(--gray-9);
        border-radius: 4px;
        font-weight: 500;
    }
    .segment li{
        display: inline;
        padding: 6px 12px;
        margin: 0;
        cursor: pointer;
        border-radius: 4px;
    }
    .segment li:hover{
        background: var(--gray-12);
    }
    .segment-active{
        background: var(--gray-14);
        border: 1px solid var(--gray-9);
        border-radius: 4px;
    }

    .segment-disabled{
        color: var(--gray-8);
    }
    .segment-disabled li{
        cursor: not-allowed;
    }
    .segment-disabled li:hover{
        background: none !important;
    }
    .segment-disabled>.segment-active, .segment-disabled>.segment-active:hover{
        background: var(--gray-12) !important;
    }

    /* Dark theme */
    .theme-dark>* .segment{
        background: var(--gray-2);
        border: 1px solid var(--gray-7);
    }
    .theme-dark>* .segment li:hover{
        background: var(--gray-3);
    }
    .theme-dark>* .segment-active{
        background: var(--gray-3);
        border: 1px solid var(--gray-7);
    }
    .theme-dark>* .segment-disabled{
        color: var(--gray-8);
    }
    .theme-dark>* .segment-disabled>.segment-active,
    .theme-dark>* .segment-disabled>.segment-active:hover{
        background: var(--gray-5) !important;
        border: 1px solid var(--gray-7);
    }
    /* End dark theme */
    /* End segment */

    /* Block */
    .block{
        width: max-content;
        padding: 8px 12px;
        border-radius: 8px;
        border: 0.5px solid var(--gray-9);
        background: var(--gray-13);
        box-shadow: 0px 6px 20px 0px rgba(145, 145, 145, 0.47);
    }

    /* Dark theme */
    .theme-dark>* .block{
        border: 0.5px solid var(--gray-3);
        background: var(--gray-2);
        box-shadow: 0px 8px 32px 0px rgba(0, 0, 0, 0.40);
    }
    /* End dark theme */
    /* End block */

    /* Card */
    .card{
        background: var(--gray-13);
        border-radius: 4px;
        border: 0.5px solid var(--gray-9);
        box-shadow: 0px 6px 20px 0px rgba(145, 145, 145, 0.47);
    }

    /* Dark theme */
    .theme-dark>* .card{
        border: 0.5px solid var(--gray-3);
        background: var(--gray-2);
        box-shadow: 0px 8px 32px 0px rgba(0, 0, 0, 0.40);
    }
    /* End dark theme */
    /* End card */

    /* Table */
    .table{
        width: 100%;
        border-collapse: collapse;
        border: 1px solid var(--gray-12);
    }
    .table-hover>tbody>tr:hover{
        background: var(--gray-13);
        cursor: pointer;
    }
    .table>thead>tr>th, .table>tbody>tr>td{
        padding: 4px 8px;
    }
    .table>thead>tr, .table>thead>tr>th{
        border: 1px solid var(--gray-12);
        text-align: start;
    }

    .table-stroke, .table-stroke>thead, .table-stroke>thead>tr, .table-stroke>thead>tr>th{
        border: none !important;
        text-align: center;
    }
    .table-stroke>tbody>tr{
        border-top: 1px solid var(--gray-12);
        text-align: center !important;
    }

    .table-cell-padding-larg>thead>tr>th, .table-cell-padding-larg>tbody>tr>td{
        padding: 15px;
    }

    /* Dark theme */
    .theme-dark>* .table{
        border: 1px solid var(--gray-3);
    }
    .theme-dark>* .table-hover>tbody>tr:hover{
        background: var(--gray-2);
    }
    .theme-dark>* .table>thead>tr, .theme-dark>*  .table>thead>tr>th{
        border: 1px solid var(--gray-3);
    }

    .theme-dark>* .table-stroke>tbody>tr{
        border-top: 1px solid var(--gray-3);
    }
    /* End dark theme */
    /* End table */

    /* Modal */
    .modal{
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: #0005;
        pointer-events: unset;
        z-index: 1;
        cursor: default;
        -webkit-backdrop-filter: blur(2px);
        backdrop-filter: blur(2px);
    }
    .modal:not([open]){
        display: none;
    }
    .modal[open]{
        animation-timing-function:cubic-bezier(.5,-800,.5,800);
        animation: fade-in 200ms forwards;
    }
    .modal[open]>.modal-dialog{
        animation-timing-function:cubic-bezier(.5,-800,.5,800);
        animation: fade-in 200ms forwards, scale-up 200ms forwards;
    }

    .modal[closing] {
        animation-timing-function:cubic-bezier(.5,-800,.5,800);
        display: block;
        pointer-events: none;
        animation: fade-out 200ms forwards;
    }
    .modal[closing]>.modal-dialog{
        animation-timing-function:cubic-bezier(.5,-800,.5,800);
        display: block;
        pointer-events: none;
        animation: fade-out 200ms forwards, scale-down 200ms forwards;
    }

    .modal-dialog{
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
    }

    .modal-content{
        border-radius: 8px;
        width: 40vw;
        position: relative;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);

        color: var(--gray-1);
        background: var(--gray-14);
        box-shadow: 0px 8px 40px 0px rgba(0, 0, 0, 0.30);
    }
    .modal-header{
        height: 32px;
        border-bottom: 1px solid var(--gray-12);
    }
    .modal-title{
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
    }

    .modal-body{
        height: 30vh;
    }
    .modal-footer{
        border-top: 1px solid var(--gray-12);
        display: flex;
        align-items: center;
    }
    .modal-footer-content{
        display: flex;
        justify-content: space-between;
        width: 100%;
        padding: 8px 8px;
    }

    /* Dark theme */
    .theme-dark>* .modal-content{
        color: var(--gray-14);
        background: var(--gray-1);
        box-shadow: 0px 8px 40px 0px rgba(0, 0, 0, 0.30);
    }
    .theme-dark>* .modal-header{
        border-bottom: 1px solid var(--gray-3);
    }
    .theme-dark>* .modal-footer{
        border-top: 1px solid var(--gray-3);
    }
    /* End dark theme */
    /* End modal */

    /* Tab */
    .tabs{
        display: flex;
        font-weight: 500;
    }
    .tabs li{
        display: inline;
        padding: 12px 12px 13px 12px;
        cursor: pointer;
    }
    .tabs li:hover{
        background: var(--gray-12);
    }
    .tabs li.tab-selected{
        border-bottom: 3px solid var(--blue-4);
    }

    /* Dark theme */
    .theme-dark>* .tabs li:hover{
        background: var(--gray-3);
    }
    .theme-dark>* .tabs li.tab-selected{
        border-bottom: 3px solid var(--blue-6);
    }
    /* End dark theme */
    /* End tab */

    /* Tree */
    .tree,
    .tree > *,
    .tree > *:after,
    .tree > *:before,
    .tree-nested{
        width: 100%;
        list-style-type: none;
    }

    .tree-nested{
        display: none;
    }

    .tree{
        width: 100%;
    }

    .tree-item{
        width: 100%;
        border-radius: 4px;
        padding: 4px;
        cursor: pointer;
        --arrow-left-position: 0px;
        user-select: none;
        font-weight: 500;
    }
    .tree-item:hover{
        background: var(--blue-11);
    }

    .tree-item-hint{
        margin-left: 6px;
        color: var(--gray-7);
    }

    /* info items */
    .tree-item-danger{
        color: var(--red-4);
    }
    .tree-item-warning{
        color: var(--yellow-4);
    }
    .tree-item-success{
        color: var(--green-4);
    }
    /* end info items */

    li:has(>.tree-nested)>.tree-item::before{
        content: "";
        display: inline-block;
        margin-right: 6px;

        position: absolute;
        left: var(--arrow-left-position);
        transform: translateY(0) rotate(-90deg);
        width: 16px;
        height: 16px;

        border-color: #0000 transparent transparent transparent;
        background: url("../icons/arrow-bottom.svg") no-repeat;

        pointer-events: none;
    }

    li>.tree-active::before{
        transform: rotate(0deg) !important;
    }


    li:has(>.tree-active)>.tree-nested {
        display: block;
    }

    /* Dark theme */
    .theme-dark>* .tree-item:hover{
        background: var(--blue-2);
    }
    .theme-dark>* .tree-item-hint{
        color: var(--gray-8);
    }
    /* info items */
    .theme-dark>* .tree-item-danger{
        color: var(--red-6);
    }
    .theme-dark>* .tree-item-warning{
        color: var(--yellow-6);
    }
    .theme-dark>* .tree-item-success{
        color: var(--green-6);
    }
    /* end info items */
    /* End dark theme */
    /* End tree */

    /* Checkbox */
    .checkbox{
        position: absolute;
        z-index: -1;

        display: block;
        width: 0;
        height: 0;
    }
    .checkbox+label{
        display: block;
        cursor: pointer;
        padding-left: 24px;
        font-weight: 500;
        font-size: 13px;
        line-height: 16px;
        margin-top: 8px;
        margin-bottom: 8px;
    }

    .checkbox:before{
        content: "";
        display: inline-block;
        margin-right: 6px;

        border: 1px solid var(--gray-8);
        border-radius: 5px;

        position: absolute;
        left: 0;
        width: 16px;
        height: 16px;

        pointer-events: none;
    }

    .checkbox:focus:before{
        border: 1px solid var(--blue-4);
    }
    .checkbox:hover:before{
        border: 1px solid var(--gray-6);
    }

    .checkbox:checked:before{
        background: url("../icons/checked.svg") no-repeat var(--blue-4);
        border: 1px solid #0000;
    }
    .checkbox:checked:hover:before{
        background: url("../icons/checked.svg") no-repeat var(--blue-3);
        border: 1px solid #0000;
    }

    /* Dark theme */
    .theme-dark>* .checkbox:before{
        border: 1px solid var(--gray-6);
    }
    .theme-dark>* .checkbox:focus:before{
        border: 1px solid var(--blue-6);
    }
    .theme-dark>* .checkbox:hover:before{
        border: 1px solid var(--gray-9);
    }
    .theme-dark>* .checkbox:checked:before{
        background: url("../icons/checked.svg") no-repeat var(--blue-6);
    }
    .theme-dark>* .checkbox:checked:hover:before{
        background: url("../icons/checked.svg") no-repeat var(--blue-5);
        border: 1px solid #0000;
    }
    /* End dark theme */
    /* End checkbox */

    /* Radio */
    .radio{
        position: absolute;
        z-index: -1;

        display: block;
        width: 0;
        height: 0;
    }
    .radio+label{
        display: block;
        cursor: pointer;
        padding-left: 24px;
        font-weight: 500;
        font-size: 13px;
        line-height: 16px;
        margin-top: 8px;
        margin-bottom: 8px;
    }
    .radio:before{
        content: "";
        display: inline-block;
        margin-right: 6px;

        border: 1px solid var(--gray-8);
        border-radius: 16px;

        position: absolute;
        left: 0;
        width: 16px;
        height: 16px;

        pointer-events: none;
    }
    .radio:focus:before{
        outline: 1px solid var(--blue-4);
    }
    .radio:hover:before{
        border: 1px solid var(--gray-6);
    }

    .radio:checked:before{
        background: url("../icons/radio.svg") no-repeat var(--blue-4);
        border: 1px solid #0000;
    }
    .radio:checked:hover:before{
        background: url("../icons/radio.svg") no-repeat var(--blue-3);
        border: 1px solid #0000;
    }

    /* Dark theme */
    .theme-dark>* .radio:before{
        border: 1px solid var(--gray-6);
    }
    .theme-dark>* .radio:focus:before{
        border: 1px solid var(--blue-6);
    }
    .theme-dark>* .radio:hover:before{
        border: 1px solid var(--gray-9);
    }
    .theme-dark>* .radio:checked:before{
        background: url("../icons/radio.svg") no-repeat var(--blue-6);
    }
    .theme-dark>* .radio:checked:hover:before{
        background: url("../icons/radio.svg") no-repeat var(--blue-5);
        border: 1px solid #0000;
    }
    /* End dark theme */
    /* End radio */

    /*  Circle background  */
    .circle-background{
        box-shadow: 0px 6px 20px 0px rgba(145, 145, 145, 0.47);
    }

    /* Dark theme */
    .theme-dark>* .circle-background{
        box-shadow: 0px 8px 40px 0px rgba(0, 0, 0, 0.30);
    }
    /* End dark theme */
    /*  End circle background  */

</style>
