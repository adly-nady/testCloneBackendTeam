<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>  
    <h1> Welcome Eng/{{ auth()->user()->name }} </h1>
    <h1> you are authantication </h1>
    <a href="{{ route('exam.index') }}"> Exams Department </a>
    {{-- <form action="{{ route('exam.index') }}" method="get">
        <button type="submit"> Exams Department </button>
    </form>
    <a href="/exam"> Exams Department </a> --}}
    
</body>
</html>