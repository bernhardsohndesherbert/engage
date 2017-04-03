<?php

if(!defined('TYPO3_MODE')) die ('Access denied.');


\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Bwd2.' . $_EXTKEY,
    'Pi1',
    array(
        'Engage' => 'list'
    )
);


$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][''] =
    \Bwd2\Engage\Hooks\DataHandler::class;

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processCmdmapClass'][''] =
    \Bwd2\Engage\Hooks\DataHandler::class;

