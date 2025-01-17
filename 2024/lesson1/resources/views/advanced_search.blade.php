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
            <form action="{{ route('advanced_search.prisoners') }}" method="GET">
                
            <h1>Расширенный поиск</h1>

            <div class = "container info">
                <p>Личные данные о человеке</p>

                <input type="text" name="surname" id="surname" placeholder="Фамилия">

                <input type="text" name="first_name" id="first_name" placeholder="Имя">

                <input type="text" name="middle_name" id="middle_name" placeholder="Отчество">

                <input type="text" name="nickname" id="nickname" placeholder="Псевдоним">

                <input type="number" name="birth_year" id="birth_year" placeholder="Год рождения">

                <input type="text" name="birth_place" id="birth_place" placeholder="Место рождения">

                <input type="text" name="residence_location" id="residence_location" placeholder="Место проживания">

                <input type="text" name="workplace" id="workplace" placeholder="Место работы">

                <input type="text" name="party_affiliation" id="party_affiliation" placeholder="Партийная принадлежность">

                <input type="text" name="education_level" id="education_level" placeholder="Уровень образования">



                <input type="text" name="nationality" id="nationality" placeholder="Национальность">

            </div>

            <div class="container info">
                <p><strong>Данные о репрессии</strong></p>

                <input type="number" name="case_number" id="case_number" placeholder="Номер уголовного дела">
                <input type="number" name="arrest_day" id="arrest_day" placeholder="День ареста">
                <input type="number" name="arrest_month" id="arrest_month" placeholder="Месяц ареста">
                <input type="number" name="arrest_year" id="arrest_year" placeholder="Год ареста">
                <input type="text" name="court_body" id="court_body" placeholder="Судебный орган">
                <input type="number" name="verdict_day" id="verdict_day" placeholder="День вынесения приговора">
                <input type="number" name="verdict_month" id="verdict_month" placeholder="Месяц вынесения приговора">
                <input type="number" name="verdict_year" id ="verdict_year" placeholder ="Год вынесения приговора">
                
                <input type='text' name='articles' id='articles' placeholder='Статьи УК'>
                <input type='text' name='decision' id='decision' placeholder='Решение суда'>

                <input type='number' name='rehabilitation_day' id='rehabilitation_day' placeholder='День реабилитации'>
                <input type='number' name='rehabilitation_month' id='rehabilitation_month' placeholder='Месяц реабилитации'>
                <input type='number' name='rehabilitation_year' id='rehabilitation_year' placeholder='Год реабилитации'>
                <input type='text' name='rehabilitation_authority' id='rehabilitation_authority' placeholder='Орган реабилитации'>
            </div>


            <div class = "container info">
                <p>Дополнительная информация</p>

                <input type="text" name="occupation" id="occupation" placeholder="Род деятельности">
                <input type="text" name="marital_status" id="marital_status" placeholder="Семейное положение">

                <input type='number' name='memory_book_volume_number' id='memory_book_volume_number' placeholder='Номер тома книги памяти'>
                <input type='number' name='memory_book_page_number' id='memory_book_page_number' placeholder='Номер страницы книги памяти'>

            </div>
            <div class = "btm">
                <input type="submit" name="submit" class="submit" value="Искать">
            </div>
            </form>
            
        </main>

            
    

        <div class="footer">
            &copy; 2025. ООО &laquo;Memory Book&raquo;. Все права защищены
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>
