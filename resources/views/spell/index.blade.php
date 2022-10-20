{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Document</title>--}}
{{--    @vite(['resources/css/app.css'])--}}
{{--</head>--}}


<body>
<h1>
Cards
</h1>

<table>
    <thead>
    <tr>
        <th>name</th>
        <th>types</th>
        <th>Damage</th>
        <th>Image</th>



    </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="8">Spells</td>

    </tr>
    </tfoot>
    <tbody>
    @foreach($spells as $spell)
    <tr>
        <td>{{$spell->spell_name}}</td>
        <td>{{$spell->spell_type}}</td>
        <td>{{$spell->damage}}</td>
        <td><img src="{{asset('storage/file_path/'.$spell->file_path)}}" alt="" height="50", width="50"></td>
        <td>
            <form action="{{ route('spell.destroy',$spell->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('spell.show',$spell->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('spell.edit',$spell->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>

        @endforeach
    </tr>
    </tbody>
</table>

<img src="resources/images/FinnSprite8.png" alt="">
<a href="{{route('spell.create')}}"> create spell</a>

</body>
</html>
