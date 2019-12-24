<?php
/* Smarty version 3.1.34-dev-7, created on 2019-12-24 13:18:49
  from '/vagrant/NovoFormBuilder/src/Builders/Templates/Smarty/form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e0210390c3f51_79581542',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7169025e4514e642a8767d31da45ef268173a56' => 
    array (
      0 => '/vagrant/NovoFormBuilder/src/Builders/Templates/Smarty/form.tpl',
      1 => 1577193363,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Controls/control.tpl' => 2,
    'file:Fields/hidden.tpl' => 1,
    'file:Util/field_group.tpl' => 1,
    'file:util/complex_type.tpl' => 1,
    'file:Fields/".((string)$_smarty_tpl->tpl_vars[\'field_definition\']->value[\'type\']).".tpl' => 1,
  ),
),false)) {
function content_5e0210390c3f51_79581542 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="container novo-form-container">


    <?php if (isset($_smarty_tpl->tpl_vars['title']->value)) {?>
        <div class="novo-form-title" class="mb-4">
            <<?php echo $_smarty_tpl->tpl_vars['title_tag']->value;?>
 class="text-gray-800 <?php echo $_smarty_tpl->tpl_vars['title_tag']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</<?php echo $_smarty_tpl->tpl_vars['title_tag']->value;?>
>
        </div>
    <?php }?>


        <?php if (isset($_smarty_tpl->tpl_vars['preceding_partial']->value) && null !== $_smarty_tpl->tpl_vars['preceding_partial']->value) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['preceding_partial']->value, 'pre_partial');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['pre_partial']->value) {
?>
            <?php $_smarty_tpl->_subTemplateRender("file:".((string)$_smarty_tpl->tpl_vars['pre_partial']->value['source']), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php }?>


    <form id="<?php echo $_smarty_tpl->tpl_vars['entity']->value;?>
_form" 
        action="<?php if (isset($_smarty_tpl->tpl_vars['action_uri']->value)) {
echo $_smarty_tpl->tpl_vars['action_uri']->value;
} else { ?>/api/<?php echo strtolower($_smarty_tpl->tpl_vars['entity']->value);
if (isset($_smarty_tpl->tpl_vars['record']->value)) {?>/<?php echo $_smarty_tpl->tpl_vars['record']->value['Id'];
}
}?>" 
        method="POST" 
        enctype="multipart/form-data" 
        data-http-method="<?php if (!empty($_smarty_tpl->tpl_vars['record']->value)) {?>PUT<?php } else { ?>POST<?php }?>" 
        data-form-type="<?php echo $_smarty_tpl->tpl_vars['form_type']->value;?>
" 
        class="novo-form js__novo-form">


                <?php if ($_smarty_tpl->tpl_vars['display_double_controls']->value) {?>
            <div class="form-group w-100 novo-form-controls-wrapper border border-secondary p-2">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['control_definitions']->value, 'control_definition');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['control_definition']->value) {
?>
                    <?php if (!isset($_smarty_tpl->tpl_vars['control_definition']->value['availability']) || $_smarty_tpl->tpl_vars['control_definition']->value['availability'] === "*" || (!empty($_smarty_tpl->tpl_vars['record']->value) && $_smarty_tpl->tpl_vars['control_definition']->value['availability'] === "edit") || (empty($_smarty_tpl->tpl_vars['record']->value) && $_smarty_tpl->tpl_vars['control_definition']->value['availability'] === "new")) {?>
                        <?php $_smarty_tpl->_subTemplateRender("file:Controls/control.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                    <?php }?>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        <?php }?>


                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['field_definitions']->value, 'field_definition');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field_definition']->value) {
?>
            <?php if ($_smarty_tpl->tpl_vars['field_definition']->value['type'] === "hidden") {?>
                <?php if (!isset($_smarty_tpl->tpl_vars['field_definition']->value['availability']) || $_smarty_tpl->tpl_vars['field_definition']->value['availability'] === "*" || (!empty($_smarty_tpl->tpl_vars['record']->value) && $_smarty_tpl->tpl_vars['field_definition']->value['availability'] === "edit") || (empty($_smarty_tpl->tpl_vars['record']->value) && $_smarty_tpl->tpl_vars['field_definition']->value['availability'] === "new")) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:Fields/hidden.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                <?php }?>
            <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        

        <?php $_smarty_tpl->_assignInScope('field_index', 0);?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['field_definitions']->value, 'field_definition');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field_definition']->value) {
?>

            <?php if (!isset($_smarty_tpl->tpl_vars['field_definition']->value['availability']) || $_smarty_tpl->tpl_vars['field_definition']->value['availability'] === "*" || (!empty($_smarty_tpl->tpl_vars['record']->value) && $_smarty_tpl->tpl_vars['field_definition']->value['availability'] === "edit") || (empty($_smarty_tpl->tpl_vars['record']->value) && $_smarty_tpl->tpl_vars['field_definition']->value['availability'] === "new")) {?>

                <?php if ($_smarty_tpl->tpl_vars['field_definition']->value['type'] === "hidden") {?>
                                        <?php continue 1;?>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['field_definition']->value['type'] === "fieldgroup") {?>
                    <?php $_smarty_tpl->_assignInScope('field_group', $_smarty_tpl->tpl_vars['field_definition']->value);?>
                    <?php $_smarty_tpl->_subTemplateRender("file:Util/field_group.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                                        <?php continue 1;?>
                <?php }?>


                <div class="form-group w-100 novo-form-field-wrapper">


                                        <?php if (isset($_smarty_tpl->tpl_vars['field_definition']->value['preceding_partial']) && null !== $_smarty_tpl->tpl_vars['field_definition']->value['preceding_partial']) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['field_definition']->value['preceding_partial'], 'pre_partial');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['pre_partial']->value) {
?>
                            <?php $_smarty_tpl->_subTemplateRender("file:".((string)$_smarty_tpl->tpl_vars['pre_partial']->value['source']), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php }?>


                    <?php if (!empty($_smarty_tpl->tpl_vars['field_definition']->value['label'])) {?>
                        <label class="form-label w-100 
                            <?php if (isset($_smarty_tpl->tpl_vars['field_definition']->value['label']['html_class']) && !empty($_smarty_tpl->tpl_vars['field_definition']->value['label']['html_class'])) {?>
                                <?php echo $_smarty_tpl->tpl_vars['field_definition']->value['label']['html_class'];?>

                            <?php }?>">
                            <?php if (!empty($_smarty_tpl->tpl_vars['field_definition']->value['label']['text'])) {?>
                                <?php echo $_smarty_tpl->tpl_vars['field_definition']->value['label']['text'];?>

                                <?php if (isset($_smarty_tpl->tpl_vars['field_definition']->value['validation']['mandatory']) && $_smarty_tpl->tpl_vars['field_definition']->value['validation']['mandatory']) {?>
                                    <i>*</i>
                                <?php }?>
                            <?php } else { ?>
                                &nbsp;
                            <?php }?>
                        </label>
                    <?php }?>

                    <?php if (!empty($_smarty_tpl->tpl_vars['field_definition']->value['description'])) {?>
                        <small class="label-description w-100 mt-1 mb-1 
                        <?php if (isset($_smarty_tpl->tpl_vars['field_definition']->value['description']['html_class']) && !empty($_smarty_tpl->tpl_vars['field_definition']->value['description']['html_class'])) {?>
                            <?php echo $_smarty_tpl->tpl_vars['field_definition']->value['description']['html_class'];?>

                        <?php }?>"><?php echo $_smarty_tpl->tpl_vars['field_definition']->value['description']['text'];?>
</small>
                    <?php }?>

                    
                    <?php if ($_smarty_tpl->tpl_vars['field_definition']->value['type'] === "complex") {?>
                        <?php $_smarty_tpl->_subTemplateRender("file:util/complex_type.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['field_definition']->value['type'] === "custom") {?>
                                            <?php } else { ?>
                        <?php $_smarty_tpl->_assignInScope('input_variable', $_smarty_tpl->tpl_vars['field_definition']->value);?>
                        <?php $_smarty_tpl->_subTemplateRender("file:Fields/".((string)$_smarty_tpl->tpl_vars['field_definition']->value['type']).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                    <?php }?>


                                        <?php if (isset($_smarty_tpl->tpl_vars['field_definition']->value['succeeding_partial']) && null !== $_smarty_tpl->tpl_vars['field_definition']->value['succeeding_partial']) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['field_definition']->value['succeeding_partial'], 'suc_partial');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['suc_partial']->value) {
?>
                            <?php $_smarty_tpl->_subTemplateRender("file:".((string)$_smarty_tpl->tpl_vars['suc_partial']->value['source']), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php }?>
                </div>


            <?php }?>
        
                        <?php $_smarty_tpl->_assignInScope('field_index', $_smarty_tpl->tpl_vars['field_index']->value+1);?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


        <div class="form-group w-100 novo-form-controls-wrapper border border-secondary p-2">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['control_definitions']->value, 'control_definition');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['control_definition']->value) {
?>
                <?php if (!isset($_smarty_tpl->tpl_vars['control_definition']->value['availability']) || $_smarty_tpl->tpl_vars['control_definition']->value['availability'] === "*" || (!empty($_smarty_tpl->tpl_vars['record']->value) && $_smarty_tpl->tpl_vars['control_definition']->value['availability'] === "edit") || (empty($_smarty_tpl->tpl_vars['record']->value) && $_smarty_tpl->tpl_vars['control_definition']->value['availability'] === "new")) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:Controls/control.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                <?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>

    </form>


        <?php if (isset($_smarty_tpl->tpl_vars['succeeding_partial']->value) && null !== $_smarty_tpl->tpl_vars['succeeding_partial']->value) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['succeeding_partial']->value, 'suc_partial');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['suc_partial']->value) {
?>
            <?php $_smarty_tpl->_subTemplateRender("file:".((string)$_smarty_tpl->tpl_vars['suc_partial']->value['source']), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php }?>

</section><?php }
}
