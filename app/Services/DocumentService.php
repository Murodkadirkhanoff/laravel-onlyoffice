<?php

namespace App\Services;

use App\Models\Document;
use App\Repositories\OnlyOffice\DocumentRepository;
use Firebase\JWT\JWT;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DocumentService
{

    protected DocumentRepository $documentRepository;

    public function __construct(DocumentRepository $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function getAll(): Collection
    {
        return $this->documentRepository->getAll();
    }

    public function create($request)
    {
        // Create the new file name with the desired extension
        $newFileName = Str::slug($request->input('file_name')) . '.' . $request->input('file_extension');

        // Define the public path where the file will be stored
        $publicPath = public_path('documents/' . $newFileName);

        // Create the directory if it doesn't exist
        if (!File::exists(public_path('documents'))) {
            File::makeDirectory(public_path('documents'), 0755, true);
        }

        // Store the file in the public directory with the new name
        File::put($publicPath, null);

        // Get the path and size of the new file
        $path = 'documents/' . $newFileName;

        $fileSize = filesize($publicPath);

        return $this->documentRepository->create([
            'user_id' => Auth::id(), // Устанавливаем ID владельца
            'file_name' => $newFileName,
            'file_path' => $path,
            'file_size' => $fileSize,
            'file_extension' => $request->input('file_extension'), // Сохранение расширения файла
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);
    }

    public function getById($id)
    {
        return $this->documentRepository->getById($id);
    }

    public function delete($id)
    {
        $document = $this->documentRepository->getById($id);

        // Delete the file from the public folder
        $publicPath = public_path($document->file_path);
        if (File::exists($publicPath)) {
            File::delete($publicPath);
        }

        $this->documentRepository->delete($id);
    }

}
