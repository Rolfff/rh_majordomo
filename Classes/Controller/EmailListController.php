<?php
namespace Rh\RhMajordomo\Controller;

use TYPO3\CMS\Extbase\Annotation\Inject;
use Symfony\Component\Mime\Address;
use TYPO3\CMS\Core\Mail\MailMessage;
use TYPO3\CMS\Core\Utility\GeneralUtility;

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
 * EmailListController
 */
class EmailListController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * emailListRepository
     * 
     * @var \Rh\RhMajordomo\Domain\Repository\EmailListRepository
     * @inject
     */
    protected $emailListRepository = null;
    
    /**
     * Inject a maillist repository to enable DI
     *
     * @param \Rh\RhMajordomo\Domain\Repository\EmailListRepository $emailListRepository
     */
    public function injectNewsRepository(\Rh\RhMajordomo\Domain\Repository\EmailListRepository $emailListRepository)
    {
        $this->emailListRepository = $emailListRepository;
    }
    
    public function initializeAction()
    {
        //Setting RespectStoragePage 
        $querySettings = $this->emailListRepository->createQuery()->getQuerySettings();
        //$querySettings->setStoragePageIds(array($GLOBALS["TSFE"]->id));
        $querySettings->setRespectStoragePage(false);
        $this->emailListRepository->setDefaultQuerySettings($querySettings);
    }
    
    
    

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $emailLists = $this->emailListRepository->findByUids(
                $this->settings['multibleRecords']
                );
        $user = $GLOBALS['TSFE']->fe_user->user;
        $this->view->assign('emailLists', $emailLists);
        $this->view->assign('feuser', $user);
    }
    
    
    
    /**
     * action post
     * 
     * @param array $command
     * @param array $commandmail
     * @param array $emailListID
     * @return void
     */
    public function postAction($command = null, $commandmail = null, $emailListID = null)
    {
        $user = $GLOBALS['TSFE']->fe_user->user;
        $sendWelcomeMessage = (bool) ($this->settings['sendWelcomeMessage'] ?? false);
        $onlyFeusersEmail = (bool) ($this->settings['onlyFeusersEmail'] ?? false);
        $sendAckMessageToModerator = (bool) ($this->settings['sendAckMessageToModerator'] ?? false);
        
        if($onlyFeusersEmail){
            $commandmail[0] = $user['email'];
        } 
        //Get chosen Mail-List
        $emailList = $this->emailListRepository->findByUid($emailListID[0]);
        
        
        if ($command[0] == null || $commandmail == null || $emailListID[0] == null){
           $this->addFlashMessage($this->translate('tx_rhmajordomo_domain_model_emaillist.message.failedData'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        } else if ($emailList == null){
            $this->addFlashMessage($this->translate('tx_rhmajordomo_domain_model_emaillist.message.noListFound'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        } else {
            
            $variables = array('emailList' => $emailList, 'user' => $user);
            
            $mail = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Mail\MailMessage::class);
           
            
            $mail->setFrom('no-reply@'.explode("@",$_SERVER['SERVER_ADMIN'])[1]);
            
            
            if(trim($emailList->getEmailModerator()) != ""){
                $mail->setReturnPath($emailList->getEmailModerator());
            } else {
                //Set return Mail adress to no-replay@your-domain.com 
                $mail->setReturnPath('no-reply@'.explode("@",$_SERVER['SERVER_ADMIN'])[1]);
            }
            
            
            
            $mail->setTo($emailList->getMajordomoMailBox());
            
            switch ($command[0])
            {
                case 'subscribe':
                $mail->setSubject("subscribe ".$emailList->getDigestName());
                $mail->setBody()->text("approve ".$emailList->getApprovePasswd()." subscribe ".$emailList->getDigestName()." ".$commandmail[0]);
                
                break;
                case 'unsubscribe':
                $mail->setSubject("unsubscribe from ".$emailList->getDigestName());
                $mail->setBody()->text("approve ".$emailList->getApprovePasswd()." unsubscribe ".$emailList->getDigestName()." ".$commandmail[0]);
                
                break;
                case 'who':
                $mail->setSubject("member from ".$emailList->getDigestName());
                $mail->setBody()->text("approve ".$emailList->getApprovePasswd()." who ".$emailList->getDigestName());
                break;
                case 'liste':
                $mail->setSubject("list ");
                $mail->setBody()->text("config ".$emailList->getDigestName()." ".$emailList->getApprovePasswd());
                    
                break;
                case 'newconf':
                $mail->setSubject("newconfig ");
                $mail->setBody()->text("newconfig ".$emailList->getDigestName()." ".$emailList->getApprovePasswd()." \n \n $config");
                break;
            } //switch
            //$mail->setBody('Here is the message itself');
            //$mail->addPart('<b>Here is the message itself</b>', 'text/html');
            //$mail->attach(\Swift_Attachment::fromPath('my-document.pdf'));
           
            
            /**
             * TODO:
             * There  is a Bug in the from Typo3 used swiftmailer Lib.
             * https://github.com/swiftmailer/swiftmailer/issues/1218
             * So the plaintext messages breake up and Majordomo can't read the instructions.
             * Or am I too stupid?
             * Alternativ the php mail()-function is here used.
             */
            
            #\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump('tesz');

            $header = 'From: '.$mail->getFrom()[0]->getAddress().'' . "\r\n".'Reply-To: '.$mail->getReturnPath()->getAddress().'' . "\r\n" ;
            if (mail($emailList->getMajordomoMailBox(), $mail->getSubject(), $mail->getBody()->getBody(), $header)){
            //$mail->send();
            //if ($mail->isSent()){
                
                
                //TODO: Emailvalifikation durchführen!!!!!
                
                
                switch ($command[0])
                {
                    case 'subscribe':
                        if($sendWelcomeMessage){
                            $this->sendTemplateEmail(
                                    $commandmail[0], 
                                    $mail->getFrom()[0]->getAddress(), 
                                    $this->translate('tx_rhmajordomo_domain_model_emaillist.mail.subject.welcome',array($emailList->getListName())), 
                                    $this->translate('tx_rhmajordomo_domain_model_emaillist.email.content.subscribe', array($emailList->getListName(),$emailList->getListEmailAddress(), $emailList->getEmailModerator())), 
                                    $variables);
                        }
                        if($sendAckMessageToModerator && trim($emailList->getEmailModerator()) != ""){
                            $this->sendTemplateEmail(
                                    $emailList->getEmailModerator(), 
                                    'no-reply@'.explode("@",$_SERVER['SERVER_ADMIN'])[1], 
                                    $this->translate('tx_rhmajordomo_domain_model_emaillist.mail.subject.admin',array($emailList->getListName())), 
                                    $this->translate('tx_rhmajordomo_domain_model_emaillist.message.sendsuccessful.moderator.welcome', array($commandmail[0], $emailList->getListName(),$emailList->getListEmailAddress(), $emailList->getEmailModerator())), 
                                    $variables);
                        }
                        $this->addFlashMessage(
                                $this->translate('tx_rhmajordomo_domain_model_emaillist.message.sendsuccessful.welcome', 
                                    array($emailList->getListName())
                                    ), 
                                '', 
                                \TYPO3\CMS\Core\Messaging\AbstractMessage::OK
                                );
                    break;
                    case 'unsubscribe':
                        if($sendWelcomeMessage){
                            $this->sendTemplateEmail(
                                    $commandmail[0], 
                                    $mail->getFrom()[0]->getAddress(), 
                                    $this->translate('tx_rhmajordomo_domain_model_emaillist.mail.subject.bye', array($emailList->getListName())), 
                                    $this->translate('tx_rhmajordomo_domain_model_emaillist.email.content.unsubscribe', array($emailList->getListName())), 
                                    $variables
                                    );
                        }
                        if($sendAckMessageToModerator && trim($emailList->getEmailModerator()) != ""){
                            $this->sendTemplateEmail(
                                    $emailList->getEmailModerator(), 
                                    'no-reply@'.explode("@",$_SERVER['SERVER_ADMIN'])[1], 
                                    $this->translate('tx_rhmajordomo_domain_model_emaillist.mail.subject.admin', array($emailList->getListName())), 
                                    $this->translate('tx_rhmajordomo_domain_model_emaillist.message.sendsuccessful.moderator.bye', array($commandmail[0], $emailList->getListName())), 
                                    $variables
                                    );
                        }
                        $this->addFlashMessage(
                                $this->translate('tx_rhmajordomo_domain_model_emaillist.message.sendsuccessful.bye', 
                                        array($emailList->getListName())), 
                                '', 
                                \TYPO3\CMS\Core\Messaging\AbstractMessage::OK
                                );
                    break;
                    default:
                        $this->addFlashMessage(
                                $this->translate('tx_rhmajordomo_domain_model_emaillist.message.sendsuccessful.default', 
                                array($emailList->getListName())), 
                                '', 
                                \TYPO3\CMS\Core\Messaging\AbstractMessage::INFO
                                );
                    break;
                } //switch
                
            } else {
                $this->addFlashMessage($this->translate('tx_rhmajordomo_domain_model_emaillist.message.sendfailed', array($emailList->getListName())), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
            }
            
            //$this->addFlashMessage($this->translate('tx_rhmajordomo_domain_model_emaillist.message.test'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        }
        $this->redirect('list');
                
        
    }
    /**
     * Quelle: http://t3-developer.com/ext-programmierung/techniken-in-extensions/mail-versand-mit-fluid-templates/
     * @param type $key
     * @param type $arguments
     * @return type
     */
    private function translate($key, $arguments=NULL){
        return \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate($key,'rh_majordomo', $arguments);
    }
    
    /**
     * @param array $recipient recipient of the email in the format array('recipient@domain.tld' => 'Recipient Name')
     * @param array $sender sender of the email in the format array('sender@domain.tld' => 'Sender Name')
     * @param string $subject subject of the email
     * @param string $templateName template name (UpperCamelCase)
     * @param array $variables variables to be passed to the Fluid view
     * @return boolean TRUE on success, otherwise false
     */
    protected function sendTemplateEmail(string $recipient, string $sender, $subject, $templateName, array $variables = array())
    {
        #TODO entfernen
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($templateName); 
        
        $message = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">'
                    .'<meta name="format-detection" content="telephone=no"></head>'
                    .'<body>'.$this->translate('tx_rhmajordomo_domain_model_emaillist.email.gredings',array('','')).'<br />'
                    .'<br />'.$templateName.'<br />'
                    .'<br />'.$this->translate('tx_rhmajordomo_domain_model_emaillist.email.ending').'</body></html>';
        
        $mail = GeneralUtility::makeInstance(MailMessage::class);
        $mail->from(new \Symfony\Component\Mime\Address($sender, $sender));
        $mail->to(new Address($recipient));
        $mail->subject($subject);
        //$mail->text('Here is the message itself');
        $mail->html($message);
        //$mail->attachFromPath('/path/to/my-document.pdf');
        return $mail->send();

    }
    
   
}
