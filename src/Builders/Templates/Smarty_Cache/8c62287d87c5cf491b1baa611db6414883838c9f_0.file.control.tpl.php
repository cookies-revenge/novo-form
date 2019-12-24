<?php
/* Smarty version 3.1.34-dev-7, created on 2019-12-24 13:18:49
  from '/vagrant/NovoFormBuilder/src/Builders/Templates/Smarty/Controls/control.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e021039254ae7_56950526',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c62287d87c5cf491b1baa611db6414883838c9f' => 
    array (
      0 => '/vagrant/NovoFormBuilder/src/Builders/Templates/Smarty/Controls/control.tpl',
      1 => 1576856729,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e021039254ae7_56950526 (Smarty_Internal_Template $_smarty_tpl) {
?><button type="<?php echo $_smarty_tpl->tpl_vars['control_definition']->value['type'];?>
" 
    class="btn <?php if (isset($_smarty_tpl->tpl_vars['control_definition']->value['html_class'])) {
echo $_smarty_tpl->tpl_vars['control_definition']->value['html_class'];
} else { ?>btn-primary<?php }?>" 
    value="<?php echo $_smarty_tpl->tpl_vars['control_definition']->value['title'];?>
" 
    title="<?php if (isset($_smarty_tpl->tpl_vars['control_definition']->value['description']) && $_smarty_tpl->tpl_vars['control_definition']->value['description'] !== null) {
echo $_smarty_tpl->tpl_vars['control_definition']->value['description'];
} else {
echo $_smarty_tpl->tpl_vars['control_definition']->value['title'];
}?>">
    <?php if (isset($_smarty_tpl->tpl_vars['control_definition']->value['icon']) && $_smarty_tpl->tpl_vars['control_definition']->value['icon'] !== null) {?>
        <span class="<?php echo $_smarty_tpl->tpl_vars['control_definition']->value['icon'];?>
"></span>
        &nbsp;
    <?php }?>
    <?php echo $_smarty_tpl->tpl_vars['control_definition']->value['title'];?>

</button><?php }
}
