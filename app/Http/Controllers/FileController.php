<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FileController extends Controller
{
    public function fetchFiles(Request $request)
    {
        // Получите путь к директории с иконками (предположим, что это public/assets/fonts/svg)
        $folderPath = public_path('assets/fonts/svg');

        if (File::isDirectory($folderPath)) {
            // Получите список файлов в директории
            $files = File::files($folderPath);
            
            $fileList = [];
            foreach ($files as $file) {
                $fileList[] = pathinfo($file, PATHINFO_FILENAME);
            }

            // Верните список файлов в виде JSON-ответа
            return response()->json($fileList);
            // var_dump($files);
        } else {
            // Если директория не существует, верните ошибку
            return response()->json(['error' => 'Папка не существует.'], 404);
        }
    }

    
}
