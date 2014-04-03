<?php



class BbsdataMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BbsdataMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bbsdata');
		$tMap->setPhpName('Bbsdata');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('AUTHOR', 'Author', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('MAIL', 'Mail', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('URL', 'Url', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('BODY', 'Body', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('PASSWD', 'Passwd', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('PARENT_ID', 'ParentId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 