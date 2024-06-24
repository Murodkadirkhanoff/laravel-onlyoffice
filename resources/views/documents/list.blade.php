@extends('adminlte::page')


@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Loading</h4>
@stop


@section('content')

    <ul class="nav nav-pills ml-auto m-4">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('docs.create') }}">Добавить</a>
        </li>
    </ul>
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">Список документов</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название файла</th>
                    <th>Размер файла</th>
                    <th>Расширение</th>
                    <th>Описание</th>
                    <th>Владелец</th>
                    <th>Статус</th>
                    <th>Дата создание</th>
                    <th>Действия</th> <!-- New Actions column -->
                </tr>
                </thead>
                <tbody>
                @foreach($documents as $document)
                    <tr>
                        <td>{{ $document->id }}</td>
                        <td>{{ $document->file_name }}</td>
                        <td>{{ $document->file_size }}</td>
                        <td>{{ $document->file_extension }}</td>
                        <td>{{ $document->description }}</td>
                        <td>{{ $document->user->name }}</td>
                        <td>{{ $document->status }}</td>
                        <td>{{ $document->created_at }}</td>
                        <td>
                            <a href="{{ route('docs.edit', $document->id) }}" target="_blank" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('docs.destroy', $document->id) }}" method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this document?');">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            <a href="{{ route('docs.show', $document->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td> <!-- Actions column -->
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
