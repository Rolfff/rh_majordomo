<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Rh.RhMajordomo',
            'Feplugin',
            [
                'EmailList' => 'list, post, validate'
            ],
            // non-cacheable actions
            [
                'EmailList' => 'list, post, validate'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    feplugin {
                        iconIdentifier = rh_majordomo-plugin-feplugin
                        title = LLL:EXT:rh_majordomo/Resources/Private/Language/locallang_db.xlf:tx_rh_majordomo_feplugin.name
                        description = LLL:EXT:rh_majordomo/Resources/Private/Language/locallang_db.xlf:tx_rh_majordomo_feplugin.description
                        tt_content_defValues {
                            CType = list
                            list_type = rhmajordomo_feplugin
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'rh_majordomo-plugin-feplugin',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:rh_majordomo/Resources/Public/Icons/user_plugin_feplugin.svg']
			);
		
    }
);
