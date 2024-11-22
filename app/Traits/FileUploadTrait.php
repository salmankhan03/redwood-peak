<?php

namespace App\Traits;

trait FileUploadTrait
{
    protected $file_meta_data_attributes = [];
    protected $file_attribute_name       = "";
    protected $upload_disk;

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

            $filename = str_slug(Config('app.name')) . "-" . md5($value . time());
            $fileext  = '.' . $value->getClientOriginalExtension();
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