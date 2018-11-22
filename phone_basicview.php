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
$phone_basic_view = new phone_basic_view();

// Run the page
$phone_basic_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$phone_basic_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$phone_basic->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fphone_basicview = currentForm = new ew.Form("fphone_basicview", "view");

// Form_CustomValidate event
fphone_basicview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fphone_basicview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$phone_basic->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $phone_basic_view->ExportOptions->render("body") ?>
<?php
	foreach ($phone_basic_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $phone_basic_view->showPageHeader(); ?>
<?php
$phone_basic_view->showMessage();
?>
<form name="fphone_basicview" id="fphone_basicview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($phone_basic_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $phone_basic_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="phone_basic">
<input type="hidden" name="modal" value="<?php echo (int)$phone_basic_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($phone_basic->imei->Visible) { // imei ?>
	<tr id="r_imei">
		<td class="<?php echo $phone_basic_view->TableLeftColumnClass ?>"><span id="elh_phone_basic_imei"><?php echo $phone_basic->imei->caption() ?></span></td>
		<td data-name="imei"<?php echo $phone_basic->imei->cellAttributes() ?>>
<span id="el_phone_basic_imei">
<span<?php echo $phone_basic->imei->viewAttributes() ?>>
<?php echo $phone_basic->imei->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($phone_basic->phone_name->Visible) { // phone_name ?>
	<tr id="r_phone_name">
		<td class="<?php echo $phone_basic_view->TableLeftColumnClass ?>"><span id="elh_phone_basic_phone_name"><?php echo $phone_basic->phone_name->caption() ?></span></td>
		<td data-name="phone_name"<?php echo $phone_basic->phone_name->cellAttributes() ?>>
<span id="el_phone_basic_phone_name">
<span<?php echo $phone_basic->phone_name->viewAttributes() ?>>
<?php echo $phone_basic->phone_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($phone_basic->date_add->Visible) { // date_add ?>
	<tr id="r_date_add">
		<td class="<?php echo $phone_basic_view->TableLeftColumnClass ?>"><span id="elh_phone_basic_date_add"><?php echo $phone_basic->date_add->caption() ?></span></td>
		<td data-name="date_add"<?php echo $phone_basic->date_add->cellAttributes() ?>>
<span id="el_phone_basic_date_add">
<span<?php echo $phone_basic->date_add->viewAttributes() ?>>
<?php echo $phone_basic->date_add->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($phone_basic->app_version->Visible) { // app_version ?>
	<tr id="r_app_version">
		<td class="<?php echo $phone_basic_view->TableLeftColumnClass ?>"><span id="elh_phone_basic_app_version"><?php echo $phone_basic->app_version->caption() ?></span></td>
		<td data-name="app_version"<?php echo $phone_basic->app_version->cellAttributes() ?>>
<span id="el_phone_basic_app_version">
<span<?php echo $phone_basic->app_version->viewAttributes() ?>>
<?php echo $phone_basic->app_version->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($phone_basic->phone_num->Visible) { // phone_num ?>
	<tr id="r_phone_num">
		<td class="<?php echo $phone_basic_view->TableLeftColumnClass ?>"><span id="elh_phone_basic_phone_num"><?php echo $phone_basic->phone_num->caption() ?></span></td>
		<td data-name="phone_num"<?php echo $phone_basic->phone_num->cellAttributes() ?>>
<span id="el_phone_basic_phone_num">
<span<?php echo $phone_basic->phone_num->viewAttributes() ?>>
<?php echo $phone_basic->phone_num->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($phone_basic->phone_wifi_mac->Visible) { // phone_wifi_mac ?>
	<tr id="r_phone_wifi_mac">
		<td class="<?php echo $phone_basic_view->TableLeftColumnClass ?>"><span id="elh_phone_basic_phone_wifi_mac"><?php echo $phone_basic->phone_wifi_mac->caption() ?></span></td>
		<td data-name="phone_wifi_mac"<?php echo $phone_basic->phone_wifi_mac->cellAttributes() ?>>
<span id="el_phone_basic_phone_wifi_mac">
<span<?php echo $phone_basic->phone_wifi_mac->viewAttributes() ?>>
<?php echo $phone_basic->phone_wifi_mac->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($phone_basic->active->Visible) { // active ?>
	<tr id="r_active">
		<td class="<?php echo $phone_basic_view->TableLeftColumnClass ?>"><span id="elh_phone_basic_active"><?php echo $phone_basic->active->caption() ?></span></td>
		<td data-name="active"<?php echo $phone_basic->active->cellAttributes() ?>>
<span id="el_phone_basic_active">
<span<?php echo $phone_basic->active->viewAttributes() ?>>
<?php echo $phone_basic->active->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($phone_basic->app_name->Visible) { // app_name ?>
	<tr id="r_app_name">
		<td class="<?php echo $phone_basic_view->TableLeftColumnClass ?>"><span id="elh_phone_basic_app_name"><?php echo $phone_basic->app_name->caption() ?></span></td>
		<td data-name="app_name"<?php echo $phone_basic->app_name->cellAttributes() ?>>
<span id="el_phone_basic_app_name">
<span<?php echo $phone_basic->app_name->viewAttributes() ?>>
<?php echo $phone_basic->app_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($phone_basic->RTLindex->Visible) { // RTLindex ?>
	<tr id="r_RTLindex">
		<td class="<?php echo $phone_basic_view->TableLeftColumnClass ?>"><span id="elh_phone_basic_RTLindex"><?php echo $phone_basic->RTLindex->caption() ?></span></td>
		<td data-name="RTLindex"<?php echo $phone_basic->RTLindex->cellAttributes() ?>>
<span id="el_phone_basic_RTLindex">
<span<?php echo $phone_basic->RTLindex->viewAttributes() ?>>
<?php echo $phone_basic->RTLindex->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$phone_basic_view->IsModal) { ?>
<?php if (!$phone_basic->isExport()) { ?>
<?php if (!isset($phone_basic_view->Pager)) $phone_basic_view->Pager = new PrevNextPager($phone_basic_view->StartRec, $phone_basic_view->DisplayRecs, $phone_basic_view->TotalRecs, $phone_basic_view->AutoHidePager) ?>
<?php if ($phone_basic_view->Pager->RecordCount > 0 && $phone_basic_view->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($phone_basic_view->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $phone_basic_view->pageUrl() ?>start=<?php echo $phone_basic_view->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($phone_basic_view->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $phone_basic_view->pageUrl() ?>start=<?php echo $phone_basic_view->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $phone_basic_view->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($phone_basic_view->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $phone_basic_view->pageUrl() ?>start=<?php echo $phone_basic_view->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($phone_basic_view->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $phone_basic_view->pageUrl() ?>start=<?php echo $phone_basic_view->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $phone_basic_view->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$phone_basic_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$phone_basic->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$phone_basic_view->terminate();
?>
