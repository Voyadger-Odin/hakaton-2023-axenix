<?php
$SERVER_IP = '192.168.0.1'
?>

@extends('layout.main')

@section('body')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <h5>Погрузчики</h5>
                <br>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Номер</th>
                        <th>Статус</th>
                        <th>Заказ</th>
                    </tr>
                    </thead>
                    <tbody id="tableForkliftersBody">
                    <tr>
                        <td>123</td>
                        <td>Ожидаю заказ</td>
                        <td>X4</td>
                    </tr>
                    <tr>
                        <td>324</td>
                        <td>Еду за заказом</td>
                        <td>X2</td>
                    </tr>
                    <tr>
                        <td>642</td>
                        <td>Возвращаюсь с заказом</td>
                        <td>X6</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            @if($forklift_id)
                <div class="col-xl-9 col-sm-6 grid-margin stretch-card">
                    <h5>Погрузчик {{$forklift_id}}</h5>
                    <br>

                    <form>
                        <label for="date-from" class="tb m-2">Дата с:</label>
                        <input name="date-from" class="input m-2" type="date" id="date-from" value="{{(isset($_GET['date-from'])? $_GET['date-from'] : '')}}">

                        <label for="date-to" class="tb m-2">Дата по:</label>
                        <input name="date-to" class="input m-2" type="date" id="date-to" value="{{(isset($_GET['date-to'])? $_GET['date-to'] : '')}}">

                        <input type="submit" class="btn btn-primary m-2" value="Показать аналитику">
                    </form>

                    @if(isset($_GET['date-from']) and isset($_GET['date-to']))
                        <?php
                            $url = 'http://' . $SERVER_IP . ':8100:8100/api/analytics/' . $forklift_id . '?date-from=' . $_GET['date-from'] . '&date-to=' . $_GET['date-to'];
                            $forklifter_analytic = json_decode(file_get_contents($url));
                        ?>
                        <table class="table table-hover table-cell-padding-larg">
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

                        <br>

                        <a href="{{route('analytics_pdf', $forklift_id)}}?date-from={{$_GET['date-from']}}&date-to={{$_GET['date-to']}}" target="_blank" class="btn btn-dark">Открыть в PDF</a>
                    @endif
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let analytics_url = '{{route('analytics')}}';

        @if($forklift_id)
        let forklift_id = {{$forklift_id}};
        @endif
    </script>
    <script src="{{asset('assets/vendor/http/http.js')}}"></script>
    <script src="{{asset('assets/js/analytics/analytics.js')}}"></script>
@endsection
