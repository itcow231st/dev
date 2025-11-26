<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadFileService
{
    /**
     * Upload 1 hoặc nhiều file
     *
     * @param UploadedFile|array|null $files
     * @param string $folder
     * @return string|array|null
     */
    public function upload($files, string $folder = 'uploads')
    {
        if (is_null($files)) {
            return null;
        }

        // Nếu là 1 file
        if ($files instanceof UploadedFile) {
            return $this->uploadSingle($files, $folder);
        }

        // Nếu là nhiều file
        if (is_array($files)) {
            $paths = [];
            foreach ($files as $file) {
                if ($file instanceof UploadedFile) {
                    $paths[] = $this->uploadSingle($file, $folder);
                }
            }
            return $paths;
        }

        return null;
    }

    /**
     * Xử lý upload 1 file
     */
    private function uploadSingle(UploadedFile $file, string $folder)
    {
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        return $file->storeAs($folder, $fileName, 'public');
    }

    /**
     * Xóa file
     */
    public function delete(string $path)
    {
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
