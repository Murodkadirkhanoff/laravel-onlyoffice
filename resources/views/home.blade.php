@extends('adminlte::page')

@section('title', 'OnlyOffice Integration')

@section('content_header')
    <h1>OnlyOffice Integration</h1>
@stop

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Loading</h4>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Интеграция Laravel с OnlyOffice</h3>
        </div>
        <div class="card-body">
            <p>
                Эта страница демонстрирует интеграцию OnlyOffice с приложением Laravel.
                OnlyOffice - это мощный онлайн-редактор документов, который позволяет создавать, редактировать и сотрудничать над документами прямо из вашего веб-приложения.
            </p>
            <p>
                Интеграция позволяет:
            </p>
            <ul>
                <li>Создавать и редактировать документы в различных форматах, таких как .doc и .docx.</li>
                <li>Сотрудничать с другими пользователями в реальном времени.</li>
                <li>Управлять версиями документов и отслеживать изменения.</li>
                <li>Безопасно хранить документы в вашем приложении Laravel.</li>
            </ul>
            <p>
                Используйте интерфейс ниже для взаимодействия с редактором документов OnlyOffice. Наслаждайтесь безупречными возможностями управления документами и совместной работы, интегрированными в ваше приложение Laravel.
            </p>
        </div>
    </div>
@stop
