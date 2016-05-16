<?php
namespace App\Domain\Teacher;

interface TeacherRepository
{
	public function create($data);

	public function update($data, $id);

	public function save($object);

	public function delete($object);

	public function find($id);

	public function findAll();
}