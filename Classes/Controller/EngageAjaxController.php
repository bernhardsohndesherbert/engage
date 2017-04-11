<?php
namespace Bwd2\Engage\Controller;

use TYPO3\CMS\Core\Utility\DebugUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\MathUtility;

/**

/**
 * EngageAjaxController
 */
class EngageAjaxController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {


    /**
     * engageRepository
     *
     * @var \Bwd2\Engage\Domain\Repository\EngageRepository
     */
    protected $engageRepository;



    /**
     * Inject engageRepository
     *
     * @param \Bwd2\Engage\Domain\Repository\EngageRepository $engageRepository
     * @return void
     */
    public function injectNewsRepository(\Bwd2\Engage\Domain\Repository\EngageRepository $engageRepository)
    {
        $this->engageRepository = $engageRepository;
    }


    /**
     * action loadRecord
     *
     * @return string
     */
    public function loadRecordAction() {}


    /**
     * action leavePage
     *
     * @return string
     */
    public function leavePageAction() {


        // @todo: optimize validation condition
        if( is_string($this->request->getArgument('record_type')) &&
            is_string($this->request->getArgument('record_uid')) &&
            is_string($this->request->getArgument('read_length')) &&
            is_string($this->request->getArgument('read_time')) ) {

            $engage = $this->engageRepository->findByIdentifiedUid($this->request->getArgument('record_uid'),$this->request->getArgument('record_type'));


            $engage->setAvgReadLength(
                $this->calcNewAverage(
                    $engage->getAvgReadLength(),
                    $engage->getTotalViews(),
                    $this->request->getArgument('read_length')
                )
            );

            $engage->setAvgReadTime (
                $this->calcNewAverage(
                    $engage->getAvgReadTime(),
                    $engage->getTotalViews(),
                    $this->request->getArgument('read_time')
                )
            );

            if($this->request->getArgument('read_length') == 100) {
                $engage->setFullViews($engage->getFullViews()+1);
            }

            $this->engageRepository->update($engage);

        } else {

            header('HTTP/1.1 400 Bad Request');
            return json_encode(array('error'=> 'Bad request'));

        }


        return json_encode(array("newUrl" => $this->createUrl(' leavePage')));


    }


    private function calcNewAverage($average, $views, $newValue ) {
        return ceil(($average * ($views-1) + $newValue) / $views);

    }


    /**
     * action userEngage
     *
     * @return string
     */
    public function userEngageAction() {

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
                $controllerArguments=array("record_type"=>"tx_news_domain_model_news"),
                $controllerName="EngageAjax",
                $extensionName="Engage",
                $pluginName="FrontendFunctions");

    }


}
