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
$phone_basic_list = new phone_basic_list();

// Run the page
$phone_basic_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$phone_basic_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$phone_basic->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fphone_basiclist = currentForm = new ew.Form("fphone_basiclist", "list");
fphone_basiclist.formKeyCountName = '<?php echo $phone_basic_list->FormKeyCountName ?>';

// Form_CustomValidate event
fphone_basiclist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fphone_basiclist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fphone_basiclistsrch = currentSearchForm = new ew.Form("fphone_basiclistsrch");

// Filters
fphone_basiclistsrch.filterList = <?php echo $phone_basic_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$phone_basic->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($phone_basic_list->TotalRecs > 0 && $phone_basic_list->ExportOptions->visible()) { ?>
<?php $phone_basic_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($phone_basic_list->ImportOptions->visible()) { ?>
<?php $phone_basic_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($phone_basic_list->SearchOptions->visible()) { ?>
<?php $phone_basic_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($phone_basic_list->FilterOptions->visible()) { ?>
<?php $phone_basic_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$phone_basic_list->renderOtherOptions();
?>
<?php if (!$phone_basic->isExport() && !$phone_basic->CurrentAction) { ?>
<form name="fphone_basiclistsrch" id="fphone_basiclistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($phone_basic_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fphone_basiclistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="phone_basic">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($phone_basic_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($phone_basic_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $phone_basic_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($phone_basic_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($phone_basic_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($phone_basic_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($phone_basic_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $phone_basic_list->showPageHeader(); ?>
<?php
$phone_basic_list->showMessage();
?>
<?php if ($phone_basic_list->TotalRecs > 0 || $phone_basic->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($phone_basic_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> phone_basic">
<form name="fphone_basiclist" id="fphone_basiclist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($phone_basic_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $phone_basic_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="phone_basic">
<input type="hidden" name="exporttype" id="exporttype" value="">
<div id="gmp_phone_basic" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($phone_basic_list->TotalRecs > 0 || $phone_basic->isGridEdit()) { ?>
<table id="tbl_phone_basiclist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$phone_basic_list->RowType = ROWTYPE_HEADER;

// Render list options
$phone_basic_list->renderListOptions();

// Render list options (header, left)
$phone_basic_list->ListOptions->render("header", "left");
?>
<?php if ($phone_basic->imei->Visible) { // imei ?>
	<?php if ($phone_basic->sortUrl($phone_basic->imei) == "") { ?>
		<th data-name="imei" class="<?php echo $phone_basic->imei->headerCellClass() ?>"><div id="elh_phone_basic_imei" class="phone_basic_imei"><div class="ew-table-header-caption"><?php echo $phone_basic->imei->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="imei" class="<?php echo $phone_basic->imei->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $phone_basic->SortUrl($phone_basic->imei) ?>',1);"><div id="elh_phone_basic_imei" class="phone_basic_imei">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $phone_basic->imei->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($phone_basic->imei->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($phone_basic->imei->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($phone_basic->phone_name->Visible) { // phone_name ?>
	<?php if ($phone_basic->sortUrl($phone_basic->phone_name) == "") { ?>
		<th data-name="phone_name" class="<?php echo $phone_basic->phone_name->headerCellClass() ?>"><div id="elh_phone_basic_phone_name" class="phone_basic_phone_name"><div class="ew-table-header-caption"><?php echo $phone_basic->phone_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="phone_name" class="<?php echo $phone_basic->phone_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $phone_basic->SortUrl($phone_basic->phone_name) ?>',1);"><div id="elh_phone_basic_phone_name" class="phone_basic_phone_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $phone_basic->phone_name->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($phone_basic->phone_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($phone_basic->phone_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($phone_basic->date_add->Visible) { // date_add ?>
	<?php if ($phone_basic->sortUrl($phone_basic->date_add) == "") { ?>
		<th data-name="date_add" class="<?php echo $phone_basic->date_add->headerCellClass() ?>"><div id="elh_phone_basic_date_add" class="phone_basic_date_add"><div class="ew-table-header-caption"><?php echo $phone_basic->date_add->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="date_add" class="<?php echo $phone_basic->date_add->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $phone_basic->SortUrl($phone_basic->date_add) ?>',1);"><div id="elh_phone_basic_date_add" class="phone_basic_date_add">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $phone_basic->date_add->caption() ?></span><span class="ew-table-header-sort"><?php if ($phone_basic->date_add->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($phone_basic->date_add->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($phone_basic->app_version->Visible) { // app_version ?>
	<?php if ($phone_basic->sortUrl($phone_basic->app_version) == "") { ?>
		<th data-name="app_version" class="<?php echo $phone_basic->app_version->headerCellClass() ?>"><div id="elh_phone_basic_app_version" class="phone_basic_app_version"><div class="ew-table-header-caption"><?php echo $phone_basic->app_version->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="app_version" class="<?php echo $phone_basic->app_version->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $phone_basic->SortUrl($phone_basic->app_version) ?>',1);"><div id="elh_phone_basic_app_version" class="phone_basic_app_version">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $phone_basic->app_version->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($phone_basic->app_version->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($phone_basic->app_version->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($phone_basic->phone_num->Visible) { // phone_num ?>
	<?php if ($phone_basic->sortUrl($phone_basic->phone_num) == "") { ?>
		<th data-name="phone_num" class="<?php echo $phone_basic->phone_num->headerCellClass() ?>"><div id="elh_phone_basic_phone_num" class="phone_basic_phone_num"><div class="ew-table-header-caption"><?php echo $phone_basic->phone_num->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="phone_num" class="<?php echo $phone_basic->phone_num->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $phone_basic->SortUrl($phone_basic->phone_num) ?>',1);"><div id="elh_phone_basic_phone_num" class="phone_basic_phone_num">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $phone_basic->phone_num->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($phone_basic->phone_num->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($phone_basic->phone_num->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($phone_basic->phone_wifi_mac->Visible) { // phone_wifi_mac ?>
	<?php if ($phone_basic->sortUrl($phone_basic->phone_wifi_mac) == "") { ?>
		<th data-name="phone_wifi_mac" class="<?php echo $phone_basic->phone_wifi_mac->headerCellClass() ?>"><div id="elh_phone_basic_phone_wifi_mac" class="phone_basic_phone_wifi_mac"><div class="ew-table-header-caption"><?php echo $phone_basic->phone_wifi_mac->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="phone_wifi_mac" class="<?php echo $phone_basic->phone_wifi_mac->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $phone_basic->SortUrl($phone_basic->phone_wifi_mac) ?>',1);"><div id="elh_phone_basic_phone_wifi_mac" class="phone_basic_phone_wifi_mac">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $phone_basic->phone_wifi_mac->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($phone_basic->phone_wifi_mac->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($phone_basic->phone_wifi_mac->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($phone_basic->active->Visible) { // active ?>
	<?php if ($phone_basic->sortUrl($phone_basic->active) == "") { ?>
		<th data-name="active" class="<?php echo $phone_basic->active->headerCellClass() ?>"><div id="elh_phone_basic_active" class="phone_basic_active"><div class="ew-table-header-caption"><?php echo $phone_basic->active->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="active" class="<?php echo $phone_basic->active->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $phone_basic->SortUrl($phone_basic->active) ?>',1);"><div id="elh_phone_basic_active" class="phone_basic_active">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $phone_basic->active->caption() ?></span><span class="ew-table-header-sort"><?php if ($phone_basic->active->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($phone_basic->active->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($phone_basic->app_name->Visible) { // app_name ?>
	<?php if ($phone_basic->sortUrl($phone_basic->app_name) == "") { ?>
		<th data-name="app_name" class="<?php echo $phone_basic->app_name->headerCellClass() ?>"><div id="elh_phone_basic_app_name" class="phone_basic_app_name"><div class="ew-table-header-caption"><?php echo $phone_basic->app_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="app_name" class="<?php echo $phone_basic->app_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $phone_basic->SortUrl($phone_basic->app_name) ?>',1);"><div id="elh_phone_basic_app_name" class="phone_basic_app_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $phone_basic->app_name->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($phone_basic->app_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($phone_basic->app_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($phone_basic->RTLindex->Visible) { // RTLindex ?>
	<?php if ($phone_basic->sortUrl($phone_basic->RTLindex) == "") { ?>
		<th data-name="RTLindex" class="<?php echo $phone_basic->RTLindex->headerCellClass() ?>"><div id="elh_phone_basic_RTLindex" class="phone_basic_RTLindex"><div class="ew-table-header-caption"><?php echo $phone_basic->RTLindex->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RTLindex" class="<?php echo $phone_basic->RTLindex->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $phone_basic->SortUrl($phone_basic->RTLindex) ?>',1);"><div id="elh_phone_basic_RTLindex" class="phone_basic_RTLindex">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $phone_basic->RTLindex->caption() ?></span><span class="ew-table-header-sort"><?php if ($phone_basic->RTLindex->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($phone_basic->RTLindex->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$phone_basic_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($phone_basic->ExportAll && $phone_basic->isExport()) {
	$phone_basic_list->StopRec = $phone_basic_list->TotalRecs;
} else {

	// Set the last record to display
	if ($phone_basic_list->TotalRecs > $phone_basic_list->StartRec + $phone_basic_list->DisplayRecs - 1)
		$phone_basic_list->StopRec = $phone_basic_list->StartRec + $phone_basic_list->DisplayRecs - 1;
	else
		$phone_basic_list->StopRec = $phone_basic_list->TotalRecs;
}
$phone_basic_list->RecCnt = $phone_basic_list->StartRec - 1;
if ($phone_basic_list->Recordset && !$phone_basic_list->Recordset->EOF) {
	$phone_basic_list->Recordset->moveFirst();
	$selectLimit = $phone_basic_list->UseSelectLimit;
	if (!$selectLimit && $phone_basic_list->StartRec > 1)
		$phone_basic_list->Recordset->move($phone_basic_list->StartRec - 1);
} elseif (!$phone_basic->AllowAddDeleteRow && $phone_basic_list->StopRec == 0) {
	$phone_basic_list->StopRec = $phone_basic->GridAddRowCount;
}

// Initialize aggregate
$phone_basic->RowType = ROWTYPE_AGGREGATEINIT;
$phone_basic->resetAttributes();
$phone_basic_list->renderRow();
while ($phone_basic_list->RecCnt < $phone_basic_list->StopRec) {
	$phone_basic_list->RecCnt++;
	if ($phone_basic_list->RecCnt >= $phone_basic_list->StartRec) {
		$phone_basic_list->RowCnt++;

		// Set up key count
		$phone_basic_list->KeyCount = $phone_basic_list->RowIndex;

		// Init row class and style
		$phone_basic->resetAttributes();
		$phone_basic->CssClass = "";
		if ($phone_basic->isGridAdd()) {
		} else {
			$phone_basic_list->loadRowValues($phone_basic_list->Recordset); // Load row values
		}
		$phone_basic->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$phone_basic->RowAttrs = array_merge($phone_basic->RowAttrs, array('data-rowindex'=>$phone_basic_list->RowCnt, 'id'=>'r' . $phone_basic_list->RowCnt . '_phone_basic', 'data-rowtype'=>$phone_basic->RowType));

		// Render row
		$phone_basic_list->renderRow();

		// Render list options
		$phone_basic_list->renderListOptions();
?>
	<tr<?php echo $phone_basic->rowAttributes() ?>>
<?php

// Render list options (body, left)
$phone_basic_list->ListOptions->render("body", "left", $phone_basic_list->RowCnt);
?>
	<?php if ($phone_basic->imei->Visible) { // imei ?>
		<td data-name="imei"<?php echo $phone_basic->imei->cellAttributes() ?>>
<span id="el<?php echo $phone_basic_list->RowCnt ?>_phone_basic_imei" class="phone_basic_imei">
<span<?php echo $phone_basic->imei->viewAttributes() ?>>
<?php echo $phone_basic->imei->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($phone_basic->phone_name->Visible) { // phone_name ?>
		<td data-name="phone_name"<?php echo $phone_basic->phone_name->cellAttributes() ?>>
<span id="el<?php echo $phone_basic_list->RowCnt ?>_phone_basic_phone_name" class="phone_basic_phone_name">
<span<?php echo $phone_basic->phone_name->viewAttributes() ?>>
<?php echo $phone_basic->phone_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($phone_basic->date_add->Visible) { // date_add ?>
		<td data-name="date_add"<?php echo $phone_basic->date_add->cellAttributes() ?>>
<span id="el<?php echo $phone_basic_list->RowCnt ?>_phone_basic_date_add" class="phone_basic_date_add">
<span<?php echo $phone_basic->date_add->viewAttributes() ?>>
<?php echo $phone_basic->date_add->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($phone_basic->app_version->Visible) { // app_version ?>
		<td data-name="app_version"<?php echo $phone_basic->app_version->cellAttributes() ?>>
<span id="el<?php echo $phone_basic_list->RowCnt ?>_phone_basic_app_version" class="phone_basic_app_version">
<span<?php echo $phone_basic->app_version->viewAttributes() ?>>
<?php echo $phone_basic->app_version->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($phone_basic->phone_num->Visible) { // phone_num ?>
		<td data-name="phone_num"<?php echo $phone_basic->phone_num->cellAttributes() ?>>
<span id="el<?php echo $phone_basic_list->RowCnt ?>_phone_basic_phone_num" class="phone_basic_phone_num">
<span<?php echo $phone_basic->phone_num->viewAttributes() ?>>
<?php echo $phone_basic->phone_num->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($phone_basic->phone_wifi_mac->Visible) { // phone_wifi_mac ?>
		<td data-name="phone_wifi_mac"<?php echo $phone_basic->phone_wifi_mac->cellAttributes() ?>>
<span id="el<?php echo $phone_basic_list->RowCnt ?>_phone_basic_phone_wifi_mac" class="phone_basic_phone_wifi_mac">
<span<?php echo $phone_basic->phone_wifi_mac->viewAttributes() ?>>
<?php echo $phone_basic->phone_wifi_mac->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($phone_basic->active->Visible) { // active ?>
		<td data-name="active"<?php echo $phone_basic->active->cellAttributes() ?>>
<span id="el<?php echo $phone_basic_list->RowCnt ?>_phone_basic_active" class="phone_basic_active">
<span<?php echo $phone_basic->active->viewAttributes() ?>>
<?php echo $phone_basic->active->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($phone_basic->app_name->Visible) { // app_name ?>
		<td data-name="app_name"<?php echo $phone_basic->app_name->cellAttributes() ?>>
<span id="el<?php echo $phone_basic_list->RowCnt ?>_phone_basic_app_name" class="phone_basic_app_name">
<span<?php echo $phone_basic->app_name->viewAttributes() ?>>
<?php echo $phone_basic->app_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($phone_basic->RTLindex->Visible) { // RTLindex ?>
		<td data-name="RTLindex"<?php echo $phone_basic->RTLindex->cellAttributes() ?>>
<span id="el<?php echo $phone_basic_list->RowCnt ?>_phone_basic_RTLindex" class="phone_basic_RTLindex">
<span<?php echo $phone_basic->RTLindex->viewAttributes() ?>>
<?php echo $phone_basic->RTLindex->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$phone_basic_list->ListOptions->render("body", "right", $phone_basic_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$phone_basic->isGridAdd())
		$phone_basic_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$phone_basic->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($phone_basic_list->Recordset)
	$phone_basic_list->Recordset->Close();
?>
<?php if (!$phone_basic->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$phone_basic->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($phone_basic_list->Pager)) $phone_basic_list->Pager = new PrevNextPager($phone_basic_list->StartRec, $phone_basic_list->DisplayRecs, $phone_basic_list->TotalRecs, $phone_basic_list->AutoHidePager) ?>
<?php if ($phone_basic_list->Pager->RecordCount > 0 && $phone_basic_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($phone_basic_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $phone_basic_list->pageUrl() ?>start=<?php echo $phone_basic_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($phone_basic_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $phone_basic_list->pageUrl() ?>start=<?php echo $phone_basic_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $phone_basic_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($phone_basic_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $phone_basic_list->pageUrl() ?>start=<?php echo $phone_basic_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($phone_basic_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $phone_basic_list->pageUrl() ?>start=<?php echo $phone_basic_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $phone_basic_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($phone_basic_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $phone_basic_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $phone_basic_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $phone_basic_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($phone_basic_list->TotalRecs > 0 && (!$phone_basic_list->AutoHidePageSizeSelector || $phone_basic_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="phone_basic">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->Phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($phone_basic_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($phone_basic_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($phone_basic_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($phone_basic->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($phone_basic_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($phone_basic_list->TotalRecs == 0 && !$phone_basic->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($phone_basic_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$phone_basic_list->showPageFooter();
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
$phone_basic_list->terminate();
?>
