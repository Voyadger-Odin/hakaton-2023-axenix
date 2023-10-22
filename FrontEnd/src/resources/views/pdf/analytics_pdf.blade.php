<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sample</title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/Contest.ico')}}">

    <!-- Style -->
    @include('pdf.styles.jetbrains')
    @include('pdf.styles.jetbrains-components')
    @include('pdf.styles.bootstrap-grid')

    <!-- End style -->
</head>
<body>

<div class="page">

    <!-- Header -->
    <header class="d-flex flex-wrap justify-content-md-between mb-4 px-4 border-bottom" style="background: #ccc">
        <!-- Gradient -->
        <b style="font-size: 13pt">Твой Кролик Написал</b>
    </header>
    <!-- End header -->

    <!-- Body -->
    <div class="main-panel align-items-center">
        <div class="content-wrapper">
            <center>
                <img src="https://sun2-20.userapi.com/impg/PftSlBjuJAaaZwdaXlw2O15mAf4W6gpj0mRqJA/yatbC7-0oKY.jpg?size=626x348&quality=96&sign=8b7ca5cecd8b758633162b093c776fed&type=album">
            </center>
            <div class="row">

                @if($forklift_id)
                    <div class="col-xl-12 col-sm-6 grid-margin stretch-card">
                        <b style="font-size: 15pt">Погрузчик {{$forklift_id}}</b>
                        <br>

                        <b>От: {{(isset($_GET['date-from'])? $_GET['date-from'] : '')}}</b>
                        <br>
                        <b>До: {{(isset($_GET['date-to'])? $_GET['date-to'] : '')}}</b>

                        @if(isset($_GET['date-from']) and isset($_GET['date-to']))
                                <?php
                                $url = 'http://192.168.77.104:8100:8100/api/analytics/' . $forklift_id . '?date-from=' . $_GET['date-from'] . '&date-to=' . $_GET['date-to'];
                                $forklifter_analytic = json_decode(file_get_contents($url));
                                ?>
                            <table class="table table-cell-padding-larg">
                                <thead>
                                <tr>
                                    <th>Поле</th>
                                    <th>Значение</th>
                                </tr>
                                </thead>
                                <tbody id="tableForkliftersBody">
                                <tr>
                                    <td>Номер погрузчика</td>
                                    <td>{{$forklift_id}}</td>
                                </tr>
                                <tr>
                                    <td>Пройденное расстояние</td>
                                    <td>{{$forklifter_analytic->length}} м</td>
                                </tr>
                                <tr>
                                    <td>Количество выполненных заказов</td>
                                    <td>{{$forklifter_analytic->tasks_count}}</td>
                                </tr>
                                <tr>
                                    <td>Время проведённое в движении</td>
                                    <td>{{$forklifter_analytic->time_work}} мин</td>
                                </tr>
                                <tr>
                                    <td>Время простоя</td>
                                    <td>{{$forklifter_analytic->time_wait}}</td>
                                </tr>
                                <tr>
                                    <td>Время движения за заказом</td>
                                    <td>{{$forklifter_analytic->time_run_to_order}}</td>
                                </tr>
                                <tr>
                                    <td>Время возвращения с заказом</td>
                                    <td>{{$forklifter_analytic->time_back_with_order}}</td>
                                </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- End body -->
</div>
</body>
</html>
