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

use TYPO3\CMS\Backend\Utility\BackendUtility as BackendUtilityCore;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Cache\CacheManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;


class DataHandler
{


    /**
     * Prevent deleting/moving of a news record if the editor doesn't have access to all categories of the news record
     *
     * @param string $command
     * @param string $table
     * @param int $id
     * @param string $value
     * @param $parentObject \TYPO3\CMS\Core\DataHandling\DataHandler
     */
    public function processDatamap_postProcessFieldArray($status, $table, $id, array &$fieldArray, \TYPO3\CMS\Core\DataHandling\DataHandler &$pObj)
    {


        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump("processDatamap_postProcessFieldArray", "My function");

        switch($status) {
            case 'new':

                break;

            case 'update':

                break;
        }



        GeneralUtility::makeInstance(ConnectionPool::class)
            ->getConnectionForTable('tx_engage')
            ->insert(
                'tx_engage',
                [
                    'total_views' => 222,
                    'full_views' => 3333,
                    'avg_read_time' => 444444
                ]
            );

        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($table, "My table");

    //    \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(is_integer($id), "My id");
     //   \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($status, "My status");
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($fieldArray, "My fieldArray");
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($pObj, "My pObj");


        if ($table === 'tx_news_domain_model_news' && is_integer($id) && $command !== 'undelete') {


            //    \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump("in if condition", "My condition");


            /*    $newsRecord = BackendUtilityCore::getRecord($table, $id);
                if (!AccessControlService::userHasCategoryPermissionsForRecord($newsRecord)) {
                    $parentObject->log($table, $id, 2, 0, 1,
                        'processCmdmap: Attempt to ' . $command . " a record from table '%s' without permission. Reason: the record has one or more categories assigned that are not defined in the BE usergroup.",
                        1, [$table]);
                    // unset table to prevent saving
                    $table = '';
                }*/
        }
    }



    public function processCmdmap_deleteAction($table, $id, $recordToDelete, $recordWasDeleted=NULL, \TYPO3\CMS\Core\DataHandling\DataHandler &$pObj) {
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump("processCmdmap_deleteAction", "My function");
        GeneralUtility::makeInstance(ConnectionPool::class)
            ->getConnectionForTable('tx_engage')
            ->insert(
                'tx_engage',
                [
                    'total_views' => 1111,
                    'full_views' => 555555,
                    'avg_read_time' => 999
                ]
            );
    }




    public function processDatamap_preProcessFieldArray(array &$fieldArray, $table, $id, \TYPO3\CMS\Core\DataHandling\DataHandler &$pObj) {

        $engage = GeneralUtility::makeInstance(\Bwd2\Engage::class);
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($engage, "My settings");



        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->removeHtmlFromText($fieldArray['teaser']), "My removeHtmlFromText");


    }


    public function removeHtmlFromText($text) {
        $textAddedSpace = str_replace ("</td>", " </td>" ,$text);
        $textStrippedEncodedSpace = str_replace ("&nbsp;", "" ,$textAddedSpace);
        $strippedText = strip_tags($textStrippedEncodedSpace);
        return str_word_count($strippedText);
    }

}
