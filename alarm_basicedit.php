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
$alarm_basic_edit = new alarm_basic_edit();

// Run the page
$alarm_basic_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$alarm_basic_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var falarm_basicedit = currentForm = new ew.Form("falarm_basicedit", "edit");

// Validate form
falarm_basicedit.validate = function() {
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
		<?php if ($alarm_basic_edit->RTLindex->Required) { ?>
			elm = this.getElements("x" + infix + "_RTLindex");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alarm_basic->RTLindex->caption(), $alarm_basic->RTLindex->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($alarm_basic_edit->sensor_id->Required) { ?>
			elm = this.getElements("x" + infix + "_sensor_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alarm_basic->sensor_id->caption(), $alarm_basic->sensor_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($alarm_basic_edit->value_max->Required) { ?>
			elm = this.getElements("x" + infix + "_value_max");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alarm_basic->value_max->caption(), $alarm_basic->value_max->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_value_max");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($alarm_basic->value_max->errorMessage()) ?>");
		<?php if ($alarm_basic_edit->value_min->Required) { ?>
			elm = this.getElements("x" + infix + "_value_min");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alarm_basic->value_min->caption(), $alarm_basic->value_min->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_value_min");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($alarm_basic->value_min->errorMessage()) ?>");
		<?php if ($alarm_basic_edit->delaytime->Required) { ?>
			elm = this.getElements("x" + infix + "_delaytime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alarm_basic->delaytime->caption(), $alarm_basic->delaytime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_delaytime");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($alarm_basic->delaytime->errorMessage()) ?>");
		<?php if ($alarm_basic_edit->date_add->Required) { ?>
			elm = this.getElements("x" + infix + "_date_add");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alarm_basic->date_add->caption(), $alarm_basic->date_add->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_date_add");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($alarm_basic->date_add->errorMessage()) ?>");
		<?php if ($alarm_basic_edit->date_modified->Required) { ?>
			elm = this.getElements("x" + infix + "_date_modified");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alarm_basic->date_modified->caption(), $alarm_basic->date_modified->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_date_modified");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($alarm_basic->date_modified->errorMessage()) ?>");
		<?php if ($alarm_basic_edit->user_add->Required) { ?>
			elm = this.getElements("x" + infix + "_user_add");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alarm_basic->user_add->caption(), $alarm_basic->user_add->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_user_add");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($alarm_basic->user_add->errorMessage()) ?>");
		<?php if ($alarm_basic_edit->user_modified->Required) { ?>
			elm = this.getElements("x" + infix + "_user_modified");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alarm_basic->user_modified->caption(), $alarm_basic->user_modified->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_user_modified");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($alarm_basic->user_modified->errorMessage()) ?>");
		<?php if ($alarm_basic_edit->email_receipt->Required) { ?>
			elm = this.getElements("x" + infix + "_email_receipt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alarm_basic->email_receipt->caption(), $alarm_basic->email_receipt->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($alarm_basic_edit->email_subject->Required) { ?>
			elm = this.getElements("x" + infix + "_email_subject");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alarm_basic->email_subject->caption(), $alarm_basic->email_subject->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($alarm_basic_edit->email_body->Required) { ?>
			elm = this.getElements("x" + infix + "_email_body");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alarm_basic->email_body->caption(), $alarm_basic->email_body->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($alarm_basic_edit->email_attach->Required) { ?>
			elm = this.getElements("x" + infix + "_email_attach");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alarm_basic->email_attach->caption(), $alarm_basic->email_attach->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($alarm_basic_edit->sms_num->Required) { ?>
			elm = this.getElements("x" + infix + "_sms_num");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alarm_basic->sms_num->caption(), $alarm_basic->sms_num->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($alarm_basic_edit->sms_body->Required) { ?>
			elm = this.getElements("x" + infix + "_sms_body");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alarm_basic->sms_body->caption(), $alarm_basic->sms_body->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($alarm_basic_edit->alarm_subscriber->Required) { ?>
			elm = this.getElements("x" + infix + "_alarm_subscriber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alarm_basic->alarm_subscriber->caption(), $alarm_basic->alarm_subscriber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($alarm_basic_edit->sms_active->Required) { ?>
			elm = this.getElements("x" + infix + "_sms_active");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alarm_basic->sms_active->caption(), $alarm_basic->sms_active->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_sms_active");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($alarm_basic->sms_active->errorMessage()) ?>");
		<?php if ($alarm_basic_edit->email_active->Required) { ?>
			elm = this.getElements("x" + infix + "_email_active");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alarm_basic->email_active->caption(), $alarm_basic->email_active->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_email_active");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($alarm_basic->email_active->errorMessage()) ?>");

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
falarm_basicedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
falarm_basicedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $alarm_basic_edit->showPageHeader(); ?>
<?php
$alarm_basic_edit->showMessage();
?>
<form name="falarm_basicedit" id="falarm_basicedit" class="<?php echo $alarm_basic_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($alarm_basic_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $alarm_basic_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="alarm_basic">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$alarm_basic_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($alarm_basic->RTLindex->Visible) { // RTLindex ?>
	<div id="r_RTLindex" class="form-group row">
		<label id="elh_alarm_basic_RTLindex" class="<?php echo $alarm_basic_edit->LeftColumnClass ?>"><?php echo $alarm_basic->RTLindex->caption() ?><?php echo ($alarm_basic->RTLindex->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alarm_basic_edit->RightColumnClass ?>"><div<?php echo $alarm_basic->RTLindex->cellAttributes() ?>>
<span id="el_alarm_basic_RTLindex">
<span<?php echo $alarm_basic->RTLindex->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($alarm_basic->RTLindex->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="alarm_basic" data-field="x_RTLindex" name="x_RTLindex" id="x_RTLindex" value="<?php echo HtmlEncode($alarm_basic->RTLindex->CurrentValue) ?>">
<?php echo $alarm_basic->RTLindex->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alarm_basic->sensor_id->Visible) { // sensor_id ?>
	<div id="r_sensor_id" class="form-group row">
		<label id="elh_alarm_basic_sensor_id" for="x_sensor_id" class="<?php echo $alarm_basic_edit->LeftColumnClass ?>"><?php echo $alarm_basic->sensor_id->caption() ?><?php echo ($alarm_basic->sensor_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alarm_basic_edit->RightColumnClass ?>"><div<?php echo $alarm_basic->sensor_id->cellAttributes() ?>>
<span id="el_alarm_basic_sensor_id">
<input type="text" data-table="alarm_basic" data-field="x_sensor_id" name="x_sensor_id" id="x_sensor_id" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($alarm_basic->sensor_id->getPlaceHolder()) ?>" value="<?php echo $alarm_basic->sensor_id->EditValue ?>"<?php echo $alarm_basic->sensor_id->editAttributes() ?>>
</span>
<?php echo $alarm_basic->sensor_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alarm_basic->value_max->Visible) { // value_max ?>
	<div id="r_value_max" class="form-group row">
		<label id="elh_alarm_basic_value_max" for="x_value_max" class="<?php echo $alarm_basic_edit->LeftColumnClass ?>"><?php echo $alarm_basic->value_max->caption() ?><?php echo ($alarm_basic->value_max->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alarm_basic_edit->RightColumnClass ?>"><div<?php echo $alarm_basic->value_max->cellAttributes() ?>>
<span id="el_alarm_basic_value_max">
<input type="text" data-table="alarm_basic" data-field="x_value_max" name="x_value_max" id="x_value_max" size="30" placeholder="<?php echo HtmlEncode($alarm_basic->value_max->getPlaceHolder()) ?>" value="<?php echo $alarm_basic->value_max->EditValue ?>"<?php echo $alarm_basic->value_max->editAttributes() ?>>
</span>
<?php echo $alarm_basic->value_max->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alarm_basic->value_min->Visible) { // value_min ?>
	<div id="r_value_min" class="form-group row">
		<label id="elh_alarm_basic_value_min" for="x_value_min" class="<?php echo $alarm_basic_edit->LeftColumnClass ?>"><?php echo $alarm_basic->value_min->caption() ?><?php echo ($alarm_basic->value_min->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alarm_basic_edit->RightColumnClass ?>"><div<?php echo $alarm_basic->value_min->cellAttributes() ?>>
<span id="el_alarm_basic_value_min">
<input type="text" data-table="alarm_basic" data-field="x_value_min" name="x_value_min" id="x_value_min" size="30" placeholder="<?php echo HtmlEncode($alarm_basic->value_min->getPlaceHolder()) ?>" value="<?php echo $alarm_basic->value_min->EditValue ?>"<?php echo $alarm_basic->value_min->editAttributes() ?>>
</span>
<?php echo $alarm_basic->value_min->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alarm_basic->delaytime->Visible) { // delaytime ?>
	<div id="r_delaytime" class="form-group row">
		<label id="elh_alarm_basic_delaytime" for="x_delaytime" class="<?php echo $alarm_basic_edit->LeftColumnClass ?>"><?php echo $alarm_basic->delaytime->caption() ?><?php echo ($alarm_basic->delaytime->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alarm_basic_edit->RightColumnClass ?>"><div<?php echo $alarm_basic->delaytime->cellAttributes() ?>>
<span id="el_alarm_basic_delaytime">
<input type="text" data-table="alarm_basic" data-field="x_delaytime" name="x_delaytime" id="x_delaytime" size="30" placeholder="<?php echo HtmlEncode($alarm_basic->delaytime->getPlaceHolder()) ?>" value="<?php echo $alarm_basic->delaytime->EditValue ?>"<?php echo $alarm_basic->delaytime->editAttributes() ?>>
</span>
<?php echo $alarm_basic->delaytime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alarm_basic->date_add->Visible) { // date_add ?>
	<div id="r_date_add" class="form-group row">
		<label id="elh_alarm_basic_date_add" for="x_date_add" class="<?php echo $alarm_basic_edit->LeftColumnClass ?>"><?php echo $alarm_basic->date_add->caption() ?><?php echo ($alarm_basic->date_add->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alarm_basic_edit->RightColumnClass ?>"><div<?php echo $alarm_basic->date_add->cellAttributes() ?>>
<span id="el_alarm_basic_date_add">
<input type="text" data-table="alarm_basic" data-field="x_date_add" name="x_date_add" id="x_date_add" placeholder="<?php echo HtmlEncode($alarm_basic->date_add->getPlaceHolder()) ?>" value="<?php echo $alarm_basic->date_add->EditValue ?>"<?php echo $alarm_basic->date_add->editAttributes() ?>>
<?php if (!$alarm_basic->date_add->ReadOnly && !$alarm_basic->date_add->Disabled && !isset($alarm_basic->date_add->EditAttrs["readonly"]) && !isset($alarm_basic->date_add->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("falarm_basicedit", "x_date_add", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $alarm_basic->date_add->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alarm_basic->date_modified->Visible) { // date_modified ?>
	<div id="r_date_modified" class="form-group row">
		<label id="elh_alarm_basic_date_modified" for="x_date_modified" class="<?php echo $alarm_basic_edit->LeftColumnClass ?>"><?php echo $alarm_basic->date_modified->caption() ?><?php echo ($alarm_basic->date_modified->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alarm_basic_edit->RightColumnClass ?>"><div<?php echo $alarm_basic->date_modified->cellAttributes() ?>>
<span id="el_alarm_basic_date_modified">
<input type="text" data-table="alarm_basic" data-field="x_date_modified" name="x_date_modified" id="x_date_modified" placeholder="<?php echo HtmlEncode($alarm_basic->date_modified->getPlaceHolder()) ?>" value="<?php echo $alarm_basic->date_modified->EditValue ?>"<?php echo $alarm_basic->date_modified->editAttributes() ?>>
<?php if (!$alarm_basic->date_modified->ReadOnly && !$alarm_basic->date_modified->Disabled && !isset($alarm_basic->date_modified->EditAttrs["readonly"]) && !isset($alarm_basic->date_modified->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("falarm_basicedit", "x_date_modified", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $alarm_basic->date_modified->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alarm_basic->user_add->Visible) { // user_add ?>
	<div id="r_user_add" class="form-group row">
		<label id="elh_alarm_basic_user_add" for="x_user_add" class="<?php echo $alarm_basic_edit->LeftColumnClass ?>"><?php echo $alarm_basic->user_add->caption() ?><?php echo ($alarm_basic->user_add->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alarm_basic_edit->RightColumnClass ?>"><div<?php echo $alarm_basic->user_add->cellAttributes() ?>>
<span id="el_alarm_basic_user_add">
<input type="text" data-table="alarm_basic" data-field="x_user_add" name="x_user_add" id="x_user_add" size="30" placeholder="<?php echo HtmlEncode($alarm_basic->user_add->getPlaceHolder()) ?>" value="<?php echo $alarm_basic->user_add->EditValue ?>"<?php echo $alarm_basic->user_add->editAttributes() ?>>
</span>
<?php echo $alarm_basic->user_add->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alarm_basic->user_modified->Visible) { // user_modified ?>
	<div id="r_user_modified" class="form-group row">
		<label id="elh_alarm_basic_user_modified" for="x_user_modified" class="<?php echo $alarm_basic_edit->LeftColumnClass ?>"><?php echo $alarm_basic->user_modified->caption() ?><?php echo ($alarm_basic->user_modified->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alarm_basic_edit->RightColumnClass ?>"><div<?php echo $alarm_basic->user_modified->cellAttributes() ?>>
<span id="el_alarm_basic_user_modified">
<input type="text" data-table="alarm_basic" data-field="x_user_modified" name="x_user_modified" id="x_user_modified" size="30" placeholder="<?php echo HtmlEncode($alarm_basic->user_modified->getPlaceHolder()) ?>" value="<?php echo $alarm_basic->user_modified->EditValue ?>"<?php echo $alarm_basic->user_modified->editAttributes() ?>>
</span>
<?php echo $alarm_basic->user_modified->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alarm_basic->email_receipt->Visible) { // email_receipt ?>
	<div id="r_email_receipt" class="form-group row">
		<label id="elh_alarm_basic_email_receipt" for="x_email_receipt" class="<?php echo $alarm_basic_edit->LeftColumnClass ?>"><?php echo $alarm_basic->email_receipt->caption() ?><?php echo ($alarm_basic->email_receipt->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alarm_basic_edit->RightColumnClass ?>"><div<?php echo $alarm_basic->email_receipt->cellAttributes() ?>>
<span id="el_alarm_basic_email_receipt">
<textarea data-table="alarm_basic" data-field="x_email_receipt" name="x_email_receipt" id="x_email_receipt" cols="35" rows="4" placeholder="<?php echo HtmlEncode($alarm_basic->email_receipt->getPlaceHolder()) ?>"<?php echo $alarm_basic->email_receipt->editAttributes() ?>><?php echo $alarm_basic->email_receipt->EditValue ?></textarea>
</span>
<?php echo $alarm_basic->email_receipt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alarm_basic->email_subject->Visible) { // email_subject ?>
	<div id="r_email_subject" class="form-group row">
		<label id="elh_alarm_basic_email_subject" for="x_email_subject" class="<?php echo $alarm_basic_edit->LeftColumnClass ?>"><?php echo $alarm_basic->email_subject->caption() ?><?php echo ($alarm_basic->email_subject->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alarm_basic_edit->RightColumnClass ?>"><div<?php echo $alarm_basic->email_subject->cellAttributes() ?>>
<span id="el_alarm_basic_email_subject">
<input type="text" data-table="alarm_basic" data-field="x_email_subject" name="x_email_subject" id="x_email_subject" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($alarm_basic->email_subject->getPlaceHolder()) ?>" value="<?php echo $alarm_basic->email_subject->EditValue ?>"<?php echo $alarm_basic->email_subject->editAttributes() ?>>
</span>
<?php echo $alarm_basic->email_subject->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alarm_basic->email_body->Visible) { // email_body ?>
	<div id="r_email_body" class="form-group row">
		<label id="elh_alarm_basic_email_body" for="x_email_body" class="<?php echo $alarm_basic_edit->LeftColumnClass ?>"><?php echo $alarm_basic->email_body->caption() ?><?php echo ($alarm_basic->email_body->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alarm_basic_edit->RightColumnClass ?>"><div<?php echo $alarm_basic->email_body->cellAttributes() ?>>
<span id="el_alarm_basic_email_body">
<textarea data-table="alarm_basic" data-field="x_email_body" name="x_email_body" id="x_email_body" cols="35" rows="4" placeholder="<?php echo HtmlEncode($alarm_basic->email_body->getPlaceHolder()) ?>"<?php echo $alarm_basic->email_body->editAttributes() ?>><?php echo $alarm_basic->email_body->EditValue ?></textarea>
</span>
<?php echo $alarm_basic->email_body->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alarm_basic->email_attach->Visible) { // email_attach ?>
	<div id="r_email_attach" class="form-group row">
		<label id="elh_alarm_basic_email_attach" for="x_email_attach" class="<?php echo $alarm_basic_edit->LeftColumnClass ?>"><?php echo $alarm_basic->email_attach->caption() ?><?php echo ($alarm_basic->email_attach->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alarm_basic_edit->RightColumnClass ?>"><div<?php echo $alarm_basic->email_attach->cellAttributes() ?>>
<span id="el_alarm_basic_email_attach">
<input type="text" data-table="alarm_basic" data-field="x_email_attach" name="x_email_attach" id="x_email_attach" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($alarm_basic->email_attach->getPlaceHolder()) ?>" value="<?php echo $alarm_basic->email_attach->EditValue ?>"<?php echo $alarm_basic->email_attach->editAttributes() ?>>
</span>
<?php echo $alarm_basic->email_attach->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alarm_basic->sms_num->Visible) { // sms_num ?>
	<div id="r_sms_num" class="form-group row">
		<label id="elh_alarm_basic_sms_num" for="x_sms_num" class="<?php echo $alarm_basic_edit->LeftColumnClass ?>"><?php echo $alarm_basic->sms_num->caption() ?><?php echo ($alarm_basic->sms_num->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alarm_basic_edit->RightColumnClass ?>"><div<?php echo $alarm_basic->sms_num->cellAttributes() ?>>
<span id="el_alarm_basic_sms_num">
<input type="text" data-table="alarm_basic" data-field="x_sms_num" name="x_sms_num" id="x_sms_num" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($alarm_basic->sms_num->getPlaceHolder()) ?>" value="<?php echo $alarm_basic->sms_num->EditValue ?>"<?php echo $alarm_basic->sms_num->editAttributes() ?>>
</span>
<?php echo $alarm_basic->sms_num->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alarm_basic->sms_body->Visible) { // sms_body ?>
	<div id="r_sms_body" class="form-group row">
		<label id="elh_alarm_basic_sms_body" for="x_sms_body" class="<?php echo $alarm_basic_edit->LeftColumnClass ?>"><?php echo $alarm_basic->sms_body->caption() ?><?php echo ($alarm_basic->sms_body->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alarm_basic_edit->RightColumnClass ?>"><div<?php echo $alarm_basic->sms_body->cellAttributes() ?>>
<span id="el_alarm_basic_sms_body">
<input type="text" data-table="alarm_basic" data-field="x_sms_body" name="x_sms_body" id="x_sms_body" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($alarm_basic->sms_body->getPlaceHolder()) ?>" value="<?php echo $alarm_basic->sms_body->EditValue ?>"<?php echo $alarm_basic->sms_body->editAttributes() ?>>
</span>
<?php echo $alarm_basic->sms_body->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alarm_basic->alarm_subscriber->Visible) { // alarm_subscriber ?>
	<div id="r_alarm_subscriber" class="form-group row">
		<label id="elh_alarm_basic_alarm_subscriber" for="x_alarm_subscriber" class="<?php echo $alarm_basic_edit->LeftColumnClass ?>"><?php echo $alarm_basic->alarm_subscriber->caption() ?><?php echo ($alarm_basic->alarm_subscriber->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alarm_basic_edit->RightColumnClass ?>"><div<?php echo $alarm_basic->alarm_subscriber->cellAttributes() ?>>
<span id="el_alarm_basic_alarm_subscriber">
<input type="text" data-table="alarm_basic" data-field="x_alarm_subscriber" name="x_alarm_subscriber" id="x_alarm_subscriber" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($alarm_basic->alarm_subscriber->getPlaceHolder()) ?>" value="<?php echo $alarm_basic->alarm_subscriber->EditValue ?>"<?php echo $alarm_basic->alarm_subscriber->editAttributes() ?>>
</span>
<?php echo $alarm_basic->alarm_subscriber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alarm_basic->sms_active->Visible) { // sms_active ?>
	<div id="r_sms_active" class="form-group row">
		<label id="elh_alarm_basic_sms_active" for="x_sms_active" class="<?php echo $alarm_basic_edit->LeftColumnClass ?>"><?php echo $alarm_basic->sms_active->caption() ?><?php echo ($alarm_basic->sms_active->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alarm_basic_edit->RightColumnClass ?>"><div<?php echo $alarm_basic->sms_active->cellAttributes() ?>>
<span id="el_alarm_basic_sms_active">
<input type="text" data-table="alarm_basic" data-field="x_sms_active" name="x_sms_active" id="x_sms_active" size="30" placeholder="<?php echo HtmlEncode($alarm_basic->sms_active->getPlaceHolder()) ?>" value="<?php echo $alarm_basic->sms_active->EditValue ?>"<?php echo $alarm_basic->sms_active->editAttributes() ?>>
</span>
<?php echo $alarm_basic->sms_active->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alarm_basic->email_active->Visible) { // email_active ?>
	<div id="r_email_active" class="form-group row">
		<label id="elh_alarm_basic_email_active" for="x_email_active" class="<?php echo $alarm_basic_edit->LeftColumnClass ?>"><?php echo $alarm_basic->email_active->caption() ?><?php echo ($alarm_basic->email_active->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alarm_basic_edit->RightColumnClass ?>"><div<?php echo $alarm_basic->email_active->cellAttributes() ?>>
<span id="el_alarm_basic_email_active">
<input type="text" data-table="alarm_basic" data-field="x_email_active" name="x_email_active" id="x_email_active" size="30" placeholder="<?php echo HtmlEncode($alarm_basic->email_active->getPlaceHolder()) ?>" value="<?php echo $alarm_basic->email_active->EditValue ?>"<?php echo $alarm_basic->email_active->editAttributes() ?>>
</span>
<?php echo $alarm_basic->email_active->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$alarm_basic_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $alarm_basic_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $alarm_basic_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$alarm_basic_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$alarm_basic_edit->terminate();
?>
