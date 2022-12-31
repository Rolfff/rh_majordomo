<?php
namespace Rh\RhMajordomo\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/***
 *
 * This file is part of the "Majordomo Plugin" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2022 Rolf Huesmann
 *
 ***/
/**
 * Model of a Email-Verification
 */
class EmailVerification extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * $emaillistId
     * 
     * @var \Rh\RhMajordomo\Domain\Model\EmailList
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $emaillistId = '';

    /**
     * emailHash
     * 
     * @var string
     */
    protected $emailHash = '';

    /**
     * secret
     * 
     * @var string
     */
    protected $secret = '';

    /**
     * register
     * 
     * @var bool
     */
    protected $register = '';
    
    
    /**
     * Initialize email verification
     * 
     * @param integer $emaillistId
     * @param string $email
     * @param bool $register
     *
     * @return \Rh\RhMajordomo\Domain\Model\EmailVerification
     */
    public function __construct($emaillistId, $email, $register)
    {
        $this->emaillistId = $emaillistId;
        $this->emailHash = $this->genHashValue($email);
        $this->secret = $this->genHashValue(rand());
        $this->register = $register;
    }
    
    /**
     * Hash function
     * 
     * @param string $string
     * @return string
     */
    private function genHashValue($string) {
        /* See -> https://www.php.net/manual/de/function.hash-algos.php */
        return hash("sha256",$string);
    }


    /**
     * Returns the emaillistId
     * 
     * @return integer $emaillistId
     */
    public function getEmaillistId()
    {
        return $this->emaillistId;
    }

    /**
     * Sets the emaillistId
     * 
     * @param integer $emaillistId
     * @return void
     */
    public function setEmaillistId($emaillistId)
    {
        $this->emaillistId = $emaillistId;
    }

    /**
     * Returns the emailHash
     * 
     * @return string $emailHash
     */
    public function getEmailHash()
    {
        return $this->emailHash;
    }

    /**
     * Sets the emailHash
     * 
     * @param string $emailHash
     * @return void
     */
    public function setEmailHash($emailHash)
    {
        $this->emailHash = $emailHash;
    }
    
    /**
     * Valid the emailHash
     * 
     * @param string $email
     * @return bool
     */
    public function isEmailValid($email)
    {   
        $ret = False;
        if ($this->emailHash == $this->genHashValue($email)){
            $ret = True;
        }
        return $ret;
    }

    /**
     * Returns the secret
     * 
     * @return string $secret
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * Sets the secret
     * 
     * @param string $secret
     * @return void
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
    }
    
    /**
     * Valid the secret
     * 
     * @param string $secret
     * @return bool
     */
    public function isSecretValid($secret)
    {   
        $ret = False;
        if ($this->secret == $secret){
            $ret = True;
        }
        return $ret;
    }

    /**
     * Returns the register
     * 
     * @return bolean $register
     */
    public function getRegister()
    {
        return $this->register;
    }

    /**
     * Sets the register
     * 
     * @param string $register
     * @return void
     */
    public function setRegister($register)
    {
        $this->register = $register;
    }

    
}
