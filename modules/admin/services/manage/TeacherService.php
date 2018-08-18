<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17.08.18
 * Time: 21:41
 */

namespace app\modules\admin\services\manage;

use app\entities\Teachers;
use app\modules\admin\forms\teachers\CreateForm;

class TeacherService
{
    public $teacher;

    public function __construct(Teachers $teachers)
    {
        $this->teacher=$teachers;
    }

    public function create(CreateForm $form):Teachers
    {
        $teacher=$this->teacher::create($form);


        return $teacher;

    }

}
