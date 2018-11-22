<?php
namespace PHPMaker2019\esbc_public_20181122;

/**
 * Table class for sensor_basic
 */
class sensor_basic extends DbTable
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
	public $host_url;
	public $beb_mac;
	public $beb_name;
	public $beb_alias_name;
	public $sensor_type_id;
	public $sensor_unit;
	public $active;
	public $date_add;
	public $date_modified;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'sensor_basic';
		$this->TableName = 'sensor_basic';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`sensor_basic`";
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
		$this->RTLindex = new DbField('sensor_basic', 'sensor_basic', 'x_RTLindex', 'RTLindex', '`RTLindex`', '`RTLindex`', 3, -1, FALSE, '`RTLindex`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->RTLindex->IsAutoIncrement = TRUE; // Autoincrement field
		$this->RTLindex->IsPrimaryKey = TRUE; // Primary key field
		$this->RTLindex->Sortable = TRUE; // Allow sort
		$this->RTLindex->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['RTLindex'] = &$this->RTLindex;

		// sensor_id
		$this->sensor_id = new DbField('sensor_basic', 'sensor_basic', 'x_sensor_id', 'sensor_id', '`sensor_id`', '`sensor_id`', 200, -1, FALSE, '`sensor_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sensor_id->Nullable = FALSE; // NOT NULL field
		$this->sensor_id->Required = TRUE; // Required field
		$this->sensor_id->Sortable = TRUE; // Allow sort
		$this->fields['sensor_id'] = &$this->sensor_id;

		// host_url
		$this->host_url = new DbField('sensor_basic', 'sensor_basic', 'x_host_url', 'host_url', '`host_url`', '`host_url`', 200, -1, FALSE, '`host_url`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->host_url->Sortable = FALSE; // Allow sort
		$this->fields['host_url'] = &$this->host_url;

		// beb_mac
		$this->beb_mac = new DbField('sensor_basic', 'sensor_basic', 'x_beb_mac', 'beb_mac', '`beb_mac`', '`beb_mac`', 200, -1, FALSE, '`beb_mac`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->beb_mac->Nullable = FALSE; // NOT NULL field
		$this->beb_mac->Required = TRUE; // Required field
		$this->beb_mac->Sortable = FALSE; // Allow sort
		$this->fields['beb_mac'] = &$this->beb_mac;

		// beb_name
		$this->beb_name = new DbField('sensor_basic', 'sensor_basic', 'x_beb_name', 'beb_name', '`beb_name`', '`beb_name`', 200, -1, FALSE, '`beb_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->beb_name->Nullable = FALSE; // NOT NULL field
		$this->beb_name->Required = TRUE; // Required field
		$this->beb_name->Sortable = FALSE; // Allow sort
		$this->fields['beb_name'] = &$this->beb_name;

		// beb_alias_name
		$this->beb_alias_name = new DbField('sensor_basic', 'sensor_basic', 'x_beb_alias_name', 'beb_alias_name', '`beb_alias_name`', '`beb_alias_name`', 200, -1, FALSE, '`beb_alias_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->beb_alias_name->Sortable = TRUE; // Allow sort
		$this->fields['beb_alias_name'] = &$this->beb_alias_name;

		// sensor_type_id
		$this->sensor_type_id = new DbField('sensor_basic', 'sensor_basic', 'x_sensor_type_id', 'sensor_type_id', '`sensor_type_id`', '`sensor_type_id`', 3, -1, FALSE, '`sensor_type_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sensor_type_id->Sortable = FALSE; // Allow sort
		$this->sensor_type_id->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['sensor_type_id'] = &$this->sensor_type_id;

		// sensor_unit
		$this->sensor_unit = new DbField('sensor_basic', 'sensor_basic', 'x_sensor_unit', 'sensor_unit', '`sensor_unit`', '`sensor_unit`', 200, -1, FALSE, '`sensor_unit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sensor_unit->Sortable = FALSE; // Allow sort
		$this->fields['sensor_unit'] = &$this->sensor_unit;

		// active
		$this->active = new DbField('sensor_basic', 'sensor_basic', 'x_active', 'active', '`active`', '`active`', 3, -1, FALSE, '`active`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->active->Nullable = FALSE; // NOT NULL field
		$this->active->Sortable = TRUE; // Allow sort
		$this->active->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['active'] = &$this->active;

		// date_add
		$this->date_add = new DbField('sensor_basic', 'sensor_basic', 'x_date_add', 'date_add', '`date_add`', CastDateFieldForLike('`date_add`', 1, "DB"), 135, 1, FALSE, '`date_add`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->date_add->Sortable = TRUE; // Allow sort
		$this->date_add->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->Phrase("IncorrectDate"));
		$this->fields['date_add'] = &$this->date_add;

		// date_modified
		$this->date_modified = new DbField('sensor_basic', 'sensor_basic', 'x_date_modified', 'date_modified', '`date_modified`', CastDateFieldForLike('`date_modified`', 1, "DB"), 135, 1, FALSE, '`date_modified`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->date_modified->Sortable = FALSE; // Allow sort
		$this->date_modified->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->Phrase("IncorrectDate"));
		$this->fields['date_modified'] = &$this->date_modified;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`sensor_basic`";
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
		$this->host_url->DbValue = $row['host_url'];
		$this->beb_mac->DbValue = $row['beb_mac'];
		$this->beb_name->DbValue = $row['beb_name'];
		$this->beb_alias_name->DbValue = $row['beb_alias_name'];
		$this->sensor_type_id->DbValue = $row['sensor_type_id'];
		$this->sensor_unit->DbValue = $row['sensor_unit'];
		$this->active->DbValue = $row['active'];
		$this->date_add->DbValue = $row['date_add'];
		$this->date_modified->DbValue = $row['date_modified'];
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
			return "sensor_basiclist.php";
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
		if ($pageName == "sensor_basicview.php")
			return $Language->Phrase("View");
		elseif ($pageName == "sensor_basicedit.php")
			return $Language->Phrase("Edit");
		elseif ($pageName == "sensor_basicadd.php")
			return $Language->Phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "sensor_basiclist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("sensor_basicview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("sensor_basicview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "sensor_basicadd.php?" . $this->getUrlParm($parm);
		else
			$url = "sensor_basicadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("sensor_basicedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("sensor_basicadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("sensor_basicdelete.php", $this->getUrlParm());
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
		$this->host_url->setDbValue($rs->fields('host_url'));
		$this->beb_mac->setDbValue($rs->fields('beb_mac'));
		$this->beb_name->setDbValue($rs->fields('beb_name'));
		$this->beb_alias_name->setDbValue($rs->fields('beb_alias_name'));
		$this->sensor_type_id->setDbValue($rs->fields('sensor_type_id'));
		$this->sensor_unit->setDbValue($rs->fields('sensor_unit'));
		$this->active->setDbValue($rs->fields('active'));
		$this->date_add->setDbValue($rs->fields('date_add'));
		$this->date_modified->setDbValue($rs->fields('date_modified'));
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
		// host_url
		// beb_mac
		// beb_name
		// beb_alias_name
		// sensor_type_id
		// sensor_unit
		// active
		// date_add
		// date_modified
		// RTLindex

		$this->RTLindex->ViewValue = $this->RTLindex->CurrentValue;
		$this->RTLindex->ViewCustomAttributes = "";

		// sensor_id
		$this->sensor_id->ViewValue = $this->sensor_id->CurrentValue;
		$this->sensor_id->ViewCustomAttributes = "";

		// host_url
		$this->host_url->ViewValue = $this->host_url->CurrentValue;
		$this->host_url->ViewCustomAttributes = "";

		// beb_mac
		$this->beb_mac->ViewValue = $this->beb_mac->CurrentValue;
		$this->beb_mac->ViewCustomAttributes = "";

		// beb_name
		$this->beb_name->ViewValue = $this->beb_name->CurrentValue;
		$this->beb_name->ViewCustomAttributes = "";

		// beb_alias_name
		$this->beb_alias_name->ViewValue = $this->beb_alias_name->CurrentValue;
		$this->beb_alias_name->ViewCustomAttributes = "";

		// sensor_type_id
		$this->sensor_type_id->ViewValue = $this->sensor_type_id->CurrentValue;
		$this->sensor_type_id->ViewValue = FormatNumber($this->sensor_type_id->ViewValue, 0, -2, -2, -2);
		$this->sensor_type_id->ViewCustomAttributes = "";

		// sensor_unit
		$this->sensor_unit->ViewValue = $this->sensor_unit->CurrentValue;
		$this->sensor_unit->ViewCustomAttributes = "";

		// active
		$this->active->ViewValue = $this->active->CurrentValue;
		$this->active->ViewValue = FormatNumber($this->active->ViewValue, 0, -2, -2, -2);
		$this->active->ViewCustomAttributes = "";

		// date_add
		$this->date_add->ViewValue = $this->date_add->CurrentValue;
		$this->date_add->ViewValue = FormatDateTime($this->date_add->ViewValue, 1);
		$this->date_add->ViewCustomAttributes = "";

		// date_modified
		$this->date_modified->ViewValue = $this->date_modified->CurrentValue;
		$this->date_modified->ViewValue = FormatDateTime($this->date_modified->ViewValue, 1);
		$this->date_modified->ViewCustomAttributes = "";

		// RTLindex
		$this->RTLindex->LinkCustomAttributes = "";
		$this->RTLindex->HrefValue = "";
		$this->RTLindex->TooltipValue = "";

		// sensor_id
		$this->sensor_id->LinkCustomAttributes = "";
		$this->sensor_id->HrefValue = "";
		$this->sensor_id->TooltipValue = "";

		// host_url
		$this->host_url->LinkCustomAttributes = "";
		$this->host_url->HrefValue = "";
		$this->host_url->TooltipValue = "";

		// beb_mac
		$this->beb_mac->LinkCustomAttributes = "";
		$this->beb_mac->HrefValue = "";
		$this->beb_mac->TooltipValue = "";

		// beb_name
		$this->beb_name->LinkCustomAttributes = "";
		$this->beb_name->HrefValue = "";
		$this->beb_name->TooltipValue = "";

		// beb_alias_name
		$this->beb_alias_name->LinkCustomAttributes = "";
		$this->beb_alias_name->HrefValue = "";
		$this->beb_alias_name->TooltipValue = "";

		// sensor_type_id
		$this->sensor_type_id->LinkCustomAttributes = "";
		$this->sensor_type_id->HrefValue = "";
		$this->sensor_type_id->TooltipValue = "";

		// sensor_unit
		$this->sensor_unit->LinkCustomAttributes = "";
		$this->sensor_unit->HrefValue = "";
		$this->sensor_unit->TooltipValue = "";

		// active
		$this->active->LinkCustomAttributes = "";
		$this->active->HrefValue = "";
		$this->active->TooltipValue = "";

		// date_add
		$this->date_add->LinkCustomAttributes = "";
		$this->date_add->HrefValue = "";
		$this->date_add->TooltipValue = "";

		// date_modified
		$this->date_modified->LinkCustomAttributes = "";
		$this->date_modified->HrefValue = "";
		$this->date_modified->TooltipValue = "";

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

		// host_url
		$this->host_url->EditAttrs["class"] = "form-control";
		$this->host_url->EditCustomAttributes = "";
		$this->host_url->EditValue = $this->host_url->CurrentValue;
		$this->host_url->PlaceHolder = RemoveHtml($this->host_url->caption());

		// beb_mac
		$this->beb_mac->EditAttrs["class"] = "form-control";
		$this->beb_mac->EditCustomAttributes = "";
		$this->beb_mac->EditValue = $this->beb_mac->CurrentValue;
		$this->beb_mac->PlaceHolder = RemoveHtml($this->beb_mac->caption());

		// beb_name
		$this->beb_name->EditAttrs["class"] = "form-control";
		$this->beb_name->EditCustomAttributes = "";
		$this->beb_name->EditValue = $this->beb_name->CurrentValue;
		$this->beb_name->PlaceHolder = RemoveHtml($this->beb_name->caption());

		// beb_alias_name
		$this->beb_alias_name->EditAttrs["class"] = "form-control";
		$this->beb_alias_name->EditCustomAttributes = "";
		$this->beb_alias_name->EditValue = $this->beb_alias_name->CurrentValue;
		$this->beb_alias_name->PlaceHolder = RemoveHtml($this->beb_alias_name->caption());

		// sensor_type_id
		$this->sensor_type_id->EditAttrs["class"] = "form-control";
		$this->sensor_type_id->EditCustomAttributes = "";
		$this->sensor_type_id->EditValue = $this->sensor_type_id->CurrentValue;
		$this->sensor_type_id->PlaceHolder = RemoveHtml($this->sensor_type_id->caption());

		// sensor_unit
		$this->sensor_unit->EditAttrs["class"] = "form-control";
		$this->sensor_unit->EditCustomAttributes = "";
		$this->sensor_unit->EditValue = $this->sensor_unit->CurrentValue;
		$this->sensor_unit->PlaceHolder = RemoveHtml($this->sensor_unit->caption());

		// active
		$this->active->EditAttrs["class"] = "form-control";
		$this->active->EditCustomAttributes = "";
		$this->active->EditValue = $this->active->CurrentValue;
		$this->active->PlaceHolder = RemoveHtml($this->active->caption());

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
					if ($this->beb_alias_name->Exportable)
						$doc->exportCaption($this->beb_alias_name);
					if ($this->active->Exportable)
						$doc->exportCaption($this->active);
					if ($this->date_add->Exportable)
						$doc->exportCaption($this->date_add);
				} else {
					if ($this->RTLindex->Exportable)
						$doc->exportCaption($this->RTLindex);
					if ($this->sensor_id->Exportable)
						$doc->exportCaption($this->sensor_id);
					if ($this->beb_alias_name->Exportable)
						$doc->exportCaption($this->beb_alias_name);
					if ($this->active->Exportable)
						$doc->exportCaption($this->active);
					if ($this->date_add->Exportable)
						$doc->exportCaption($this->date_add);
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
						if ($this->beb_alias_name->Exportable)
							$doc->exportField($this->beb_alias_name);
						if ($this->active->Exportable)
							$doc->exportField($this->active);
						if ($this->date_add->Exportable)
							$doc->exportField($this->date_add);
					} else {
						if ($this->RTLindex->Exportable)
							$doc->exportField($this->RTLindex);
						if ($this->sensor_id->Exportable)
							$doc->exportField($this->sensor_id);
						if ($this->beb_alias_name->Exportable)
							$doc->exportField($this->beb_alias_name);
						if ($this->active->Exportable)
							$doc->exportField($this->active);
						if ($this->date_add->Exportable)
							$doc->exportField($this->date_add);
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
