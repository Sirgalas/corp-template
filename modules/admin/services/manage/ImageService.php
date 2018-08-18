<?php

namespace app\modules\admin\services\manage;

use app\modules\admin\forms\image\ImageCreateForm;
use phpDocumentor\Reflection\Types\Integer;
use yii\web\UploadedFile;
use app\entities\Image;

class ImageService
{


    public function save(ImageCreateForm $form,$folder):int
  {
      $name=$this->upload($form,$folder);
      $image=Image::create($name);
      $image->save();
      return $image->id;
  }



  public function upload(ImageCreateForm $form,$folder):string
  {
      $form->file=UploadedFile::getInstance($form, 'file');
      $fileName=$form->file->baseName . '.' . $form->file->extension;
      if(!$form->file->saveAs( Image::getPath($folder).DIRECTORY_SEPARATOR.$fileName))
          throw new \DomainException('Картинка не сохранилась');
      return $fileName;
  }
}
