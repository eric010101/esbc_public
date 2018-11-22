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
$sensor_basic_view = new sensor_basic_view();

// Run the page
$sensor_basic_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sensor_basic_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$sensor_basic->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fsensor_basicview = currentForm = new ew.Form("fsensor_basicview", "view");

// Form_CustomValidate event
fsensor_basicview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsensor_basicview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$sensor_basic->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $sensor_basic_view->ExportOptions->render("body") ?>
<?php
	foreach ($sensor_basic_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $sensor_basic_view->showPageHeader(); ?>
<?php
$sensor_basic_view->showMessage();
?>
<form name="fsensor_basicview" id="fsensor_basicview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sensor_basic_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sensor_basic_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sensor_basic">
<input type="hidden" name="modal" value="<?php echo (int)$sensor_basic_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($sensor_basic->RTLindex->Visible) { // RTLindex ?>
	<tr id="r_RTLindex">
		<td class="<?php echo $sensor_basic_view->TableLeftColumnClass ?>"><span id="elh_sensor_basic_RTLindex"><?php echo $sensor_basic->RTLindex->caption() ?></span></td>
		<td data-name="RTLindex"<?php echo $sensor_basic->RTLindex->cellAttributes() ?>>
<span id="el_sensor_basic_RTLindex">
<span<?php echo $sensor_basic->RTLindex->viewAttributes() ?>>
<?php echo $sensor_basic->RTLindex->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sensor_basic->sensor_id->Visible) { // sensor_id ?>
	<tr id="r_sensor_id">
		<td class="<?php echo $sensor_basic_view->TableLeftColumnClass ?>"><span id="elh_sensor_basic_sensor_id"><?php echo $sensor_basic->sensor_id->caption() ?></span></td>
		<td data-name="sensor_id"<?php echo $sensor_basic->sensor_id->cellAttributes() ?>>
<span id="el_sensor_basic_sensor_id">
<span<?php echo $sensor_basic->sensor_id->viewAttributes() ?>>
<?php echo $sensor_basic->sensor_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sensor_basic->beb_alias_name->Visible) { // beb_alias_name ?>
	<tr id="r_beb_alias_name">
		<td class="<?php echo $sensor_basic_view->TableLeftColumnClass ?>"><span id="elh_sensor_basic_beb_alias_name"><?php echo $sensor_basic->beb_alias_name->caption() ?></span></td>
		<td data-name="beb_alias_name"<?php echo $sensor_basic->beb_alias_name->cellAttributes() ?>>
<span id="el_sensor_basic_beb_alias_name">
<span<?php echo $sensor_basic->beb_alias_name->viewAttributes() ?>>
<?php echo $sensor_basic->beb_alias_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sensor_basic->active->Visible) { // active ?>
	<tr id="r_active">
		<td class="<?php echo $sensor_basic_view->TableLeftColumnClass ?>"><span id="elh_sensor_basic_active"><?php echo $sensor_basic->active->caption() ?></span></td>
		<td data-name="active"<?php echo $sensor_basic->active->cellAttributes() ?>>
<span id="el_sensor_basic_active">
<span<?php echo $sensor_basic->active->viewAttributes() ?>>
<?php echo $sensor_basic->active->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sensor_basic->date_add->Visible) { // date_add ?>
	<tr id="r_date_add">
		<td class="<?php echo $sensor_basic_view->TableLeftColumnClass ?>"><span id="elh_sensor_basic_date_add"><?php echo $sensor_basic->date_add->caption() ?></span></td>
		<td data-name="date_add"<?php echo $sensor_basic->date_add->cellAttributes() ?>>
<span id="el_sensor_basic_date_add">
<span<?php echo $sensor_basic->date_add->viewAttributes() ?>>
<?php echo $sensor_basic->date_add->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$sensor_basic_view->IsModal) { ?>
<?php if (!$sensor_basic->isExport()) { ?>
<?php if (!isset($sensor_basic_view->Pager)) $sensor_basic_view->Pager = new PrevNextPager($sensor_basic_view->StartRec, $sensor_basic_view->DisplayRecs, $sensor_basic_view->TotalRecs, $sensor_basic_view->AutoHidePager) ?>
<?php if ($sensor_basic_view->Pager->RecordCount > 0 && $sensor_basic_view->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($sensor_basic_view->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $sensor_basic_view->pageUrl() ?>start=<?php echo $sensor_basic_view->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($sensor_basic_view->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $sensor_basic_view->pageUrl() ?>start=<?php echo $sensor_basic_view->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $sensor_basic_view->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($sensor_basic_view->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $sensor_basic_view->pageUrl() ?>start=<?php echo $sensor_basic_view->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($sensor_basic_view->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $sensor_basic_view->pageUrl() ?>start=<?php echo $sensor_basic_view->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $sensor_basic_view->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$sensor_basic_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$sensor_basic->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$sensor_basic_view->terminate();
?>
