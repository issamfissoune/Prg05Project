<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css'])
</head>
<body>
@extends('layouts.app')
@section('content')
    <h1>
        Cards
    </h1>
    <div class="searchbar">
        <form method="get" action="">
            <input type="text", name="search", placeholder="search spell">
        </form>
    </div>

    <select name="spell_type" >
        <option value="">zoek category</option>

        @foreach($spells as $spell);
        <option value="">{{$spell->spell_type}}</option>
        @endforeach
    </select>

    <section id="card-gallery">
        {{--<table>--}}
        {{--    <thead>--}}
        {{--    <tr>--}}
        {{--        <th>name</th>--}}
        {{--        <th>types</th>--}}
        {{--        <th>Damage</th>--}}
        {{--        <th>Image</th>--}}



        {{--    </tr>--}}
        {{--    </thead>--}}
        {{--    <tfoot>--}}
        {{--    <tr>--}}
        {{--        <td colspan="8">Spells</td>--}}

        {{--    </tr>--}}
        {{--    </tfoot>--}}
        {{--    <tbody>--}}
        {{--    @foreach($spells as $spell)--}}
        {{--    <tr>--}}
        {{--        <td>{{$spell->spell_name}}</td>--}}
        {{--        <td>{{$spell->spell_type}}</td>--}}
        {{--        <td>{{$spell->damage}}</td>--}}
        {{--        <td><img src="{{asset('storage/file_path/'.$spell->file_path)}}" alt="" height="50", width="50"></td>--}}
        {{--        <td>--}}
        {{--            <form action="{{ route('spell.destroy',$spell->id) }}" method="POST">--}}

        {{--                <a class="btn btn-info" href="{{ route('spell.show',$spell->id) }}">Show</a>--}}

        {{--                <a class="btn btn-primary" href="{{ route('spell.edit',$spell->id) }}">Edit</a>--}}

        {{--                @csrf--}}
        {{--                @method('DELETE')--}}

        {{--                <button type="submit" class="btn btn-danger">Delete</button>--}}
        {{--            </form>--}}
        {{--        </td>--}}


        {{--    </tr>--}}
        {{--    </tbody>--}}
        {{--</table>--}}

        @foreach($spells as $spell)


            {{--<img src="resources/images/FinnSprite8.png" alt="">--}}
            {{--<a href="{{route('spell.create')}}"> create spell</a>--}}

            <div class="main-body">
                <div class="title">
                    <p>{{$spell->spell_name}}</p>
                </div>
                <div class="power">
                    <p>{{$spell->damage}}</p>
                </div>
                <div class="image">
                    <img src="{{asset('storage/file_path/'.$spell->file_path)}}" alt="" width="80" height="80">
                </div>
                <div class="detail">
                    <p>{{$spell->details}}</p>
                </div>
                @if( auth::user() && auth::user()->is_admin == 1)
                    {{--@while(auth::user() && auth::user()->is_admin == 1 && auth::user()->id == $spell->user_id);--}}

                    <div>
                        <form action="{{ route('spell.destroy',$spell->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('spell.show',$spell->id) }}">Show</a>

                            <a class="btn btn-primary" href="{{ route('spell.edit',$spell->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                @endif
                {{--    @endwhile--}}
            </div>

        @endforeach



    </section>
    <a href="{{route('spell.create')}}"> create spell</a>
</body>

</html>
@endsection
