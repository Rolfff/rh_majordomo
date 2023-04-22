<?php
defined('TYPO3_MODE') || die('Access denied.');

use Rh\RhMajordomo\Controller\EmailListController;

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
   'RhMajordomo',
   'Feplugin',
   [EmailListController::class => 'list,post,validate'],
   // non-cacheable actions
   [EmailListController::class => 'list,post,validate'],
   \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_PLUGIN
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
    @import \'EXT:rh_majordomo/Configuration/TSconfig/ContentElementWizard.tsconfig\'
    ');
