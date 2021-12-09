<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public  function errorResponse($message, $status = 422, array $errors = null)
    {
        return response()->json(['errors' => $errors, 'message' => $message, 'success' => false], $status);
    }

    public  function successResponse($message, $data = null, $status = 200)
    {
        return response()->json(['data' => $data, 'message' => $message, 'success' => true], $status);
    }

    public function uploadFile($file, $directory)
    {
        $fileName = time().'_'.$file->getClientOriginalName();
        $filePath = $file->storeAs($directory, $fileName, 'public');
        $file_path = '/storage/' . $filePath;

        return array(
            'name' => $fileName,
            'ext' => '',
            'path' => $file_path
        );
    }
}
