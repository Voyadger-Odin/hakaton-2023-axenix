@extends('layout.main')

<!-- Plugin css for this page -->
@section('plugin_css_for_this_page')
    <link rel="stylesheet" href="{{asset('assets/css/index.css')}}">
@endsection
<!-- End Plugin css for this page -->

@section('body')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-12 col-sm-6 grid-margin stretch-card">

                <h1>Система учёта склада</h1>
                <img src="{{asset('assets/img/img.png')}}">

            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-sm-6 grid-margin stretch-card">
                <div class="content-wrapper">
                    <h2>Технологии и инструменты</h2>
                </div>
            </div>
        </div>


        <?php
        $technologies = [
            [
                'name' => 'Docker',
                'img' => asset('assets/img/technologies/docker-logo.png'),
                'link' => 'https://www.docker.com/',
            ],
            [
                'name' => 'Docker compose',
                'img' => asset('assets/img/technologies/docker-compose.png'),
                'link' => 'https://docs.docker.com/compose/',
            ],
            [
                'name' => 'Laravel',
                'img' => asset('assets/img/technologies/Laravel-Logo.png'),
                'link' => 'https://laravel.com/',
            ],
            [
                'name' => 'Flask',
                'img' => asset('assets/img/technologies/flask-logo.png'),
                'link' => 'https://flask.palletsprojects.com/',
            ],
            [
                'name' => 'PhpStorm',
                'img' => asset('assets/img/technologies/PhpStorm-logo.png'),
                'link' => 'https://www.jetbrains.com/phpstorm/',
            ],
            [
                'name' => 'PyCharm',
                'img' => asset('assets/img/technologies/PyCharm-logo.png'),
                'link' => 'https://www.jetbrains.com/ru-ru/pycharm/',
            ],
            [
                'name' => 'Postman',
                'img' => asset('assets/img/technologies/postman-icon.png'),
                'link' => 'https://www.postman.com/',
            ],
            [
                'name' => 'MySQL',
                'img' => asset('assets/img/technologies/logo-mysql.png'),
                'link' => 'https://www.mysql.com/',
            ],
            [
                'name' => 'Bootstrap',
                'img' => asset('assets/img/technologies/bootstrap-logo.svg'),
                'link' => 'https://getbootstrap.com/',
            ],
            [
                'name' => 'JSON',
                'img' => asset('assets/img/technologies/JSON_vector_logo.png'),
                'link' => 'https://www.json.org/',
            ],
            [
                'name' => 'DOMPDF',
                'img' => asset('assets/img/technologies/github-mark.png'),
                'link' => 'https://github.com/barryvdh/laravel-dompdf',
            ],

        ];
        ?>


        <div class="row">
            @foreach($technologies as $technology)
                <div class="col-xl-2 ">
                    <div class="content-wrapper technologies-card">
                        <div class="card">
                            <a href="{{$technology['link']}}" target="_blank">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <img src="{{$technology['img']}}" class="logo-brand">
                                    </div>
                                    <br>
                                    <h6 class="text-muted font-weight-normal text-center text-brand">{{$technology['name']}}</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
