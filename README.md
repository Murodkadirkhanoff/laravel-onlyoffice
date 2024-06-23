# Laravel OnlyOffice Integration

## О проекте

Этот проект демонстрирует интеграцию OnlyOffice с приложением Laravel. OnlyOffice - это мощный онлайн-редактор документов, который позволяет создавать, редактировать и сотрудничать над документами прямо из вашего веб-приложения.

## Функциональность

- **Создание и редактирование документов**: Создавайте и редактируйте документы в различных форматах, таких как .doc и .docx.
- **Совместная работа**: Сотрудничайте с другими пользователями в реальном времени.
- **Управление версиями**: Управляйте версиями документов и отслеживайте изменения.
- **Безопасное хранение документов**: Безопасно храните документы в вашем приложении Laravel.
- **История изменений**: Ведите историю изменений документов, включая информацию о том, кто, когда и какие действия выполнял с документом.

## Установка

1. Клонируйте репозиторий:

    ```bash
    git clone https://github.com/your-username/your-repo.git
    cd your-repo
    ```

2. Установите зависимости с помощью Composer:

    ```bash
    composer install
    ```

3. Скопируйте файл `.env.example` в `.env` и настройте параметры окружения:

    ```bash
    cp .env.example .env
    ```

4. Сгенерируйте ключ приложения:

    ```bash
    php artisan key:generate
    ```

5. Настройте параметры подключения к базе данных в файле `.env`.

6. Выполните миграции и сидирование базы данных:

    ```bash
    php artisan migrate
    php artisan db:seed
    ```

7. Запустите сервер разработки:

    ```bash
    php artisan serve
    ```

## Использование

### Создание документа

1. Перейдите на страницу создания документа по URL: `/documents/create`.
2. Заполните форму и нажмите кнопку "Submit".

### Редактирование документа

1. Перейдите на страницу списка документов по URL: `/documents`.
2. Нажмите кнопку редактирования рядом с документом, который хотите изменить.
3. Внесите изменения и нажмите кнопку "Submit".

### Просмотр документа и его истории изменений

1. Перейдите на страницу списка документов по URL: `/documents`.
2. Нажмите на название документа, чтобы открыть его в редакторе OnlyOffice.
3. Внизу страницы будет отображена история изменений документа.

### Удаление документа

1. Перейдите на страницу списка документов по URL: `/documents`.
2. Нажмите кнопку удаления рядом с документом, который хотите удалить.
3. Подтвердите удаление.

## Структура проекта

- **app/Http/Controllers**: Контроллеры для обработки HTTP-запросов.
- **app/Models**: Модели данных.
- **app/Repositories**: Репозитории для взаимодействия с базой данных.
- **app/Services**: Сервисы, содержащие бизнес-логику.
- **database/migrations**: Миграции базы данных.
- **
