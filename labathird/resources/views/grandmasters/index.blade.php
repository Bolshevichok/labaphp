<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Гроссмейстеры </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="stylesheet" href="styles.css"> -->
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
                  <a href="{{ route('grandmasters.create') }}" class="btn btn-secondary mb-3">Добавить гроссмейстера</a>
                </div>  
              </nav>
        </header>
        <div class="container border border-3 border-secondary rounded p-3 mt-3 mb-3">
            <h1 class="header mb-3">Гроссмейстеры современности</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($grandmasters as $grandmaster)
                    <div class="col">
                        <div class="card h-100 border border-3 border-secondary">
                            <!-- <button type="button" class="btn modal-button position-absolute bg-secondary m-1 p-1 rounded" data-index="{{ $loop->index }}">
                                Узнать ещё
                            </button> -->
                            <a href="{{ route('grandmasters.show', $grandmaster->id) }}" class="btn modal-button position-absolute bg-secondary m-1 p-1 rounded">Узнать еще</a>
                            <img src="{{ $grandmaster->image_path ?: 'storage/rb_25644.png' }}" alt="Гроссмейстер" class="card-img-top img-fluid" style="height: 300px; weight: 300px; object-fit: cover;"> <br>
                            <div class="card-body">
                                <h3>Имя: {{ $grandmaster->name }}</h3>
                                Страна: {{ $grandmaster->country }} <br>
                                Дата рождения: {{ $grandmaster->birth_date }} <br>
                                Максимальный рейтинг: {{ $grandmaster->max_rating }} <br>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="{{ route('grandmasters.edit', $grandmaster->id) }}" class="btn btn-primary">Редактировать</a>
                                    <form action="{{ route('grandmasters.destroy', $grandmaster->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Удалить</button>
                                    </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <footer>
            <div class="navbar navbar-expand-lg bg-success p-5 justify-content-between">
                <div>
                    Автор: Орехов Семен 
                </div>
                <div>
                    <a href="https://www.utmn.ru/", target="_blank" class="d-inline-block">
                        <img src="/storage/i.webp" class='rounded-circle mx-2' weidth="50" height="50" alt="ТюмГУ" href="https://www.utmn.ru/">
                    </a>
                    <a href="https://www.ya.ru/", target="_blank" class="d-inline-block">
                        <img src="/storage/orig.png" class='rounded-circle' weidth="50" height="50" alt="Яндекс" href="https://www.ya.ru">
                    </a>
                </div>
            </div>
        </footer>

        <div class="modal fade" id="dynamicModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Заголовок</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center mb-3">
                            <img id="modalProfileImg" src="" alt="Профиль" class="rounded-circle img-fluid" style="width: 100px; height: 100px; object-fit: cover">
                        </div>
                        <div id="modalContent"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header">
                <img class="fa-solid fa-spinner fa-spin m-1">
                <strong class="me-auto">Загрузчик</strong>
                <small>now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
              <div class="toast-body">
                Загрузка пока не поддерживается:(
              </div>
            </div>
          </div>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
