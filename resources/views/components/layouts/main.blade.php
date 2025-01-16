<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mystic Astra</title>
  @vite(['resources/css/app.css'])
</head>

<body>
  <x-includes.navbar />
  <main>
    {{$slot}}
  </main>
  <x-includes.footer />
</body>

</html>