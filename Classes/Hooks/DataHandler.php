<?php

namespace Bwd2\Engage\Hooks;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */


use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;


class DataHandler {


    public $configurationManager;
    public $settings;
    public $connection;

    public function __construct() {

        $this->configurationManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManager');
        $this->settings = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);
        $this->connection = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable('tx_engage_domain_model_engage');
    }

    /**
     * Insert Engage Record with data from table.
     *
     * @param string $status
     * @param string $table
     * @param int $id
     * @param array $fieldArray
     * @param $parentObject \TYPO3\CMS\Core\DataHandling\DataHandler
     */
    public function processDatamap_afterDatabaseOperations($status, $table, $id, array $fieldArray, \TYPO3\CMS\Core\DataHandling\DataHandler &$pObj) {

        if($table == "tx_news_domain_model_news" && $status == "new") {


            $generalConf = $this->settings['plugin.']['tx_engage.']['settings.']['general.'];
            $recordConf = $this->settings['plugin.']['tx_engage.']['settings.'][$table . '.'];

            $lookUpFields = explode(',', preg_replace('/\s+/', '',$recordConf['lookUpFields']));

            $wordsToRead = 0;
            foreach ($lookUpFields as $field) {
                $wordsToRead += $this->removeHtmlFromText($fieldArray[$field], $generalConf);
            }

            $sysReadTime = $wordsToRead / $generalConf['wordsPerMinute']*60;

            $this->connection->insert(
                'tx_engage_domain_model_engage',
                [
                    'record_type' => (string)$table,
                    'record_uid' => (int)$pObj->substNEWwithIDs[$id],
                    'total_views' => 0,
                    'full_views' => 0,
                    'words_to_read' => (int)$wordsToRead,
                    'sys_read_time' => (int)$sysReadTime,
                    'avg_read_time' => 0,
                    'avg_read_length' => 0
                ]
            );




            if ($recordConf['includeCEs']) {
/*
                //  get content elements by news uid
                //  get text by fieldsettings   $ceLookUpFields = explode(','$recordConf['includeCEs.']['lookupfields']');
                //  foreach($ceLookUpFields as $field) {
                //    $wordsToRead += $this->removeHtmlFromText($field, $generalConf);
                //}



                $resultRows = GeneralUtility::makeInstance(ConnectionPool::class)
                    ->getConnectionForTable('tt_content')
                    ->select(
                        explode(',', preg_replace('/\s+/', '',$recordConf['includeCEs.']['lookUpFields'])),
                        'tt_content',
                        ['tx_news_related_news' => (int)$id]
                    );


                while ($row = $resultRows->fetch()) {
                    \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($row, "My ------");
                }


                \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($id, "My id");

                \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(explode(',', preg_replace('/\s+/', '',$recordConf['includeCEs.']['lookUpFields'])), "My lookup");

*/
            }






        }
    }



    /**
     * Update Engage Record with data from table.
     *
     * @param string $status
     * @param string $table
     * @param int $id
     * @param array $fieldArray
     * @param $parentObject \TYPO3\CMS\Core\DataHandling\DataHandler
     */
    public function processDatamap_preProcessFieldArray(array &$fieldArray, $table, $id, \TYPO3\CMS\Core\DataHandling\DataHandler &$pObj) {


        if($table == "tx_news_domain_model_news" && $status === null) {

            $generalConf = $this->settings['plugin.']['tx_engage.']['settings.']['general.'];
            $recordConf = $this->settings['plugin.']['tx_engage.']['settings.'][$table . '.'];

            $this->connection = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable('tx_engage_domain_model_engage');

            $lookUpFields = explode(',', preg_replace('/\s+/', '',$recordConf['lookUpFields']));

            $wordsToRead = 0;
            foreach ($lookUpFields as $field) {
                $wordsToRead += $this->removeHtmlFromText($fieldArray[$field], $generalConf);
            }

            $sysReadTime = $wordsToRead / $generalConf['wordsPerMinute']*60;

            $this->connection->update(
                'tx_engage_domain_model_engage',
                [
                    'words_to_read' => (int)$wordsToRead,
                    'sys_read_time' => (int)$sysReadTime
                ],
                [
                    'record_type' => (string)$table,
                    'record_uid' => (int)$id
                ]
            );
        }
    }





    public function processCmdmap_deleteAction($table, $id, $recordToDelete, $recordWasDeleted=NULL, \TYPO3\CMS\Core\DataHandling\DataHandler &$pObj) {
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump("processCmdmap_deleteAction", "My function");
        GeneralUtility::makeInstance(ConnectionPool::class)
            ->getConnectionForTable('tx_engage_domain_model_engage')
            ->insert(
                'tx_engage_domain_model_engage',
                [
                    'total_views' => 1111,
                    'full_views' => 555555,
                    'avg_read_time' => 999
                ]
            );
    }


    private function removeHtmlFromText($text, $conf) {

        if($conf['includeTableElements']) {

        } else {

        }

        $textAddedSpace = str_replace ("</td>", " </td>" ,$text);
        $textStrippedEncodedSpace = str_replace ("&nbsp;", "" ,$textAddedSpace);
        $strippedText = strip_tags($textStrippedEncodedSpace);

        return str_word_count($strippedText);
    }


}
