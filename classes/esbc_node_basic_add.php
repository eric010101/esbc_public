<?php
namespace PHPMaker2019\esbc_public_20181122;

//
// Page class
//
class esbc_node_basic_add extends esbc_node_basic
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{1450346A-D3E5-42C5-B2E0-BD489F2A0BDC}";

	// Table name
	public $TableName = 'esbc_node_basic';

	// Page object name
	public $PageObjName = "esbc_node_basic_add";

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken = CHECK_TOKEN;
	public $CheckTokenFn = PROJECT_NAMESPACE . "CheckToken";
	public $CreateTokenFn = PROJECT_NAMESPACE . "CreateToken";

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading <> "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading <> "")
			return $this->Subheading;
		if ($this->TableName)
			return $Language->Phrase($this->PageID);
		return "";
	}

	// Page name
	public function pageName()
	{
		return CurrentPageName();
	}

	// Page URL
	public function pageUrl()
	{
		$url = CurrentPageName() . "?";
		if ($this->UseTokenInUrl)
			$url .= "t=" . $this->TableVar . "&"; // Add page token
		return $url;
	}

	// Message
	public function getMessage()
	{
		return @$_SESSION[SESSION_MESSAGE];
	}
	public function setMessage($v)
	{
		AddMessage($_SESSION[SESSION_MESSAGE], $v);
	}
	public function getFailureMessage()
	{
		return @$_SESSION[SESSION_FAILURE_MESSAGE];
	}
	public function setFailureMessage($v)
	{
		AddMessage($_SESSION[SESSION_FAILURE_MESSAGE], $v);
	}
	public function getSuccessMessage()
	{
		return @$_SESSION[SESSION_SUCCESS_MESSAGE];
	}
	public function setSuccessMessage($v)
	{
		AddMessage($_SESSION[SESSION_SUCCESS_MESSAGE], $v);
	}
	public function getWarningMessage()
	{
		return @$_SESSION[SESSION_WARNING_MESSAGE];
	}
	public function setWarningMessage($v)
	{
		AddMessage($_SESSION[SESSION_WARNING_MESSAGE], $v);
	}

	// Methods to clear message
	public function clearMessage()
	{
		$_SESSION[SESSION_MESSAGE] = "";
	}
	public function clearFailureMessage()
	{
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}
	public function clearSuccessMessage()
	{
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}
	public function clearWarningMessage()
	{
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}
	public function clearMessages()
	{
		$_SESSION[SESSION_MESSAGE] = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Show message
	public function showMessage()
	{
		$hidden = FALSE;
		$html = "";

		// Message
		$message = $this->getMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($message, "");
		if ($message <> "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fa fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage <> "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fa fa-warning"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage <> "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fa fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage <> "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fa fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessageAsArray()
	{
		$ar = array();

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message <> "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage <> "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage <> "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage <> "") { // Message in Session, display
			$ar["failureMessage"] = $failureMessage;
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		return $ar;
	}

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header <> "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer <> "") { // Footer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
		}
	}

	// Validate page request
	protected function isPageRequest()
	{
		global $CurrentForm;
		if ($this->UseTokenInUrl) {
			if ($CurrentForm)
				return ($this->TableVar == $CurrentForm->getValue("t"));
			if (Get("t") <> "")
				return ($this->TableVar == Get("t"));
		} else {
			return TRUE;
		}
	}

	// Valid Post
	protected function validPost()
	{
		if (!$this->CheckToken || !IsPost() || IsApi())
			return TRUE;
		if (Post(TOKEN_NAME) === NULL)
			return FALSE;
		$fn = $this->CheckTokenFn;
		if (is_callable($fn))
			return $fn(Post(TOKEN_NAME), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;

		//if ($this->CheckToken) { // Always create token, required by API file/lookup request
			$fn = $this->CreateTokenFn;
			if ($this->Token == "" && is_callable($fn)) // Create token
				$this->Token = $fn();
			$CurrentToken = $this->Token; // Save to global variable

		//}
	}

	//
	// Page class constructor
	//

	public function __construct()
	{
		global $Conn, $Language, $COMPOSITE_KEY_SEPARATOR;

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (esbc_node_basic)
		if (!isset($GLOBALS["esbc_node_basic"]) || get_class($GLOBALS["esbc_node_basic"]) == PROJECT_NAMESPACE . "esbc_node_basic") {
			$GLOBALS["esbc_node_basic"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["esbc_node_basic"];
		}

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'esbc_node_basic');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($Conn))
			$Conn = GetConnection($this->Dbid);
	}

	//
	// Terminate page
	//

	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $EXPORT, $esbc_node_basic;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($esbc_node_basic);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
		if (!IsApi())
			$this->Page_Redirecting($url);

		// Close connection
		CloseConnections();

		// Return for API
		if (IsApi()) {
			$res = $url === TRUE;
			if (!$res) // Show error
				WriteJson(array_merge(["success" => FALSE], $this->getMessageAsArray()));
			exit();
		}

		// Go to URL if specified
		if ($url <> "") {
			if (!DEBUG_ENABLED && ob_get_length())
				ob_end_clean();

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = array("url" => $url, "modal" => "1");
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "esbc_node_basicview.php")
						$row["view"] = "1";
				} else { // List page should not be shown as modal => error
					$row["error"] = $this->getFailureMessage();
					$this->clearFailureMessage();
				}
				WriteJson([$row]);
			} else {
				SaveDebugMessage();
				AddHeader("Location", $url);
			}
		}
		exit();
	}

	// Get records from recordset
	protected function getRecordsFromRecordset($rs, $current = FALSE)
	{
		$rows = array();
		if (is_object($rs)) { // Recordset
			while ($rs && !$rs->EOF) {
				$this->loadRowValues($rs); // Set up DbValue/CurrentValue
				$row = $this->getRecordFromArray($rs->fields);
				if ($current)
					return $row;
				else
					$rows[] = $row;
				$rs->moveNext();
			}
		} elseif (is_array($rs)) {
			foreach ($rs as $ar) {
				$row = $this->getRecordFromArray($ar);
				if ($current)
					return $row;
				else
					$rows[] = $row;
			}
		}
		return $rows;
	}

	// Get record from array
	protected function getRecordFromArray($ar)
	{
		$row = array();
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {

								//$url = FullUrl($fld->TableVar . "/" . API_FILE_ACTION . "/" . $fld->Param . "/" . rawurlencode($this->getRecordKeyValue($ar))); // URL rewrite format
								$url = FullUrl(GetPageName(API_URL) . "?" . API_OBJECT_NAME . "=" . $fld->TableVar . "&" . API_ACTION_NAME . "=" . API_FILE_ACTION . "&" . API_FIELD_NAME . "=" . $fld->Param . "&" . API_KEY_NAME . "=" . rawurlencode($this->getRecordKeyValue($ar))); // Query string format
								$row[$fldname] = ["mimeType" => ContentType(substr($val, 0, 11)), "url" => $url];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, MULTIPLE_UPLOAD_SEPARATOR)) { // Single file
								$row[$fldname] = ["mimeType" => ContentType("", $val), "url" => FullUrl($fld->hrefPath() . $val)];
							} else { // Multiple files
								$files = explode(MULTIPLE_UPLOAD_SEPARATOR, $val);
								$ar = [];
								foreach ($files as $file) {
									if (!EmptyValue($file))
										$ar[] = ["type" => ContentType("", $val), "url" => FullUrl($fld->hrefPath() . $file)];
								}
								$row[$fldname] = $ar;
							}
						}
					} else {
						$row[$fldname] = $val;
					}
				}
			}
		}
		return $row;
	}

	// Get record key value from array
	protected function getRecordKeyValue($ar)
	{
		global $COMPOSITE_KEY_SEPARATOR;
		$key = "";
		if (is_array($ar)) {
			$key .= @$ar['NODE_INDEX'];
		}
		return $key;
	}

	/**
	 * Hide fields for add/edit
	 *
	 * @return void
	 */
	protected function hideFieldsForAddEdit()
	{
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->NODE_INDEX->Visible = FALSE;
	}
	public $FormClassName = "ew-horizontal ew-form ew-add-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRec;
	public $Priv = 0;
	public $OldRecordset;
	public $CopyRecord;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$FormError, $SkipHeaderFooter;

		// Init Session data for API request if token found
		if (IsApi() && session_status() !== PHP_SESSION_ACTIVE) {
			$func = PROJECT_NAMESPACE . "CheckToken";
			if (is_callable($func) && Param(TOKEN_NAME) !== NULL && $func(Param(TOKEN_NAME), SessionTimeoutTime()))
				session_start();
		}

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->NODE_INDEX->Visible = FALSE;
		$this->HUB_INDEX->setVisibility();
		$this->NODE_NAME->setVisibility();
		$this->NODE_PW->setVisibility();
		$this->NODE_ENODE->setVisibility();
		$this->NODE_ACC40->setVisibility();
		$this->NODE_SIGNER->setVisibility();
		$this->Create_Date->setVisibility();
		$this->hideFieldsForAddEdit();

		// Do not use lookup cache
		$this->setUseLookupCache(FALSE);

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			Write($Language->Phrase("InvalidPostRequest"));
			$this->terminate();
		}

		// Create Token
		$this->createToken();

		// Set up lookup cache
		$this->setupLookupOptions($this->HUB_INDEX);

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-add-form ew-horizontal";
		$postBack = FALSE;

		// Set up current action
		if (IsApi()) {
			$this->CurrentAction = "insert"; // Add record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get form action
			$postBack = TRUE;
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (Get("NODE_INDEX") !== NULL) {
				$this->NODE_INDEX->setQueryStringValue(Get("NODE_INDEX"));
				$this->setKey("NODE_INDEX", $this->NODE_INDEX->CurrentValue); // Set up key
			} else {
				$this->setKey("NODE_INDEX", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$this->CurrentAction = "copy"; // Copy record
			} else {
				$this->CurrentAction = "show"; // Display blank record
			}
		}

		// Load old record / default values
		$loaded = $this->loadOldRecord();

		// Load form values
		if ($postBack) {
			$this->loadFormValues(); // Load form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues(); // Restore form values
				$this->setFailureMessage($FormError);
				if (IsApi())
					$this->terminate();
				else
					$this->CurrentAction = "show"; // Form error, reset action
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "copy": // Copy an existing record
				if (!$loaded) { // Record not loaded
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->terminate("esbc_node_basiclist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "esbc_node_basiclist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "esbc_node_basicview.php")
						$returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
					if (IsApi()) // Return to caller
						$this->terminate(TRUE);
					else
						$this->terminate($returnUrl);
				} elseif (IsApi()) { // API request, return
					$this->terminate();
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Add failed, restore form values
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render row based on row type
		$this->RowType = ROWTYPE_ADD; // Render add type

		// Render row
		$this->resetAttributes();
		$this->renderRow();
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->NODE_INDEX->CurrentValue = NULL;
		$this->NODE_INDEX->OldValue = $this->NODE_INDEX->CurrentValue;
		$this->HUB_INDEX->CurrentValue = NULL;
		$this->HUB_INDEX->OldValue = $this->HUB_INDEX->CurrentValue;
		$this->NODE_NAME->CurrentValue = NULL;
		$this->NODE_NAME->OldValue = $this->NODE_NAME->CurrentValue;
		$this->NODE_PW->CurrentValue = NULL;
		$this->NODE_PW->OldValue = $this->NODE_PW->CurrentValue;
		$this->NODE_ENODE->CurrentValue = NULL;
		$this->NODE_ENODE->OldValue = $this->NODE_ENODE->CurrentValue;
		$this->NODE_ACC40->CurrentValue = NULL;
		$this->NODE_ACC40->OldValue = $this->NODE_ACC40->CurrentValue;
		$this->NODE_SIGNER->CurrentValue = 0;
		$this->Create_Date->CurrentValue = NULL;
		$this->Create_Date->OldValue = $this->Create_Date->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'HUB_INDEX' first before field var 'x_HUB_INDEX'
		$val = $CurrentForm->hasValue("HUB_INDEX") ? $CurrentForm->getValue("HUB_INDEX") : $CurrentForm->getValue("x_HUB_INDEX");
		if (!$this->HUB_INDEX->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HUB_INDEX->Visible = FALSE; // Disable update for API request
			else
				$this->HUB_INDEX->setFormValue($val);
		}

		// Check field name 'NODE_NAME' first before field var 'x_NODE_NAME'
		$val = $CurrentForm->hasValue("NODE_NAME") ? $CurrentForm->getValue("NODE_NAME") : $CurrentForm->getValue("x_NODE_NAME");
		if (!$this->NODE_NAME->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NODE_NAME->Visible = FALSE; // Disable update for API request
			else
				$this->NODE_NAME->setFormValue($val);
		}

		// Check field name 'NODE_PW' first before field var 'x_NODE_PW'
		$val = $CurrentForm->hasValue("NODE_PW") ? $CurrentForm->getValue("NODE_PW") : $CurrentForm->getValue("x_NODE_PW");
		if (!$this->NODE_PW->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NODE_PW->Visible = FALSE; // Disable update for API request
			else
				$this->NODE_PW->setFormValue($val);
		}

		// Check field name 'NODE_ENODE' first before field var 'x_NODE_ENODE'
		$val = $CurrentForm->hasValue("NODE_ENODE") ? $CurrentForm->getValue("NODE_ENODE") : $CurrentForm->getValue("x_NODE_ENODE");
		if (!$this->NODE_ENODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NODE_ENODE->Visible = FALSE; // Disable update for API request
			else
				$this->NODE_ENODE->setFormValue($val);
		}

		// Check field name 'NODE_ACC40' first before field var 'x_NODE_ACC40'
		$val = $CurrentForm->hasValue("NODE_ACC40") ? $CurrentForm->getValue("NODE_ACC40") : $CurrentForm->getValue("x_NODE_ACC40");
		if (!$this->NODE_ACC40->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NODE_ACC40->Visible = FALSE; // Disable update for API request
			else
				$this->NODE_ACC40->setFormValue($val);
		}

		// Check field name 'NODE_SIGNER' first before field var 'x_NODE_SIGNER'
		$val = $CurrentForm->hasValue("NODE_SIGNER") ? $CurrentForm->getValue("NODE_SIGNER") : $CurrentForm->getValue("x_NODE_SIGNER");
		if (!$this->NODE_SIGNER->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NODE_SIGNER->Visible = FALSE; // Disable update for API request
			else
				$this->NODE_SIGNER->setFormValue($val);
		}

		// Check field name 'Create_Date' first before field var 'x_Create_Date'
		$val = $CurrentForm->hasValue("Create_Date") ? $CurrentForm->getValue("Create_Date") : $CurrentForm->getValue("x_Create_Date");
		if (!$this->Create_Date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Create_Date->Visible = FALSE; // Disable update for API request
			else
				$this->Create_Date->setFormValue($val);
			$this->Create_Date->CurrentValue = UnFormatDateTime($this->Create_Date->CurrentValue, 1);
		}

		// Check field name 'NODE_INDEX' first before field var 'x_NODE_INDEX'
		$val = $CurrentForm->hasValue("NODE_INDEX") ? $CurrentForm->getValue("NODE_INDEX") : $CurrentForm->getValue("x_NODE_INDEX");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->HUB_INDEX->CurrentValue = $this->HUB_INDEX->FormValue;
		$this->NODE_NAME->CurrentValue = $this->NODE_NAME->FormValue;
		$this->NODE_PW->CurrentValue = $this->NODE_PW->FormValue;
		$this->NODE_ENODE->CurrentValue = $this->NODE_ENODE->FormValue;
		$this->NODE_ACC40->CurrentValue = $this->NODE_ACC40->FormValue;
		$this->NODE_SIGNER->CurrentValue = $this->NODE_SIGNER->FormValue;
		$this->Create_Date->CurrentValue = $this->Create_Date->FormValue;
		$this->Create_Date->CurrentValue = UnFormatDateTime($this->Create_Date->CurrentValue, 1);
	}

	// Load row based on key values
	public function loadRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();

		// Call Row Selecting event
		$this->Row_Selecting($filter);

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		$res = FALSE;
		$rs = LoadRecordset($sql, $conn);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->loadRowValues($rs); // Load row values
			$rs->close();
		}
		return $res;
	}

	// Load row values from recordset
	public function loadRowValues($rs = NULL)
	{
		if ($rs && !$rs->EOF)
			$row = $rs->fields;
		else
			$row = $this->newRow();

		// Call Row Selected event
		$this->Row_Selected($row);
		if (!$rs || $rs->EOF)
			return;
		$this->NODE_INDEX->setDbValue($row['NODE_INDEX']);
		$this->HUB_INDEX->setDbValue($row['HUB_INDEX']);
		$this->NODE_NAME->setDbValue($row['NODE_NAME']);
		$this->NODE_PW->setDbValue($row['NODE_PW']);
		$this->NODE_ENODE->setDbValue($row['NODE_ENODE']);
		$this->NODE_ACC40->setDbValue($row['NODE_ACC40']);
		$this->NODE_SIGNER->setDbValue($row['NODE_SIGNER']);
		$this->Create_Date->setDbValue($row['Create_Date']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['NODE_INDEX'] = $this->NODE_INDEX->CurrentValue;
		$row['HUB_INDEX'] = $this->HUB_INDEX->CurrentValue;
		$row['NODE_NAME'] = $this->NODE_NAME->CurrentValue;
		$row['NODE_PW'] = $this->NODE_PW->CurrentValue;
		$row['NODE_ENODE'] = $this->NODE_ENODE->CurrentValue;
		$row['NODE_ACC40'] = $this->NODE_ACC40->CurrentValue;
		$row['NODE_SIGNER'] = $this->NODE_SIGNER->CurrentValue;
		$row['Create_Date'] = $this->Create_Date->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("NODE_INDEX")) <> "")
			$this->NODE_INDEX->CurrentValue = $this->getKey("NODE_INDEX"); // NODE_INDEX
		else
			$validKey = FALSE;

		// Load old record
		$this->OldRecordset = NULL;
		if ($validKey) {
			$this->CurrentFilter = $this->getRecordFilter();
			$sql = $this->getCurrentSql();
			$conn = &$this->getConnection();
			$this->OldRecordset = LoadRecordset($sql, $conn);
		}
		$this->loadRowValues($this->OldRecordset); // Load row values
		return $validKey;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
		// NODE_INDEX
		// HUB_INDEX
		// NODE_NAME
		// NODE_PW
		// NODE_ENODE
		// NODE_ACC40
		// NODE_SIGNER
		// Create_Date

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// NODE_INDEX
			$this->NODE_INDEX->ViewValue = $this->NODE_INDEX->CurrentValue;
			$this->NODE_INDEX->ViewCustomAttributes = "";

			// HUB_INDEX
			$curVal = strval($this->HUB_INDEX->CurrentValue);
			if ($curVal <> "") {
				$this->HUB_INDEX->ViewValue = $this->HUB_INDEX->lookupCacheOption($curVal);
				if ($this->HUB_INDEX->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`HUB_INDEX`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->HUB_INDEX->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->HUB_INDEX->ViewValue = $this->HUB_INDEX->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HUB_INDEX->ViewValue = $this->HUB_INDEX->CurrentValue;
					}
				}
			} else {
				$this->HUB_INDEX->ViewValue = NULL;
			}
			$this->HUB_INDEX->ViewCustomAttributes = "";

			// NODE_NAME
			$this->NODE_NAME->ViewValue = $this->NODE_NAME->CurrentValue;
			$this->NODE_NAME->ViewCustomAttributes = "";

			// NODE_PW
			$this->NODE_PW->ViewValue = $this->NODE_PW->CurrentValue;
			$this->NODE_PW->ViewCustomAttributes = "";

			// NODE_ENODE
			$this->NODE_ENODE->ViewValue = $this->NODE_ENODE->CurrentValue;
			$this->NODE_ENODE->ViewCustomAttributes = "";

			// NODE_ACC40
			$this->NODE_ACC40->ViewValue = $this->NODE_ACC40->CurrentValue;
			$this->NODE_ACC40->ViewCustomAttributes = "";

			// NODE_SIGNER
			if (strval($this->NODE_SIGNER->CurrentValue) <> "") {
				$this->NODE_SIGNER->ViewValue = $this->NODE_SIGNER->optionCaption($this->NODE_SIGNER->CurrentValue);
			} else {
				$this->NODE_SIGNER->ViewValue = NULL;
			}
			$this->NODE_SIGNER->ViewCustomAttributes = "";

			// Create_Date
			$this->Create_Date->ViewValue = $this->Create_Date->CurrentValue;
			$this->Create_Date->ViewValue = FormatDateTime($this->Create_Date->ViewValue, 1);
			$this->Create_Date->ViewCustomAttributes = "";

			// HUB_INDEX
			$this->HUB_INDEX->LinkCustomAttributes = "";
			$this->HUB_INDEX->HrefValue = "";
			$this->HUB_INDEX->TooltipValue = "";

			// NODE_NAME
			$this->NODE_NAME->LinkCustomAttributes = "";
			$this->NODE_NAME->HrefValue = "";
			$this->NODE_NAME->TooltipValue = "";

			// NODE_PW
			$this->NODE_PW->LinkCustomAttributes = "";
			$this->NODE_PW->HrefValue = "";
			$this->NODE_PW->TooltipValue = "";

			// NODE_ENODE
			$this->NODE_ENODE->LinkCustomAttributes = "";
			$this->NODE_ENODE->HrefValue = "";
			$this->NODE_ENODE->TooltipValue = "";

			// NODE_ACC40
			$this->NODE_ACC40->LinkCustomAttributes = "";
			$this->NODE_ACC40->HrefValue = "";
			$this->NODE_ACC40->TooltipValue = "";

			// NODE_SIGNER
			$this->NODE_SIGNER->LinkCustomAttributes = "";
			$this->NODE_SIGNER->HrefValue = "";
			$this->NODE_SIGNER->TooltipValue = "";

			// Create_Date
			$this->Create_Date->LinkCustomAttributes = "";
			$this->Create_Date->HrefValue = "";
			$this->Create_Date->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// HUB_INDEX
			$this->HUB_INDEX->EditAttrs["class"] = "form-control";
			$this->HUB_INDEX->EditCustomAttributes = "";
			$curVal = trim(strval($this->HUB_INDEX->CurrentValue));
			if ($curVal <> "")
				$this->HUB_INDEX->ViewValue = $this->HUB_INDEX->lookupCacheOption($curVal);
			else
				$this->HUB_INDEX->ViewValue = $this->HUB_INDEX->Lookup !== NULL && is_array($this->HUB_INDEX->Lookup->Options) ? $curVal : NULL;
			if ($this->HUB_INDEX->ViewValue !== NULL) { // Load from cache
				$this->HUB_INDEX->EditValue = array_values($this->HUB_INDEX->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`HUB_INDEX`" . SearchString("=", $this->HUB_INDEX->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->HUB_INDEX->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->HUB_INDEX->EditValue = $arwrk;
			}

			// NODE_NAME
			$this->NODE_NAME->EditAttrs["class"] = "form-control";
			$this->NODE_NAME->EditCustomAttributes = "";
			$this->NODE_NAME->EditValue = HtmlEncode($this->NODE_NAME->CurrentValue);
			$this->NODE_NAME->PlaceHolder = RemoveHtml($this->NODE_NAME->caption());

			// NODE_PW
			$this->NODE_PW->EditAttrs["class"] = "form-control";
			$this->NODE_PW->EditCustomAttributes = "";
			$this->NODE_PW->EditValue = HtmlEncode($this->NODE_PW->CurrentValue);
			$this->NODE_PW->PlaceHolder = RemoveHtml($this->NODE_PW->caption());

			// NODE_ENODE
			$this->NODE_ENODE->EditAttrs["class"] = "form-control";
			$this->NODE_ENODE->EditCustomAttributes = "";
			$this->NODE_ENODE->EditValue = HtmlEncode($this->NODE_ENODE->CurrentValue);
			$this->NODE_ENODE->PlaceHolder = RemoveHtml($this->NODE_ENODE->caption());

			// NODE_ACC40
			$this->NODE_ACC40->EditAttrs["class"] = "form-control";
			$this->NODE_ACC40->EditCustomAttributes = "";
			$this->NODE_ACC40->EditValue = HtmlEncode($this->NODE_ACC40->CurrentValue);
			$this->NODE_ACC40->PlaceHolder = RemoveHtml($this->NODE_ACC40->caption());

			// NODE_SIGNER
			$this->NODE_SIGNER->EditAttrs["class"] = "form-control";
			$this->NODE_SIGNER->EditCustomAttributes = "";
			$this->NODE_SIGNER->EditValue = $this->NODE_SIGNER->options(TRUE);

			// Create_Date
			$this->Create_Date->EditAttrs["class"] = "form-control";
			$this->Create_Date->EditCustomAttributes = "";
			$this->Create_Date->EditValue = HtmlEncode(FormatDateTime($this->Create_Date->CurrentValue, 8));
			$this->Create_Date->PlaceHolder = RemoveHtml($this->Create_Date->caption());

			// Add refer script
			// HUB_INDEX

			$this->HUB_INDEX->LinkCustomAttributes = "";
			$this->HUB_INDEX->HrefValue = "";

			// NODE_NAME
			$this->NODE_NAME->LinkCustomAttributes = "";
			$this->NODE_NAME->HrefValue = "";

			// NODE_PW
			$this->NODE_PW->LinkCustomAttributes = "";
			$this->NODE_PW->HrefValue = "";

			// NODE_ENODE
			$this->NODE_ENODE->LinkCustomAttributes = "";
			$this->NODE_ENODE->HrefValue = "";

			// NODE_ACC40
			$this->NODE_ACC40->LinkCustomAttributes = "";
			$this->NODE_ACC40->HrefValue = "";

			// NODE_SIGNER
			$this->NODE_SIGNER->LinkCustomAttributes = "";
			$this->NODE_SIGNER->HrefValue = "";

			// Create_Date
			$this->Create_Date->LinkCustomAttributes = "";
			$this->Create_Date->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!SERVER_VALIDATE)
			return ($FormError == "");
		if ($this->NODE_INDEX->Required) {
			if (!$this->NODE_INDEX->IsDetailKey && $this->NODE_INDEX->FormValue != NULL && $this->NODE_INDEX->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NODE_INDEX->caption(), $this->NODE_INDEX->RequiredErrorMessage));
			}
		}
		if ($this->HUB_INDEX->Required) {
			if (!$this->HUB_INDEX->IsDetailKey && $this->HUB_INDEX->FormValue != NULL && $this->HUB_INDEX->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HUB_INDEX->caption(), $this->HUB_INDEX->RequiredErrorMessage));
			}
		}
		if ($this->NODE_NAME->Required) {
			if (!$this->NODE_NAME->IsDetailKey && $this->NODE_NAME->FormValue != NULL && $this->NODE_NAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NODE_NAME->caption(), $this->NODE_NAME->RequiredErrorMessage));
			}
		}
		if ($this->NODE_PW->Required) {
			if (!$this->NODE_PW->IsDetailKey && $this->NODE_PW->FormValue != NULL && $this->NODE_PW->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NODE_PW->caption(), $this->NODE_PW->RequiredErrorMessage));
			}
		}
		if ($this->NODE_ENODE->Required) {
			if (!$this->NODE_ENODE->IsDetailKey && $this->NODE_ENODE->FormValue != NULL && $this->NODE_ENODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NODE_ENODE->caption(), $this->NODE_ENODE->RequiredErrorMessage));
			}
		}
		if ($this->NODE_ACC40->Required) {
			if (!$this->NODE_ACC40->IsDetailKey && $this->NODE_ACC40->FormValue != NULL && $this->NODE_ACC40->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NODE_ACC40->caption(), $this->NODE_ACC40->RequiredErrorMessage));
			}
		}
		if ($this->NODE_SIGNER->Required) {
			if (!$this->NODE_SIGNER->IsDetailKey && $this->NODE_SIGNER->FormValue != NULL && $this->NODE_SIGNER->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NODE_SIGNER->caption(), $this->NODE_SIGNER->RequiredErrorMessage));
			}
		}
		if ($this->Create_Date->Required) {
			if (!$this->Create_Date->IsDetailKey && $this->Create_Date->FormValue != NULL && $this->Create_Date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Create_Date->caption(), $this->Create_Date->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->Create_Date->FormValue)) {
			AddMessage($FormError, $this->Create_Date->errorMessage());
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
	}

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;
		$conn = &$this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// HUB_INDEX
		$this->HUB_INDEX->setDbValueDef($rsnew, $this->HUB_INDEX->CurrentValue, 0, FALSE);

		// NODE_NAME
		$this->NODE_NAME->setDbValueDef($rsnew, $this->NODE_NAME->CurrentValue, "", FALSE);

		// NODE_PW
		$this->NODE_PW->setDbValueDef($rsnew, $this->NODE_PW->CurrentValue, "", FALSE);

		// NODE_ENODE
		$this->NODE_ENODE->setDbValueDef($rsnew, $this->NODE_ENODE->CurrentValue, "", FALSE);

		// NODE_ACC40
		$this->NODE_ACC40->setDbValueDef($rsnew, $this->NODE_ACC40->CurrentValue, "", FALSE);

		// NODE_SIGNER
		$this->NODE_SIGNER->setDbValueDef($rsnew, $this->NODE_SIGNER->CurrentValue, 0, strval($this->NODE_SIGNER->CurrentValue) == "");

		// Create_Date
		$this->Create_Date->setDbValueDef($rsnew, UnFormatDateTime($this->Create_Date->CurrentValue, 1), CurrentDate(), FALSE);

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = '';
			if ($addRow) {
			}
		} else {
			if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage <> "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$addRow = FALSE;
		}
		if ($addRow) {

			// Call Row Inserted event
			$rs = ($rsold) ? $rsold->fields : NULL;
			$this->Row_Inserted($rs, $rsnew);
		}

		// Write JSON for API request
		if (IsApi() && $addRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $addRow;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("esbc_node_basiclist.php"), "", $this->TableVar, TRUE);
		$pageId = ($this->isCopy()) ? "Copy" : "Add";
		$Breadcrumb->add("add", $pageId, $url);
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL
			switch ($fld->FieldVar) {
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql <> "" && count($fld->Lookup->Options) == 0) {
				$conn = &$this->getConnection();
				$totalCnt = $this->getRecordCount($sql);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
						case "x_HUB_INDEX":
							break;
					}
					$ar[strval($row[0])] = $row;
					$rs->moveNext();
				}
				if ($rs)
					$rs->close();
				$fld->Lookup->Options = $ar;
			}
		}
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
