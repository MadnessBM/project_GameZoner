
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить игру — GameZone</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header class="header">
    <a href="/" class="logo">GAME<span>ZONE</span></a>
    <nav class="navigation">
        <a href="{{ route('admin.games.index') }}">Назад к каталогу</a>
    </nav>
</header>

<main class="admin-container">
    <div class="eyebrow">НОВАЯ ЗАПИСЬ</div>
    <h1>Добавить игру</h1>

    @include('admin.games.form', [
        'game' => null,
        'action' => route('admin.games.store'),
        'method' => 'POST',
        'buttonText' => 'Добавить игру'
    ])
</main>

</body>
</html>
