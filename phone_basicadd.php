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
$phone_basic_add = new phone_basic_add();

// Run the page
$phone_basic_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$phone_basic_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fphone_basicadd = currentForm = new ew.Form("fphone_basicadd", "add");

// Validate form
fphone_basicadd.validate = function() {
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
		<?php if ($phone_basic_add->imei->Required) { ?>
			elm = this.getElements("x" + infix + "_imei");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $phone_basic->imei->caption(), $phone_basic->imei->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($phone_basic_add->phone_name->Required) { ?>
			elm = this.getElements("x" + infix + "_phone_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $phone_basic->phone_name->caption(), $phone_basic->phone_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($phone_basic_add->date_add->Required) { ?>
			elm = this.getElements("x" + infix + "_date_add");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $phone_basic->date_add->caption(), $phone_basic->date_add->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_date_add");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($phone_basic->date_add->errorMessage()) ?>");
		<?php if ($phone_basic_add->app_version->Required) { ?>
			elm = this.getElements("x" + infix + "_app_version");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $phone_basic->app_version->caption(), $phone_basic->app_version->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($phone_basic_add->phone_num->Required) { ?>
			elm = this.getElements("x" + infix + "_phone_num");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $phone_basic->phone_num->caption(), $phone_basic->phone_num->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($phone_basic_add->phone_wifi_mac->Required) { ?>
			elm = this.getElements("x" + infix + "_phone_wifi_mac");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $phone_basic->phone_wifi_mac->caption(), $phone_basic->phone_wifi_mac->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($phone_basic_add->active->Required) { ?>
			elm = this.getElements("x" + infix + "_active");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $phone_basic->active->caption(), $phone_basic->active->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_active");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($phone_basic->active->errorMessage()) ?>");
		<?php if ($phone_basic_add->app_name->Required) { ?>
			elm = this.getElements("x" + infix + "_app_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $phone_basic->app_name->caption(), $phone_basic->app_name->RequiredErrorMessage)) ?>");
		<?php } ?>

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
fphone_basicadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fphone_basicadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $phone_basic_add->showPageHeader(); ?>
<?php
$phone_basic_add->showMessage();
?>
<form name="fphone_basicadd" id="fphone_basicadd" class="<?php echo $phone_basic_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($phone_basic_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $phone_basic_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="phone_basic">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$phone_basic_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($phone_basic->imei->Visible) { // imei ?>
	<div id="r_imei" class="form-group row">
		<label id="elh_phone_basic_imei" for="x_imei" class="<?php echo $phone_basic_add->LeftColumnClass ?>"><?php echo $phone_basic->imei->caption() ?><?php echo ($phone_basic->imei->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $phone_basic_add->RightColumnClass ?>"><div<?php echo $phone_basic->imei->cellAttributes() ?>>
<span id="el_phone_basic_imei">
<input type="text" data-table="phone_basic" data-field="x_imei" name="x_imei" id="x_imei" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($phone_basic->imei->getPlaceHolder()) ?>" value="<?php echo $phone_basic->imei->EditValue ?>"<?php echo $phone_basic->imei->editAttributes() ?>>
</span>
<?php echo $phone_basic->imei->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($phone_basic->phone_name->Visible) { // phone_name ?>
	<div id="r_phone_name" class="form-group row">
		<label id="elh_phone_basic_phone_name" for="x_phone_name" class="<?php echo $phone_basic_add->LeftColumnClass ?>"><?php echo $phone_basic->phone_name->caption() ?><?php echo ($phone_basic->phone_name->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $phone_basic_add->RightColumnClass ?>"><div<?php echo $phone_basic->phone_name->cellAttributes() ?>>
<span id="el_phone_basic_phone_name">
<input type="text" data-table="phone_basic" data-field="x_phone_name" name="x_phone_name" id="x_phone_name" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($phone_basic->phone_name->getPlaceHolder()) ?>" value="<?php echo $phone_basic->phone_name->EditValue ?>"<?php echo $phone_basic->phone_name->editAttributes() ?>>
</span>
<?php echo $phone_basic->phone_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($phone_basic->date_add->Visible) { // date_add ?>
	<div id="r_date_add" class="form-group row">
		<label id="elh_phone_basic_date_add" for="x_date_add" class="<?php echo $phone_basic_add->LeftColumnClass ?>"><?php echo $phone_basic->date_add->caption() ?><?php echo ($phone_basic->date_add->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $phone_basic_add->RightColumnClass ?>"><div<?php echo $phone_basic->date_add->cellAttributes() ?>>
<span id="el_phone_basic_date_add">
<input type="text" data-table="phone_basic" data-field="x_date_add" name="x_date_add" id="x_date_add" placeholder="<?php echo HtmlEncode($phone_basic->date_add->getPlaceHolder()) ?>" value="<?php echo $phone_basic->date_add->EditValue ?>"<?php echo $phone_basic->date_add->editAttributes() ?>>
<?php if (!$phone_basic->date_add->ReadOnly && !$phone_basic->date_add->Disabled && !isset($phone_basic->date_add->EditAttrs["readonly"]) && !isset($phone_basic->date_add->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fphone_basicadd", "x_date_add", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $phone_basic->date_add->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($phone_basic->app_version->Visible) { // app_version ?>
	<div id="r_app_version" class="form-group row">
		<label id="elh_phone_basic_app_version" for="x_app_version" class="<?php echo $phone_basic_add->LeftColumnClass ?>"><?php echo $phone_basic->app_version->caption() ?><?php echo ($phone_basic->app_version->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $phone_basic_add->RightColumnClass ?>"><div<?php echo $phone_basic->app_version->cellAttributes() ?>>
<span id="el_phone_basic_app_version">
<input type="text" data-table="phone_basic" data-field="x_app_version" name="x_app_version" id="x_app_version" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($phone_basic->app_version->getPlaceHolder()) ?>" value="<?php echo $phone_basic->app_version->EditValue ?>"<?php echo $phone_basic->app_version->editAttributes() ?>>
</span>
<?php echo $phone_basic->app_version->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($phone_basic->phone_num->Visible) { // phone_num ?>
	<div id="r_phone_num" class="form-group row">
		<label id="elh_phone_basic_phone_num" for="x_phone_num" class="<?php echo $phone_basic_add->LeftColumnClass ?>"><?php echo $phone_basic->phone_num->caption() ?><?php echo ($phone_basic->phone_num->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $phone_basic_add->RightColumnClass ?>"><div<?php echo $phone_basic->phone_num->cellAttributes() ?>>
<span id="el_phone_basic_phone_num">
<input type="text" data-table="phone_basic" data-field="x_phone_num" name="x_phone_num" id="x_phone_num" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($phone_basic->phone_num->getPlaceHolder()) ?>" value="<?php echo $phone_basic->phone_num->EditValue ?>"<?php echo $phone_basic->phone_num->editAttributes() ?>>
</span>
<?php echo $phone_basic->phone_num->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($phone_basic->phone_wifi_mac->Visible) { // phone_wifi_mac ?>
	<div id="r_phone_wifi_mac" class="form-group row">
		<label id="elh_phone_basic_phone_wifi_mac" for="x_phone_wifi_mac" class="<?php echo $phone_basic_add->LeftColumnClass ?>"><?php echo $phone_basic->phone_wifi_mac->caption() ?><?php echo ($phone_basic->phone_wifi_mac->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $phone_basic_add->RightColumnClass ?>"><div<?php echo $phone_basic->phone_wifi_mac->cellAttributes() ?>>
<span id="el_phone_basic_phone_wifi_mac">
<input type="text" data-table="phone_basic" data-field="x_phone_wifi_mac" name="x_phone_wifi_mac" id="x_phone_wifi_mac" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($phone_basic->phone_wifi_mac->getPlaceHolder()) ?>" value="<?php echo $phone_basic->phone_wifi_mac->EditValue ?>"<?php echo $phone_basic->phone_wifi_mac->editAttributes() ?>>
</span>
<?php echo $phone_basic->phone_wifi_mac->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($phone_basic->active->Visible) { // active ?>
	<div id="r_active" class="form-group row">
		<label id="elh_phone_basic_active" for="x_active" class="<?php echo $phone_basic_add->LeftColumnClass ?>"><?php echo $phone_basic->active->caption() ?><?php echo ($phone_basic->active->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $phone_basic_add->RightColumnClass ?>"><div<?php echo $phone_basic->active->cellAttributes() ?>>
<span id="el_phone_basic_active">
<input type="text" data-table="phone_basic" data-field="x_active" name="x_active" id="x_active" size="30" placeholder="<?php echo HtmlEncode($phone_basic->active->getPlaceHolder()) ?>" value="<?php echo $phone_basic->active->EditValue ?>"<?php echo $phone_basic->active->editAttributes() ?>>
</span>
<?php echo $phone_basic->active->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($phone_basic->app_name->Visible) { // app_name ?>
	<div id="r_app_name" class="form-group row">
		<label id="elh_phone_basic_app_name" for="x_app_name" class="<?php echo $phone_basic_add->LeftColumnClass ?>"><?php echo $phone_basic->app_name->caption() ?><?php echo ($phone_basic->app_name->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $phone_basic_add->RightColumnClass ?>"><div<?php echo $phone_basic->app_name->cellAttributes() ?>>
<span id="el_phone_basic_app_name">
<input type="text" data-table="phone_basic" data-field="x_app_name" name="x_app_name" id="x_app_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($phone_basic->app_name->getPlaceHolder()) ?>" value="<?php echo $phone_basic->app_name->EditValue ?>"<?php echo $phone_basic->app_name->editAttributes() ?>>
</span>
<?php echo $phone_basic->app_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$phone_basic_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $phone_basic_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $phone_basic_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$phone_basic_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$phone_basic_add->terminate();
?>
