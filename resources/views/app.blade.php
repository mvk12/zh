<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="google" content="notranslate">
  <meta
    name="description"
    content="ZH Test - Noktos"
  />
  <title>{{ config('app.env') == 'production' ? '' : '('.Str::upper(config('app.env')).')' }} {{ config('app.name') }}</title>

  <link rel="icon" href="favicon.ico" />
  <link rel="stylesheet" href="{{ asset('/css/app.css') }}" />
</head>
<body>
  <div id="app"></div>

  <script async defer src="{{ asset('/js/manifest.js') }}"></script>
  <script src="{{ asset('/js/vendor.js') }}"></script>
  <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>