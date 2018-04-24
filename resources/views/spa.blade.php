<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta id="csrf-token" name="csrf-token" value="{{ csrf_token() }}">
    <title>BlockTrain</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="/css/bootstrap.css" rel="stylesheet" />
    <link href="/css/fontawesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->


</head>
<body>

<div id="app">

    <app></app>
</div>

<script src="{{ mix('js/app.js') }}"></script>
<script src="/js/jquery-1.11.1.js"></script>

<script src="/js/bootstrap.js"></script>

</body>
</html>
