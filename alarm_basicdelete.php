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
$alarm_basic_delete = new alarm_basic_delete();

// Run the page
$alarm_basic_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$alarm_basic_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var falarm_basicdelete = currentForm = new ew.Form("falarm_basicdelete", "delete");

// Form_CustomValidate event
falarm_basicdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
falarm_basicdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $alarm_basic_delete->showPageHeader(); ?>
<?php
$alarm_basic_delete->showMessage();
?>
<form name="falarm_basicdelete" id="falarm_basicdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($alarm_basic_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $alarm_basic_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="alarm_basic">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($alarm_basic_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($alarm_basic->RTLindex->Visible) { // RTLindex ?>
		<th class="<?php echo $alarm_basic->RTLindex->headerCellClass() ?>"><span id="elh_alarm_basic_RTLindex" class="alarm_basic_RTLindex"><?php echo $alarm_basic->RTLindex->caption() ?></span></th>
<?php } ?>
<?php if ($alarm_basic->sensor_id->Visible) { // sensor_id ?>
		<th class="<?php echo $alarm_basic->sensor_id->headerCellClass() ?>"><span id="elh_alarm_basic_sensor_id" class="alarm_basic_sensor_id"><?php echo $alarm_basic->sensor_id->caption() ?></span></th>
<?php } ?>
<?php if ($alarm_basic->value_max->Visible) { // value_max ?>
		<th class="<?php echo $alarm_basic->value_max->headerCellClass() ?>"><span id="elh_alarm_basic_value_max" class="alarm_basic_value_max"><?php echo $alarm_basic->value_max->caption() ?></span></th>
<?php } ?>
<?php if ($alarm_basic->value_min->Visible) { // value_min ?>
		<th class="<?php echo $alarm_basic->value_min->headerCellClass() ?>"><span id="elh_alarm_basic_value_min" class="alarm_basic_value_min"><?php echo $alarm_basic->value_min->caption() ?></span></th>
<?php } ?>
<?php if ($alarm_basic->delaytime->Visible) { // delaytime ?>
		<th class="<?php echo $alarm_basic->delaytime->headerCellClass() ?>"><span id="elh_alarm_basic_delaytime" class="alarm_basic_delaytime"><?php echo $alarm_basic->delaytime->caption() ?></span></th>
<?php } ?>
<?php if ($alarm_basic->date_add->Visible) { // date_add ?>
		<th class="<?php echo $alarm_basic->date_add->headerCellClass() ?>"><span id="elh_alarm_basic_date_add" class="alarm_basic_date_add"><?php echo $alarm_basic->date_add->caption() ?></span></th>
<?php } ?>
<?php if ($alarm_basic->date_modified->Visible) { // date_modified ?>
		<th class="<?php echo $alarm_basic->date_modified->headerCellClass() ?>"><span id="elh_alarm_basic_date_modified" class="alarm_basic_date_modified"><?php echo $alarm_basic->date_modified->caption() ?></span></th>
<?php } ?>
<?php if ($alarm_basic->user_add->Visible) { // user_add ?>
		<th class="<?php echo $alarm_basic->user_add->headerCellClass() ?>"><span id="elh_alarm_basic_user_add" class="alarm_basic_user_add"><?php echo $alarm_basic->user_add->caption() ?></span></th>
<?php } ?>
<?php if ($alarm_basic->user_modified->Visible) { // user_modified ?>
		<th class="<?php echo $alarm_basic->user_modified->headerCellClass() ?>"><span id="elh_alarm_basic_user_modified" class="alarm_basic_user_modified"><?php echo $alarm_basic->user_modified->caption() ?></span></th>
<?php } ?>
<?php if ($alarm_basic->email_subject->Visible) { // email_subject ?>
		<th class="<?php echo $alarm_basic->email_subject->headerCellClass() ?>"><span id="elh_alarm_basic_email_subject" class="alarm_basic_email_subject"><?php echo $alarm_basic->email_subject->caption() ?></span></th>
<?php } ?>
<?php if ($alarm_basic->email_attach->Visible) { // email_attach ?>
		<th class="<?php echo $alarm_basic->email_attach->headerCellClass() ?>"><span id="elh_alarm_basic_email_attach" class="alarm_basic_email_attach"><?php echo $alarm_basic->email_attach->caption() ?></span></th>
<?php } ?>
<?php if ($alarm_basic->sms_num->Visible) { // sms_num ?>
		<th class="<?php echo $alarm_basic->sms_num->headerCellClass() ?>"><span id="elh_alarm_basic_sms_num" class="alarm_basic_sms_num"><?php echo $alarm_basic->sms_num->caption() ?></span></th>
<?php } ?>
<?php if ($alarm_basic->sms_body->Visible) { // sms_body ?>
		<th class="<?php echo $alarm_basic->sms_body->headerCellClass() ?>"><span id="elh_alarm_basic_sms_body" class="alarm_basic_sms_body"><?php echo $alarm_basic->sms_body->caption() ?></span></th>
<?php } ?>
<?php if ($alarm_basic->alarm_subscriber->Visible) { // alarm_subscriber ?>
		<th class="<?php echo $alarm_basic->alarm_subscriber->headerCellClass() ?>"><span id="elh_alarm_basic_alarm_subscriber" class="alarm_basic_alarm_subscriber"><?php echo $alarm_basic->alarm_subscriber->caption() ?></span></th>
<?php } ?>
<?php if ($alarm_basic->sms_active->Visible) { // sms_active ?>
		<th class="<?php echo $alarm_basic->sms_active->headerCellClass() ?>"><span id="elh_alarm_basic_sms_active" class="alarm_basic_sms_active"><?php echo $alarm_basic->sms_active->caption() ?></span></th>
<?php } ?>
<?php if ($alarm_basic->email_active->Visible) { // email_active ?>
		<th class="<?php echo $alarm_basic->email_active->headerCellClass() ?>"><span id="elh_alarm_basic_email_active" class="alarm_basic_email_active"><?php echo $alarm_basic->email_active->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$alarm_basic_delete->RecCnt = 0;
$i = 0;
while (!$alarm_basic_delete->Recordset->EOF) {
	$alarm_basic_delete->RecCnt++;
	$alarm_basic_delete->RowCnt++;

	// Set row properties
	$alarm_basic->resetAttributes();
	$alarm_basic->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$alarm_basic_delete->loadRowValues($alarm_basic_delete->Recordset);

	// Render row
	$alarm_basic_delete->renderRow();
?>
	<tr<?php echo $alarm_basic->rowAttributes() ?>>
<?php if ($alarm_basic->RTLindex->Visible) { // RTLindex ?>
		<td<?php echo $alarm_basic->RTLindex->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_delete->RowCnt ?>_alarm_basic_RTLindex" class="alarm_basic_RTLindex">
<span<?php echo $alarm_basic->RTLindex->viewAttributes() ?>>
<?php echo $alarm_basic->RTLindex->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($alarm_basic->sensor_id->Visible) { // sensor_id ?>
		<td<?php echo $alarm_basic->sensor_id->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_delete->RowCnt ?>_alarm_basic_sensor_id" class="alarm_basic_sensor_id">
<span<?php echo $alarm_basic->sensor_id->viewAttributes() ?>>
<?php echo $alarm_basic->sensor_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($alarm_basic->value_max->Visible) { // value_max ?>
		<td<?php echo $alarm_basic->value_max->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_delete->RowCnt ?>_alarm_basic_value_max" class="alarm_basic_value_max">
<span<?php echo $alarm_basic->value_max->viewAttributes() ?>>
<?php echo $alarm_basic->value_max->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($alarm_basic->value_min->Visible) { // value_min ?>
		<td<?php echo $alarm_basic->value_min->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_delete->RowCnt ?>_alarm_basic_value_min" class="alarm_basic_value_min">
<span<?php echo $alarm_basic->value_min->viewAttributes() ?>>
<?php echo $alarm_basic->value_min->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($alarm_basic->delaytime->Visible) { // delaytime ?>
		<td<?php echo $alarm_basic->delaytime->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_delete->RowCnt ?>_alarm_basic_delaytime" class="alarm_basic_delaytime">
<span<?php echo $alarm_basic->delaytime->viewAttributes() ?>>
<?php echo $alarm_basic->delaytime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($alarm_basic->date_add->Visible) { // date_add ?>
		<td<?php echo $alarm_basic->date_add->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_delete->RowCnt ?>_alarm_basic_date_add" class="alarm_basic_date_add">
<span<?php echo $alarm_basic->date_add->viewAttributes() ?>>
<?php echo $alarm_basic->date_add->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($alarm_basic->date_modified->Visible) { // date_modified ?>
		<td<?php echo $alarm_basic->date_modified->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_delete->RowCnt ?>_alarm_basic_date_modified" class="alarm_basic_date_modified">
<span<?php echo $alarm_basic->date_modified->viewAttributes() ?>>
<?php echo $alarm_basic->date_modified->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($alarm_basic->user_add->Visible) { // user_add ?>
		<td<?php echo $alarm_basic->user_add->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_delete->RowCnt ?>_alarm_basic_user_add" class="alarm_basic_user_add">
<span<?php echo $alarm_basic->user_add->viewAttributes() ?>>
<?php echo $alarm_basic->user_add->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($alarm_basic->user_modified->Visible) { // user_modified ?>
		<td<?php echo $alarm_basic->user_modified->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_delete->RowCnt ?>_alarm_basic_user_modified" class="alarm_basic_user_modified">
<span<?php echo $alarm_basic->user_modified->viewAttributes() ?>>
<?php echo $alarm_basic->user_modified->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($alarm_basic->email_subject->Visible) { // email_subject ?>
		<td<?php echo $alarm_basic->email_subject->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_delete->RowCnt ?>_alarm_basic_email_subject" class="alarm_basic_email_subject">
<span<?php echo $alarm_basic->email_subject->viewAttributes() ?>>
<?php echo $alarm_basic->email_subject->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($alarm_basic->email_attach->Visible) { // email_attach ?>
		<td<?php echo $alarm_basic->email_attach->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_delete->RowCnt ?>_alarm_basic_email_attach" class="alarm_basic_email_attach">
<span<?php echo $alarm_basic->email_attach->viewAttributes() ?>>
<?php echo $alarm_basic->email_attach->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($alarm_basic->sms_num->Visible) { // sms_num ?>
		<td<?php echo $alarm_basic->sms_num->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_delete->RowCnt ?>_alarm_basic_sms_num" class="alarm_basic_sms_num">
<span<?php echo $alarm_basic->sms_num->viewAttributes() ?>>
<?php echo $alarm_basic->sms_num->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($alarm_basic->sms_body->Visible) { // sms_body ?>
		<td<?php echo $alarm_basic->sms_body->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_delete->RowCnt ?>_alarm_basic_sms_body" class="alarm_basic_sms_body">
<span<?php echo $alarm_basic->sms_body->viewAttributes() ?>>
<?php echo $alarm_basic->sms_body->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($alarm_basic->alarm_subscriber->Visible) { // alarm_subscriber ?>
		<td<?php echo $alarm_basic->alarm_subscriber->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_delete->RowCnt ?>_alarm_basic_alarm_subscriber" class="alarm_basic_alarm_subscriber">
<span<?php echo $alarm_basic->alarm_subscriber->viewAttributes() ?>>
<?php echo $alarm_basic->alarm_subscriber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($alarm_basic->sms_active->Visible) { // sms_active ?>
		<td<?php echo $alarm_basic->sms_active->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_delete->RowCnt ?>_alarm_basic_sms_active" class="alarm_basic_sms_active">
<span<?php echo $alarm_basic->sms_active->viewAttributes() ?>>
<?php echo $alarm_basic->sms_active->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($alarm_basic->email_active->Visible) { // email_active ?>
		<td<?php echo $alarm_basic->email_active->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_delete->RowCnt ?>_alarm_basic_email_active" class="alarm_basic_email_active">
<span<?php echo $alarm_basic->email_active->viewAttributes() ?>>
<?php echo $alarm_basic->email_active->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$alarm_basic_delete->Recordset->moveNext();
}
$alarm_basic_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $alarm_basic_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$alarm_basic_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$alarm_basic_delete->terminate();
?>
