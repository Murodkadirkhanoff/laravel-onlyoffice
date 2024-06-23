@extends('adminlte::page')

@section('title', 'Create Document')

@section('content_header')
    <h1>Новый документ</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('docs.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="file_name">Название файла</label>
                    <input type="text" name="file_name" class="form-control" id="file_name" required>
                </div>
                <div class="form-group">
                    <label for="file_extension">Расширение</label>
                    <select name="file_extension" class="form-control" id="file_extension" required>
                        <option value="doc">.doc</option>
                        <option value="docx">.docx</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea name="description" class="form-control" id="description"></textarea>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="status">Статус</label>
                        <select name="status" class="form-control" id="status" required>
                            <option value="active">Активный</option>
                            <option value="archive">Архив</option>
                        </select>
                    </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
@stop
