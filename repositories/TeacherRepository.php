<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16.08.18
 * Time: 23:57
 */

namespace app\repositories;


use app\entities\Teachers;

class TeacherRepository
{

    public function get($id)
    {
        return Teachers::findOne($id);
    }


}
