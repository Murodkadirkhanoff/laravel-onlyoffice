<?php

namespace App\Repositories\OnlyOffice;

use App\Models\Document;
use App\Repositories\OnlyOffice\OnlyOfficeRepositoryInterface;

class DocumentRepository implements OnlyOfficeRepositoryInterface
{

    public function getAll()
    {
        return Document::orderBy('id')->get();
    }

    public function getById($id)
    {
        return Document::with('histories')->find($id);
    }

    public function create(array $documentData)
    {
        return Document::create($documentData);
    }

    public function update($id, array $documentData)
    {
        $document = Document::find($id);
        $document->update($documentData);
        return $document;
    }

    public function delete($id)
    {
        $document = Document::find($id);
        if ($document) {
            $document->delete();
        }
        return $document;
    }
}
