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
$esbc_host_applog_list = new esbc_host_applog_list();

// Run the page
$esbc_host_applog_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_host_applog_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$esbc_host_applog->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fesbc_host_apploglist = currentForm = new ew.Form("fesbc_host_apploglist", "list");
fesbc_host_apploglist.formKeyCountName = '<?php echo $esbc_host_applog_list->FormKeyCountName ?>';

// Form_CustomValidate event
fesbc_host_apploglist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_host_apploglist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fesbc_host_apploglist.lists["x_ACTIVE"] = <?php echo $esbc_host_applog_list->ACTIVE->Lookup->toClientList() ?>;
fesbc_host_apploglist.lists["x_ACTIVE"].options = <?php echo JsonEncode($esbc_host_applog_list->ACTIVE->options(FALSE, TRUE)) ?>;

// Form object for search
var fesbc_host_apploglistsrch = currentSearchForm = new ew.Form("fesbc_host_apploglistsrch");

// Filters
fesbc_host_apploglistsrch.filterList = <?php echo $esbc_host_applog_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$esbc_host_applog->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($esbc_host_applog_list->TotalRecs > 0 && $esbc_host_applog_list->ExportOptions->visible()) { ?>
<?php $esbc_host_applog_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_host_applog_list->ImportOptions->visible()) { ?>
<?php $esbc_host_applog_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_host_applog_list->SearchOptions->visible()) { ?>
<?php $esbc_host_applog_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_host_applog_list->FilterOptions->visible()) { ?>
<?php $esbc_host_applog_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$esbc_host_applog_list->renderOtherOptions();
?>
<?php if (!$esbc_host_applog->isExport() && !$esbc_host_applog->CurrentAction) { ?>
<form name="fesbc_host_apploglistsrch" id="fesbc_host_apploglistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($esbc_host_applog_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fesbc_host_apploglistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="esbc_host_applog">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($esbc_host_applog_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($esbc_host_applog_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $esbc_host_applog_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($esbc_host_applog_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($esbc_host_applog_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($esbc_host_applog_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($esbc_host_applog_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $esbc_host_applog_list->showPageHeader(); ?>
<?php
$esbc_host_applog_list->showMessage();
?>
<?php if ($esbc_host_applog_list->TotalRecs > 0 || $esbc_host_applog->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($esbc_host_applog_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> esbc_host_applog">
<form name="fesbc_host_apploglist" id="fesbc_host_apploglist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_host_applog_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_host_applog_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_host_applog">
<input type="hidden" name="exporttype" id="exporttype" value="">
<div id="gmp_esbc_host_applog" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($esbc_host_applog_list->TotalRecs > 0 || $esbc_host_applog->isGridEdit()) { ?>
<table id="tbl_esbc_host_apploglist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$esbc_host_applog_list->RowType = ROWTYPE_HEADER;

// Render list options
$esbc_host_applog_list->renderListOptions();

// Render list options (header, left)
$esbc_host_applog_list->ListOptions->render("header", "left");
?>
<?php if ($esbc_host_applog->LOG_INDEX->Visible) { // LOG_INDEX ?>
	<?php if ($esbc_host_applog->sortUrl($esbc_host_applog->LOG_INDEX) == "") { ?>
		<th data-name="LOG_INDEX" class="<?php echo $esbc_host_applog->LOG_INDEX->headerCellClass() ?>"><div id="elh_esbc_host_applog_LOG_INDEX" class="esbc_host_applog_LOG_INDEX"><div class="ew-table-header-caption"><?php echo $esbc_host_applog->LOG_INDEX->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LOG_INDEX" class="<?php echo $esbc_host_applog->LOG_INDEX->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_host_applog->SortUrl($esbc_host_applog->LOG_INDEX) ?>',1);"><div id="elh_esbc_host_applog_LOG_INDEX" class="esbc_host_applog_LOG_INDEX">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_host_applog->LOG_INDEX->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_host_applog->LOG_INDEX->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_host_applog->LOG_INDEX->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_host_applog->NICK_NAME->Visible) { // NICK_NAME ?>
	<?php if ($esbc_host_applog->sortUrl($esbc_host_applog->NICK_NAME) == "") { ?>
		<th data-name="NICK_NAME" class="<?php echo $esbc_host_applog->NICK_NAME->headerCellClass() ?>"><div id="elh_esbc_host_applog_NICK_NAME" class="esbc_host_applog_NICK_NAME"><div class="ew-table-header-caption"><?php echo $esbc_host_applog->NICK_NAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NICK_NAME" class="<?php echo $esbc_host_applog->NICK_NAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_host_applog->SortUrl($esbc_host_applog->NICK_NAME) ?>',1);"><div id="elh_esbc_host_applog_NICK_NAME" class="esbc_host_applog_NICK_NAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_host_applog->NICK_NAME->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($esbc_host_applog->NICK_NAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_host_applog->NICK_NAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_host_applog->HOST_IP->Visible) { // HOST_IP ?>
	<?php if ($esbc_host_applog->sortUrl($esbc_host_applog->HOST_IP) == "") { ?>
		<th data-name="HOST_IP" class="<?php echo $esbc_host_applog->HOST_IP->headerCellClass() ?>"><div id="elh_esbc_host_applog_HOST_IP" class="esbc_host_applog_HOST_IP"><div class="ew-table-header-caption"><?php echo $esbc_host_applog->HOST_IP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HOST_IP" class="<?php echo $esbc_host_applog->HOST_IP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_host_applog->SortUrl($esbc_host_applog->HOST_IP) ?>',1);"><div id="elh_esbc_host_applog_HOST_IP" class="esbc_host_applog_HOST_IP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_host_applog->HOST_IP->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($esbc_host_applog->HOST_IP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_host_applog->HOST_IP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_host_applog->Create_Date->Visible) { // Create_Date ?>
	<?php if ($esbc_host_applog->sortUrl($esbc_host_applog->Create_Date) == "") { ?>
		<th data-name="Create_Date" class="<?php echo $esbc_host_applog->Create_Date->headerCellClass() ?>"><div id="elh_esbc_host_applog_Create_Date" class="esbc_host_applog_Create_Date"><div class="ew-table-header-caption"><?php echo $esbc_host_applog->Create_Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Create_Date" class="<?php echo $esbc_host_applog->Create_Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_host_applog->SortUrl($esbc_host_applog->Create_Date) ?>',1);"><div id="elh_esbc_host_applog_Create_Date" class="esbc_host_applog_Create_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_host_applog->Create_Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_host_applog->Create_Date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_host_applog->Create_Date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_host_applog->ACTIVE->Visible) { // ACTIVE ?>
	<?php if ($esbc_host_applog->sortUrl($esbc_host_applog->ACTIVE) == "") { ?>
		<th data-name="ACTIVE" class="<?php echo $esbc_host_applog->ACTIVE->headerCellClass() ?>"><div id="elh_esbc_host_applog_ACTIVE" class="esbc_host_applog_ACTIVE"><div class="ew-table-header-caption"><?php echo $esbc_host_applog->ACTIVE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ACTIVE" class="<?php echo $esbc_host_applog->ACTIVE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_host_applog->SortUrl($esbc_host_applog->ACTIVE) ?>',1);"><div id="elh_esbc_host_applog_ACTIVE" class="esbc_host_applog_ACTIVE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_host_applog->ACTIVE->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_host_applog->ACTIVE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_host_applog->ACTIVE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_host_applog->Modify_Date->Visible) { // Modify_Date ?>
	<?php if ($esbc_host_applog->sortUrl($esbc_host_applog->Modify_Date) == "") { ?>
		<th data-name="Modify_Date" class="<?php echo $esbc_host_applog->Modify_Date->headerCellClass() ?>"><div id="elh_esbc_host_applog_Modify_Date" class="esbc_host_applog_Modify_Date"><div class="ew-table-header-caption"><?php echo $esbc_host_applog->Modify_Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Modify_Date" class="<?php echo $esbc_host_applog->Modify_Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_host_applog->SortUrl($esbc_host_applog->Modify_Date) ?>',1);"><div id="elh_esbc_host_applog_Modify_Date" class="esbc_host_applog_Modify_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_host_applog->Modify_Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_host_applog->Modify_Date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_host_applog->Modify_Date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$esbc_host_applog_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($esbc_host_applog->ExportAll && $esbc_host_applog->isExport()) {
	$esbc_host_applog_list->StopRec = $esbc_host_applog_list->TotalRecs;
} else {

	// Set the last record to display
	if ($esbc_host_applog_list->TotalRecs > $esbc_host_applog_list->StartRec + $esbc_host_applog_list->DisplayRecs - 1)
		$esbc_host_applog_list->StopRec = $esbc_host_applog_list->StartRec + $esbc_host_applog_list->DisplayRecs - 1;
	else
		$esbc_host_applog_list->StopRec = $esbc_host_applog_list->TotalRecs;
}
$esbc_host_applog_list->RecCnt = $esbc_host_applog_list->StartRec - 1;
if ($esbc_host_applog_list->Recordset && !$esbc_host_applog_list->Recordset->EOF) {
	$esbc_host_applog_list->Recordset->moveFirst();
	$selectLimit = $esbc_host_applog_list->UseSelectLimit;
	if (!$selectLimit && $esbc_host_applog_list->StartRec > 1)
		$esbc_host_applog_list->Recordset->move($esbc_host_applog_list->StartRec - 1);
} elseif (!$esbc_host_applog->AllowAddDeleteRow && $esbc_host_applog_list->StopRec == 0) {
	$esbc_host_applog_list->StopRec = $esbc_host_applog->GridAddRowCount;
}

// Initialize aggregate
$esbc_host_applog->RowType = ROWTYPE_AGGREGATEINIT;
$esbc_host_applog->resetAttributes();
$esbc_host_applog_list->renderRow();
while ($esbc_host_applog_list->RecCnt < $esbc_host_applog_list->StopRec) {
	$esbc_host_applog_list->RecCnt++;
	if ($esbc_host_applog_list->RecCnt >= $esbc_host_applog_list->StartRec) {
		$esbc_host_applog_list->RowCnt++;

		// Set up key count
		$esbc_host_applog_list->KeyCount = $esbc_host_applog_list->RowIndex;

		// Init row class and style
		$esbc_host_applog->resetAttributes();
		$esbc_host_applog->CssClass = "";
		if ($esbc_host_applog->isGridAdd()) {
		} else {
			$esbc_host_applog_list->loadRowValues($esbc_host_applog_list->Recordset); // Load row values
		}
		$esbc_host_applog->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$esbc_host_applog->RowAttrs = array_merge($esbc_host_applog->RowAttrs, array('data-rowindex'=>$esbc_host_applog_list->RowCnt, 'id'=>'r' . $esbc_host_applog_list->RowCnt . '_esbc_host_applog', 'data-rowtype'=>$esbc_host_applog->RowType));

		// Render row
		$esbc_host_applog_list->renderRow();

		// Render list options
		$esbc_host_applog_list->renderListOptions();
?>
	<tr<?php echo $esbc_host_applog->rowAttributes() ?>>
<?php

// Render list options (body, left)
$esbc_host_applog_list->ListOptions->render("body", "left", $esbc_host_applog_list->RowCnt);
?>
	<?php if ($esbc_host_applog->LOG_INDEX->Visible) { // LOG_INDEX ?>
		<td data-name="LOG_INDEX"<?php echo $esbc_host_applog->LOG_INDEX->cellAttributes() ?>>
<span id="el<?php echo $esbc_host_applog_list->RowCnt ?>_esbc_host_applog_LOG_INDEX" class="esbc_host_applog_LOG_INDEX">
<span<?php echo $esbc_host_applog->LOG_INDEX->viewAttributes() ?>>
<?php echo $esbc_host_applog->LOG_INDEX->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_host_applog->NICK_NAME->Visible) { // NICK_NAME ?>
		<td data-name="NICK_NAME"<?php echo $esbc_host_applog->NICK_NAME->cellAttributes() ?>>
<span id="el<?php echo $esbc_host_applog_list->RowCnt ?>_esbc_host_applog_NICK_NAME" class="esbc_host_applog_NICK_NAME">
<span<?php echo $esbc_host_applog->NICK_NAME->viewAttributes() ?>>
<?php echo $esbc_host_applog->NICK_NAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_host_applog->HOST_IP->Visible) { // HOST_IP ?>
		<td data-name="HOST_IP"<?php echo $esbc_host_applog->HOST_IP->cellAttributes() ?>>
<span id="el<?php echo $esbc_host_applog_list->RowCnt ?>_esbc_host_applog_HOST_IP" class="esbc_host_applog_HOST_IP">
<span<?php echo $esbc_host_applog->HOST_IP->viewAttributes() ?>>
<?php echo $esbc_host_applog->HOST_IP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_host_applog->Create_Date->Visible) { // Create_Date ?>
		<td data-name="Create_Date"<?php echo $esbc_host_applog->Create_Date->cellAttributes() ?>>
<span id="el<?php echo $esbc_host_applog_list->RowCnt ?>_esbc_host_applog_Create_Date" class="esbc_host_applog_Create_Date">
<span<?php echo $esbc_host_applog->Create_Date->viewAttributes() ?>>
<?php echo $esbc_host_applog->Create_Date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_host_applog->ACTIVE->Visible) { // ACTIVE ?>
		<td data-name="ACTIVE"<?php echo $esbc_host_applog->ACTIVE->cellAttributes() ?>>
<span id="el<?php echo $esbc_host_applog_list->RowCnt ?>_esbc_host_applog_ACTIVE" class="esbc_host_applog_ACTIVE">
<span<?php echo $esbc_host_applog->ACTIVE->viewAttributes() ?>>
<?php echo $esbc_host_applog->ACTIVE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_host_applog->Modify_Date->Visible) { // Modify_Date ?>
		<td data-name="Modify_Date"<?php echo $esbc_host_applog->Modify_Date->cellAttributes() ?>>
<span id="el<?php echo $esbc_host_applog_list->RowCnt ?>_esbc_host_applog_Modify_Date" class="esbc_host_applog_Modify_Date">
<span<?php echo $esbc_host_applog->Modify_Date->viewAttributes() ?>>
<?php echo $esbc_host_applog->Modify_Date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$esbc_host_applog_list->ListOptions->render("body", "right", $esbc_host_applog_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$esbc_host_applog->isGridAdd())
		$esbc_host_applog_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$esbc_host_applog->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($esbc_host_applog_list->Recordset)
	$esbc_host_applog_list->Recordset->Close();
?>
<?php if (!$esbc_host_applog->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$esbc_host_applog->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($esbc_host_applog_list->Pager)) $esbc_host_applog_list->Pager = new PrevNextPager($esbc_host_applog_list->StartRec, $esbc_host_applog_list->DisplayRecs, $esbc_host_applog_list->TotalRecs, $esbc_host_applog_list->AutoHidePager) ?>
<?php if ($esbc_host_applog_list->Pager->RecordCount > 0 && $esbc_host_applog_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($esbc_host_applog_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $esbc_host_applog_list->pageUrl() ?>start=<?php echo $esbc_host_applog_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($esbc_host_applog_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $esbc_host_applog_list->pageUrl() ?>start=<?php echo $esbc_host_applog_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $esbc_host_applog_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($esbc_host_applog_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $esbc_host_applog_list->pageUrl() ?>start=<?php echo $esbc_host_applog_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($esbc_host_applog_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $esbc_host_applog_list->pageUrl() ?>start=<?php echo $esbc_host_applog_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $esbc_host_applog_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($esbc_host_applog_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $esbc_host_applog_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $esbc_host_applog_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $esbc_host_applog_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($esbc_host_applog_list->TotalRecs > 0 && (!$esbc_host_applog_list->AutoHidePageSizeSelector || $esbc_host_applog_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="esbc_host_applog">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->Phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($esbc_host_applog_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($esbc_host_applog_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($esbc_host_applog_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($esbc_host_applog->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($esbc_host_applog_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($esbc_host_applog_list->TotalRecs == 0 && !$esbc_host_applog->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($esbc_host_applog_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$esbc_host_applog_list->showPageFooter();
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
$esbc_host_applog_list->terminate();
?>
