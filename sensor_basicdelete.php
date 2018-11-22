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
$sensor_basic_delete = new sensor_basic_delete();

// Run the page
$sensor_basic_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sensor_basic_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fsensor_basicdelete = currentForm = new ew.Form("fsensor_basicdelete", "delete");

// Form_CustomValidate event
fsensor_basicdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsensor_basicdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $sensor_basic_delete->showPageHeader(); ?>
<?php
$sensor_basic_delete->showMessage();
?>
<form name="fsensor_basicdelete" id="fsensor_basicdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sensor_basic_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sensor_basic_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sensor_basic">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($sensor_basic_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($sensor_basic->RTLindex->Visible) { // RTLindex ?>
		<th class="<?php echo $sensor_basic->RTLindex->headerCellClass() ?>"><span id="elh_sensor_basic_RTLindex" class="sensor_basic_RTLindex"><?php echo $sensor_basic->RTLindex->caption() ?></span></th>
<?php } ?>
<?php if ($sensor_basic->sensor_id->Visible) { // sensor_id ?>
		<th class="<?php echo $sensor_basic->sensor_id->headerCellClass() ?>"><span id="elh_sensor_basic_sensor_id" class="sensor_basic_sensor_id"><?php echo $sensor_basic->sensor_id->caption() ?></span></th>
<?php } ?>
<?php if ($sensor_basic->beb_alias_name->Visible) { // beb_alias_name ?>
		<th class="<?php echo $sensor_basic->beb_alias_name->headerCellClass() ?>"><span id="elh_sensor_basic_beb_alias_name" class="sensor_basic_beb_alias_name"><?php echo $sensor_basic->beb_alias_name->caption() ?></span></th>
<?php } ?>
<?php if ($sensor_basic->active->Visible) { // active ?>
		<th class="<?php echo $sensor_basic->active->headerCellClass() ?>"><span id="elh_sensor_basic_active" class="sensor_basic_active"><?php echo $sensor_basic->active->caption() ?></span></th>
<?php } ?>
<?php if ($sensor_basic->date_add->Visible) { // date_add ?>
		<th class="<?php echo $sensor_basic->date_add->headerCellClass() ?>"><span id="elh_sensor_basic_date_add" class="sensor_basic_date_add"><?php echo $sensor_basic->date_add->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$sensor_basic_delete->RecCnt = 0;
$i = 0;
while (!$sensor_basic_delete->Recordset->EOF) {
	$sensor_basic_delete->RecCnt++;
	$sensor_basic_delete->RowCnt++;

	// Set row properties
	$sensor_basic->resetAttributes();
	$sensor_basic->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$sensor_basic_delete->loadRowValues($sensor_basic_delete->Recordset);

	// Render row
	$sensor_basic_delete->renderRow();
?>
	<tr<?php echo $sensor_basic->rowAttributes() ?>>
<?php if ($sensor_basic->RTLindex->Visible) { // RTLindex ?>
		<td<?php echo $sensor_basic->RTLindex->cellAttributes() ?>>
<span id="el<?php echo $sensor_basic_delete->RowCnt ?>_sensor_basic_RTLindex" class="sensor_basic_RTLindex">
<span<?php echo $sensor_basic->RTLindex->viewAttributes() ?>>
<?php echo $sensor_basic->RTLindex->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sensor_basic->sensor_id->Visible) { // sensor_id ?>
		<td<?php echo $sensor_basic->sensor_id->cellAttributes() ?>>
<span id="el<?php echo $sensor_basic_delete->RowCnt ?>_sensor_basic_sensor_id" class="sensor_basic_sensor_id">
<span<?php echo $sensor_basic->sensor_id->viewAttributes() ?>>
<?php echo $sensor_basic->sensor_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sensor_basic->beb_alias_name->Visible) { // beb_alias_name ?>
		<td<?php echo $sensor_basic->beb_alias_name->cellAttributes() ?>>
<span id="el<?php echo $sensor_basic_delete->RowCnt ?>_sensor_basic_beb_alias_name" class="sensor_basic_beb_alias_name">
<span<?php echo $sensor_basic->beb_alias_name->viewAttributes() ?>>
<?php echo $sensor_basic->beb_alias_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sensor_basic->active->Visible) { // active ?>
		<td<?php echo $sensor_basic->active->cellAttributes() ?>>
<span id="el<?php echo $sensor_basic_delete->RowCnt ?>_sensor_basic_active" class="sensor_basic_active">
<span<?php echo $sensor_basic->active->viewAttributes() ?>>
<?php echo $sensor_basic->active->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sensor_basic->date_add->Visible) { // date_add ?>
		<td<?php echo $sensor_basic->date_add->cellAttributes() ?>>
<span id="el<?php echo $sensor_basic_delete->RowCnt ?>_sensor_basic_date_add" class="sensor_basic_date_add">
<span<?php echo $sensor_basic->date_add->viewAttributes() ?>>
<?php echo $sensor_basic->date_add->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$sensor_basic_delete->Recordset->moveNext();
}
$sensor_basic_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sensor_basic_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$sensor_basic_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$sensor_basic_delete->terminate();
?>
