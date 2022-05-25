
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Liste des tentatives</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0-beta1/css/bootstrap.min.css" integrity="sha512-o/MhoRPVLExxZjCFVBsm17Pkztkzmh7Dp8k7/3JrtNCHh0AQ489kwpfA3dPSHzKDe8YCuEhxXq3Y71eb/o6amg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

<div class="container">

    <h1>Liste des tentatives</h1>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>String</td>
            <td>Char</td>
            <td>N occurence</td>
            <td>Date</td>
        </tr>
        </thead>
        <tbody>

        @if(!is_null($listTentatives) && count($listTentatives) > 0)
            @foreach($listTentatives as $tentative)
                <tr>
                    <td>{{$tentative->id}}</td>
                    <td>{{$tentative->string}}</td>
                    <td>{{$tentative->char}}</td>
                    <td>{{$tentative->max_occurenced}}</td>
                    <td>{{date('d/m/Y H:i:s', strtotime($tentative->created_at))}}</td>
                </tr>
            @endforeach
        @else

        @endif
        </tbody>
    </table>

    <div>
        {{$listTentatives->links()}}
    </div>

</div>

</body>
</html>







