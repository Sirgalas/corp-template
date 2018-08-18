<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17.08.18
 * Time: 22:03
 */

namespace app\modules\admin\forms\image;

use yii\base\Model;
use app\entities\User;

class ImageCreateForm extends Model
{
    public $file;
    public $folder;
    public $model;
    public $file_id;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['file','file', 'extensions' => 'png, jpg'],
            [['folder','model','file_id'],'string'],
        ];
    }

}
