<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать гроссмейстера</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="bg-primary">
    <header>
            <nav class="navbar navbar-expand-lg bg-success">
                <div class="container-fluid">
                  <div class="navbar-brand">
                      <img src="/storage/1518_van_Leyden_Die_Schachpartie_anagoria.JPG" alt="Логотип сайта" class="rounded-circle d-inline-block align-text-center" width="95" height="95" style="object-fit: cover">
                      <span class="h2 text-secondary">Сайт про гроссмейстеров</span>
                  </div>
                  <a href="{{ route('grandmasters.index') }}" class="btn btn-secondary mb-3">Вернуться на главную</a>
                </div>  
              </nav>
    </header>
    <div class="container border border-3 border-secondary rounded p-3 mt-3 mb-3">
        <h1>Редактировать информацию о гроссмейстера</h1>
        <form action="{{ route('grandmasters.update', $grandmaster->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Это нужно для того, чтобы Laravel знал, что это обновление -->

            <div class="form-group">
                <label for="name">Имя:</label>
                <input type="text" name="name" id="name" class="form-control" maxlength="50" value="{{ old('name', $grandmaster->name) }}" required>
            </div>

            <div class="form-group">
                <label for="country">Страна:</label>
                <input type="text" name="country" id="country" class="form-control" maxlength="50" value="{{ old('country', $grandmaster->country) }}" required>
            </div>

            <div class="form-group">
                <label for="birth_date">День рождения:</label>
                <input type="date" name="birth_date" id="birth_date" class="form-control" min="1900-01-01" max="2023-12-31" value="{{ old('birth_date', $grandmaster->birth_date) }}" required>
            </div>

            <div class="form-group">
                <label for="max_rating">Максимальный рейтинг:</label>
                <input type="number" name="max_rating" id="max_rating" min="0" max="3000" class="form-control" value="{{ old('max_rating', $grandmaster->max_rating) }}" required>
            </div>

            <div class="form-group">
                <label for="image_path">Изображение</label>
                <input type="file" id="image_path" name="image_path" class="form-control">
                <label for="image_path">Текущее Изображение:</label>
                @if ($grandmaster->image_path)
                    <img src="{{ asset( $grandmaster->image_path) }}" alt="Текущее изображение" class="img-thumbnail" style="width: 100px; height: 100px; margin-top: 10px;">
                @else
                    <p>Нет изображения</p>
                @endif
            </div>

            <div class="form-group">
                <label for="info">Подробная информация:</label>
                <textarea name="info" id="info" class="form-control" required>{{ old('info', $grandmaster->info) }}</textarea>
            </div>

            <button type="submit" class="btn border-3 border-secondary mt-3">Сохранить изменения</button>
        </form>
    </div>
</body>
</html>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
