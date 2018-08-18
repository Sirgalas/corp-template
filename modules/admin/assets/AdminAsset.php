<?php

namespace app\modules\admin\assets;

use yii\web\AssetBundle;
class AdminAsset  extends  AssetBundle
{
    public $sourcePath = '@app/modules/admin/web/';

    public $css = [
        'css/style.css'

    ];
    public $js = [
        'js/script.js'
    ];

}
