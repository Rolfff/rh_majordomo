<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Rh.RhMajordomo',
            'Feplugin',
            'Majordomo FrontendPlugin'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('rh_majordomo', 'Configuration/TypoScript', 'Majordomo Plugin');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rhmajordomo_domain_model_emaillist', 'EXT:rh_majordomo/Resources/Private/Language/locallang_csh_tx_rhmajordomo_domain_model_emaillist.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rhmajordomo_domain_model_emaillist');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rhmajordomo_domain_model_emaillist', 'EXT:rh_majordomo/Resources/Private/Language/tx_rhmajordomo_domain_model_emailverification.xlf');
    }
);
