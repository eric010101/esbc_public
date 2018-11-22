<?php
namespace PHPMaker2019\esbc_public_20181122;

//
// Page class
//
class alarm_basic_add extends alarm_basic
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{1450346A-D3E5-42C5-B2E0-BD489F2A0BDC}";

	// Table name
	public $TableName = 'alarm_basic';

	// Page object name
	public $PageObjName = "alarm_basic_add";

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

		// Table object (alarm_basic)
		if (!isset($GLOBALS["alarm_basic"]) || get_class($GLOBALS["alarm_basic"]) == PROJECT_NAMESPACE . "alarm_basic") {
			$GLOBALS["alarm_basic"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["alarm_basic"];
		}

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'alarm_basic');

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
		global $EXPORT, $alarm_basic;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($alarm_basic);
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
					if ($pageName == "alarm_basicview.php")
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
		$this->RTLindex->Visible = FALSE;
		$this->sensor_id->setVisibility();
		$this->value_max->setVisibility();
		$this->value_min->setVisibility();
		$this->delaytime->setVisibility();
		$this->date_add->setVisibility();
		$this->date_modified->setVisibility();
		$this->user_add->setVisibility();
		$this->user_modified->setVisibility();
		$this->email_receipt->setVisibility();
		$this->email_subject->setVisibility();
		$this->email_body->setVisibility();
		$this->email_attach->setVisibility();
		$this->sms_num->setVisibility();
		$this->sms_body->setVisibility();
		$this->alarm_subscriber->setVisibility();
		$this->sms_active->setVisibility();
		$this->email_active->setVisibility();
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
			if (Get("RTLindex") !== NULL) {
				$this->RTLindex->setQueryStringValue(Get("RTLindex"));
				$this->setKey("RTLindex", $this->RTLindex->CurrentValue); // Set up key
			} else {
				$this->setKey("RTLindex", ""); // Clear key
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
					$this->terminate("alarm_basiclist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "alarm_basiclist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "alarm_basicview.php")
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
		$this->RTLindex->CurrentValue = NULL;
		$this->RTLindex->OldValue = $this->RTLindex->CurrentValue;
		$this->sensor_id->CurrentValue = NULL;
		$this->sensor_id->OldValue = $this->sensor_id->CurrentValue;
		$this->value_max->CurrentValue = NULL;
		$this->value_max->OldValue = $this->value_max->CurrentValue;
		$this->value_min->CurrentValue = NULL;
		$this->value_min->OldValue = $this->value_min->CurrentValue;
		$this->delaytime->CurrentValue = NULL;
		$this->delaytime->OldValue = $this->delaytime->CurrentValue;
		$this->date_add->CurrentValue = NULL;
		$this->date_add->OldValue = $this->date_add->CurrentValue;
		$this->date_modified->CurrentValue = NULL;
		$this->date_modified->OldValue = $this->date_modified->CurrentValue;
		$this->user_add->CurrentValue = NULL;
		$this->user_add->OldValue = $this->user_add->CurrentValue;
		$this->user_modified->CurrentValue = NULL;
		$this->user_modified->OldValue = $this->user_modified->CurrentValue;
		$this->email_receipt->CurrentValue = NULL;
		$this->email_receipt->OldValue = $this->email_receipt->CurrentValue;
		$this->email_subject->CurrentValue = NULL;
		$this->email_subject->OldValue = $this->email_subject->CurrentValue;
		$this->email_body->CurrentValue = NULL;
		$this->email_body->OldValue = $this->email_body->CurrentValue;
		$this->email_attach->CurrentValue = NULL;
		$this->email_attach->OldValue = $this->email_attach->CurrentValue;
		$this->sms_num->CurrentValue = NULL;
		$this->sms_num->OldValue = $this->sms_num->CurrentValue;
		$this->sms_body->CurrentValue = NULL;
		$this->sms_body->OldValue = $this->sms_body->CurrentValue;
		$this->alarm_subscriber->CurrentValue = NULL;
		$this->alarm_subscriber->OldValue = $this->alarm_subscriber->CurrentValue;
		$this->sms_active->CurrentValue = 1;
		$this->email_active->CurrentValue = 0;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'sensor_id' first before field var 'x_sensor_id'
		$val = $CurrentForm->hasValue("sensor_id") ? $CurrentForm->getValue("sensor_id") : $CurrentForm->getValue("x_sensor_id");
		if (!$this->sensor_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sensor_id->Visible = FALSE; // Disable update for API request
			else
				$this->sensor_id->setFormValue($val);
		}

		// Check field name 'value_max' first before field var 'x_value_max'
		$val = $CurrentForm->hasValue("value_max") ? $CurrentForm->getValue("value_max") : $CurrentForm->getValue("x_value_max");
		if (!$this->value_max->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->value_max->Visible = FALSE; // Disable update for API request
			else
				$this->value_max->setFormValue($val);
		}

		// Check field name 'value_min' first before field var 'x_value_min'
		$val = $CurrentForm->hasValue("value_min") ? $CurrentForm->getValue("value_min") : $CurrentForm->getValue("x_value_min");
		if (!$this->value_min->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->value_min->Visible = FALSE; // Disable update for API request
			else
				$this->value_min->setFormValue($val);
		}

		// Check field name 'delaytime' first before field var 'x_delaytime'
		$val = $CurrentForm->hasValue("delaytime") ? $CurrentForm->getValue("delaytime") : $CurrentForm->getValue("x_delaytime");
		if (!$this->delaytime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->delaytime->Visible = FALSE; // Disable update for API request
			else
				$this->delaytime->setFormValue($val);
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

		// Check field name 'date_modified' first before field var 'x_date_modified'
		$val = $CurrentForm->hasValue("date_modified") ? $CurrentForm->getValue("date_modified") : $CurrentForm->getValue("x_date_modified");
		if (!$this->date_modified->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->date_modified->Visible = FALSE; // Disable update for API request
			else
				$this->date_modified->setFormValue($val);
			$this->date_modified->CurrentValue = UnFormatDateTime($this->date_modified->CurrentValue, 0);
		}

		// Check field name 'user_add' first before field var 'x_user_add'
		$val = $CurrentForm->hasValue("user_add") ? $CurrentForm->getValue("user_add") : $CurrentForm->getValue("x_user_add");
		if (!$this->user_add->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->user_add->Visible = FALSE; // Disable update for API request
			else
				$this->user_add->setFormValue($val);
		}

		// Check field name 'user_modified' first before field var 'x_user_modified'
		$val = $CurrentForm->hasValue("user_modified") ? $CurrentForm->getValue("user_modified") : $CurrentForm->getValue("x_user_modified");
		if (!$this->user_modified->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->user_modified->Visible = FALSE; // Disable update for API request
			else
				$this->user_modified->setFormValue($val);
		}

		// Check field name 'email_receipt' first before field var 'x_email_receipt'
		$val = $CurrentForm->hasValue("email_receipt") ? $CurrentForm->getValue("email_receipt") : $CurrentForm->getValue("x_email_receipt");
		if (!$this->email_receipt->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->email_receipt->Visible = FALSE; // Disable update for API request
			else
				$this->email_receipt->setFormValue($val);
		}

		// Check field name 'email_subject' first before field var 'x_email_subject'
		$val = $CurrentForm->hasValue("email_subject") ? $CurrentForm->getValue("email_subject") : $CurrentForm->getValue("x_email_subject");
		if (!$this->email_subject->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->email_subject->Visible = FALSE; // Disable update for API request
			else
				$this->email_subject->setFormValue($val);
		}

		// Check field name 'email_body' first before field var 'x_email_body'
		$val = $CurrentForm->hasValue("email_body") ? $CurrentForm->getValue("email_body") : $CurrentForm->getValue("x_email_body");
		if (!$this->email_body->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->email_body->Visible = FALSE; // Disable update for API request
			else
				$this->email_body->setFormValue($val);
		}

		// Check field name 'email_attach' first before field var 'x_email_attach'
		$val = $CurrentForm->hasValue("email_attach") ? $CurrentForm->getValue("email_attach") : $CurrentForm->getValue("x_email_attach");
		if (!$this->email_attach->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->email_attach->Visible = FALSE; // Disable update for API request
			else
				$this->email_attach->setFormValue($val);
		}

		// Check field name 'sms_num' first before field var 'x_sms_num'
		$val = $CurrentForm->hasValue("sms_num") ? $CurrentForm->getValue("sms_num") : $CurrentForm->getValue("x_sms_num");
		if (!$this->sms_num->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sms_num->Visible = FALSE; // Disable update for API request
			else
				$this->sms_num->setFormValue($val);
		}

		// Check field name 'sms_body' first before field var 'x_sms_body'
		$val = $CurrentForm->hasValue("sms_body") ? $CurrentForm->getValue("sms_body") : $CurrentForm->getValue("x_sms_body");
		if (!$this->sms_body->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sms_body->Visible = FALSE; // Disable update for API request
			else
				$this->sms_body->setFormValue($val);
		}

		// Check field name 'alarm_subscriber' first before field var 'x_alarm_subscriber'
		$val = $CurrentForm->hasValue("alarm_subscriber") ? $CurrentForm->getValue("alarm_subscriber") : $CurrentForm->getValue("x_alarm_subscriber");
		if (!$this->alarm_subscriber->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->alarm_subscriber->Visible = FALSE; // Disable update for API request
			else
				$this->alarm_subscriber->setFormValue($val);
		}

		// Check field name 'sms_active' first before field var 'x_sms_active'
		$val = $CurrentForm->hasValue("sms_active") ? $CurrentForm->getValue("sms_active") : $CurrentForm->getValue("x_sms_active");
		if (!$this->sms_active->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sms_active->Visible = FALSE; // Disable update for API request
			else
				$this->sms_active->setFormValue($val);
		}

		// Check field name 'email_active' first before field var 'x_email_active'
		$val = $CurrentForm->hasValue("email_active") ? $CurrentForm->getValue("email_active") : $CurrentForm->getValue("x_email_active");
		if (!$this->email_active->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->email_active->Visible = FALSE; // Disable update for API request
			else
				$this->email_active->setFormValue($val);
		}

		// Check field name 'RTLindex' first before field var 'x_RTLindex'
		$val = $CurrentForm->hasValue("RTLindex") ? $CurrentForm->getValue("RTLindex") : $CurrentForm->getValue("x_RTLindex");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->sensor_id->CurrentValue = $this->sensor_id->FormValue;
		$this->value_max->CurrentValue = $this->value_max->FormValue;
		$this->value_min->CurrentValue = $this->value_min->FormValue;
		$this->delaytime->CurrentValue = $this->delaytime->FormValue;
		$this->date_add->CurrentValue = $this->date_add->FormValue;
		$this->date_add->CurrentValue = UnFormatDateTime($this->date_add->CurrentValue, 0);
		$this->date_modified->CurrentValue = $this->date_modified->FormValue;
		$this->date_modified->CurrentValue = UnFormatDateTime($this->date_modified->CurrentValue, 0);
		$this->user_add->CurrentValue = $this->user_add->FormValue;
		$this->user_modified->CurrentValue = $this->user_modified->FormValue;
		$this->email_receipt->CurrentValue = $this->email_receipt->FormValue;
		$this->email_subject->CurrentValue = $this->email_subject->FormValue;
		$this->email_body->CurrentValue = $this->email_body->FormValue;
		$this->email_attach->CurrentValue = $this->email_attach->FormValue;
		$this->sms_num->CurrentValue = $this->sms_num->FormValue;
		$this->sms_body->CurrentValue = $this->sms_body->FormValue;
		$this->alarm_subscriber->CurrentValue = $this->alarm_subscriber->FormValue;
		$this->sms_active->CurrentValue = $this->sms_active->FormValue;
		$this->email_active->CurrentValue = $this->email_active->FormValue;
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
		$this->RTLindex->setDbValue($row['RTLindex']);
		$this->sensor_id->setDbValue($row['sensor_id']);
		$this->value_max->setDbValue($row['value_max']);
		$this->value_min->setDbValue($row['value_min']);
		$this->delaytime->setDbValue($row['delaytime']);
		$this->date_add->setDbValue($row['date_add']);
		$this->date_modified->setDbValue($row['date_modified']);
		$this->user_add->setDbValue($row['user_add']);
		$this->user_modified->setDbValue($row['user_modified']);
		$this->email_receipt->setDbValue($row['email_receipt']);
		$this->email_subject->setDbValue($row['email_subject']);
		$this->email_body->setDbValue($row['email_body']);
		$this->email_attach->setDbValue($row['email_attach']);
		$this->sms_num->setDbValue($row['sms_num']);
		$this->sms_body->setDbValue($row['sms_body']);
		$this->alarm_subscriber->setDbValue($row['alarm_subscriber']);
		$this->sms_active->setDbValue($row['sms_active']);
		$this->email_active->setDbValue($row['email_active']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['RTLindex'] = $this->RTLindex->CurrentValue;
		$row['sensor_id'] = $this->sensor_id->CurrentValue;
		$row['value_max'] = $this->value_max->CurrentValue;
		$row['value_min'] = $this->value_min->CurrentValue;
		$row['delaytime'] = $this->delaytime->CurrentValue;
		$row['date_add'] = $this->date_add->CurrentValue;
		$row['date_modified'] = $this->date_modified->CurrentValue;
		$row['user_add'] = $this->user_add->CurrentValue;
		$row['user_modified'] = $this->user_modified->CurrentValue;
		$row['email_receipt'] = $this->email_receipt->CurrentValue;
		$row['email_subject'] = $this->email_subject->CurrentValue;
		$row['email_body'] = $this->email_body->CurrentValue;
		$row['email_attach'] = $this->email_attach->CurrentValue;
		$row['sms_num'] = $this->sms_num->CurrentValue;
		$row['sms_body'] = $this->sms_body->CurrentValue;
		$row['alarm_subscriber'] = $this->alarm_subscriber->CurrentValue;
		$row['sms_active'] = $this->sms_active->CurrentValue;
		$row['email_active'] = $this->email_active->CurrentValue;
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
		// Convert decimal values if posted back

		if ($this->value_max->FormValue == $this->value_max->CurrentValue && is_numeric(ConvertToFloatString($this->value_max->CurrentValue)))
			$this->value_max->CurrentValue = ConvertToFloatString($this->value_max->CurrentValue);

		// Convert decimal values if posted back
		if ($this->value_min->FormValue == $this->value_min->CurrentValue && is_numeric(ConvertToFloatString($this->value_min->CurrentValue)))
			$this->value_min->CurrentValue = ConvertToFloatString($this->value_min->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
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

		if ($this->RowType == ROWTYPE_VIEW) { // View row

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
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// sensor_id
			$this->sensor_id->EditAttrs["class"] = "form-control";
			$this->sensor_id->EditCustomAttributes = "";
			$this->sensor_id->EditValue = HtmlEncode($this->sensor_id->CurrentValue);
			$this->sensor_id->PlaceHolder = RemoveHtml($this->sensor_id->caption());

			// value_max
			$this->value_max->EditAttrs["class"] = "form-control";
			$this->value_max->EditCustomAttributes = "";
			$this->value_max->EditValue = HtmlEncode($this->value_max->CurrentValue);
			$this->value_max->PlaceHolder = RemoveHtml($this->value_max->caption());
			if (strval($this->value_max->EditValue) <> "" && is_numeric($this->value_max->EditValue))
				$this->value_max->EditValue = FormatNumber($this->value_max->EditValue, -2, -2, -2, -2);

			// value_min
			$this->value_min->EditAttrs["class"] = "form-control";
			$this->value_min->EditCustomAttributes = "";
			$this->value_min->EditValue = HtmlEncode($this->value_min->CurrentValue);
			$this->value_min->PlaceHolder = RemoveHtml($this->value_min->caption());
			if (strval($this->value_min->EditValue) <> "" && is_numeric($this->value_min->EditValue))
				$this->value_min->EditValue = FormatNumber($this->value_min->EditValue, -2, -2, -2, -2);

			// delaytime
			$this->delaytime->EditAttrs["class"] = "form-control";
			$this->delaytime->EditCustomAttributes = "";
			$this->delaytime->EditValue = HtmlEncode($this->delaytime->CurrentValue);
			$this->delaytime->PlaceHolder = RemoveHtml($this->delaytime->caption());

			// date_add
			$this->date_add->EditAttrs["class"] = "form-control";
			$this->date_add->EditCustomAttributes = "";
			$this->date_add->EditValue = HtmlEncode(FormatDateTime($this->date_add->CurrentValue, 8));
			$this->date_add->PlaceHolder = RemoveHtml($this->date_add->caption());

			// date_modified
			$this->date_modified->EditAttrs["class"] = "form-control";
			$this->date_modified->EditCustomAttributes = "";
			$this->date_modified->EditValue = HtmlEncode(FormatDateTime($this->date_modified->CurrentValue, 8));
			$this->date_modified->PlaceHolder = RemoveHtml($this->date_modified->caption());

			// user_add
			$this->user_add->EditAttrs["class"] = "form-control";
			$this->user_add->EditCustomAttributes = "";
			$this->user_add->EditValue = HtmlEncode($this->user_add->CurrentValue);
			$this->user_add->PlaceHolder = RemoveHtml($this->user_add->caption());

			// user_modified
			$this->user_modified->EditAttrs["class"] = "form-control";
			$this->user_modified->EditCustomAttributes = "";
			$this->user_modified->EditValue = HtmlEncode($this->user_modified->CurrentValue);
			$this->user_modified->PlaceHolder = RemoveHtml($this->user_modified->caption());

			// email_receipt
			$this->email_receipt->EditAttrs["class"] = "form-control";
			$this->email_receipt->EditCustomAttributes = "";
			$this->email_receipt->EditValue = HtmlEncode($this->email_receipt->CurrentValue);
			$this->email_receipt->PlaceHolder = RemoveHtml($this->email_receipt->caption());

			// email_subject
			$this->email_subject->EditAttrs["class"] = "form-control";
			$this->email_subject->EditCustomAttributes = "";
			$this->email_subject->EditValue = HtmlEncode($this->email_subject->CurrentValue);
			$this->email_subject->PlaceHolder = RemoveHtml($this->email_subject->caption());

			// email_body
			$this->email_body->EditAttrs["class"] = "form-control";
			$this->email_body->EditCustomAttributes = "";
			$this->email_body->EditValue = HtmlEncode($this->email_body->CurrentValue);
			$this->email_body->PlaceHolder = RemoveHtml($this->email_body->caption());

			// email_attach
			$this->email_attach->EditAttrs["class"] = "form-control";
			$this->email_attach->EditCustomAttributes = "";
			$this->email_attach->EditValue = HtmlEncode($this->email_attach->CurrentValue);
			$this->email_attach->PlaceHolder = RemoveHtml($this->email_attach->caption());

			// sms_num
			$this->sms_num->EditAttrs["class"] = "form-control";
			$this->sms_num->EditCustomAttributes = "";
			$this->sms_num->EditValue = HtmlEncode($this->sms_num->CurrentValue);
			$this->sms_num->PlaceHolder = RemoveHtml($this->sms_num->caption());

			// sms_body
			$this->sms_body->EditAttrs["class"] = "form-control";
			$this->sms_body->EditCustomAttributes = "";
			$this->sms_body->EditValue = HtmlEncode($this->sms_body->CurrentValue);
			$this->sms_body->PlaceHolder = RemoveHtml($this->sms_body->caption());

			// alarm_subscriber
			$this->alarm_subscriber->EditAttrs["class"] = "form-control";
			$this->alarm_subscriber->EditCustomAttributes = "";
			$this->alarm_subscriber->EditValue = HtmlEncode($this->alarm_subscriber->CurrentValue);
			$this->alarm_subscriber->PlaceHolder = RemoveHtml($this->alarm_subscriber->caption());

			// sms_active
			$this->sms_active->EditAttrs["class"] = "form-control";
			$this->sms_active->EditCustomAttributes = "";
			$this->sms_active->EditValue = HtmlEncode($this->sms_active->CurrentValue);
			$this->sms_active->PlaceHolder = RemoveHtml($this->sms_active->caption());

			// email_active
			$this->email_active->EditAttrs["class"] = "form-control";
			$this->email_active->EditCustomAttributes = "";
			$this->email_active->EditValue = HtmlEncode($this->email_active->CurrentValue);
			$this->email_active->PlaceHolder = RemoveHtml($this->email_active->caption());

			// Add refer script
			// sensor_id

			$this->sensor_id->LinkCustomAttributes = "";
			$this->sensor_id->HrefValue = "";

			// value_max
			$this->value_max->LinkCustomAttributes = "";
			$this->value_max->HrefValue = "";

			// value_min
			$this->value_min->LinkCustomAttributes = "";
			$this->value_min->HrefValue = "";

			// delaytime
			$this->delaytime->LinkCustomAttributes = "";
			$this->delaytime->HrefValue = "";

			// date_add
			$this->date_add->LinkCustomAttributes = "";
			$this->date_add->HrefValue = "";

			// date_modified
			$this->date_modified->LinkCustomAttributes = "";
			$this->date_modified->HrefValue = "";

			// user_add
			$this->user_add->LinkCustomAttributes = "";
			$this->user_add->HrefValue = "";

			// user_modified
			$this->user_modified->LinkCustomAttributes = "";
			$this->user_modified->HrefValue = "";

			// email_receipt
			$this->email_receipt->LinkCustomAttributes = "";
			$this->email_receipt->HrefValue = "";

			// email_subject
			$this->email_subject->LinkCustomAttributes = "";
			$this->email_subject->HrefValue = "";

			// email_body
			$this->email_body->LinkCustomAttributes = "";
			$this->email_body->HrefValue = "";

			// email_attach
			$this->email_attach->LinkCustomAttributes = "";
			$this->email_attach->HrefValue = "";

			// sms_num
			$this->sms_num->LinkCustomAttributes = "";
			$this->sms_num->HrefValue = "";

			// sms_body
			$this->sms_body->LinkCustomAttributes = "";
			$this->sms_body->HrefValue = "";

			// alarm_subscriber
			$this->alarm_subscriber->LinkCustomAttributes = "";
			$this->alarm_subscriber->HrefValue = "";

			// sms_active
			$this->sms_active->LinkCustomAttributes = "";
			$this->sms_active->HrefValue = "";

			// email_active
			$this->email_active->LinkCustomAttributes = "";
			$this->email_active->HrefValue = "";
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
		if ($this->RTLindex->Required) {
			if (!$this->RTLindex->IsDetailKey && $this->RTLindex->FormValue != NULL && $this->RTLindex->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RTLindex->caption(), $this->RTLindex->RequiredErrorMessage));
			}
		}
		if ($this->sensor_id->Required) {
			if (!$this->sensor_id->IsDetailKey && $this->sensor_id->FormValue != NULL && $this->sensor_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sensor_id->caption(), $this->sensor_id->RequiredErrorMessage));
			}
		}
		if ($this->value_max->Required) {
			if (!$this->value_max->IsDetailKey && $this->value_max->FormValue != NULL && $this->value_max->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->value_max->caption(), $this->value_max->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->value_max->FormValue)) {
			AddMessage($FormError, $this->value_max->errorMessage());
		}
		if ($this->value_min->Required) {
			if (!$this->value_min->IsDetailKey && $this->value_min->FormValue != NULL && $this->value_min->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->value_min->caption(), $this->value_min->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->value_min->FormValue)) {
			AddMessage($FormError, $this->value_min->errorMessage());
		}
		if ($this->delaytime->Required) {
			if (!$this->delaytime->IsDetailKey && $this->delaytime->FormValue != NULL && $this->delaytime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->delaytime->caption(), $this->delaytime->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->delaytime->FormValue)) {
			AddMessage($FormError, $this->delaytime->errorMessage());
		}
		if ($this->date_add->Required) {
			if (!$this->date_add->IsDetailKey && $this->date_add->FormValue != NULL && $this->date_add->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->date_add->caption(), $this->date_add->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->date_add->FormValue)) {
			AddMessage($FormError, $this->date_add->errorMessage());
		}
		if ($this->date_modified->Required) {
			if (!$this->date_modified->IsDetailKey && $this->date_modified->FormValue != NULL && $this->date_modified->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->date_modified->caption(), $this->date_modified->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->date_modified->FormValue)) {
			AddMessage($FormError, $this->date_modified->errorMessage());
		}
		if ($this->user_add->Required) {
			if (!$this->user_add->IsDetailKey && $this->user_add->FormValue != NULL && $this->user_add->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->user_add->caption(), $this->user_add->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->user_add->FormValue)) {
			AddMessage($FormError, $this->user_add->errorMessage());
		}
		if ($this->user_modified->Required) {
			if (!$this->user_modified->IsDetailKey && $this->user_modified->FormValue != NULL && $this->user_modified->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->user_modified->caption(), $this->user_modified->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->user_modified->FormValue)) {
			AddMessage($FormError, $this->user_modified->errorMessage());
		}
		if ($this->email_receipt->Required) {
			if (!$this->email_receipt->IsDetailKey && $this->email_receipt->FormValue != NULL && $this->email_receipt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->email_receipt->caption(), $this->email_receipt->RequiredErrorMessage));
			}
		}
		if ($this->email_subject->Required) {
			if (!$this->email_subject->IsDetailKey && $this->email_subject->FormValue != NULL && $this->email_subject->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->email_subject->caption(), $this->email_subject->RequiredErrorMessage));
			}
		}
		if ($this->email_body->Required) {
			if (!$this->email_body->IsDetailKey && $this->email_body->FormValue != NULL && $this->email_body->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->email_body->caption(), $this->email_body->RequiredErrorMessage));
			}
		}
		if ($this->email_attach->Required) {
			if (!$this->email_attach->IsDetailKey && $this->email_attach->FormValue != NULL && $this->email_attach->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->email_attach->caption(), $this->email_attach->RequiredErrorMessage));
			}
		}
		if ($this->sms_num->Required) {
			if (!$this->sms_num->IsDetailKey && $this->sms_num->FormValue != NULL && $this->sms_num->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sms_num->caption(), $this->sms_num->RequiredErrorMessage));
			}
		}
		if ($this->sms_body->Required) {
			if (!$this->sms_body->IsDetailKey && $this->sms_body->FormValue != NULL && $this->sms_body->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sms_body->caption(), $this->sms_body->RequiredErrorMessage));
			}
		}
		if ($this->alarm_subscriber->Required) {
			if (!$this->alarm_subscriber->IsDetailKey && $this->alarm_subscriber->FormValue != NULL && $this->alarm_subscriber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->alarm_subscriber->caption(), $this->alarm_subscriber->RequiredErrorMessage));
			}
		}
		if ($this->sms_active->Required) {
			if (!$this->sms_active->IsDetailKey && $this->sms_active->FormValue != NULL && $this->sms_active->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sms_active->caption(), $this->sms_active->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->sms_active->FormValue)) {
			AddMessage($FormError, $this->sms_active->errorMessage());
		}
		if ($this->email_active->Required) {
			if (!$this->email_active->IsDetailKey && $this->email_active->FormValue != NULL && $this->email_active->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->email_active->caption(), $this->email_active->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->email_active->FormValue)) {
			AddMessage($FormError, $this->email_active->errorMessage());
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

		// sensor_id
		$this->sensor_id->setDbValueDef($rsnew, $this->sensor_id->CurrentValue, "", FALSE);

		// value_max
		$this->value_max->setDbValueDef($rsnew, $this->value_max->CurrentValue, NULL, FALSE);

		// value_min
		$this->value_min->setDbValueDef($rsnew, $this->value_min->CurrentValue, NULL, FALSE);

		// delaytime
		$this->delaytime->setDbValueDef($rsnew, $this->delaytime->CurrentValue, NULL, FALSE);

		// date_add
		$this->date_add->setDbValueDef($rsnew, UnFormatDateTime($this->date_add->CurrentValue, 0), NULL, FALSE);

		// date_modified
		$this->date_modified->setDbValueDef($rsnew, UnFormatDateTime($this->date_modified->CurrentValue, 0), NULL, FALSE);

		// user_add
		$this->user_add->setDbValueDef($rsnew, $this->user_add->CurrentValue, NULL, FALSE);

		// user_modified
		$this->user_modified->setDbValueDef($rsnew, $this->user_modified->CurrentValue, NULL, FALSE);

		// email_receipt
		$this->email_receipt->setDbValueDef($rsnew, $this->email_receipt->CurrentValue, NULL, FALSE);

		// email_subject
		$this->email_subject->setDbValueDef($rsnew, $this->email_subject->CurrentValue, NULL, FALSE);

		// email_body
		$this->email_body->setDbValueDef($rsnew, $this->email_body->CurrentValue, NULL, FALSE);

		// email_attach
		$this->email_attach->setDbValueDef($rsnew, $this->email_attach->CurrentValue, NULL, FALSE);

		// sms_num
		$this->sms_num->setDbValueDef($rsnew, $this->sms_num->CurrentValue, NULL, FALSE);

		// sms_body
		$this->sms_body->setDbValueDef($rsnew, $this->sms_body->CurrentValue, NULL, FALSE);

		// alarm_subscriber
		$this->alarm_subscriber->setDbValueDef($rsnew, $this->alarm_subscriber->CurrentValue, NULL, FALSE);

		// sms_active
		$this->sms_active->setDbValueDef($rsnew, $this->sms_active->CurrentValue, 0, strval($this->sms_active->CurrentValue) == "");

		// email_active
		$this->email_active->setDbValueDef($rsnew, $this->email_active->CurrentValue, 0, strval($this->email_active->CurrentValue) == "");

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("alarm_basiclist.php"), "", $this->TableVar, TRUE);
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
