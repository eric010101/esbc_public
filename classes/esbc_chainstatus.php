<?php
namespace PHPMaker2019\esbc_public_20181122;

/**
 * Table class for esbc_chainstatus
 */
class esbc_chainstatus extends DbTable
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
	public $Bindex;
	public $BlockN;
	public $BlockHash;
	public $Difficulty;
	public $Size;
	public $Age;
	public $BlockDetail;
	public $TXs;
	public $GasUsed;
	public $TXDetail;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'esbc_chainstatus';
		$this->TableName = 'esbc_chainstatus';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`esbc_chainstatus`";
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

		// Bindex
		$this->Bindex = new DbField('esbc_chainstatus', 'esbc_chainstatus', 'x_Bindex', 'Bindex', '`Bindex`', '`Bindex`', 20, -1, FALSE, '`Bindex`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->Bindex->IsAutoIncrement = TRUE; // Autoincrement field
		$this->Bindex->IsPrimaryKey = TRUE; // Primary key field
		$this->Bindex->Sortable = TRUE; // Allow sort
		$this->Bindex->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['Bindex'] = &$this->Bindex;

		// BlockN
		$this->BlockN = new DbField('esbc_chainstatus', 'esbc_chainstatus', 'x_BlockN', 'BlockN', '`BlockN`', '`BlockN`', 20, -1, FALSE, '`BlockN`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BlockN->Nullable = FALSE; // NOT NULL field
		$this->BlockN->Required = TRUE; // Required field
		$this->BlockN->Sortable = TRUE; // Allow sort
		$this->BlockN->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['BlockN'] = &$this->BlockN;

		// BlockHash
		$this->BlockHash = new DbField('esbc_chainstatus', 'esbc_chainstatus', 'x_BlockHash', 'BlockHash', '`BlockHash`', '`BlockHash`', 200, -1, FALSE, '`BlockHash`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BlockHash->Nullable = FALSE; // NOT NULL field
		$this->BlockHash->Required = TRUE; // Required field
		$this->BlockHash->Sortable = TRUE; // Allow sort
		$this->fields['BlockHash'] = &$this->BlockHash;

		// Difficulty
		$this->Difficulty = new DbField('esbc_chainstatus', 'esbc_chainstatus', 'x_Difficulty', 'Difficulty', '`Difficulty`', '`Difficulty`', 3, -1, FALSE, '`Difficulty`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Difficulty->Nullable = FALSE; // NOT NULL field
		$this->Difficulty->Required = TRUE; // Required field
		$this->Difficulty->Sortable = TRUE; // Allow sort
		$this->Difficulty->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['Difficulty'] = &$this->Difficulty;

		// Size
		$this->Size = new DbField('esbc_chainstatus', 'esbc_chainstatus', 'x_Size', 'Size', '`Size`', '`Size`', 3, -1, FALSE, '`Size`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Size->Nullable = FALSE; // NOT NULL field
		$this->Size->Required = TRUE; // Required field
		$this->Size->Sortable = TRUE; // Allow sort
		$this->Size->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['Size'] = &$this->Size;

		// Age
		$this->Age = new DbField('esbc_chainstatus', 'esbc_chainstatus', 'x_Age', 'Age', '`Age`', '`Age`', 3, -1, FALSE, '`Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->Nullable = FALSE; // NOT NULL field
		$this->Age->Required = TRUE; // Required field
		$this->Age->Sortable = TRUE; // Allow sort
		$this->Age->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['Age'] = &$this->Age;

		// BlockDetail
		$this->BlockDetail = new DbField('esbc_chainstatus', 'esbc_chainstatus', 'x_BlockDetail', 'BlockDetail', '`BlockDetail`', '`BlockDetail`', 201, -1, FALSE, '`BlockDetail`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->BlockDetail->Sortable = TRUE; // Allow sort
		$this->fields['BlockDetail'] = &$this->BlockDetail;

		// TXs
		$this->TXs = new DbField('esbc_chainstatus', 'esbc_chainstatus', 'x_TXs', 'TXs', '`TXs`', '`TXs`', 3, -1, FALSE, '`TXs`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TXs->Nullable = FALSE; // NOT NULL field
		$this->TXs->Required = TRUE; // Required field
		$this->TXs->Sortable = TRUE; // Allow sort
		$this->TXs->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['TXs'] = &$this->TXs;

		// GasUsed
		$this->GasUsed = new DbField('esbc_chainstatus', 'esbc_chainstatus', 'x_GasUsed', 'GasUsed', '`GasUsed`', '`GasUsed`', 20, -1, FALSE, '`GasUsed`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GasUsed->Nullable = FALSE; // NOT NULL field
		$this->GasUsed->Required = TRUE; // Required field
		$this->GasUsed->Sortable = TRUE; // Allow sort
		$this->GasUsed->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['GasUsed'] = &$this->GasUsed;

		// TXDetail
		$this->TXDetail = new DbField('esbc_chainstatus', 'esbc_chainstatus', 'x_TXDetail', 'TXDetail', '`TXDetail`', '`TXDetail`', 201, -1, FALSE, '`TXDetail`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->TXDetail->Sortable = TRUE; // Allow sort
		$this->fields['TXDetail'] = &$this->TXDetail;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`esbc_chainstatus`";
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
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "`BlockN` DESC";
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
			$this->Bindex->setDbValue($conn->insert_ID());
			$rs['Bindex'] = $this->Bindex->DbValue;
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
			if (array_key_exists('Bindex', $rs))
				AddFilter($where, QuotedName('Bindex', $this->Dbid) . '=' . QuotedValue($rs['Bindex'], $this->Bindex->DataType, $this->Dbid));
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
		$this->Bindex->DbValue = $row['Bindex'];
		$this->BlockN->DbValue = $row['BlockN'];
		$this->BlockHash->DbValue = $row['BlockHash'];
		$this->Difficulty->DbValue = $row['Difficulty'];
		$this->Size->DbValue = $row['Size'];
		$this->Age->DbValue = $row['Age'];
		$this->BlockDetail->DbValue = $row['BlockDetail'];
		$this->TXs->DbValue = $row['TXs'];
		$this->GasUsed->DbValue = $row['GasUsed'];
		$this->TXDetail->DbValue = $row['TXDetail'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`Bindex` = @Bindex@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('Bindex', $row) ? $row['Bindex'] : NULL) : $this->Bindex->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@Bindex@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "esbc_chainstatuslist.php";
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
		if ($pageName == "esbc_chainstatusview.php")
			return $Language->Phrase("View");
		elseif ($pageName == "esbc_chainstatusedit.php")
			return $Language->Phrase("Edit");
		elseif ($pageName == "esbc_chainstatusadd.php")
			return $Language->Phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "esbc_chainstatuslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("esbc_chainstatusview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("esbc_chainstatusview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "esbc_chainstatusadd.php?" . $this->getUrlParm($parm);
		else
			$url = "esbc_chainstatusadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("esbc_chainstatusedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("esbc_chainstatusadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("esbc_chainstatusdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "Bindex:" . JsonEncode($this->Bindex->CurrentValue, "number");
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
		if ($this->Bindex->CurrentValue != NULL) {
			$url .= "Bindex=" . urlencode($this->Bindex->CurrentValue);
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
			if (Param("Bindex") !== NULL)
				$arKeys[] = Param("Bindex");
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
			$this->Bindex->CurrentValue = $key;
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
		$this->Bindex->setDbValue($rs->fields('Bindex'));
		$this->BlockN->setDbValue($rs->fields('BlockN'));
		$this->BlockHash->setDbValue($rs->fields('BlockHash'));
		$this->Difficulty->setDbValue($rs->fields('Difficulty'));
		$this->Size->setDbValue($rs->fields('Size'));
		$this->Age->setDbValue($rs->fields('Age'));
		$this->BlockDetail->setDbValue($rs->fields('BlockDetail'));
		$this->TXs->setDbValue($rs->fields('TXs'));
		$this->GasUsed->setDbValue($rs->fields('GasUsed'));
		$this->TXDetail->setDbValue($rs->fields('TXDetail'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

	// Common render codes
		// Bindex
		// BlockN
		// BlockHash
		// Difficulty
		// Size
		// Age
		// BlockDetail
		// TXs
		// GasUsed

		$this->GasUsed->CellCssStyle = "white-space: nowrap;";

		// TXDetail
		// Bindex

		$this->Bindex->ViewValue = $this->Bindex->CurrentValue;
		$this->Bindex->ViewCustomAttributes = "";

		// BlockN
		$this->BlockN->ViewValue = $this->BlockN->CurrentValue;
		$this->BlockN->ViewValue = FormatNumber($this->BlockN->ViewValue, 0, -2, -2, -2);
		$this->BlockN->ViewCustomAttributes = "";

		// BlockHash
		$this->BlockHash->ViewValue = $this->BlockHash->CurrentValue;
		$this->BlockHash->ViewCustomAttributes = "";

		// Difficulty
		$this->Difficulty->ViewValue = $this->Difficulty->CurrentValue;
		$this->Difficulty->ViewValue = FormatNumber($this->Difficulty->ViewValue, 0, -2, -2, -2);
		$this->Difficulty->ViewCustomAttributes = "";

		// Size
		$this->Size->ViewValue = $this->Size->CurrentValue;
		$this->Size->ViewValue = FormatNumber($this->Size->ViewValue, 0, -2, -2, -2);
		$this->Size->ViewCustomAttributes = "";

		// Age
		$this->Age->ViewValue = $this->Age->CurrentValue;
		$this->Age->ViewValue = FormatNumber($this->Age->ViewValue, 0, -2, -2, -2);
		$this->Age->ViewCustomAttributes = "";

		// BlockDetail
		$this->BlockDetail->ViewValue = $this->BlockDetail->CurrentValue;
		$this->BlockDetail->ViewCustomAttributes = "";

		// TXs
		$this->TXs->ViewValue = $this->TXs->CurrentValue;
		$this->TXs->ViewValue = FormatNumber($this->TXs->ViewValue, 0, -2, -2, -2);
		$this->TXs->ViewCustomAttributes = "";

		// GasUsed
		$this->GasUsed->ViewValue = $this->GasUsed->CurrentValue;
		$this->GasUsed->ViewValue = FormatNumber($this->GasUsed->ViewValue, 0, -2, -2, -2);
		$this->GasUsed->ViewCustomAttributes = "";

		// TXDetail
		$this->TXDetail->ViewValue = $this->TXDetail->CurrentValue;
		$this->TXDetail->ViewCustomAttributes = "";

		// Bindex
		$this->Bindex->LinkCustomAttributes = "";
		$this->Bindex->HrefValue = "";
		$this->Bindex->TooltipValue = "";

		// BlockN
		$this->BlockN->LinkCustomAttributes = "";
		$this->BlockN->HrefValue = "";
		$this->BlockN->TooltipValue = "";

		// BlockHash
		$this->BlockHash->LinkCustomAttributes = "";
		$this->BlockHash->HrefValue = "";
		$this->BlockHash->TooltipValue = "";

		// Difficulty
		$this->Difficulty->LinkCustomAttributes = "";
		$this->Difficulty->HrefValue = "";
		$this->Difficulty->TooltipValue = "";

		// Size
		$this->Size->LinkCustomAttributes = "";
		$this->Size->HrefValue = "";
		$this->Size->TooltipValue = "";

		// Age
		$this->Age->LinkCustomAttributes = "";
		$this->Age->HrefValue = "";
		$this->Age->TooltipValue = "";

		// BlockDetail
		$this->BlockDetail->LinkCustomAttributes = "";
		$this->BlockDetail->HrefValue = "";
		$this->BlockDetail->TooltipValue = "";

		// TXs
		$this->TXs->LinkCustomAttributes = "";
		$this->TXs->HrefValue = "";
		$this->TXs->TooltipValue = "";

		// GasUsed
		$this->GasUsed->LinkCustomAttributes = "";
		$this->GasUsed->HrefValue = "";
		$this->GasUsed->TooltipValue = "";

		// TXDetail
		$this->TXDetail->LinkCustomAttributes = "";
		$this->TXDetail->HrefValue = "";
		$this->TXDetail->TooltipValue = "";

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

		// Bindex
		$this->Bindex->EditAttrs["class"] = "form-control";
		$this->Bindex->EditCustomAttributes = "";
		$this->Bindex->EditValue = $this->Bindex->CurrentValue;
		$this->Bindex->ViewCustomAttributes = "";

		// BlockN
		$this->BlockN->EditAttrs["class"] = "form-control";
		$this->BlockN->EditCustomAttributes = "";
		$this->BlockN->EditValue = $this->BlockN->CurrentValue;
		$this->BlockN->PlaceHolder = RemoveHtml($this->BlockN->caption());

		// BlockHash
		$this->BlockHash->EditAttrs["class"] = "form-control";
		$this->BlockHash->EditCustomAttributes = "";
		$this->BlockHash->EditValue = $this->BlockHash->CurrentValue;
		$this->BlockHash->PlaceHolder = RemoveHtml($this->BlockHash->caption());

		// Difficulty
		$this->Difficulty->EditAttrs["class"] = "form-control";
		$this->Difficulty->EditCustomAttributes = "";
		$this->Difficulty->EditValue = $this->Difficulty->CurrentValue;
		$this->Difficulty->PlaceHolder = RemoveHtml($this->Difficulty->caption());

		// Size
		$this->Size->EditAttrs["class"] = "form-control";
		$this->Size->EditCustomAttributes = "";
		$this->Size->EditValue = $this->Size->CurrentValue;
		$this->Size->PlaceHolder = RemoveHtml($this->Size->caption());

		// Age
		$this->Age->EditAttrs["class"] = "form-control";
		$this->Age->EditCustomAttributes = "";
		$this->Age->EditValue = $this->Age->CurrentValue;
		$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

		// BlockDetail
		$this->BlockDetail->EditAttrs["class"] = "form-control";
		$this->BlockDetail->EditCustomAttributes = "";
		$this->BlockDetail->EditValue = $this->BlockDetail->CurrentValue;
		$this->BlockDetail->PlaceHolder = RemoveHtml($this->BlockDetail->caption());

		// TXs
		$this->TXs->EditAttrs["class"] = "form-control";
		$this->TXs->EditCustomAttributes = "";
		$this->TXs->EditValue = $this->TXs->CurrentValue;
		$this->TXs->PlaceHolder = RemoveHtml($this->TXs->caption());

		// GasUsed
		$this->GasUsed->EditAttrs["class"] = "form-control";
		$this->GasUsed->EditCustomAttributes = "";
		$this->GasUsed->EditValue = $this->GasUsed->CurrentValue;
		$this->GasUsed->PlaceHolder = RemoveHtml($this->GasUsed->caption());

		// TXDetail
		$this->TXDetail->EditAttrs["class"] = "form-control";
		$this->TXDetail->EditCustomAttributes = "";
		$this->TXDetail->EditValue = $this->TXDetail->CurrentValue;
		$this->TXDetail->PlaceHolder = RemoveHtml($this->TXDetail->caption());

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
					if ($this->BlockN->Exportable)
						$doc->exportCaption($this->BlockN);
					if ($this->BlockHash->Exportable)
						$doc->exportCaption($this->BlockHash);
					if ($this->Difficulty->Exportable)
						$doc->exportCaption($this->Difficulty);
					if ($this->Size->Exportable)
						$doc->exportCaption($this->Size);
					if ($this->Age->Exportable)
						$doc->exportCaption($this->Age);
					if ($this->BlockDetail->Exportable)
						$doc->exportCaption($this->BlockDetail);
					if ($this->TXs->Exportable)
						$doc->exportCaption($this->TXs);
					if ($this->GasUsed->Exportable)
						$doc->exportCaption($this->GasUsed);
					if ($this->TXDetail->Exportable)
						$doc->exportCaption($this->TXDetail);
				} else {
					if ($this->Bindex->Exportable)
						$doc->exportCaption($this->Bindex);
					if ($this->BlockN->Exportable)
						$doc->exportCaption($this->BlockN);
					if ($this->BlockHash->Exportable)
						$doc->exportCaption($this->BlockHash);
					if ($this->Difficulty->Exportable)
						$doc->exportCaption($this->Difficulty);
					if ($this->Size->Exportable)
						$doc->exportCaption($this->Size);
					if ($this->Age->Exportable)
						$doc->exportCaption($this->Age);
					if ($this->TXs->Exportable)
						$doc->exportCaption($this->TXs);
					if ($this->GasUsed->Exportable)
						$doc->exportCaption($this->GasUsed);
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
						if ($this->BlockN->Exportable)
							$doc->exportField($this->BlockN);
						if ($this->BlockHash->Exportable)
							$doc->exportField($this->BlockHash);
						if ($this->Difficulty->Exportable)
							$doc->exportField($this->Difficulty);
						if ($this->Size->Exportable)
							$doc->exportField($this->Size);
						if ($this->Age->Exportable)
							$doc->exportField($this->Age);
						if ($this->BlockDetail->Exportable)
							$doc->exportField($this->BlockDetail);
						if ($this->TXs->Exportable)
							$doc->exportField($this->TXs);
						if ($this->GasUsed->Exportable)
							$doc->exportField($this->GasUsed);
						if ($this->TXDetail->Exportable)
							$doc->exportField($this->TXDetail);
					} else {
						if ($this->Bindex->Exportable)
							$doc->exportField($this->Bindex);
						if ($this->BlockN->Exportable)
							$doc->exportField($this->BlockN);
						if ($this->BlockHash->Exportable)
							$doc->exportField($this->BlockHash);
						if ($this->Difficulty->Exportable)
							$doc->exportField($this->Difficulty);
						if ($this->Size->Exportable)
							$doc->exportField($this->Size);
						if ($this->Age->Exportable)
							$doc->exportField($this->Age);
						if ($this->TXs->Exportable)
							$doc->exportField($this->TXs);
						if ($this->GasUsed->Exportable)
							$doc->exportField($this->GasUsed);
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
		if (CurrentPageID()=="list"){
			read_BC();
		}
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
			//if (CurrentPageID()=="view"){

				$bn=$this->BlockN->CurrentValue;
			    $this->BlockDetail->ViewValue='hi'.$bn;

				//return;
				require('./exampleBase.php');
				$eth = $web3->eth;
				$i=(int)$bn;;

				//echo $bn;
				$this->BlockDetail->ViewValue='hi'.$i;
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
					 $this->BlockDetail->ViewValue =$str;

					// return;
					// $detail .= $str.'<BR>';

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

					//	$detail .= $str.'<BR>';
					//	$this->BlockDetail->ViewValue =$detail ;

						$this->TXDetail->ViewValue =  $str;

						//$this->TXDetail->ViewValue = "hi";// $str;
					 } 
					else{
						$this->TXDetail->ViewValue = "none";// $str;
					}

					 //$this->GasUsed->ViewValue =$block->{'gasUsed'};
					});

			//}
		}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>
