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

        </main>


            
    

        <div class="footer">
            &copy; 2025. ООО &laquo;Memory Book&raquo;. Все права защищены
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>
