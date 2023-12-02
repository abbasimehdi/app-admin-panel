<?php

namespace Selfofficename\Modules\Domain\Product\Traits;

/**
 * @TODO
 * Refactor and create file storage table for get all multiple  file types
 */
trait UploadFile
{
    /**
     * @param array $data
     */
    public function saveImage(array $data, $path): string
    {
        $data['image']->move($path, $this->getFileName($data['image'], $path));

        return $data['image'] = $this->getFileName($data['image'], $path);
    }

    /**
     * @param $image
     * @return string
     */
    public function getFileName($image, $path): string
    {
        return $path.$image->getClientOriginalName();
    }
}
