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
$alarm_basic_list = new alarm_basic_list();

// Run the page
$alarm_basic_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$alarm_basic_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$alarm_basic->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var falarm_basiclist = currentForm = new ew.Form("falarm_basiclist", "list");
falarm_basiclist.formKeyCountName = '<?php echo $alarm_basic_list->FormKeyCountName ?>';

// Form_CustomValidate event
falarm_basiclist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
falarm_basiclist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var falarm_basiclistsrch = currentSearchForm = new ew.Form("falarm_basiclistsrch");

// Filters
falarm_basiclistsrch.filterList = <?php echo $alarm_basic_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$alarm_basic->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($alarm_basic_list->TotalRecs > 0 && $alarm_basic_list->ExportOptions->visible()) { ?>
<?php $alarm_basic_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($alarm_basic_list->ImportOptions->visible()) { ?>
<?php $alarm_basic_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($alarm_basic_list->SearchOptions->visible()) { ?>
<?php $alarm_basic_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($alarm_basic_list->FilterOptions->visible()) { ?>
<?php $alarm_basic_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$alarm_basic_list->renderOtherOptions();
?>
<?php if (!$alarm_basic->isExport() && !$alarm_basic->CurrentAction) { ?>
<form name="falarm_basiclistsrch" id="falarm_basiclistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($alarm_basic_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="falarm_basiclistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="alarm_basic">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($alarm_basic_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($alarm_basic_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $alarm_basic_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($alarm_basic_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($alarm_basic_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($alarm_basic_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($alarm_basic_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $alarm_basic_list->showPageHeader(); ?>
<?php
$alarm_basic_list->showMessage();
?>
<?php if ($alarm_basic_list->TotalRecs > 0 || $alarm_basic->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($alarm_basic_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> alarm_basic">
<form name="falarm_basiclist" id="falarm_basiclist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($alarm_basic_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $alarm_basic_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="alarm_basic">
<input type="hidden" name="exporttype" id="exporttype" value="">
<div id="gmp_alarm_basic" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($alarm_basic_list->TotalRecs > 0 || $alarm_basic->isGridEdit()) { ?>
<table id="tbl_alarm_basiclist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$alarm_basic_list->RowType = ROWTYPE_HEADER;

// Render list options
$alarm_basic_list->renderListOptions();

// Render list options (header, left)
$alarm_basic_list->ListOptions->render("header", "left");
?>
<?php if ($alarm_basic->RTLindex->Visible) { // RTLindex ?>
	<?php if ($alarm_basic->sortUrl($alarm_basic->RTLindex) == "") { ?>
		<th data-name="RTLindex" class="<?php echo $alarm_basic->RTLindex->headerCellClass() ?>"><div id="elh_alarm_basic_RTLindex" class="alarm_basic_RTLindex"><div class="ew-table-header-caption"><?php echo $alarm_basic->RTLindex->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RTLindex" class="<?php echo $alarm_basic->RTLindex->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $alarm_basic->SortUrl($alarm_basic->RTLindex) ?>',1);"><div id="elh_alarm_basic_RTLindex" class="alarm_basic_RTLindex">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $alarm_basic->RTLindex->caption() ?></span><span class="ew-table-header-sort"><?php if ($alarm_basic->RTLindex->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($alarm_basic->RTLindex->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($alarm_basic->sensor_id->Visible) { // sensor_id ?>
	<?php if ($alarm_basic->sortUrl($alarm_basic->sensor_id) == "") { ?>
		<th data-name="sensor_id" class="<?php echo $alarm_basic->sensor_id->headerCellClass() ?>"><div id="elh_alarm_basic_sensor_id" class="alarm_basic_sensor_id"><div class="ew-table-header-caption"><?php echo $alarm_basic->sensor_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sensor_id" class="<?php echo $alarm_basic->sensor_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $alarm_basic->SortUrl($alarm_basic->sensor_id) ?>',1);"><div id="elh_alarm_basic_sensor_id" class="alarm_basic_sensor_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $alarm_basic->sensor_id->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($alarm_basic->sensor_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($alarm_basic->sensor_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($alarm_basic->value_max->Visible) { // value_max ?>
	<?php if ($alarm_basic->sortUrl($alarm_basic->value_max) == "") { ?>
		<th data-name="value_max" class="<?php echo $alarm_basic->value_max->headerCellClass() ?>"><div id="elh_alarm_basic_value_max" class="alarm_basic_value_max"><div class="ew-table-header-caption"><?php echo $alarm_basic->value_max->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_max" class="<?php echo $alarm_basic->value_max->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $alarm_basic->SortUrl($alarm_basic->value_max) ?>',1);"><div id="elh_alarm_basic_value_max" class="alarm_basic_value_max">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $alarm_basic->value_max->caption() ?></span><span class="ew-table-header-sort"><?php if ($alarm_basic->value_max->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($alarm_basic->value_max->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($alarm_basic->value_min->Visible) { // value_min ?>
	<?php if ($alarm_basic->sortUrl($alarm_basic->value_min) == "") { ?>
		<th data-name="value_min" class="<?php echo $alarm_basic->value_min->headerCellClass() ?>"><div id="elh_alarm_basic_value_min" class="alarm_basic_value_min"><div class="ew-table-header-caption"><?php echo $alarm_basic->value_min->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value_min" class="<?php echo $alarm_basic->value_min->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $alarm_basic->SortUrl($alarm_basic->value_min) ?>',1);"><div id="elh_alarm_basic_value_min" class="alarm_basic_value_min">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $alarm_basic->value_min->caption() ?></span><span class="ew-table-header-sort"><?php if ($alarm_basic->value_min->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($alarm_basic->value_min->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($alarm_basic->delaytime->Visible) { // delaytime ?>
	<?php if ($alarm_basic->sortUrl($alarm_basic->delaytime) == "") { ?>
		<th data-name="delaytime" class="<?php echo $alarm_basic->delaytime->headerCellClass() ?>"><div id="elh_alarm_basic_delaytime" class="alarm_basic_delaytime"><div class="ew-table-header-caption"><?php echo $alarm_basic->delaytime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="delaytime" class="<?php echo $alarm_basic->delaytime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $alarm_basic->SortUrl($alarm_basic->delaytime) ?>',1);"><div id="elh_alarm_basic_delaytime" class="alarm_basic_delaytime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $alarm_basic->delaytime->caption() ?></span><span class="ew-table-header-sort"><?php if ($alarm_basic->delaytime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($alarm_basic->delaytime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($alarm_basic->date_add->Visible) { // date_add ?>
	<?php if ($alarm_basic->sortUrl($alarm_basic->date_add) == "") { ?>
		<th data-name="date_add" class="<?php echo $alarm_basic->date_add->headerCellClass() ?>"><div id="elh_alarm_basic_date_add" class="alarm_basic_date_add"><div class="ew-table-header-caption"><?php echo $alarm_basic->date_add->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="date_add" class="<?php echo $alarm_basic->date_add->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $alarm_basic->SortUrl($alarm_basic->date_add) ?>',1);"><div id="elh_alarm_basic_date_add" class="alarm_basic_date_add">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $alarm_basic->date_add->caption() ?></span><span class="ew-table-header-sort"><?php if ($alarm_basic->date_add->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($alarm_basic->date_add->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($alarm_basic->date_modified->Visible) { // date_modified ?>
	<?php if ($alarm_basic->sortUrl($alarm_basic->date_modified) == "") { ?>
		<th data-name="date_modified" class="<?php echo $alarm_basic->date_modified->headerCellClass() ?>"><div id="elh_alarm_basic_date_modified" class="alarm_basic_date_modified"><div class="ew-table-header-caption"><?php echo $alarm_basic->date_modified->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="date_modified" class="<?php echo $alarm_basic->date_modified->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $alarm_basic->SortUrl($alarm_basic->date_modified) ?>',1);"><div id="elh_alarm_basic_date_modified" class="alarm_basic_date_modified">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $alarm_basic->date_modified->caption() ?></span><span class="ew-table-header-sort"><?php if ($alarm_basic->date_modified->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($alarm_basic->date_modified->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($alarm_basic->user_add->Visible) { // user_add ?>
	<?php if ($alarm_basic->sortUrl($alarm_basic->user_add) == "") { ?>
		<th data-name="user_add" class="<?php echo $alarm_basic->user_add->headerCellClass() ?>"><div id="elh_alarm_basic_user_add" class="alarm_basic_user_add"><div class="ew-table-header-caption"><?php echo $alarm_basic->user_add->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="user_add" class="<?php echo $alarm_basic->user_add->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $alarm_basic->SortUrl($alarm_basic->user_add) ?>',1);"><div id="elh_alarm_basic_user_add" class="alarm_basic_user_add">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $alarm_basic->user_add->caption() ?></span><span class="ew-table-header-sort"><?php if ($alarm_basic->user_add->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($alarm_basic->user_add->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($alarm_basic->user_modified->Visible) { // user_modified ?>
	<?php if ($alarm_basic->sortUrl($alarm_basic->user_modified) == "") { ?>
		<th data-name="user_modified" class="<?php echo $alarm_basic->user_modified->headerCellClass() ?>"><div id="elh_alarm_basic_user_modified" class="alarm_basic_user_modified"><div class="ew-table-header-caption"><?php echo $alarm_basic->user_modified->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="user_modified" class="<?php echo $alarm_basic->user_modified->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $alarm_basic->SortUrl($alarm_basic->user_modified) ?>',1);"><div id="elh_alarm_basic_user_modified" class="alarm_basic_user_modified">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $alarm_basic->user_modified->caption() ?></span><span class="ew-table-header-sort"><?php if ($alarm_basic->user_modified->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($alarm_basic->user_modified->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($alarm_basic->email_subject->Visible) { // email_subject ?>
	<?php if ($alarm_basic->sortUrl($alarm_basic->email_subject) == "") { ?>
		<th data-name="email_subject" class="<?php echo $alarm_basic->email_subject->headerCellClass() ?>"><div id="elh_alarm_basic_email_subject" class="alarm_basic_email_subject"><div class="ew-table-header-caption"><?php echo $alarm_basic->email_subject->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="email_subject" class="<?php echo $alarm_basic->email_subject->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $alarm_basic->SortUrl($alarm_basic->email_subject) ?>',1);"><div id="elh_alarm_basic_email_subject" class="alarm_basic_email_subject">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $alarm_basic->email_subject->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($alarm_basic->email_subject->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($alarm_basic->email_subject->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($alarm_basic->email_attach->Visible) { // email_attach ?>
	<?php if ($alarm_basic->sortUrl($alarm_basic->email_attach) == "") { ?>
		<th data-name="email_attach" class="<?php echo $alarm_basic->email_attach->headerCellClass() ?>"><div id="elh_alarm_basic_email_attach" class="alarm_basic_email_attach"><div class="ew-table-header-caption"><?php echo $alarm_basic->email_attach->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="email_attach" class="<?php echo $alarm_basic->email_attach->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $alarm_basic->SortUrl($alarm_basic->email_attach) ?>',1);"><div id="elh_alarm_basic_email_attach" class="alarm_basic_email_attach">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $alarm_basic->email_attach->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($alarm_basic->email_attach->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($alarm_basic->email_attach->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($alarm_basic->sms_num->Visible) { // sms_num ?>
	<?php if ($alarm_basic->sortUrl($alarm_basic->sms_num) == "") { ?>
		<th data-name="sms_num" class="<?php echo $alarm_basic->sms_num->headerCellClass() ?>"><div id="elh_alarm_basic_sms_num" class="alarm_basic_sms_num"><div class="ew-table-header-caption"><?php echo $alarm_basic->sms_num->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sms_num" class="<?php echo $alarm_basic->sms_num->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $alarm_basic->SortUrl($alarm_basic->sms_num) ?>',1);"><div id="elh_alarm_basic_sms_num" class="alarm_basic_sms_num">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $alarm_basic->sms_num->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($alarm_basic->sms_num->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($alarm_basic->sms_num->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($alarm_basic->sms_body->Visible) { // sms_body ?>
	<?php if ($alarm_basic->sortUrl($alarm_basic->sms_body) == "") { ?>
		<th data-name="sms_body" class="<?php echo $alarm_basic->sms_body->headerCellClass() ?>"><div id="elh_alarm_basic_sms_body" class="alarm_basic_sms_body"><div class="ew-table-header-caption"><?php echo $alarm_basic->sms_body->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sms_body" class="<?php echo $alarm_basic->sms_body->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $alarm_basic->SortUrl($alarm_basic->sms_body) ?>',1);"><div id="elh_alarm_basic_sms_body" class="alarm_basic_sms_body">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $alarm_basic->sms_body->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($alarm_basic->sms_body->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($alarm_basic->sms_body->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($alarm_basic->alarm_subscriber->Visible) { // alarm_subscriber ?>
	<?php if ($alarm_basic->sortUrl($alarm_basic->alarm_subscriber) == "") { ?>
		<th data-name="alarm_subscriber" class="<?php echo $alarm_basic->alarm_subscriber->headerCellClass() ?>"><div id="elh_alarm_basic_alarm_subscriber" class="alarm_basic_alarm_subscriber"><div class="ew-table-header-caption"><?php echo $alarm_basic->alarm_subscriber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="alarm_subscriber" class="<?php echo $alarm_basic->alarm_subscriber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $alarm_basic->SortUrl($alarm_basic->alarm_subscriber) ?>',1);"><div id="elh_alarm_basic_alarm_subscriber" class="alarm_basic_alarm_subscriber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $alarm_basic->alarm_subscriber->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($alarm_basic->alarm_subscriber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($alarm_basic->alarm_subscriber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($alarm_basic->sms_active->Visible) { // sms_active ?>
	<?php if ($alarm_basic->sortUrl($alarm_basic->sms_active) == "") { ?>
		<th data-name="sms_active" class="<?php echo $alarm_basic->sms_active->headerCellClass() ?>"><div id="elh_alarm_basic_sms_active" class="alarm_basic_sms_active"><div class="ew-table-header-caption"><?php echo $alarm_basic->sms_active->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sms_active" class="<?php echo $alarm_basic->sms_active->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $alarm_basic->SortUrl($alarm_basic->sms_active) ?>',1);"><div id="elh_alarm_basic_sms_active" class="alarm_basic_sms_active">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $alarm_basic->sms_active->caption() ?></span><span class="ew-table-header-sort"><?php if ($alarm_basic->sms_active->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($alarm_basic->sms_active->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($alarm_basic->email_active->Visible) { // email_active ?>
	<?php if ($alarm_basic->sortUrl($alarm_basic->email_active) == "") { ?>
		<th data-name="email_active" class="<?php echo $alarm_basic->email_active->headerCellClass() ?>"><div id="elh_alarm_basic_email_active" class="alarm_basic_email_active"><div class="ew-table-header-caption"><?php echo $alarm_basic->email_active->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="email_active" class="<?php echo $alarm_basic->email_active->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $alarm_basic->SortUrl($alarm_basic->email_active) ?>',1);"><div id="elh_alarm_basic_email_active" class="alarm_basic_email_active">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $alarm_basic->email_active->caption() ?></span><span class="ew-table-header-sort"><?php if ($alarm_basic->email_active->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($alarm_basic->email_active->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$alarm_basic_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($alarm_basic->ExportAll && $alarm_basic->isExport()) {
	$alarm_basic_list->StopRec = $alarm_basic_list->TotalRecs;
} else {

	// Set the last record to display
	if ($alarm_basic_list->TotalRecs > $alarm_basic_list->StartRec + $alarm_basic_list->DisplayRecs - 1)
		$alarm_basic_list->StopRec = $alarm_basic_list->StartRec + $alarm_basic_list->DisplayRecs - 1;
	else
		$alarm_basic_list->StopRec = $alarm_basic_list->TotalRecs;
}
$alarm_basic_list->RecCnt = $alarm_basic_list->StartRec - 1;
if ($alarm_basic_list->Recordset && !$alarm_basic_list->Recordset->EOF) {
	$alarm_basic_list->Recordset->moveFirst();
	$selectLimit = $alarm_basic_list->UseSelectLimit;
	if (!$selectLimit && $alarm_basic_list->StartRec > 1)
		$alarm_basic_list->Recordset->move($alarm_basic_list->StartRec - 1);
} elseif (!$alarm_basic->AllowAddDeleteRow && $alarm_basic_list->StopRec == 0) {
	$alarm_basic_list->StopRec = $alarm_basic->GridAddRowCount;
}

// Initialize aggregate
$alarm_basic->RowType = ROWTYPE_AGGREGATEINIT;
$alarm_basic->resetAttributes();
$alarm_basic_list->renderRow();
while ($alarm_basic_list->RecCnt < $alarm_basic_list->StopRec) {
	$alarm_basic_list->RecCnt++;
	if ($alarm_basic_list->RecCnt >= $alarm_basic_list->StartRec) {
		$alarm_basic_list->RowCnt++;

		// Set up key count
		$alarm_basic_list->KeyCount = $alarm_basic_list->RowIndex;

		// Init row class and style
		$alarm_basic->resetAttributes();
		$alarm_basic->CssClass = "";
		if ($alarm_basic->isGridAdd()) {
		} else {
			$alarm_basic_list->loadRowValues($alarm_basic_list->Recordset); // Load row values
		}
		$alarm_basic->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$alarm_basic->RowAttrs = array_merge($alarm_basic->RowAttrs, array('data-rowindex'=>$alarm_basic_list->RowCnt, 'id'=>'r' . $alarm_basic_list->RowCnt . '_alarm_basic', 'data-rowtype'=>$alarm_basic->RowType));

		// Render row
		$alarm_basic_list->renderRow();

		// Render list options
		$alarm_basic_list->renderListOptions();
?>
	<tr<?php echo $alarm_basic->rowAttributes() ?>>
<?php

// Render list options (body, left)
$alarm_basic_list->ListOptions->render("body", "left", $alarm_basic_list->RowCnt);
?>
	<?php if ($alarm_basic->RTLindex->Visible) { // RTLindex ?>
		<td data-name="RTLindex"<?php echo $alarm_basic->RTLindex->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_list->RowCnt ?>_alarm_basic_RTLindex" class="alarm_basic_RTLindex">
<span<?php echo $alarm_basic->RTLindex->viewAttributes() ?>>
<?php echo $alarm_basic->RTLindex->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($alarm_basic->sensor_id->Visible) { // sensor_id ?>
		<td data-name="sensor_id"<?php echo $alarm_basic->sensor_id->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_list->RowCnt ?>_alarm_basic_sensor_id" class="alarm_basic_sensor_id">
<span<?php echo $alarm_basic->sensor_id->viewAttributes() ?>>
<?php echo $alarm_basic->sensor_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($alarm_basic->value_max->Visible) { // value_max ?>
		<td data-name="value_max"<?php echo $alarm_basic->value_max->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_list->RowCnt ?>_alarm_basic_value_max" class="alarm_basic_value_max">
<span<?php echo $alarm_basic->value_max->viewAttributes() ?>>
<?php echo $alarm_basic->value_max->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($alarm_basic->value_min->Visible) { // value_min ?>
		<td data-name="value_min"<?php echo $alarm_basic->value_min->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_list->RowCnt ?>_alarm_basic_value_min" class="alarm_basic_value_min">
<span<?php echo $alarm_basic->value_min->viewAttributes() ?>>
<?php echo $alarm_basic->value_min->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($alarm_basic->delaytime->Visible) { // delaytime ?>
		<td data-name="delaytime"<?php echo $alarm_basic->delaytime->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_list->RowCnt ?>_alarm_basic_delaytime" class="alarm_basic_delaytime">
<span<?php echo $alarm_basic->delaytime->viewAttributes() ?>>
<?php echo $alarm_basic->delaytime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($alarm_basic->date_add->Visible) { // date_add ?>
		<td data-name="date_add"<?php echo $alarm_basic->date_add->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_list->RowCnt ?>_alarm_basic_date_add" class="alarm_basic_date_add">
<span<?php echo $alarm_basic->date_add->viewAttributes() ?>>
<?php echo $alarm_basic->date_add->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($alarm_basic->date_modified->Visible) { // date_modified ?>
		<td data-name="date_modified"<?php echo $alarm_basic->date_modified->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_list->RowCnt ?>_alarm_basic_date_modified" class="alarm_basic_date_modified">
<span<?php echo $alarm_basic->date_modified->viewAttributes() ?>>
<?php echo $alarm_basic->date_modified->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($alarm_basic->user_add->Visible) { // user_add ?>
		<td data-name="user_add"<?php echo $alarm_basic->user_add->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_list->RowCnt ?>_alarm_basic_user_add" class="alarm_basic_user_add">
<span<?php echo $alarm_basic->user_add->viewAttributes() ?>>
<?php echo $alarm_basic->user_add->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($alarm_basic->user_modified->Visible) { // user_modified ?>
		<td data-name="user_modified"<?php echo $alarm_basic->user_modified->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_list->RowCnt ?>_alarm_basic_user_modified" class="alarm_basic_user_modified">
<span<?php echo $alarm_basic->user_modified->viewAttributes() ?>>
<?php echo $alarm_basic->user_modified->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($alarm_basic->email_subject->Visible) { // email_subject ?>
		<td data-name="email_subject"<?php echo $alarm_basic->email_subject->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_list->RowCnt ?>_alarm_basic_email_subject" class="alarm_basic_email_subject">
<span<?php echo $alarm_basic->email_subject->viewAttributes() ?>>
<?php echo $alarm_basic->email_subject->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($alarm_basic->email_attach->Visible) { // email_attach ?>
		<td data-name="email_attach"<?php echo $alarm_basic->email_attach->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_list->RowCnt ?>_alarm_basic_email_attach" class="alarm_basic_email_attach">
<span<?php echo $alarm_basic->email_attach->viewAttributes() ?>>
<?php echo $alarm_basic->email_attach->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($alarm_basic->sms_num->Visible) { // sms_num ?>
		<td data-name="sms_num"<?php echo $alarm_basic->sms_num->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_list->RowCnt ?>_alarm_basic_sms_num" class="alarm_basic_sms_num">
<span<?php echo $alarm_basic->sms_num->viewAttributes() ?>>
<?php echo $alarm_basic->sms_num->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($alarm_basic->sms_body->Visible) { // sms_body ?>
		<td data-name="sms_body"<?php echo $alarm_basic->sms_body->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_list->RowCnt ?>_alarm_basic_sms_body" class="alarm_basic_sms_body">
<span<?php echo $alarm_basic->sms_body->viewAttributes() ?>>
<?php echo $alarm_basic->sms_body->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($alarm_basic->alarm_subscriber->Visible) { // alarm_subscriber ?>
		<td data-name="alarm_subscriber"<?php echo $alarm_basic->alarm_subscriber->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_list->RowCnt ?>_alarm_basic_alarm_subscriber" class="alarm_basic_alarm_subscriber">
<span<?php echo $alarm_basic->alarm_subscriber->viewAttributes() ?>>
<?php echo $alarm_basic->alarm_subscriber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($alarm_basic->sms_active->Visible) { // sms_active ?>
		<td data-name="sms_active"<?php echo $alarm_basic->sms_active->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_list->RowCnt ?>_alarm_basic_sms_active" class="alarm_basic_sms_active">
<span<?php echo $alarm_basic->sms_active->viewAttributes() ?>>
<?php echo $alarm_basic->sms_active->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($alarm_basic->email_active->Visible) { // email_active ?>
		<td data-name="email_active"<?php echo $alarm_basic->email_active->cellAttributes() ?>>
<span id="el<?php echo $alarm_basic_list->RowCnt ?>_alarm_basic_email_active" class="alarm_basic_email_active">
<span<?php echo $alarm_basic->email_active->viewAttributes() ?>>
<?php echo $alarm_basic->email_active->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$alarm_basic_list->ListOptions->render("body", "right", $alarm_basic_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$alarm_basic->isGridAdd())
		$alarm_basic_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$alarm_basic->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($alarm_basic_list->Recordset)
	$alarm_basic_list->Recordset->Close();
?>
<?php if (!$alarm_basic->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$alarm_basic->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($alarm_basic_list->Pager)) $alarm_basic_list->Pager = new PrevNextPager($alarm_basic_list->StartRec, $alarm_basic_list->DisplayRecs, $alarm_basic_list->TotalRecs, $alarm_basic_list->AutoHidePager) ?>
<?php if ($alarm_basic_list->Pager->RecordCount > 0 && $alarm_basic_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($alarm_basic_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $alarm_basic_list->pageUrl() ?>start=<?php echo $alarm_basic_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($alarm_basic_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $alarm_basic_list->pageUrl() ?>start=<?php echo $alarm_basic_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $alarm_basic_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($alarm_basic_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $alarm_basic_list->pageUrl() ?>start=<?php echo $alarm_basic_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($alarm_basic_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $alarm_basic_list->pageUrl() ?>start=<?php echo $alarm_basic_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $alarm_basic_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($alarm_basic_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $alarm_basic_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $alarm_basic_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $alarm_basic_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($alarm_basic_list->TotalRecs > 0 && (!$alarm_basic_list->AutoHidePageSizeSelector || $alarm_basic_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="alarm_basic">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->Phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($alarm_basic_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($alarm_basic_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($alarm_basic_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($alarm_basic->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($alarm_basic_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($alarm_basic_list->TotalRecs == 0 && !$alarm_basic->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($alarm_basic_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$alarm_basic_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$alarm_basic->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$alarm_basic_list->terminate();
?>
