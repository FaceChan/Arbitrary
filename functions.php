<?php

function themeConfig($form) {
    $indexNotice = new Typecho_Widget_Helper_Form_Element_Text('indexNotice', NULL, NULL, _t('首页小提示'));
    $form->addInput($indexNotice);
}
