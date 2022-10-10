<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>


        <br>


</h1>

<table>
    <thead>
    <tr>
        <th>name</th>
        <th>types</th>


    </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="6">Spells</td>

    </tr>
    </tfoot>
    <tbody>
    @foreach($spells as $spell)
    <tr>
        <td>{{$spell->spell_name}}</td>
        <td>{{$spell->spell_type}}</td>
        @endforeach
    </tr>
    </tbody>
</table>

<a href="{{route('spell.create')}}"> create spell</a>
</body>
</html>
