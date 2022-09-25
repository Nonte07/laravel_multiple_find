<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="update" method="post">
        @csrf
 <input type="email" name="email" value="{{ $user->email }}">
 <input type="text" name="pass" value="{{ $user->password }}">
 <input type="hidden" name="id" value="{{ $user->id }}">

 <input type="submit" name="" id="">

    </form>
</body>
</html>