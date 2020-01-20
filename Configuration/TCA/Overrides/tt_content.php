<?php 
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


