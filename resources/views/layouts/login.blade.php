<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('/images/bg-login.jpg');
            background-size: cover; 
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background: white;
            padding: 30px;
            width: 350px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-box label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .login-box input {
            width: 93%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-box button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-box button:hover {
            background: #0056b3;
        }

        .login-box p {
            text-align: center;
            margin-top: 15px;
        }
        
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login</h2>
    @if($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('postLogin') }}" method="POST">
        @csrf
        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
