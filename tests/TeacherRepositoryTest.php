<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Domain\Teacher\TeacherRepository;
use App\Domain\Teacher\Teacher;

class TeacherRepositoryTest extends TestCase
{
	protected $repository;

	protected static $teacher;
    
    public function setUp()
    {
    	parent::setUp();

    	$this->repository = App::make(TeacherRepository::class);
    }

    public function testCreateAndSave()
    {
    	$data = array(
    		'name' => 'foo'
    		);

    	$teacher = $this->repository->create($data);

    	self::$teacher = $this->repository->save($teacher);

        $this->seeInDatabase('teachers',['id'=>self::$teacher->getId()]);
    }

    public function testUpdateAndSave()
    {
    	$data = array(
    		'name' => 'bar'
    		);

    	$teacher = $this->repository->update($data, self::$teacher->getId());

    	self::$teacher = $this->repository->save($teacher);

        $this->assertEquals($data['name'],self::$teacher->getName());
    }

    public function testFindAll()
    {
    	$teachers = $this->repository->findAll();

    	$this->assertContainsOnlyInstancesOf(Teacher::class, $teachers);
    }

    public function testDelete()
    {
    	$teacher = $this->repository->find(self::$teacher->getId());

    	$result = $this->repository->delete($teacher);

    	$this->assertTrue($result);
    }

}
