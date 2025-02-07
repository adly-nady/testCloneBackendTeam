<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>exams page create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="padding: 10px">
    <form class="row g-3" action="{{ route('exam.store') }}" method="POST">
        @csrf
        <div class="col-4">
          <label for="staticEmail2" >title</label>
          <input type="text" class="form-control" name="title" id="staticEmail2" placeholder="Title">
        </div>
        <div class="col-4">
          <label for="inputdescription2" >description</label>
          <input type="description" class="form-control" name="description" id="inputdescription2" placeholder="description">
        </div>
        <div class="col-4">
          <label for="inputtime2" >time</label>
          <input type="time" class="form-control" name="time" id="inputtime2" placeholder="time">
        </div>
        <div class="col-4">
          <label for="inputPassword2" >status</label>
          <select class="form-select" name="status" aria-label="Default select example">
            <option selected disabled>Open this select menu</option>
            <option value="Done">Done</option>
            <option value="Error">Error</option>
          </select>
        </div>
        <div class="col-4">
          <label for="inputPassword2" >created by</label>
          {{-- <input type="password" class="form-control" id="inputPassword2" placeholder="Password"> --}}
          <input type="search" name="user_id" id="" list="users_list">
            <datalist id="users_list" name="users_list"> 
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </datalist>
        </div>
        <div class="col-4">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
      </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>