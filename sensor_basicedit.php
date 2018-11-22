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
$sensor_basic_edit = new sensor_basic_edit();

// Run the page
$sensor_basic_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sensor_basic_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fsensor_basicedit = currentForm = new ew.Form("fsensor_basicedit", "edit");

// Validate form
fsensor_basicedit.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		<?php if ($sensor_basic_edit->RTLindex->Required) { ?>
			elm = this.getElements("x" + infix + "_RTLindex");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sensor_basic->RTLindex->caption(), $sensor_basic->RTLindex->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sensor_basic_edit->sensor_id->Required) { ?>
			elm = this.getElements("x" + infix + "_sensor_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sensor_basic->sensor_id->caption(), $sensor_basic->sensor_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sensor_basic_edit->beb_alias_name->Required) { ?>
			elm = this.getElements("x" + infix + "_beb_alias_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sensor_basic->beb_alias_name->caption(), $sensor_basic->beb_alias_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sensor_basic_edit->active->Required) { ?>
			elm = this.getElements("x" + infix + "_active");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sensor_basic->active->caption(), $sensor_basic->active->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_active");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($sensor_basic->active->errorMessage()) ?>");
		<?php if ($sensor_basic_edit->date_add->Required) { ?>
			elm = this.getElements("x" + infix + "_date_add");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sensor_basic->date_add->caption(), $sensor_basic->date_add->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_date_add");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($sensor_basic->date_add->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ew.forms[val])
			if (!ew.forms[val].validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
fsensor_basicedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsensor_basicedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $sensor_basic_edit->showPageHeader(); ?>
<?php
$sensor_basic_edit->showMessage();
?>
<form name="fsensor_basicedit" id="fsensor_basicedit" class="<?php echo $sensor_basic_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sensor_basic_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sensor_basic_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sensor_basic">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$sensor_basic_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($sensor_basic->RTLindex->Visible) { // RTLindex ?>
	<div id="r_RTLindex" class="form-group row">
		<label id="elh_sensor_basic_RTLindex" class="<?php echo $sensor_basic_edit->LeftColumnClass ?>"><?php echo $sensor_basic->RTLindex->caption() ?><?php echo ($sensor_basic->RTLindex->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sensor_basic_edit->RightColumnClass ?>"><div<?php echo $sensor_basic->RTLindex->cellAttributes() ?>>
<span id="el_sensor_basic_RTLindex">
<span<?php echo $sensor_basic->RTLindex->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($sensor_basic->RTLindex->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="sensor_basic" data-field="x_RTLindex" name="x_RTLindex" id="x_RTLindex" value="<?php echo HtmlEncode($sensor_basic->RTLindex->CurrentValue) ?>">
<?php echo $sensor_basic->RTLindex->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sensor_basic->sensor_id->Visible) { // sensor_id ?>
	<div id="r_sensor_id" class="form-group row">
		<label id="elh_sensor_basic_sensor_id" for="x_sensor_id" class="<?php echo $sensor_basic_edit->LeftColumnClass ?>"><?php echo $sensor_basic->sensor_id->caption() ?><?php echo ($sensor_basic->sensor_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sensor_basic_edit->RightColumnClass ?>"><div<?php echo $sensor_basic->sensor_id->cellAttributes() ?>>
<span id="el_sensor_basic_sensor_id">
<input type="text" data-table="sensor_basic" data-field="x_sensor_id" name="x_sensor_id" id="x_sensor_id" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($sensor_basic->sensor_id->getPlaceHolder()) ?>" value="<?php echo $sensor_basic->sensor_id->EditValue ?>"<?php echo $sensor_basic->sensor_id->editAttributes() ?>>
</span>
<?php echo $sensor_basic->sensor_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sensor_basic->beb_alias_name->Visible) { // beb_alias_name ?>
	<div id="r_beb_alias_name" class="form-group row">
		<label id="elh_sensor_basic_beb_alias_name" for="x_beb_alias_name" class="<?php echo $sensor_basic_edit->LeftColumnClass ?>"><?php echo $sensor_basic->beb_alias_name->caption() ?><?php echo ($sensor_basic->beb_alias_name->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sensor_basic_edit->RightColumnClass ?>"><div<?php echo $sensor_basic->beb_alias_name->cellAttributes() ?>>
<span id="el_sensor_basic_beb_alias_name">
<input type="text" data-table="sensor_basic" data-field="x_beb_alias_name" name="x_beb_alias_name" id="x_beb_alias_name" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($sensor_basic->beb_alias_name->getPlaceHolder()) ?>" value="<?php echo $sensor_basic->beb_alias_name->EditValue ?>"<?php echo $sensor_basic->beb_alias_name->editAttributes() ?>>
</span>
<?php echo $sensor_basic->beb_alias_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sensor_basic->active->Visible) { // active ?>
	<div id="r_active" class="form-group row">
		<label id="elh_sensor_basic_active" for="x_active" class="<?php echo $sensor_basic_edit->LeftColumnClass ?>"><?php echo $sensor_basic->active->caption() ?><?php echo ($sensor_basic->active->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sensor_basic_edit->RightColumnClass ?>"><div<?php echo $sensor_basic->active->cellAttributes() ?>>
<span id="el_sensor_basic_active">
<input type="text" data-table="sensor_basic" data-field="x_active" name="x_active" id="x_active" size="30" placeholder="<?php echo HtmlEncode($sensor_basic->active->getPlaceHolder()) ?>" value="<?php echo $sensor_basic->active->EditValue ?>"<?php echo $sensor_basic->active->editAttributes() ?>>
</span>
<?php echo $sensor_basic->active->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sensor_basic->date_add->Visible) { // date_add ?>
	<div id="r_date_add" class="form-group row">
		<label id="elh_sensor_basic_date_add" for="x_date_add" class="<?php echo $sensor_basic_edit->LeftColumnClass ?>"><?php echo $sensor_basic->date_add->caption() ?><?php echo ($sensor_basic->date_add->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sensor_basic_edit->RightColumnClass ?>"><div<?php echo $sensor_basic->date_add->cellAttributes() ?>>
<span id="el_sensor_basic_date_add">
<input type="text" data-table="sensor_basic" data-field="x_date_add" data-format="1" name="x_date_add" id="x_date_add" placeholder="<?php echo HtmlEncode($sensor_basic->date_add->getPlaceHolder()) ?>" value="<?php echo $sensor_basic->date_add->EditValue ?>"<?php echo $sensor_basic->date_add->editAttributes() ?>>
<?php if (!$sensor_basic->date_add->ReadOnly && !$sensor_basic->date_add->Disabled && !isset($sensor_basic->date_add->EditAttrs["readonly"]) && !isset($sensor_basic->date_add->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fsensor_basicedit", "x_date_add", {"ignoreReadonly":true,"useCurrent":false,"format":1});
</script>
<?php } ?>
</span>
<?php echo $sensor_basic->date_add->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$sensor_basic_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $sensor_basic_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sensor_basic_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$sensor_basic_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$sensor_basic_edit->terminate();
?>
