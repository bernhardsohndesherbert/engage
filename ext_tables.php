<?php

if(!defined('TYPO3_MODE')) die ('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin($_EXTKEY, 'Localcontactplugin', 'Lokaler Ansprechpartner');
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin($_EXTKEY, 'Listcontactsplugin', 'Liste aller Ansprechpartner mit Auswahl');

