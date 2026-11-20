
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $game['title'] }} — GameZone</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header class="header">
    <a href="/" class="logo">GAME<span>ZONE</span></a>

    <nav class="navigation">
        <a href="/">Главная</a>
        <a href="/#catalog">Каталог игр</a>
        <a href="/#about">О проекте</a>
    </nav>

    <div class="header-label">GAME PORTAL</div>
</header>

<main class="game-page">
    <a href="/#catalog" class="back-link">← Вернуться в каталог</a>

    <div class="game-detail-cover {{ $game['color'] }}">
        <span>{{ $game['emoji'] }}</span>
    </div>

    <div class="game-detail-info">
        <div class="eyebrow">ИНФОРМАЦИЯ ОБ ИГРЕ</div>

        <h1>{{ $game['title'] }}</h1>

        <div class="game-meta">
            <span>{{ $game['genre'] }}</span>
            <span>{{ $game['year'] }} год</span>
        </div>

        <h2>Об игре</h2>

        <p>{{ $game['details'] }}</p>

        <a href="/#catalog" class="main-button">
            Вернуться к играм
        </a>
    </div>
</main>

<footer class="footer">
    <a href="/" class="logo">GAME<span>ZONE</span></a>
    <p>© {{ date('Y') }} GameZone. Учебный проект.</p>
</footer>

</body>
</html>
