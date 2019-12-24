<?php
/* Smarty version 3.1.34-dev-7, created on 2019-12-24 13:18:49
  from '/vagrant/NovoFormBuilder/src/Builders/Templates/Smarty/Fields/textarea.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e021039dea8b2_79862485',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b1a693f814d8b5a4e23e1d94aefca7082432d449' => 
    array (
      0 => '/vagrant/NovoFormBuilder/src/Builders/Templates/Smarty/Fields/textarea.tpl',
      1 => 1577192056,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e021039dea8b2_79862485 (Smarty_Internal_Template $_smarty_tpl) {
?><div <?php if ($_smarty_tpl->tpl_vars['input_variable']->value['html_class']) {?>class="<?php echo $_smarty_tpl->tpl_vars['input_variable']->value['html_class'];?>
"<?php }?>>

    <div class="input-group <?php if (isset($_smarty_tpl->tpl_vars['input_variable']->value['size']) && null !== $_smarty_tpl->tpl_vars['input_variable']->value['size']) {?>input-group-<?php echo $_smarty_tpl->tpl_vars['input_variable']->value['size'];
}?>">

        <?php if (isset($_smarty_tpl->tpl_vars['input_variable']->value['icon']) && null !== $_smarty_tpl->tpl_vars['input_variable']->value['icon'] && isset($_smarty_tpl->tpl_vars['input_variable']->value['icon']['position']) && $_smarty_tpl->tpl_vars['input_variable']->value['icon']['position'] === "L") {?>
            <span class="input-group-prepend">
                <i class="input-group-text bg-dark text-white border-dark 
                    <?php if (isset($_smarty_tpl->tpl_vars['input_variable']->value['icon']['html_class']) && !empty($_smarty_tpl->tpl_vars['input_variable']->value['icon']['html_class'])) {
echo $_smarty_tpl->tpl_vars['input_variable']->value['icon']['html_class'];
}?>">
                    <?php if (isset($_smarty_tpl->tpl_vars['input_variable']->value['icon']['description']) && !empty($_smarty_tpl->tpl_vars['input_variable']->value['icon']['description'])) {
echo $_smarty_tpl->tpl_vars['input_variable']->value['icon']['description'];
}?>
                </i>
            </span>
        <?php }?>

		<textarea class="form-control" rows="5" 
            <?php if (isset($_smarty_tpl->tpl_vars['input_variable']->value['resizable']) && !$_smarty_tpl->tpl_vars['input_variable']->value['resizable']) {?>
                style="resize: none;"
            <?php }?>
            name="<?php echo $_smarty_tpl->tpl_vars['input_variable']->value['name'];?>
" 
            placeholder="<?php if (isset($_smarty_tpl->tpl_vars['input_variable']->value['placeholder']) && $_smarty_tpl->tpl_vars['input_variable']->value['placeholder']) {
echo $_smarty_tpl->tpl_vars['input_variable']->value['placeholder'];
}?>"
            vito-name="<?php echo $_smarty_tpl->tpl_vars['input_variable']->value['name'];?>
-<?php echo $_smarty_tpl->tpl_vars['field_index']->value;?>
"

	        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input_variable']->value['validation'], 'value', false, 'validation_type');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['validation_type']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>vito-<?php echo $_smarty_tpl->tpl_vars['validation_type']->value;?>
="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
"<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 

	        <?php if (isset($_smarty_tpl->tpl_vars['input_variable']->value['readonly']) && $_smarty_tpl->tpl_vars['input_variable']->value['readonly']) {?>readonly<?php }?>
        ><?php if (isset($_smarty_tpl->tpl_vars['record']->value)) {
echo $_smarty_tpl->tpl_vars['record']->value[$_smarty_tpl->tpl_vars['input_variable']->value['name']];
} elseif (isset($_smarty_tpl->tpl_vars['presets']->value) && isset($_smarty_tpl->tpl_vars['presets']->value[$_smarty_tpl->tpl_vars['input_variable']->value['name']])) {
echo $_smarty_tpl->tpl_vars['presets']->value[$_smarty_tpl->tpl_vars['input_variable']->value['name']];
}?></textarea>

        <?php if (isset($_smarty_tpl->tpl_vars['input_variable']->value['icon']) && null !== $_smarty_tpl->tpl_vars['input_variable']->value['icon'] && isset($_smarty_tpl->tpl_vars['input_variable']->value['icon']['position']) && $_smarty_tpl->tpl_vars['input_variable']->value['icon']['position'] === "R") {?>
            <span class="input-group-append">
                <i class="input-group-text bg-dark text-white border-dark 
                    <?php if (isset($_smarty_tpl->tpl_vars['input_variable']->value['icon']['html_class']) && !empty($_smarty_tpl->tpl_vars['input_variable']->value['icon']['html_class'])) {
echo $_smarty_tpl->tpl_vars['input_variable']->value['icon']['html_class'];
}?>">
                    <?php if (isset($_smarty_tpl->tpl_vars['input_variable']->value['icon']['description']) && !empty($_smarty_tpl->tpl_vars['input_variable']->value['icon']['description'])) {
echo $_smarty_tpl->tpl_vars['input_variable']->value['icon']['description'];
}?>
                </i>
            </span>
        <?php }?>
      
    </div>
</div><?php }
}
