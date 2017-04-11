<?php

namespace Bwd2\Engage\Domain\Repository;

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


use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * News repository with all the callable functionality
 *
 */
class EngageRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {


    /**
     * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
     * @inject
     */
    protected $persistenceManager;


    protected $defaultOrderings = array(
        'record_uid' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    );


    public function initializeObject() {
        // Einstellungen laden
        $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');

        // Einstellungen als Default setzen
        $this->setDefaultQuerySettings($querySettings);
    }


    public function findByIdentifiedUid($recordUid, $recordType) {


        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        $query->getQuerySettings()->setRespectSysLanguage(false);
        $query->getQuerySettings()->setIgnoreEnableFields(true);

        $returnValue = $query->matching(
            $query->logicalAnd(
                $query->equals('record_uid', (int)$recordUid),
                $query->equals('record_type', (string)$recordType)
            ))->execute()->getFirst();


        return $returnValue;
    }

}