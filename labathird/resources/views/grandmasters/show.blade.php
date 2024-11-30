<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Информация о гроссмейстере</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="bg-primary">
    <header>
        <nav class="navbar navbar-expand-lg bg-success">
            <div class="container-fluid">
                <div class="navbar-brand">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/1518_van_Leyden_Die_Schachpartie_anagoria.JPG/525px-1518_van_Leyden_Die_Schachpartie_anagoria.JPG" 
                         alt="Логотип сайта" 
                         class="rounded-circle d-inline-block align-text-center" 
                         width="95" height="95" 
                         style="object-fit: cover">
                    <span class="h2 text-secondary">Сайт про гроссмейстеров</span>
                </div>
                <a href="{{ route('grandmasters.index') }}" class="btn btn-secondary mb-3">Вернуться на главную</a>
            </div>  
        </nav>
    </header>
    
    <div class="container mt-5">
        <div class="card mx-auto text-center border border-3 border-secondary rounded shadow" style="max-width: 500px;">
            <div class="card-header bg-success text-white">
                <h2>{{ $grandmaster->name }}</h2>
            </div>
            <div class="card-body">
                <!-- Фото -->
                @if ($grandmaster->image_path)
                    <img src="{{ asset($grandmaster->image_path) }}" 
                         alt="{{ $grandmaster->name }}" 
                         class="img-thumbnail mb-4" 
                         style="width: 200px; height: 200px; object-fit: cover;">
                @else
                    <p>Фото отсутствует</p>
                @endif

                <!-- Страна -->
                <p><strong>Страна:</strong> {{ $grandmaster->country }}</p>

                <!-- Дата рождения -->
                <p><strong>Дата рождения:</strong> {{ \Carbon\Carbon::parse($grandmaster->birth_date)->format('d.m.Y') }}</p>

                <!-- Рейтинг -->
                <p><strong>Максимальный рейтинг:</strong> {{ $grandmaster->max_rating }}</p>

                <!-- Описание -->
                <p><strong>Описание:</strong> {{ $grandmaster->info }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('grandmasters.edit', $grandmaster->id) }}" class="btn btn-primary">Редактировать</a>
                <form action="{{ route('grandmasters.destroy', $grandmaster->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить этого гроссмейстера?')">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
