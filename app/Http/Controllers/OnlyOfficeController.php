<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Log;

class OnlyOfficeController extends Controller
{
    public function callback(Request $request)
    {
        $file_path = $request->get('file_path');
        $body_stream = file_get_contents("php://input");
        $data = json_decode($body_stream, true);

        Log::info($data);
        Log::info($file_path);

        $file_path = public_path($file_path);

        if (isset($data['url'])) {
            $downloadUri = $data["url"];
            if (($new_data = file_get_contents($downloadUri)) === FALSE) {
                echo "Bad Response";
            } else {
                file_put_contents($file_path, $new_data, LOCK_EX);
            }
        }


        return response()->json(['error' => 0]);
    }
}
