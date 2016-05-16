<?php
namespace App\Infrastructure;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Util\Inflector;

class DoctrineBaseRepository extends EntityRepository
{
	public function create($data)
	{
		$entity = new $this->_entityName();

		return $this->prepare($entity, $data);

	}

	public function update($data, $id)
	{
		$entity = $this->find($id);

		return $this->prepare($entity, $data);
	}

	public function prepare($entity, $data)
	{
		$set = 'set';
		$whitelist = $entity->whitelist();
		
		foreach($whitelist as $field){

			if (isset($data[$field])){
				$setter = $set.Inflector::classify($field); // reurn setName
				$entity->$setter($data[$field]);
			}

		}

		return $entity;
	}	

	public function save($object)
	{
		$this->_em->persist($object);

		$this->_em->flush($object);

		return $object;
	}

	public function delete($object)
	{
		$this->_em->remove($object);

		$this->_em->flush($object);

		return true;
	}
}