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
                ],
                'pluginOptions' => [
                    'uploadUrl' => Url::to(['/admin/image/upload']),
                    'uploadExtraData' => [
                        'ImageCreateForm[model]' => Image::class,
                        'ImageCreateForm[folder]' => Image::getPath($folder)
                    ],
                    'deleteUrl' => '/admin/image/delete',
                    'maxFileCount' => 10,
                    'initialPreview'=> $initialPreview,
                    'initialPreviewAsData'=>true,
                    'initialPreviewConfig' => $initialPreviewConfig,
                    'overwriteInitial'=>false,
                    'maxFileSize'=>0,
                ],
                'pluginEvents' => [
                'fileuploaded' => 'function(event, data, previewId, index){
                    $(".image_id").val(data.response.id)
                }']
            ];
        }
}
