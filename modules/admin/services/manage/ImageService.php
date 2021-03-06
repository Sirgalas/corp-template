<?php

namespace app\modules\admin\services\manage;

use app\modules\admin\forms\image\ImageCreateForm;
use phpDocumentor\Reflection\Types\Integer;
use yii\web\UploadedFile;
use app\entities\Image;
use yii\helpers\FileHelper;
class ImageService
{


    public function save(ImageCreateForm $form):int
  {
      $name=$this->upload($form);
      $image=Image::create($name);
      $image->save();
      return $image->id;
  }




  public function upload(ImageCreateForm $form):string
  {
      $form->file=UploadedFile::getInstance($form, 'file');
      $fileName=$form->file->baseName . '.' . $form->file->extension;
      FileHelper::createDirectory($form->folder);
      if(!$form->file->saveAs( $form->folder.DIRECTORY_SEPARATOR.$fileName))
          throw new \DomainException('Картинка не сохранилась');
      return $fileName;
  }
}
