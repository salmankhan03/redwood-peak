<?php

namespace App\Traits;

trait FileUploadTrait
{
    protected $file_meta_data_attributes = [];
    protected $file_attribute_name       = "";
    protected $upload_disk;

    // Extensions (detected from content) that may be stored
    protected static $allowed_upload_extensions = [
        'jpg', 'png', 'gif', 'webp', 'ico', 'mp4',
        'pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx',
    ];

    public function getFileUrl($file_path)
    {        

        try {
            return $this->getDiskUrl($file_path);
        } catch (\InvalidArgumentException $e) {
            return response()->json([
                'status_code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function saveFile($value, $attribute_name = "image", $destination_path = "", $disk = "")
    {

        $this->file_attribute_name = $attribute_name;

        if (empty($disk)) {
            $this->upload_disk = $disk = \Config::get('filesystems.default');
        } else {
            $this->upload_disk = $disk;
        }

        $this->removeFile();
        if ($value == null) {
            return false;
        }

        if (is_object($value)) {

            // Never trust the client's filename/extension: derive it from the file's real content
            // and only accept an allow-list, so a script can't be stored under an executable name.
            $detected = strtolower((string) $value->guessExtension());
            $detected = $detected === 'jpeg' ? 'jpg' : $detected;

            if (!in_array($detected, self::$allowed_upload_extensions, true)) {
                throw new \InvalidArgumentException('This file type is not allowed');
            }

            $filename = str_slug(Config('app.name')) . "-" . bin2hex(random_bytes(16));
            $fileext  = '.' . $detected;
            $this->storeFileInDisk($value, $destination_path . '/' . $filename . $fileext);
            $this->attributes[$this->file_attribute_name] = $destination_path . '/' . $filename . $fileext;


            return true;
        } elseif (!empty($value) && is_string($value)) {
            $this->attributes[$this->file_attribute_name] = $value;
            return true;
        } else {
            return false;
        }
    }

    private function storeFileInDisk($value, $destination_path)
    {
        $disk       = \Config::get('filesystems.default');
        $path_parts = pathinfo($destination_path);

        if (is_object($value)) {
            $filename = $path_parts['filename'] . "." . $path_parts['extension'];
            $value->storeAs($path_parts['dirname'], $filename, $disk);

            return true;
        } elseif (!empty($value) && is_string($value)) {
            $this->attributes[$this->file_attribute_name] = $value;
        } else {
            return false;
        }
    }

    private function removeFile()
    {
        \Storage::disk($this->upload_disk)->delete($this->file_attribute_name);
        $this->attributes[$this->file_attribute_name] = null;
    }

    private function getDiskUrl($file_path)
    {

        return \Storage::disk($this->upload_disk)->url($file_path);
        
    }
}