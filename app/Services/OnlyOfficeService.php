<?php

namespace App\Services;

use App\Models\Document;
use Firebase\JWT\JWT;

class OnlyOfficeService
{
    protected mixed $secret;
    protected mixed $algorithm;

    public function __construct()
    {
        $this->secret = config('onlyoffice.secret');
        $this->algorithm = config('onlyoffice.algorithm');
    }

    public function generateConfig(Document $document): array
    {
        $fileUrl = url($document->file_path); // URL вашего файла

        $payload = [
            'document' => [
                'fileType' => 'docx',
                'key' => uniqid(), // уникальный ключ документа
                'title' => 'Example Document',
                'url' => $fileUrl, // URL к вашему документу
                'permissions' => [
                    'comment',
                    'download',
                    'edit',
                    'fillForms',
                    'modifyContentControl',
                    'modifyFilter',
                    'print',
                    'review'
                ]
            ],
            'documentType' => 'word',
            'editorConfig' => [
                'mode' => 'edit', // режим редактирования
                'callbackUrl' => env("APP_URL") . "/onlyoffice/callback?file_path=$document->file_path", // URL для коллбэков от OnlyOffice
                'user' => [
                    'id' => auth()->id(),
                    'name' => auth()->user()->name,
                ],
                'lang' => 'en',
                'customization' => [
                    "forcesave" => true
                ]
            ],
            "height" => "100%",
            "width" => "100%"
        ];

        // Генерация JWT токена с указанием алгоритма шифрования
        $token = JWT::encode($payload, $this->secret, $this->algorithm);

        return [
            'document' => $payload['document'],
            'documentType' => $payload['documentType'],
            'editorConfig' => $payload['editorConfig'],
            'token' => $token
        ];
    }
}
