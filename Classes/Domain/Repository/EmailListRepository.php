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
 * The repository for EmailLists
 */
class EmailListRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
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
               ),
               $query->equals('hidden', 0),
               $query->equals('deleted', 0)
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
   
}
