<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить гроссмейстера</title>
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
        <h1>Добавить гроссмейстера</h1>
        <form action="{{ route('grandmasters.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Имя:</label>
                <input type="text" name="name" id="name" class="form-control" maxlength="50" required>
            </div>

            <div class="form-group">
                <label for="country">Страна:</label>
                <input type="text" name="country" id="country" class="form-control" maxlength="50" required>
            </div>

            <div class="form-group">
                <label for="birth_date">Дата рождения:</label>
                <input type="date" name="birth_date" id="birth_date" class="form-control" min="1900-01-01" max="2023-12-31" required>
            </div>

            <div class="form-group">
                <label for="max_rating">Максимальный рейтинг:</label>
                <input type="number" name="max_rating" id="max_rating" class="form-control" min="0" max="3000" required>
            </div>

            <div class="form-group">
                <label for="image">Изображение:</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
            </div>

            <div class="form-group">
                <label for="info">Подробная информация:</label>
                <textarea name="info" id="info" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn border-3 border-secondary mt-3 ">Создать</button>
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
