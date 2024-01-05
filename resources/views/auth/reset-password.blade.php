{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ForgotPassword</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<style>
    body {
        background: #d3d3d3;

    }

    .main {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .form {
        background: #fff;
        padding: 50px 30px;
        width: 500px;

    }
</style>

<body>
    <div class="main">
        <div class="form">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->has('status'))
                <div class="alert alert-success">
                    {{ session()->get('status') }}
                </div>
            @endif

            {{-- <h2>Forgot Your Password</h2>
            <p>please enter your email to password reset request</p> --}}
            {{-- <form action="{{ route('password.update') }}" method="post">
                @csrf
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
                <label for="password_confirmation" class="form-label">Password</label>
                <input type="password_confirmation" class="form-control" name="password_confirmation">
                <input type="submit" value="Update Password" class="btn btn-primary w-100 mt-3">
            </form>
        </div>
    </div>
</body>

</html>  --}}
