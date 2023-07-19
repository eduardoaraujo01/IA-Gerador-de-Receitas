<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Muksai</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<header>
    <h1>Muskai -🤖</h1>
    <nav>
        <a href="/">Home</a>
        <a href="/ingredientes">Ingredientes</a>
        <a href="/bonus">Bônus</a>
    </nav>
</header>
<main>
    <h2>Selecione no menu acima o sistema para acessar</h2>

    @if(!empty($receita))
        {!! preg_replace("/\r\n|\n/", '<br>', $receita) !!}
    @endif
</main>
<footer>
    Eduardo Araujo - 2023
</footer>
</body>
</html>
