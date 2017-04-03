<?php
namespace Bwd2\Engage\Domain\Model;

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

/**
 * News model
 *
 */


class Engage extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {


    /**
     * @var int
     */
    protected $totalViews;

    /**
     * @var int
     */
    protected $fullViews;

    /**
     * @var int
     */
    protected $wordsToRead;

    /**
     * @var int
     */
    protected $avgReadTime;

    /**
     * @var int
     */
    protected $avgReadLength;

    /**
     * @var string
     */
    protected $recordType;

    /**
     * @var int
     */
    protected $recordUid;



    /**
     * Get totalViews
     *
     * @return int
     */
    public function getTotalViews() {
        return $this->totalViews;
    }


    /**
     * Set totalViews
     *
     * @param int $totalViews
     * @return void
     */
    public function setTotalViews($totalViews) {
        $this->totalViews = $totalViews;
    }


    /**
     * Get fullViews
     *
     * @return int
     */
    public function getFullViews() {
        return $this->fullViews;
    }


    /**
     * Set fullViews
     *
     * @param int $fullViews
     * @return void
     */
    public function setFullViews($fullViews) {
        $this->fullViews = $fullViews;
    }


    /**
     * Get wordsToRead
     *
     * @return int
     */
    public function getWordsToRead() {
        return $this->wordsToRead;
    }


    /**
     * Set wordsToRead
     *
     * @param int $wordsToRead
     * @return void
     */
    public function setWordsToRead($wordsToRead) {
        $this->fullViews = $wordsToRead;
    }


    /**
     * Get avgReadTime
     *
     * @return int
     */
    public function getAvgReadTime() {
        return $this->avgReadTime;
    }


    /**
     * Set avgReadTime
     *
     * @param int $avgReadTime
     * @return void
     */
    public function setAvgReadTime($avgReadTime) {
        $this->avgReadTime = $avgReadTime;
    }


    /**
     * Get avgReadLength
     *
     * @return int
     */
    public function getAvgReadLength() {
        return $this->avgReadLength
    }


    /**
     * Set avgReadLength
     *
     * @param int $avgReadLength
     * @return void
     */
    public function setAvgReadLength($avgReadLength) {
        $this->avgReadLength = $avgReadLength;
    }


    /**
     * Get recordType
     *
     * @return string
     */
    public function getRecordType() {
        return $this->recordType;
    }


    /**
     * Set recordType
     *
     * @param string $recordType recordType
     * @return void
     */
    public function setRecordType($recordType) {
        $this->recordType = $recordType;
    }


    /**
     * Get recordUid
     *
     * @return int
     */
    public function getRecordUid() {
        return $this->recordUid;
    }


    /**
     * Set recordUid
     *
     * @param int $recordUid
     * @return void
     */
    public function setRecordUid($recordUid) {
        $this->recordUid = $recordUid;
    }

}
