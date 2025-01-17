<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Memory Book</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    
</head>
<body>
    <div class="wrapper">
        <header>
            <a href = "{{ route('home') }}" class = "logo">Книга памяти</a>

            <nav class="navbar">
                <ul>
                    @if (Route::has('login'))
                        @auth
                        <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        @else
                        <li><a href="{{ route('login') }}">Войти</a></li>
                        @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">Регистрация</a></li>
                        @endif
                        @endauth
                    @endif 
                </ul>
            </nav>


        </header>
        

        <main class="content">
            <form action="{{ route('search.prisoners') }}" method="GET">
                    <p><b>Найти Репрессированного</b></p>
                    <input type="text" name="query" placeholder="Введите ФИО" class="search" maxlength="60" autocomplete="off">
                    <input type="submit" name="submit" class="submit" value="Найти">
                </form>

                <form class="advanced-search">
                    <p><b><a href="{{ route('advanced_search') }}">Расширенный поиск</a></b></p>
                </form>

                <div class="container mx-auto mt-8">
                <h1 class="text-lg font-semibold">Результаты поиска</h1>

                @if($prisoners->isEmpty())
                    <p>Ничего не найдено.</p>
                @else
                    @if(request()->input('query') === '')
                        <p>Выведены все данные из базы.</p>
                    @endif
                    <ul class="list-group">
                        @foreach($prisoners as $prisoner)
                            <li class="list-group-item">
                                <a href="#" onclick="showDetails('{{ $prisoner->id }}')">
                                    {{ $prisoner->surname }} {{ $prisoner->first_name }} {{ $prisoner->middle_name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <!-- Модальное окно для отображения полной информации -->
            <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailsModalLabel">Полная информация</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="modalBody">
                            <!-- Здесь будет полная информация о заключенном -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>

            
    

        <div class="footer">
            &copy; 2025. ООО &laquo;Memory Book&raquo;. Все права защищены
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
    function showDetails(prisonerId) {
        fetch(`/prisoners/${prisonerId}`)
            .then(response => response.json())
            .then(data => {
                let modalContent = '';
                modalContent += `<strong>Номер дела:</strong> ${data.case_number || 'Не указано'}<br>`;
                modalContent += `<strong>ФИО:</strong> ${data.full_name}<br>`;
                modalContent += `<strong>Дата рождения:</strong> ${data.date_of_birth || 'Не указано'}<br>`;
                modalContent += `<strong>Место рождения:</strong> ${data.birth_place || 'Не указано'}<br>`;
                modalContent += `<strong>Место проживания:</strong> ${data.residence_location || 'Не указано'}<br>`;
                modalContent += `<strong>Место работы:</strong> ${data.workplace || 'Не указано'}<br>`;
                modalContent += `<strong>Национальность:</strong> ${data.nationality || 'Не указано'}<br>`;
                modalContent += `<strong>Образование:</strong> ${data.education_level || 'Не указано'}<br>`;
                modalContent += `<strong>Дата ареста:</strong> ${data.arrest_date || 'Не указано'}<br>`;
                modalContent += `<strong>Статьи:</strong> ${data.articles || 'Не указано'}<br>`;
                modalContent += `<strong>Дата рассмотрения дела:</strong> ${data.court_date || 'Не указано'}<br>`;
                modalContent += `<strong>Орган, рассматривавший дело:</strong> ${data.court_body || 'Не указано'}<br>`;
                modalContent += `<strong>Решение по делу:</strong> ${data.decision || 'Не указано'}<br>`;
                modalContent += `<strong>Реабилитировавший орган:</strong> ${data.rehabilitation_authority || 'Не указано'}<br>`;
                modalContent += `<strong>Дата реабилитации:</strong> ${data.rehabilitation_date || 'Не указано'}<br>`;
                modalContent += `<strong>Том:</strong> ${data.volume_number || 'Не указано'}<br>`;
                
                document.getElementById('modalBody').innerHTML = modalContent;
                
                var myModal = new bootstrap.Modal(document.getElementById('detailsModal'));
                myModal.show();
            })
            .catch(error => console.error('Ошибка:', error));
    }
    </script>
</body>
</html>
