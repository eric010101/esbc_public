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
$esbc_host_applog_add = new esbc_host_applog_add();

// Run the page
$esbc_host_applog_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_host_applog_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fesbc_host_applogadd = currentForm = new ew.Form("fesbc_host_applogadd", "add");

// Validate form
fesbc_host_applogadd.validate = function() {
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
		<?php if ($esbc_host_applog_add->NICK_NAME->Required) { ?>
			elm = this.getElements("x" + infix + "_NICK_NAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_applog->NICK_NAME->caption(), $esbc_host_applog->NICK_NAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_host_applog_add->HOST_IP->Required) { ?>
			elm = this.getElements("x" + infix + "_HOST_IP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_applog->HOST_IP->caption(), $esbc_host_applog->HOST_IP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_host_applog_add->HOST_ROOT_ID->Required) { ?>
			elm = this.getElements("x" + infix + "_HOST_ROOT_ID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_applog->HOST_ROOT_ID->caption(), $esbc_host_applog->HOST_ROOT_ID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_host_applog_add->HOST_ROOT_PWD->Required) { ?>
			elm = this.getElements("x" + infix + "_HOST_ROOT_PWD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_applog->HOST_ROOT_PWD->caption(), $esbc_host_applog->HOST_ROOT_PWD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_host_applog_add->ACC40_PWD->Required) { ?>
			elm = this.getElements("x" + infix + "_ACC40_PWD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_applog->ACC40_PWD->caption(), $esbc_host_applog->ACC40_PWD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_host_applog_add->ACC40->Required) { ?>
			elm = this.getElements("x" + infix + "_ACC40");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_applog->ACC40->caption(), $esbc_host_applog->ACC40->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_host_applog_add->ENODE->Required) { ?>
			elm = this.getElements("x" + infix + "_ENODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_applog->ENODE->caption(), $esbc_host_applog->ENODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_host_applog_add->GENESIS->Required) { ?>
			elm = this.getElements("x" + infix + "_GENESIS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_applog->GENESIS->caption(), $esbc_host_applog->GENESIS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_host_applog_add->GETH_CMD->Required) { ?>
			elm = this.getElements("x" + infix + "_GETH_CMD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_applog->GETH_CMD->caption(), $esbc_host_applog->GETH_CMD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_host_applog_add->HOST_CONFIG_LOG->Required) { ?>
			elm = this.getElements("x" + infix + "_HOST_CONFIG_LOG");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_applog->HOST_CONFIG_LOG->caption(), $esbc_host_applog->HOST_CONFIG_LOG->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_host_applog_add->B18_LOG->Required) { ?>
			elm = this.getElements("x" + infix + "_B18_LOG");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_applog->B18_LOG->caption(), $esbc_host_applog->B18_LOG->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_host_applog_add->_1F_LOG->Required) { ?>
			elm = this.getElements("x" + infix + "__1F_LOG");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_applog->_1F_LOG->caption(), $esbc_host_applog->_1F_LOG->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_host_applog_add->Create_Date->Required) { ?>
			elm = this.getElements("x" + infix + "_Create_Date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_applog->Create_Date->caption(), $esbc_host_applog->Create_Date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Create_Date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($esbc_host_applog->Create_Date->errorMessage()) ?>");
		<?php if ($esbc_host_applog_add->ACTIVE->Required) { ?>
			elm = this.getElements("x" + infix + "_ACTIVE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_applog->ACTIVE->caption(), $esbc_host_applog->ACTIVE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_host_applog_add->Modify_Date->Required) { ?>
			elm = this.getElements("x" + infix + "_Modify_Date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_applog->Modify_Date->caption(), $esbc_host_applog->Modify_Date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Modify_Date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($esbc_host_applog->Modify_Date->errorMessage()) ?>");

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
fesbc_host_applogadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_host_applogadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fesbc_host_applogadd.lists["x_ACTIVE"] = <?php echo $esbc_host_applog_add->ACTIVE->Lookup->toClientList() ?>;
fesbc_host_applogadd.lists["x_ACTIVE"].options = <?php echo JsonEncode($esbc_host_applog_add->ACTIVE->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $esbc_host_applog_add->showPageHeader(); ?>
<?php
$esbc_host_applog_add->showMessage();
?>
<form name="fesbc_host_applogadd" id="fesbc_host_applogadd" class="<?php echo $esbc_host_applog_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_host_applog_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_host_applog_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_host_applog">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$esbc_host_applog_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($esbc_host_applog->NICK_NAME->Visible) { // NICK_NAME ?>
	<div id="r_NICK_NAME" class="form-group row">
		<label id="elh_esbc_host_applog_NICK_NAME" for="x_NICK_NAME" class="<?php echo $esbc_host_applog_add->LeftColumnClass ?>"><?php echo $esbc_host_applog->NICK_NAME->caption() ?><?php echo ($esbc_host_applog->NICK_NAME->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_applog_add->RightColumnClass ?>"><div<?php echo $esbc_host_applog->NICK_NAME->cellAttributes() ?>>
<span id="el_esbc_host_applog_NICK_NAME">
<input type="text" data-table="esbc_host_applog" data-field="x_NICK_NAME" name="x_NICK_NAME" id="x_NICK_NAME" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($esbc_host_applog->NICK_NAME->getPlaceHolder()) ?>" value="<?php echo $esbc_host_applog->NICK_NAME->EditValue ?>"<?php echo $esbc_host_applog->NICK_NAME->editAttributes() ?>>
</span>
<?php echo $esbc_host_applog->NICK_NAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_applog->HOST_IP->Visible) { // HOST_IP ?>
	<div id="r_HOST_IP" class="form-group row">
		<label id="elh_esbc_host_applog_HOST_IP" for="x_HOST_IP" class="<?php echo $esbc_host_applog_add->LeftColumnClass ?>"><?php echo $esbc_host_applog->HOST_IP->caption() ?><?php echo ($esbc_host_applog->HOST_IP->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_applog_add->RightColumnClass ?>"><div<?php echo $esbc_host_applog->HOST_IP->cellAttributes() ?>>
<span id="el_esbc_host_applog_HOST_IP">
<input type="text" data-table="esbc_host_applog" data-field="x_HOST_IP" name="x_HOST_IP" id="x_HOST_IP" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($esbc_host_applog->HOST_IP->getPlaceHolder()) ?>" value="<?php echo $esbc_host_applog->HOST_IP->EditValue ?>"<?php echo $esbc_host_applog->HOST_IP->editAttributes() ?>>
</span>
<?php echo $esbc_host_applog->HOST_IP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_applog->HOST_ROOT_ID->Visible) { // HOST_ROOT_ID ?>
	<div id="r_HOST_ROOT_ID" class="form-group row">
		<label id="elh_esbc_host_applog_HOST_ROOT_ID" for="x_HOST_ROOT_ID" class="<?php echo $esbc_host_applog_add->LeftColumnClass ?>"><?php echo $esbc_host_applog->HOST_ROOT_ID->caption() ?><?php echo ($esbc_host_applog->HOST_ROOT_ID->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_applog_add->RightColumnClass ?>"><div<?php echo $esbc_host_applog->HOST_ROOT_ID->cellAttributes() ?>>
<span id="el_esbc_host_applog_HOST_ROOT_ID">
<input type="text" data-table="esbc_host_applog" data-field="x_HOST_ROOT_ID" name="x_HOST_ROOT_ID" id="x_HOST_ROOT_ID" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($esbc_host_applog->HOST_ROOT_ID->getPlaceHolder()) ?>" value="<?php echo $esbc_host_applog->HOST_ROOT_ID->EditValue ?>"<?php echo $esbc_host_applog->HOST_ROOT_ID->editAttributes() ?>>
</span>
<?php echo $esbc_host_applog->HOST_ROOT_ID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_applog->HOST_ROOT_PWD->Visible) { // HOST_ROOT_PWD ?>
	<div id="r_HOST_ROOT_PWD" class="form-group row">
		<label id="elh_esbc_host_applog_HOST_ROOT_PWD" for="x_HOST_ROOT_PWD" class="<?php echo $esbc_host_applog_add->LeftColumnClass ?>"><?php echo $esbc_host_applog->HOST_ROOT_PWD->caption() ?><?php echo ($esbc_host_applog->HOST_ROOT_PWD->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_applog_add->RightColumnClass ?>"><div<?php echo $esbc_host_applog->HOST_ROOT_PWD->cellAttributes() ?>>
<span id="el_esbc_host_applog_HOST_ROOT_PWD">
<input type="text" data-table="esbc_host_applog" data-field="x_HOST_ROOT_PWD" name="x_HOST_ROOT_PWD" id="x_HOST_ROOT_PWD" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($esbc_host_applog->HOST_ROOT_PWD->getPlaceHolder()) ?>" value="<?php echo $esbc_host_applog->HOST_ROOT_PWD->EditValue ?>"<?php echo $esbc_host_applog->HOST_ROOT_PWD->editAttributes() ?>>
</span>
<?php echo $esbc_host_applog->HOST_ROOT_PWD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_applog->ACC40_PWD->Visible) { // ACC40_PWD ?>
	<div id="r_ACC40_PWD" class="form-group row">
		<label id="elh_esbc_host_applog_ACC40_PWD" for="x_ACC40_PWD" class="<?php echo $esbc_host_applog_add->LeftColumnClass ?>"><?php echo $esbc_host_applog->ACC40_PWD->caption() ?><?php echo ($esbc_host_applog->ACC40_PWD->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_applog_add->RightColumnClass ?>"><div<?php echo $esbc_host_applog->ACC40_PWD->cellAttributes() ?>>
<span id="el_esbc_host_applog_ACC40_PWD">
<textarea data-table="esbc_host_applog" data-field="x_ACC40_PWD" name="x_ACC40_PWD" id="x_ACC40_PWD" cols="35" rows="4" placeholder="<?php echo HtmlEncode($esbc_host_applog->ACC40_PWD->getPlaceHolder()) ?>"<?php echo $esbc_host_applog->ACC40_PWD->editAttributes() ?>><?php echo $esbc_host_applog->ACC40_PWD->EditValue ?></textarea>
</span>
<?php echo $esbc_host_applog->ACC40_PWD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_applog->ACC40->Visible) { // ACC40 ?>
	<div id="r_ACC40" class="form-group row">
		<label id="elh_esbc_host_applog_ACC40" for="x_ACC40" class="<?php echo $esbc_host_applog_add->LeftColumnClass ?>"><?php echo $esbc_host_applog->ACC40->caption() ?><?php echo ($esbc_host_applog->ACC40->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_applog_add->RightColumnClass ?>"><div<?php echo $esbc_host_applog->ACC40->cellAttributes() ?>>
<span id="el_esbc_host_applog_ACC40">
<textarea data-table="esbc_host_applog" data-field="x_ACC40" name="x_ACC40" id="x_ACC40" cols="35" rows="4" placeholder="<?php echo HtmlEncode($esbc_host_applog->ACC40->getPlaceHolder()) ?>"<?php echo $esbc_host_applog->ACC40->editAttributes() ?>><?php echo $esbc_host_applog->ACC40->EditValue ?></textarea>
</span>
<?php echo $esbc_host_applog->ACC40->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_applog->ENODE->Visible) { // ENODE ?>
	<div id="r_ENODE" class="form-group row">
		<label id="elh_esbc_host_applog_ENODE" for="x_ENODE" class="<?php echo $esbc_host_applog_add->LeftColumnClass ?>"><?php echo $esbc_host_applog->ENODE->caption() ?><?php echo ($esbc_host_applog->ENODE->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_applog_add->RightColumnClass ?>"><div<?php echo $esbc_host_applog->ENODE->cellAttributes() ?>>
<span id="el_esbc_host_applog_ENODE">
<textarea data-table="esbc_host_applog" data-field="x_ENODE" name="x_ENODE" id="x_ENODE" cols="35" rows="4" placeholder="<?php echo HtmlEncode($esbc_host_applog->ENODE->getPlaceHolder()) ?>"<?php echo $esbc_host_applog->ENODE->editAttributes() ?>><?php echo $esbc_host_applog->ENODE->EditValue ?></textarea>
</span>
<?php echo $esbc_host_applog->ENODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_applog->GENESIS->Visible) { // GENESIS ?>
	<div id="r_GENESIS" class="form-group row">
		<label id="elh_esbc_host_applog_GENESIS" for="x_GENESIS" class="<?php echo $esbc_host_applog_add->LeftColumnClass ?>"><?php echo $esbc_host_applog->GENESIS->caption() ?><?php echo ($esbc_host_applog->GENESIS->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_applog_add->RightColumnClass ?>"><div<?php echo $esbc_host_applog->GENESIS->cellAttributes() ?>>
<span id="el_esbc_host_applog_GENESIS">
<textarea data-table="esbc_host_applog" data-field="x_GENESIS" name="x_GENESIS" id="x_GENESIS" cols="35" rows="4" placeholder="<?php echo HtmlEncode($esbc_host_applog->GENESIS->getPlaceHolder()) ?>"<?php echo $esbc_host_applog->GENESIS->editAttributes() ?>><?php echo $esbc_host_applog->GENESIS->EditValue ?></textarea>
</span>
<?php echo $esbc_host_applog->GENESIS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_applog->GETH_CMD->Visible) { // GETH_CMD ?>
	<div id="r_GETH_CMD" class="form-group row">
		<label id="elh_esbc_host_applog_GETH_CMD" for="x_GETH_CMD" class="<?php echo $esbc_host_applog_add->LeftColumnClass ?>"><?php echo $esbc_host_applog->GETH_CMD->caption() ?><?php echo ($esbc_host_applog->GETH_CMD->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_applog_add->RightColumnClass ?>"><div<?php echo $esbc_host_applog->GETH_CMD->cellAttributes() ?>>
<span id="el_esbc_host_applog_GETH_CMD">
<textarea data-table="esbc_host_applog" data-field="x_GETH_CMD" name="x_GETH_CMD" id="x_GETH_CMD" cols="35" rows="4" placeholder="<?php echo HtmlEncode($esbc_host_applog->GETH_CMD->getPlaceHolder()) ?>"<?php echo $esbc_host_applog->GETH_CMD->editAttributes() ?>><?php echo $esbc_host_applog->GETH_CMD->EditValue ?></textarea>
</span>
<?php echo $esbc_host_applog->GETH_CMD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_applog->HOST_CONFIG_LOG->Visible) { // HOST_CONFIG_LOG ?>
	<div id="r_HOST_CONFIG_LOG" class="form-group row">
		<label id="elh_esbc_host_applog_HOST_CONFIG_LOG" for="x_HOST_CONFIG_LOG" class="<?php echo $esbc_host_applog_add->LeftColumnClass ?>"><?php echo $esbc_host_applog->HOST_CONFIG_LOG->caption() ?><?php echo ($esbc_host_applog->HOST_CONFIG_LOG->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_applog_add->RightColumnClass ?>"><div<?php echo $esbc_host_applog->HOST_CONFIG_LOG->cellAttributes() ?>>
<span id="el_esbc_host_applog_HOST_CONFIG_LOG">
<textarea data-table="esbc_host_applog" data-field="x_HOST_CONFIG_LOG" name="x_HOST_CONFIG_LOG" id="x_HOST_CONFIG_LOG" cols="35" rows="4" placeholder="<?php echo HtmlEncode($esbc_host_applog->HOST_CONFIG_LOG->getPlaceHolder()) ?>"<?php echo $esbc_host_applog->HOST_CONFIG_LOG->editAttributes() ?>><?php echo $esbc_host_applog->HOST_CONFIG_LOG->EditValue ?></textarea>
</span>
<?php echo $esbc_host_applog->HOST_CONFIG_LOG->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_applog->B18_LOG->Visible) { // B18_LOG ?>
	<div id="r_B18_LOG" class="form-group row">
		<label id="elh_esbc_host_applog_B18_LOG" for="x_B18_LOG" class="<?php echo $esbc_host_applog_add->LeftColumnClass ?>"><?php echo $esbc_host_applog->B18_LOG->caption() ?><?php echo ($esbc_host_applog->B18_LOG->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_applog_add->RightColumnClass ?>"><div<?php echo $esbc_host_applog->B18_LOG->cellAttributes() ?>>
<span id="el_esbc_host_applog_B18_LOG">
<textarea data-table="esbc_host_applog" data-field="x_B18_LOG" name="x_B18_LOG" id="x_B18_LOG" cols="35" rows="4" placeholder="<?php echo HtmlEncode($esbc_host_applog->B18_LOG->getPlaceHolder()) ?>"<?php echo $esbc_host_applog->B18_LOG->editAttributes() ?>><?php echo $esbc_host_applog->B18_LOG->EditValue ?></textarea>
</span>
<?php echo $esbc_host_applog->B18_LOG->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_applog->_1F_LOG->Visible) { // 1F_LOG ?>
	<div id="r__1F_LOG" class="form-group row">
		<label id="elh_esbc_host_applog__1F_LOG" for="x__1F_LOG" class="<?php echo $esbc_host_applog_add->LeftColumnClass ?>"><?php echo $esbc_host_applog->_1F_LOG->caption() ?><?php echo ($esbc_host_applog->_1F_LOG->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_applog_add->RightColumnClass ?>"><div<?php echo $esbc_host_applog->_1F_LOG->cellAttributes() ?>>
<span id="el_esbc_host_applog__1F_LOG">
<textarea data-table="esbc_host_applog" data-field="x__1F_LOG" name="x__1F_LOG" id="x__1F_LOG" cols="35" rows="4" placeholder="<?php echo HtmlEncode($esbc_host_applog->_1F_LOG->getPlaceHolder()) ?>"<?php echo $esbc_host_applog->_1F_LOG->editAttributes() ?>><?php echo $esbc_host_applog->_1F_LOG->EditValue ?></textarea>
</span>
<?php echo $esbc_host_applog->_1F_LOG->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_applog->Create_Date->Visible) { // Create_Date ?>
	<div id="r_Create_Date" class="form-group row">
		<label id="elh_esbc_host_applog_Create_Date" for="x_Create_Date" class="<?php echo $esbc_host_applog_add->LeftColumnClass ?>"><?php echo $esbc_host_applog->Create_Date->caption() ?><?php echo ($esbc_host_applog->Create_Date->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_applog_add->RightColumnClass ?>"><div<?php echo $esbc_host_applog->Create_Date->cellAttributes() ?>>
<span id="el_esbc_host_applog_Create_Date">
<input type="text" data-table="esbc_host_applog" data-field="x_Create_Date" data-format="1" name="x_Create_Date" id="x_Create_Date" placeholder="<?php echo HtmlEncode($esbc_host_applog->Create_Date->getPlaceHolder()) ?>" value="<?php echo $esbc_host_applog->Create_Date->EditValue ?>"<?php echo $esbc_host_applog->Create_Date->editAttributes() ?>>
<?php if (!$esbc_host_applog->Create_Date->ReadOnly && !$esbc_host_applog->Create_Date->Disabled && !isset($esbc_host_applog->Create_Date->EditAttrs["readonly"]) && !isset($esbc_host_applog->Create_Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fesbc_host_applogadd", "x_Create_Date", {"ignoreReadonly":true,"useCurrent":false,"format":1});
</script>
<?php } ?>
</span>
<?php echo $esbc_host_applog->Create_Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_applog->ACTIVE->Visible) { // ACTIVE ?>
	<div id="r_ACTIVE" class="form-group row">
		<label id="elh_esbc_host_applog_ACTIVE" for="x_ACTIVE" class="<?php echo $esbc_host_applog_add->LeftColumnClass ?>"><?php echo $esbc_host_applog->ACTIVE->caption() ?><?php echo ($esbc_host_applog->ACTIVE->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_applog_add->RightColumnClass ?>"><div<?php echo $esbc_host_applog->ACTIVE->cellAttributes() ?>>
<span id="el_esbc_host_applog_ACTIVE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="esbc_host_applog" data-field="x_ACTIVE" data-value-separator="<?php echo $esbc_host_applog->ACTIVE->displayValueSeparatorAttribute() ?>" id="x_ACTIVE" name="x_ACTIVE"<?php echo $esbc_host_applog->ACTIVE->editAttributes() ?>>
		<?php echo $esbc_host_applog->ACTIVE->selectOptionListHtml("x_ACTIVE") ?>
	</select>
</div>
</span>
<?php echo $esbc_host_applog->ACTIVE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_applog->Modify_Date->Visible) { // Modify_Date ?>
	<div id="r_Modify_Date" class="form-group row">
		<label id="elh_esbc_host_applog_Modify_Date" for="x_Modify_Date" class="<?php echo $esbc_host_applog_add->LeftColumnClass ?>"><?php echo $esbc_host_applog->Modify_Date->caption() ?><?php echo ($esbc_host_applog->Modify_Date->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_applog_add->RightColumnClass ?>"><div<?php echo $esbc_host_applog->Modify_Date->cellAttributes() ?>>
<span id="el_esbc_host_applog_Modify_Date">
<input type="text" data-table="esbc_host_applog" data-field="x_Modify_Date" data-format="1" name="x_Modify_Date" id="x_Modify_Date" placeholder="<?php echo HtmlEncode($esbc_host_applog->Modify_Date->getPlaceHolder()) ?>" value="<?php echo $esbc_host_applog->Modify_Date->EditValue ?>"<?php echo $esbc_host_applog->Modify_Date->editAttributes() ?>>
<?php if (!$esbc_host_applog->Modify_Date->ReadOnly && !$esbc_host_applog->Modify_Date->Disabled && !isset($esbc_host_applog->Modify_Date->EditAttrs["readonly"]) && !isset($esbc_host_applog->Modify_Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fesbc_host_applogadd", "x_Modify_Date", {"ignoreReadonly":true,"useCurrent":false,"format":1});
</script>
<?php } ?>
</span>
<?php echo $esbc_host_applog->Modify_Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$esbc_host_applog_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $esbc_host_applog_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $esbc_host_applog_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$esbc_host_applog_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$esbc_host_applog_add->terminate();
?>
