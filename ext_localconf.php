<?php

if(!defined('TYPO3_MODE')) die ('Access denied.');


\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Bwd2.' . $_EXTKEY,
    'FrontendFunctions',
    array(
        'EngageAjax' => 'loadPage, leavePage, userEngage'
    ),
    array(
        'EngageAjax' => 'loadPage, leavePage, userEngage'
    )
);


$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][''] =
    \Bwd2\Engage\Hooks\DataHandler::class;


