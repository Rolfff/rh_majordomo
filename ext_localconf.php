<?php
defined('TYPO3_MODE') || die('Access denied.');



\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
   'RhMajordomo',
   'Feplugin',
   [\RH\RhMajordomo\Controller\EmailListController::class => 'list,post,validate'],
   // non-cacheable actions
   [\RH\RhMajordomo\Controller\EmailListController::class => 'list,post,validate'],
   \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
    @import \'EXT:rh_majordomo/Configuration/TSconfig/ContentElementWizard.tsconfig\'
    ');
