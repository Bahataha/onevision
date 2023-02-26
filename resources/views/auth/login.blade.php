<!DOCTYPE html>
<html lang="">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {font-family: Arial, Helvetica, sans-serif;}
            form {border: 3px solid #f1f1f1;}

            input[type=email], input[type=password] {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }

            button {
                background-color: #04AA6D;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
            }

            button:hover {
                opacity: 0.8;
            }

            .cancelbtn {
                width: auto;
                padding: 10px 18px;
                background-color: #f44336;
            }

            .imgcontainer {
                text-align: center;
                margin: 24px 0 12px 0;
            }

            img.avatar {
                width: 40%;
                border-radius: 50%;
            }

            .container {
                padding: 16px;
                width: 410px;
                margin: 25px auto;
            }

            span.psw {
                float: right;
                padding-top: 16px;
            }

            .is-invalid{
                color: red;
            }
            .is-invalid-input{
                border: 1px solid red !important;
            }

            /* Change styles for span and cancel button on extra small screens */
            @media screen and (max-width: 300px) {
                span.psw {
                    display: block;
                    float: none;
                }
                .cancelbtn {
                    width: 100%;
                }
            }
        </style>
        <title>Login page</title>
    </head>
    <body>

        <h2>Login Form</h2>
        <form action="{{route('auth.login')}}" method="post">
            @csrf
            <div class="container">
                <label for="email" class="@error('email') is-invalid @enderror"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" id="email" name="email" class="@error('email') is-invalid @enderror" {{old('email')}} required>

                <label for="password" class="@error('password') is-invalid @enderror"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" id="password" class="@error('password') is-invalid-input @enderror" name="password" >
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="is-invalid">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button type="submit">Login</button>
                <a href="{{route('auth.register')}}">Register</a>
            </div>
        </form>
    </body>
</html>
