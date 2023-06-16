<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <title>Document</title>
</head>
<body>
    <h1>Google Recaptcha</h1>
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Errors!</strong><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    <form action="{{url('users/store')}}" method="POST">
        @csrf
        <div class="mb-3">
           Name: <input type="text" name="name">
        </div>
        <div class="mb-3">
           Email: <input type="text" name="email">
        </div>
        <div class="mb-3">
           Password: <input type="text" name="password">
        </div>
        <div class="mb-3">
           <strong>Google Recaptcha</strong>
           {!! NoCaptcha::renderJs() !!}
           {!! NoCaptcha::display() !!}
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>

    </form>
</div>
    
</body>
</html>