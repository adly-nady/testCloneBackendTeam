<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('getname')}}" method="POST">
    @csrf
    <label>First Name</label>
    <input type="text" name="first_name"/>
    <label>Last Name</label>
    <input type="text" name="last_name"/>
    <label>Password</label>
    <input type="password" name="password"/>
    <label>Email</label>
    <input type="email" name="email"/>
    <label>phone</label>
    <input type="text" name="phone">
    <button>submit</button>

</form>
@isset($errors)
    @foreach ($errors->all() as $item)
        <h3>{{$item}}</h3>
    @endforeach
@endisset
</body>
</html>
