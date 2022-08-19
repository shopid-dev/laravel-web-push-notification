<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach($pushes as $push)
    <form method="post" action="/admin/sendpush/{{$push->id}}" target="_blank">
        push {{$push->id}}    
        <input name="text" type="text" placeholder="text">
        <input name="url" type="text" placeholder="https://">
        <input type="submit" value="send"/>
        {{ csrf_field() }}
    </form>
    @endforeach
</body>
</html>