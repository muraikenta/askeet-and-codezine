<?php


abstract class BaseBbsdataPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'bbsdata';

	
	const CLASS_DEFAULT = 'lib.model.Bbsdata';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'bbsdata.ID';

	
	const TITLE = 'bbsdata.TITLE';

	
	const AUTHOR = 'bbsdata.AUTHOR';

	
	const MAIL = 'bbsdata.MAIL';

	
	const URL = 'bbsdata.URL';

	
	const BODY = 'bbsdata.BODY';

	
	const PASSWD = 'bbsdata.PASSWD';

	
	const PARENT_ID = 'bbsdata.PARENT_ID';

	
	const CREATED_AT = 'bbsdata.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Title', 'Author', 'Mail', 'Url', 'Body', 'Passwd', 'ParentId', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (BbsdataPeer::ID, BbsdataPeer::TITLE, BbsdataPeer::AUTHOR, BbsdataPeer::MAIL, BbsdataPeer::URL, BbsdataPeer::BODY, BbsdataPeer::PASSWD, BbsdataPeer::PARENT_ID, BbsdataPeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'title', 'author', 'mail', 'url', 'body', 'passwd', 'parent_id', 'created_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Title' => 1, 'Author' => 2, 'Mail' => 3, 'Url' => 4, 'Body' => 5, 'Passwd' => 6, 'ParentId' => 7, 'CreatedAt' => 8, ),
		BasePeer::TYPE_COLNAME => array (BbsdataPeer::ID => 0, BbsdataPeer::TITLE => 1, BbsdataPeer::AUTHOR => 2, BbsdataPeer::MAIL => 3, BbsdataPeer::URL => 4, BbsdataPeer::BODY => 5, BbsdataPeer::PASSWD => 6, BbsdataPeer::PARENT_ID => 7, BbsdataPeer::CREATED_AT => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'title' => 1, 'author' => 2, 'mail' => 3, 'url' => 4, 'body' => 5, 'passwd' => 6, 'parent_id' => 7, 'created_at' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/BbsdataMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.BbsdataMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = BbsdataPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(BbsdataPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(BbsdataPeer::ID);

		$criteria->addSelectColumn(BbsdataPeer::TITLE);

		$criteria->addSelectColumn(BbsdataPeer::AUTHOR);

		$criteria->addSelectColumn(BbsdataPeer::MAIL);

		$criteria->addSelectColumn(BbsdataPeer::URL);

		$criteria->addSelectColumn(BbsdataPeer::BODY);

		$criteria->addSelectColumn(BbsdataPeer::PASSWD);

		$criteria->addSelectColumn(BbsdataPeer::PARENT_ID);

		$criteria->addSelectColumn(BbsdataPeer::CREATED_AT);

	}

	const COUNT = 'COUNT(bbsdata.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT bbsdata.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BbsdataPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BbsdataPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BbsdataPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = BbsdataPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return BbsdataPeer::populateObjects(BbsdataPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			BbsdataPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = BbsdataPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return BbsdataPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(BbsdataPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(BbsdataPeer::ID);
			$selectCriteria->add(BbsdataPeer::ID, $criteria->remove(BbsdataPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(BbsdataPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(BbsdataPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Bbsdata) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BbsdataPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Bbsdata $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BbsdataPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BbsdataPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(BbsdataPeer::DATABASE_NAME, BbsdataPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BbsdataPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(BbsdataPeer::DATABASE_NAME);

		$criteria->add(BbsdataPeer::ID, $pk);


		$v = BbsdataPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(BbsdataPeer::ID, $pks, Criteria::IN);
			$objs = BbsdataPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseBbsdataPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/BbsdataMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.BbsdataMapBuilder');
}
