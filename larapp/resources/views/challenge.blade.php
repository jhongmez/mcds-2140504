<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <table class="table table-striped table-bordered table-dark">
                    @foreach ($rs as $data)
                        <tr>
                            <td> {{ $data }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</body>
</html>