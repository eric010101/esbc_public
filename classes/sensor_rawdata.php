<?php
namespace PHPMaker2019\esbc_public_20181122;

/**
 * Table class for sensor_rawdata
 */
class sensor_rawdata extends DbTable
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
	public $imei;
	public $GPS_lat;
	public $GPS_lon;
	public $timezone;
	public $beb_mac;
	public $cali_id;
	public $sensor_id;
	public $sensor_value;
	public $sensor_unit;
	public $date_add;
	public $sensor_typename;
	public $blockn;
	public $BlockDetail;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'sensor_rawdata';
		$this->TableName = 'sensor_rawdata';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`sensor_rawdata`";
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
		$this->RTLindex = new DbField('sensor_rawdata', 'sensor_rawdata', 'x_RTLindex', 'RTLindex', '`RTLindex`', '`RTLindex`', 20, -1, FALSE, '`RTLindex`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->RTLindex->IsAutoIncrement = TRUE; // Autoincrement field
		$this->RTLindex->IsPrimaryKey = TRUE; // Primary key field
		$this->RTLindex->Sortable = TRUE; // Allow sort
		$this->RTLindex->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['RTLindex'] = &$this->RTLindex;

		// imei
		$this->imei = new DbField('sensor_rawdata', 'sensor_rawdata', 'x_imei', 'imei', '`imei`', '`imei`', 200, -1, FALSE, '`imei`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->imei->Sortable = TRUE; // Allow sort
		$this->fields['imei'] = &$this->imei;

		// GPS_lat
		$this->GPS_lat = new DbField('sensor_rawdata', 'sensor_rawdata', 'x_GPS_lat', 'GPS_lat', '`GPS_lat`', '`GPS_lat`', 5, -1, FALSE, '`GPS_lat`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GPS_lat->Sortable = TRUE; // Allow sort
		$this->GPS_lat->DefaultErrorMessage = $Language->Phrase("IncorrectFloat");
		$this->fields['GPS_lat'] = &$this->GPS_lat;

		// GPS_lon
		$this->GPS_lon = new DbField('sensor_rawdata', 'sensor_rawdata', 'x_GPS_lon', 'GPS_lon', '`GPS_lon`', '`GPS_lon`', 5, -1, FALSE, '`GPS_lon`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GPS_lon->Sortable = TRUE; // Allow sort
		$this->GPS_lon->DefaultErrorMessage = $Language->Phrase("IncorrectFloat");
		$this->fields['GPS_lon'] = &$this->GPS_lon;

		// timezone
		$this->timezone = new DbField('sensor_rawdata', 'sensor_rawdata', 'x_timezone', 'timezone', '`timezone`', '`timezone`', 200, -1, FALSE, '`timezone`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->timezone->Sortable = TRUE; // Allow sort
		$this->fields['timezone'] = &$this->timezone;

		// beb_mac
		$this->beb_mac = new DbField('sensor_rawdata', 'sensor_rawdata', 'x_beb_mac', 'beb_mac', '`beb_mac`', '`beb_mac`', 200, -1, FALSE, '`beb_mac`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->beb_mac->Sortable = FALSE; // Allow sort
		$this->fields['beb_mac'] = &$this->beb_mac;

		// cali_id
		$this->cali_id = new DbField('sensor_rawdata', 'sensor_rawdata', 'x_cali_id', 'cali_id', '`cali_id`', '`cali_id`', 3, -1, FALSE, '`cali_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cali_id->Sortable = FALSE; // Allow sort
		$this->cali_id->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['cali_id'] = &$this->cali_id;

		// sensor_id
		$this->sensor_id = new DbField('sensor_rawdata', 'sensor_rawdata', 'x_sensor_id', 'sensor_id', '`sensor_id`', '`sensor_id`', 200, -1, FALSE, '`sensor_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sensor_id->Sortable = TRUE; // Allow sort
		$this->fields['sensor_id'] = &$this->sensor_id;

		// sensor_value
		$this->sensor_value = new DbField('sensor_rawdata', 'sensor_rawdata', 'x_sensor_value', 'sensor_value', '`sensor_value`', '`sensor_value`', 5, -1, FALSE, '`sensor_value`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sensor_value->Nullable = FALSE; // NOT NULL field
		$this->sensor_value->Required = TRUE; // Required field
		$this->sensor_value->Sortable = TRUE; // Allow sort
		$this->sensor_value->DefaultErrorMessage = $Language->Phrase("IncorrectFloat");
		$this->fields['sensor_value'] = &$this->sensor_value;

		// sensor_unit
		$this->sensor_unit = new DbField('sensor_rawdata', 'sensor_rawdata', 'x_sensor_unit', 'sensor_unit', '`sensor_unit`', '`sensor_unit`', 200, -1, FALSE, '`sensor_unit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sensor_unit->Sortable = TRUE; // Allow sort
		$this->fields['sensor_unit'] = &$this->sensor_unit;

		// date_add
		$this->date_add = new DbField('sensor_rawdata', 'sensor_rawdata', 'x_date_add', 'date_add', '`date_add`', CastDateFieldForLike('`date_add`', 1, "DB"), 135, 1, FALSE, '`date_add`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->date_add->Sortable = TRUE; // Allow sort
		$this->date_add->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->Phrase("IncorrectDate"));
		$this->fields['date_add'] = &$this->date_add;

		// sensor_typename
		$this->sensor_typename = new DbField('sensor_rawdata', 'sensor_rawdata', 'x_sensor_typename', 'sensor_typename', '`sensor_typename`', '`sensor_typename`', 200, -1, FALSE, '`sensor_typename`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sensor_typename->Sortable = FALSE; // Allow sort
		$this->fields['sensor_typename'] = &$this->sensor_typename;

		// blockn
		$this->blockn = new DbField('sensor_rawdata', 'sensor_rawdata', 'x_blockn', 'blockn', '`blockn`', '`blockn`', 200, -1, FALSE, '`blockn`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->blockn->Sortable = TRUE; // Allow sort
		$this->fields['blockn'] = &$this->blockn;

		// BlockDetail
		$this->BlockDetail = new DbField('sensor_rawdata', 'sensor_rawdata', 'x_BlockDetail', 'BlockDetail', '\'\'', '\'\'', 201, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->BlockDetail->IsCustom = TRUE; // Custom field
		$this->BlockDetail->Sortable = TRUE; // Allow sort
		$this->fields['BlockDetail'] = &$this->BlockDetail;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`sensor_rawdata`";
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
		return ($this->SqlSelect <> "") ? $this->SqlSelect : "SELECT *, '' AS `BlockDetail` FROM " . $this->getSqlFrom();
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
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "`date_add` DESC,`blockn` DESC";
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
		$this->imei->DbValue = $row['imei'];
		$this->GPS_lat->DbValue = $row['GPS_lat'];
		$this->GPS_lon->DbValue = $row['GPS_lon'];
		$this->timezone->DbValue = $row['timezone'];
		$this->beb_mac->DbValue = $row['beb_mac'];
		$this->cali_id->DbValue = $row['cali_id'];
		$this->sensor_id->DbValue = $row['sensor_id'];
		$this->sensor_value->DbValue = $row['sensor_value'];
		$this->sensor_unit->DbValue = $row['sensor_unit'];
		$this->date_add->DbValue = $row['date_add'];
		$this->sensor_typename->DbValue = $row['sensor_typename'];
		$this->blockn->DbValue = $row['blockn'];
		$this->BlockDetail->DbValue = $row['BlockDetail'];
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
			return "sensor_rawdatalist.php";
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
		if ($pageName == "sensor_rawdataview.php")
			return $Language->Phrase("View");
		elseif ($pageName == "sensor_rawdataedit.php")
			return $Language->Phrase("Edit");
		elseif ($pageName == "sensor_rawdataadd.php")
			return $Language->Phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "sensor_rawdatalist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("sensor_rawdataview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("sensor_rawdataview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "sensor_rawdataadd.php?" . $this->getUrlParm($parm);
		else
			$url = "sensor_rawdataadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("sensor_rawdataedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("sensor_rawdataadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("sensor_rawdatadelete.php", $this->getUrlParm());
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
		$this->imei->setDbValue($rs->fields('imei'));
		$this->GPS_lat->setDbValue($rs->fields('GPS_lat'));
		$this->GPS_lon->setDbValue($rs->fields('GPS_lon'));
		$this->timezone->setDbValue($rs->fields('timezone'));
		$this->beb_mac->setDbValue($rs->fields('beb_mac'));
		$this->cali_id->setDbValue($rs->fields('cali_id'));
		$this->sensor_id->setDbValue($rs->fields('sensor_id'));
		$this->sensor_value->setDbValue($rs->fields('sensor_value'));
		$this->sensor_unit->setDbValue($rs->fields('sensor_unit'));
		$this->date_add->setDbValue($rs->fields('date_add'));
		$this->sensor_typename->setDbValue($rs->fields('sensor_typename'));
		$this->blockn->setDbValue($rs->fields('blockn'));
		$this->BlockDetail->setDbValue($rs->fields('BlockDetail'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

	// Common render codes
		// RTLindex
		// imei
		// GPS_lat
		// GPS_lon
		// timezone
		// beb_mac
		// cali_id
		// sensor_id
		// sensor_value
		// sensor_unit
		// date_add
		// sensor_typename
		// blockn
		// BlockDetail
		// RTLindex

		$this->RTLindex->ViewValue = $this->RTLindex->CurrentValue;
		$this->RTLindex->ViewCustomAttributes = "";

		// imei
		$this->imei->ViewValue = $this->imei->CurrentValue;
		$this->imei->ViewCustomAttributes = "";

		// GPS_lat
		$this->GPS_lat->ViewValue = $this->GPS_lat->CurrentValue;
		$this->GPS_lat->ViewValue = FormatNumber($this->GPS_lat->ViewValue, 2, -2, -2, -2);
		$this->GPS_lat->ViewCustomAttributes = "";

		// GPS_lon
		$this->GPS_lon->ViewValue = $this->GPS_lon->CurrentValue;
		$this->GPS_lon->ViewValue = FormatNumber($this->GPS_lon->ViewValue, 2, -2, -2, -2);
		$this->GPS_lon->ViewCustomAttributes = "";

		// timezone
		$this->timezone->ViewValue = $this->timezone->CurrentValue;
		$this->timezone->ViewCustomAttributes = "";

		// beb_mac
		$this->beb_mac->ViewValue = $this->beb_mac->CurrentValue;
		$this->beb_mac->ViewCustomAttributes = "";

		// cali_id
		$this->cali_id->ViewValue = $this->cali_id->CurrentValue;
		$this->cali_id->ViewValue = FormatNumber($this->cali_id->ViewValue, 0, -2, -2, -2);
		$this->cali_id->ViewCustomAttributes = "";

		// sensor_id
		$this->sensor_id->ViewValue = $this->sensor_id->CurrentValue;
		$this->sensor_id->ViewCustomAttributes = "";

		// sensor_value
		$this->sensor_value->ViewValue = $this->sensor_value->CurrentValue;
		$this->sensor_value->ViewValue = FormatNumber($this->sensor_value->ViewValue, 2, -2, -2, -2);
		$this->sensor_value->ViewCustomAttributes = "";

		// sensor_unit
		$this->sensor_unit->ViewValue = $this->sensor_unit->CurrentValue;
		$this->sensor_unit->ViewCustomAttributes = "";

		// date_add
		$this->date_add->ViewValue = $this->date_add->CurrentValue;
		$this->date_add->ViewValue = FormatDateTime($this->date_add->ViewValue, 1);
		$this->date_add->ViewCustomAttributes = "";

		// sensor_typename
		$this->sensor_typename->ViewValue = $this->sensor_typename->CurrentValue;
		$this->sensor_typename->ViewCustomAttributes = "";

		// blockn
		$this->blockn->ViewValue = $this->blockn->CurrentValue;
		$this->blockn->ViewCustomAttributes = "";

		// BlockDetail
		$this->BlockDetail->ViewValue = $this->BlockDetail->CurrentValue;
		$this->BlockDetail->ViewCustomAttributes = "";

		// RTLindex
		$this->RTLindex->LinkCustomAttributes = "";
		$this->RTLindex->HrefValue = "";
		$this->RTLindex->TooltipValue = "";

		// imei
		$this->imei->LinkCustomAttributes = "";
		$this->imei->HrefValue = "";
		$this->imei->TooltipValue = "";

		// GPS_lat
		$this->GPS_lat->LinkCustomAttributes = "";
		$this->GPS_lat->HrefValue = "";
		$this->GPS_lat->TooltipValue = "";

		// GPS_lon
		$this->GPS_lon->LinkCustomAttributes = "";
		$this->GPS_lon->HrefValue = "";
		$this->GPS_lon->TooltipValue = "";

		// timezone
		$this->timezone->LinkCustomAttributes = "";
		$this->timezone->HrefValue = "";
		$this->timezone->TooltipValue = "";

		// beb_mac
		$this->beb_mac->LinkCustomAttributes = "";
		$this->beb_mac->HrefValue = "";
		$this->beb_mac->TooltipValue = "";

		// cali_id
		$this->cali_id->LinkCustomAttributes = "";
		$this->cali_id->HrefValue = "";
		$this->cali_id->TooltipValue = "";

		// sensor_id
		$this->sensor_id->LinkCustomAttributes = "";
		$this->sensor_id->HrefValue = "";
		$this->sensor_id->TooltipValue = "";

		// sensor_value
		$this->sensor_value->LinkCustomAttributes = "";
		$this->sensor_value->HrefValue = "";
		$this->sensor_value->TooltipValue = "";

		// sensor_unit
		$this->sensor_unit->LinkCustomAttributes = "";
		$this->sensor_unit->HrefValue = "";
		$this->sensor_unit->TooltipValue = "";

		// date_add
		$this->date_add->LinkCustomAttributes = "";
		$this->date_add->HrefValue = "";
		$this->date_add->TooltipValue = "";

		// sensor_typename
		$this->sensor_typename->LinkCustomAttributes = "";
		$this->sensor_typename->HrefValue = "";
		$this->sensor_typename->TooltipValue = "";

		// blockn
		$this->blockn->LinkCustomAttributes = "";
		$this->blockn->HrefValue = "";
		$this->blockn->TooltipValue = "";

		// BlockDetail
		$this->BlockDetail->LinkCustomAttributes = "";
		$this->BlockDetail->HrefValue = "";
		$this->BlockDetail->TooltipValue = "";

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

		// imei
		$this->imei->EditAttrs["class"] = "form-control";
		$this->imei->EditCustomAttributes = "";
		$this->imei->EditValue = $this->imei->CurrentValue;
		$this->imei->PlaceHolder = RemoveHtml($this->imei->caption());

		// GPS_lat
		$this->GPS_lat->EditAttrs["class"] = "form-control";
		$this->GPS_lat->EditCustomAttributes = "";
		$this->GPS_lat->EditValue = $this->GPS_lat->CurrentValue;
		$this->GPS_lat->PlaceHolder = RemoveHtml($this->GPS_lat->caption());
		if (strval($this->GPS_lat->EditValue) <> "" && is_numeric($this->GPS_lat->EditValue))
			$this->GPS_lat->EditValue = FormatNumber($this->GPS_lat->EditValue, -2, -2, -2, -2);

		// GPS_lon
		$this->GPS_lon->EditAttrs["class"] = "form-control";
		$this->GPS_lon->EditCustomAttributes = "";
		$this->GPS_lon->EditValue = $this->GPS_lon->CurrentValue;
		$this->GPS_lon->PlaceHolder = RemoveHtml($this->GPS_lon->caption());
		if (strval($this->GPS_lon->EditValue) <> "" && is_numeric($this->GPS_lon->EditValue))
			$this->GPS_lon->EditValue = FormatNumber($this->GPS_lon->EditValue, -2, -2, -2, -2);

		// timezone
		$this->timezone->EditAttrs["class"] = "form-control";
		$this->timezone->EditCustomAttributes = "";
		$this->timezone->EditValue = $this->timezone->CurrentValue;
		$this->timezone->PlaceHolder = RemoveHtml($this->timezone->caption());

		// beb_mac
		$this->beb_mac->EditAttrs["class"] = "form-control";
		$this->beb_mac->EditCustomAttributes = "";
		$this->beb_mac->EditValue = $this->beb_mac->CurrentValue;
		$this->beb_mac->PlaceHolder = RemoveHtml($this->beb_mac->caption());

		// cali_id
		$this->cali_id->EditAttrs["class"] = "form-control";
		$this->cali_id->EditCustomAttributes = "";
		$this->cali_id->EditValue = $this->cali_id->CurrentValue;
		$this->cali_id->PlaceHolder = RemoveHtml($this->cali_id->caption());

		// sensor_id
		$this->sensor_id->EditAttrs["class"] = "form-control";
		$this->sensor_id->EditCustomAttributes = "";
		$this->sensor_id->EditValue = $this->sensor_id->CurrentValue;
		$this->sensor_id->PlaceHolder = RemoveHtml($this->sensor_id->caption());

		// sensor_value
		$this->sensor_value->EditAttrs["class"] = "form-control";
		$this->sensor_value->EditCustomAttributes = "";
		$this->sensor_value->EditValue = $this->sensor_value->CurrentValue;
		$this->sensor_value->PlaceHolder = RemoveHtml($this->sensor_value->caption());
		if (strval($this->sensor_value->EditValue) <> "" && is_numeric($this->sensor_value->EditValue))
			$this->sensor_value->EditValue = FormatNumber($this->sensor_value->EditValue, -2, -2, -2, -2);

		// sensor_unit
		$this->sensor_unit->EditAttrs["class"] = "form-control";
		$this->sensor_unit->EditCustomAttributes = "";
		$this->sensor_unit->EditValue = $this->sensor_unit->CurrentValue;
		$this->sensor_unit->PlaceHolder = RemoveHtml($this->sensor_unit->caption());

		// date_add
		$this->date_add->EditAttrs["class"] = "form-control";
		$this->date_add->EditCustomAttributes = "";
		$this->date_add->EditValue = FormatDateTime($this->date_add->CurrentValue, 8);
		$this->date_add->PlaceHolder = RemoveHtml($this->date_add->caption());

		// sensor_typename
		$this->sensor_typename->EditAttrs["class"] = "form-control";
		$this->sensor_typename->EditCustomAttributes = "";
		$this->sensor_typename->EditValue = $this->sensor_typename->CurrentValue;
		$this->sensor_typename->PlaceHolder = RemoveHtml($this->sensor_typename->caption());

		// blockn
		$this->blockn->EditAttrs["class"] = "form-control";
		$this->blockn->EditCustomAttributes = "";
		$this->blockn->EditValue = $this->blockn->CurrentValue;
		$this->blockn->PlaceHolder = RemoveHtml($this->blockn->caption());

		// BlockDetail
		$this->BlockDetail->EditAttrs["class"] = "form-control";
		$this->BlockDetail->EditCustomAttributes = "";
		$this->BlockDetail->EditValue = $this->BlockDetail->CurrentValue;
		$this->BlockDetail->PlaceHolder = RemoveHtml($this->BlockDetail->caption());

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
					if ($this->imei->Exportable)
						$doc->exportCaption($this->imei);
					if ($this->GPS_lat->Exportable)
						$doc->exportCaption($this->GPS_lat);
					if ($this->GPS_lon->Exportable)
						$doc->exportCaption($this->GPS_lon);
					if ($this->timezone->Exportable)
						$doc->exportCaption($this->timezone);
					if ($this->sensor_id->Exportable)
						$doc->exportCaption($this->sensor_id);
					if ($this->sensor_value->Exportable)
						$doc->exportCaption($this->sensor_value);
					if ($this->sensor_unit->Exportable)
						$doc->exportCaption($this->sensor_unit);
					if ($this->date_add->Exportable)
						$doc->exportCaption($this->date_add);
					if ($this->blockn->Exportable)
						$doc->exportCaption($this->blockn);
					if ($this->BlockDetail->Exportable)
						$doc->exportCaption($this->BlockDetail);
				} else {
					if ($this->RTLindex->Exportable)
						$doc->exportCaption($this->RTLindex);
					if ($this->imei->Exportable)
						$doc->exportCaption($this->imei);
					if ($this->GPS_lat->Exportable)
						$doc->exportCaption($this->GPS_lat);
					if ($this->GPS_lon->Exportable)
						$doc->exportCaption($this->GPS_lon);
					if ($this->timezone->Exportable)
						$doc->exportCaption($this->timezone);
					if ($this->sensor_id->Exportable)
						$doc->exportCaption($this->sensor_id);
					if ($this->sensor_value->Exportable)
						$doc->exportCaption($this->sensor_value);
					if ($this->sensor_unit->Exportable)
						$doc->exportCaption($this->sensor_unit);
					if ($this->date_add->Exportable)
						$doc->exportCaption($this->date_add);
					if ($this->blockn->Exportable)
						$doc->exportCaption($this->blockn);
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
						if ($this->imei->Exportable)
							$doc->exportField($this->imei);
						if ($this->GPS_lat->Exportable)
							$doc->exportField($this->GPS_lat);
						if ($this->GPS_lon->Exportable)
							$doc->exportField($this->GPS_lon);
						if ($this->timezone->Exportable)
							$doc->exportField($this->timezone);
						if ($this->sensor_id->Exportable)
							$doc->exportField($this->sensor_id);
						if ($this->sensor_value->Exportable)
							$doc->exportField($this->sensor_value);
						if ($this->sensor_unit->Exportable)
							$doc->exportField($this->sensor_unit);
						if ($this->date_add->Exportable)
							$doc->exportField($this->date_add);
						if ($this->blockn->Exportable)
							$doc->exportField($this->blockn);
						if ($this->BlockDetail->Exportable)
							$doc->exportField($this->BlockDetail);
					} else {
						if ($this->RTLindex->Exportable)
							$doc->exportField($this->RTLindex);
						if ($this->imei->Exportable)
							$doc->exportField($this->imei);
						if ($this->GPS_lat->Exportable)
							$doc->exportField($this->GPS_lat);
						if ($this->GPS_lon->Exportable)
							$doc->exportField($this->GPS_lon);
						if ($this->timezone->Exportable)
							$doc->exportField($this->timezone);
						if ($this->sensor_id->Exportable)
							$doc->exportField($this->sensor_id);
						if ($this->sensor_value->Exportable)
							$doc->exportField($this->sensor_value);
						if ($this->sensor_unit->Exportable)
							$doc->exportField($this->sensor_unit);
						if ($this->date_add->Exportable)
							$doc->exportField($this->date_add);
						if ($this->blockn->Exportable)
							$doc->exportField($this->blockn);
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

			if (CurrentPageID()=="view"){
				$bn=$this->blockn->CurrentValue;

			    //$this->BlockDetail->ViewValue='hi'.$bn;
				require('./exampleBase.php');
				$eth = $web3->eth;
				$i=(int)$bn;;
				$eth->getBlockByNumber($i , true, function ($err, $block){
					if ($err !== null) {
					echo 'Error: ' . $err->getMessage();
					return;
				}	 
					$detail='';
					 $str = '';
					 $str .= 'difficulty= '.$block->{'difficulty'}.'<BR>'.PHP_EOL;
					 $str .= 'extraData= '.$block->{'extraData'}.'<BR>'.PHP_EOL;
					 $str .= 'gasLimit= '.$block->{'gasLimit'}.'<BR>'.PHP_EOL;
					 $str .= 'gasUsed= '.$block->{'gasUsed'}.'<BR>'.PHP_EOL;
					 $str .= 'hash= '.$block->{'hash'}.'<BR>'.PHP_EOL;
					 $str .= 'logsBloom= '.$block->{'logsBloom'}.'<BR>'.PHP_EOL;
					 $str .= 'miner= '.$block->{'miner'}.'<BR>'.PHP_EOL;
					 $str .= 'mixHash= '.$block->{'mixHash'}.'<BR>'.PHP_EOL;
					 $str .= 'nonce= '.$block->{'nonce'}.'<BR>'.PHP_EOL;
					 $str .= 'number= '.$block->{'number'}.'<BR>'.PHP_EOL;
					 $str .= 'parentHash= '.$block->{'parentHash'}.'<BR>'.PHP_EOL;
					 $str .= 'receiptsRoot= '.$block->{'receiptsRoot'}.'<BR>'.PHP_EOL;
					 $str .= 'sha3Uncles= '.$block->{'sha3Uncles'}.'<BR>'.PHP_EOL;
					 $str .= 'size= '.$block->{'size'}.'<BR>'.PHP_EOL;
					 $str .= 'stateRoot= '.$block->{'stateRoot'}.'<BR>'.PHP_EOL;
					 $str .= 'timestamp= '.$block->{'timestamp'}.'<BR>'.PHP_EOL;
					 $str .= 'totalDifficulty= '.$block->{'totalDifficulty'}.'<BR>'.PHP_EOL;
					 $str .= 'transactionsRoot= '.$block->{'transactionsRoot'}.'<BR>'.PHP_EOL;

					// $str .= 'uncles= '.$block->{'uncles'}.'<BR>'.PHP_EOL;
					 // $this->BlockDetail->ViewValue =$str;

					 $detail .= $str.'<BR>';
		 			 if (sizeof($block->transactions)>0) {
					   $str="";
					   $trans=$block->transactions;

					   //echo var_dump($trans);
					    foreach ($trans as $tran) {
					   	   $str=$str.'transactionIndex= '.$tran->{'transactionIndex'}.'<BR>'.PHP_EOL;
						   $str=$str.'blockNumber= '.$tran->{'blockNumber'}.'<BR>'.PHP_EOL;
						   $str=$str.'blockHash= '.$tran->{'blockHash'}.'<BR>'.PHP_EOL;
						   $str=$str.'from= '.$tran->{'from'}.'<BR>'.PHP_EOL;
						   $str=$str.'to= '.$tran->{'to'}.'<BR>'.PHP_EOL;
						  $str=$str.'hash= '.$tran->{'hash'}.'<BR>'.PHP_EOL;
						  $str=$str.'gas= '.hexdec($tran->{'gas'}).'<BR>'.PHP_EOL;
						  $str=$str.'gasPrice= '.hexdec($tran->{'gasPrice'}).'<BR>'.PHP_EOL;
						  $str=$str.'value= '.hexdec($tran->{'value'}).'<BR>'.PHP_EOL;
						  $str=$str.'nonce= '.$tran->{'nonce'}.'<BR>'.PHP_EOL;
						  $str=$str.'Input hex= '.$tran->{'input'}.'<BR>'.PHP_EOL;
						  $hex=$tran->{'input'};

						  // $a=hexToStr($hex);
						  $string='';
						  if (strlen($hex)>4) {
							  	 for ($i=0;$i<strlen($hex)-1;$i+=2){
									 if ($hex[$i+1]<>'x'){				
									$string .= chr(hexdec('0x'.$hex[$i].$hex[$i+1]));
									  }
								 }
						  }
						  $string=str_replace(",",",<BR>",$string);
						  $string=str_replace("{","<BR>{<BR>",$string);
						  $string=str_replace("}","<BR>}",$string);
						  $str=$str.'Input str= '.$string.'<BR>'.PHP_EOL;
						  $str=$str.'v= '.$tran->{'v'}.'<BR>'.PHP_EOL;
						  $str=$str.'r= '.$tran->{'r'}.'<BR>'.PHP_EOL;
						  $str=$str.'s= '.$tran->{'s'}.'<BR>'.PHP_EOL;
						  $str=$str.'=============================<BR>'.PHP_EOL;
					    }
						$detail .= $str.'<BR>';
						$this->BlockDetail->ViewValue =$detail ;

				//	 $this->TXDetail->ViewValue =  $str;
					 } 

					 //$this->GasUsed->ViewValue =$block->{'gasUsed'};
					});
			}
		}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>
