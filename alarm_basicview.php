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
$alarm_basic_view = new alarm_basic_view();

// Run the page
$alarm_basic_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$alarm_basic_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$alarm_basic->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var falarm_basicview = currentForm = new ew.Form("falarm_basicview", "view");

// Form_CustomValidate event
falarm_basicview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
falarm_basicview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$alarm_basic->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $alarm_basic_view->ExportOptions->render("body") ?>
<?php
	foreach ($alarm_basic_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $alarm_basic_view->showPageHeader(); ?>
<?php
$alarm_basic_view->showMessage();
?>
<form name="falarm_basicview" id="falarm_basicview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($alarm_basic_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $alarm_basic_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="alarm_basic">
<input type="hidden" name="modal" value="<?php echo (int)$alarm_basic_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($alarm_basic->RTLindex->Visible) { // RTLindex ?>
	<tr id="r_RTLindex">
		<td class="<?php echo $alarm_basic_view->TableLeftColumnClass ?>"><span id="elh_alarm_basic_RTLindex"><?php echo $alarm_basic->RTLindex->caption() ?></span></td>
		<td data-name="RTLindex"<?php echo $alarm_basic->RTLindex->cellAttributes() ?>>
<span id="el_alarm_basic_RTLindex">
<span<?php echo $alarm_basic->RTLindex->viewAttributes() ?>>
<?php echo $alarm_basic->RTLindex->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($alarm_basic->sensor_id->Visible) { // sensor_id ?>
	<tr id="r_sensor_id">
		<td class="<?php echo $alarm_basic_view->TableLeftColumnClass ?>"><span id="elh_alarm_basic_sensor_id"><?php echo $alarm_basic->sensor_id->caption() ?></span></td>
		<td data-name="sensor_id"<?php echo $alarm_basic->sensor_id->cellAttributes() ?>>
<span id="el_alarm_basic_sensor_id">
<span<?php echo $alarm_basic->sensor_id->viewAttributes() ?>>
<?php echo $alarm_basic->sensor_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($alarm_basic->value_max->Visible) { // value_max ?>
	<tr id="r_value_max">
		<td class="<?php echo $alarm_basic_view->TableLeftColumnClass ?>"><span id="elh_alarm_basic_value_max"><?php echo $alarm_basic->value_max->caption() ?></span></td>
		<td data-name="value_max"<?php echo $alarm_basic->value_max->cellAttributes() ?>>
<span id="el_alarm_basic_value_max">
<span<?php echo $alarm_basic->value_max->viewAttributes() ?>>
<?php echo $alarm_basic->value_max->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($alarm_basic->value_min->Visible) { // value_min ?>
	<tr id="r_value_min">
		<td class="<?php echo $alarm_basic_view->TableLeftColumnClass ?>"><span id="elh_alarm_basic_value_min"><?php echo $alarm_basic->value_min->caption() ?></span></td>
		<td data-name="value_min"<?php echo $alarm_basic->value_min->cellAttributes() ?>>
<span id="el_alarm_basic_value_min">
<span<?php echo $alarm_basic->value_min->viewAttributes() ?>>
<?php echo $alarm_basic->value_min->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($alarm_basic->delaytime->Visible) { // delaytime ?>
	<tr id="r_delaytime">
		<td class="<?php echo $alarm_basic_view->TableLeftColumnClass ?>"><span id="elh_alarm_basic_delaytime"><?php echo $alarm_basic->delaytime->caption() ?></span></td>
		<td data-name="delaytime"<?php echo $alarm_basic->delaytime->cellAttributes() ?>>
<span id="el_alarm_basic_delaytime">
<span<?php echo $alarm_basic->delaytime->viewAttributes() ?>>
<?php echo $alarm_basic->delaytime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($alarm_basic->date_add->Visible) { // date_add ?>
	<tr id="r_date_add">
		<td class="<?php echo $alarm_basic_view->TableLeftColumnClass ?>"><span id="elh_alarm_basic_date_add"><?php echo $alarm_basic->date_add->caption() ?></span></td>
		<td data-name="date_add"<?php echo $alarm_basic->date_add->cellAttributes() ?>>
<span id="el_alarm_basic_date_add">
<span<?php echo $alarm_basic->date_add->viewAttributes() ?>>
<?php echo $alarm_basic->date_add->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($alarm_basic->date_modified->Visible) { // date_modified ?>
	<tr id="r_date_modified">
		<td class="<?php echo $alarm_basic_view->TableLeftColumnClass ?>"><span id="elh_alarm_basic_date_modified"><?php echo $alarm_basic->date_modified->caption() ?></span></td>
		<td data-name="date_modified"<?php echo $alarm_basic->date_modified->cellAttributes() ?>>
<span id="el_alarm_basic_date_modified">
<span<?php echo $alarm_basic->date_modified->viewAttributes() ?>>
<?php echo $alarm_basic->date_modified->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($alarm_basic->user_add->Visible) { // user_add ?>
	<tr id="r_user_add">
		<td class="<?php echo $alarm_basic_view->TableLeftColumnClass ?>"><span id="elh_alarm_basic_user_add"><?php echo $alarm_basic->user_add->caption() ?></span></td>
		<td data-name="user_add"<?php echo $alarm_basic->user_add->cellAttributes() ?>>
<span id="el_alarm_basic_user_add">
<span<?php echo $alarm_basic->user_add->viewAttributes() ?>>
<?php echo $alarm_basic->user_add->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($alarm_basic->user_modified->Visible) { // user_modified ?>
	<tr id="r_user_modified">
		<td class="<?php echo $alarm_basic_view->TableLeftColumnClass ?>"><span id="elh_alarm_basic_user_modified"><?php echo $alarm_basic->user_modified->caption() ?></span></td>
		<td data-name="user_modified"<?php echo $alarm_basic->user_modified->cellAttributes() ?>>
<span id="el_alarm_basic_user_modified">
<span<?php echo $alarm_basic->user_modified->viewAttributes() ?>>
<?php echo $alarm_basic->user_modified->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($alarm_basic->email_receipt->Visible) { // email_receipt ?>
	<tr id="r_email_receipt">
		<td class="<?php echo $alarm_basic_view->TableLeftColumnClass ?>"><span id="elh_alarm_basic_email_receipt"><?php echo $alarm_basic->email_receipt->caption() ?></span></td>
		<td data-name="email_receipt"<?php echo $alarm_basic->email_receipt->cellAttributes() ?>>
<span id="el_alarm_basic_email_receipt">
<span<?php echo $alarm_basic->email_receipt->viewAttributes() ?>>
<?php echo $alarm_basic->email_receipt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($alarm_basic->email_subject->Visible) { // email_subject ?>
	<tr id="r_email_subject">
		<td class="<?php echo $alarm_basic_view->TableLeftColumnClass ?>"><span id="elh_alarm_basic_email_subject"><?php echo $alarm_basic->email_subject->caption() ?></span></td>
		<td data-name="email_subject"<?php echo $alarm_basic->email_subject->cellAttributes() ?>>
<span id="el_alarm_basic_email_subject">
<span<?php echo $alarm_basic->email_subject->viewAttributes() ?>>
<?php echo $alarm_basic->email_subject->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($alarm_basic->email_body->Visible) { // email_body ?>
	<tr id="r_email_body">
		<td class="<?php echo $alarm_basic_view->TableLeftColumnClass ?>"><span id="elh_alarm_basic_email_body"><?php echo $alarm_basic->email_body->caption() ?></span></td>
		<td data-name="email_body"<?php echo $alarm_basic->email_body->cellAttributes() ?>>
<span id="el_alarm_basic_email_body">
<span<?php echo $alarm_basic->email_body->viewAttributes() ?>>
<?php echo $alarm_basic->email_body->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($alarm_basic->email_attach->Visible) { // email_attach ?>
	<tr id="r_email_attach">
		<td class="<?php echo $alarm_basic_view->TableLeftColumnClass ?>"><span id="elh_alarm_basic_email_attach"><?php echo $alarm_basic->email_attach->caption() ?></span></td>
		<td data-name="email_attach"<?php echo $alarm_basic->email_attach->cellAttributes() ?>>
<span id="el_alarm_basic_email_attach">
<span<?php echo $alarm_basic->email_attach->viewAttributes() ?>>
<?php echo $alarm_basic->email_attach->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($alarm_basic->sms_num->Visible) { // sms_num ?>
	<tr id="r_sms_num">
		<td class="<?php echo $alarm_basic_view->TableLeftColumnClass ?>"><span id="elh_alarm_basic_sms_num"><?php echo $alarm_basic->sms_num->caption() ?></span></td>
		<td data-name="sms_num"<?php echo $alarm_basic->sms_num->cellAttributes() ?>>
<span id="el_alarm_basic_sms_num">
<span<?php echo $alarm_basic->sms_num->viewAttributes() ?>>
<?php echo $alarm_basic->sms_num->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($alarm_basic->sms_body->Visible) { // sms_body ?>
	<tr id="r_sms_body">
		<td class="<?php echo $alarm_basic_view->TableLeftColumnClass ?>"><span id="elh_alarm_basic_sms_body"><?php echo $alarm_basic->sms_body->caption() ?></span></td>
		<td data-name="sms_body"<?php echo $alarm_basic->sms_body->cellAttributes() ?>>
<span id="el_alarm_basic_sms_body">
<span<?php echo $alarm_basic->sms_body->viewAttributes() ?>>
<?php echo $alarm_basic->sms_body->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($alarm_basic->alarm_subscriber->Visible) { // alarm_subscriber ?>
	<tr id="r_alarm_subscriber">
		<td class="<?php echo $alarm_basic_view->TableLeftColumnClass ?>"><span id="elh_alarm_basic_alarm_subscriber"><?php echo $alarm_basic->alarm_subscriber->caption() ?></span></td>
		<td data-name="alarm_subscriber"<?php echo $alarm_basic->alarm_subscriber->cellAttributes() ?>>
<span id="el_alarm_basic_alarm_subscriber">
<span<?php echo $alarm_basic->alarm_subscriber->viewAttributes() ?>>
<?php echo $alarm_basic->alarm_subscriber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($alarm_basic->sms_active->Visible) { // sms_active ?>
	<tr id="r_sms_active">
		<td class="<?php echo $alarm_basic_view->TableLeftColumnClass ?>"><span id="elh_alarm_basic_sms_active"><?php echo $alarm_basic->sms_active->caption() ?></span></td>
		<td data-name="sms_active"<?php echo $alarm_basic->sms_active->cellAttributes() ?>>
<span id="el_alarm_basic_sms_active">
<span<?php echo $alarm_basic->sms_active->viewAttributes() ?>>
<?php echo $alarm_basic->sms_active->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($alarm_basic->email_active->Visible) { // email_active ?>
	<tr id="r_email_active">
		<td class="<?php echo $alarm_basic_view->TableLeftColumnClass ?>"><span id="elh_alarm_basic_email_active"><?php echo $alarm_basic->email_active->caption() ?></span></td>
		<td data-name="email_active"<?php echo $alarm_basic->email_active->cellAttributes() ?>>
<span id="el_alarm_basic_email_active">
<span<?php echo $alarm_basic->email_active->viewAttributes() ?>>
<?php echo $alarm_basic->email_active->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$alarm_basic_view->IsModal) { ?>
<?php if (!$alarm_basic->isExport()) { ?>
<?php if (!isset($alarm_basic_view->Pager)) $alarm_basic_view->Pager = new PrevNextPager($alarm_basic_view->StartRec, $alarm_basic_view->DisplayRecs, $alarm_basic_view->TotalRecs, $alarm_basic_view->AutoHidePager) ?>
<?php if ($alarm_basic_view->Pager->RecordCount > 0 && $alarm_basic_view->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($alarm_basic_view->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $alarm_basic_view->pageUrl() ?>start=<?php echo $alarm_basic_view->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($alarm_basic_view->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $alarm_basic_view->pageUrl() ?>start=<?php echo $alarm_basic_view->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $alarm_basic_view->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($alarm_basic_view->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $alarm_basic_view->pageUrl() ?>start=<?php echo $alarm_basic_view->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($alarm_basic_view->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $alarm_basic_view->pageUrl() ?>start=<?php echo $alarm_basic_view->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $alarm_basic_view->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$alarm_basic_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$alarm_basic->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$alarm_basic_view->terminate();
?>
