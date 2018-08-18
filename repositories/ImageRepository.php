<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17.08.18
 * Time: 23:28
 */

namespace app\repositories;


use app\entities\Image;

class ImageRepository
{
    public function get($id):Image
    {
        return Image::findOne($id);
    }
}
