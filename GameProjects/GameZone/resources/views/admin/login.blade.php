
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход администратора — GameZone</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="admin-container">
    <div class="admin-heading">
        <div>
            <div class="eyebrow">GAMEZONE</div>
            <h1>Вход администратора</h1>
            <p>Войдите, чтобы управлять каталогом игр.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="error-message">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('admin.login') }}" method="POST" class="admin-form">
        @csrf

        <label for="email">Электронная почта</label>
        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="admin@example.com"
            required
        >

        <label for="password">Пароль</label>
        <input
            type="password"
            id="password"
            name="password"
            placeholder="Введите пароль"
            required
        >

        <button type="submit" class="admin-button">
            Войти
        </button>
    </form>

    <p style="margin-top: 20px;">
        <a href="/">← Вернуться на сайт</a>
    </p>
</div>

</body>
</html>
