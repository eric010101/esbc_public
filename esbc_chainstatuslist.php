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
$esbc_chainstatus_list = new esbc_chainstatus_list();

// Run the page
$esbc_chainstatus_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_chainstatus_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$esbc_chainstatus->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fesbc_chainstatuslist = currentForm = new ew.Form("fesbc_chainstatuslist", "list");
fesbc_chainstatuslist.formKeyCountName = '<?php echo $esbc_chainstatus_list->FormKeyCountName ?>';

// Form_CustomValidate event
fesbc_chainstatuslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_chainstatuslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fesbc_chainstatuslistsrch = currentSearchForm = new ew.Form("fesbc_chainstatuslistsrch");

// Filters
fesbc_chainstatuslistsrch.filterList = <?php echo $esbc_chainstatus_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$esbc_chainstatus->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($esbc_chainstatus_list->TotalRecs > 0 && $esbc_chainstatus_list->ExportOptions->visible()) { ?>
<?php $esbc_chainstatus_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_chainstatus_list->ImportOptions->visible()) { ?>
<?php $esbc_chainstatus_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_chainstatus_list->SearchOptions->visible()) { ?>
<?php $esbc_chainstatus_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_chainstatus_list->FilterOptions->visible()) { ?>
<?php $esbc_chainstatus_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$esbc_chainstatus_list->renderOtherOptions();
?>
<?php if (!$esbc_chainstatus->isExport() && !$esbc_chainstatus->CurrentAction) { ?>
<form name="fesbc_chainstatuslistsrch" id="fesbc_chainstatuslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($esbc_chainstatus_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fesbc_chainstatuslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="esbc_chainstatus">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($esbc_chainstatus_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($esbc_chainstatus_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $esbc_chainstatus_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($esbc_chainstatus_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($esbc_chainstatus_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($esbc_chainstatus_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($esbc_chainstatus_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $esbc_chainstatus_list->showPageHeader(); ?>
<?php
$esbc_chainstatus_list->showMessage();
?>
<?php if ($esbc_chainstatus_list->TotalRecs > 0 || $esbc_chainstatus->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($esbc_chainstatus_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> esbc_chainstatus">
<form name="fesbc_chainstatuslist" id="fesbc_chainstatuslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_chainstatus_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_chainstatus_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_chainstatus">
<input type="hidden" name="exporttype" id="exporttype" value="">
<div id="gmp_esbc_chainstatus" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($esbc_chainstatus_list->TotalRecs > 0 || $esbc_chainstatus->isGridEdit()) { ?>
<table id="tbl_esbc_chainstatuslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$esbc_chainstatus_list->RowType = ROWTYPE_HEADER;

// Render list options
$esbc_chainstatus_list->renderListOptions();

// Render list options (header, left)
$esbc_chainstatus_list->ListOptions->render("header", "left");
?>
<?php if ($esbc_chainstatus->BlockN->Visible) { // BlockN ?>
	<?php if ($esbc_chainstatus->sortUrl($esbc_chainstatus->BlockN) == "") { ?>
		<th data-name="BlockN" class="<?php echo $esbc_chainstatus->BlockN->headerCellClass() ?>"><div id="elh_esbc_chainstatus_BlockN" class="esbc_chainstatus_BlockN"><div class="ew-table-header-caption"><?php echo $esbc_chainstatus->BlockN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BlockN" class="<?php echo $esbc_chainstatus->BlockN->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_chainstatus->SortUrl($esbc_chainstatus->BlockN) ?>',1);"><div id="elh_esbc_chainstatus_BlockN" class="esbc_chainstatus_BlockN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_chainstatus->BlockN->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_chainstatus->BlockN->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_chainstatus->BlockN->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_chainstatus->BlockHash->Visible) { // BlockHash ?>
	<?php if ($esbc_chainstatus->sortUrl($esbc_chainstatus->BlockHash) == "") { ?>
		<th data-name="BlockHash" class="<?php echo $esbc_chainstatus->BlockHash->headerCellClass() ?>"><div id="elh_esbc_chainstatus_BlockHash" class="esbc_chainstatus_BlockHash"><div class="ew-table-header-caption"><?php echo $esbc_chainstatus->BlockHash->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BlockHash" class="<?php echo $esbc_chainstatus->BlockHash->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_chainstatus->SortUrl($esbc_chainstatus->BlockHash) ?>',1);"><div id="elh_esbc_chainstatus_BlockHash" class="esbc_chainstatus_BlockHash">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_chainstatus->BlockHash->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($esbc_chainstatus->BlockHash->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_chainstatus->BlockHash->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_chainstatus->Difficulty->Visible) { // Difficulty ?>
	<?php if ($esbc_chainstatus->sortUrl($esbc_chainstatus->Difficulty) == "") { ?>
		<th data-name="Difficulty" class="<?php echo $esbc_chainstatus->Difficulty->headerCellClass() ?>"><div id="elh_esbc_chainstatus_Difficulty" class="esbc_chainstatus_Difficulty"><div class="ew-table-header-caption"><?php echo $esbc_chainstatus->Difficulty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Difficulty" class="<?php echo $esbc_chainstatus->Difficulty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_chainstatus->SortUrl($esbc_chainstatus->Difficulty) ?>',1);"><div id="elh_esbc_chainstatus_Difficulty" class="esbc_chainstatus_Difficulty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_chainstatus->Difficulty->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_chainstatus->Difficulty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_chainstatus->Difficulty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_chainstatus->Size->Visible) { // Size ?>
	<?php if ($esbc_chainstatus->sortUrl($esbc_chainstatus->Size) == "") { ?>
		<th data-name="Size" class="<?php echo $esbc_chainstatus->Size->headerCellClass() ?>"><div id="elh_esbc_chainstatus_Size" class="esbc_chainstatus_Size"><div class="ew-table-header-caption"><?php echo $esbc_chainstatus->Size->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Size" class="<?php echo $esbc_chainstatus->Size->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_chainstatus->SortUrl($esbc_chainstatus->Size) ?>',1);"><div id="elh_esbc_chainstatus_Size" class="esbc_chainstatus_Size">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_chainstatus->Size->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_chainstatus->Size->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_chainstatus->Size->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_chainstatus->Age->Visible) { // Age ?>
	<?php if ($esbc_chainstatus->sortUrl($esbc_chainstatus->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $esbc_chainstatus->Age->headerCellClass() ?>"><div id="elh_esbc_chainstatus_Age" class="esbc_chainstatus_Age"><div class="ew-table-header-caption"><?php echo $esbc_chainstatus->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $esbc_chainstatus->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_chainstatus->SortUrl($esbc_chainstatus->Age) ?>',1);"><div id="elh_esbc_chainstatus_Age" class="esbc_chainstatus_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_chainstatus->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_chainstatus->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_chainstatus->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_chainstatus->TXs->Visible) { // TXs ?>
	<?php if ($esbc_chainstatus->sortUrl($esbc_chainstatus->TXs) == "") { ?>
		<th data-name="TXs" class="<?php echo $esbc_chainstatus->TXs->headerCellClass() ?>"><div id="elh_esbc_chainstatus_TXs" class="esbc_chainstatus_TXs"><div class="ew-table-header-caption"><?php echo $esbc_chainstatus->TXs->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TXs" class="<?php echo $esbc_chainstatus->TXs->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_chainstatus->SortUrl($esbc_chainstatus->TXs) ?>',1);"><div id="elh_esbc_chainstatus_TXs" class="esbc_chainstatus_TXs">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_chainstatus->TXs->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_chainstatus->TXs->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_chainstatus->TXs->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_chainstatus->GasUsed->Visible) { // GasUsed ?>
	<?php if ($esbc_chainstatus->sortUrl($esbc_chainstatus->GasUsed) == "") { ?>
		<th data-name="GasUsed" class="<?php echo $esbc_chainstatus->GasUsed->headerCellClass() ?>" style="white-space: nowrap;"><div id="elh_esbc_chainstatus_GasUsed" class="esbc_chainstatus_GasUsed"><div class="ew-table-header-caption"><?php echo $esbc_chainstatus->GasUsed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GasUsed" class="<?php echo $esbc_chainstatus->GasUsed->headerCellClass() ?>" style="white-space: nowrap;"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_chainstatus->SortUrl($esbc_chainstatus->GasUsed) ?>',1);"><div id="elh_esbc_chainstatus_GasUsed" class="esbc_chainstatus_GasUsed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_chainstatus->GasUsed->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_chainstatus->GasUsed->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_chainstatus->GasUsed->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$esbc_chainstatus_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($esbc_chainstatus->ExportAll && $esbc_chainstatus->isExport()) {
	$esbc_chainstatus_list->StopRec = $esbc_chainstatus_list->TotalRecs;
} else {

	// Set the last record to display
	if ($esbc_chainstatus_list->TotalRecs > $esbc_chainstatus_list->StartRec + $esbc_chainstatus_list->DisplayRecs - 1)
		$esbc_chainstatus_list->StopRec = $esbc_chainstatus_list->StartRec + $esbc_chainstatus_list->DisplayRecs - 1;
	else
		$esbc_chainstatus_list->StopRec = $esbc_chainstatus_list->TotalRecs;
}
$esbc_chainstatus_list->RecCnt = $esbc_chainstatus_list->StartRec - 1;
if ($esbc_chainstatus_list->Recordset && !$esbc_chainstatus_list->Recordset->EOF) {
	$esbc_chainstatus_list->Recordset->moveFirst();
	$selectLimit = $esbc_chainstatus_list->UseSelectLimit;
	if (!$selectLimit && $esbc_chainstatus_list->StartRec > 1)
		$esbc_chainstatus_list->Recordset->move($esbc_chainstatus_list->StartRec - 1);
} elseif (!$esbc_chainstatus->AllowAddDeleteRow && $esbc_chainstatus_list->StopRec == 0) {
	$esbc_chainstatus_list->StopRec = $esbc_chainstatus->GridAddRowCount;
}

// Initialize aggregate
$esbc_chainstatus->RowType = ROWTYPE_AGGREGATEINIT;
$esbc_chainstatus->resetAttributes();
$esbc_chainstatus_list->renderRow();
while ($esbc_chainstatus_list->RecCnt < $esbc_chainstatus_list->StopRec) {
	$esbc_chainstatus_list->RecCnt++;
	if ($esbc_chainstatus_list->RecCnt >= $esbc_chainstatus_list->StartRec) {
		$esbc_chainstatus_list->RowCnt++;

		// Set up key count
		$esbc_chainstatus_list->KeyCount = $esbc_chainstatus_list->RowIndex;

		// Init row class and style
		$esbc_chainstatus->resetAttributes();
		$esbc_chainstatus->CssClass = "";
		if ($esbc_chainstatus->isGridAdd()) {
		} else {
			$esbc_chainstatus_list->loadRowValues($esbc_chainstatus_list->Recordset); // Load row values
		}
		$esbc_chainstatus->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$esbc_chainstatus->RowAttrs = array_merge($esbc_chainstatus->RowAttrs, array('data-rowindex'=>$esbc_chainstatus_list->RowCnt, 'id'=>'r' . $esbc_chainstatus_list->RowCnt . '_esbc_chainstatus', 'data-rowtype'=>$esbc_chainstatus->RowType));

		// Render row
		$esbc_chainstatus_list->renderRow();

		// Render list options
		$esbc_chainstatus_list->renderListOptions();
?>
	<tr<?php echo $esbc_chainstatus->rowAttributes() ?>>
<?php

// Render list options (body, left)
$esbc_chainstatus_list->ListOptions->render("body", "left", $esbc_chainstatus_list->RowCnt);
?>
	<?php if ($esbc_chainstatus->BlockN->Visible) { // BlockN ?>
		<td data-name="BlockN"<?php echo $esbc_chainstatus->BlockN->cellAttributes() ?>>
<span id="el<?php echo $esbc_chainstatus_list->RowCnt ?>_esbc_chainstatus_BlockN" class="esbc_chainstatus_BlockN">
<span<?php echo $esbc_chainstatus->BlockN->viewAttributes() ?>>
<?php echo $esbc_chainstatus->BlockN->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_chainstatus->BlockHash->Visible) { // BlockHash ?>
		<td data-name="BlockHash"<?php echo $esbc_chainstatus->BlockHash->cellAttributes() ?>>
<span id="el<?php echo $esbc_chainstatus_list->RowCnt ?>_esbc_chainstatus_BlockHash" class="esbc_chainstatus_BlockHash">
<span<?php echo $esbc_chainstatus->BlockHash->viewAttributes() ?>>
<?php echo $esbc_chainstatus->BlockHash->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_chainstatus->Difficulty->Visible) { // Difficulty ?>
		<td data-name="Difficulty"<?php echo $esbc_chainstatus->Difficulty->cellAttributes() ?>>
<span id="el<?php echo $esbc_chainstatus_list->RowCnt ?>_esbc_chainstatus_Difficulty" class="esbc_chainstatus_Difficulty">
<span<?php echo $esbc_chainstatus->Difficulty->viewAttributes() ?>>
<?php echo $esbc_chainstatus->Difficulty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_chainstatus->Size->Visible) { // Size ?>
		<td data-name="Size"<?php echo $esbc_chainstatus->Size->cellAttributes() ?>>
<span id="el<?php echo $esbc_chainstatus_list->RowCnt ?>_esbc_chainstatus_Size" class="esbc_chainstatus_Size">
<span<?php echo $esbc_chainstatus->Size->viewAttributes() ?>>
<?php echo $esbc_chainstatus->Size->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_chainstatus->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $esbc_chainstatus->Age->cellAttributes() ?>>
<span id="el<?php echo $esbc_chainstatus_list->RowCnt ?>_esbc_chainstatus_Age" class="esbc_chainstatus_Age">
<span<?php echo $esbc_chainstatus->Age->viewAttributes() ?>>
<?php echo $esbc_chainstatus->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_chainstatus->TXs->Visible) { // TXs ?>
		<td data-name="TXs"<?php echo $esbc_chainstatus->TXs->cellAttributes() ?>>
<span id="el<?php echo $esbc_chainstatus_list->RowCnt ?>_esbc_chainstatus_TXs" class="esbc_chainstatus_TXs">
<span<?php echo $esbc_chainstatus->TXs->viewAttributes() ?>>
<?php echo $esbc_chainstatus->TXs->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_chainstatus->GasUsed->Visible) { // GasUsed ?>
		<td data-name="GasUsed"<?php echo $esbc_chainstatus->GasUsed->cellAttributes() ?>>
<span id="el<?php echo $esbc_chainstatus_list->RowCnt ?>_esbc_chainstatus_GasUsed" class="esbc_chainstatus_GasUsed">
<span<?php echo $esbc_chainstatus->GasUsed->viewAttributes() ?>>
<?php echo $esbc_chainstatus->GasUsed->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$esbc_chainstatus_list->ListOptions->render("body", "right", $esbc_chainstatus_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$esbc_chainstatus->isGridAdd())
		$esbc_chainstatus_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$esbc_chainstatus->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($esbc_chainstatus_list->Recordset)
	$esbc_chainstatus_list->Recordset->Close();
?>
<?php if (!$esbc_chainstatus->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$esbc_chainstatus->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($esbc_chainstatus_list->Pager)) $esbc_chainstatus_list->Pager = new PrevNextPager($esbc_chainstatus_list->StartRec, $esbc_chainstatus_list->DisplayRecs, $esbc_chainstatus_list->TotalRecs, $esbc_chainstatus_list->AutoHidePager) ?>
<?php if ($esbc_chainstatus_list->Pager->RecordCount > 0 && $esbc_chainstatus_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($esbc_chainstatus_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $esbc_chainstatus_list->pageUrl() ?>start=<?php echo $esbc_chainstatus_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($esbc_chainstatus_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $esbc_chainstatus_list->pageUrl() ?>start=<?php echo $esbc_chainstatus_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $esbc_chainstatus_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($esbc_chainstatus_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $esbc_chainstatus_list->pageUrl() ?>start=<?php echo $esbc_chainstatus_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($esbc_chainstatus_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $esbc_chainstatus_list->pageUrl() ?>start=<?php echo $esbc_chainstatus_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $esbc_chainstatus_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($esbc_chainstatus_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $esbc_chainstatus_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $esbc_chainstatus_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $esbc_chainstatus_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($esbc_chainstatus_list->TotalRecs > 0 && (!$esbc_chainstatus_list->AutoHidePageSizeSelector || $esbc_chainstatus_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="esbc_chainstatus">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->Phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($esbc_chainstatus_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($esbc_chainstatus_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($esbc_chainstatus_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($esbc_chainstatus->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($esbc_chainstatus_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($esbc_chainstatus_list->TotalRecs == 0 && !$esbc_chainstatus->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($esbc_chainstatus_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$esbc_chainstatus_list->showPageFooter();
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
$esbc_chainstatus_list->terminate();
?>
