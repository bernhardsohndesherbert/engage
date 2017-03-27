<?php
namespace Bwd2\Engage\Controller;

use TYPO3\CMS\Core\Utility\DebugUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\MathUtility;

/**

/**
 * EngageController
 */
class EngageController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {


    var $languageID = '';
    var $localContacts = array();
    var $usedCountries = array();

    /**
     * action list
     *
     * @param string $country
     * @param string $language
     * @return void
     */
    public function listAction($country = '') {

        $this->languageID = $GLOBALS['TSFE']->sys_language_uid;

        $table='tt_content';
        $where = 'pid=464 AND CType="mask_localcontact" AND deleted=0 AND hidden=0';

        $res=$GLOBALS['TYPO3_DB']->exec_SELECTquery(
            '*', #select
            $table, #from
            $where,  #where
            $groupBy='',
            $orderBy='',
            $limit='');

        $cObj = $this->configurationManager->getContentObject();

        while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {

            $ttContentConfig = array(
                'wrap' => '<div class="ecx-localcontact-item" data-countries="' . $row['tx_mask_country'] . '">|</div>',
                'tables' => 'tt_content',
                'source' => $row['uid'],
                'dontCheckPid' => 1
            );

            $this->localContacts[] = $cObj->RECORDS($ttContentConfig);
            $countryArray = explode(',',$row['tx_mask_country']);

            foreach($countryArray as $key => $value) {

                if($value != "" && !in_array($value, $this->usedCountries)) {
                    array_push($this->usedCountries, $value);
                }
            }
        }

        $this->view->assign('countryList', $this->getStaticCounties());
        $this->view->assign('localContacts', $this->localContacts);
    }


    private function getStaticCounties() {


        $table='static_countries';

        $languageColumn = 'cn_short_en';

        if($this->languageID) {
            $languageColumn = 'cn_short_de';
        }

        $where = 'uid IN(' . implode(',',$this->usedCountries) . ')';

        $res=$GLOBALS['TYPO3_DB']->exec_SELECTquery(
            $languageColumn.', uid, cn_iso_3', #select
            $table, #from
            $where,  #where
            $groupBy='',
            $languageColumn,
            $limit='');

        $result = array();
        while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {

            $result[] = array('uid' => $row['uid'],
                'name' =>$row[$languageColumn]);
        }

        return $result;
    }
}
