<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentHistory;
use App\Services\DocumentService;
use App\Services\OnlyOfficeService;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OnlyOfficeController extends Controller
{
    protected DocumentService $documentService;

    public function __construct(OnlyOfficeService $onlyOfficeService, DocumentService $documentService)
    {
        $this->documentService = $documentService;
    }

    public function callback(Request $request)
    {
        $file_path = $request->get('file_path');
        $document_id = $request->get('document_id');
        $auth_id = $request->get('auth_id');

        $body_stream = file_get_contents("php://input");
        $data = json_decode($body_stream, true);

        $file_path = public_path($file_path);

        if (isset($data['url'])) {
            $downloadUri = $data["url"];
            if (($new_data = file_get_contents($downloadUri)) === FALSE) {
                echo "Bad Response";
            } else {
                file_put_contents($file_path, $new_data, LOCK_EX);

                $document = $this->documentService->getById($document_id);

                $publicPath = public_path($document->file_path);
                $fileSize = filesize($publicPath);
                $document->update([
                    'file_size' => $fileSize,
                ]);

                DocumentHistory::create([
                    'document_id' => $document_id,
                    'user_id' => $auth_id,
                ]);

            }
        }


        return response()->json(['error' => 0]);
    }
}
