<?php


abstract class BaseBbsdata extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $title;


	
	protected $author;


	
	protected $mail;


	
	protected $url;


	
	protected $body;


	
	protected $passwd;


	
	protected $parent_id;


	
	protected $created_at;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getAuthor()
	{

		return $this->author;
	}

	
	public function getMail()
	{

		return $this->mail;
	}

	
	public function getUrl()
	{

		return $this->url;
	}

	
	public function getBody()
	{

		return $this->body;
	}

	
	public function getPasswd()
	{

		return $this->passwd;
	}

	
	public function getParentId()
	{

		return $this->parent_id;
	}

	
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->created_at === null || $this->created_at === '') {
			return null;
		} elseif (!is_int($this->created_at)) {
						$ts = strtotime($this->created_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
			}
		} else {
			$ts = $this->created_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = BbsdataPeer::ID;
		}

	} 
	
	public function setTitle($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = BbsdataPeer::TITLE;
		}

	} 
	
	public function setAuthor($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->author !== $v) {
			$this->author = $v;
			$this->modifiedColumns[] = BbsdataPeer::AUTHOR;
		}

	} 
	
	public function setMail($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mail !== $v) {
			$this->mail = $v;
			$this->modifiedColumns[] = BbsdataPeer::MAIL;
		}

	} 
	
	public function setUrl($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->url !== $v) {
			$this->url = $v;
			$this->modifiedColumns[] = BbsdataPeer::URL;
		}

	} 
	
	public function setBody($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->body !== $v) {
			$this->body = $v;
			$this->modifiedColumns[] = BbsdataPeer::BODY;
		}

	} 
	
	public function setPasswd($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->passwd !== $v) {
			$this->passwd = $v;
			$this->modifiedColumns[] = BbsdataPeer::PASSWD;
		}

	} 
	
	public function setParentId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->parent_id !== $v) {
			$this->parent_id = $v;
			$this->modifiedColumns[] = BbsdataPeer::PARENT_ID;
		}

	} 
	
	public function setCreatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created_at !== $ts) {
			$this->created_at = $ts;
			$this->modifiedColumns[] = BbsdataPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->title = $rs->getString($startcol + 1);

			$this->author = $rs->getString($startcol + 2);

			$this->mail = $rs->getString($startcol + 3);

			$this->url = $rs->getString($startcol + 4);

			$this->body = $rs->getString($startcol + 5);

			$this->passwd = $rs->getString($startcol + 6);

			$this->parent_id = $rs->getInt($startcol + 7);

			$this->created_at = $rs->getTimestamp($startcol + 8, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Bbsdata object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(BbsdataPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BbsdataPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(BbsdataPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(BbsdataPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = BbsdataPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BbsdataPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = BbsdataPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BbsdataPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getTitle();
				break;
			case 2:
				return $this->getAuthor();
				break;
			case 3:
				return $this->getMail();
				break;
			case 4:
				return $this->getUrl();
				break;
			case 5:
				return $this->getBody();
				break;
			case 6:
				return $this->getPasswd();
				break;
			case 7:
				return $this->getParentId();
				break;
			case 8:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BbsdataPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTitle(),
			$keys[2] => $this->getAuthor(),
			$keys[3] => $this->getMail(),
			$keys[4] => $this->getUrl(),
			$keys[5] => $this->getBody(),
			$keys[6] => $this->getPasswd(),
			$keys[7] => $this->getParentId(),
			$keys[8] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BbsdataPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setTitle($value);
				break;
			case 2:
				$this->setAuthor($value);
				break;
			case 3:
				$this->setMail($value);
				break;
			case 4:
				$this->setUrl($value);
				break;
			case 5:
				$this->setBody($value);
				break;
			case 6:
				$this->setPasswd($value);
				break;
			case 7:
				$this->setParentId($value);
				break;
			case 8:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BbsdataPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTitle($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAuthor($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMail($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUrl($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setBody($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPasswd($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setParentId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedAt($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BbsdataPeer::DATABASE_NAME);

		if ($this->isColumnModified(BbsdataPeer::ID)) $criteria->add(BbsdataPeer::ID, $this->id);
		if ($this->isColumnModified(BbsdataPeer::TITLE)) $criteria->add(BbsdataPeer::TITLE, $this->title);
		if ($this->isColumnModified(BbsdataPeer::AUTHOR)) $criteria->add(BbsdataPeer::AUTHOR, $this->author);
		if ($this->isColumnModified(BbsdataPeer::MAIL)) $criteria->add(BbsdataPeer::MAIL, $this->mail);
		if ($this->isColumnModified(BbsdataPeer::URL)) $criteria->add(BbsdataPeer::URL, $this->url);
		if ($this->isColumnModified(BbsdataPeer::BODY)) $criteria->add(BbsdataPeer::BODY, $this->body);
		if ($this->isColumnModified(BbsdataPeer::PASSWD)) $criteria->add(BbsdataPeer::PASSWD, $this->passwd);
		if ($this->isColumnModified(BbsdataPeer::PARENT_ID)) $criteria->add(BbsdataPeer::PARENT_ID, $this->parent_id);
		if ($this->isColumnModified(BbsdataPeer::CREATED_AT)) $criteria->add(BbsdataPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BbsdataPeer::DATABASE_NAME);

		$criteria->add(BbsdataPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setTitle($this->title);

		$copyObj->setAuthor($this->author);

		$copyObj->setMail($this->mail);

		$copyObj->setUrl($this->url);

		$copyObj->setBody($this->body);

		$copyObj->setPasswd($this->passwd);

		$copyObj->setParentId($this->parent_id);

		$copyObj->setCreatedAt($this->created_at);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new BbsdataPeer();
		}
		return self::$peer;
	}

} 