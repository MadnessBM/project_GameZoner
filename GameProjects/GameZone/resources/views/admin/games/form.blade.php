
<form action="{{ $action }}" method="POST" class="admin-form">
    @csrf

    @if ($method === 'PUT')
        @method('PUT')
    @endif

    <label>Название игры</label>
    <input type="text" name="title"
        value="{{ old('title', $game?->title) }}" required>

    <label>Адрес страницы (slug)</label>
    <input type="text" name="slug"
        value="{{ old('slug', $game?->slug) }}" required>
    <small>Например: my-new-game</small>

    <label>Жанр</label>
    <input type="text" name="genre"
        value="{{ old('genre', $game?->genre) }}" required>

    <label>Краткое описание</label>
    <textarea name="description" required>{{ old('description', $game?->description) }}</textarea>

    <label>Полное описание</label>
    <textarea name="details" required>{{ old('details', $game?->details) }}</textarea>

    <label>Эмодзи</label>
    <input type="text" name="emoji"
        value="{{ old('emoji', $game?->emoji) }}" placeholder="🎮">

    <label>Цвет карточки</label>
    <select name="color" required>
        @foreach (['purple', 'green', 'orange', 'blue', 'pink', 'red'] as $color)
            <option value="{{ $color }}"
                @selected(old('color', $game?->color ?? 'purple') === $color)>
                {{ $color }}
            </option>
        @endforeach
    </select>

    <label>Год выпуска</label>
    <input type="number" name="year"
        value="{{ old('year', $game?->year) }}"
        min="1950" max="2100">

    @if ($errors->any())
        <div class="error-message">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <button type="submit" class="main-button">
        {{ $buttonText }}
    </button>

    <a href="{{ route('admin.games.index') }}" class="cancel-link">
        Отмена
    </a>
</form>
