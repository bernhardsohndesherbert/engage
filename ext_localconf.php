<?php

if(!defined('TYPO3_MODE')) die ('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Bwd2.' . $_EXTKEY,
    'Engage',
    array(
        'Engage' => 'list',
    )
);


$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['de']['EXT:cms/locallang_tca.xlf'][] = 'EXT:engage/Resources/Private/Language/de.locallang.xlf';

