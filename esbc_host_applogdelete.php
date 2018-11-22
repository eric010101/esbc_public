<?php
namespace PHPMaker2019\esbc_public_20181122;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$esbc_host_applog_delete = new esbc_host_applog_delete();

// Run the page
$esbc_host_applog_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_host_applog_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fesbc_host_applogdelete = currentForm = new ew.Form("fesbc_host_applogdelete", "delete");

// Form_CustomValidate event
fesbc_host_applogdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_host_applogdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fesbc_host_applogdelete.lists["x_ACTIVE"] = <?php echo $esbc_host_applog_delete->ACTIVE->Lookup->toClientList() ?>;
fesbc_host_applogdelete.lists["x_ACTIVE"].options = <?php echo JsonEncode($esbc_host_applog_delete->ACTIVE->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $esbc_host_applog_delete->showPageHeader(); ?>
<?php
$esbc_host_applog_delete->showMessage();
?>
<form name="fesbc_host_applogdelete" id="fesbc_host_applogdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_host_applog_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_host_applog_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_host_applog">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($esbc_host_applog_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($esbc_host_applog->LOG_INDEX->Visible) { // LOG_INDEX ?>
		<th class="<?php echo $esbc_host_applog->LOG_INDEX->headerCellClass() ?>"><span id="elh_esbc_host_applog_LOG_INDEX" class="esbc_host_applog_LOG_INDEX"><?php echo $esbc_host_applog->LOG_INDEX->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_host_applog->NICK_NAME->Visible) { // NICK_NAME ?>
		<th class="<?php echo $esbc_host_applog->NICK_NAME->headerCellClass() ?>"><span id="elh_esbc_host_applog_NICK_NAME" class="esbc_host_applog_NICK_NAME"><?php echo $esbc_host_applog->NICK_NAME->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_host_applog->HOST_IP->Visible) { // HOST_IP ?>
		<th class="<?php echo $esbc_host_applog->HOST_IP->headerCellClass() ?>"><span id="elh_esbc_host_applog_HOST_IP" class="esbc_host_applog_HOST_IP"><?php echo $esbc_host_applog->HOST_IP->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_host_applog->Create_Date->Visible) { // Create_Date ?>
		<th class="<?php echo $esbc_host_applog->Create_Date->headerCellClass() ?>"><span id="elh_esbc_host_applog_Create_Date" class="esbc_host_applog_Create_Date"><?php echo $esbc_host_applog->Create_Date->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_host_applog->ACTIVE->Visible) { // ACTIVE ?>
		<th class="<?php echo $esbc_host_applog->ACTIVE->headerCellClass() ?>"><span id="elh_esbc_host_applog_ACTIVE" class="esbc_host_applog_ACTIVE"><?php echo $esbc_host_applog->ACTIVE->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_host_applog->Modify_Date->Visible) { // Modify_Date ?>
		<th class="<?php echo $esbc_host_applog->Modify_Date->headerCellClass() ?>"><span id="elh_esbc_host_applog_Modify_Date" class="esbc_host_applog_Modify_Date"><?php echo $esbc_host_applog->Modify_Date->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$esbc_host_applog_delete->RecCnt = 0;
$i = 0;
while (!$esbc_host_applog_delete->Recordset->EOF) {
	$esbc_host_applog_delete->RecCnt++;
	$esbc_host_applog_delete->RowCnt++;

	// Set row properties
	$esbc_host_applog->resetAttributes();
	$esbc_host_applog->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$esbc_host_applog_delete->loadRowValues($esbc_host_applog_delete->Recordset);

	// Render row
	$esbc_host_applog_delete->renderRow();
?>
	<tr<?php echo $esbc_host_applog->rowAttributes() ?>>
<?php if ($esbc_host_applog->LOG_INDEX->Visible) { // LOG_INDEX ?>
		<td<?php echo $esbc_host_applog->LOG_INDEX->cellAttributes() ?>>
<span id="el<?php echo $esbc_host_applog_delete->RowCnt ?>_esbc_host_applog_LOG_INDEX" class="esbc_host_applog_LOG_INDEX">
<span<?php echo $esbc_host_applog->LOG_INDEX->viewAttributes() ?>>
<?php echo $esbc_host_applog->LOG_INDEX->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_host_applog->NICK_NAME->Visible) { // NICK_NAME ?>
		<td<?php echo $esbc_host_applog->NICK_NAME->cellAttributes() ?>>
<span id="el<?php echo $esbc_host_applog_delete->RowCnt ?>_esbc_host_applog_NICK_NAME" class="esbc_host_applog_NICK_NAME">
<span<?php echo $esbc_host_applog->NICK_NAME->viewAttributes() ?>>
<?php echo $esbc_host_applog->NICK_NAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_host_applog->HOST_IP->Visible) { // HOST_IP ?>
		<td<?php echo $esbc_host_applog->HOST_IP->cellAttributes() ?>>
<span id="el<?php echo $esbc_host_applog_delete->RowCnt ?>_esbc_host_applog_HOST_IP" class="esbc_host_applog_HOST_IP">
<span<?php echo $esbc_host_applog->HOST_IP->viewAttributes() ?>>
<?php echo $esbc_host_applog->HOST_IP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_host_applog->Create_Date->Visible) { // Create_Date ?>
		<td<?php echo $esbc_host_applog->Create_Date->cellAttributes() ?>>
<span id="el<?php echo $esbc_host_applog_delete->RowCnt ?>_esbc_host_applog_Create_Date" class="esbc_host_applog_Create_Date">
<span<?php echo $esbc_host_applog->Create_Date->viewAttributes() ?>>
<?php echo $esbc_host_applog->Create_Date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_host_applog->ACTIVE->Visible) { // ACTIVE ?>
		<td<?php echo $esbc_host_applog->ACTIVE->cellAttributes() ?>>
<span id="el<?php echo $esbc_host_applog_delete->RowCnt ?>_esbc_host_applog_ACTIVE" class="esbc_host_applog_ACTIVE">
<span<?php echo $esbc_host_applog->ACTIVE->viewAttributes() ?>>
<?php echo $esbc_host_applog->ACTIVE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_host_applog->Modify_Date->Visible) { // Modify_Date ?>
		<td<?php echo $esbc_host_applog->Modify_Date->cellAttributes() ?>>
<span id="el<?php echo $esbc_host_applog_delete->RowCnt ?>_esbc_host_applog_Modify_Date" class="esbc_host_applog_Modify_Date">
<span<?php echo $esbc_host_applog->Modify_Date->viewAttributes() ?>>
<?php echo $esbc_host_applog->Modify_Date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$esbc_host_applog_delete->Recordset->moveNext();
}
$esbc_host_applog_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $esbc_host_applog_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$esbc_host_applog_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$esbc_host_applog_delete->terminate();
?>
