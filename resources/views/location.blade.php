<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref">

            <div class="content">
                <div class="title m-b-md">
                    Where-ISS
                </div>

                <div class="">
                    <div class="table-responsive">
                        <table border="1" width="100%" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Timestamp</th>
                                    <th>Information</th>
                                    <th>Weather</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($res as $key => $result)
                                    <tr>
                                        <td>
                                            {{ date("m/d/Y h:i:s A T",$result['timestamp']) }} <br>
                                            {{ $result['timestamp'] }}
                                        </td>
                                        <td>
                                            Latitude : {{ $result['latitude'] }} <br>
                                            Longitude : {{ $result['longitude'] }} <br>
                                            Altitude : {{ $result['altitude'] }} <br>
                                        </td>
                                        <td>
                                            @if($result['weather'])
                                                Location : {{ $result['weather']['location']['name'] }} <br>
                                                Sunrise : {{ $result['weather']['datetime']['formatted_sunrise'] }} <br>
                                                Sunset : {{ $result['weather']['datetime']['formatted_sunset'] }} <br>
                                                Condition : {{ $result['weather']['condition']['name'] }}
                                            @else
                                                No information ...
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
