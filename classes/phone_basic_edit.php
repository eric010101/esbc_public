<?php
namespace PHPMaker2019\esbc_public_20181122;

//
// Page class
//
class phone_basic_edit extends phone_basic
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{1450346A-D3E5-42C5-B2E0-BD489F2A0BDC}";

	// Table name
	public $TableName = 'phone_basic';

	// Page object name
	public $PageObjName = "phone_basic_edit";

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

		// Table object (phone_basic)
		if (!isset($GLOBALS["phone_basic"]) || get_class($GLOBALS["phone_basic"]) == PROJECT_NAMESPACE . "phone_basic") {
			$GLOBALS["phone_basic"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["phone_basic"];
		}

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'phone_basic');

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
		global $EXPORT, $phone_basic;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($phone_basic);
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
					if ($pageName == "phone_basicview.php")
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
			$key .= @$ar['RTLindex'];
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
			$this->RTLindex->Visible = FALSE;
	}
	public $FormClassName = "ew-horizontal ew-form ew-edit-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter;
	public $DbDetailFilter;

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
		$this->imei->setVisibility();
		$this->phone_name->setVisibility();
		$this->date_add->setVisibility();
		$this->app_version->setVisibility();
		$this->phone_num->setVisibility();
		$this->phone_wifi_mac->setVisibility();
		$this->active->setVisibility();
		$this->app_name->setVisibility();
		$this->RTLindex->setVisibility();
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
		$this->FormClassName = "ew-form ew-edit-form ew-horizontal";
		$returnUrl = "";
		$loaded = FALSE;
		$postBack = FALSE;

		// Set up current action and primary key
		if (IsApi()) {
			$this->CurrentAction = "update"; // Update record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get action code
			if (!$this->isShow()) // Not reload record, handle as postback
				$postBack = TRUE;

			// Load key from Form
			if ($CurrentForm->hasValue("x_RTLindex")) {
				$this->RTLindex->setFormValue($CurrentForm->getValue("x_RTLindex"));
			}
		} else {
			$this->CurrentAction = "show"; // Default action is display

			// Load key from QueryString
			$loadByQuery = FALSE;
			if (Get("RTLindex") !== NULL) {
				$this->RTLindex->setQueryStringValue(Get("RTLindex"));
				$loadByQuery = TRUE;
			} else {
				$this->RTLindex->CurrentValue = NULL;
			}
		}

		// Load current record
		$loaded = $this->loadRow();

		// Process form if post back
		if ($postBack) {
			$this->loadFormValues(); // Get form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->setFailureMessage($FormError);
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues();
				if (IsApi())
					$this->terminate();
				else
					$this->CurrentAction = ""; // Form error, reset action
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "show": // Get a record to display
				if (!$loaded) { // Load record based on key
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->terminate("phone_basiclist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "phone_basiclist.php")
					$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
				$this->SendEmail = TRUE; // Send email on update success
				if ($this->editRow()) { // Update record based on key
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					if (IsApi())
						$this->terminate(TRUE);
					else
						$this->terminate($returnUrl); // Return to caller
				} elseif (IsApi()) { // API request, return
					$this->terminate();
				} elseif ($this->getFailureMessage() == $Language->Phrase("NoRecord")) {
					$this->terminate($returnUrl); // Return to caller
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Restore form values if update failed
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render the record
		$this->RowType = ROWTYPE_EDIT; // Render as Edit
		$this->resetAttributes();
		$this->renderRow();
	}

	// Set up starting record parameters
	public function setupStartRec()
	{
		if ($this->DisplayRecs == 0)
			return;
		if ($this->isPageRequest()) { // Validate request
			if (Get(TABLE_START_REC) !== NULL) { // Check for "start" parameter
				$this->StartRec = Get(TABLE_START_REC);
				$this->setStartRecordNumber($this->StartRec);
			} elseif (Get(TABLE_PAGE_NO) !== NULL) {
				$pageNo = Get(TABLE_PAGE_NO);
				if (is_numeric($pageNo)) {
					$this->StartRec = ($pageNo - 1) * $this->DisplayRecs + 1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1) {
						$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1;
					}
					$this->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} elseif ($this->StartRec > $this->TotalRecs) { // Avoid starting record > total records
			$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec - 1) % $this->DisplayRecs <> 0) {
			$this->StartRec = (int)(($this->StartRec - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'imei' first before field var 'x_imei'
		$val = $CurrentForm->hasValue("imei") ? $CurrentForm->getValue("imei") : $CurrentForm->getValue("x_imei");
		if (!$this->imei->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->imei->Visible = FALSE; // Disable update for API request
			else
				$this->imei->setFormValue($val);
		}

		// Check field name 'phone_name' first before field var 'x_phone_name'
		$val = $CurrentForm->hasValue("phone_name") ? $CurrentForm->getValue("phone_name") : $CurrentForm->getValue("x_phone_name");
		if (!$this->phone_name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->phone_name->Visible = FALSE; // Disable update for API request
			else
				$this->phone_name->setFormValue($val);
		}

		// Check field name 'date_add' first before field var 'x_date_add'
		$val = $CurrentForm->hasValue("date_add") ? $CurrentForm->getValue("date_add") : $CurrentForm->getValue("x_date_add");
		if (!$this->date_add->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->date_add->Visible = FALSE; // Disable update for API request
			else
				$this->date_add->setFormValue($val);
			$this->date_add->CurrentValue = UnFormatDateTime($this->date_add->CurrentValue, 0);
		}

		// Check field name 'app_version' first before field var 'x_app_version'
		$val = $CurrentForm->hasValue("app_version") ? $CurrentForm->getValue("app_version") : $CurrentForm->getValue("x_app_version");
		if (!$this->app_version->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->app_version->Visible = FALSE; // Disable update for API request
			else
				$this->app_version->setFormValue($val);
		}

		// Check field name 'phone_num' first before field var 'x_phone_num'
		$val = $CurrentForm->hasValue("phone_num") ? $CurrentForm->getValue("phone_num") : $CurrentForm->getValue("x_phone_num");
		if (!$this->phone_num->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->phone_num->Visible = FALSE; // Disable update for API request
			else
				$this->phone_num->setFormValue($val);
		}

		// Check field name 'phone_wifi_mac' first before field var 'x_phone_wifi_mac'
		$val = $CurrentForm->hasValue("phone_wifi_mac") ? $CurrentForm->getValue("phone_wifi_mac") : $CurrentForm->getValue("x_phone_wifi_mac");
		if (!$this->phone_wifi_mac->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->phone_wifi_mac->Visible = FALSE; // Disable update for API request
			else
				$this->phone_wifi_mac->setFormValue($val);
		}

		// Check field name 'active' first before field var 'x_active'
		$val = $CurrentForm->hasValue("active") ? $CurrentForm->getValue("active") : $CurrentForm->getValue("x_active");
		if (!$this->active->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->active->Visible = FALSE; // Disable update for API request
			else
				$this->active->setFormValue($val);
		}

		// Check field name 'app_name' first before field var 'x_app_name'
		$val = $CurrentForm->hasValue("app_name") ? $CurrentForm->getValue("app_name") : $CurrentForm->getValue("x_app_name");
		if (!$this->app_name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->app_name->Visible = FALSE; // Disable update for API request
			else
				$this->app_name->setFormValue($val);
		}

		// Check field name 'RTLindex' first before field var 'x_RTLindex'
		$val = $CurrentForm->hasValue("RTLindex") ? $CurrentForm->getValue("RTLindex") : $CurrentForm->getValue("x_RTLindex");
		if (!$this->RTLindex->IsDetailKey)
			$this->RTLindex->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->imei->CurrentValue = $this->imei->FormValue;
		$this->phone_name->CurrentValue = $this->phone_name->FormValue;
		$this->date_add->CurrentValue = $this->date_add->FormValue;
		$this->date_add->CurrentValue = UnFormatDateTime($this->date_add->CurrentValue, 0);
		$this->app_version->CurrentValue = $this->app_version->FormValue;
		$this->phone_num->CurrentValue = $this->phone_num->FormValue;
		$this->phone_wifi_mac->CurrentValue = $this->phone_wifi_mac->FormValue;
		$this->active->CurrentValue = $this->active->FormValue;
		$this->app_name->CurrentValue = $this->app_name->FormValue;
		$this->RTLindex->CurrentValue = $this->RTLindex->FormValue;
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
		$this->imei->setDbValue($row['imei']);
		$this->phone_name->setDbValue($row['phone_name']);
		$this->date_add->setDbValue($row['date_add']);
		$this->app_version->setDbValue($row['app_version']);
		$this->phone_num->setDbValue($row['phone_num']);
		$this->phone_wifi_mac->setDbValue($row['phone_wifi_mac']);
		$this->active->setDbValue($row['active']);
		$this->app_name->setDbValue($row['app_name']);
		$this->RTLindex->setDbValue($row['RTLindex']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['imei'] = NULL;
		$row['phone_name'] = NULL;
		$row['date_add'] = NULL;
		$row['app_version'] = NULL;
		$row['phone_num'] = NULL;
		$row['phone_wifi_mac'] = NULL;
		$row['active'] = NULL;
		$row['app_name'] = NULL;
		$row['RTLindex'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("RTLindex")) <> "")
			$this->RTLindex->CurrentValue = $this->getKey("RTLindex"); // RTLindex
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
		// imei
		// phone_name
		// date_add
		// app_version
		// phone_num
		// phone_wifi_mac
		// active
		// app_name
		// RTLindex

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// imei
			$this->imei->ViewValue = $this->imei->CurrentValue;
			$this->imei->ViewCustomAttributes = "";

			// phone_name
			$this->phone_name->ViewValue = $this->phone_name->CurrentValue;
			$this->phone_name->ViewCustomAttributes = "";

			// date_add
			$this->date_add->ViewValue = $this->date_add->CurrentValue;
			$this->date_add->ViewValue = FormatDateTime($this->date_add->ViewValue, 0);
			$this->date_add->ViewCustomAttributes = "";

			// app_version
			$this->app_version->ViewValue = $this->app_version->CurrentValue;
			$this->app_version->ViewCustomAttributes = "";

			// phone_num
			$this->phone_num->ViewValue = $this->phone_num->CurrentValue;
			$this->phone_num->ViewCustomAttributes = "";

			// phone_wifi_mac
			$this->phone_wifi_mac->ViewValue = $this->phone_wifi_mac->CurrentValue;
			$this->phone_wifi_mac->ViewCustomAttributes = "";

			// active
			$this->active->ViewValue = $this->active->CurrentValue;
			$this->active->ViewValue = FormatNumber($this->active->ViewValue, 0, -2, -2, -2);
			$this->active->ViewCustomAttributes = "";

			// app_name
			$this->app_name->ViewValue = $this->app_name->CurrentValue;
			$this->app_name->ViewCustomAttributes = "";

			// RTLindex
			$this->RTLindex->ViewValue = $this->RTLindex->CurrentValue;
			$this->RTLindex->ViewCustomAttributes = "";

			// imei
			$this->imei->LinkCustomAttributes = "";
			$this->imei->HrefValue = "";
			$this->imei->TooltipValue = "";

			// phone_name
			$this->phone_name->LinkCustomAttributes = "";
			$this->phone_name->HrefValue = "";
			$this->phone_name->TooltipValue = "";

			// date_add
			$this->date_add->LinkCustomAttributes = "";
			$this->date_add->HrefValue = "";
			$this->date_add->TooltipValue = "";

			// app_version
			$this->app_version->LinkCustomAttributes = "";
			$this->app_version->HrefValue = "";
			$this->app_version->TooltipValue = "";

			// phone_num
			$this->phone_num->LinkCustomAttributes = "";
			$this->phone_num->HrefValue = "";
			$this->phone_num->TooltipValue = "";

			// phone_wifi_mac
			$this->phone_wifi_mac->LinkCustomAttributes = "";
			$this->phone_wifi_mac->HrefValue = "";
			$this->phone_wifi_mac->TooltipValue = "";

			// active
			$this->active->LinkCustomAttributes = "";
			$this->active->HrefValue = "";
			$this->active->TooltipValue = "";

			// app_name
			$this->app_name->LinkCustomAttributes = "";
			$this->app_name->HrefValue = "";
			$this->app_name->TooltipValue = "";

			// RTLindex
			$this->RTLindex->LinkCustomAttributes = "";
			$this->RTLindex->HrefValue = "";
			$this->RTLindex->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// imei
			$this->imei->EditAttrs["class"] = "form-control";
			$this->imei->EditCustomAttributes = "";
			$this->imei->EditValue = HtmlEncode($this->imei->CurrentValue);
			$this->imei->PlaceHolder = RemoveHtml($this->imei->caption());

			// phone_name
			$this->phone_name->EditAttrs["class"] = "form-control";
			$this->phone_name->EditCustomAttributes = "";
			$this->phone_name->EditValue = HtmlEncode($this->phone_name->CurrentValue);
			$this->phone_name->PlaceHolder = RemoveHtml($this->phone_name->caption());

			// date_add
			$this->date_add->EditAttrs["class"] = "form-control";
			$this->date_add->EditCustomAttributes = "";
			$this->date_add->EditValue = HtmlEncode(FormatDateTime($this->date_add->CurrentValue, 8));
			$this->date_add->PlaceHolder = RemoveHtml($this->date_add->caption());

			// app_version
			$this->app_version->EditAttrs["class"] = "form-control";
			$this->app_version->EditCustomAttributes = "";
			$this->app_version->EditValue = HtmlEncode($this->app_version->CurrentValue);
			$this->app_version->PlaceHolder = RemoveHtml($this->app_version->caption());

			// phone_num
			$this->phone_num->EditAttrs["class"] = "form-control";
			$this->phone_num->EditCustomAttributes = "";
			$this->phone_num->EditValue = HtmlEncode($this->phone_num->CurrentValue);
			$this->phone_num->PlaceHolder = RemoveHtml($this->phone_num->caption());

			// phone_wifi_mac
			$this->phone_wifi_mac->EditAttrs["class"] = "form-control";
			$this->phone_wifi_mac->EditCustomAttributes = "";
			$this->phone_wifi_mac->EditValue = HtmlEncode($this->phone_wifi_mac->CurrentValue);
			$this->phone_wifi_mac->PlaceHolder = RemoveHtml($this->phone_wifi_mac->caption());

			// active
			$this->active->EditAttrs["class"] = "form-control";
			$this->active->EditCustomAttributes = "";
			$this->active->EditValue = HtmlEncode($this->active->CurrentValue);
			$this->active->PlaceHolder = RemoveHtml($this->active->caption());

			// app_name
			$this->app_name->EditAttrs["class"] = "form-control";
			$this->app_name->EditCustomAttributes = "";
			$this->app_name->EditValue = HtmlEncode($this->app_name->CurrentValue);
			$this->app_name->PlaceHolder = RemoveHtml($this->app_name->caption());

			// RTLindex
			$this->RTLindex->EditAttrs["class"] = "form-control";
			$this->RTLindex->EditCustomAttributes = "";
			$this->RTLindex->EditValue = $this->RTLindex->CurrentValue;
			$this->RTLindex->ViewCustomAttributes = "";

			// Edit refer script
			// imei

			$this->imei->LinkCustomAttributes = "";
			$this->imei->HrefValue = "";

			// phone_name
			$this->phone_name->LinkCustomAttributes = "";
			$this->phone_name->HrefValue = "";

			// date_add
			$this->date_add->LinkCustomAttributes = "";
			$this->date_add->HrefValue = "";

			// app_version
			$this->app_version->LinkCustomAttributes = "";
			$this->app_version->HrefValue = "";

			// phone_num
			$this->phone_num->LinkCustomAttributes = "";
			$this->phone_num->HrefValue = "";

			// phone_wifi_mac
			$this->phone_wifi_mac->LinkCustomAttributes = "";
			$this->phone_wifi_mac->HrefValue = "";

			// active
			$this->active->LinkCustomAttributes = "";
			$this->active->HrefValue = "";

			// app_name
			$this->app_name->LinkCustomAttributes = "";
			$this->app_name->HrefValue = "";

			// RTLindex
			$this->RTLindex->LinkCustomAttributes = "";
			$this->RTLindex->HrefValue = "";
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
		if ($this->imei->Required) {
			if (!$this->imei->IsDetailKey && $this->imei->FormValue != NULL && $this->imei->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->imei->caption(), $this->imei->RequiredErrorMessage));
			}
		}
		if ($this->phone_name->Required) {
			if (!$this->phone_name->IsDetailKey && $this->phone_name->FormValue != NULL && $this->phone_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->phone_name->caption(), $this->phone_name->RequiredErrorMessage));
			}
		}
		if ($this->date_add->Required) {
			if (!$this->date_add->IsDetailKey && $this->date_add->FormValue != NULL && $this->date_add->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->date_add->caption(), $this->date_add->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->date_add->FormValue)) {
			AddMessage($FormError, $this->date_add->errorMessage());
		}
		if ($this->app_version->Required) {
			if (!$this->app_version->IsDetailKey && $this->app_version->FormValue != NULL && $this->app_version->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->app_version->caption(), $this->app_version->RequiredErrorMessage));
			}
		}
		if ($this->phone_num->Required) {
			if (!$this->phone_num->IsDetailKey && $this->phone_num->FormValue != NULL && $this->phone_num->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->phone_num->caption(), $this->phone_num->RequiredErrorMessage));
			}
		}
		if ($this->phone_wifi_mac->Required) {
			if (!$this->phone_wifi_mac->IsDetailKey && $this->phone_wifi_mac->FormValue != NULL && $this->phone_wifi_mac->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->phone_wifi_mac->caption(), $this->phone_wifi_mac->RequiredErrorMessage));
			}
		}
		if ($this->active->Required) {
			if (!$this->active->IsDetailKey && $this->active->FormValue != NULL && $this->active->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->active->caption(), $this->active->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->active->FormValue)) {
			AddMessage($FormError, $this->active->errorMessage());
		}
		if ($this->app_name->Required) {
			if (!$this->app_name->IsDetailKey && $this->app_name->FormValue != NULL && $this->app_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->app_name->caption(), $this->app_name->RequiredErrorMessage));
			}
		}
		if ($this->RTLindex->Required) {
			if (!$this->RTLindex->IsDetailKey && $this->RTLindex->FormValue != NULL && $this->RTLindex->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RTLindex->caption(), $this->RTLindex->RequiredErrorMessage));
			}
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

	// Update record based on key values
	protected function editRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();
		$filter = $this->applyUserIDFilters($filter);
		$conn = &$this->getConnection();
		if ($this->imei->CurrentValue <> "") { // Check field with unique index
			$filterChk = "(`imei` = '" . AdjustSql($this->imei->CurrentValue, $this->Dbid) . "')";
			$filterChk .= " AND NOT (" . $filter . ")";
			$this->CurrentFilter = $filterChk;
			$sqlChk = $this->getCurrentSql();
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$rsChk = $conn->Execute($sqlChk);
			$conn->raiseErrorFn = '';
			if ($rsChk === FALSE) {
				return FALSE;
			} elseif (!$rsChk->EOF) {
				$idxErrMsg = str_replace("%f", $this->imei->caption(), $Language->Phrase("DupIndex"));
				$idxErrMsg = str_replace("%v", $this->imei->CurrentValue, $idxErrMsg);
				$this->setFailureMessage($idxErrMsg);
				$rsChk->close();
				return FALSE;
			}
			$rsChk->close();
		}
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record message
			$editRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// imei
			$this->imei->setDbValueDef($rsnew, $this->imei->CurrentValue, "", $this->imei->ReadOnly);

			// phone_name
			$this->phone_name->setDbValueDef($rsnew, $this->phone_name->CurrentValue, NULL, $this->phone_name->ReadOnly);

			// date_add
			$this->date_add->setDbValueDef($rsnew, UnFormatDateTime($this->date_add->CurrentValue, 0), NULL, $this->date_add->ReadOnly);

			// app_version
			$this->app_version->setDbValueDef($rsnew, $this->app_version->CurrentValue, NULL, $this->app_version->ReadOnly);

			// phone_num
			$this->phone_num->setDbValueDef($rsnew, $this->phone_num->CurrentValue, NULL, $this->phone_num->ReadOnly);

			// phone_wifi_mac
			$this->phone_wifi_mac->setDbValueDef($rsnew, $this->phone_wifi_mac->CurrentValue, NULL, $this->phone_wifi_mac->ReadOnly);

			// active
			$this->active->setDbValueDef($rsnew, $this->active->CurrentValue, 0, $this->active->ReadOnly);

			// app_name
			$this->app_name->setDbValueDef($rsnew, $this->app_name->CurrentValue, NULL, $this->app_name->ReadOnly);

			// Call Row Updating event
			$updateRow = $this->Row_Updating($rsold, $rsnew);
			if ($updateRow) {
				$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
				if (count($rsnew) > 0)
					$editRow = $this->update($rsnew, "", $rsold);
				else
					$editRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
				if ($editRow) {
				}
			} else {
				if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

					// Use the message, do nothing
				} elseif ($this->CancelMessage <> "") {
					$this->setFailureMessage($this->CancelMessage);
					$this->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$editRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($editRow)
			$this->Row_Updated($rsold, $rsnew);
		$rs->close();

		// Write JSON for API request
		if (IsApi() && $editRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $editRow;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("phone_basiclist.php"), "", $this->TableVar, TRUE);
		$pageId = "edit";
		$Breadcrumb->add("edit", $pageId, $url);
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
