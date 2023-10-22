@extends('layout.main')

@section('body')
    <?php
        $url = 'http://' . GetServerIp() . ':8100/api/warehouses';
        $warehouses = json_decode(file_get_contents($url));
    ?>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-9 col-sm-6 grid-margin stretch-card">
                <h5>Склад</h5>
                <br>
                <div style="width: 100%; height: 80vh" id="stock_canvas_parent">
                    <ul class="tabs">
                        @foreach($warehouses as $warehouse)
                            <li
                                @if($warehouse->warehouse == $stock_id)
                                    class="tab-selected"
                                @endif
                                onclick="openStock('{{route('stock', $warehouse->warehouse)}}')"
                            >
                                Склад {{$warehouse->warehouse}}
                            </li>
                        @endforeach
                    </ul>
                    <canvas id="stock_canvas"></canvas>
                </div>
            </div>
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
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        let stock_id = {{$stock_id}}
    </script>
    <script src="{{asset('assets/vendor/canvas/canvas.js')}}"></script>
    <script src="{{asset('assets/vendor/http/http.js')}}"></script>
    <script src="{{asset('assets/js/stock/items.js')}}"></script>
    <script src="{{asset('assets/js/stock/stock.js')}}"></script>
@endsection
