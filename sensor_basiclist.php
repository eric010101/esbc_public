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
$sensor_basic_list = new sensor_basic_list();

// Run the page
$sensor_basic_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sensor_basic_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$sensor_basic->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fsensor_basiclist = currentForm = new ew.Form("fsensor_basiclist", "list");
fsensor_basiclist.formKeyCountName = '<?php echo $sensor_basic_list->FormKeyCountName ?>';

// Form_CustomValidate event
fsensor_basiclist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsensor_basiclist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fsensor_basiclistsrch = currentSearchForm = new ew.Form("fsensor_basiclistsrch");

// Filters
fsensor_basiclistsrch.filterList = <?php echo $sensor_basic_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$sensor_basic->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($sensor_basic_list->TotalRecs > 0 && $sensor_basic_list->ExportOptions->visible()) { ?>
<?php $sensor_basic_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($sensor_basic_list->ImportOptions->visible()) { ?>
<?php $sensor_basic_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($sensor_basic_list->SearchOptions->visible()) { ?>
<?php $sensor_basic_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($sensor_basic_list->FilterOptions->visible()) { ?>
<?php $sensor_basic_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$sensor_basic_list->renderOtherOptions();
?>
<?php if (!$sensor_basic->isExport() && !$sensor_basic->CurrentAction) { ?>
<form name="fsensor_basiclistsrch" id="fsensor_basiclistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($sensor_basic_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fsensor_basiclistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="sensor_basic">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($sensor_basic_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($sensor_basic_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $sensor_basic_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($sensor_basic_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($sensor_basic_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($sensor_basic_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($sensor_basic_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $sensor_basic_list->showPageHeader(); ?>
<?php
$sensor_basic_list->showMessage();
?>
<?php if ($sensor_basic_list->TotalRecs > 0 || $sensor_basic->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($sensor_basic_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> sensor_basic">
<form name="fsensor_basiclist" id="fsensor_basiclist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sensor_basic_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sensor_basic_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sensor_basic">
<input type="hidden" name="exporttype" id="exporttype" value="">
<div id="gmp_sensor_basic" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($sensor_basic_list->TotalRecs > 0 || $sensor_basic->isGridEdit()) { ?>
<table id="tbl_sensor_basiclist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$sensor_basic_list->RowType = ROWTYPE_HEADER;

// Render list options
$sensor_basic_list->renderListOptions();

// Render list options (header, left)
$sensor_basic_list->ListOptions->render("header", "left");
?>
<?php if ($sensor_basic->RTLindex->Visible) { // RTLindex ?>
	<?php if ($sensor_basic->sortUrl($sensor_basic->RTLindex) == "") { ?>
		<th data-name="RTLindex" class="<?php echo $sensor_basic->RTLindex->headerCellClass() ?>"><div id="elh_sensor_basic_RTLindex" class="sensor_basic_RTLindex"><div class="ew-table-header-caption"><?php echo $sensor_basic->RTLindex->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RTLindex" class="<?php echo $sensor_basic->RTLindex->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sensor_basic->SortUrl($sensor_basic->RTLindex) ?>',1);"><div id="elh_sensor_basic_RTLindex" class="sensor_basic_RTLindex">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sensor_basic->RTLindex->caption() ?></span><span class="ew-table-header-sort"><?php if ($sensor_basic->RTLindex->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sensor_basic->RTLindex->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sensor_basic->sensor_id->Visible) { // sensor_id ?>
	<?php if ($sensor_basic->sortUrl($sensor_basic->sensor_id) == "") { ?>
		<th data-name="sensor_id" class="<?php echo $sensor_basic->sensor_id->headerCellClass() ?>"><div id="elh_sensor_basic_sensor_id" class="sensor_basic_sensor_id"><div class="ew-table-header-caption"><?php echo $sensor_basic->sensor_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sensor_id" class="<?php echo $sensor_basic->sensor_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sensor_basic->SortUrl($sensor_basic->sensor_id) ?>',1);"><div id="elh_sensor_basic_sensor_id" class="sensor_basic_sensor_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sensor_basic->sensor_id->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sensor_basic->sensor_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sensor_basic->sensor_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sensor_basic->beb_alias_name->Visible) { // beb_alias_name ?>
	<?php if ($sensor_basic->sortUrl($sensor_basic->beb_alias_name) == "") { ?>
		<th data-name="beb_alias_name" class="<?php echo $sensor_basic->beb_alias_name->headerCellClass() ?>"><div id="elh_sensor_basic_beb_alias_name" class="sensor_basic_beb_alias_name"><div class="ew-table-header-caption"><?php echo $sensor_basic->beb_alias_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="beb_alias_name" class="<?php echo $sensor_basic->beb_alias_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sensor_basic->SortUrl($sensor_basic->beb_alias_name) ?>',1);"><div id="elh_sensor_basic_beb_alias_name" class="sensor_basic_beb_alias_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sensor_basic->beb_alias_name->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sensor_basic->beb_alias_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sensor_basic->beb_alias_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sensor_basic->active->Visible) { // active ?>
	<?php if ($sensor_basic->sortUrl($sensor_basic->active) == "") { ?>
		<th data-name="active" class="<?php echo $sensor_basic->active->headerCellClass() ?>"><div id="elh_sensor_basic_active" class="sensor_basic_active"><div class="ew-table-header-caption"><?php echo $sensor_basic->active->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="active" class="<?php echo $sensor_basic->active->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sensor_basic->SortUrl($sensor_basic->active) ?>',1);"><div id="elh_sensor_basic_active" class="sensor_basic_active">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sensor_basic->active->caption() ?></span><span class="ew-table-header-sort"><?php if ($sensor_basic->active->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sensor_basic->active->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sensor_basic->date_add->Visible) { // date_add ?>
	<?php if ($sensor_basic->sortUrl($sensor_basic->date_add) == "") { ?>
		<th data-name="date_add" class="<?php echo $sensor_basic->date_add->headerCellClass() ?>"><div id="elh_sensor_basic_date_add" class="sensor_basic_date_add"><div class="ew-table-header-caption"><?php echo $sensor_basic->date_add->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="date_add" class="<?php echo $sensor_basic->date_add->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sensor_basic->SortUrl($sensor_basic->date_add) ?>',1);"><div id="elh_sensor_basic_date_add" class="sensor_basic_date_add">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sensor_basic->date_add->caption() ?></span><span class="ew-table-header-sort"><?php if ($sensor_basic->date_add->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sensor_basic->date_add->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$sensor_basic_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($sensor_basic->ExportAll && $sensor_basic->isExport()) {
	$sensor_basic_list->StopRec = $sensor_basic_list->TotalRecs;
} else {

	// Set the last record to display
	if ($sensor_basic_list->TotalRecs > $sensor_basic_list->StartRec + $sensor_basic_list->DisplayRecs - 1)
		$sensor_basic_list->StopRec = $sensor_basic_list->StartRec + $sensor_basic_list->DisplayRecs - 1;
	else
		$sensor_basic_list->StopRec = $sensor_basic_list->TotalRecs;
}
$sensor_basic_list->RecCnt = $sensor_basic_list->StartRec - 1;
if ($sensor_basic_list->Recordset && !$sensor_basic_list->Recordset->EOF) {
	$sensor_basic_list->Recordset->moveFirst();
	$selectLimit = $sensor_basic_list->UseSelectLimit;
	if (!$selectLimit && $sensor_basic_list->StartRec > 1)
		$sensor_basic_list->Recordset->move($sensor_basic_list->StartRec - 1);
} elseif (!$sensor_basic->AllowAddDeleteRow && $sensor_basic_list->StopRec == 0) {
	$sensor_basic_list->StopRec = $sensor_basic->GridAddRowCount;
}

// Initialize aggregate
$sensor_basic->RowType = ROWTYPE_AGGREGATEINIT;
$sensor_basic->resetAttributes();
$sensor_basic_list->renderRow();
while ($sensor_basic_list->RecCnt < $sensor_basic_list->StopRec) {
	$sensor_basic_list->RecCnt++;
	if ($sensor_basic_list->RecCnt >= $sensor_basic_list->StartRec) {
		$sensor_basic_list->RowCnt++;

		// Set up key count
		$sensor_basic_list->KeyCount = $sensor_basic_list->RowIndex;

		// Init row class and style
		$sensor_basic->resetAttributes();
		$sensor_basic->CssClass = "";
		if ($sensor_basic->isGridAdd()) {
		} else {
			$sensor_basic_list->loadRowValues($sensor_basic_list->Recordset); // Load row values
		}
		$sensor_basic->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$sensor_basic->RowAttrs = array_merge($sensor_basic->RowAttrs, array('data-rowindex'=>$sensor_basic_list->RowCnt, 'id'=>'r' . $sensor_basic_list->RowCnt . '_sensor_basic', 'data-rowtype'=>$sensor_basic->RowType));

		// Render row
		$sensor_basic_list->renderRow();

		// Render list options
		$sensor_basic_list->renderListOptions();
?>
	<tr<?php echo $sensor_basic->rowAttributes() ?>>
<?php

// Render list options (body, left)
$sensor_basic_list->ListOptions->render("body", "left", $sensor_basic_list->RowCnt);
?>
	<?php if ($sensor_basic->RTLindex->Visible) { // RTLindex ?>
		<td data-name="RTLindex"<?php echo $sensor_basic->RTLindex->cellAttributes() ?>>
<span id="el<?php echo $sensor_basic_list->RowCnt ?>_sensor_basic_RTLindex" class="sensor_basic_RTLindex">
<span<?php echo $sensor_basic->RTLindex->viewAttributes() ?>>
<?php echo $sensor_basic->RTLindex->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sensor_basic->sensor_id->Visible) { // sensor_id ?>
		<td data-name="sensor_id"<?php echo $sensor_basic->sensor_id->cellAttributes() ?>>
<span id="el<?php echo $sensor_basic_list->RowCnt ?>_sensor_basic_sensor_id" class="sensor_basic_sensor_id">
<span<?php echo $sensor_basic->sensor_id->viewAttributes() ?>>
<?php echo $sensor_basic->sensor_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sensor_basic->beb_alias_name->Visible) { // beb_alias_name ?>
		<td data-name="beb_alias_name"<?php echo $sensor_basic->beb_alias_name->cellAttributes() ?>>
<span id="el<?php echo $sensor_basic_list->RowCnt ?>_sensor_basic_beb_alias_name" class="sensor_basic_beb_alias_name">
<span<?php echo $sensor_basic->beb_alias_name->viewAttributes() ?>>
<?php echo $sensor_basic->beb_alias_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sensor_basic->active->Visible) { // active ?>
		<td data-name="active"<?php echo $sensor_basic->active->cellAttributes() ?>>
<span id="el<?php echo $sensor_basic_list->RowCnt ?>_sensor_basic_active" class="sensor_basic_active">
<span<?php echo $sensor_basic->active->viewAttributes() ?>>
<?php echo $sensor_basic->active->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sensor_basic->date_add->Visible) { // date_add ?>
		<td data-name="date_add"<?php echo $sensor_basic->date_add->cellAttributes() ?>>
<span id="el<?php echo $sensor_basic_list->RowCnt ?>_sensor_basic_date_add" class="sensor_basic_date_add">
<span<?php echo $sensor_basic->date_add->viewAttributes() ?>>
<?php echo $sensor_basic->date_add->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$sensor_basic_list->ListOptions->render("body", "right", $sensor_basic_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$sensor_basic->isGridAdd())
		$sensor_basic_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$sensor_basic->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($sensor_basic_list->Recordset)
	$sensor_basic_list->Recordset->Close();
?>
<?php if (!$sensor_basic->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$sensor_basic->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($sensor_basic_list->Pager)) $sensor_basic_list->Pager = new PrevNextPager($sensor_basic_list->StartRec, $sensor_basic_list->DisplayRecs, $sensor_basic_list->TotalRecs, $sensor_basic_list->AutoHidePager) ?>
<?php if ($sensor_basic_list->Pager->RecordCount > 0 && $sensor_basic_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($sensor_basic_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $sensor_basic_list->pageUrl() ?>start=<?php echo $sensor_basic_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($sensor_basic_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $sensor_basic_list->pageUrl() ?>start=<?php echo $sensor_basic_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $sensor_basic_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($sensor_basic_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $sensor_basic_list->pageUrl() ?>start=<?php echo $sensor_basic_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($sensor_basic_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $sensor_basic_list->pageUrl() ?>start=<?php echo $sensor_basic_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $sensor_basic_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($sensor_basic_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $sensor_basic_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $sensor_basic_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $sensor_basic_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($sensor_basic_list->TotalRecs > 0 && (!$sensor_basic_list->AutoHidePageSizeSelector || $sensor_basic_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="sensor_basic">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->Phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($sensor_basic_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($sensor_basic_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($sensor_basic_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($sensor_basic->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($sensor_basic_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($sensor_basic_list->TotalRecs == 0 && !$sensor_basic->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($sensor_basic_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$sensor_basic_list->showPageFooter();
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
$sensor_basic_list->terminate();
?>
