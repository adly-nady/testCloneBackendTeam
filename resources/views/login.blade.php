<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <style>
        .divBody{
            width: 100%;
            height: 100%;
            position: absolute;
            left:0%;
            top: 0%;
            display: grid;
            place-items: center;
            /* background: red; */
        }
        .formDiv{
            width: 400px;
            height: 250px;
            border: 2px solid black;
            border-radius: 10px
        }
        .divButton{
            width: 100%;
            height: 100px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="divBody">
       
        <div class="formDiv">
            
            <form action="{{ route('login') }}" method="POST" style="padding: 10px">
                @csrf
                <h1 style="text-align: center">login page</h1>
                <label for="email">Enter your email</label>
                <input type="email" name="email" id="email">
                @error('email')
                    <div style="color:red"> this email is required </div>
                @enderror
                <br><br>
                <label for="password">Enter your password</label>
                <input type="password" name="password" id="password">
                @error('password')
                    <div style="color:red"> this password is required </div>
                @enderror
                <br><br>
                <div class="divButton">
                    <button style="padding: 10px;width: 100px;border: 1px solid black;border-radius: 10px" type="submit">make Login</button>
                </div>
                @error('login')
                <div style="color:red"> {{ $message }} </div>
                @enderror
                {{-- @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li style="color:red">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif --}}
            </form>
            
        </div>
    </div>
</body>
</html>