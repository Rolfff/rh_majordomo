<?php 
/*
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['rhmajordomo_feplugin'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    // plugin signature: <extension key without underscores> '_' <plugin name in lowercase>
    'rhmajordomo_feplugin',
    // Flexform configuration schema file
    'FILE:EXT:rh_majordomo/Configuration/FlexForms/Feplugin.xml'
);
*/
declare(strict_types=1);


defined('TYPO3') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'rhmajordomo',
    'Feplugin',
    'LLL:EXT:rh_majordomo/Resources/Private/Language/locallang_db.xlf:tx_rh_majordomo_feplugin.name',
    'emailverifivationicon'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['rhmajordomo_feplugin'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'rhmajordomo_feplugin',
    'FILE:EXT:rh_majordomo/Configuration/FlexForms/Feplugin.xml'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToInsertRecords('tx_rhmajordomo_domain_model_emaillist');
