<?php
namespace Rh\RhMajordomo\Domain\Repository;



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
 * The repository for EmailVerification
 */
class EmailVerificationRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{   
   /**
    * Find by multiple uids using, seperated string. 
    * 
    * @param string String containing uids
    * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
    */
   public function findByUids($uids) {
       $uidArray = explode(",", $uids);
       $query = $this->createQuery();
       foreach ($uidArray as $key => $value) {
           $constraints[] =  $query->equals('uid', $value);
       }
       $query->matching(
           $query->logicalAnd(
               $query->logicalOr(
                   $constraints
               )
           )
       );
      $query->setOrderings(
                [
                    'list_name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
                ]
            );
      
    return $query->execute()->toArray();
   }
   

   /**
    * Find one EmailVerification by secret. 
    * 
    * @param string $secret
    * @return Null|\Rh\RhMajordomo\Domain\Model\EmailVerification
    */
   public function getWithSecret(string $secret = Null){
       $ret = Null;
       $query = $this->createQuery();
       $query->matching($query->logicalAnd($query->equals('secret', $secret)));
       $result = $query->execute()->toArray();
       if (count($result) == 1){
           $ret = $result[0];
       }
       return $ret;
   }
 
   
   /**
    * Returns all objects of this repository.
    *
    * @return QueryResultInterface|array
    * @api
    */
   public function findAll()
   {
       return $this->createQuery()->execute();
   }
   
   /**
    * Finds an object matching the given unique id.
    *
    * @param int $uid The unique id of the object to find
    * @return object The matching object if found, otherwise NULL
    * @api
    */
   public function findByUid($uid)
   {
       return $this->findByIdentifier($uid);
   }
   
   /**
    * Delete all older Entrys.
    *
    * @param datetime $timestamp The daterime after links are not valide
    * @return void
    * @api
    */
   public function deleteOlderThan($timestamp)
   {
       $query = $this->createQuery();
       $query->matching($query->logicalAnd($query->lessThan('tstamp', $timestamp)));
       $toBeDeleted = $query->execute()->toArray();
       
       foreach ($toBeDeleted as $value) {
           $this->remove($value);
       }
       
   }
   
}
