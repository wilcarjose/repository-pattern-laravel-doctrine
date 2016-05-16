<?php
namespace App\Infrastructure\Teacher;

use App\Domain\Teacher\TeacherRepository;
use App\Infrastructure\DoctrineBaseRepository;

class DoctrineTeacherRepository extends DoctrineBaseRepository implements TeacherRepository 
{

}