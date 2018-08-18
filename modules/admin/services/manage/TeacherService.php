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
use app\modules\admin\forms\teachers\EditForm;
use app\repositories\TeacherRepository;
class TeacherService
{
    public $repository;

    public function __construct()
    {
        $this->repository=new TeacherRepository();
    }

    public function create(CreateForm $form):Teachers
    {
        $teacher=Teachers::create($form);
        if($teacher->save())
            throw new \DomainException($teacher->errors);
        return $teacher;

    }

    public function edit($id,EditForm $form):void
    {
        $teacher=$this->repository->get($id);
        if(!$teacher)
            throw new \DomainException('Учитель не найден');
        $teacher->edit($form);
        if(!$teacher->save())
            throw new \DomainException($teacher->errors);
    }

}
