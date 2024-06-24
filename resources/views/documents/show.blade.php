@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>{{ $document->file_name }}</h1>
            </div>
            <div class="card-body">
                <p><strong>Описание:</strong> {{ $document->description }}</p>
                <p><strong>Путь к файлу:</strong> {{ $document->file_path }}</p>
                <p><strong>Размер файла:</strong> {{ number_format($document->file_size) }} байт</p>
                <p><strong>Расширение файла:</strong> {{ $document->file_extension }}</p>
                <p><strong>Статус:</strong>
                    <span class="badge
                    @if($document->status == 'active') badge-success
                    @elseif($document->status == 'inactive') badge-secondary
                    @elseif($document->status == 'archived') badge-warning
                    @else badge-info
                    @endif">
                    {{ ucfirst($document->status) }}
                </span>
                </p>
                <p><strong>Дата создания:</strong> {{ $document->created_at->format('d.m.Y H:i') }}</p>
                <p><strong>Дата обновления:</strong> {{ $document->updated_at->format('d.m.Y H:i') }}</p>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h2>История изменений</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Пользователь</th>
                        <th>Email</th>
                        <th>Дата редактирования</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($document->histories as $history)
                        <tr>
                            <td>{{ $history->user->name }}</td>
                            <td>{{ $history->user->email }}</td>
                            <td>{{ $history->created_at->format('d.m.Y H:i') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
