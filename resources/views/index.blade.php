<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Lucky number!</title>
</head>
<body>
<h1>
    Try to guess is that a lucky ticket!
</h1>
Является ли это счастливым билетом?
<div> {{$number}} </div>

<form action="/checkAnswer" method="post">
    @method("POST")
    @csrf
    <input type="hidden" value="{{$number}}" name="luckyTicket">
    <button type="submit" value="1" name="answer"> True </button>
    <button type="submit" value="0" name="answer"> False</button>
</form>
@if((isset($result)))
    @if($result === true)
        <div> Вы угадали!</div>
    @else
        <div> Вы не угадали!</div>
    @endif
@endif
</body>
</html>
