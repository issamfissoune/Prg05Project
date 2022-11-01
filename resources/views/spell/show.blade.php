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
        {{$spell->spell_name}}
    </h1>
    <form action="{{ route('toggleActivity', $spell->id)}}" method="post" style="margin-left: 10px">
        @method('PATCH')
        @csrf
        @if($spell->actvity)
            <button class="btn btn-light" type="submit">Remove from public</button>
        @else
            <button class="btn btn-dark" type="submit">Show on public</button>
        @endif

    </form>
{{--    <input type="checkbox" class="toggle-class" data-toggle="toggle"--}}
{{--           data-id="{{$spell->id}}" data-on="Enabled" data-off="Disabled"--}}
{{--        {{$spell->status  ? 'checked' : ''}}>--}}

{{--    @push('scripts')--}}
{{--    <script>--}}
{{--        $(function () {--}}
{{--            $('#toggle-two').bootstrapToggle({--}}
{{--                on: 'Enabled',--}}
{{--                off: 'Disabled'--}}
{{--            });--}}
{{--        })--}}
{{--    </script>--}}

{{--    <script>--}}
{{--        $('.toggle-class').on('change', function () {--}}
{{--            let status = $(this).prop('checked') == true ? 1 : 0;--}}
{{--            // alert(status);--}}
{{--            let token= document.querySelector('meta[name="csrf-token"]').content;--}}
{{--            let spell_id = $(this).data('id');--}}
{{--            alert(spell_id);--}}
{{--            $.ajax({--}}
{{--                type: 'POST',--}}
{{--                datatype: 'JSON',--}}
{{--                url: '{{route('toggleActivity')}}',--}}
{{--                data: {--}}
{{--                    'token': token,--}}
{{--                    'status': status,--}}
{{--                    'spell_id': spell_id--}}
{{--                },--}}
{{--                success: function (data) {--}}
{{--                }--}}
{{--            })--}}
{{--        })--}}
{{--    </script>--}}
{{--    @endpush--}}
</body>
@endsection
