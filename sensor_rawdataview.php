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
$sensor_rawdata_view = new sensor_rawdata_view();

// Run the page
$sensor_rawdata_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sensor_rawdata_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$sensor_rawdata->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fsensor_rawdataview = currentForm = new ew.Form("fsensor_rawdataview", "view");

// Form_CustomValidate event
fsensor_rawdataview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsensor_rawdataview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$sensor_rawdata->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $sensor_rawdata_view->ExportOptions->render("body") ?>
<?php
	foreach ($sensor_rawdata_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $sensor_rawdata_view->showPageHeader(); ?>
<?php
$sensor_rawdata_view->showMessage();
?>
<form name="fsensor_rawdataview" id="fsensor_rawdataview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sensor_rawdata_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sensor_rawdata_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sensor_rawdata">
<input type="hidden" name="modal" value="<?php echo (int)$sensor_rawdata_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($sensor_rawdata->RTLindex->Visible) { // RTLindex ?>
	<tr id="r_RTLindex">
		<td class="<?php echo $sensor_rawdata_view->TableLeftColumnClass ?>"><span id="elh_sensor_rawdata_RTLindex"><?php echo $sensor_rawdata->RTLindex->caption() ?></span></td>
		<td data-name="RTLindex"<?php echo $sensor_rawdata->RTLindex->cellAttributes() ?>>
<span id="el_sensor_rawdata_RTLindex">
<span<?php echo $sensor_rawdata->RTLindex->viewAttributes() ?>>
<?php echo $sensor_rawdata->RTLindex->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sensor_rawdata->imei->Visible) { // imei ?>
	<tr id="r_imei">
		<td class="<?php echo $sensor_rawdata_view->TableLeftColumnClass ?>"><span id="elh_sensor_rawdata_imei"><?php echo $sensor_rawdata->imei->caption() ?></span></td>
		<td data-name="imei"<?php echo $sensor_rawdata->imei->cellAttributes() ?>>
<span id="el_sensor_rawdata_imei">
<span<?php echo $sensor_rawdata->imei->viewAttributes() ?>>
<?php echo $sensor_rawdata->imei->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sensor_rawdata->GPS_lat->Visible) { // GPS_lat ?>
	<tr id="r_GPS_lat">
		<td class="<?php echo $sensor_rawdata_view->TableLeftColumnClass ?>"><span id="elh_sensor_rawdata_GPS_lat"><?php echo $sensor_rawdata->GPS_lat->caption() ?></span></td>
		<td data-name="GPS_lat"<?php echo $sensor_rawdata->GPS_lat->cellAttributes() ?>>
<span id="el_sensor_rawdata_GPS_lat">
<span<?php echo $sensor_rawdata->GPS_lat->viewAttributes() ?>>
<?php echo $sensor_rawdata->GPS_lat->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sensor_rawdata->GPS_lon->Visible) { // GPS_lon ?>
	<tr id="r_GPS_lon">
		<td class="<?php echo $sensor_rawdata_view->TableLeftColumnClass ?>"><span id="elh_sensor_rawdata_GPS_lon"><?php echo $sensor_rawdata->GPS_lon->caption() ?></span></td>
		<td data-name="GPS_lon"<?php echo $sensor_rawdata->GPS_lon->cellAttributes() ?>>
<span id="el_sensor_rawdata_GPS_lon">
<span<?php echo $sensor_rawdata->GPS_lon->viewAttributes() ?>>
<?php echo $sensor_rawdata->GPS_lon->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sensor_rawdata->timezone->Visible) { // timezone ?>
	<tr id="r_timezone">
		<td class="<?php echo $sensor_rawdata_view->TableLeftColumnClass ?>"><span id="elh_sensor_rawdata_timezone"><?php echo $sensor_rawdata->timezone->caption() ?></span></td>
		<td data-name="timezone"<?php echo $sensor_rawdata->timezone->cellAttributes() ?>>
<span id="el_sensor_rawdata_timezone">
<span<?php echo $sensor_rawdata->timezone->viewAttributes() ?>>
<?php echo $sensor_rawdata->timezone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sensor_rawdata->sensor_id->Visible) { // sensor_id ?>
	<tr id="r_sensor_id">
		<td class="<?php echo $sensor_rawdata_view->TableLeftColumnClass ?>"><span id="elh_sensor_rawdata_sensor_id"><?php echo $sensor_rawdata->sensor_id->caption() ?></span></td>
		<td data-name="sensor_id"<?php echo $sensor_rawdata->sensor_id->cellAttributes() ?>>
<span id="el_sensor_rawdata_sensor_id">
<span<?php echo $sensor_rawdata->sensor_id->viewAttributes() ?>>
<?php echo $sensor_rawdata->sensor_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sensor_rawdata->sensor_value->Visible) { // sensor_value ?>
	<tr id="r_sensor_value">
		<td class="<?php echo $sensor_rawdata_view->TableLeftColumnClass ?>"><span id="elh_sensor_rawdata_sensor_value"><?php echo $sensor_rawdata->sensor_value->caption() ?></span></td>
		<td data-name="sensor_value"<?php echo $sensor_rawdata->sensor_value->cellAttributes() ?>>
<span id="el_sensor_rawdata_sensor_value">
<span<?php echo $sensor_rawdata->sensor_value->viewAttributes() ?>>
<?php echo $sensor_rawdata->sensor_value->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sensor_rawdata->sensor_unit->Visible) { // sensor_unit ?>
	<tr id="r_sensor_unit">
		<td class="<?php echo $sensor_rawdata_view->TableLeftColumnClass ?>"><span id="elh_sensor_rawdata_sensor_unit"><?php echo $sensor_rawdata->sensor_unit->caption() ?></span></td>
		<td data-name="sensor_unit"<?php echo $sensor_rawdata->sensor_unit->cellAttributes() ?>>
<span id="el_sensor_rawdata_sensor_unit">
<span<?php echo $sensor_rawdata->sensor_unit->viewAttributes() ?>>
<?php echo $sensor_rawdata->sensor_unit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sensor_rawdata->date_add->Visible) { // date_add ?>
	<tr id="r_date_add">
		<td class="<?php echo $sensor_rawdata_view->TableLeftColumnClass ?>"><span id="elh_sensor_rawdata_date_add"><?php echo $sensor_rawdata->date_add->caption() ?></span></td>
		<td data-name="date_add"<?php echo $sensor_rawdata->date_add->cellAttributes() ?>>
<span id="el_sensor_rawdata_date_add">
<span<?php echo $sensor_rawdata->date_add->viewAttributes() ?>>
<?php echo $sensor_rawdata->date_add->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sensor_rawdata->blockn->Visible) { // blockn ?>
	<tr id="r_blockn">
		<td class="<?php echo $sensor_rawdata_view->TableLeftColumnClass ?>"><span id="elh_sensor_rawdata_blockn"><?php echo $sensor_rawdata->blockn->caption() ?></span></td>
		<td data-name="blockn"<?php echo $sensor_rawdata->blockn->cellAttributes() ?>>
<span id="el_sensor_rawdata_blockn">
<span<?php echo $sensor_rawdata->blockn->viewAttributes() ?>>
<?php echo $sensor_rawdata->blockn->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sensor_rawdata->BlockDetail->Visible) { // BlockDetail ?>
	<tr id="r_BlockDetail">
		<td class="<?php echo $sensor_rawdata_view->TableLeftColumnClass ?>"><span id="elh_sensor_rawdata_BlockDetail"><?php echo $sensor_rawdata->BlockDetail->caption() ?></span></td>
		<td data-name="BlockDetail"<?php echo $sensor_rawdata->BlockDetail->cellAttributes() ?>>
<span id="el_sensor_rawdata_BlockDetail">
<span<?php echo $sensor_rawdata->BlockDetail->viewAttributes() ?>>
<?php echo $sensor_rawdata->BlockDetail->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$sensor_rawdata_view->IsModal) { ?>
<?php if (!$sensor_rawdata->isExport()) { ?>
<?php if (!isset($sensor_rawdata_view->Pager)) $sensor_rawdata_view->Pager = new PrevNextPager($sensor_rawdata_view->StartRec, $sensor_rawdata_view->DisplayRecs, $sensor_rawdata_view->TotalRecs, $sensor_rawdata_view->AutoHidePager) ?>
<?php if ($sensor_rawdata_view->Pager->RecordCount > 0 && $sensor_rawdata_view->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($sensor_rawdata_view->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $sensor_rawdata_view->pageUrl() ?>start=<?php echo $sensor_rawdata_view->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($sensor_rawdata_view->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $sensor_rawdata_view->pageUrl() ?>start=<?php echo $sensor_rawdata_view->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $sensor_rawdata_view->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($sensor_rawdata_view->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $sensor_rawdata_view->pageUrl() ?>start=<?php echo $sensor_rawdata_view->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($sensor_rawdata_view->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $sensor_rawdata_view->pageUrl() ?>start=<?php echo $sensor_rawdata_view->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $sensor_rawdata_view->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$sensor_rawdata_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$sensor_rawdata->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$sensor_rawdata_view->terminate();
?>
