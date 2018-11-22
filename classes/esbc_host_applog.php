<?php
namespace PHPMaker2019\esbc_public_20181122;

/**
 * Table class for esbc_host_applog
 */
class esbc_host_applog extends DbTable
{
	protected $SqlFrom = "";
	protected $SqlSelect = "";
	protected $SqlSelectList = "";
	protected $SqlWhere = "";
	protected $SqlGroupBy = "";
	protected $SqlHaving = "";
	protected $SqlOrderBy = "";
	public $UseSessionForListSql = TRUE;

	// Column CSS classes
	public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
	public $RightColumnClass = "col-sm-10";
	public $OffsetColumnClass = "col-sm-10 offset-sm-2";
	public $TableLeftColumnClass = "w-col-2";

	// Export
	public $ExportDoc;

	// Fields
	public $LOG_INDEX;
	public $NICK_NAME;
	public $HOST_IP;
	public $HOST_ROOT_ID;
	public $HOST_ROOT_PWD;
	public $ACC40_PWD;
	public $ACC40;
	public $ENODE;
	public $GENESIS;
	public $GETH_CMD;
	public $HOST_CONFIG_LOG;
	public $B18_LOG;
	public $_1F_LOG;
	public $Create_Date;
	public $ACTIVE;
	public $Modify_Date;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'esbc_host_applog';
		$this->TableName = 'esbc_host_applog';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`esbc_host_applog`";
		$this->Dbid = 'DB';
		$this->ExportAll = FALSE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = 0; // User ID Allow
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// LOG_INDEX
		$this->LOG_INDEX = new DbField('esbc_host_applog', 'esbc_host_applog', 'x_LOG_INDEX', 'LOG_INDEX', '`LOG_INDEX`', '`LOG_INDEX`', 3, -1, FALSE, '`LOG_INDEX`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->LOG_INDEX->IsAutoIncrement = TRUE; // Autoincrement field
		$this->LOG_INDEX->IsPrimaryKey = TRUE; // Primary key field
		$this->LOG_INDEX->Sortable = TRUE; // Allow sort
		$this->LOG_INDEX->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['LOG_INDEX'] = &$this->LOG_INDEX;

		// NICK_NAME
		$this->NICK_NAME = new DbField('esbc_host_applog', 'esbc_host_applog', 'x_NICK_NAME', 'NICK_NAME', '`NICK_NAME`', '`NICK_NAME`', 200, -1, FALSE, '`NICK_NAME`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NICK_NAME->Sortable = TRUE; // Allow sort
		$this->fields['NICK_NAME'] = &$this->NICK_NAME;

		// HOST_IP
		$this->HOST_IP = new DbField('esbc_host_applog', 'esbc_host_applog', 'x_HOST_IP', 'HOST_IP', '`HOST_IP`', '`HOST_IP`', 200, -1, FALSE, '`HOST_IP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HOST_IP->Nullable = FALSE; // NOT NULL field
		$this->HOST_IP->Required = TRUE; // Required field
		$this->HOST_IP->Sortable = TRUE; // Allow sort
		$this->fields['HOST_IP'] = &$this->HOST_IP;

		// HOST_ROOT_ID
		$this->HOST_ROOT_ID = new DbField('esbc_host_applog', 'esbc_host_applog', 'x_HOST_ROOT_ID', 'HOST_ROOT_ID', '`HOST_ROOT_ID`', '`HOST_ROOT_ID`', 200, -1, FALSE, '`HOST_ROOT_ID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HOST_ROOT_ID->Sortable = TRUE; // Allow sort
		$this->fields['HOST_ROOT_ID'] = &$this->HOST_ROOT_ID;

		// HOST_ROOT_PWD
		$this->HOST_ROOT_PWD = new DbField('esbc_host_applog', 'esbc_host_applog', 'x_HOST_ROOT_PWD', 'HOST_ROOT_PWD', '`HOST_ROOT_PWD`', '`HOST_ROOT_PWD`', 200, -1, FALSE, '`HOST_ROOT_PWD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HOST_ROOT_PWD->Sortable = TRUE; // Allow sort
		$this->fields['HOST_ROOT_PWD'] = &$this->HOST_ROOT_PWD;

		// ACC40_PWD
		$this->ACC40_PWD = new DbField('esbc_host_applog', 'esbc_host_applog', 'x_ACC40_PWD', 'ACC40_PWD', '`ACC40_PWD`', '`ACC40_PWD`', 201, -1, FALSE, '`ACC40_PWD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ACC40_PWD->Sortable = TRUE; // Allow sort
		$this->fields['ACC40_PWD'] = &$this->ACC40_PWD;

		// ACC40
		$this->ACC40 = new DbField('esbc_host_applog', 'esbc_host_applog', 'x_ACC40', 'ACC40', '`ACC40`', '`ACC40`', 201, -1, FALSE, '`ACC40`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ACC40->Sortable = TRUE; // Allow sort
		$this->fields['ACC40'] = &$this->ACC40;

		// ENODE
		$this->ENODE = new DbField('esbc_host_applog', 'esbc_host_applog', 'x_ENODE', 'ENODE', '`ENODE`', '`ENODE`', 201, -1, FALSE, '`ENODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ENODE->Sortable = TRUE; // Allow sort
		$this->fields['ENODE'] = &$this->ENODE;

		// GENESIS
		$this->GENESIS = new DbField('esbc_host_applog', 'esbc_host_applog', 'x_GENESIS', 'GENESIS', '`GENESIS`', '`GENESIS`', 201, -1, FALSE, '`GENESIS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->GENESIS->Sortable = TRUE; // Allow sort
		$this->fields['GENESIS'] = &$this->GENESIS;

		// GETH_CMD
		$this->GETH_CMD = new DbField('esbc_host_applog', 'esbc_host_applog', 'x_GETH_CMD', 'GETH_CMD', '`GETH_CMD`', '`GETH_CMD`', 201, -1, FALSE, '`GETH_CMD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->GETH_CMD->Sortable = TRUE; // Allow sort
		$this->fields['GETH_CMD'] = &$this->GETH_CMD;

		// HOST_CONFIG_LOG
		$this->HOST_CONFIG_LOG = new DbField('esbc_host_applog', 'esbc_host_applog', 'x_HOST_CONFIG_LOG', 'HOST_CONFIG_LOG', '`HOST_CONFIG_LOG`', '`HOST_CONFIG_LOG`', 201, -1, FALSE, '`HOST_CONFIG_LOG`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->HOST_CONFIG_LOG->Sortable = TRUE; // Allow sort
		$this->fields['HOST_CONFIG_LOG'] = &$this->HOST_CONFIG_LOG;

		// B18_LOG
		$this->B18_LOG = new DbField('esbc_host_applog', 'esbc_host_applog', 'x_B18_LOG', 'B18_LOG', '`B18_LOG`', '`B18_LOG`', 201, -1, FALSE, '`B18_LOG`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->B18_LOG->Sortable = TRUE; // Allow sort
		$this->fields['B18_LOG'] = &$this->B18_LOG;

		// 1F_LOG
		$this->_1F_LOG = new DbField('esbc_host_applog', 'esbc_host_applog', 'x__1F_LOG', '1F_LOG', '`1F_LOG`', '`1F_LOG`', 201, -1, FALSE, '`1F_LOG`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->_1F_LOG->Sortable = TRUE; // Allow sort
		$this->fields['1F_LOG'] = &$this->_1F_LOG;

		// Create_Date
		$this->Create_Date = new DbField('esbc_host_applog', 'esbc_host_applog', 'x_Create_Date', 'Create_Date', '`Create_Date`', CastDateFieldForLike('`Create_Date`', 1, "DB"), 135, 1, FALSE, '`Create_Date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Create_Date->Sortable = TRUE; // Allow sort
		$this->Create_Date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->Phrase("IncorrectDate"));
		$this->fields['Create_Date'] = &$this->Create_Date;

		// ACTIVE
		$this->ACTIVE = new DbField('esbc_host_applog', 'esbc_host_applog', 'x_ACTIVE', 'ACTIVE', '`ACTIVE`', '`ACTIVE`', 16, -1, FALSE, '`ACTIVE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->ACTIVE->Nullable = FALSE; // NOT NULL field
		$this->ACTIVE->Sortable = TRUE; // Allow sort
		$this->ACTIVE->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ACTIVE->PleaseSelectText = $Language->Phrase("PleaseSelect"); // PleaseSelect text
		switch ($CurrentLanguage) {
			case "zh-CN":
				$this->ACTIVE->Lookup = new Lookup('ACTIVE', 'esbc_host_applog', FALSE, '', ["","","",""], [], [], [], [], [], '', '');
				break;
			case "zh-TW":
				$this->ACTIVE->Lookup = new Lookup('ACTIVE', 'esbc_host_applog', FALSE, '', ["","","",""], [], [], [], [], [], '', '');
				break;
			case "en":
				$this->ACTIVE->Lookup = new Lookup('ACTIVE', 'esbc_host_applog', FALSE, '', ["","","",""], [], [], [], [], [], '', '');
				break;
			default:
				$this->ACTIVE->Lookup = new Lookup('ACTIVE', 'esbc_host_applog', FALSE, '', ["","","",""], [], [], [], [], [], '', '');
				break;
		}
		$this->ACTIVE->OptionCount = 2;
		$this->ACTIVE->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['ACTIVE'] = &$this->ACTIVE;

		// Modify_Date
		$this->Modify_Date = new DbField('esbc_host_applog', 'esbc_host_applog', 'x_Modify_Date', 'Modify_Date', '`Modify_Date`', CastDateFieldForLike('`Modify_Date`', 1, "DB"), 135, 1, FALSE, '`Modify_Date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Modify_Date->Sortable = TRUE; // Allow sort
		$this->Modify_Date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->Phrase("IncorrectDate"));
		$this->fields['Modify_Date'] = &$this->Modify_Date;
	}

	// Field Visibility
	public function getFieldVisibility($fldParm)
	{
		global $Security;
		return $this->$fldParm->Visible; // Returns original value
	}

	// Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
	function setLeftColumnClass($class)
	{
		if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
			$this->LeftColumnClass = $class . " col-form-label ew-label";
			$this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - (int)$match[2]);
			$this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace("col-", "offset-", $class);
			$this->TableLeftColumnClass = preg_replace('/^col-\w+-(\d+)$/', "w-col-$1", $class); // Change to w-col-*
		}
	}

	// Single column sort
	public function updateSort(&$fld)
	{
		if ($this->CurrentOrder == $fld->Name) {
			$sortField = $fld->Expression;
			$lastSort = $fld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$thisSort = $this->CurrentOrderType;
			} else {
				$thisSort = ($lastSort == "ASC") ? "DESC" : "ASC";
			}
			$fld->setSort($thisSort);
			$this->setSessionOrderBy($sortField . " " . $thisSort); // Save to Session
		} else {
			$fld->setSort("");
		}
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`esbc_host_applog`";
	}
	public function sqlFrom() // For backward compatibility
	{
		return $this->getSqlFrom();
	}
	public function setSqlFrom($v)
	{
		$this->SqlFrom = $v;
	}
	public function getSqlSelect() // Select
	{
		return ($this->SqlSelect <> "") ? $this->SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}
	public function sqlSelect() // For backward compatibility
	{
		return $this->getSqlSelect();
	}
	public function setSqlSelect($v)
	{
		$this->SqlSelect = $v;
	}
	public function getSqlWhere() // Where
	{
		$where = ($this->SqlWhere <> "") ? $this->SqlWhere : "";
		$this->TableFilter = "";
		AddFilter($where, $this->TableFilter);
		return $where;
	}
	public function sqlWhere() // For backward compatibility
	{
		return $this->getSqlWhere();
	}
	public function setSqlWhere($v)
	{
		$this->SqlWhere = $v;
	}
	public function getSqlGroupBy() // Group By
	{
		return ($this->SqlGroupBy <> "") ? $this->SqlGroupBy : "";
	}
	public function sqlGroupBy() // For backward compatibility
	{
		return $this->getSqlGroupBy();
	}
	public function setSqlGroupBy($v)
	{
		$this->SqlGroupBy = $v;
	}
	public function getSqlHaving() // Having
	{
		return ($this->SqlHaving <> "") ? $this->SqlHaving : "";
	}
	public function sqlHaving() // For backward compatibility
	{
		return $this->getSqlHaving();
	}
	public function setSqlHaving($v)
	{
		$this->SqlHaving = $v;
	}
	public function getSqlOrderBy() // Order By
	{
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "";
	}
	public function sqlOrderBy() // For backward compatibility
	{
		return $this->getSqlOrderBy();
	}
	public function setSqlOrderBy($v)
	{
		$this->SqlOrderBy = $v;
	}

	// Apply User ID filters
	public function applyUserIDFilters($filter)
	{
		return $filter;
	}

	// Check if User ID security allows view all
	public function userIDAllow($id = "")
	{
		$allow = USER_ID_ALLOW;
		switch ($id) {
			case "add":
			case "copy":
			case "gridadd":
			case "register":
			case "addopt":
				return (($allow & 1) == 1);
			case "edit":
			case "gridedit":
			case "update":
			case "changepwd":
			case "forgotpwd":
				return (($allow & 4) == 4);
			case "delete":
				return (($allow & 2) == 2);
			case "view":
				return (($allow & 32) == 32);
			case "search":
				return (($allow & 64) == 64);
			default:
				return (($allow & 8) == 8);
		}
	}

	// Get SQL
	public function getSql($where, $orderBy = "")
	{
		return BuildSelectSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderBy);
	}

	// Table SQL
	public function getCurrentSql()
	{
		$filter = $this->CurrentFilter;
		$filter = $this->applyUserIDFilters($filter);
		$sort = $this->getSessionOrderBy();
		return $this->getSql($filter, $sort);
	}

	// Table SQL with List page filter
	public function getListSql()
	{
		$filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->getSqlSelect();
		$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Get record count
	public function getRecordCount($sql)
	{
		$cnt = -1;
		$rs = NULL;
		$sql = preg_replace('/\/\*BeginOrderBy\*\/[\s\S]+\/\*EndOrderBy\*\//', "", $sql); // Remove ORDER BY clause (MSSQL)
		$pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';

		// Skip Custom View / SubQuery and SELECT DISTINCT
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
			preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) && !preg_match('/^\s*select\s+distinct\s+/i', $sql)) {
			$sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
		} else {
			$sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
		}
		$conn = &$this->getConnection();
		if ($rs = $conn->execute($sqlwrk)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->close();
			}
			return (int)$cnt;
		}

		// Unable to get count, get record count directly
		if ($rs = $conn->execute($sql)) {
			$cnt = $rs->RecordCount();
			$rs->close();
			return (int)$cnt;
		}
		return $cnt;
	}

	// Get record count based on filter (for detail record count in master table pages)
	public function loadRecordCount($filter)
	{
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $filter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
		$cnt = $this->getRecordCount($sql);
		$this->CurrentFilter = $origFilter;
		return $cnt;
	}

	// Get record count (for current List page)
	public function listRecordCount()
	{
		$filter = $this->getSessionWhere();
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		$cnt = $this->getRecordCount($sql);
		return $cnt;
	}

	// INSERT statement
	protected function insertSql(&$rs)
	{
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom)
				continue;
			$names .= $this->fields[$name]->Expression . ",";
			$values .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$names = preg_replace('/,+$/', "", $names);
		$values = preg_replace('/,+$/', "", $values);
		return "INSERT INTO " . $this->UpdateTable . " ($names) VALUES ($values)";
	}

	// Insert
	public function insert(&$rs)
	{
		$conn = &$this->getConnection();
		$success = $conn->execute($this->insertSql($rs));
		if ($success) {

			// Get insert id if necessary
			$this->LOG_INDEX->setDbValue($conn->insert_ID());
			$rs['LOG_INDEX'] = $this->LOG_INDEX->DbValue;
		}
		return $success;
	}

	// UPDATE statement
	protected function updateSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "UPDATE " . $this->UpdateTable . " SET ";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom || $this->fields[$name]->IsPrimaryKey)
				continue;
			$sql .= $this->fields[$name]->Expression . "=";
			$sql .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$sql = preg_replace('/,+$/', "", $sql);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	public function update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE)
	{
		$conn = &$this->getConnection();
		$success = $conn->execute($this->updateSql($rs, $where, $curfilter));
		return $success;
	}

	// DELETE statement
	protected function deleteSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "DELETE FROM " . $this->UpdateTable . " WHERE ";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		if ($rs) {
			if (array_key_exists('LOG_INDEX', $rs))
				AddFilter($where, QuotedName('LOG_INDEX', $this->Dbid) . '=' . QuotedValue($rs['LOG_INDEX'], $this->LOG_INDEX->DataType, $this->Dbid));
		}
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$success = TRUE;
		$conn = &$this->getConnection();
		if ($success)
			$success = $conn->execute($this->deleteSql($rs, $where, $curfilter));
		return $success;
	}

	// Load DbValue from recordset or array
	protected function loadDbValues(&$rs)
	{
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->LOG_INDEX->DbValue = $row['LOG_INDEX'];
		$this->NICK_NAME->DbValue = $row['NICK_NAME'];
		$this->HOST_IP->DbValue = $row['HOST_IP'];
		$this->HOST_ROOT_ID->DbValue = $row['HOST_ROOT_ID'];
		$this->HOST_ROOT_PWD->DbValue = $row['HOST_ROOT_PWD'];
		$this->ACC40_PWD->DbValue = $row['ACC40_PWD'];
		$this->ACC40->DbValue = $row['ACC40'];
		$this->ENODE->DbValue = $row['ENODE'];
		$this->GENESIS->DbValue = $row['GENESIS'];
		$this->GETH_CMD->DbValue = $row['GETH_CMD'];
		$this->HOST_CONFIG_LOG->DbValue = $row['HOST_CONFIG_LOG'];
		$this->B18_LOG->DbValue = $row['B18_LOG'];
		$this->_1F_LOG->DbValue = $row['1F_LOG'];
		$this->Create_Date->DbValue = $row['Create_Date'];
		$this->ACTIVE->DbValue = $row['ACTIVE'];
		$this->Modify_Date->DbValue = $row['Modify_Date'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`LOG_INDEX` = @LOG_INDEX@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('LOG_INDEX', $row) ? $row['LOG_INDEX'] : NULL) : $this->LOG_INDEX->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@LOG_INDEX@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		return $keyFilter;
	}

	// Return page URL
	public function getReturnUrl()
	{
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL;

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") <> "" && ReferPageName() <> CurrentPageName() && ReferPageName() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "esbc_host_apploglist.php";
		}
	}
	public function setReturnUrl($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL] = $v;
	}

	// Get modal caption
	public function getModalCaption($pageName)
	{
		global $Language;
		if ($pageName == "esbc_host_applogview.php")
			return $Language->Phrase("View");
		elseif ($pageName == "esbc_host_applogedit.php")
			return $Language->Phrase("Edit");
		elseif ($pageName == "esbc_host_applogadd.php")
			return $Language->Phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "esbc_host_apploglist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("esbc_host_applogview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("esbc_host_applogview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "esbc_host_applogadd.php?" . $this->getUrlParm($parm);
		else
			$url = "esbc_host_applogadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("esbc_host_applogedit.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline edit URL
	public function getInlineEditUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=edit"));
		return $this->addMasterUrl($url);
	}

	// Copy URL
	public function getCopyUrl($parm = "")
	{
		$url = $this->keyUrl("esbc_host_applogadd.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline copy URL
	public function getInlineCopyUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=copy"));
		return $this->addMasterUrl($url);
	}

	// Delete URL
	public function getDeleteUrl()
	{
		return $this->keyUrl("esbc_host_applogdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "LOG_INDEX:" . JsonEncode($this->LOG_INDEX->CurrentValue, "number");
		$json = "{" . $json . "}";
		if ($htmlEncode)
			$json = HtmlEncode($json);
		return $json;
	}

	// Add key value to URL
	public function keyUrl($url, $parm = "")
	{
		$url = $url . "?";
		if ($parm <> "")
			$url .= $parm . "&";
		if ($this->LOG_INDEX->CurrentValue != NULL) {
			$url .= "LOG_INDEX=" . urlencode($this->LOG_INDEX->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		return $url;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		if ($this->CurrentAction || $this->isExport() ||
			in_array($fld->Type, array(128, 204, 205))) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->reverseSort());
			return $this->addMasterUrl(CurrentPageName() . "?" . $urlParm);
		} else {
			return "";
		}
	}

	// Get record keys from Post/Get/Session
	public function getRecordKeys()
	{
		global $COMPOSITE_KEY_SEPARATOR;
		$arKeys = array();
		$arKey = array();
		if (Param("key_m") !== NULL) {
			$arKeys = Param("key_m");
			$cnt = count($arKeys);
		} else {
			if (Param("LOG_INDEX") !== NULL)
				$arKeys[] = Param("LOG_INDEX");
			elseif (IsApi() && Key(0) !== NULL)
				$arKeys[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKeys[] = Route(2);
			else
				$arKeys = NULL; // Do not setup

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = array();
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_numeric($key))
					continue;
				$ar[] = $key;
			}
		}
		return $ar;
	}

	// Get filter from record keys
	public function getFilterFromRecordKeys()
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter <> "") $keyFilter .= " OR ";
			$this->LOG_INDEX->CurrentValue = $key;
			$keyFilter .= "(" . $this->getRecordFilter() . ")";
		}
		return $keyFilter;
	}

	// Load rows based on filter
	public function &loadRs($filter)
	{

		// Set up filter (WHERE Clause)
		$sql = $this->getSql($filter);
		$conn = &$this->getConnection();
		$rs = $conn->execute($sql);
		return $rs;
	}

	// Load row values from recordset
	public function loadListRowValues(&$rs)
	{
		$this->LOG_INDEX->setDbValue($rs->fields('LOG_INDEX'));
		$this->NICK_NAME->setDbValue($rs->fields('NICK_NAME'));
		$this->HOST_IP->setDbValue($rs->fields('HOST_IP'));
		$this->HOST_ROOT_ID->setDbValue($rs->fields('HOST_ROOT_ID'));
		$this->HOST_ROOT_PWD->setDbValue($rs->fields('HOST_ROOT_PWD'));
		$this->ACC40_PWD->setDbValue($rs->fields('ACC40_PWD'));
		$this->ACC40->setDbValue($rs->fields('ACC40'));
		$this->ENODE->setDbValue($rs->fields('ENODE'));
		$this->GENESIS->setDbValue($rs->fields('GENESIS'));
		$this->GETH_CMD->setDbValue($rs->fields('GETH_CMD'));
		$this->HOST_CONFIG_LOG->setDbValue($rs->fields('HOST_CONFIG_LOG'));
		$this->B18_LOG->setDbValue($rs->fields('B18_LOG'));
		$this->_1F_LOG->setDbValue($rs->fields('1F_LOG'));
		$this->Create_Date->setDbValue($rs->fields('Create_Date'));
		$this->ACTIVE->setDbValue($rs->fields('ACTIVE'));
		$this->Modify_Date->setDbValue($rs->fields('Modify_Date'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

	// Common render codes
		// LOG_INDEX
		// NICK_NAME
		// HOST_IP
		// HOST_ROOT_ID
		// HOST_ROOT_PWD
		// ACC40_PWD
		// ACC40
		// ENODE
		// GENESIS
		// GETH_CMD
		// HOST_CONFIG_LOG
		// B18_LOG
		// 1F_LOG
		// Create_Date
		// ACTIVE
		// Modify_Date
		// LOG_INDEX

		$this->LOG_INDEX->ViewValue = $this->LOG_INDEX->CurrentValue;
		$this->LOG_INDEX->ViewCustomAttributes = "";

		// NICK_NAME
		$this->NICK_NAME->ViewValue = $this->NICK_NAME->CurrentValue;
		$this->NICK_NAME->ViewCustomAttributes = "";

		// HOST_IP
		$this->HOST_IP->ViewValue = $this->HOST_IP->CurrentValue;
		$this->HOST_IP->ViewCustomAttributes = "";

		// HOST_ROOT_ID
		$this->HOST_ROOT_ID->ViewValue = $this->HOST_ROOT_ID->CurrentValue;
		$this->HOST_ROOT_ID->ViewCustomAttributes = "";

		// HOST_ROOT_PWD
		$this->HOST_ROOT_PWD->ViewValue = $this->HOST_ROOT_PWD->CurrentValue;
		$this->HOST_ROOT_PWD->ViewCustomAttributes = "";

		// ACC40_PWD
		$this->ACC40_PWD->ViewValue = $this->ACC40_PWD->CurrentValue;
		$this->ACC40_PWD->ViewCustomAttributes = "";

		// ACC40
		$this->ACC40->ViewValue = $this->ACC40->CurrentValue;
		$this->ACC40->ViewCustomAttributes = "";

		// ENODE
		$this->ENODE->ViewValue = $this->ENODE->CurrentValue;
		$this->ENODE->ViewCustomAttributes = "";

		// GENESIS
		$this->GENESIS->ViewValue = $this->GENESIS->CurrentValue;
		$this->GENESIS->ViewCustomAttributes = "";

		// GETH_CMD
		$this->GETH_CMD->ViewValue = $this->GETH_CMD->CurrentValue;
		$this->GETH_CMD->ViewCustomAttributes = "";

		// HOST_CONFIG_LOG
		$this->HOST_CONFIG_LOG->ViewValue = $this->HOST_CONFIG_LOG->CurrentValue;
		$this->HOST_CONFIG_LOG->ViewCustomAttributes = "";

		// B18_LOG
		$this->B18_LOG->ViewValue = $this->B18_LOG->CurrentValue;
		$this->B18_LOG->ViewCustomAttributes = "";

		// 1F_LOG
		$this->_1F_LOG->ViewValue = $this->_1F_LOG->CurrentValue;
		$this->_1F_LOG->ViewCustomAttributes = "";

		// Create_Date
		$this->Create_Date->ViewValue = $this->Create_Date->CurrentValue;
		$this->Create_Date->ViewValue = FormatDateTime($this->Create_Date->ViewValue, 1);
		$this->Create_Date->ViewCustomAttributes = "";

		// ACTIVE
		if (strval($this->ACTIVE->CurrentValue) <> "") {
			$this->ACTIVE->ViewValue = $this->ACTIVE->optionCaption($this->ACTIVE->CurrentValue);
		} else {
			$this->ACTIVE->ViewValue = NULL;
		}
		$this->ACTIVE->ViewCustomAttributes = "";

		// Modify_Date
		$this->Modify_Date->ViewValue = $this->Modify_Date->CurrentValue;
		$this->Modify_Date->ViewValue = FormatDateTime($this->Modify_Date->ViewValue, 1);
		$this->Modify_Date->ViewCustomAttributes = "";

		// LOG_INDEX
		$this->LOG_INDEX->LinkCustomAttributes = "";
		$this->LOG_INDEX->HrefValue = "";
		$this->LOG_INDEX->TooltipValue = "";

		// NICK_NAME
		$this->NICK_NAME->LinkCustomAttributes = "";
		$this->NICK_NAME->HrefValue = "";
		$this->NICK_NAME->TooltipValue = "";

		// HOST_IP
		$this->HOST_IP->LinkCustomAttributes = "";
		$this->HOST_IP->HrefValue = "";
		$this->HOST_IP->TooltipValue = "";

		// HOST_ROOT_ID
		$this->HOST_ROOT_ID->LinkCustomAttributes = "";
		$this->HOST_ROOT_ID->HrefValue = "";
		$this->HOST_ROOT_ID->TooltipValue = "";

		// HOST_ROOT_PWD
		$this->HOST_ROOT_PWD->LinkCustomAttributes = "";
		$this->HOST_ROOT_PWD->HrefValue = "";
		$this->HOST_ROOT_PWD->TooltipValue = "";

		// ACC40_PWD
		$this->ACC40_PWD->LinkCustomAttributes = "";
		$this->ACC40_PWD->HrefValue = "";
		$this->ACC40_PWD->TooltipValue = "";

		// ACC40
		$this->ACC40->LinkCustomAttributes = "";
		$this->ACC40->HrefValue = "";
		$this->ACC40->TooltipValue = "";

		// ENODE
		$this->ENODE->LinkCustomAttributes = "";
		$this->ENODE->HrefValue = "";
		$this->ENODE->TooltipValue = "";

		// GENESIS
		$this->GENESIS->LinkCustomAttributes = "";
		$this->GENESIS->HrefValue = "";
		$this->GENESIS->TooltipValue = "";

		// GETH_CMD
		$this->GETH_CMD->LinkCustomAttributes = "";
		$this->GETH_CMD->HrefValue = "";
		$this->GETH_CMD->TooltipValue = "";

		// HOST_CONFIG_LOG
		$this->HOST_CONFIG_LOG->LinkCustomAttributes = "";
		$this->HOST_CONFIG_LOG->HrefValue = "";
		$this->HOST_CONFIG_LOG->TooltipValue = "";

		// B18_LOG
		$this->B18_LOG->LinkCustomAttributes = "";
		$this->B18_LOG->HrefValue = "";
		$this->B18_LOG->TooltipValue = "";

		// 1F_LOG
		$this->_1F_LOG->LinkCustomAttributes = "";
		$this->_1F_LOG->HrefValue = "";
		$this->_1F_LOG->TooltipValue = "";

		// Create_Date
		$this->Create_Date->LinkCustomAttributes = "";
		$this->Create_Date->HrefValue = "";
		$this->Create_Date->TooltipValue = "";

		// ACTIVE
		$this->ACTIVE->LinkCustomAttributes = "";
		$this->ACTIVE->HrefValue = "";
		$this->ACTIVE->TooltipValue = "";

		// Modify_Date
		$this->Modify_Date->LinkCustomAttributes = "";
		$this->Modify_Date->HrefValue = "";
		$this->Modify_Date->TooltipValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();

		// Save data for Custom Template
		$this->Rows[] = $this->customTemplateFieldValues();
	}

	// Render edit row values
	public function renderEditRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// LOG_INDEX
		$this->LOG_INDEX->EditAttrs["class"] = "form-control";
		$this->LOG_INDEX->EditCustomAttributes = "";
		$this->LOG_INDEX->EditValue = $this->LOG_INDEX->CurrentValue;
		$this->LOG_INDEX->ViewCustomAttributes = "";

		// NICK_NAME
		$this->NICK_NAME->EditAttrs["class"] = "form-control";
		$this->NICK_NAME->EditCustomAttributes = "";
		$this->NICK_NAME->EditValue = $this->NICK_NAME->CurrentValue;
		$this->NICK_NAME->PlaceHolder = RemoveHtml($this->NICK_NAME->caption());

		// HOST_IP
		$this->HOST_IP->EditAttrs["class"] = "form-control";
		$this->HOST_IP->EditCustomAttributes = "";
		$this->HOST_IP->EditValue = $this->HOST_IP->CurrentValue;
		$this->HOST_IP->PlaceHolder = RemoveHtml($this->HOST_IP->caption());

		// HOST_ROOT_ID
		$this->HOST_ROOT_ID->EditAttrs["class"] = "form-control";
		$this->HOST_ROOT_ID->EditCustomAttributes = "";
		$this->HOST_ROOT_ID->EditValue = $this->HOST_ROOT_ID->CurrentValue;
		$this->HOST_ROOT_ID->PlaceHolder = RemoveHtml($this->HOST_ROOT_ID->caption());

		// HOST_ROOT_PWD
		$this->HOST_ROOT_PWD->EditAttrs["class"] = "form-control";
		$this->HOST_ROOT_PWD->EditCustomAttributes = "";
		$this->HOST_ROOT_PWD->EditValue = $this->HOST_ROOT_PWD->CurrentValue;
		$this->HOST_ROOT_PWD->PlaceHolder = RemoveHtml($this->HOST_ROOT_PWD->caption());

		// ACC40_PWD
		$this->ACC40_PWD->EditAttrs["class"] = "form-control";
		$this->ACC40_PWD->EditCustomAttributes = "";
		$this->ACC40_PWD->EditValue = $this->ACC40_PWD->CurrentValue;
		$this->ACC40_PWD->PlaceHolder = RemoveHtml($this->ACC40_PWD->caption());

		// ACC40
		$this->ACC40->EditAttrs["class"] = "form-control";
		$this->ACC40->EditCustomAttributes = "";
		$this->ACC40->EditValue = $this->ACC40->CurrentValue;
		$this->ACC40->PlaceHolder = RemoveHtml($this->ACC40->caption());

		// ENODE
		$this->ENODE->EditAttrs["class"] = "form-control";
		$this->ENODE->EditCustomAttributes = "";
		$this->ENODE->EditValue = $this->ENODE->CurrentValue;
		$this->ENODE->PlaceHolder = RemoveHtml($this->ENODE->caption());

		// GENESIS
		$this->GENESIS->EditAttrs["class"] = "form-control";
		$this->GENESIS->EditCustomAttributes = "";
		$this->GENESIS->EditValue = $this->GENESIS->CurrentValue;
		$this->GENESIS->PlaceHolder = RemoveHtml($this->GENESIS->caption());

		// GETH_CMD
		$this->GETH_CMD->EditAttrs["class"] = "form-control";
		$this->GETH_CMD->EditCustomAttributes = "";
		$this->GETH_CMD->EditValue = $this->GETH_CMD->CurrentValue;
		$this->GETH_CMD->PlaceHolder = RemoveHtml($this->GETH_CMD->caption());

		// HOST_CONFIG_LOG
		$this->HOST_CONFIG_LOG->EditAttrs["class"] = "form-control";
		$this->HOST_CONFIG_LOG->EditCustomAttributes = "";
		$this->HOST_CONFIG_LOG->EditValue = $this->HOST_CONFIG_LOG->CurrentValue;
		$this->HOST_CONFIG_LOG->PlaceHolder = RemoveHtml($this->HOST_CONFIG_LOG->caption());

		// B18_LOG
		$this->B18_LOG->EditAttrs["class"] = "form-control";
		$this->B18_LOG->EditCustomAttributes = "";
		$this->B18_LOG->EditValue = $this->B18_LOG->CurrentValue;
		$this->B18_LOG->PlaceHolder = RemoveHtml($this->B18_LOG->caption());

		// 1F_LOG
		$this->_1F_LOG->EditAttrs["class"] = "form-control";
		$this->_1F_LOG->EditCustomAttributes = "";
		$this->_1F_LOG->EditValue = $this->_1F_LOG->CurrentValue;
		$this->_1F_LOG->PlaceHolder = RemoveHtml($this->_1F_LOG->caption());

		// Create_Date
		$this->Create_Date->EditAttrs["class"] = "form-control";
		$this->Create_Date->EditCustomAttributes = "";
		$this->Create_Date->EditValue = FormatDateTime($this->Create_Date->CurrentValue, 8);
		$this->Create_Date->PlaceHolder = RemoveHtml($this->Create_Date->caption());

		// ACTIVE
		$this->ACTIVE->EditAttrs["class"] = "form-control";
		$this->ACTIVE->EditCustomAttributes = "";
		$this->ACTIVE->EditValue = $this->ACTIVE->options(TRUE);

		// Modify_Date
		$this->Modify_Date->EditAttrs["class"] = "form-control";
		$this->Modify_Date->EditCustomAttributes = "";
		$this->Modify_Date->EditValue = FormatDateTime($this->Modify_Date->CurrentValue, 8);
		$this->Modify_Date->PlaceHolder = RemoveHtml($this->Modify_Date->caption());

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/Email/PDF format
	public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
	{
		if (!$recordset || !$doc)
			return;
		if (!$doc->ExportCustom) {

			// Write header
			$doc->exportTableHeader();
			if ($doc->Horizontal) { // Horizontal format, write header
				$doc->beginExportRow();
				if ($exportPageType == "view") {
					if ($this->LOG_INDEX->Exportable)
						$doc->exportCaption($this->LOG_INDEX);
					if ($this->NICK_NAME->Exportable)
						$doc->exportCaption($this->NICK_NAME);
					if ($this->HOST_IP->Exportable)
						$doc->exportCaption($this->HOST_IP);
					if ($this->HOST_ROOT_ID->Exportable)
						$doc->exportCaption($this->HOST_ROOT_ID);
					if ($this->HOST_ROOT_PWD->Exportable)
						$doc->exportCaption($this->HOST_ROOT_PWD);
					if ($this->ACC40_PWD->Exportable)
						$doc->exportCaption($this->ACC40_PWD);
					if ($this->ACC40->Exportable)
						$doc->exportCaption($this->ACC40);
					if ($this->ENODE->Exportable)
						$doc->exportCaption($this->ENODE);
					if ($this->GENESIS->Exportable)
						$doc->exportCaption($this->GENESIS);
					if ($this->GETH_CMD->Exportable)
						$doc->exportCaption($this->GETH_CMD);
					if ($this->HOST_CONFIG_LOG->Exportable)
						$doc->exportCaption($this->HOST_CONFIG_LOG);
					if ($this->B18_LOG->Exportable)
						$doc->exportCaption($this->B18_LOG);
					if ($this->_1F_LOG->Exportable)
						$doc->exportCaption($this->_1F_LOG);
					if ($this->Create_Date->Exportable)
						$doc->exportCaption($this->Create_Date);
					if ($this->ACTIVE->Exportable)
						$doc->exportCaption($this->ACTIVE);
					if ($this->Modify_Date->Exportable)
						$doc->exportCaption($this->Modify_Date);
				} else {
					if ($this->LOG_INDEX->Exportable)
						$doc->exportCaption($this->LOG_INDEX);
					if ($this->NICK_NAME->Exportable)
						$doc->exportCaption($this->NICK_NAME);
					if ($this->HOST_IP->Exportable)
						$doc->exportCaption($this->HOST_IP);
					if ($this->HOST_ROOT_ID->Exportable)
						$doc->exportCaption($this->HOST_ROOT_ID);
					if ($this->HOST_ROOT_PWD->Exportable)
						$doc->exportCaption($this->HOST_ROOT_PWD);
					if ($this->Create_Date->Exportable)
						$doc->exportCaption($this->Create_Date);
					if ($this->ACTIVE->Exportable)
						$doc->exportCaption($this->ACTIVE);
					if ($this->Modify_Date->Exportable)
						$doc->exportCaption($this->Modify_Date);
				}
				$doc->endExportRow();
			}
		}

		// Move to first record
		$recCnt = $startRec - 1;
		if (!$recordset->EOF) {
			$recordset->moveFirst();
			if ($startRec > 1)
				$recordset->move($startRec - 1);
		}
		while (!$recordset->EOF && $recCnt < $stopRec) {
			$recCnt++;
			if ($recCnt >= $startRec) {
				$rowCnt = $recCnt - $startRec + 1;

				// Page break
				if ($this->ExportPageBreakCount > 0) {
					if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0)
						$doc->exportPageBreak();
				}
				$this->loadListRowValues($recordset);

				// Render row
				$this->RowType = ROWTYPE_VIEW; // Render view
				$this->resetAttributes();
				$this->renderListRow();
				if (!$doc->ExportCustom) {
					$doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
					if ($exportPageType == "view") {
						if ($this->LOG_INDEX->Exportable)
							$doc->exportField($this->LOG_INDEX);
						if ($this->NICK_NAME->Exportable)
							$doc->exportField($this->NICK_NAME);
						if ($this->HOST_IP->Exportable)
							$doc->exportField($this->HOST_IP);
						if ($this->HOST_ROOT_ID->Exportable)
							$doc->exportField($this->HOST_ROOT_ID);
						if ($this->HOST_ROOT_PWD->Exportable)
							$doc->exportField($this->HOST_ROOT_PWD);
						if ($this->ACC40_PWD->Exportable)
							$doc->exportField($this->ACC40_PWD);
						if ($this->ACC40->Exportable)
							$doc->exportField($this->ACC40);
						if ($this->ENODE->Exportable)
							$doc->exportField($this->ENODE);
						if ($this->GENESIS->Exportable)
							$doc->exportField($this->GENESIS);
						if ($this->GETH_CMD->Exportable)
							$doc->exportField($this->GETH_CMD);
						if ($this->HOST_CONFIG_LOG->Exportable)
							$doc->exportField($this->HOST_CONFIG_LOG);
						if ($this->B18_LOG->Exportable)
							$doc->exportField($this->B18_LOG);
						if ($this->_1F_LOG->Exportable)
							$doc->exportField($this->_1F_LOG);
						if ($this->Create_Date->Exportable)
							$doc->exportField($this->Create_Date);
						if ($this->ACTIVE->Exportable)
							$doc->exportField($this->ACTIVE);
						if ($this->Modify_Date->Exportable)
							$doc->exportField($this->Modify_Date);
					} else {
						if ($this->LOG_INDEX->Exportable)
							$doc->exportField($this->LOG_INDEX);
						if ($this->NICK_NAME->Exportable)
							$doc->exportField($this->NICK_NAME);
						if ($this->HOST_IP->Exportable)
							$doc->exportField($this->HOST_IP);
						if ($this->HOST_ROOT_ID->Exportable)
							$doc->exportField($this->HOST_ROOT_ID);
						if ($this->HOST_ROOT_PWD->Exportable)
							$doc->exportField($this->HOST_ROOT_PWD);
						if ($this->Create_Date->Exportable)
							$doc->exportField($this->Create_Date);
						if ($this->ACTIVE->Exportable)
							$doc->exportField($this->ACTIVE);
						if ($this->Modify_Date->Exportable)
							$doc->exportField($this->Modify_Date);
					}
					$doc->endExportRow($rowCnt);
				}
			}

			// Call Row Export server event
			if ($doc->ExportCustom)
				$this->Row_Export($recordset->fields);
			$recordset->moveNext();
		}
		if (!$doc->ExportCustom) {
			$doc->exportTableFooter();
		}
	}

	// Lookup data from table
	public function lookup()
	{

		// Load lookup parameters
		$distinct = ConvertToBool(Post("distinct"));
		$linkField = Post("linkField");
		$displayFields = Post("displayFields");
		$parentFields = Post("parentFields");
		if (!is_array($parentFields))
			$parentFields = [];
		$childFields = Post("childFields");
		if (!is_array($childFields))
			$childFields = [];
		$filterFields = Post("filterFields");
		if (!is_array($filterFields))
			$filterFields = [];
		$filterOperators = Post("filterOperators");
		if (!is_array($filterOperators))
			$filterOperators = [];
		$autoFillSourceFields = Post("autoFillSourceFields");
		if (!is_array($autoFillSourceFields))
			$autoFillSourceFields = [];
		$formatAutoFill = FALSE;
		$lookupType = Post("ajax", "unknown");
		$pageSize = -1;
		$offset = -1;
		$searchValue = "";
		if (SameText($lookupType, "modal")) {
			$searchValue = Post("sv", "");
			$pageSize = Post("recperpage", 10);
			$offset = Post("start", 0);
		} elseif (SameText($lookupType, "autosuggest")) {
			$searchValue = Get("q", "");
			$pageSize = Param("n", -1);
			$pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
			if ($pageSize <= 0)
				$pageSize = AUTO_SUGGEST_MAX_ENTRIES;
			$start = Param("start", -1);
			$start = is_numeric($start) ? (int)$start : -1;
			$page = Param("page", -1);
			$page = is_numeric($page) ? (int)$page : -1;
			$offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
		}
		$userSelect = Decrypt(Post("s", ""));
		$userFilter = Decrypt(Post("f", ""));
		$userOrderBy = Decrypt(Post("o", ""));

		// Create lookup object and output JSON
		$lookup = new Lookup($linkField, $this->TableVar, $distinct, $linkField, $displayFields, $parentFields, $childFields, $filterFields, $autoFillSourceFields);
		foreach ($filterFields as $i => $filterField) { // Set up filter operators
			if (@$filterOperators[$i] <> "")
				$lookup->setFilterOperator($filterField, $filterOperators[$i]);
		}
		$lookup->LookupType = $lookupType; // Lookup type
		$lookup->FilterValues[] = rawurldecode(Post("v0", Post("lookupValue", ""))); // Lookup values
		$cnt = is_array($filterFields) ? count($filterFields) : 0;
		for ($i = 1; $i <= $cnt; $i++)
			$lookup->FilterValues[] = rawurldecode(Post("v" . $i, ""));
		$lookup->SearchValue = $searchValue;
		$lookup->PageSize = $pageSize;
		$lookup->Offset = $offset;
		if ($userSelect <> "")
			$lookup->UserSelect = $userSelect;
		if ($userFilter <> "")
			$lookup->UserFilter = $userFilter;
		if ($userOrderBy <> "")
			$lookup->UserOrderBy = $userOrderBy;
		$lookup->toJson();
	}

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = THUMBNAIL_DEFAULT_WIDTH, $height = THUMBNAIL_DEFAULT_HEIGHT)
	{

		// No binary fields
		return FALSE;
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Inserting event
	function Row_Inserting($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated($rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict($rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Grid Inserting event
	function Grid_Inserting() {

		// Enter your code here
		// To reject grid insert, set return value to FALSE

		return TRUE;
	}

	// Grid Inserted event
	function Grid_Inserted($rsnew) {

		//echo "Grid Inserted";
	}

	// Grid Updating event
	function Grid_Updating($rsold) {

		// Enter your code here
		// To reject grid update, set return value to FALSE

		return TRUE;
	}

	// Grid Updated event
	function Grid_Updated($rsold, $rsnew) {

		//echo "Grid Updated";
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending($email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		//var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
		// Enter your code here

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>);

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>
