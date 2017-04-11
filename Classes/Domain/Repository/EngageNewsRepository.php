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

use Bwd2\Engage\Domain\Model\EngageNews as EngageModel;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * News repository with all the callable functionality
 *
 */
class EngageNewsRepository extends \Bwd2\Engage\Domain\Repository\EngageRepository
{

    public function getTablename() {

        return EngageModel::$table;
    }

}