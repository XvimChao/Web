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
            <a href="{{ route('home') }}" class="logo">Книга памяти</a>

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
            <div class="row">
                
                <!-- Результаты поиска -->
                <div class="col align-self-end">
                    <h1>Расширенный поиск</h1>
                    @if($prisoners->isEmpty())
                        <p>Ничего не найдено.</p>
                    @else
                        @php
                            // Проверяем, были ли введены какие-либо данные для поиска
                            $isEmptyQuery = true;
                            foreach ($data as $value) {
                                if (!empty($value)) {
                                    $isEmptyQuery = false;
                                    break;
                                }
                            }
                        @endphp

                        @if($isEmptyQuery)
                            <p>Выведены все данные из базы.</p>
                        @endif

                        <!-- Список найденных заключенных -->
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

                <!-- Форма поиска -->
                <div class="col">
                    <form action="{{ route('advanced_search.prisoners') }}" method="GET">

                        <div class="container info">
                            <p>Личные данные о человеке</p>

                            <input type="text" name="surname" id="surname" placeholder="Фамилия" value="{{ request()->input('surname') }}">
                            <input type="text" name="first_name" id="first_name" placeholder="Имя" value="{{ request()->input('first_name') }}">
                            <input type="text" name="middle_name" id="middle_name" placeholder="Отчество" value="{{ request()->input('middle_name') }}">
                            <input type="text" name="nickname" id="nickname" placeholder="Псевдоним" value="{{ request()->input('nickname') }}">
                            <input type="number" name="birth_year" id="birth_year" placeholder="Год рождения" value="{{ request()->input('birth_year') }}">
                            <input type="text" name="birth_place" id="birth_place" placeholder="Место рождения" value="{{ request()->input('birth_place') }}">
                            <input type="text" name="residence_location" id="residence_location" placeholder="Место проживания" value="{{ request()->input('residence_location') }}">
                            <input type="text" name="workplace" id="workplace" placeholder="Место работы" value="{{ request()->input('workplace') }}">
                            <input type="text" name="party_affiliation" id="party_affiliation" placeholder="Партийная принадлежность" value="{{ request()->input('party_affiliation') }}">
                            <input type='text' name='education_level' id='education_level' placeholder='Уровень образования' value="{{ request()->input('education_level') }}">
                            <input type='text' name='nationality' id='nationality' placeholder='Национальность' value="{{ request()->input('nationality') }}">
                        </div>

                        <!-- Данные о репрессии -->
                        <div class="container info">
                            <p><strong>Данные о репрессии</strong></p>

                            <input type='number' name='case_number' id='case_number' placeholder='Номер уголовного дела' value="{{ request()->input('case_number') }}">
                            <input type='number' name='arrest_day' id='arrest_day' placeholder='День ареста' value="{{ request()->input('arrest_day') }}">
                            <input type='number' name='arrest_month' id='arrest_month' placeholder='Месяц ареста' value="{{ request()->input('arrest_month') }}">
                            <input type='number' name='arrest_year' id='arrest_year' placeholder='Год ареста' value="{{ request()->input('arrest_year') }}">
                            <input type='text' name='court_body' id='court_body' placeholder='Судебный орган' value="{{ request()->input('court_body') }}">
                            <input type='number' name='verdict_day' id='verdict_day' placeholder='День вынесения приговора'value="{{ request()->input('verdict_day') }}">
                            <input type='number' name='verdict_month' id='verdict_month' placeholder='Месяц вынесения приговора'value="{{ request()->input('verdict_month') }}">
                            <input type='number' name='verdict_year' id ='verdict_year' placeholder ='Год вынесения приговора'value="{{ request()->input('verdict_year') }}">

                            <!-- Статьи и решения -->
                            <input type='text' name='articles' id='articles' placeholder='Статьи УК'value="{{ request()->input('articles') }}">
                            <input type='text' name='decision' id='decision' placeholder='Решение суда'value="{{ request()->input('decision') }}">

                            <!-- Реабилитация -->
                            <p><strong>Реабилитация</strong></p>
                            
                            <input type='number' name='rehabilitation_day' id='rehabilitation_day' placeholder='День реабилитации'value="{{ request()->input('rehabilitation_day') }}">
                            <input type='number' name='rehabilitation_month' id='rehabilitation_month' placeholder='Месяц реабилитации'value="{{ request()->input('rehabilitation_month') }}">
                            <input type='number' name='rehabilitation_year' id='rehabilitation_year' placeholder='Год реабилитации'value="{{ request()->input('rehabilitation_year') }}">
                            <input type='text' name='rehabilitation_authority'id ='rehabilitation_authority 'placeholder ='Орган реабилитации'value ="{{request()-> input ('rehabilitation_authority')}}">
                        </div>

                        <!-- Дополнительная информация -->
                        <div class = "container info">
                            <p>Дополнительная информация</p>

                            <input type = "text"
                                   name = "occupation"
                                   id = "occupation"
                                   placeholder = "Род деятельности"
                                   value="{{ request()-> input ('occupation')}}">

                            <input type = "text"
                                   name = "marital_status"
                                   id = "marital_status"
                                   placeholder = "Семейное положение"
                                   value ="{{request()-> input ('marital_status')}}">

                           <!-- Книги памяти -->
                           <p><strong>Книги памяти</strong></p>

                           <!-- Номера томов и страниц -->
                           <input type = 'number'
                                  name = 'memory_book_volume_number'
                                  id = 'memory_book_volume_number'
                                  placeholder = 'Номер тома книги памяти'
                                  value ="{{request() -> input ('memory_book_volume_number')}}">

                           <!-- Номер страницы -->
                           <input type = 'number'
                                  name = 'memory_book_page_number'
                                  id = 'memory_book_page_number'
                                  placeholder = 'Номер страницы книги памяти'
                                  value ="{{request() -> input ('memory_book_page_number')}}">
                       </div>

                       <!-- Кнопка поиска -->
                       <div class = "btm">
                           <button type = "submit"
                                   class = "submit">Искать</button>
                       </div>
                   </form>
               </div><!-- Конец колонки формы -->

           </div><!-- Конец строки -->

       </main>

       <!-- Подвал -->
       <div class ="footer">
           &copy; 2025. ООО &laquo;Memory Book&raquo;. Все права защищены
       </div>
   </div>

   <!-- Подключение Bootstrap JS -->
   <script src ="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
           integrity ="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
           crossorigin ="anonymous"></script>

   <!-- JavaScript для модального окна -->
   {{-- Ваш скрипт для отображения деталей заключенного --}}
    
</body>
</html>
