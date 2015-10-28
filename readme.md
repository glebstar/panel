## Установка

1. Склонировать проект
2. composer install
3. Расшарить директорию storage (и возможно - vendor)
5. Создать бд
6. Создать файл .env (скопировать из .env.example)
7. Прописать доступ к бд в .env
8. Накатить миграции (php artisan migrate)
9. Справа есть кнопка регистрации, зарегистрировать двух пользователей
10. В бд у одного пользователя изменить role на 'admin'

## Ожидаемое поведение

1. Админ видит в меню пункт 'Admin' (оператор - не видит)
2. Админ может зайти на страницу /admin (оператора перекидывает на главную)