<?php
/* Smarty version 3.1.34-dev-7, created on 2019-08-28 10:06:29
  from 'C:\xampp\htdocs\boardSmarty\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d663605a6b5b6_31799827',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c1eb0e7a5e9a7ec7533b9cc4eff347519874944' => 
    array (
      0 => 'C:\\xampp\\htdocs\\boardSmarty\\templates\\index.tpl',
      1 => 1566979336,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5d663605a6b5b6_31799827 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '7951034845d663605a4a783_04494568';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>大家好，我叫<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
, 歡迎大家閱讀我的smarty學習材料。
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
