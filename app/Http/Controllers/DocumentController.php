<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentStoreRequest;
use App\Models\Document;
use App\Services\DocumentService;
use App\Services\OnlyOfficeService;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    protected OnlyOfficeService $onlyOfficeService;
    protected DocumentService $documentService;

    public function __construct(OnlyOfficeService $onlyOfficeService, DocumentService $documentService)
    {
        $this->onlyOfficeService = $onlyOfficeService;
        $this->documentService = $documentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = $this->documentService->getAll();
        return view('documents.list', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentStoreRequest $request)
    {
        $document = $this->documentService->create($request);

        $config = $this->onlyOfficeService->generateConfig($document);

        return view('onlyoffice.index', compact('config'));


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $document = $this->documentService->getById($id);
        return view('documents.show', compact('document', 'document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $document = $this->documentService->getById($id);

        $config = $this->onlyOfficeService->generateConfig($document);

        return view('onlyoffice.index', compact('config'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->documentService->delete($id);

        return redirect()->route('docs.index')
            ->with('success', 'Document deleted successfully.');
    }
}
