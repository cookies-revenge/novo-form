<?php
/* Smarty version 3.1.34-dev-7, created on 2019-12-24 13:18:49
  from '/vagrant/NovoFormBuilder/src/Builders/Templates/Smarty/Fields/input.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e0210394610a1_92413312',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f7481d4a119c3b5be6a3f679d399b70804d4610' => 
    array (
      0 => '/vagrant/NovoFormBuilder/src/Builders/Templates/Smarty/Fields/input.tpl',
      1 => 1577188878,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e0210394610a1_92413312 (Smarty_Internal_Template $_smarty_tpl) {
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

		<input class="form-control" type="text" 
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

         <?php if (isset($_smarty_tpl->tpl_vars['record']->value)) {?>
            value="<?php echo $_smarty_tpl->tpl_vars['record']->value[$_smarty_tpl->tpl_vars['input_variable']->value['name']];?>
"
         <?php } elseif (isset($_smarty_tpl->tpl_vars['presets']->value) && isset($_smarty_tpl->tpl_vars['presets']->value[$_smarty_tpl->tpl_vars['input_variable']->value['name']])) {?>
            value="<?php echo $_smarty_tpl->tpl_vars['presets']->value[$_smarty_tpl->tpl_vars['input_variable']->value['name']];?>
"
         <?php }?>
      />

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
