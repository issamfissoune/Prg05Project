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
<form action="{{ route('spell.update', [$spell->id]) }}" method="post"  enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div>
            <label for="spell_name" class="form-label"></label>
            <input id="spell_name"
                   type="text"
                   name="spell_name"
                   value="{{$spell->spell_name}}" />
            @error('spell_name')
            <span>{{$message}}</span>
            @enderror
        </div>

    <div>
            <label for="spell_type" class="form-label"></label>
            <input id="spell_type"
                   type="text"
                   name="spell_type"
                   value="{{$spell->spell_type}}" />
            @error('spell_type')
            <span>{{$message}}</span>
            @enderror
        </div>

    <div>
        <label for="damage" class="form-label">Damage</label>
        <input id="damage"
               type="number"
               name="damage"
               value="{{$spell->damage}}" />
        @error('damage')
        <span>{{$message}}</span>
        @enderror
    </div>

    <div>
        <label for="details" class="form-label">Details</label>
        <input id="details"
               type="text"
               name="details"
               value="{{$spell->details}}" />
        @error('details')
        <span>{{$message}}</span>
        @enderror
    </div>

    <div>
        <label for="file_path" class="form-label"></label>
        <input id="file_path"
               type="file"
               name="file_path"
               value="{{$spell->file_path}}" required />
        @error('file_path')
        <span>{{$message}}</span>
        @enderror
    </div>
    <button type="submit" name="submit" class="submit">Edit spell</button>

    <a href="{{route('spell.index')}}">Home</a>
</form>
</body>
</html>
