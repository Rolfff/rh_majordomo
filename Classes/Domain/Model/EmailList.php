<?php
namespace Rh\RhMajordomo\Domain\Model;


/***
 *
 * This file is part of the "Majordomo Plugin" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 Rolf Huesmann
 *
 ***/
/**
 * Model of a Email-List
 */
class EmailList extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * digestName
     * 
     * @var string
     */
    protected $digestName = '';

    /**
     * listName
     * 
     * @var string
     */
    protected $listName = '';

    /**
     * listEmailAddress
     * 
     * @var string
     */
    protected $listEmailAddress = '';

    /**
     * emailModerator
     * 
     * @var string
     */
    protected $emailModerator = '';

    /**
     * approvePasswd
     * 
     * @var string
     */
    protected $approvePasswd = '';

    /**
     * majordomoMailBox
     * 
     * @var string
     */
    protected $majordomoMailBox = '';

    /**
     * Returns the digestName
     * 
     * @return string $digestName
     */
    public function getDigestName()
    {
        return $this->digestName;
    }

    /**
     * Sets the digestName
     * 
     * @param string $digestName
     * @return void
     */
    public function setDigestName($digestName)
    {
        $this->digestName = $digestName;
    }

    /**
     * Returns the listName
     * 
     * @return string $listName
     */
    public function getListName()
    {
        return $this->listName;
    }

    /**
     * Sets the listName
     * 
     * @param string $listName
     * @return void
     */
    public function setListName($listName)
    {
        $this->listName = $listName;
    }

    /**
     * Returns the emailModerator
     * 
     * @return string $emailModerator
     */
    public function getEmailModerator()
    {
        return $this->emailModerator;
    }

    /**
     * Sets the emailModerator
     * 
     * @param string $emailModerator
     * @return void
     */
    public function setEmailModerator($emailModerator)
    {
        $this->emailModerator = $emailModerator;
    }

    /**
     * Returns the approvePasswd
     * 
     * @return string $approvePasswd
     */
    public function getApprovePasswd()
    {
        return $this->approvePasswd;
    }

    /**
     * Sets the approvePasswd
     * 
     * @param string $approvePasswd
     * @return void
     */
    public function setApprovePasswd($approvePasswd)
    {
        $this->approvePasswd = $approvePasswd;
    }

    /**
     * Returns the majordomoMailBox
     * 
     * @return string $majordomoMailBox
     */
    public function getMajordomoMailBox()
    {
        return $this->majordomoMailBox;
    }

    /**
     * Sets the majordomoMailBox
     * 
     * @param string $majordomoMailBox
     * @return void
     */
    public function setMajordomoMailBox($majordomoMailBox)
    {
        $this->majordomoMailBox = $majordomoMailBox;
    }

    /**
     * Returns the listEmailAddress
     * 
     * @return string listEmailAddress
     */
    public function getListEmailAddress()
    {
        return $this->listEmailAddress;
    }

    /**
     * Sets the listEmailAddress
     * 
     * @param string $listEmailAddress
     * @return void
     */
    public function setListEmailAddress($listEmailAddress)
    {
        $this->listEmailAddress = $listEmailAddress;
    }
}
