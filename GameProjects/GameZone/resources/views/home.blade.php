
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameZone — Каталог игр</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header class="header">
    <a href="/" class="logo">GAME<span>ZONE</span></a>

    <nav class="navigation">
        <a href="/" class="active">Главная</a>
        <a href="#catalog">Каталог игр</a>
        <a href="#about">О проекте</a>
    </nav>

    <div class="header-label">GAME PORTAL</div>
</header>

<main>
    <section class="hero">
        <div class="hero-content">
            <div class="eyebrow">ТВОЙ ИГРОВОЙ МИР</div>

            <h1>Открой для себя<br><span>мир игр</span></h1>

            <p>
                Исследуй каталог популярных игр, находи новые приключения
                и выбирай, во что сыграть сегодня.
            </p>

            <a href="#catalog" class="main-button">Смотреть каталог →</a>
        </div>

        <div class="hero-decoration">
            <div class="hero-circle">🎮</div>
            <div class="hero-small-text">PLAY YOUR WAY</div>
        </div>
    </section>

    <section class="catalog" id="catalog">
        <div class="section-heading">
            <div>
                <div class="eyebrow">ВЫБИРАЙ СВОЁ ПРИКЛЮЧЕНИЕ</div>
                <h2>Каталог игр</h2>
            </div>

            <div class="games-count">
                Игр в каталоге: {{ count($games) }}
            </div>
        </div>

        <div class="catalog-controls">
            <input
                type="text"
                id="gameSearch"
                placeholder="Поиск игры..."
            >

            <div class="filters">
                <button class="filter active" data-genre="all">Все</button>
                <button class="filter" data-genre="RPG">RPG</button>
                <button class="filter" data-genre="Шутер">Шутеры</button>
                <button class="filter" data-genre="Гонки">Гонки</button>
                <button class="filter" data-genre="Песочница">Песочницы</button>
                <button class="filter" data-genre="Экшен">Экшен</button>
            </div>
        </div>

        <div class="games-grid" id="gamesGrid">
            @foreach ($games as $game)
                <article
                    class="game-card"
                    data-title="{{ mb_strtolower($game['title']) }}"
                    data-genre="{{ $game['genre'] }}"
                >
                    <div class="game-cover {{ $game['color'] }}">
                        <span class="game-emoji">{{ $game['emoji'] }}</span>
                        <span class="game-year">{{ $game['year'] }}</span>
                    </div>

                    <div class="game-info">
                        <span class="game-genre">{{ $game['genre'] }}</span>

                        <h3>{{ $game['title'] }}</h3>

                        <p>{{ $game['description'] }}</p>

                        <a href="{{ route('games.show', $game['slug']) }}" class="details-link">
                            Подробнее <span>→</span>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        <p class="empty-message" id="emptyMessage" hidden>
            Игры не найдены. Попробуй изменить запрос.
        </p>
    </section>

    <section class="about" id="about">
        <h2>Добро пожаловать в GameZone</h2>
        <p>
            GameZone — каталог, в котором можно знакомиться с играми
            разных жанров и находить новые идеи для приключений.
        </p>
    </section>
</main>

<footer class="footer">
    <a href="/" class="logo">GAME<span>ZONE</span></a>
    <p>© {{ date('Y') }} GameZone. Учебный проект.</p>
</footer>

<script>
    const searchInput = document.getElementById('gameSearch');
    const filterButtons = document.querySelectorAll('.filter');
    const gameCards = document.querySelectorAll('.game-card');
    const emptyMessage = document.getElementById('emptyMessage');

    let selectedGenre = 'all';

    function filterGames() {
        const query = searchInput.value.toLowerCase().trim();
        let visibleCount = 0;

        gameCards.forEach(card => {
            const title = card.dataset.title;
            const genre = card.dataset.genre;

            const matchesSearch = title.includes(query);
            const matchesGenre =
                selectedGenre === 'all' || genre === selectedGenre;

            const visible = matchesSearch && matchesGenre;

            card.hidden = !visible;

            if (visible) {
                visibleCount++;
            }
        });

        emptyMessage.hidden = visibleCount !== 0;
    }

    searchInput.addEventListener('input', filterGames);

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            filterButtons.forEach(item => item.classList.remove('active'));

            button.classList.add('active');
            selectedGenre = button.dataset.genre;

            filterGames();
        });
    });
</script>

</body>
</html>
