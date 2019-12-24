<?php
/* Smarty version 3.1.34-dev-7, created on 2019-12-24 13:18:49
  from '/vagrant/NovoFormBuilder/src/Builders/Templates/Smarty/Util/field_group.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e0210396993f6_78551336',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6306ecd2f4289e9b8eedcfc84bff37a6f7dbe62' => 
    array (
      0 => '/vagrant/NovoFormBuilder/src/Builders/Templates/Smarty/Util/field_group.tpl',
      1 => 1577193346,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Fields/".((string)$_smarty_tpl->tpl_vars[\'group_field_definition\']->value[\'type\']).".tpl' => 1,
  ),
),false)) {
function content_5e0210396993f6_78551336 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="form-group novo-form-field-group-wrapper border border-secondary p-3">

    <?php if (!empty($_smarty_tpl->tpl_vars['field_group']->value['label'])) {?>
        <p class="novo-field-group-label <?php if (isset($_smarty_tpl->tpl_vars['field_group']->value['label']['html_class']) && !empty($_smarty_tpl->tpl_vars['field_group']->value['label']['html_class'])) {
echo $_smarty_tpl->tpl_vars['field_group']->value['label']['html_class'];
}?>">
            <?php if (!empty($_smarty_tpl->tpl_vars['field_group']->value['label']['text'])) {?>
                <?php echo $_smarty_tpl->tpl_vars['field_group']->value['label']['text'];?>

            <?php }?>
        </p>
    <?php }?>

    <?php if (!empty($_smarty_tpl->tpl_vars['field_group']->value['description'])) {?>
        <p class="novo-field-group-description 
        <?php if (isset($_smarty_tpl->tpl_vars['field_group']->value['description']['html_class']) && !empty($_smarty_tpl->tpl_vars['field_group']->value['description']['html_class'])) {?>
            <?php echo $_smarty_tpl->tpl_vars['field_group']->value['description']['html_class'];?>

        <?php }?>">
            <?php if (!empty($_smarty_tpl->tpl_vars['field_group']->value['description']['text'])) {?>
                <?php echo $_smarty_tpl->tpl_vars['field_group']->value['description']['text'];?>

            <?php }?>
        </p>
    <?php }?>
    
    <?php if (isset($_smarty_tpl->tpl_vars['field_group']->value['preceding_partial']) && null !== $_smarty_tpl->tpl_vars['field_group']->value['preceding_partial']) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['field_group']->value['preceding_partial'], 'fgpre_partial');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['fgpre_partial']->value) {
?>
            <?php $_smarty_tpl->_subTemplateRender("file:".((string)$_smarty_tpl->tpl_vars['fgpre_partial']->value['source']), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php }?>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['field_group']->value['field_definitions'], 'group_field_definition');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['group_field_definition']->value) {
?>
        <?php $_smarty_tpl->_assignInScope('input_variable', $_smarty_tpl->tpl_vars['group_field_definition']->value);?>
        <div class="form-group w-100 novo-form-field-wrapper">

            <?php if (!empty($_smarty_tpl->tpl_vars['group_field_definition']->value['label'])) {?>
                <label class="form-label w-100 
                    <?php if (isset($_smarty_tpl->tpl_vars['group_field_definition']->value['label']['html_class']) && !empty($_smarty_tpl->tpl_vars['group_field_definition']->value['label']['html_class'])) {?>
                        <?php echo $_smarty_tpl->tpl_vars['group_field_definition']->value['label']['html_class'];?>

                    <?php }?>">
                    <?php if (!empty($_smarty_tpl->tpl_vars['group_field_definition']->value['label']['text'])) {?>
                        <?php echo $_smarty_tpl->tpl_vars['group_field_definition']->value['label']['text'];?>

                        <?php if (isset($_smarty_tpl->tpl_vars['group_field_definition']->value['validation']['mandatory']) && $_smarty_tpl->tpl_vars['group_field_definition']->value['validation']['mandatory']) {?>
                            <i>*</i>
                        <?php }?>
                    <?php } else { ?>
                        &nbsp;
                    <?php }?>
                </label>
            <?php }?>

            <?php if (!empty($_smarty_tpl->tpl_vars['group_field_definition']->value['description'])) {?>
                <small class="label-description w-100 mt-1 mb-1 
                <?php if (isset($_smarty_tpl->tpl_vars['group_field_definition']->value['description']['html_class']) && !empty($_smarty_tpl->tpl_vars['group_field_definition']->value['description']['html_class'])) {?>
                    <?php echo $_smarty_tpl->tpl_vars['group_field_definition']->value['description']['html_class'];?>

                <?php }?>"><?php echo $_smarty_tpl->tpl_vars['group_field_definition']->value['description']['text'];?>
</small>
            <?php }?>

            <?php $_smarty_tpl->_subTemplateRender("file:Fields/".((string)$_smarty_tpl->tpl_vars['group_field_definition']->value['type']).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

        </div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    <?php if (isset($_smarty_tpl->tpl_vars['field_group']->value['succeeding_partial']) && null !== $_smarty_tpl->tpl_vars['field_group']->value['succeeding_partial']) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['field_group']->value['succeeding_partial'], 'fgsuc_partial');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['fgsuc_partial']->value) {
?>
            <?php $_smarty_tpl->_subTemplateRender("file:".((string)$_smarty_tpl->tpl_vars['fgsuc_partial']->value['source']), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php }?>

</div><?php }
}
