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
$esbc_chainstatus_view = new esbc_chainstatus_view();

// Run the page
$esbc_chainstatus_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_chainstatus_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$esbc_chainstatus->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fesbc_chainstatusview = currentForm = new ew.Form("fesbc_chainstatusview", "view");

// Form_CustomValidate event
fesbc_chainstatusview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_chainstatusview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$esbc_chainstatus->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $esbc_chainstatus_view->ExportOptions->render("body") ?>
<?php
	foreach ($esbc_chainstatus_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $esbc_chainstatus_view->showPageHeader(); ?>
<?php
$esbc_chainstatus_view->showMessage();
?>
<form name="fesbc_chainstatusview" id="fesbc_chainstatusview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_chainstatus_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_chainstatus_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_chainstatus">
<input type="hidden" name="modal" value="<?php echo (int)$esbc_chainstatus_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($esbc_chainstatus->BlockN->Visible) { // BlockN ?>
	<tr id="r_BlockN">
		<td class="<?php echo $esbc_chainstatus_view->TableLeftColumnClass ?>"><span id="elh_esbc_chainstatus_BlockN"><?php echo $esbc_chainstatus->BlockN->caption() ?></span></td>
		<td data-name="BlockN"<?php echo $esbc_chainstatus->BlockN->cellAttributes() ?>>
<span id="el_esbc_chainstatus_BlockN">
<span<?php echo $esbc_chainstatus->BlockN->viewAttributes() ?>>
<?php echo $esbc_chainstatus->BlockN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_chainstatus->BlockHash->Visible) { // BlockHash ?>
	<tr id="r_BlockHash">
		<td class="<?php echo $esbc_chainstatus_view->TableLeftColumnClass ?>"><span id="elh_esbc_chainstatus_BlockHash"><?php echo $esbc_chainstatus->BlockHash->caption() ?></span></td>
		<td data-name="BlockHash"<?php echo $esbc_chainstatus->BlockHash->cellAttributes() ?>>
<span id="el_esbc_chainstatus_BlockHash">
<span<?php echo $esbc_chainstatus->BlockHash->viewAttributes() ?>>
<?php echo $esbc_chainstatus->BlockHash->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_chainstatus->Difficulty->Visible) { // Difficulty ?>
	<tr id="r_Difficulty">
		<td class="<?php echo $esbc_chainstatus_view->TableLeftColumnClass ?>"><span id="elh_esbc_chainstatus_Difficulty"><?php echo $esbc_chainstatus->Difficulty->caption() ?></span></td>
		<td data-name="Difficulty"<?php echo $esbc_chainstatus->Difficulty->cellAttributes() ?>>
<span id="el_esbc_chainstatus_Difficulty">
<span<?php echo $esbc_chainstatus->Difficulty->viewAttributes() ?>>
<?php echo $esbc_chainstatus->Difficulty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_chainstatus->Size->Visible) { // Size ?>
	<tr id="r_Size">
		<td class="<?php echo $esbc_chainstatus_view->TableLeftColumnClass ?>"><span id="elh_esbc_chainstatus_Size"><?php echo $esbc_chainstatus->Size->caption() ?></span></td>
		<td data-name="Size"<?php echo $esbc_chainstatus->Size->cellAttributes() ?>>
<span id="el_esbc_chainstatus_Size">
<span<?php echo $esbc_chainstatus->Size->viewAttributes() ?>>
<?php echo $esbc_chainstatus->Size->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_chainstatus->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $esbc_chainstatus_view->TableLeftColumnClass ?>"><span id="elh_esbc_chainstatus_Age"><?php echo $esbc_chainstatus->Age->caption() ?></span></td>
		<td data-name="Age"<?php echo $esbc_chainstatus->Age->cellAttributes() ?>>
<span id="el_esbc_chainstatus_Age">
<span<?php echo $esbc_chainstatus->Age->viewAttributes() ?>>
<?php echo $esbc_chainstatus->Age->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_chainstatus->BlockDetail->Visible) { // BlockDetail ?>
	<tr id="r_BlockDetail">
		<td class="<?php echo $esbc_chainstatus_view->TableLeftColumnClass ?>"><span id="elh_esbc_chainstatus_BlockDetail"><?php echo $esbc_chainstatus->BlockDetail->caption() ?></span></td>
		<td data-name="BlockDetail"<?php echo $esbc_chainstatus->BlockDetail->cellAttributes() ?>>
<span id="el_esbc_chainstatus_BlockDetail">
<span<?php echo $esbc_chainstatus->BlockDetail->viewAttributes() ?>>
<?php echo $esbc_chainstatus->BlockDetail->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_chainstatus->TXs->Visible) { // TXs ?>
	<tr id="r_TXs">
		<td class="<?php echo $esbc_chainstatus_view->TableLeftColumnClass ?>"><span id="elh_esbc_chainstatus_TXs"><?php echo $esbc_chainstatus->TXs->caption() ?></span></td>
		<td data-name="TXs"<?php echo $esbc_chainstatus->TXs->cellAttributes() ?>>
<span id="el_esbc_chainstatus_TXs">
<span<?php echo $esbc_chainstatus->TXs->viewAttributes() ?>>
<?php echo $esbc_chainstatus->TXs->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_chainstatus->GasUsed->Visible) { // GasUsed ?>
	<tr id="r_GasUsed">
		<td class="<?php echo $esbc_chainstatus_view->TableLeftColumnClass ?>"><span id="elh_esbc_chainstatus_GasUsed"><?php echo $esbc_chainstatus->GasUsed->caption() ?></span></td>
		<td data-name="GasUsed"<?php echo $esbc_chainstatus->GasUsed->cellAttributes() ?>>
<span id="el_esbc_chainstatus_GasUsed">
<span<?php echo $esbc_chainstatus->GasUsed->viewAttributes() ?>>
<?php echo $esbc_chainstatus->GasUsed->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_chainstatus->TXDetail->Visible) { // TXDetail ?>
	<tr id="r_TXDetail">
		<td class="<?php echo $esbc_chainstatus_view->TableLeftColumnClass ?>"><span id="elh_esbc_chainstatus_TXDetail"><?php echo $esbc_chainstatus->TXDetail->caption() ?></span></td>
		<td data-name="TXDetail"<?php echo $esbc_chainstatus->TXDetail->cellAttributes() ?>>
<span id="el_esbc_chainstatus_TXDetail">
<span<?php echo $esbc_chainstatus->TXDetail->viewAttributes() ?>>
<?php echo $esbc_chainstatus->TXDetail->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$esbc_chainstatus_view->IsModal) { ?>
<?php if (!$esbc_chainstatus->isExport()) { ?>
<?php if (!isset($esbc_chainstatus_view->Pager)) $esbc_chainstatus_view->Pager = new PrevNextPager($esbc_chainstatus_view->StartRec, $esbc_chainstatus_view->DisplayRecs, $esbc_chainstatus_view->TotalRecs, $esbc_chainstatus_view->AutoHidePager) ?>
<?php if ($esbc_chainstatus_view->Pager->RecordCount > 0 && $esbc_chainstatus_view->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($esbc_chainstatus_view->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $esbc_chainstatus_view->pageUrl() ?>start=<?php echo $esbc_chainstatus_view->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($esbc_chainstatus_view->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $esbc_chainstatus_view->pageUrl() ?>start=<?php echo $esbc_chainstatus_view->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $esbc_chainstatus_view->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($esbc_chainstatus_view->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $esbc_chainstatus_view->pageUrl() ?>start=<?php echo $esbc_chainstatus_view->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($esbc_chainstatus_view->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $esbc_chainstatus_view->pageUrl() ?>start=<?php echo $esbc_chainstatus_view->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $esbc_chainstatus_view->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$esbc_chainstatus_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$esbc_chainstatus->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$esbc_chainstatus_view->terminate();
?>
