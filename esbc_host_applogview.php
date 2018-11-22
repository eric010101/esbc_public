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
$esbc_host_applog_view = new esbc_host_applog_view();

// Run the page
$esbc_host_applog_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_host_applog_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$esbc_host_applog->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fesbc_host_applogview = currentForm = new ew.Form("fesbc_host_applogview", "view");

// Form_CustomValidate event
fesbc_host_applogview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_host_applogview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fesbc_host_applogview.lists["x_ACTIVE"] = <?php echo $esbc_host_applog_view->ACTIVE->Lookup->toClientList() ?>;
fesbc_host_applogview.lists["x_ACTIVE"].options = <?php echo JsonEncode($esbc_host_applog_view->ACTIVE->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$esbc_host_applog->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $esbc_host_applog_view->ExportOptions->render("body") ?>
<?php
	foreach ($esbc_host_applog_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $esbc_host_applog_view->showPageHeader(); ?>
<?php
$esbc_host_applog_view->showMessage();
?>
<form name="fesbc_host_applogview" id="fesbc_host_applogview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_host_applog_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_host_applog_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_host_applog">
<input type="hidden" name="modal" value="<?php echo (int)$esbc_host_applog_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($esbc_host_applog->LOG_INDEX->Visible) { // LOG_INDEX ?>
	<tr id="r_LOG_INDEX">
		<td class="<?php echo $esbc_host_applog_view->TableLeftColumnClass ?>"><span id="elh_esbc_host_applog_LOG_INDEX"><?php echo $esbc_host_applog->LOG_INDEX->caption() ?></span></td>
		<td data-name="LOG_INDEX"<?php echo $esbc_host_applog->LOG_INDEX->cellAttributes() ?>>
<span id="el_esbc_host_applog_LOG_INDEX">
<span<?php echo $esbc_host_applog->LOG_INDEX->viewAttributes() ?>>
<?php echo $esbc_host_applog->LOG_INDEX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_host_applog->NICK_NAME->Visible) { // NICK_NAME ?>
	<tr id="r_NICK_NAME">
		<td class="<?php echo $esbc_host_applog_view->TableLeftColumnClass ?>"><span id="elh_esbc_host_applog_NICK_NAME"><?php echo $esbc_host_applog->NICK_NAME->caption() ?></span></td>
		<td data-name="NICK_NAME"<?php echo $esbc_host_applog->NICK_NAME->cellAttributes() ?>>
<span id="el_esbc_host_applog_NICK_NAME">
<span<?php echo $esbc_host_applog->NICK_NAME->viewAttributes() ?>>
<?php echo $esbc_host_applog->NICK_NAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_host_applog->HOST_IP->Visible) { // HOST_IP ?>
	<tr id="r_HOST_IP">
		<td class="<?php echo $esbc_host_applog_view->TableLeftColumnClass ?>"><span id="elh_esbc_host_applog_HOST_IP"><?php echo $esbc_host_applog->HOST_IP->caption() ?></span></td>
		<td data-name="HOST_IP"<?php echo $esbc_host_applog->HOST_IP->cellAttributes() ?>>
<span id="el_esbc_host_applog_HOST_IP">
<span<?php echo $esbc_host_applog->HOST_IP->viewAttributes() ?>>
<?php echo $esbc_host_applog->HOST_IP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_host_applog->HOST_ROOT_ID->Visible) { // HOST_ROOT_ID ?>
	<tr id="r_HOST_ROOT_ID">
		<td class="<?php echo $esbc_host_applog_view->TableLeftColumnClass ?>"><span id="elh_esbc_host_applog_HOST_ROOT_ID"><?php echo $esbc_host_applog->HOST_ROOT_ID->caption() ?></span></td>
		<td data-name="HOST_ROOT_ID"<?php echo $esbc_host_applog->HOST_ROOT_ID->cellAttributes() ?>>
<span id="el_esbc_host_applog_HOST_ROOT_ID">
<span<?php echo $esbc_host_applog->HOST_ROOT_ID->viewAttributes() ?>>
<?php echo $esbc_host_applog->HOST_ROOT_ID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_host_applog->HOST_ROOT_PWD->Visible) { // HOST_ROOT_PWD ?>
	<tr id="r_HOST_ROOT_PWD">
		<td class="<?php echo $esbc_host_applog_view->TableLeftColumnClass ?>"><span id="elh_esbc_host_applog_HOST_ROOT_PWD"><?php echo $esbc_host_applog->HOST_ROOT_PWD->caption() ?></span></td>
		<td data-name="HOST_ROOT_PWD"<?php echo $esbc_host_applog->HOST_ROOT_PWD->cellAttributes() ?>>
<span id="el_esbc_host_applog_HOST_ROOT_PWD">
<span<?php echo $esbc_host_applog->HOST_ROOT_PWD->viewAttributes() ?>>
<?php echo $esbc_host_applog->HOST_ROOT_PWD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_host_applog->ACC40_PWD->Visible) { // ACC40_PWD ?>
	<tr id="r_ACC40_PWD">
		<td class="<?php echo $esbc_host_applog_view->TableLeftColumnClass ?>"><span id="elh_esbc_host_applog_ACC40_PWD"><?php echo $esbc_host_applog->ACC40_PWD->caption() ?></span></td>
		<td data-name="ACC40_PWD"<?php echo $esbc_host_applog->ACC40_PWD->cellAttributes() ?>>
<span id="el_esbc_host_applog_ACC40_PWD">
<span<?php echo $esbc_host_applog->ACC40_PWD->viewAttributes() ?>>
<?php echo $esbc_host_applog->ACC40_PWD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_host_applog->ACC40->Visible) { // ACC40 ?>
	<tr id="r_ACC40">
		<td class="<?php echo $esbc_host_applog_view->TableLeftColumnClass ?>"><span id="elh_esbc_host_applog_ACC40"><?php echo $esbc_host_applog->ACC40->caption() ?></span></td>
		<td data-name="ACC40"<?php echo $esbc_host_applog->ACC40->cellAttributes() ?>>
<span id="el_esbc_host_applog_ACC40">
<span<?php echo $esbc_host_applog->ACC40->viewAttributes() ?>>
<?php echo $esbc_host_applog->ACC40->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_host_applog->ENODE->Visible) { // ENODE ?>
	<tr id="r_ENODE">
		<td class="<?php echo $esbc_host_applog_view->TableLeftColumnClass ?>"><span id="elh_esbc_host_applog_ENODE"><?php echo $esbc_host_applog->ENODE->caption() ?></span></td>
		<td data-name="ENODE"<?php echo $esbc_host_applog->ENODE->cellAttributes() ?>>
<span id="el_esbc_host_applog_ENODE">
<span<?php echo $esbc_host_applog->ENODE->viewAttributes() ?>>
<?php echo $esbc_host_applog->ENODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_host_applog->GENESIS->Visible) { // GENESIS ?>
	<tr id="r_GENESIS">
		<td class="<?php echo $esbc_host_applog_view->TableLeftColumnClass ?>"><span id="elh_esbc_host_applog_GENESIS"><?php echo $esbc_host_applog->GENESIS->caption() ?></span></td>
		<td data-name="GENESIS"<?php echo $esbc_host_applog->GENESIS->cellAttributes() ?>>
<span id="el_esbc_host_applog_GENESIS">
<span<?php echo $esbc_host_applog->GENESIS->viewAttributes() ?>>
<?php echo $esbc_host_applog->GENESIS->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_host_applog->GETH_CMD->Visible) { // GETH_CMD ?>
	<tr id="r_GETH_CMD">
		<td class="<?php echo $esbc_host_applog_view->TableLeftColumnClass ?>"><span id="elh_esbc_host_applog_GETH_CMD"><?php echo $esbc_host_applog->GETH_CMD->caption() ?></span></td>
		<td data-name="GETH_CMD"<?php echo $esbc_host_applog->GETH_CMD->cellAttributes() ?>>
<span id="el_esbc_host_applog_GETH_CMD">
<span<?php echo $esbc_host_applog->GETH_CMD->viewAttributes() ?>>
<?php echo $esbc_host_applog->GETH_CMD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_host_applog->HOST_CONFIG_LOG->Visible) { // HOST_CONFIG_LOG ?>
	<tr id="r_HOST_CONFIG_LOG">
		<td class="<?php echo $esbc_host_applog_view->TableLeftColumnClass ?>"><span id="elh_esbc_host_applog_HOST_CONFIG_LOG"><?php echo $esbc_host_applog->HOST_CONFIG_LOG->caption() ?></span></td>
		<td data-name="HOST_CONFIG_LOG"<?php echo $esbc_host_applog->HOST_CONFIG_LOG->cellAttributes() ?>>
<span id="el_esbc_host_applog_HOST_CONFIG_LOG">
<span<?php echo $esbc_host_applog->HOST_CONFIG_LOG->viewAttributes() ?>>
<?php echo $esbc_host_applog->HOST_CONFIG_LOG->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_host_applog->B18_LOG->Visible) { // B18_LOG ?>
	<tr id="r_B18_LOG">
		<td class="<?php echo $esbc_host_applog_view->TableLeftColumnClass ?>"><span id="elh_esbc_host_applog_B18_LOG"><?php echo $esbc_host_applog->B18_LOG->caption() ?></span></td>
		<td data-name="B18_LOG"<?php echo $esbc_host_applog->B18_LOG->cellAttributes() ?>>
<span id="el_esbc_host_applog_B18_LOG">
<span<?php echo $esbc_host_applog->B18_LOG->viewAttributes() ?>>
<?php echo $esbc_host_applog->B18_LOG->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_host_applog->_1F_LOG->Visible) { // 1F_LOG ?>
	<tr id="r__1F_LOG">
		<td class="<?php echo $esbc_host_applog_view->TableLeftColumnClass ?>"><span id="elh_esbc_host_applog__1F_LOG"><?php echo $esbc_host_applog->_1F_LOG->caption() ?></span></td>
		<td data-name="_1F_LOG"<?php echo $esbc_host_applog->_1F_LOG->cellAttributes() ?>>
<span id="el_esbc_host_applog__1F_LOG">
<span<?php echo $esbc_host_applog->_1F_LOG->viewAttributes() ?>>
<?php echo $esbc_host_applog->_1F_LOG->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_host_applog->Create_Date->Visible) { // Create_Date ?>
	<tr id="r_Create_Date">
		<td class="<?php echo $esbc_host_applog_view->TableLeftColumnClass ?>"><span id="elh_esbc_host_applog_Create_Date"><?php echo $esbc_host_applog->Create_Date->caption() ?></span></td>
		<td data-name="Create_Date"<?php echo $esbc_host_applog->Create_Date->cellAttributes() ?>>
<span id="el_esbc_host_applog_Create_Date">
<span<?php echo $esbc_host_applog->Create_Date->viewAttributes() ?>>
<?php echo $esbc_host_applog->Create_Date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_host_applog->ACTIVE->Visible) { // ACTIVE ?>
	<tr id="r_ACTIVE">
		<td class="<?php echo $esbc_host_applog_view->TableLeftColumnClass ?>"><span id="elh_esbc_host_applog_ACTIVE"><?php echo $esbc_host_applog->ACTIVE->caption() ?></span></td>
		<td data-name="ACTIVE"<?php echo $esbc_host_applog->ACTIVE->cellAttributes() ?>>
<span id="el_esbc_host_applog_ACTIVE">
<span<?php echo $esbc_host_applog->ACTIVE->viewAttributes() ?>>
<?php echo $esbc_host_applog->ACTIVE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_host_applog->Modify_Date->Visible) { // Modify_Date ?>
	<tr id="r_Modify_Date">
		<td class="<?php echo $esbc_host_applog_view->TableLeftColumnClass ?>"><span id="elh_esbc_host_applog_Modify_Date"><?php echo $esbc_host_applog->Modify_Date->caption() ?></span></td>
		<td data-name="Modify_Date"<?php echo $esbc_host_applog->Modify_Date->cellAttributes() ?>>
<span id="el_esbc_host_applog_Modify_Date">
<span<?php echo $esbc_host_applog->Modify_Date->viewAttributes() ?>>
<?php echo $esbc_host_applog->Modify_Date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$esbc_host_applog_view->IsModal) { ?>
<?php if (!$esbc_host_applog->isExport()) { ?>
<?php if (!isset($esbc_host_applog_view->Pager)) $esbc_host_applog_view->Pager = new PrevNextPager($esbc_host_applog_view->StartRec, $esbc_host_applog_view->DisplayRecs, $esbc_host_applog_view->TotalRecs, $esbc_host_applog_view->AutoHidePager) ?>
<?php if ($esbc_host_applog_view->Pager->RecordCount > 0 && $esbc_host_applog_view->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($esbc_host_applog_view->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $esbc_host_applog_view->pageUrl() ?>start=<?php echo $esbc_host_applog_view->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($esbc_host_applog_view->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $esbc_host_applog_view->pageUrl() ?>start=<?php echo $esbc_host_applog_view->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $esbc_host_applog_view->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($esbc_host_applog_view->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $esbc_host_applog_view->pageUrl() ?>start=<?php echo $esbc_host_applog_view->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($esbc_host_applog_view->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $esbc_host_applog_view->pageUrl() ?>start=<?php echo $esbc_host_applog_view->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $esbc_host_applog_view->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$esbc_host_applog_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$esbc_host_applog->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$esbc_host_applog_view->terminate();
?>
