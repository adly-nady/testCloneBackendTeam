<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>exams page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="padding: 10px">
    <br>
    <a href="{{ route('home') }}"> goto Back </a>
    <br>
    <a href="{{ route('logout') }}"> Logout ({{ auth()->user()->name }}) </a>
    <form action="{{ route('exam.create') }}" method="get">
        <button type="submit" class="btn btn-primary">Create Exam</button>
    </form>
    <br><br>
    @if(session('status') == 'delete')
        <div class="alert alert-success" role="alert">
            Exam Deleted successfully ✨
        </div>
    @elseif (session('status') == 'create')
        <div class="alert alert-success" role="alert">
            Exam Created successfully ✨
        </div>
    @else
        <div class="alert alert-success" role="alert">
            Exam Updated successfully ✨
        </div>
    @endif

    <div class="divForm">
        <form action="{{ route('Search.Title') }}" method="post">
            @csrf
            <input type="text" name="title">
            <button type="submit" class="btn btn-primary">search</button>
        </form>
    </div>
    
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>title</th>
                <th>description</th>
                <th>time</th>
                <th>status</th>
                <th>created by</th>
                <th>controlle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( session('data') ??  $data as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->time }}</td>
                    <td>
                        {{-- @if ($item->status == "Done")
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="green" class="bi bi-check-square" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                            <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
                          </svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="red" class="bi bi-file-excel" viewBox="0 0 16 16">
                            <path d="M5.18 4.616a.5.5 0 0 1 .704.064L8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 0 1 .064-.704"/>
                            <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1"/>
                          </svg>
                        @endif --}}

                        {{-- {!! "<h1>adly</h1>" !!}
                        {{ "<h1>adly</h1>" }} --}}

                        {!! $item->status == "Done" ? '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="green" class="bi bi-check-square" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                            <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
                          </svg>' : '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="red" class="bi bi-file-excel" viewBox="0 0 16 16">
                            <path d="M5.18 4.616a.5.5 0 0 1 .704.064L8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 0 1 .064-.704"/>
                            <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1"/>
                          </svg>' !!}
                    </td>
                    <td>{{ $item->user_name }}</td>
                    <td>
                        <div class="row">
                            <div class="col col-4">
                                <form action="{{ route('exam.destroy',$item->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                            <div class="col col-4">
                                {{-- <form action="{{ route('testGetParam',$item->title) }}" method="get">
                                    <button type="submit" class="btn btn-success">Edit</button>
                                </form> --}}
                                <form action="{{ route('exam.edit',$item->id) }}" method="get">
                                    <button type="submit" class="btn btn-success">Edit</button>
                                </form>
                            </div>
                        </div>
                    </td>
                    {{-- <td>{{ App\Models\User::find($item->user_id)->name }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>