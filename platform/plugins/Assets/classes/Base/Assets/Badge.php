<?php

/**
 * Autogenerated base class representing badge rows
 * in the Assets database.
 *
 * Don't change this file, since it can be overwritten.
 * Instead, change the Assets_Badge.php file.
 *
 * @module Assets
 */
/**
 * Base class representing 'Badge' rows in the 'Assets' database
 * @class Base_Assets_Badge
 * @extends Db_Row
 *
 * @param {array} [$fields=array()] The fields values to initialize table row as 
 * an associative array of $column => $value pairs
 * @param {string} [$fields.appId] defaults to ""
 * @param {string} [$fields.communityId] defaults to null
 * @param {string} [$fields.name] defaults to ""
 * @param {string} [$fields.icon] defaults to null
 * @param {string} [$fields.title] defaults to ""
 * @param {string} [$fields.description] defaults to null
 * @param {integer} [$fields.points] defaults to 0
 */
abstract class Base_Assets_Badge extends Db_Row
{
	/**
	 * @property $appId
	 * @type string
	 * @default ""
	 * 
	 */
	/**
	 * @property $communityId
	 * @type string
	 * @default null
	 * 
	 */
	/**
	 * @property $name
	 * @type string
	 * @default ""
	 * 
	 */
	/**
	 * @property $icon
	 * @type string
	 * @default null
	 * 
	 */
	/**
	 * @property $title
	 * @type string
	 * @default ""
	 * 
	 */
	/**
	 * @property $description
	 * @type string
	 * @default null
	 * 
	 */
	/**
	 * @property $points
	 * @type integer
	 * @default 0
	 * 
	 */
	/**
	 * The setUp() method is called the first time
	 * an object of this class is constructed.
	 * @method setUp
	 */
	function setUp()
	{
		$this->setDb(self::db());
		$this->setTable(self::table());
		$this->setPrimaryKey(
			array (
			  0 => 'appId',
			  1 => 'name',
			)
		);
	}

	/**
	 * Connects to database
	 * @method db
	 * @static
	 * @return {Db_Interface} The database object
	 */
	static function db()
	{
		return Db::connect('Assets');
	}

	/**
	 * Retrieve the table name to use in SQL statement
	 * @method table
	 * @static
	 * @param {boolean} [$with_db_name=true] Indicates wheather table name should contain the database name
	 * @param {string} [$alias=null] You can optionally provide an alias for the table to be used in queries
 	 * @return {string|Db_Expression} The table name as string optionally without database name if no table sharding
	 * was started or Db_Expression class with prefix and database name templates is table was sharded
	 */
	static function table($with_db_name = true, $alias = null)
	{
		if (Q_Config::get('Db', 'connections', 'Assets', 'indexes', 'Badge', false)) {
			return new Db_Expression(($with_db_name ? '{$dbname}.' : '').'{$prefix}'.'badge');
		} else {
			$conn = Db::getConnection('Assets');
  			$prefix = empty($conn['prefix']) ? '' : $conn['prefix'];
  			$table_name = $prefix . 'badge';
  			if (!$with_db_name)
  				return $table_name;
  			$db = Db::connect('Assets');
			$alias = isset($alias) ? ' '.$alias : '';
  			return $db->dbName().'.'.$table_name.$alias;
		}
	}
	/**
	 * The connection name for the class
	 * @method connectionName
	 * @static
	 * @return {string} The name of the connection
	 */
	static function connectionName()
	{
		return 'Assets';
	}

	/**
	 * Create SELECT query to the class table
	 * @method select
	 * @static
	 * @param {string|array} [$fields=null] The fields as strings, or array of alias=>field.
	 *   The default is to return all fields of the table.
	 * @param {string} [$alias=null] Table alias.
	 * @return {Db_Query_Mysql} The generated query
	 */
	static function select($fields=null, $alias = null)
	{
		if (!isset($fields)) {
			$fieldNames = array();
			$a = isset($alias) ? $alias.'.' : '';
			foreach (self::fieldNames() as $fn) {
				$fieldNames[] = $a .  $fn;
			}
			$fields = implode(',', $fieldNames);
		}
		$alias = isset($alias) ? ' '.$alias : '';
		$q = self::db()->select($fields, self::table(true, $alias));
		$q->className = 'Assets_Badge';
		return $q;
	}

	/**
	 * Create UPDATE query to the class table
	 * @method update
	 * @static
	 * @param {string} [$alias=null] Table alias
	 * @return {Db_Query_Mysql} The generated query
	 */
	static function update($alias = null)
	{
		$alias = isset($alias) ? ' '.$alias : '';
		$q = self::db()->update(self::table(true, $alias));
		$q->className = 'Assets_Badge';
		return $q;
	}

	/**
	 * Create DELETE query to the class table
	 * @method delete
	 * @static
	 * @param {object} [$table_using=null] If set, adds a USING clause with this table
	 * @param {string} [$alias=null] Table alias
	 * @return {Db_Query_Mysql} The generated query
	 */
	static function delete($table_using = null, $alias = null)
	{
		$alias = isset($alias) ? ' '.$alias : '';
		$q = self::db()->delete(self::table(true, $alias), $table_using);
		$q->className = 'Assets_Badge';
		return $q;
	}

	/**
	 * Create INSERT query to the class table
	 * @method insert
	 * @static
	 * @param {object} [$fields=array()] The fields as an associative array of column => value pairs
	 * @param {string} [$alias=null] Table alias
	 * @return {Db_Query_Mysql} The generated query
	 */
	static function insert($fields = array(), $alias = null)
	{
		$alias = isset($alias) ? ' '.$alias : '';
		$q = self::db()->insert(self::table(true, $alias), $fields);
		$q->className = 'Assets_Badge';
		return $q;
	}
	
	/**
	 * Inserts multiple rows into a single table, preparing the statement only once,
	 * and executes all the queries.
	 * @method insertManyAndExecute
	 * @static
	 * @param {array} [$rows=array()] The array of rows to insert. 
	 * (The field names for the prepared statement are taken from the first row.)
	 * You cannot use Db_Expression objects here, because the function binds all parameters with PDO.
	 * @param {array} [$options=array()]
	 *   An associative array of options, including:
	 *
	 * * "chunkSize" {integer} The number of rows to insert at a time. defaults to 20.<br>
	 * * "onDuplicateKeyUpdate" {array} You can put an array of fieldname => value pairs here,
	 * 		which will add an ON DUPLICATE KEY UPDATE clause to the query.
	 *
	 */
	static function insertManyAndExecute($rows = array(), $options = array())
	{
		self::db()->insertManyAndExecute(
			self::table(), $rows,
			array_merge($options, array('className' => 'Assets_Badge'))
		);
	}
	
	/**
	 * Create raw query with begin clause
	 * You'll have to specify shards yourself when calling execute().
	 * @method begin
	 * @static
	 * @param {string} [$lockType=null] First parameter to pass to query->begin() function
	 * @return {Db_Query_Mysql} The generated query
	 */
	static function begin($lockType = null)
	{
		$q = self::db()->rawQuery('')->begin($lockType);
		$q->className = 'Assets_Badge';
		return $q;
	}
	
	/**
	 * Create raw query with commit clause
	 * You'll have to specify shards yourself when calling execute().
	 * @method commit
	 * @static
	 * @return {Db_Query_Mysql} The generated query
	 */
	static function commit()
	{
		$q = self::db()->rawQuery('')->commit();
		$q->className = 'Assets_Badge';
		return $q;
	}
	
	/**
	 * Create raw query with rollback clause
	 * @method rollback
	 * @static
	 * @param {array} $criteria Can be used to target the rollback to some shards.
	 *  Otherwise you'll have to specify shards yourself when calling execute().
	 * @return {Db_Query_Mysql} The generated query
	 */
	static function rollback()
	{
		$q = self::db()->rawQuery('')->rollback();
		$q->className = 'Assets_Badge';
		return $q;
	}
	
	/**
	 * Method is called before setting the field and verifies if value is string of length within acceptable limit.
	 * Optionally accept numeric value which is converted to string
	 * @method beforeSet_appId
	 * @param {string} $value
	 * @return {array} An array of field name and value
	 * @throws {Exception} An exception is thrown if $value is not string or is exceedingly long
	 */
	function beforeSet_appId($value)
	{
		if (!isset($value)) {
			$value='';
		}
		if ($value instanceof Db_Expression) {
			return array('appId', $value);
		}
		if (!is_string($value) and !is_numeric($value))
			throw new Exception('Must pass a string to '.$this->getTable().".appId");
		if (strlen($value) > 31)
			throw new Exception('Exceedingly long value being assigned to '.$this->getTable().".appId");
		return array('appId', $value);			
	}

	/**
	 * Returns the maximum string length that can be assigned to the appId field
	 * @return {integer}
	 */
	function maxSize_appId()
	{

		return 31;			
	}

	/**
	 * Returns schema information for appId column
	 * @return {array} [[typeName, displayRange, modifiers, unsigned], isNull, key, default]
	 */
	static function column_appId()
	{

return array (
  0 => 
  array (
    0 => 'varbinary',
    1 => '31',
    2 => '',
    3 => false,
  ),
  1 => false,
  2 => 'PRI',
  3 => NULL,
);			
	}

	/**
	 * Method is called before setting the field and verifies if value is string of length within acceptable limit.
	 * Optionally accept numeric value which is converted to string
	 * @method beforeSet_communityId
	 * @param {string} $value
	 * @return {array} An array of field name and value
	 * @throws {Exception} An exception is thrown if $value is not string or is exceedingly long
	 */
	function beforeSet_communityId($value)
	{
		if (!isset($value)) {
			return array('communityId', $value);
		}
		if ($value instanceof Db_Expression) {
			return array('communityId', $value);
		}
		if (!is_string($value) and !is_numeric($value))
			throw new Exception('Must pass a string to '.$this->getTable().".communityId");
		if (strlen($value) > 31)
			throw new Exception('Exceedingly long value being assigned to '.$this->getTable().".communityId");
		return array('communityId', $value);			
	}

	/**
	 * Returns the maximum string length that can be assigned to the communityId field
	 * @return {integer}
	 */
	function maxSize_communityId()
	{

		return 31;			
	}

	/**
	 * Returns schema information for communityId column
	 * @return {array} [[typeName, displayRange, modifiers, unsigned], isNull, key, default]
	 */
	static function column_communityId()
	{

return array (
  0 => 
  array (
    0 => 'varbinary',
    1 => '31',
    2 => '',
    3 => false,
  ),
  1 => true,
  2 => '',
  3 => NULL,
);			
	}

	/**
	 * Method is called before setting the field and verifies if value is string of length within acceptable limit.
	 * Optionally accept numeric value which is converted to string
	 * @method beforeSet_name
	 * @param {string} $value
	 * @return {array} An array of field name and value
	 * @throws {Exception} An exception is thrown if $value is not string or is exceedingly long
	 */
	function beforeSet_name($value)
	{
		if (!isset($value)) {
			$value='';
		}
		if ($value instanceof Db_Expression) {
			return array('name', $value);
		}
		if (!is_string($value) and !is_numeric($value))
			throw new Exception('Must pass a string to '.$this->getTable().".name");
		if (strlen($value) > 255)
			throw new Exception('Exceedingly long value being assigned to '.$this->getTable().".name");
		return array('name', $value);			
	}

	/**
	 * Returns the maximum string length that can be assigned to the name field
	 * @return {integer}
	 */
	function maxSize_name()
	{

		return 255;			
	}

	/**
	 * Returns schema information for name column
	 * @return {array} [[typeName, displayRange, modifiers, unsigned], isNull, key, default]
	 */
	static function column_name()
	{

return array (
  0 => 
  array (
    0 => 'varchar',
    1 => '255',
    2 => '',
    3 => false,
  ),
  1 => false,
  2 => 'PRI',
  3 => NULL,
);			
	}

	/**
	 * Method is called before setting the field and verifies if value is string of length within acceptable limit.
	 * Optionally accept numeric value which is converted to string
	 * @method beforeSet_icon
	 * @param {string} $value
	 * @return {array} An array of field name and value
	 * @throws {Exception} An exception is thrown if $value is not string or is exceedingly long
	 */
	function beforeSet_icon($value)
	{
		if (!isset($value)) {
			return array('icon', $value);
		}
		if ($value instanceof Db_Expression) {
			return array('icon', $value);
		}
		if (!is_string($value) and !is_numeric($value))
			throw new Exception('Must pass a string to '.$this->getTable().".icon");
		if (strlen($value) > 255)
			throw new Exception('Exceedingly long value being assigned to '.$this->getTable().".icon");
		return array('icon', $value);			
	}

	/**
	 * Returns the maximum string length that can be assigned to the icon field
	 * @return {integer}
	 */
	function maxSize_icon()
	{

		return 255;			
	}

	/**
	 * Returns schema information for icon column
	 * @return {array} [[typeName, displayRange, modifiers, unsigned], isNull, key, default]
	 */
	static function column_icon()
	{

return array (
  0 => 
  array (
    0 => 'varbinary',
    1 => '255',
    2 => '',
    3 => false,
  ),
  1 => true,
  2 => '',
  3 => NULL,
);			
	}

	/**
	 * Method is called before setting the field and verifies if value is string of length within acceptable limit.
	 * Optionally accept numeric value which is converted to string
	 * @method beforeSet_title
	 * @param {string} $value
	 * @return {array} An array of field name and value
	 * @throws {Exception} An exception is thrown if $value is not string or is exceedingly long
	 */
	function beforeSet_title($value)
	{
		if (!isset($value)) {
			$value='';
		}
		if ($value instanceof Db_Expression) {
			return array('title', $value);
		}
		if (!is_string($value) and !is_numeric($value))
			throw new Exception('Must pass a string to '.$this->getTable().".title");
		if (strlen($value) > 255)
			throw new Exception('Exceedingly long value being assigned to '.$this->getTable().".title");
		return array('title', $value);			
	}

	/**
	 * Returns the maximum string length that can be assigned to the title field
	 * @return {integer}
	 */
	function maxSize_title()
	{

		return 255;			
	}

	/**
	 * Returns schema information for title column
	 * @return {array} [[typeName, displayRange, modifiers, unsigned], isNull, key, default]
	 */
	static function column_title()
	{

return array (
  0 => 
  array (
    0 => 'varchar',
    1 => '255',
    2 => '',
    3 => false,
  ),
  1 => false,
  2 => '',
  3 => NULL,
);			
	}

	/**
	 * Method is called before setting the field and verifies if value is string of length within acceptable limit.
	 * Optionally accept numeric value which is converted to string
	 * @method beforeSet_description
	 * @param {string} $value
	 * @return {array} An array of field name and value
	 * @throws {Exception} An exception is thrown if $value is not string or is exceedingly long
	 */
	function beforeSet_description($value)
	{
		if (!isset($value)) {
			return array('description', $value);
		}
		if ($value instanceof Db_Expression) {
			return array('description', $value);
		}
		if (!is_string($value) and !is_numeric($value))
			throw new Exception('Must pass a string to '.$this->getTable().".description");
		if (strlen($value) > 65535)
			throw new Exception('Exceedingly long value being assigned to '.$this->getTable().".description");
		return array('description', $value);			
	}

	/**
	 * Returns the maximum string length that can be assigned to the description field
	 * @return {integer}
	 */
	function maxSize_description()
	{

		return 65535;			
	}

	/**
	 * Returns schema information for description column
	 * @return {array} [[typeName, displayRange, modifiers, unsigned], isNull, key, default]
	 */
	static function column_description()
	{

return array (
  0 => 
  array (
    0 => 'text',
    1 => 65535,
    2 => '',
    3 => false,
  ),
  1 => true,
  2 => '',
  3 => NULL,
);			
	}

	/**
	 * Method is called before setting the field and verifies if integer value falls within allowed limits
	 * @method beforeSet_points
	 * @param {integer} $value
	 * @return {array} An array of field name and value
	 * @throws {Exception} An exception is thrown if $value is not integer or does not fit in allowed range
	 */
	function beforeSet_points($value)
	{
		if ($value instanceof Db_Expression) {
			return array('points', $value);
		}
		if (!is_numeric($value) or floor($value) != $value)
			throw new Exception('Non-integer value being assigned to '.$this->getTable().".points");
		$value = intval($value);
		if ($value < -32768 or $value > 32767) {
			$json = json_encode($value);
			throw new Exception("Out-of-range value $json being assigned to ".$this->getTable().".points");
		}
		return array('points', $value);			
	}

	/**
	 * @method maxSize_points
	 * Returns the maximum integer that can be assigned to the points field
	 * @return {integer}
	 */
	function maxSize_points()
	{

		return 32767;			
	}

	/**
	 * Returns schema information for points column
	 * @return {array} [[typeName, displayRange, modifiers, unsigned], isNull, key, default]
	 */
	static function column_points()
	{

return array (
  0 => 
  array (
    0 => 'smallint',
    1 => '4',
    2 => '',
    3 => false,
  ),
  1 => false,
  2 => '',
  3 => '0',
);			
	}

	/**
	 * Check if mandatory fields are set and updates 'magic fields' with appropriate values
	 * @method beforeSave
	 * @param {array} $value The array of fields
	 * @return {array}
	 * @throws {Exception} If mandatory field is not set
	 */
	function beforeSave($value)
	{
		if (!$this->retrieved) {
			$table = $this->getTable();
			foreach (array('appId','name') as $name) {
				if (!isset($value[$name])) {
					throw new Exception("the field $table.$name needs a value, because it is NOT NULL, not auto_increment, and lacks a default value.");
				}
			}
		}
		return $value;			
	}

	/**
	 * Retrieves field names for class table
	 * @method fieldNames
	 * @static
	 * @param {string} [$table_alias=null] If set, the alieas is added to each field
	 * @param {string} [$field_alias_prefix=null] If set, the method returns associative array of ('prefixed field' => 'field') pairs
	 * @return {array} An array of field names
	 */
	static function fieldNames($table_alias = null, $field_alias_prefix = null)
	{
		$field_names = array('appId', 'communityId', 'name', 'icon', 'title', 'description', 'points');
		$result = $field_names;
		if (!empty($table_alias)) {
			$temp = array();
			foreach ($result as $field_name)
				$temp[] = $table_alias . '.' . $field_name;
			$result = $temp;
		} 
		if (!empty($field_alias_prefix)) {
			$temp = array();
			reset($field_names);
			foreach ($result as $field_name) {
				$temp[$field_alias_prefix . current($field_names)] = $field_name;
				next($field_names);
			}
			$result = $temp;
		}
		return $result;			
	}
};