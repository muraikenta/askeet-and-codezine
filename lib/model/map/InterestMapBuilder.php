<?php



class InterestMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InterestMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('interest');
		$tMap->setPhpName('Interest');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('QUESTION_ID', 'QuestionId', 'int' , CreoleTypes::INTEGER, 'question', 'ID', true, null);

		$tMap->addForeignPrimaryKey('USER_ID', 'UserId', 'int' , CreoleTypes::INTEGER, 'user', 'ID', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 