<?php
namespace Bwd2\Engage\ViewHelpers;

    /*                                                                        *
     * This script belongs to the FLOW3 package "Fluid".                      *
     *                                                                        *
     * It is free software; you can redistribute it and/or modify it under    *
     * the terms of the GNU Lesser General Public License as published by the *
     * Free Software Foundation, either version 3 of the License, or (at your *
     * option) any later version.                                             *
     *                                                                        *
     * This script is distributed in the hope that it will be useful, but     *
     * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
     * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
     * General Public License for more details.                               *
     *                                                                        *
     * You should have received a copy of the GNU Lesser General Public       *
     * License along with the script.                                         *
     * If not, see http://www.gnu.org/licenses/lgpl.html                      *
     *                                                                        *
     * The TYPO3 project - inspiring people to share!                         *
     *                                                                        */

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper;
use TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;




class NewsDetailViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper
{

    /**
     * Renders the image from page properties
     *
     * @param integer $newsUid
     * @return string $content
     * @author bwd2 (Bernhard Wendt)
     *
     */


    public function render($newsUid) {


        //@todo: get Values for News UID
        //@todo: assign to array "engage" further use "{engage.totalViews}" and "{engage.fullViews}", ....


        GeneralUtility::makeInstance(ConnectionPool::class)
            ->getConnectionForTable('tx_engage')
            ->insert(
                'tx_engage',
                [
                    'total_views' => 20,
                    'full_views' => 11,
                    'avg_read_time' => 120
                ]
            );

        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump('from engage', "My results");

        $this->templateVariableContainer->add('firstVar','newsUid: '.$newsUid);
        $this->templateVariableContainer->add('secondVar','secondVar VALUE');


        //@todo: assign Values for further Templating


        return $this->renderChildren();

    }
}

?>