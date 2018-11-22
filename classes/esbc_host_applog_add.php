<?php
namespace PHPMaker2019\esbc_public_20181122;

//
// Page class
//
class esbc_host_applog_add extends esbc_host_applog
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{1450346A-D3E5-42C5-B2E0-BD489F2A0BDC}";

	// Table name
	public $TableName = 'esbc_host_applog';

	// Page object name
	public $PageObjName = "esbc_host_applog_add";

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

		// Table object (esbc_host_applog)
		if (!isset($GLOBALS["esbc_host_applog"]) || get_class($GLOBALS["esbc_host_applog"]) == PROJECT_NAMESPACE . "esbc_host_applog") {
			$GLOBALS["esbc_host_applog"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["esbc_host_applog"];
		}

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'esbc_host_applog');

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
		global $EXPORT, $esbc_host_applog;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($esbc_host_applog);
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
					if ($pageName == "esbc_host_applogview.php")
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
			$key .= @$ar['LOG_INDEX'];
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
			$this->LOG_INDEX->Visible = FALSE;
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
		$this->LOG_INDEX->Visible = FALSE;
		$this->NICK_NAME->setVisibility();
		$this->HOST_IP->setVisibility();
		$this->HOST_ROOT_ID->setVisibility();
		$this->HOST_ROOT_PWD->setVisibility();
		$this->ACC40_PWD->setVisibility();
		$this->ACC40->setVisibility();
		$this->ENODE->setVisibility();
		$this->GENESIS->setVisibility();
		$this->GETH_CMD->setVisibility();
		$this->HOST_CONFIG_LOG->setVisibility();
		$this->B18_LOG->setVisibility();
		$this->_1F_LOG->setVisibility();
		$this->Create_Date->setVisibility();
		$this->ACTIVE->setVisibility();
		$this->Modify_Date->setVisibility();
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
			if (Get("LOG_INDEX") !== NULL) {
				$this->LOG_INDEX->setQueryStringValue(Get("LOG_INDEX"));
				$this->setKey("LOG_INDEX", $this->LOG_INDEX->CurrentValue); // Set up key
			} else {
				$this->setKey("LOG_INDEX", ""); // Clear key
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
					$this->terminate("esbc_host_apploglist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "esbc_host_apploglist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "esbc_host_applogview.php")
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
		$this->LOG_INDEX->CurrentValue = NULL;
		$this->LOG_INDEX->OldValue = $this->LOG_INDEX->CurrentValue;
		$this->NICK_NAME->CurrentValue = NULL;
		$this->NICK_NAME->OldValue = $this->NICK_NAME->CurrentValue;
		$this->HOST_IP->CurrentValue = NULL;
		$this->HOST_IP->OldValue = $this->HOST_IP->CurrentValue;
		$this->HOST_ROOT_ID->CurrentValue = NULL;
		$this->HOST_ROOT_ID->OldValue = $this->HOST_ROOT_ID->CurrentValue;
		$this->HOST_ROOT_PWD->CurrentValue = NULL;
		$this->HOST_ROOT_PWD->OldValue = $this->HOST_ROOT_PWD->CurrentValue;
		$this->ACC40_PWD->CurrentValue = NULL;
		$this->ACC40_PWD->OldValue = $this->ACC40_PWD->CurrentValue;
		$this->ACC40->CurrentValue = NULL;
		$this->ACC40->OldValue = $this->ACC40->CurrentValue;
		$this->ENODE->CurrentValue = NULL;
		$this->ENODE->OldValue = $this->ENODE->CurrentValue;
		$this->GENESIS->CurrentValue = NULL;
		$this->GENESIS->OldValue = $this->GENESIS->CurrentValue;
		$this->GETH_CMD->CurrentValue = NULL;
		$this->GETH_CMD->OldValue = $this->GETH_CMD->CurrentValue;
		$this->HOST_CONFIG_LOG->CurrentValue = NULL;
		$this->HOST_CONFIG_LOG->OldValue = $this->HOST_CONFIG_LOG->CurrentValue;
		$this->B18_LOG->CurrentValue = NULL;
		$this->B18_LOG->OldValue = $this->B18_LOG->CurrentValue;
		$this->_1F_LOG->CurrentValue = NULL;
		$this->_1F_LOG->OldValue = $this->_1F_LOG->CurrentValue;
		$this->Create_Date->CurrentValue = NULL;
		$this->Create_Date->OldValue = $this->Create_Date->CurrentValue;
		$this->ACTIVE->CurrentValue = 1;
		$this->Modify_Date->CurrentValue = NULL;
		$this->Modify_Date->OldValue = $this->Modify_Date->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'NICK_NAME' first before field var 'x_NICK_NAME'
		$val = $CurrentForm->hasValue("NICK_NAME") ? $CurrentForm->getValue("NICK_NAME") : $CurrentForm->getValue("x_NICK_NAME");
		if (!$this->NICK_NAME->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NICK_NAME->Visible = FALSE; // Disable update for API request
			else
				$this->NICK_NAME->setFormValue($val);
		}

		// Check field name 'HOST_IP' first before field var 'x_HOST_IP'
		$val = $CurrentForm->hasValue("HOST_IP") ? $CurrentForm->getValue("HOST_IP") : $CurrentForm->getValue("x_HOST_IP");
		if (!$this->HOST_IP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HOST_IP->Visible = FALSE; // Disable update for API request
			else
				$this->HOST_IP->setFormValue($val);
		}

		// Check field name 'HOST_ROOT_ID' first before field var 'x_HOST_ROOT_ID'
		$val = $CurrentForm->hasValue("HOST_ROOT_ID") ? $CurrentForm->getValue("HOST_ROOT_ID") : $CurrentForm->getValue("x_HOST_ROOT_ID");
		if (!$this->HOST_ROOT_ID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HOST_ROOT_ID->Visible = FALSE; // Disable update for API request
			else
				$this->HOST_ROOT_ID->setFormValue($val);
		}

		// Check field name 'HOST_ROOT_PWD' first before field var 'x_HOST_ROOT_PWD'
		$val = $CurrentForm->hasValue("HOST_ROOT_PWD") ? $CurrentForm->getValue("HOST_ROOT_PWD") : $CurrentForm->getValue("x_HOST_ROOT_PWD");
		if (!$this->HOST_ROOT_PWD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HOST_ROOT_PWD->Visible = FALSE; // Disable update for API request
			else
				$this->HOST_ROOT_PWD->setFormValue($val);
		}

		// Check field name 'ACC40_PWD' first before field var 'x_ACC40_PWD'
		$val = $CurrentForm->hasValue("ACC40_PWD") ? $CurrentForm->getValue("ACC40_PWD") : $CurrentForm->getValue("x_ACC40_PWD");
		if (!$this->ACC40_PWD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ACC40_PWD->Visible = FALSE; // Disable update for API request
			else
				$this->ACC40_PWD->setFormValue($val);
		}

		// Check field name 'ACC40' first before field var 'x_ACC40'
		$val = $CurrentForm->hasValue("ACC40") ? $CurrentForm->getValue("ACC40") : $CurrentForm->getValue("x_ACC40");
		if (!$this->ACC40->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ACC40->Visible = FALSE; // Disable update for API request
			else
				$this->ACC40->setFormValue($val);
		}

		// Check field name 'ENODE' first before field var 'x_ENODE'
		$val = $CurrentForm->hasValue("ENODE") ? $CurrentForm->getValue("ENODE") : $CurrentForm->getValue("x_ENODE");
		if (!$this->ENODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ENODE->Visible = FALSE; // Disable update for API request
			else
				$this->ENODE->setFormValue($val);
		}

		// Check field name 'GENESIS' first before field var 'x_GENESIS'
		$val = $CurrentForm->hasValue("GENESIS") ? $CurrentForm->getValue("GENESIS") : $CurrentForm->getValue("x_GENESIS");
		if (!$this->GENESIS->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GENESIS->Visible = FALSE; // Disable update for API request
			else
				$this->GENESIS->setFormValue($val);
		}

		// Check field name 'GETH_CMD' first before field var 'x_GETH_CMD'
		$val = $CurrentForm->hasValue("GETH_CMD") ? $CurrentForm->getValue("GETH_CMD") : $CurrentForm->getValue("x_GETH_CMD");
		if (!$this->GETH_CMD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GETH_CMD->Visible = FALSE; // Disable update for API request
			else
				$this->GETH_CMD->setFormValue($val);
		}

		// Check field name 'HOST_CONFIG_LOG' first before field var 'x_HOST_CONFIG_LOG'
		$val = $CurrentForm->hasValue("HOST_CONFIG_LOG") ? $CurrentForm->getValue("HOST_CONFIG_LOG") : $CurrentForm->getValue("x_HOST_CONFIG_LOG");
		if (!$this->HOST_CONFIG_LOG->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HOST_CONFIG_LOG->Visible = FALSE; // Disable update for API request
			else
				$this->HOST_CONFIG_LOG->setFormValue($val);
		}

		// Check field name 'B18_LOG' first before field var 'x_B18_LOG'
		$val = $CurrentForm->hasValue("B18_LOG") ? $CurrentForm->getValue("B18_LOG") : $CurrentForm->getValue("x_B18_LOG");
		if (!$this->B18_LOG->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->B18_LOG->Visible = FALSE; // Disable update for API request
			else
				$this->B18_LOG->setFormValue($val);
		}

		// Check field name '1F_LOG' first before field var 'x__1F_LOG'
		$val = $CurrentForm->hasValue("1F_LOG") ? $CurrentForm->getValue("1F_LOG") : $CurrentForm->getValue("x__1F_LOG");
		if (!$this->_1F_LOG->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->_1F_LOG->Visible = FALSE; // Disable update for API request
			else
				$this->_1F_LOG->setFormValue($val);
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

		// Check field name 'ACTIVE' first before field var 'x_ACTIVE'
		$val = $CurrentForm->hasValue("ACTIVE") ? $CurrentForm->getValue("ACTIVE") : $CurrentForm->getValue("x_ACTIVE");
		if (!$this->ACTIVE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ACTIVE->Visible = FALSE; // Disable update for API request
			else
				$this->ACTIVE->setFormValue($val);
		}

		// Check field name 'Modify_Date' first before field var 'x_Modify_Date'
		$val = $CurrentForm->hasValue("Modify_Date") ? $CurrentForm->getValue("Modify_Date") : $CurrentForm->getValue("x_Modify_Date");
		if (!$this->Modify_Date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Modify_Date->Visible = FALSE; // Disable update for API request
			else
				$this->Modify_Date->setFormValue($val);
			$this->Modify_Date->CurrentValue = UnFormatDateTime($this->Modify_Date->CurrentValue, 1);
		}

		// Check field name 'LOG_INDEX' first before field var 'x_LOG_INDEX'
		$val = $CurrentForm->hasValue("LOG_INDEX") ? $CurrentForm->getValue("LOG_INDEX") : $CurrentForm->getValue("x_LOG_INDEX");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->NICK_NAME->CurrentValue = $this->NICK_NAME->FormValue;
		$this->HOST_IP->CurrentValue = $this->HOST_IP->FormValue;
		$this->HOST_ROOT_ID->CurrentValue = $this->HOST_ROOT_ID->FormValue;
		$this->HOST_ROOT_PWD->CurrentValue = $this->HOST_ROOT_PWD->FormValue;
		$this->ACC40_PWD->CurrentValue = $this->ACC40_PWD->FormValue;
		$this->ACC40->CurrentValue = $this->ACC40->FormValue;
		$this->ENODE->CurrentValue = $this->ENODE->FormValue;
		$this->GENESIS->CurrentValue = $this->GENESIS->FormValue;
		$this->GETH_CMD->CurrentValue = $this->GETH_CMD->FormValue;
		$this->HOST_CONFIG_LOG->CurrentValue = $this->HOST_CONFIG_LOG->FormValue;
		$this->B18_LOG->CurrentValue = $this->B18_LOG->FormValue;
		$this->_1F_LOG->CurrentValue = $this->_1F_LOG->FormValue;
		$this->Create_Date->CurrentValue = $this->Create_Date->FormValue;
		$this->Create_Date->CurrentValue = UnFormatDateTime($this->Create_Date->CurrentValue, 1);
		$this->ACTIVE->CurrentValue = $this->ACTIVE->FormValue;
		$this->Modify_Date->CurrentValue = $this->Modify_Date->FormValue;
		$this->Modify_Date->CurrentValue = UnFormatDateTime($this->Modify_Date->CurrentValue, 1);
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
		$this->LOG_INDEX->setDbValue($row['LOG_INDEX']);
		$this->NICK_NAME->setDbValue($row['NICK_NAME']);
		$this->HOST_IP->setDbValue($row['HOST_IP']);
		$this->HOST_ROOT_ID->setDbValue($row['HOST_ROOT_ID']);
		$this->HOST_ROOT_PWD->setDbValue($row['HOST_ROOT_PWD']);
		$this->ACC40_PWD->setDbValue($row['ACC40_PWD']);
		$this->ACC40->setDbValue($row['ACC40']);
		$this->ENODE->setDbValue($row['ENODE']);
		$this->GENESIS->setDbValue($row['GENESIS']);
		$this->GETH_CMD->setDbValue($row['GETH_CMD']);
		$this->HOST_CONFIG_LOG->setDbValue($row['HOST_CONFIG_LOG']);
		$this->B18_LOG->setDbValue($row['B18_LOG']);
		$this->_1F_LOG->setDbValue($row['1F_LOG']);
		$this->Create_Date->setDbValue($row['Create_Date']);
		$this->ACTIVE->setDbValue($row['ACTIVE']);
		$this->Modify_Date->setDbValue($row['Modify_Date']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['LOG_INDEX'] = $this->LOG_INDEX->CurrentValue;
		$row['NICK_NAME'] = $this->NICK_NAME->CurrentValue;
		$row['HOST_IP'] = $this->HOST_IP->CurrentValue;
		$row['HOST_ROOT_ID'] = $this->HOST_ROOT_ID->CurrentValue;
		$row['HOST_ROOT_PWD'] = $this->HOST_ROOT_PWD->CurrentValue;
		$row['ACC40_PWD'] = $this->ACC40_PWD->CurrentValue;
		$row['ACC40'] = $this->ACC40->CurrentValue;
		$row['ENODE'] = $this->ENODE->CurrentValue;
		$row['GENESIS'] = $this->GENESIS->CurrentValue;
		$row['GETH_CMD'] = $this->GETH_CMD->CurrentValue;
		$row['HOST_CONFIG_LOG'] = $this->HOST_CONFIG_LOG->CurrentValue;
		$row['B18_LOG'] = $this->B18_LOG->CurrentValue;
		$row['1F_LOG'] = $this->_1F_LOG->CurrentValue;
		$row['Create_Date'] = $this->Create_Date->CurrentValue;
		$row['ACTIVE'] = $this->ACTIVE->CurrentValue;
		$row['Modify_Date'] = $this->Modify_Date->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("LOG_INDEX")) <> "")
			$this->LOG_INDEX->CurrentValue = $this->getKey("LOG_INDEX"); // LOG_INDEX
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

		if ($this->RowType == ROWTYPE_VIEW) { // View row

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
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// NICK_NAME
			$this->NICK_NAME->EditAttrs["class"] = "form-control";
			$this->NICK_NAME->EditCustomAttributes = "";
			$this->NICK_NAME->EditValue = HtmlEncode($this->NICK_NAME->CurrentValue);
			$this->NICK_NAME->PlaceHolder = RemoveHtml($this->NICK_NAME->caption());

			// HOST_IP
			$this->HOST_IP->EditAttrs["class"] = "form-control";
			$this->HOST_IP->EditCustomAttributes = "";
			$this->HOST_IP->EditValue = HtmlEncode($this->HOST_IP->CurrentValue);
			$this->HOST_IP->PlaceHolder = RemoveHtml($this->HOST_IP->caption());

			// HOST_ROOT_ID
			$this->HOST_ROOT_ID->EditAttrs["class"] = "form-control";
			$this->HOST_ROOT_ID->EditCustomAttributes = "";
			$this->HOST_ROOT_ID->EditValue = HtmlEncode($this->HOST_ROOT_ID->CurrentValue);
			$this->HOST_ROOT_ID->PlaceHolder = RemoveHtml($this->HOST_ROOT_ID->caption());

			// HOST_ROOT_PWD
			$this->HOST_ROOT_PWD->EditAttrs["class"] = "form-control";
			$this->HOST_ROOT_PWD->EditCustomAttributes = "";
			$this->HOST_ROOT_PWD->EditValue = HtmlEncode($this->HOST_ROOT_PWD->CurrentValue);
			$this->HOST_ROOT_PWD->PlaceHolder = RemoveHtml($this->HOST_ROOT_PWD->caption());

			// ACC40_PWD
			$this->ACC40_PWD->EditAttrs["class"] = "form-control";
			$this->ACC40_PWD->EditCustomAttributes = "";
			$this->ACC40_PWD->EditValue = HtmlEncode($this->ACC40_PWD->CurrentValue);
			$this->ACC40_PWD->PlaceHolder = RemoveHtml($this->ACC40_PWD->caption());

			// ACC40
			$this->ACC40->EditAttrs["class"] = "form-control";
			$this->ACC40->EditCustomAttributes = "";
			$this->ACC40->EditValue = HtmlEncode($this->ACC40->CurrentValue);
			$this->ACC40->PlaceHolder = RemoveHtml($this->ACC40->caption());

			// ENODE
			$this->ENODE->EditAttrs["class"] = "form-control";
			$this->ENODE->EditCustomAttributes = "";
			$this->ENODE->EditValue = HtmlEncode($this->ENODE->CurrentValue);
			$this->ENODE->PlaceHolder = RemoveHtml($this->ENODE->caption());

			// GENESIS
			$this->GENESIS->EditAttrs["class"] = "form-control";
			$this->GENESIS->EditCustomAttributes = "";
			$this->GENESIS->EditValue = HtmlEncode($this->GENESIS->CurrentValue);
			$this->GENESIS->PlaceHolder = RemoveHtml($this->GENESIS->caption());

			// GETH_CMD
			$this->GETH_CMD->EditAttrs["class"] = "form-control";
			$this->GETH_CMD->EditCustomAttributes = "";
			$this->GETH_CMD->EditValue = HtmlEncode($this->GETH_CMD->CurrentValue);
			$this->GETH_CMD->PlaceHolder = RemoveHtml($this->GETH_CMD->caption());

			// HOST_CONFIG_LOG
			$this->HOST_CONFIG_LOG->EditAttrs["class"] = "form-control";
			$this->HOST_CONFIG_LOG->EditCustomAttributes = "";
			$this->HOST_CONFIG_LOG->EditValue = HtmlEncode($this->HOST_CONFIG_LOG->CurrentValue);
			$this->HOST_CONFIG_LOG->PlaceHolder = RemoveHtml($this->HOST_CONFIG_LOG->caption());

			// B18_LOG
			$this->B18_LOG->EditAttrs["class"] = "form-control";
			$this->B18_LOG->EditCustomAttributes = "";
			$this->B18_LOG->EditValue = HtmlEncode($this->B18_LOG->CurrentValue);
			$this->B18_LOG->PlaceHolder = RemoveHtml($this->B18_LOG->caption());

			// 1F_LOG
			$this->_1F_LOG->EditAttrs["class"] = "form-control";
			$this->_1F_LOG->EditCustomAttributes = "";
			$this->_1F_LOG->EditValue = HtmlEncode($this->_1F_LOG->CurrentValue);
			$this->_1F_LOG->PlaceHolder = RemoveHtml($this->_1F_LOG->caption());

			// Create_Date
			$this->Create_Date->EditAttrs["class"] = "form-control";
			$this->Create_Date->EditCustomAttributes = "";
			$this->Create_Date->EditValue = HtmlEncode(FormatDateTime($this->Create_Date->CurrentValue, 8));
			$this->Create_Date->PlaceHolder = RemoveHtml($this->Create_Date->caption());

			// ACTIVE
			$this->ACTIVE->EditAttrs["class"] = "form-control";
			$this->ACTIVE->EditCustomAttributes = "";
			$this->ACTIVE->EditValue = $this->ACTIVE->options(TRUE);

			// Modify_Date
			$this->Modify_Date->EditAttrs["class"] = "form-control";
			$this->Modify_Date->EditCustomAttributes = "";
			$this->Modify_Date->EditValue = HtmlEncode(FormatDateTime($this->Modify_Date->CurrentValue, 8));
			$this->Modify_Date->PlaceHolder = RemoveHtml($this->Modify_Date->caption());

			// Add refer script
			// NICK_NAME

			$this->NICK_NAME->LinkCustomAttributes = "";
			$this->NICK_NAME->HrefValue = "";

			// HOST_IP
			$this->HOST_IP->LinkCustomAttributes = "";
			$this->HOST_IP->HrefValue = "";

			// HOST_ROOT_ID
			$this->HOST_ROOT_ID->LinkCustomAttributes = "";
			$this->HOST_ROOT_ID->HrefValue = "";

			// HOST_ROOT_PWD
			$this->HOST_ROOT_PWD->LinkCustomAttributes = "";
			$this->HOST_ROOT_PWD->HrefValue = "";

			// ACC40_PWD
			$this->ACC40_PWD->LinkCustomAttributes = "";
			$this->ACC40_PWD->HrefValue = "";

			// ACC40
			$this->ACC40->LinkCustomAttributes = "";
			$this->ACC40->HrefValue = "";

			// ENODE
			$this->ENODE->LinkCustomAttributes = "";
			$this->ENODE->HrefValue = "";

			// GENESIS
			$this->GENESIS->LinkCustomAttributes = "";
			$this->GENESIS->HrefValue = "";

			// GETH_CMD
			$this->GETH_CMD->LinkCustomAttributes = "";
			$this->GETH_CMD->HrefValue = "";

			// HOST_CONFIG_LOG
			$this->HOST_CONFIG_LOG->LinkCustomAttributes = "";
			$this->HOST_CONFIG_LOG->HrefValue = "";

			// B18_LOG
			$this->B18_LOG->LinkCustomAttributes = "";
			$this->B18_LOG->HrefValue = "";

			// 1F_LOG
			$this->_1F_LOG->LinkCustomAttributes = "";
			$this->_1F_LOG->HrefValue = "";

			// Create_Date
			$this->Create_Date->LinkCustomAttributes = "";
			$this->Create_Date->HrefValue = "";

			// ACTIVE
			$this->ACTIVE->LinkCustomAttributes = "";
			$this->ACTIVE->HrefValue = "";

			// Modify_Date
			$this->Modify_Date->LinkCustomAttributes = "";
			$this->Modify_Date->HrefValue = "";
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
		if ($this->LOG_INDEX->Required) {
			if (!$this->LOG_INDEX->IsDetailKey && $this->LOG_INDEX->FormValue != NULL && $this->LOG_INDEX->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LOG_INDEX->caption(), $this->LOG_INDEX->RequiredErrorMessage));
			}
		}
		if ($this->NICK_NAME->Required) {
			if (!$this->NICK_NAME->IsDetailKey && $this->NICK_NAME->FormValue != NULL && $this->NICK_NAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NICK_NAME->caption(), $this->NICK_NAME->RequiredErrorMessage));
			}
		}
		if ($this->HOST_IP->Required) {
			if (!$this->HOST_IP->IsDetailKey && $this->HOST_IP->FormValue != NULL && $this->HOST_IP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HOST_IP->caption(), $this->HOST_IP->RequiredErrorMessage));
			}
		}
		if ($this->HOST_ROOT_ID->Required) {
			if (!$this->HOST_ROOT_ID->IsDetailKey && $this->HOST_ROOT_ID->FormValue != NULL && $this->HOST_ROOT_ID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HOST_ROOT_ID->caption(), $this->HOST_ROOT_ID->RequiredErrorMessage));
			}
		}
		if ($this->HOST_ROOT_PWD->Required) {
			if (!$this->HOST_ROOT_PWD->IsDetailKey && $this->HOST_ROOT_PWD->FormValue != NULL && $this->HOST_ROOT_PWD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HOST_ROOT_PWD->caption(), $this->HOST_ROOT_PWD->RequiredErrorMessage));
			}
		}
		if ($this->ACC40_PWD->Required) {
			if (!$this->ACC40_PWD->IsDetailKey && $this->ACC40_PWD->FormValue != NULL && $this->ACC40_PWD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ACC40_PWD->caption(), $this->ACC40_PWD->RequiredErrorMessage));
			}
		}
		if ($this->ACC40->Required) {
			if (!$this->ACC40->IsDetailKey && $this->ACC40->FormValue != NULL && $this->ACC40->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ACC40->caption(), $this->ACC40->RequiredErrorMessage));
			}
		}
		if ($this->ENODE->Required) {
			if (!$this->ENODE->IsDetailKey && $this->ENODE->FormValue != NULL && $this->ENODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ENODE->caption(), $this->ENODE->RequiredErrorMessage));
			}
		}
		if ($this->GENESIS->Required) {
			if (!$this->GENESIS->IsDetailKey && $this->GENESIS->FormValue != NULL && $this->GENESIS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GENESIS->caption(), $this->GENESIS->RequiredErrorMessage));
			}
		}
		if ($this->GETH_CMD->Required) {
			if (!$this->GETH_CMD->IsDetailKey && $this->GETH_CMD->FormValue != NULL && $this->GETH_CMD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GETH_CMD->caption(), $this->GETH_CMD->RequiredErrorMessage));
			}
		}
		if ($this->HOST_CONFIG_LOG->Required) {
			if (!$this->HOST_CONFIG_LOG->IsDetailKey && $this->HOST_CONFIG_LOG->FormValue != NULL && $this->HOST_CONFIG_LOG->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HOST_CONFIG_LOG->caption(), $this->HOST_CONFIG_LOG->RequiredErrorMessage));
			}
		}
		if ($this->B18_LOG->Required) {
			if (!$this->B18_LOG->IsDetailKey && $this->B18_LOG->FormValue != NULL && $this->B18_LOG->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->B18_LOG->caption(), $this->B18_LOG->RequiredErrorMessage));
			}
		}
		if ($this->_1F_LOG->Required) {
			if (!$this->_1F_LOG->IsDetailKey && $this->_1F_LOG->FormValue != NULL && $this->_1F_LOG->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_1F_LOG->caption(), $this->_1F_LOG->RequiredErrorMessage));
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
		if ($this->ACTIVE->Required) {
			if (!$this->ACTIVE->IsDetailKey && $this->ACTIVE->FormValue != NULL && $this->ACTIVE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ACTIVE->caption(), $this->ACTIVE->RequiredErrorMessage));
			}
		}
		if ($this->Modify_Date->Required) {
			if (!$this->Modify_Date->IsDetailKey && $this->Modify_Date->FormValue != NULL && $this->Modify_Date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Modify_Date->caption(), $this->Modify_Date->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->Modify_Date->FormValue)) {
			AddMessage($FormError, $this->Modify_Date->errorMessage());
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

		// NICK_NAME
		$this->NICK_NAME->setDbValueDef($rsnew, $this->NICK_NAME->CurrentValue, NULL, FALSE);

		// HOST_IP
		$this->HOST_IP->setDbValueDef($rsnew, $this->HOST_IP->CurrentValue, "", FALSE);

		// HOST_ROOT_ID
		$this->HOST_ROOT_ID->setDbValueDef($rsnew, $this->HOST_ROOT_ID->CurrentValue, NULL, FALSE);

		// HOST_ROOT_PWD
		$this->HOST_ROOT_PWD->setDbValueDef($rsnew, $this->HOST_ROOT_PWD->CurrentValue, NULL, FALSE);

		// ACC40_PWD
		$this->ACC40_PWD->setDbValueDef($rsnew, $this->ACC40_PWD->CurrentValue, NULL, FALSE);

		// ACC40
		$this->ACC40->setDbValueDef($rsnew, $this->ACC40->CurrentValue, NULL, FALSE);

		// ENODE
		$this->ENODE->setDbValueDef($rsnew, $this->ENODE->CurrentValue, NULL, FALSE);

		// GENESIS
		$this->GENESIS->setDbValueDef($rsnew, $this->GENESIS->CurrentValue, NULL, FALSE);

		// GETH_CMD
		$this->GETH_CMD->setDbValueDef($rsnew, $this->GETH_CMD->CurrentValue, NULL, FALSE);

		// HOST_CONFIG_LOG
		$this->HOST_CONFIG_LOG->setDbValueDef($rsnew, $this->HOST_CONFIG_LOG->CurrentValue, NULL, FALSE);

		// B18_LOG
		$this->B18_LOG->setDbValueDef($rsnew, $this->B18_LOG->CurrentValue, NULL, FALSE);

		// 1F_LOG
		$this->_1F_LOG->setDbValueDef($rsnew, $this->_1F_LOG->CurrentValue, NULL, FALSE);

		// Create_Date
		$this->Create_Date->setDbValueDef($rsnew, UnFormatDateTime($this->Create_Date->CurrentValue, 1), NULL, FALSE);

		// ACTIVE
		$this->ACTIVE->setDbValueDef($rsnew, $this->ACTIVE->CurrentValue, 0, strval($this->ACTIVE->CurrentValue) == "");

		// Modify_Date
		$this->Modify_Date->setDbValueDef($rsnew, UnFormatDateTime($this->Modify_Date->CurrentValue, 1), NULL, FALSE);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("esbc_host_apploglist.php"), "", $this->TableVar, TRUE);
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
