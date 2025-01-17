<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReportType;
use App\Models\Report;
use App\Models\Prisoner;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create(array(
            'name'=>'Ardan',
            'email'=>'ardan121@yandex.ru',
            'password'=>Hash::make('12345678'),
            'status'=>'Administrator'
        ));
        $user2=User::create(array(
            'name'=>'Кот',
            'email'=>'cat@bsu.ru',
            'password'=>Hash::make('87654321'),
            'status'=>'User'
        ));

        //Загрузка карточек репрессированных
        Prisoner::create(array(
            'case_number'=>'7325',
            'surname'=>'АЛГАНАЕВ',
            'first_name'=>'Адун',
            'middle_name'=>'Апганаевич',
            'nickname'=>'',
            'birth_year'=>'1888',
            'birth_place'=>'БМР, Кабанский, Алмасовский',
            'nationality'=>'бурят',
            'party_affiliation'=>'',
            'education_level'=>'неграмотный',
            'residence_location'=>'БМАССР, Кабанский район, населенный пункт Алмасовский',
            'marital_status'=>'',
            'occupation'=>'',
            'workplace'=>'рыболовецкая артель',
            'arrest_day'=>'9',
            'arrest_month'=>'2',
            'arrest_year'=>'1938',
            'court_body'=>'Тройка НКВД БМАССР',
            'verdict_day'=>'24',
            'verdict_month'=>'11',
            'verdict_year'=>'1989',
            'articles'=>'58-10',
            'decision'=>'8 лет лишения свободы',
            'rehabilitation_day'=>'24',
            'rehabilitation_month'=>'11',
            'rehabilitation_year'=>'1989',
            'rehabilitation_authority'=>'Прокуратура БурАССР',
            'memory_book_volume_number'=>'1',
            'memory_book_page_number'=>'1',
            'creator_id'=>$user->id
        ));

        Prisoner::create(array(
            'case_number'=>'7649',
            'surname'=>'АЛЕЕВ',
            'first_name'=>'Мухар',
            'middle_name'=>'Алиевич',
            'nickname'=>'',
            'birth_year'=>'1915',
            'birth_place'=>'Татария, Кокморский, Аргаясь',
            'nationality'=>'',
            'party_affiliation'=>'',
            'education_level'=>'',
            'residence_location'=>'БМАССР, Заиграевский район, населенный пункт Онохой',
            'marital_status'=>'',
            'occupation'=>'',
            'workplace'=>'',
            'arrest_day'=>'19',
            'arrest_month'=>'6',
            'arrest_year'=>'1938',
            'court_body'=>'Тройкой НКВД Иркутской области',
            'verdict_day'=>'8',
            'verdict_month'=>'7',
            'verdict_year'=>'1938',
            'articles'=>'ст.58-9, 58-11',
            'decision'=>'10 лет лишения свободы',
            'rehabilitation_day'=>'14',
            'rehabilitation_month'=>'11',
            'rehabilitation_year'=>'1989',
            'rehabilitation_authority'=>'Прокуратура БурАССР',
            'memory_book_volume_number'=>'1',
            'memory_book_page_number'=>'1',
            'creator_id'=>$user2->id
        ));
        Prisoner::create(array(
            'case_number'=>'1743/с',
            'surname'=>'АЮРОВ',
            'first_name'=>'Чойжо',
            'middle_name'=>'',
            'nickname'=>'',
            'birth_year'=>'1878',
            'birth_place'=>'БМР, Селенгинский, населенный пункт Бургултай',
            'nationality'=>'',
            'party_affiliation'=>'',
            'education_level'=>'',
            'residence_location'=>'Гэгэтуйский дацан',
            'marital_status'=>'',
            'occupation'=>'Лама',
            'workplace'=>'',
            'arrest_day'=>'20',
            'arrest_month'=>'8',
            'arrest_year'=>'1933',
            'court_body'=>'Тройкой ПП ОГПУ ВСК',
            'verdict_day'=>'20',
            'verdict_month'=>'9',
            'verdict_year'=>'1933',
            'articles'=>'58-10',
            'decision'=>'Выслан',
            'rehabilitation_day'=>'8',
            'rehabilitation_month'=>'5',
            'rehabilitation_year'=>'1997',
            'rehabilitation_authority'=>'Прокуратурой РБ',
            'memory_book_volume_number'=>'2',
            'memory_book_page_number'=>'1',
            'creator_id'=>$user2->id
        ));

        Prisoner::create(array(
            'case_number'=>'475',
            'surname'=>'АЮШЕЕВ',
            'first_name'=>'Вуда',
            'middle_name'=>'',
            'nickname'=>'',
            'birth_year'=>'1883',
            'birth_place'=>'БМР, Закаменский, населенный пункт Зымка',
            'nationality'=>'',
            'party_affiliation'=>'',
            'education_level'=>'',
            'residence_location'=>'БМАССР, Закаменский район, Санагинский сомон',
            'marital_status'=>'',
            'occupation'=>'Крестьянин-скотовод',
            'workplace'=>'',
            'arrest_day'=>'7',
            'arrest_month'=>'1',
            'arrest_year'=>'1931',
            'court_body'=>'Кяхтинским кавпогранотрядом ПП',
            'verdict_day'=>'',
            'verdict_month'=>'',
            'verdict_year'=>'',
            'articles'=>'58-10, 58-6, 58-11',
            'decision'=>'Не имеет правового решения',
            'rehabilitation_day'=>'10',
            'rehabilitation_month'=>'5',
            'rehabilitation_year'=>'1997',
            'rehabilitation_authority'=>'Прокуратурой РБ',
            'memory_book_volume_number'=>'2',
            'memory_book_page_number'=>'1',
            'creator_id'=>$user2->id
        ));

        Prisoner::create(array(
            'case_number'=>'6428/с',
            'surname'=>'АЮШЕЕВ',
            'first_name'=>'Жигжит',
            'middle_name'=>'Лопсонович',
            'nickname'=>'',
            'birth_year'=>'1903',
            'birth_place'=>'БМР, Окинский, населенный пункт Диби',
            'nationality'=>'',
            'party_affiliation'=>'',
            'education_level'=>'',
            'residence_location'=>'БМР, Окинский, населенныйпункт Диби',
            'marital_status'=>'Женат',
            'occupation'=>'член колхоза',
            'workplace'=>'',
            'arrest_day'=>'17',
            'arrest_month'=>'12',
            'arrest_year'=>'1931',
            'court_body'=>'БМ ОО ОГПУ',
            'verdict_day'=>'',
            'verdict_month'=>'',
            'verdict_year'=>'',
            'articles'=>'58-2',
            'decision'=>'Прекращено 19.02.1932',
            'rehabilitation_day'=>'10',
            'rehabilitation_month'=>'7',
            'rehabilitation_year'=>'1997',
            'rehabilitation_authority'=>'Прокуратурой РБ',
            'memory_book_volume_number'=>'2',
            'memory_book_page_number'=>'1',
            'creator_id'=>$user2->id
        ));

        Prisoner::create(array(
            'case_number'=>'1936/с',
            'surname'=>'АЮШЕЕВ',
            'first_name'=>'Роман',
            'middle_name'=>'Дамбаевич',
            'nickname'=>'',
            'birth_year'=>'1915',
            'birth_place'=>'БМР, Джидинский, населенный пункт Додо-Нюга',
            'nationality'=>'',
            'party_affiliation'=>'',
            'education_level'=>'',
            'residence_location'=>'БМАССР, Джидинский район, населенный пункт Додо-Нюга',
            'marital_status'=>'Женат',
            'occupation'=>'',
            'workplace'=>'колхоз «Красный Октябрь»',
            'arrest_day'=>'26',
            'arrest_month'=>'1',
            'arrest_year'=>'1938',
            'court_body'=>'Верховным судом БМАССР',
            'verdict_day'=>'17',
            'verdict_month'=>'4',
            'verdict_year'=>'1940',
            'articles'=>'58-10',
            'decision'=>'Реабилитирован Прокуратурой РБ',
            'rehabilitation_day'=>'9',
            'rehabilitation_month'=>'6',
            'rehabilitation_year'=>'1997',
            'rehabilitation_authority'=>'Прокуратурой РБ',
            'memory_book_volume_number'=>'2',
            'memory_book_page_number'=>'1',
            'creator_id'=>$user->id
        ));

        Prisoner::create(array(
            'case_number'=>'1411/с',
            'surname'=>'БАБАРЫКИН',
            'first_name'=>'Петр',
            'middle_name'=>'Михайлович',
            'nickname'=>'БОБОРЫКИН',
            'birth_year'=>'1880',
            'birth_place'=>'г.Киев',
            'nationality'=>'',
            'party_affiliation'=>'',
            'education_level'=>'',
            'residence_location'=>'БМАССР, населенный пункт Улан-Удэ',
            'marital_status'=>'Женат, 2 детей',
            'occupation'=>'Музыкант, Госфилармония',
            'workplace'=>'',
            'arrest_day'=>'20',
            'arrest_month'=>'4',
            'arrest_year'=>'1939',
            'court_body'=>'Верховным судом БМАССР',
            'verdict_day'=>'3',
            'verdict_month'=>'9',
            'verdict_year'=>'1939',
            'articles'=>'58-10 ч.1',
            'decision'=>'Оправдан',
            'rehabilitation_day'=>'8',
            'rehabilitation_month'=>'4',
            'rehabilitation_year'=>'1997',
            'rehabilitation_authority'=>'Прокуратурой РБ',
            'memory_book_volume_number'=>'2',
            'memory_book_page_number'=>'1',
            'creator_id'=>$user->id
        ));
        /*
        //типы заявок
        $typePit=ReportType::create(array(
            'title'=>'Ямы',
            'description'=>'Ямы города Улан-Удэ',
            'tag'=>'pit',
            'creator_id'=>$user->id
        ));
        $typeTrash=ReportType::create(array(
            'title'=>'Мусор',
            'description'=>'Несанкционированные свалки мусора',
            'tag'=>'trash',
            'creator_id'=>$user2->id
        ));
        //загрузка заявок
        Report::create(array(
            'title'=> 'Яма на Ранжурова',
            'content'=> 'Очень большая яма, не меньше 50 сантиметров!',
            'location'=> 'Рядом со второй школой',
            'longitude'=> 50.34045,
            'latitude' => 60.30304,
            'img_link' => 'img_1.jpg',
            'report_type_id'=> $typePit->id,
            'creator_id'=>$user->id
        ));
        Report::create(array(
            'title'=> 'Яма на Лебедева',
            'content'=> 'Яма среднего размера на дороге',
            'location'=> 'Рядом с общежитем №5 ВСГУТУ',
            'longitude'=> 107.9438779,
            'latitude' => 51.88409642,
            'img_link' => 'img_2.jpg',
            'report_type_id'=> $typePit->id,
            'creator_id'=>$user2->id
        ));
        Report::create(array(
            'title'=> 'Яма на Трубачеева',
            'content'=> 'Маленькая яма на дороге',
            'location'=> 'Рядом с ТЦ "Магнат"',
            'longitude'=> 107.3343297,
            'latitude' => 51.87860549,
            'img_link' => 'img_3.jpg',
            'report_type_id'=> $typePit->id,
            'creator_id'=>$user2->id
        ));
        Report::create(array(
            'title'=> 'Яма на Шаляпина',
            'content'=> 'Большая яма на дороге с трещиной по всему дорожному покрытию',
            'location'=> 'Рядом с школой №38',
            'longitude'=> 107.3963388,
            'latitude' => 51.07971577,
            'img_link' => 'img_4.jpg',
            'report_type_id'=> $typePit->id,
            'creator_id'=>$user->id
        ));
        Report::create(array(
            'title'=> 'Яма на Мокрова',
            'content'=> 'Засыпанная песком яма',
            'location'=> 'Рядом со школой №47',
            'longitude'=> 107.8898766,
            'latitude' => 51.20638901,
            'img_link' => 'img_5.jpg',
            'report_type_id'=> $typePit->id,
            'creator_id'=>$user2->id
        ));
        Report::create(array(
            'title'=> 'Мусор на Ботанической',
            'content'=> 'Большая свалка мусора на боотанической без контейнеров',
            'location'=> 'Рядом с "МегаТитан"',
            'longitude'=> 107.7084445,
            'latitude' => 51.33498603,
            'img_link' => 'img_6.jpg',
            'report_type_id'=> $typeTrash->id,
            'creator_id'=>$user->id
        ));
        Report::create(array(
            'title'=> 'Мусор на Павлово',
            'content'=> 'Неубранный мусор возле жилых зданий',
            'location'=> 'Рядом с поликлиникой №2',
            'longitude'=> 107.4279831,
            'latitude' => 51.44558941,
            'img_link' => 'img_7.jpg',
            'report_type_id'=> $typeTrash->id,
            'creator_id'=>$user->id
        ));
        Report::create(array(
            'title'=> 'Мусор на Кирова',
            'content'=> 'Полностью заполненные мусорные баки',
            'location'=> 'Рядом с ТЦ "Форум"',
            'longitude'=> 107.8262596,
            'latitude' => 51.08237861,
            'img_link' => 'img_8.jpg',
            'report_type_id'=> $typeTrash->id,
            'creator_id'=>$user->id
        ));
        Report::create(array(
            'title'=> 'Мусор на Банзарова',
            'content'=> 'Заполненные мусорные контейнеры',
            'location'=> 'Рядом со стадионом БГУ',
            'longitude'=> 107.0381847,
            'latitude' => 51.08642794,
            'img_link' => 'img_9.jpg', 
            'report_type_id'=> $typeTrash->id,
            'creator_id'=>$user2->id
        ));
        Report::create(array(
            'title'=> 'Мусор на Гагарина',
            'content'=> 'Заполненный мусорный контейнер',
            'location'=> 'Рядом с поликлиникой №6',
            'longitude'=> 107.2022089,
            'latitude' => 51.41395727,
            'img_link' => 'img_10.jpg',
            'report_type_id'=> $typeTrash->id,
            'creator_id'=>$user->id
        ));*/
    }
}
