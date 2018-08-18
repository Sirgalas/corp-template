<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17.08.18
 * Time: 23:28
 */

namespace app\repositories;

use yii\helpers\Url;
use app\entities\Image;
use Yii;

class ImageRepository
{
    public function get($id):Image
    {
        return Image::findOne($id);
    }

    public function imageSeting($folder,$id=null):array
    {
            $initialPreview = [];
            $initialPreviewConfig = [];
            if($id){
                $model=$this->get($id);
                $initialPreview[] = '/'.$model->name;
                $initialPreviewConfig[] = [
                    'caption' => $model->name,
                    'size' => filesize($model->getUrl($folder)),
                    'key' => $model->id,
                ];
            }
            return [
                'options' => [
                    'accept' => 'image/*',
                    'multiple'=>true
                ],
                'pluginOptions' => [
                    'uploadUrl' => Url::to(['/admin/image/upload']),
                    'uploadExtraData' => [
                        'model' => Image::class,
                        'folder' => Image::getPath($folder)
                    ],
                    'deleteUrl' => '/admin/image/upload',
                    'maxFileCount' => 10,
                    'initialPreview'=> $initialPreview,
                    'initialPreviewAsData'=>true,
                    'initialPreviewConfig' => $initialPreviewConfig,
                    'overwriteInitial'=>false,
                    'maxFileSize'=>0,//10240,
                ]
            ];
        }
}
