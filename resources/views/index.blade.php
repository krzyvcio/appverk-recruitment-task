<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>{{env('APP_NAME')}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/js/main.js'])

    <script>
  
    </script>
</head>

<body>
<noscript>
    <strong>We're sorry but this application doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
</noscript>

<div id="app"></div>

</body>

</html>
