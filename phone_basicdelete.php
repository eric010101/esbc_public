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
$phone_basic_delete = new phone_basic_delete();

// Run the page
$phone_basic_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$phone_basic_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fphone_basicdelete = currentForm = new ew.Form("fphone_basicdelete", "delete");

// Form_CustomValidate event
fphone_basicdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fphone_basicdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $phone_basic_delete->showPageHeader(); ?>
<?php
$phone_basic_delete->showMessage();
?>
<form name="fphone_basicdelete" id="fphone_basicdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($phone_basic_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $phone_basic_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="phone_basic">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($phone_basic_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($phone_basic->imei->Visible) { // imei ?>
		<th class="<?php echo $phone_basic->imei->headerCellClass() ?>"><span id="elh_phone_basic_imei" class="phone_basic_imei"><?php echo $phone_basic->imei->caption() ?></span></th>
<?php } ?>
<?php if ($phone_basic->phone_name->Visible) { // phone_name ?>
		<th class="<?php echo $phone_basic->phone_name->headerCellClass() ?>"><span id="elh_phone_basic_phone_name" class="phone_basic_phone_name"><?php echo $phone_basic->phone_name->caption() ?></span></th>
<?php } ?>
<?php if ($phone_basic->date_add->Visible) { // date_add ?>
		<th class="<?php echo $phone_basic->date_add->headerCellClass() ?>"><span id="elh_phone_basic_date_add" class="phone_basic_date_add"><?php echo $phone_basic->date_add->caption() ?></span></th>
<?php } ?>
<?php if ($phone_basic->app_version->Visible) { // app_version ?>
		<th class="<?php echo $phone_basic->app_version->headerCellClass() ?>"><span id="elh_phone_basic_app_version" class="phone_basic_app_version"><?php echo $phone_basic->app_version->caption() ?></span></th>
<?php } ?>
<?php if ($phone_basic->phone_num->Visible) { // phone_num ?>
		<th class="<?php echo $phone_basic->phone_num->headerCellClass() ?>"><span id="elh_phone_basic_phone_num" class="phone_basic_phone_num"><?php echo $phone_basic->phone_num->caption() ?></span></th>
<?php } ?>
<?php if ($phone_basic->phone_wifi_mac->Visible) { // phone_wifi_mac ?>
		<th class="<?php echo $phone_basic->phone_wifi_mac->headerCellClass() ?>"><span id="elh_phone_basic_phone_wifi_mac" class="phone_basic_phone_wifi_mac"><?php echo $phone_basic->phone_wifi_mac->caption() ?></span></th>
<?php } ?>
<?php if ($phone_basic->active->Visible) { // active ?>
		<th class="<?php echo $phone_basic->active->headerCellClass() ?>"><span id="elh_phone_basic_active" class="phone_basic_active"><?php echo $phone_basic->active->caption() ?></span></th>
<?php } ?>
<?php if ($phone_basic->app_name->Visible) { // app_name ?>
		<th class="<?php echo $phone_basic->app_name->headerCellClass() ?>"><span id="elh_phone_basic_app_name" class="phone_basic_app_name"><?php echo $phone_basic->app_name->caption() ?></span></th>
<?php } ?>
<?php if ($phone_basic->RTLindex->Visible) { // RTLindex ?>
		<th class="<?php echo $phone_basic->RTLindex->headerCellClass() ?>"><span id="elh_phone_basic_RTLindex" class="phone_basic_RTLindex"><?php echo $phone_basic->RTLindex->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$phone_basic_delete->RecCnt = 0;
$i = 0;
while (!$phone_basic_delete->Recordset->EOF) {
	$phone_basic_delete->RecCnt++;
	$phone_basic_delete->RowCnt++;

	// Set row properties
	$phone_basic->resetAttributes();
	$phone_basic->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$phone_basic_delete->loadRowValues($phone_basic_delete->Recordset);

	// Render row
	$phone_basic_delete->renderRow();
?>
	<tr<?php echo $phone_basic->rowAttributes() ?>>
<?php if ($phone_basic->imei->Visible) { // imei ?>
		<td<?php echo $phone_basic->imei->cellAttributes() ?>>
<span id="el<?php echo $phone_basic_delete->RowCnt ?>_phone_basic_imei" class="phone_basic_imei">
<span<?php echo $phone_basic->imei->viewAttributes() ?>>
<?php echo $phone_basic->imei->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($phone_basic->phone_name->Visible) { // phone_name ?>
		<td<?php echo $phone_basic->phone_name->cellAttributes() ?>>
<span id="el<?php echo $phone_basic_delete->RowCnt ?>_phone_basic_phone_name" class="phone_basic_phone_name">
<span<?php echo $phone_basic->phone_name->viewAttributes() ?>>
<?php echo $phone_basic->phone_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($phone_basic->date_add->Visible) { // date_add ?>
		<td<?php echo $phone_basic->date_add->cellAttributes() ?>>
<span id="el<?php echo $phone_basic_delete->RowCnt ?>_phone_basic_date_add" class="phone_basic_date_add">
<span<?php echo $phone_basic->date_add->viewAttributes() ?>>
<?php echo $phone_basic->date_add->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($phone_basic->app_version->Visible) { // app_version ?>
		<td<?php echo $phone_basic->app_version->cellAttributes() ?>>
<span id="el<?php echo $phone_basic_delete->RowCnt ?>_phone_basic_app_version" class="phone_basic_app_version">
<span<?php echo $phone_basic->app_version->viewAttributes() ?>>
<?php echo $phone_basic->app_version->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($phone_basic->phone_num->Visible) { // phone_num ?>
		<td<?php echo $phone_basic->phone_num->cellAttributes() ?>>
<span id="el<?php echo $phone_basic_delete->RowCnt ?>_phone_basic_phone_num" class="phone_basic_phone_num">
<span<?php echo $phone_basic->phone_num->viewAttributes() ?>>
<?php echo $phone_basic->phone_num->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($phone_basic->phone_wifi_mac->Visible) { // phone_wifi_mac ?>
		<td<?php echo $phone_basic->phone_wifi_mac->cellAttributes() ?>>
<span id="el<?php echo $phone_basic_delete->RowCnt ?>_phone_basic_phone_wifi_mac" class="phone_basic_phone_wifi_mac">
<span<?php echo $phone_basic->phone_wifi_mac->viewAttributes() ?>>
<?php echo $phone_basic->phone_wifi_mac->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($phone_basic->active->Visible) { // active ?>
		<td<?php echo $phone_basic->active->cellAttributes() ?>>
<span id="el<?php echo $phone_basic_delete->RowCnt ?>_phone_basic_active" class="phone_basic_active">
<span<?php echo $phone_basic->active->viewAttributes() ?>>
<?php echo $phone_basic->active->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($phone_basic->app_name->Visible) { // app_name ?>
		<td<?php echo $phone_basic->app_name->cellAttributes() ?>>
<span id="el<?php echo $phone_basic_delete->RowCnt ?>_phone_basic_app_name" class="phone_basic_app_name">
<span<?php echo $phone_basic->app_name->viewAttributes() ?>>
<?php echo $phone_basic->app_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($phone_basic->RTLindex->Visible) { // RTLindex ?>
		<td<?php echo $phone_basic->RTLindex->cellAttributes() ?>>
<span id="el<?php echo $phone_basic_delete->RowCnt ?>_phone_basic_RTLindex" class="phone_basic_RTLindex">
<span<?php echo $phone_basic->RTLindex->viewAttributes() ?>>
<?php echo $phone_basic->RTLindex->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$phone_basic_delete->Recordset->moveNext();
}
$phone_basic_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $phone_basic_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$phone_basic_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$phone_basic_delete->terminate();
?>
