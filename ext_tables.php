<?php

if(!defined('TYPO3_MODE')) die ('Access denied.');

// \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin($_EXTKEY, 'Pi1', 'Engage Plugin');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Bwd2.' . $_EXTKEY,
    'FrontendFunctions',
    'Ajax Plugin'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Engage Configuration');
//\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ajaxselectlist_domain_model_optionrecord', 'EXT:ajaxselectlist/Resources/Private/Language/locallang_csh_tx_ajaxselectlist_domain_model_optionrecord.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_engage_domain_model_engage');


