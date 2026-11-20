
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление играми — GameZone</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header class="header">
    <a href="/" class="logo">GAME<span>ZONE</span></a>
    <nav class="navigation">
        <a href="/">На сайт</a>
        <a href="{{ route('admin.games.index') }}" class="active">Админ-панель</a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-button">
                Выйти
            </button>
        </form>
    </nav>
</header>

<main class="admin-container">
    <div class="admin-heading">
        <div>
            <div class="eyebrow">УПРАВЛЕНИЕ САЙТОМ</div>
            <h1>Каталог игр</h1>
        </div>

        <a href="{{ route('admin.games.create') }}" class="main-button">
            + Добавить игру
        </a>
    </div>

    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Игра</th>
                    <th>Жанр</th>
                    <th>Год</th>
                    <th>Действия</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($games as $game)
                    <tr>
                        <td>{{ $game->id }}</td>
                        <td>{{ $game->emoji }} {{ $game->title }}</td>
                        <td>{{ $game->genre }}</td>
                        <td>{{ $game->year ?? '—' }}</td>
                        <td class="admin-actions">
                            <a href="{{ route('admin.games.edit', $game) }}">
                                Изменить
                            </a>

                            <form
                                action="{{ route('admin.games.destroy', $game) }}"
                                method="POST"
                                onsubmit="return confirm('Удалить эту игру?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="delete-button">
                                    Удалить
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Игры пока не добавлены.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>

</body>
</html>
