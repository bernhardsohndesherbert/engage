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
use TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper;
use TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;




class NewsViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{

    /**
     * configurationManager
     *
     * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManager
     */
    protected $configurationManager;

    /**
     * connectionPool
     *
     * @var \TYPO3\CMS\Core\Database\ConnectionPool
     */
    public $connection;

    /**
     * engageRepository
     *
     * @var \Bwd2\Engage\Domain\Repository\EngageRepository
     */
    protected $engageRepository;

    /**
     * @var array
     */
    public $settings;


    /**
     * @var sring
     */
    static protected $recordTable = "tx_news_domain_model_news";


    public function __construct() {

        $this->configurationManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManager');
        $this->connection = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable('tx_engage_domain_model_engage');
        $objectManager =  \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
        $this->engageRepository = $objectManager->get('Bwd2\\Engage\\Domain\\Repository\\EngageRepository');
        $this->settings = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);
    }

    /**
     * Renders the image from page properties
     *
     * @param integer $newsUid
     * @param integer $newsType
     * @return string $content
     * @author bwd2 (Bernhard Wendt)
     *
     */

    public function render($newsUid, $newsType) {

        $engage = $this->engageRepository->findByIdentifiedUid($newsUid, self::$recordTable);


        if(!strcmp($newsType,'detail')) {
            $engage->setTotalViews($engage->getTotalViews()+1);
        }

        $this->templateVariableContainer->add('en_leavePageUrl',$this->createUrl("leavePage"));
        $this->templateVariableContainer->add('en_userEngageUrl',$this->createUrl("userEngage"));

        $this->engageRepository->update($engage);

        return $this->renderChildren();

    }

    /**
     * Creates URL for Ajax Call
     *
     * @param string action
     * @return string
     * @author bwd2 (Bernhard Wendt)
     *
     */
    private function createUrl($action) {
        $uriBuilder = $this->controllerContext->getUriBuilder();
        return $uriBuilder->reset()
            ->setTargetPageType($this->settings['engage.']['typeNum'])
            ->uriFor(
                $actionName=$action,
                $controllerArguments=array("record_type"=>self::$recordTable),
                $controllerName="EngageAjax",
                $extensionName="Engage",
                $pluginName="FrontendFunctions");

    }
}

?>