
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать игру — GameZone</title>
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
    <div class="eyebrow">ИЗМЕНЕНИЕ ЗАПИСИ</div>
    <h1>Редактировать: {{ $game->title }}</h1>

    @include('admin.games.form', [
        'game' => $game,
        'action' => route('admin.games.update', $game),
        'method' => 'PUT',
        'buttonText' => 'Сохранить изменения'
    ])
</main>

</body>
</html>
