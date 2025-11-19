<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DOMDocument;

class ImageService 
{
  /**
   * Save upload image avatar to storage/app/public/{folder}
   */
  public function saveImageAvatar($file, $folder = 'uploads', $name = '')
  {
    $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
    $slugName = Str::slug(mb_substr($name, 0, 60) ?: $originalName);
    $timestamp = date('Ymd') . '-' . date('His');
    $extension = $file->getClientOriginalExtension();
    $fileName = "{$slugName}-{$timestamp}.{$extension}";

    return $file->storeAs($folder, $fileName, 'public');
  }

  /**
   * Delete image from storage
   */
  public function deleteImage($path)
  {
    if (Storage::disk('public')->exists("/{$path}")) {
      Storage::disk('public')->delete("/{$path}");
    }
  }
}
