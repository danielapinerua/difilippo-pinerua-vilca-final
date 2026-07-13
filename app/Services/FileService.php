<?php
namespace App\Services;

use Illuminate\Http\UploadedFile;

class FileService
{
    public function upload(UploadedFile $file, string $path): string
    {
        return $file->store($path, 'public');
    }

    public function convertImageToWebP(UploadedFile $file): UploadedFile
    {
        if (in_array($file->extension(), ['webp', 'svg'])) {
            return $file;
        }

        $sourcePath = $file->getRealPath();
        $mimeType = $file->getMimeType();

        switch ($mimeType) {
            case 'image/jpeg':
                $image = @imagecreatefromjpeg($sourcePath);
                break;
            case 'image/png':
                $image = @imagecreatefrompng($sourcePath);
                break;
            case 'image/gif':
                $image = @imagecreatefromgif($sourcePath);
                break;
            default:
                throw new \Exception("Formato de imagen no soportado para conversión a WebP: " . $mimeType);
        }

        if (!$image) {
            throw new \Exception("No se pudo leer la imagen para la conversión.");
        }

        if ($mimeType === 'image/png' || $mimeType === 'image/gif') {
            imagepalettetotruecolor($image);
            imagealphablending($image, true);
            imagesavealpha($image, true);
        }

        $tempPath = sys_get_temp_dir() . '/' . uniqid('webp_', true) . '.webp';

        $success = imagewebp($image, $tempPath, 85);
        imagedestroy($image);

        if (!$success) {
            throw new \Exception("Ocurrió un error al intentar guardar la imagen como WebP.");
        }

        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';
        
        return new UploadedFile(
            $tempPath,
            $originalName,
            'image/webp',
            UPLOAD_ERR_OK,
            true
        );
    }
}