<?php
namespace PHPMaker2019\esbc_public_20181122;

/**
 * Table class for alarm_basic
 */
class alarm_basic extends DbTable
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
	public $RTLindex;
	public $sensor_id;
	public $value_max;
	public $value_min;
	public $delaytime;
	public $date_add;
	public $date_modified;
	public $user_add;
	public $user_modified;
	public $email_receipt;
	public $email_subject;
	public $email_body;
	public $email_attach;
	public $sms_num;
	public $sms_body;
	public $alarm_subscriber;
	public $sms_active;
	public $email_active;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'alarm_basic';
		$this->TableName = 'alarm_basic';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`alarm_basic`";
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

		// RTLindex
		$this->RTLindex = new DbField('alarm_basic', 'alarm_basic', 'x_RTLindex', 'RTLindex', '`RTLindex`', '`RTLindex`', 3, -1, FALSE, '`RTLindex`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->RTLindex->IsAutoIncrement = TRUE; // Autoincrement field
		$this->RTLindex->IsPrimaryKey = TRUE; // Primary key field
		$this->RTLindex->Sortable = TRUE; // Allow sort
		$this->RTLindex->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['RTLindex'] = &$this->RTLindex;

		// sensor_id
		$this->sensor_id = new DbField('alarm_basic', 'alarm_basic', 'x_sensor_id', 'sensor_id', '`sensor_id`', '`sensor_id`', 200, -1, FALSE, '`sensor_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sensor_id->Nullable = FALSE; // NOT NULL field
		$this->sensor_id->Required = TRUE; // Required field
		$this->sensor_id->Sortable = TRUE; // Allow sort
		$this->fields['sensor_id'] = &$this->sensor_id;

		// value_max
		$this->value_max = new DbField('alarm_basic', 'alarm_basic', 'x_value_max', 'value_max', '`value_max`', '`value_max`', 4, -1, FALSE, '`value_max`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->value_max->Sortable = TRUE; // Allow sort
		$this->value_max->DefaultErrorMessage = $Language->Phrase("IncorrectFloat");
		$this->fields['value_max'] = &$this->value_max;

		// value_min
		$this->value_min = new DbField('alarm_basic', 'alarm_basic', 'x_value_min', 'value_min', '`value_min`', '`value_min`', 4, -1, FALSE, '`value_min`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->value_min->Sortable = TRUE; // Allow sort
		$this->value_min->DefaultErrorMessage = $Language->Phrase("IncorrectFloat");
		$this->fields['value_min'] = &$this->value_min;

		// delaytime
		$this->delaytime = new DbField('alarm_basic', 'alarm_basic', 'x_delaytime', 'delaytime', '`delaytime`', '`delaytime`', 3, -1, FALSE, '`delaytime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->delaytime->Sortable = TRUE; // Allow sort
		$this->delaytime->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['delaytime'] = &$this->delaytime;

		// date_add
		$this->date_add = new DbField('alarm_basic', 'alarm_basic', 'x_date_add', 'date_add', '`date_add`', CastDateFieldForLike('`date_add`', 0, "DB"), 135, 0, FALSE, '`date_add`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->date_add->Sortable = TRUE; // Allow sort
		$this->date_add->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->Phrase("IncorrectDate"));
		$this->fields['date_add'] = &$this->date_add;

		// date_modified
		$this->date_modified = new DbField('alarm_basic', 'alarm_basic', 'x_date_modified', 'date_modified', '`date_modified`', CastDateFieldForLike('`date_modified`', 0, "DB"), 135, 0, FALSE, '`date_modified`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->date_modified->Sortable = TRUE; // Allow sort
		$this->date_modified->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->Phrase("IncorrectDate"));
		$this->fields['date_modified'] = &$this->date_modified;

		// user_add
		$this->user_add = new DbField('alarm_basic', 'alarm_basic', 'x_user_add', 'user_add', '`user_add`', '`user_add`', 3, -1, FALSE, '`user_add`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->user_add->Sortable = TRUE; // Allow sort
		$this->user_add->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['user_add'] = &$this->user_add;

		// user_modified
		$this->user_modified = new DbField('alarm_basic', 'alarm_basic', 'x_user_modified', 'user_modified', '`user_modified`', '`user_modified`', 3, -1, FALSE, '`user_modified`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->user_modified->Sortable = TRUE; // Allow sort
		$this->user_modified->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['user_modified'] = &$this->user_modified;

		// email_receipt
		$this->email_receipt = new DbField('alarm_basic', 'alarm_basic', 'x_email_receipt', 'email_receipt', '`email_receipt`', '`email_receipt`', 201, -1, FALSE, '`email_receipt`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->email_receipt->Sortable = TRUE; // Allow sort
		$this->fields['email_receipt'] = &$this->email_receipt;

		// email_subject
		$this->email_subject = new DbField('alarm_basic', 'alarm_basic', 'x_email_subject', 'email_subject', '`email_subject`', '`email_subject`', 200, -1, FALSE, '`email_subject`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->email_subject->Sortable = TRUE; // Allow sort
		$this->fields['email_subject'] = &$this->email_subject;

		// email_body
		$this->email_body = new DbField('alarm_basic', 'alarm_basic', 'x_email_body', 'email_body', '`email_body`', '`email_body`', 201, -1, FALSE, '`email_body`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->email_body->Sortable = TRUE; // Allow sort
		$this->fields['email_body'] = &$this->email_body;

		// email_attach
		$this->email_attach = new DbField('alarm_basic', 'alarm_basic', 'x_email_attach', 'email_attach', '`email_attach`', '`email_attach`', 200, -1, FALSE, '`email_attach`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->email_attach->Sortable = TRUE; // Allow sort
		$this->fields['email_attach'] = &$this->email_attach;

		// sms_num
		$this->sms_num = new DbField('alarm_basic', 'alarm_basic', 'x_sms_num', 'sms_num', '`sms_num`', '`sms_num`', 200, -1, FALSE, '`sms_num`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sms_num->Sortable = TRUE; // Allow sort
		$this->fields['sms_num'] = &$this->sms_num;

		// sms_body
		$this->sms_body = new DbField('alarm_basic', 'alarm_basic', 'x_sms_body', 'sms_body', '`sms_body`', '`sms_body`', 200, -1, FALSE, '`sms_body`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sms_body->Sortable = TRUE; // Allow sort
		$this->fields['sms_body'] = &$this->sms_body;

		// alarm_subscriber
		$this->alarm_subscriber = new DbField('alarm_basic', 'alarm_basic', 'x_alarm_subscriber', 'alarm_subscriber', '`alarm_subscriber`', '`alarm_subscriber`', 200, -1, FALSE, '`alarm_subscriber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->alarm_subscriber->Sortable = TRUE; // Allow sort
		$this->fields['alarm_subscriber'] = &$this->alarm_subscriber;

		// sms_active
		$this->sms_active = new DbField('alarm_basic', 'alarm_basic', 'x_sms_active', 'sms_active', '`sms_active`', '`sms_active`', 16, -1, FALSE, '`sms_active`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sms_active->Nullable = FALSE; // NOT NULL field
		$this->sms_active->Required = TRUE; // Required field
		$this->sms_active->Sortable = TRUE; // Allow sort
		$this->sms_active->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['sms_active'] = &$this->sms_active;

		// email_active
		$this->email_active = new DbField('alarm_basic', 'alarm_basic', 'x_email_active', 'email_active', '`email_active`', '`email_active`', 16, -1, FALSE, '`email_active`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->email_active->Nullable = FALSE; // NOT NULL field
		$this->email_active->Required = TRUE; // Required field
		$this->email_active->Sortable = TRUE; // Allow sort
		$this->email_active->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['email_active'] = &$this->email_active;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`alarm_basic`";
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
			$this->RTLindex->setDbValue($conn->insert_ID());
			$rs['RTLindex'] = $this->RTLindex->DbValue;
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
			if (array_key_exists('RTLindex', $rs))
				AddFilter($where, QuotedName('RTLindex', $this->Dbid) . '=' . QuotedValue($rs['RTLindex'], $this->RTLindex->DataType, $this->Dbid));
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
		$this->RTLindex->DbValue = $row['RTLindex'];
		$this->sensor_id->DbValue = $row['sensor_id'];
		$this->value_max->DbValue = $row['value_max'];
		$this->value_min->DbValue = $row['value_min'];
		$this->delaytime->DbValue = $row['delaytime'];
		$this->date_add->DbValue = $row['date_add'];
		$this->date_modified->DbValue = $row['date_modified'];
		$this->user_add->DbValue = $row['user_add'];
		$this->user_modified->DbValue = $row['user_modified'];
		$this->email_receipt->DbValue = $row['email_receipt'];
		$this->email_subject->DbValue = $row['email_subject'];
		$this->email_body->DbValue = $row['email_body'];
		$this->email_attach->DbValue = $row['email_attach'];
		$this->sms_num->DbValue = $row['sms_num'];
		$this->sms_body->DbValue = $row['sms_body'];
		$this->alarm_subscriber->DbValue = $row['alarm_subscriber'];
		$this->sms_active->DbValue = $row['sms_active'];
		$this->email_active->DbValue = $row['email_active'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`RTLindex` = @RTLindex@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('RTLindex', $row) ? $row['RTLindex'] : NULL) : $this->RTLindex->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@RTLindex@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "alarm_basiclist.php";
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
		if ($pageName == "alarm_basicview.php")
			return $Language->Phrase("View");
		elseif ($pageName == "alarm_basicedit.php")
			return $Language->Phrase("Edit");
		elseif ($pageName == "alarm_basicadd.php")
			return $Language->Phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "alarm_basiclist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("alarm_basicview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("alarm_basicview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "alarm_basicadd.php?" . $this->getUrlParm($parm);
		else
			$url = "alarm_basicadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("alarm_basicedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("alarm_basicadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("alarm_basicdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "RTLindex:" . JsonEncode($this->RTLindex->CurrentValue, "number");
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
		if ($this->RTLindex->CurrentValue != NULL) {
			$url .= "RTLindex=" . urlencode($this->RTLindex->CurrentValue);
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
			if (Param("RTLindex") !== NULL)
				$arKeys[] = Param("RTLindex");
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
			$this->RTLindex->CurrentValue = $key;
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
		$this->RTLindex->setDbValue($rs->fields('RTLindex'));
		$this->sensor_id->setDbValue($rs->fields('sensor_id'));
		$this->value_max->setDbValue($rs->fields('value_max'));
		$this->value_min->setDbValue($rs->fields('value_min'));
		$this->delaytime->setDbValue($rs->fields('delaytime'));
		$this->date_add->setDbValue($rs->fields('date_add'));
		$this->date_modified->setDbValue($rs->fields('date_modified'));
		$this->user_add->setDbValue($rs->fields('user_add'));
		$this->user_modified->setDbValue($rs->fields('user_modified'));
		$this->email_receipt->setDbValue($rs->fields('email_receipt'));
		$this->email_subject->setDbValue($rs->fields('email_subject'));
		$this->email_body->setDbValue($rs->fields('email_body'));
		$this->email_attach->setDbValue($rs->fields('email_attach'));
		$this->sms_num->setDbValue($rs->fields('sms_num'));
		$this->sms_body->setDbValue($rs->fields('sms_body'));
		$this->alarm_subscriber->setDbValue($rs->fields('alarm_subscriber'));
		$this->sms_active->setDbValue($rs->fields('sms_active'));
		$this->email_active->setDbValue($rs->fields('email_active'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

	// Common render codes
		// RTLindex
		// sensor_id
		// value_max
		// value_min
		// delaytime
		// date_add
		// date_modified
		// user_add
		// user_modified
		// email_receipt
		// email_subject
		// email_body
		// email_attach
		// sms_num
		// sms_body
		// alarm_subscriber
		// sms_active
		// email_active
		// RTLindex

		$this->RTLindex->ViewValue = $this->RTLindex->CurrentValue;
		$this->RTLindex->ViewCustomAttributes = "";

		// sensor_id
		$this->sensor_id->ViewValue = $this->sensor_id->CurrentValue;
		$this->sensor_id->ViewCustomAttributes = "";

		// value_max
		$this->value_max->ViewValue = $this->value_max->CurrentValue;
		$this->value_max->ViewValue = FormatNumber($this->value_max->ViewValue, 2, -2, -2, -2);
		$this->value_max->ViewCustomAttributes = "";

		// value_min
		$this->value_min->ViewValue = $this->value_min->CurrentValue;
		$this->value_min->ViewValue = FormatNumber($this->value_min->ViewValue, 2, -2, -2, -2);
		$this->value_min->ViewCustomAttributes = "";

		// delaytime
		$this->delaytime->ViewValue = $this->delaytime->CurrentValue;
		$this->delaytime->ViewValue = FormatNumber($this->delaytime->ViewValue, 0, -2, -2, -2);
		$this->delaytime->ViewCustomAttributes = "";

		// date_add
		$this->date_add->ViewValue = $this->date_add->CurrentValue;
		$this->date_add->ViewValue = FormatDateTime($this->date_add->ViewValue, 0);
		$this->date_add->ViewCustomAttributes = "";

		// date_modified
		$this->date_modified->ViewValue = $this->date_modified->CurrentValue;
		$this->date_modified->ViewValue = FormatDateTime($this->date_modified->ViewValue, 0);
		$this->date_modified->ViewCustomAttributes = "";

		// user_add
		$this->user_add->ViewValue = $this->user_add->CurrentValue;
		$this->user_add->ViewValue = FormatNumber($this->user_add->ViewValue, 0, -2, -2, -2);
		$this->user_add->ViewCustomAttributes = "";

		// user_modified
		$this->user_modified->ViewValue = $this->user_modified->CurrentValue;
		$this->user_modified->ViewValue = FormatNumber($this->user_modified->ViewValue, 0, -2, -2, -2);
		$this->user_modified->ViewCustomAttributes = "";

		// email_receipt
		$this->email_receipt->ViewValue = $this->email_receipt->CurrentValue;
		$this->email_receipt->ViewCustomAttributes = "";

		// email_subject
		$this->email_subject->ViewValue = $this->email_subject->CurrentValue;
		$this->email_subject->ViewCustomAttributes = "";

		// email_body
		$this->email_body->ViewValue = $this->email_body->CurrentValue;
		$this->email_body->ViewCustomAttributes = "";

		// email_attach
		$this->email_attach->ViewValue = $this->email_attach->CurrentValue;
		$this->email_attach->ViewCustomAttributes = "";

		// sms_num
		$this->sms_num->ViewValue = $this->sms_num->CurrentValue;
		$this->sms_num->ViewCustomAttributes = "";

		// sms_body
		$this->sms_body->ViewValue = $this->sms_body->CurrentValue;
		$this->sms_body->ViewCustomAttributes = "";

		// alarm_subscriber
		$this->alarm_subscriber->ViewValue = $this->alarm_subscriber->CurrentValue;
		$this->alarm_subscriber->ViewCustomAttributes = "";

		// sms_active
		$this->sms_active->ViewValue = $this->sms_active->CurrentValue;
		$this->sms_active->ViewValue = FormatNumber($this->sms_active->ViewValue, 0, -2, -2, -2);
		$this->sms_active->ViewCustomAttributes = "";

		// email_active
		$this->email_active->ViewValue = $this->email_active->CurrentValue;
		$this->email_active->ViewValue = FormatNumber($this->email_active->ViewValue, 0, -2, -2, -2);
		$this->email_active->ViewCustomAttributes = "";

		// RTLindex
		$this->RTLindex->LinkCustomAttributes = "";
		$this->RTLindex->HrefValue = "";
		$this->RTLindex->TooltipValue = "";

		// sensor_id
		$this->sensor_id->LinkCustomAttributes = "";
		$this->sensor_id->HrefValue = "";
		$this->sensor_id->TooltipValue = "";

		// value_max
		$this->value_max->LinkCustomAttributes = "";
		$this->value_max->HrefValue = "";
		$this->value_max->TooltipValue = "";

		// value_min
		$this->value_min->LinkCustomAttributes = "";
		$this->value_min->HrefValue = "";
		$this->value_min->TooltipValue = "";

		// delaytime
		$this->delaytime->LinkCustomAttributes = "";
		$this->delaytime->HrefValue = "";
		$this->delaytime->TooltipValue = "";

		// date_add
		$this->date_add->LinkCustomAttributes = "";
		$this->date_add->HrefValue = "";
		$this->date_add->TooltipValue = "";

		// date_modified
		$this->date_modified->LinkCustomAttributes = "";
		$this->date_modified->HrefValue = "";
		$this->date_modified->TooltipValue = "";

		// user_add
		$this->user_add->LinkCustomAttributes = "";
		$this->user_add->HrefValue = "";
		$this->user_add->TooltipValue = "";

		// user_modified
		$this->user_modified->LinkCustomAttributes = "";
		$this->user_modified->HrefValue = "";
		$this->user_modified->TooltipValue = "";

		// email_receipt
		$this->email_receipt->LinkCustomAttributes = "";
		$this->email_receipt->HrefValue = "";
		$this->email_receipt->TooltipValue = "";

		// email_subject
		$this->email_subject->LinkCustomAttributes = "";
		$this->email_subject->HrefValue = "";
		$this->email_subject->TooltipValue = "";

		// email_body
		$this->email_body->LinkCustomAttributes = "";
		$this->email_body->HrefValue = "";
		$this->email_body->TooltipValue = "";

		// email_attach
		$this->email_attach->LinkCustomAttributes = "";
		$this->email_attach->HrefValue = "";
		$this->email_attach->TooltipValue = "";

		// sms_num
		$this->sms_num->LinkCustomAttributes = "";
		$this->sms_num->HrefValue = "";
		$this->sms_num->TooltipValue = "";

		// sms_body
		$this->sms_body->LinkCustomAttributes = "";
		$this->sms_body->HrefValue = "";
		$this->sms_body->TooltipValue = "";

		// alarm_subscriber
		$this->alarm_subscriber->LinkCustomAttributes = "";
		$this->alarm_subscriber->HrefValue = "";
		$this->alarm_subscriber->TooltipValue = "";

		// sms_active
		$this->sms_active->LinkCustomAttributes = "";
		$this->sms_active->HrefValue = "";
		$this->sms_active->TooltipValue = "";

		// email_active
		$this->email_active->LinkCustomAttributes = "";
		$this->email_active->HrefValue = "";
		$this->email_active->TooltipValue = "";

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

		// RTLindex
		$this->RTLindex->EditAttrs["class"] = "form-control";
		$this->RTLindex->EditCustomAttributes = "";
		$this->RTLindex->EditValue = $this->RTLindex->CurrentValue;
		$this->RTLindex->ViewCustomAttributes = "";

		// sensor_id
		$this->sensor_id->EditAttrs["class"] = "form-control";
		$this->sensor_id->EditCustomAttributes = "";
		$this->sensor_id->EditValue = $this->sensor_id->CurrentValue;
		$this->sensor_id->PlaceHolder = RemoveHtml($this->sensor_id->caption());

		// value_max
		$this->value_max->EditAttrs["class"] = "form-control";
		$this->value_max->EditCustomAttributes = "";
		$this->value_max->EditValue = $this->value_max->CurrentValue;
		$this->value_max->PlaceHolder = RemoveHtml($this->value_max->caption());
		if (strval($this->value_max->EditValue) <> "" && is_numeric($this->value_max->EditValue))
			$this->value_max->EditValue = FormatNumber($this->value_max->EditValue, -2, -2, -2, -2);

		// value_min
		$this->value_min->EditAttrs["class"] = "form-control";
		$this->value_min->EditCustomAttributes = "";
		$this->value_min->EditValue = $this->value_min->CurrentValue;
		$this->value_min->PlaceHolder = RemoveHtml($this->value_min->caption());
		if (strval($this->value_min->EditValue) <> "" && is_numeric($this->value_min->EditValue))
			$this->value_min->EditValue = FormatNumber($this->value_min->EditValue, -2, -2, -2, -2);

		// delaytime
		$this->delaytime->EditAttrs["class"] = "form-control";
		$this->delaytime->EditCustomAttributes = "";
		$this->delaytime->EditValue = $this->delaytime->CurrentValue;
		$this->delaytime->PlaceHolder = RemoveHtml($this->delaytime->caption());

		// date_add
		$this->date_add->EditAttrs["class"] = "form-control";
		$this->date_add->EditCustomAttributes = "";
		$this->date_add->EditValue = FormatDateTime($this->date_add->CurrentValue, 8);
		$this->date_add->PlaceHolder = RemoveHtml($this->date_add->caption());

		// date_modified
		$this->date_modified->EditAttrs["class"] = "form-control";
		$this->date_modified->EditCustomAttributes = "";
		$this->date_modified->EditValue = FormatDateTime($this->date_modified->CurrentValue, 8);
		$this->date_modified->PlaceHolder = RemoveHtml($this->date_modified->caption());

		// user_add
		$this->user_add->EditAttrs["class"] = "form-control";
		$this->user_add->EditCustomAttributes = "";
		$this->user_add->EditValue = $this->user_add->CurrentValue;
		$this->user_add->PlaceHolder = RemoveHtml($this->user_add->caption());

		// user_modified
		$this->user_modified->EditAttrs["class"] = "form-control";
		$this->user_modified->EditCustomAttributes = "";
		$this->user_modified->EditValue = $this->user_modified->CurrentValue;
		$this->user_modified->PlaceHolder = RemoveHtml($this->user_modified->caption());

		// email_receipt
		$this->email_receipt->EditAttrs["class"] = "form-control";
		$this->email_receipt->EditCustomAttributes = "";
		$this->email_receipt->EditValue = $this->email_receipt->CurrentValue;
		$this->email_receipt->PlaceHolder = RemoveHtml($this->email_receipt->caption());

		// email_subject
		$this->email_subject->EditAttrs["class"] = "form-control";
		$this->email_subject->EditCustomAttributes = "";
		$this->email_subject->EditValue = $this->email_subject->CurrentValue;
		$this->email_subject->PlaceHolder = RemoveHtml($this->email_subject->caption());

		// email_body
		$this->email_body->EditAttrs["class"] = "form-control";
		$this->email_body->EditCustomAttributes = "";
		$this->email_body->EditValue = $this->email_body->CurrentValue;
		$this->email_body->PlaceHolder = RemoveHtml($this->email_body->caption());

		// email_attach
		$this->email_attach->EditAttrs["class"] = "form-control";
		$this->email_attach->EditCustomAttributes = "";
		$this->email_attach->EditValue = $this->email_attach->CurrentValue;
		$this->email_attach->PlaceHolder = RemoveHtml($this->email_attach->caption());

		// sms_num
		$this->sms_num->EditAttrs["class"] = "form-control";
		$this->sms_num->EditCustomAttributes = "";
		$this->sms_num->EditValue = $this->sms_num->CurrentValue;
		$this->sms_num->PlaceHolder = RemoveHtml($this->sms_num->caption());

		// sms_body
		$this->sms_body->EditAttrs["class"] = "form-control";
		$this->sms_body->EditCustomAttributes = "";
		$this->sms_body->EditValue = $this->sms_body->CurrentValue;
		$this->sms_body->PlaceHolder = RemoveHtml($this->sms_body->caption());

		// alarm_subscriber
		$this->alarm_subscriber->EditAttrs["class"] = "form-control";
		$this->alarm_subscriber->EditCustomAttributes = "";
		$this->alarm_subscriber->EditValue = $this->alarm_subscriber->CurrentValue;
		$this->alarm_subscriber->PlaceHolder = RemoveHtml($this->alarm_subscriber->caption());

		// sms_active
		$this->sms_active->EditAttrs["class"] = "form-control";
		$this->sms_active->EditCustomAttributes = "";
		$this->sms_active->EditValue = $this->sms_active->CurrentValue;
		$this->sms_active->PlaceHolder = RemoveHtml($this->sms_active->caption());

		// email_active
		$this->email_active->EditAttrs["class"] = "form-control";
		$this->email_active->EditCustomAttributes = "";
		$this->email_active->EditValue = $this->email_active->CurrentValue;
		$this->email_active->PlaceHolder = RemoveHtml($this->email_active->caption());

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
					if ($this->RTLindex->Exportable)
						$doc->exportCaption($this->RTLindex);
					if ($this->sensor_id->Exportable)
						$doc->exportCaption($this->sensor_id);
					if ($this->value_max->Exportable)
						$doc->exportCaption($this->value_max);
					if ($this->value_min->Exportable)
						$doc->exportCaption($this->value_min);
					if ($this->delaytime->Exportable)
						$doc->exportCaption($this->delaytime);
					if ($this->date_add->Exportable)
						$doc->exportCaption($this->date_add);
					if ($this->date_modified->Exportable)
						$doc->exportCaption($this->date_modified);
					if ($this->user_add->Exportable)
						$doc->exportCaption($this->user_add);
					if ($this->user_modified->Exportable)
						$doc->exportCaption($this->user_modified);
					if ($this->email_receipt->Exportable)
						$doc->exportCaption($this->email_receipt);
					if ($this->email_subject->Exportable)
						$doc->exportCaption($this->email_subject);
					if ($this->email_body->Exportable)
						$doc->exportCaption($this->email_body);
					if ($this->email_attach->Exportable)
						$doc->exportCaption($this->email_attach);
					if ($this->sms_num->Exportable)
						$doc->exportCaption($this->sms_num);
					if ($this->sms_body->Exportable)
						$doc->exportCaption($this->sms_body);
					if ($this->alarm_subscriber->Exportable)
						$doc->exportCaption($this->alarm_subscriber);
					if ($this->sms_active->Exportable)
						$doc->exportCaption($this->sms_active);
					if ($this->email_active->Exportable)
						$doc->exportCaption($this->email_active);
				} else {
					if ($this->RTLindex->Exportable)
						$doc->exportCaption($this->RTLindex);
					if ($this->sensor_id->Exportable)
						$doc->exportCaption($this->sensor_id);
					if ($this->value_max->Exportable)
						$doc->exportCaption($this->value_max);
					if ($this->value_min->Exportable)
						$doc->exportCaption($this->value_min);
					if ($this->delaytime->Exportable)
						$doc->exportCaption($this->delaytime);
					if ($this->date_add->Exportable)
						$doc->exportCaption($this->date_add);
					if ($this->date_modified->Exportable)
						$doc->exportCaption($this->date_modified);
					if ($this->user_add->Exportable)
						$doc->exportCaption($this->user_add);
					if ($this->user_modified->Exportable)
						$doc->exportCaption($this->user_modified);
					if ($this->email_subject->Exportable)
						$doc->exportCaption($this->email_subject);
					if ($this->email_attach->Exportable)
						$doc->exportCaption($this->email_attach);
					if ($this->sms_num->Exportable)
						$doc->exportCaption($this->sms_num);
					if ($this->sms_body->Exportable)
						$doc->exportCaption($this->sms_body);
					if ($this->alarm_subscriber->Exportable)
						$doc->exportCaption($this->alarm_subscriber);
					if ($this->sms_active->Exportable)
						$doc->exportCaption($this->sms_active);
					if ($this->email_active->Exportable)
						$doc->exportCaption($this->email_active);
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
						if ($this->RTLindex->Exportable)
							$doc->exportField($this->RTLindex);
						if ($this->sensor_id->Exportable)
							$doc->exportField($this->sensor_id);
						if ($this->value_max->Exportable)
							$doc->exportField($this->value_max);
						if ($this->value_min->Exportable)
							$doc->exportField($this->value_min);
						if ($this->delaytime->Exportable)
							$doc->exportField($this->delaytime);
						if ($this->date_add->Exportable)
							$doc->exportField($this->date_add);
						if ($this->date_modified->Exportable)
							$doc->exportField($this->date_modified);
						if ($this->user_add->Exportable)
							$doc->exportField($this->user_add);
						if ($this->user_modified->Exportable)
							$doc->exportField($this->user_modified);
						if ($this->email_receipt->Exportable)
							$doc->exportField($this->email_receipt);
						if ($this->email_subject->Exportable)
							$doc->exportField($this->email_subject);
						if ($this->email_body->Exportable)
							$doc->exportField($this->email_body);
						if ($this->email_attach->Exportable)
							$doc->exportField($this->email_attach);
						if ($this->sms_num->Exportable)
							$doc->exportField($this->sms_num);
						if ($this->sms_body->Exportable)
							$doc->exportField($this->sms_body);
						if ($this->alarm_subscriber->Exportable)
							$doc->exportField($this->alarm_subscriber);
						if ($this->sms_active->Exportable)
							$doc->exportField($this->sms_active);
						if ($this->email_active->Exportable)
							$doc->exportField($this->email_active);
					} else {
						if ($this->RTLindex->Exportable)
							$doc->exportField($this->RTLindex);
						if ($this->sensor_id->Exportable)
							$doc->exportField($this->sensor_id);
						if ($this->value_max->Exportable)
							$doc->exportField($this->value_max);
						if ($this->value_min->Exportable)
							$doc->exportField($this->value_min);
						if ($this->delaytime->Exportable)
							$doc->exportField($this->delaytime);
						if ($this->date_add->Exportable)
							$doc->exportField($this->date_add);
						if ($this->date_modified->Exportable)
							$doc->exportField($this->date_modified);
						if ($this->user_add->Exportable)
							$doc->exportField($this->user_add);
						if ($this->user_modified->Exportable)
							$doc->exportField($this->user_modified);
						if ($this->email_subject->Exportable)
							$doc->exportField($this->email_subject);
						if ($this->email_attach->Exportable)
							$doc->exportField($this->email_attach);
						if ($this->sms_num->Exportable)
							$doc->exportField($this->sms_num);
						if ($this->sms_body->Exportable)
							$doc->exportField($this->sms_body);
						if ($this->alarm_subscriber->Exportable)
							$doc->exportField($this->alarm_subscriber);
						if ($this->sms_active->Exportable)
							$doc->exportField($this->sms_active);
						if ($this->email_active->Exportable)
							$doc->exportField($this->email_active);
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
