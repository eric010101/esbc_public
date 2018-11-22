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
$sensor_rawdata_list = new sensor_rawdata_list();

// Run the page
$sensor_rawdata_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sensor_rawdata_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$sensor_rawdata->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fsensor_rawdatalist = currentForm = new ew.Form("fsensor_rawdatalist", "list");
fsensor_rawdatalist.formKeyCountName = '<?php echo $sensor_rawdata_list->FormKeyCountName ?>';

// Form_CustomValidate event
fsensor_rawdatalist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsensor_rawdatalist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fsensor_rawdatalistsrch = currentSearchForm = new ew.Form("fsensor_rawdatalistsrch");

// Filters
fsensor_rawdatalistsrch.filterList = <?php echo $sensor_rawdata_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$sensor_rawdata->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($sensor_rawdata_list->TotalRecs > 0 && $sensor_rawdata_list->ExportOptions->visible()) { ?>
<?php $sensor_rawdata_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($sensor_rawdata_list->ImportOptions->visible()) { ?>
<?php $sensor_rawdata_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($sensor_rawdata_list->SearchOptions->visible()) { ?>
<?php $sensor_rawdata_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($sensor_rawdata_list->FilterOptions->visible()) { ?>
<?php $sensor_rawdata_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$sensor_rawdata_list->renderOtherOptions();
?>
<?php if (!$sensor_rawdata->isExport() && !$sensor_rawdata->CurrentAction) { ?>
<form name="fsensor_rawdatalistsrch" id="fsensor_rawdatalistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($sensor_rawdata_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fsensor_rawdatalistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="sensor_rawdata">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($sensor_rawdata_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($sensor_rawdata_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $sensor_rawdata_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($sensor_rawdata_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($sensor_rawdata_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($sensor_rawdata_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($sensor_rawdata_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $sensor_rawdata_list->showPageHeader(); ?>
<?php
$sensor_rawdata_list->showMessage();
?>
<?php if ($sensor_rawdata_list->TotalRecs > 0 || $sensor_rawdata->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($sensor_rawdata_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> sensor_rawdata">
<form name="fsensor_rawdatalist" id="fsensor_rawdatalist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sensor_rawdata_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sensor_rawdata_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sensor_rawdata">
<input type="hidden" name="exporttype" id="exporttype" value="">
<div id="gmp_sensor_rawdata" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($sensor_rawdata_list->TotalRecs > 0 || $sensor_rawdata->isGridEdit()) { ?>
<table id="tbl_sensor_rawdatalist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$sensor_rawdata_list->RowType = ROWTYPE_HEADER;

// Render list options
$sensor_rawdata_list->renderListOptions();

// Render list options (header, left)
$sensor_rawdata_list->ListOptions->render("header", "left");
?>
<?php if ($sensor_rawdata->RTLindex->Visible) { // RTLindex ?>
	<?php if ($sensor_rawdata->sortUrl($sensor_rawdata->RTLindex) == "") { ?>
		<th data-name="RTLindex" class="<?php echo $sensor_rawdata->RTLindex->headerCellClass() ?>"><div id="elh_sensor_rawdata_RTLindex" class="sensor_rawdata_RTLindex"><div class="ew-table-header-caption"><?php echo $sensor_rawdata->RTLindex->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RTLindex" class="<?php echo $sensor_rawdata->RTLindex->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sensor_rawdata->SortUrl($sensor_rawdata->RTLindex) ?>',1);"><div id="elh_sensor_rawdata_RTLindex" class="sensor_rawdata_RTLindex">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sensor_rawdata->RTLindex->caption() ?></span><span class="ew-table-header-sort"><?php if ($sensor_rawdata->RTLindex->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sensor_rawdata->RTLindex->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sensor_rawdata->imei->Visible) { // imei ?>
	<?php if ($sensor_rawdata->sortUrl($sensor_rawdata->imei) == "") { ?>
		<th data-name="imei" class="<?php echo $sensor_rawdata->imei->headerCellClass() ?>"><div id="elh_sensor_rawdata_imei" class="sensor_rawdata_imei"><div class="ew-table-header-caption"><?php echo $sensor_rawdata->imei->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="imei" class="<?php echo $sensor_rawdata->imei->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sensor_rawdata->SortUrl($sensor_rawdata->imei) ?>',1);"><div id="elh_sensor_rawdata_imei" class="sensor_rawdata_imei">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sensor_rawdata->imei->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sensor_rawdata->imei->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sensor_rawdata->imei->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sensor_rawdata->GPS_lat->Visible) { // GPS_lat ?>
	<?php if ($sensor_rawdata->sortUrl($sensor_rawdata->GPS_lat) == "") { ?>
		<th data-name="GPS_lat" class="<?php echo $sensor_rawdata->GPS_lat->headerCellClass() ?>"><div id="elh_sensor_rawdata_GPS_lat" class="sensor_rawdata_GPS_lat"><div class="ew-table-header-caption"><?php echo $sensor_rawdata->GPS_lat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GPS_lat" class="<?php echo $sensor_rawdata->GPS_lat->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sensor_rawdata->SortUrl($sensor_rawdata->GPS_lat) ?>',1);"><div id="elh_sensor_rawdata_GPS_lat" class="sensor_rawdata_GPS_lat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sensor_rawdata->GPS_lat->caption() ?></span><span class="ew-table-header-sort"><?php if ($sensor_rawdata->GPS_lat->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sensor_rawdata->GPS_lat->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sensor_rawdata->GPS_lon->Visible) { // GPS_lon ?>
	<?php if ($sensor_rawdata->sortUrl($sensor_rawdata->GPS_lon) == "") { ?>
		<th data-name="GPS_lon" class="<?php echo $sensor_rawdata->GPS_lon->headerCellClass() ?>"><div id="elh_sensor_rawdata_GPS_lon" class="sensor_rawdata_GPS_lon"><div class="ew-table-header-caption"><?php echo $sensor_rawdata->GPS_lon->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GPS_lon" class="<?php echo $sensor_rawdata->GPS_lon->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sensor_rawdata->SortUrl($sensor_rawdata->GPS_lon) ?>',1);"><div id="elh_sensor_rawdata_GPS_lon" class="sensor_rawdata_GPS_lon">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sensor_rawdata->GPS_lon->caption() ?></span><span class="ew-table-header-sort"><?php if ($sensor_rawdata->GPS_lon->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sensor_rawdata->GPS_lon->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sensor_rawdata->timezone->Visible) { // timezone ?>
	<?php if ($sensor_rawdata->sortUrl($sensor_rawdata->timezone) == "") { ?>
		<th data-name="timezone" class="<?php echo $sensor_rawdata->timezone->headerCellClass() ?>"><div id="elh_sensor_rawdata_timezone" class="sensor_rawdata_timezone"><div class="ew-table-header-caption"><?php echo $sensor_rawdata->timezone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="timezone" class="<?php echo $sensor_rawdata->timezone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sensor_rawdata->SortUrl($sensor_rawdata->timezone) ?>',1);"><div id="elh_sensor_rawdata_timezone" class="sensor_rawdata_timezone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sensor_rawdata->timezone->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sensor_rawdata->timezone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sensor_rawdata->timezone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sensor_rawdata->sensor_id->Visible) { // sensor_id ?>
	<?php if ($sensor_rawdata->sortUrl($sensor_rawdata->sensor_id) == "") { ?>
		<th data-name="sensor_id" class="<?php echo $sensor_rawdata->sensor_id->headerCellClass() ?>"><div id="elh_sensor_rawdata_sensor_id" class="sensor_rawdata_sensor_id"><div class="ew-table-header-caption"><?php echo $sensor_rawdata->sensor_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sensor_id" class="<?php echo $sensor_rawdata->sensor_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sensor_rawdata->SortUrl($sensor_rawdata->sensor_id) ?>',1);"><div id="elh_sensor_rawdata_sensor_id" class="sensor_rawdata_sensor_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sensor_rawdata->sensor_id->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sensor_rawdata->sensor_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sensor_rawdata->sensor_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sensor_rawdata->sensor_value->Visible) { // sensor_value ?>
	<?php if ($sensor_rawdata->sortUrl($sensor_rawdata->sensor_value) == "") { ?>
		<th data-name="sensor_value" class="<?php echo $sensor_rawdata->sensor_value->headerCellClass() ?>"><div id="elh_sensor_rawdata_sensor_value" class="sensor_rawdata_sensor_value"><div class="ew-table-header-caption"><?php echo $sensor_rawdata->sensor_value->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sensor_value" class="<?php echo $sensor_rawdata->sensor_value->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sensor_rawdata->SortUrl($sensor_rawdata->sensor_value) ?>',1);"><div id="elh_sensor_rawdata_sensor_value" class="sensor_rawdata_sensor_value">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sensor_rawdata->sensor_value->caption() ?></span><span class="ew-table-header-sort"><?php if ($sensor_rawdata->sensor_value->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sensor_rawdata->sensor_value->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sensor_rawdata->sensor_unit->Visible) { // sensor_unit ?>
	<?php if ($sensor_rawdata->sortUrl($sensor_rawdata->sensor_unit) == "") { ?>
		<th data-name="sensor_unit" class="<?php echo $sensor_rawdata->sensor_unit->headerCellClass() ?>"><div id="elh_sensor_rawdata_sensor_unit" class="sensor_rawdata_sensor_unit"><div class="ew-table-header-caption"><?php echo $sensor_rawdata->sensor_unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sensor_unit" class="<?php echo $sensor_rawdata->sensor_unit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sensor_rawdata->SortUrl($sensor_rawdata->sensor_unit) ?>',1);"><div id="elh_sensor_rawdata_sensor_unit" class="sensor_rawdata_sensor_unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sensor_rawdata->sensor_unit->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sensor_rawdata->sensor_unit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sensor_rawdata->sensor_unit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sensor_rawdata->date_add->Visible) { // date_add ?>
	<?php if ($sensor_rawdata->sortUrl($sensor_rawdata->date_add) == "") { ?>
		<th data-name="date_add" class="<?php echo $sensor_rawdata->date_add->headerCellClass() ?>"><div id="elh_sensor_rawdata_date_add" class="sensor_rawdata_date_add"><div class="ew-table-header-caption"><?php echo $sensor_rawdata->date_add->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="date_add" class="<?php echo $sensor_rawdata->date_add->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sensor_rawdata->SortUrl($sensor_rawdata->date_add) ?>',1);"><div id="elh_sensor_rawdata_date_add" class="sensor_rawdata_date_add">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sensor_rawdata->date_add->caption() ?></span><span class="ew-table-header-sort"><?php if ($sensor_rawdata->date_add->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sensor_rawdata->date_add->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sensor_rawdata->blockn->Visible) { // blockn ?>
	<?php if ($sensor_rawdata->sortUrl($sensor_rawdata->blockn) == "") { ?>
		<th data-name="blockn" class="<?php echo $sensor_rawdata->blockn->headerCellClass() ?>"><div id="elh_sensor_rawdata_blockn" class="sensor_rawdata_blockn"><div class="ew-table-header-caption"><?php echo $sensor_rawdata->blockn->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="blockn" class="<?php echo $sensor_rawdata->blockn->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sensor_rawdata->SortUrl($sensor_rawdata->blockn) ?>',1);"><div id="elh_sensor_rawdata_blockn" class="sensor_rawdata_blockn">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sensor_rawdata->blockn->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sensor_rawdata->blockn->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sensor_rawdata->blockn->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$sensor_rawdata_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($sensor_rawdata->ExportAll && $sensor_rawdata->isExport()) {
	$sensor_rawdata_list->StopRec = $sensor_rawdata_list->TotalRecs;
} else {

	// Set the last record to display
	if ($sensor_rawdata_list->TotalRecs > $sensor_rawdata_list->StartRec + $sensor_rawdata_list->DisplayRecs - 1)
		$sensor_rawdata_list->StopRec = $sensor_rawdata_list->StartRec + $sensor_rawdata_list->DisplayRecs - 1;
	else
		$sensor_rawdata_list->StopRec = $sensor_rawdata_list->TotalRecs;
}
$sensor_rawdata_list->RecCnt = $sensor_rawdata_list->StartRec - 1;
if ($sensor_rawdata_list->Recordset && !$sensor_rawdata_list->Recordset->EOF) {
	$sensor_rawdata_list->Recordset->moveFirst();
	$selectLimit = $sensor_rawdata_list->UseSelectLimit;
	if (!$selectLimit && $sensor_rawdata_list->StartRec > 1)
		$sensor_rawdata_list->Recordset->move($sensor_rawdata_list->StartRec - 1);
} elseif (!$sensor_rawdata->AllowAddDeleteRow && $sensor_rawdata_list->StopRec == 0) {
	$sensor_rawdata_list->StopRec = $sensor_rawdata->GridAddRowCount;
}

// Initialize aggregate
$sensor_rawdata->RowType = ROWTYPE_AGGREGATEINIT;
$sensor_rawdata->resetAttributes();
$sensor_rawdata_list->renderRow();
while ($sensor_rawdata_list->RecCnt < $sensor_rawdata_list->StopRec) {
	$sensor_rawdata_list->RecCnt++;
	if ($sensor_rawdata_list->RecCnt >= $sensor_rawdata_list->StartRec) {
		$sensor_rawdata_list->RowCnt++;

		// Set up key count
		$sensor_rawdata_list->KeyCount = $sensor_rawdata_list->RowIndex;

		// Init row class and style
		$sensor_rawdata->resetAttributes();
		$sensor_rawdata->CssClass = "";
		if ($sensor_rawdata->isGridAdd()) {
		} else {
			$sensor_rawdata_list->loadRowValues($sensor_rawdata_list->Recordset); // Load row values
		}
		$sensor_rawdata->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$sensor_rawdata->RowAttrs = array_merge($sensor_rawdata->RowAttrs, array('data-rowindex'=>$sensor_rawdata_list->RowCnt, 'id'=>'r' . $sensor_rawdata_list->RowCnt . '_sensor_rawdata', 'data-rowtype'=>$sensor_rawdata->RowType));

		// Render row
		$sensor_rawdata_list->renderRow();

		// Render list options
		$sensor_rawdata_list->renderListOptions();
?>
	<tr<?php echo $sensor_rawdata->rowAttributes() ?>>
<?php

// Render list options (body, left)
$sensor_rawdata_list->ListOptions->render("body", "left", $sensor_rawdata_list->RowCnt);
?>
	<?php if ($sensor_rawdata->RTLindex->Visible) { // RTLindex ?>
		<td data-name="RTLindex"<?php echo $sensor_rawdata->RTLindex->cellAttributes() ?>>
<span id="el<?php echo $sensor_rawdata_list->RowCnt ?>_sensor_rawdata_RTLindex" class="sensor_rawdata_RTLindex">
<span<?php echo $sensor_rawdata->RTLindex->viewAttributes() ?>>
<?php echo $sensor_rawdata->RTLindex->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sensor_rawdata->imei->Visible) { // imei ?>
		<td data-name="imei"<?php echo $sensor_rawdata->imei->cellAttributes() ?>>
<span id="el<?php echo $sensor_rawdata_list->RowCnt ?>_sensor_rawdata_imei" class="sensor_rawdata_imei">
<span<?php echo $sensor_rawdata->imei->viewAttributes() ?>>
<?php echo $sensor_rawdata->imei->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sensor_rawdata->GPS_lat->Visible) { // GPS_lat ?>
		<td data-name="GPS_lat"<?php echo $sensor_rawdata->GPS_lat->cellAttributes() ?>>
<span id="el<?php echo $sensor_rawdata_list->RowCnt ?>_sensor_rawdata_GPS_lat" class="sensor_rawdata_GPS_lat">
<span<?php echo $sensor_rawdata->GPS_lat->viewAttributes() ?>>
<?php echo $sensor_rawdata->GPS_lat->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sensor_rawdata->GPS_lon->Visible) { // GPS_lon ?>
		<td data-name="GPS_lon"<?php echo $sensor_rawdata->GPS_lon->cellAttributes() ?>>
<span id="el<?php echo $sensor_rawdata_list->RowCnt ?>_sensor_rawdata_GPS_lon" class="sensor_rawdata_GPS_lon">
<span<?php echo $sensor_rawdata->GPS_lon->viewAttributes() ?>>
<?php echo $sensor_rawdata->GPS_lon->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sensor_rawdata->timezone->Visible) { // timezone ?>
		<td data-name="timezone"<?php echo $sensor_rawdata->timezone->cellAttributes() ?>>
<span id="el<?php echo $sensor_rawdata_list->RowCnt ?>_sensor_rawdata_timezone" class="sensor_rawdata_timezone">
<span<?php echo $sensor_rawdata->timezone->viewAttributes() ?>>
<?php echo $sensor_rawdata->timezone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sensor_rawdata->sensor_id->Visible) { // sensor_id ?>
		<td data-name="sensor_id"<?php echo $sensor_rawdata->sensor_id->cellAttributes() ?>>
<span id="el<?php echo $sensor_rawdata_list->RowCnt ?>_sensor_rawdata_sensor_id" class="sensor_rawdata_sensor_id">
<span<?php echo $sensor_rawdata->sensor_id->viewAttributes() ?>>
<?php echo $sensor_rawdata->sensor_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sensor_rawdata->sensor_value->Visible) { // sensor_value ?>
		<td data-name="sensor_value"<?php echo $sensor_rawdata->sensor_value->cellAttributes() ?>>
<span id="el<?php echo $sensor_rawdata_list->RowCnt ?>_sensor_rawdata_sensor_value" class="sensor_rawdata_sensor_value">
<span<?php echo $sensor_rawdata->sensor_value->viewAttributes() ?>>
<?php echo $sensor_rawdata->sensor_value->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sensor_rawdata->sensor_unit->Visible) { // sensor_unit ?>
		<td data-name="sensor_unit"<?php echo $sensor_rawdata->sensor_unit->cellAttributes() ?>>
<span id="el<?php echo $sensor_rawdata_list->RowCnt ?>_sensor_rawdata_sensor_unit" class="sensor_rawdata_sensor_unit">
<span<?php echo $sensor_rawdata->sensor_unit->viewAttributes() ?>>
<?php echo $sensor_rawdata->sensor_unit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sensor_rawdata->date_add->Visible) { // date_add ?>
		<td data-name="date_add"<?php echo $sensor_rawdata->date_add->cellAttributes() ?>>
<span id="el<?php echo $sensor_rawdata_list->RowCnt ?>_sensor_rawdata_date_add" class="sensor_rawdata_date_add">
<span<?php echo $sensor_rawdata->date_add->viewAttributes() ?>>
<?php echo $sensor_rawdata->date_add->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sensor_rawdata->blockn->Visible) { // blockn ?>
		<td data-name="blockn"<?php echo $sensor_rawdata->blockn->cellAttributes() ?>>
<span id="el<?php echo $sensor_rawdata_list->RowCnt ?>_sensor_rawdata_blockn" class="sensor_rawdata_blockn">
<span<?php echo $sensor_rawdata->blockn->viewAttributes() ?>>
<?php echo $sensor_rawdata->blockn->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$sensor_rawdata_list->ListOptions->render("body", "right", $sensor_rawdata_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$sensor_rawdata->isGridAdd())
		$sensor_rawdata_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$sensor_rawdata->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($sensor_rawdata_list->Recordset)
	$sensor_rawdata_list->Recordset->Close();
?>
<?php if (!$sensor_rawdata->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$sensor_rawdata->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($sensor_rawdata_list->Pager)) $sensor_rawdata_list->Pager = new PrevNextPager($sensor_rawdata_list->StartRec, $sensor_rawdata_list->DisplayRecs, $sensor_rawdata_list->TotalRecs, $sensor_rawdata_list->AutoHidePager) ?>
<?php if ($sensor_rawdata_list->Pager->RecordCount > 0 && $sensor_rawdata_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($sensor_rawdata_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $sensor_rawdata_list->pageUrl() ?>start=<?php echo $sensor_rawdata_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($sensor_rawdata_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $sensor_rawdata_list->pageUrl() ?>start=<?php echo $sensor_rawdata_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $sensor_rawdata_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($sensor_rawdata_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $sensor_rawdata_list->pageUrl() ?>start=<?php echo $sensor_rawdata_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($sensor_rawdata_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $sensor_rawdata_list->pageUrl() ?>start=<?php echo $sensor_rawdata_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $sensor_rawdata_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($sensor_rawdata_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $sensor_rawdata_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $sensor_rawdata_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $sensor_rawdata_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($sensor_rawdata_list->TotalRecs > 0 && (!$sensor_rawdata_list->AutoHidePageSizeSelector || $sensor_rawdata_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="sensor_rawdata">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->Phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($sensor_rawdata_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($sensor_rawdata_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($sensor_rawdata_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($sensor_rawdata->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($sensor_rawdata_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($sensor_rawdata_list->TotalRecs == 0 && !$sensor_rawdata->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($sensor_rawdata_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$sensor_rawdata_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$sensor_rawdata->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");
// Write your table-specific startup script here
// document.write("page loaded");

</script>
	<fieldset>
		<legend>
			<font color="#ff0000">pH值</font>紀錄圖
		</legend>
		<div style="width:50%">
			<div>
				<canvas id="canvasPH" height="700" width="1500"></canvas>
			</div>
		</div>
		<legend>
			<font color="#97bbcd">溫度</font>紀錄圖
		</legend>
		<div style="width:50%">
			<div>
				<canvas id="canvasTM" height="700" width="1500"></canvas>
			</div>
		</div>
		<legend>
			<font color="#0000ff">導電度</font>紀錄圖
		</legend>
		<div style="width:50%">
			<div>
				<canvas id="canvasEC" height="700" width="1500"></canvas>
			</div>
		</div>
	</fieldset>
	<script src="Chart.js"></script>
	<script>
		var ibName = <?php echo json_encode($ibName); ?>;
		var PH = <?php echo json_encode($PH); ?>;
		var TM = <?php echo json_encode($TM); ?>;
		var EC = <?php echo json_encode($EC); ?>;
		var LasTime = <?php echo json_encode($LasTime); ?>;
LasTime.shift();
PH.shift();
TM.shift();
EC.shift();
ibName.shift();
LasTime.shift();
PH.shift();
TM.shift();
EC.shift();
ibName.shift();

	//LasTime.filter(function(val) { return val !== null; }).join(", ");
//	document.write(LasTime);
//	document.write(PH);

		var lineChartDataPH = {
			labels : LasTime,
			datasets : [
				{
					label: "pH",
					fillColor : "rgba(255, 0, 0, 0)",
					strokeColor : "rgba(255,0,0,1)",
					pointColor : "rgba(255,0,0,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : PH
				}
			]
		}
		var lineChartDataTM = {
			labels : LasTime,
			datasets : [
				{
					label: "TM",
					fillColor : "rgba(151,187,205,0)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : TM
				}
			]
		}
		var lineChartDataEC = {
			labels : LasTime,
			datasets : [
					{
					label: "EC",
					fillColor : "rgba(0,0,255,0)",
					strokeColor : "rgba(0,0,255,1)",
					pointColor : "rgba(0,0,255,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,3,205,1)",
					data : EC
				}
			]
		}
	window.onload = function(){
		var ctxPH = document.getElementById("canvasPH").getContext("2d");
		window.myLine = new Chart(ctxPH).Line(lineChartDataPH, {
			responsive: true
		});
		var ctxTM = document.getElementById("canvasTM").getContext("2d");
		window.myLine = new Chart(ctxTM).Line(lineChartDataTM, {
			responsive: true
		});
		var ctxEC = document.getElementById("canvasEC").getContext("2d");
		window.myLine = new Chart(ctxEC).Line(lineChartDataEC, {
			responsive: true
		});
	}
</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$sensor_rawdata_list->terminate();
?>
