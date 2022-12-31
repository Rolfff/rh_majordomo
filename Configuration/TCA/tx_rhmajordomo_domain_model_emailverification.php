<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:rh_majordomo/Resources/Private/Language/locallang_db.xlf:tx_rhmajordomo_domain_model_emailverification',
        'label' => 'email_hash',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'versioningWS' => false,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'enablecolumns' => [],
        'searchFields' => 'emaillist_id,register',
        'iconfile' => 'EXT:rh_majordomo/Resources/Public/Icons/tx_rhmajordomo_domain_model_emailverification.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'emaillist_id, email_hash, secret, register',
    ],
    'types' => [
        '1' => ['showitem' => 'emaillist_id, email_hash, secret, register, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access'],
    ],
    'columns' => [
        
        'tstamp' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.tstamp',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'emaillist_id' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rh_majordomo/Resources/Private/Language/locallang_db.xlf:tx_rhmajordomo_domain_model_emailverification.emaillist_id',
            'config' => [
                'type' => 'input',
                'size' => 3,
                'eval' => 'trim,nospace,required,integer'
            ],
        ],
        'email_hash' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rh_majordomo/Resources/Private/Language/locallang_db.xlf:tx_rhmajordomo_domain_model_emailverification.email_hash',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'secret' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rh_majordomo/Resources/Private/Language/locallang_db.xlf:tx_rhmajordomo_domain_model_emailverification.secret',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,nospace,required'
            ]
        ],
        'register' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rh_majordomo/Resources/Private/Language/locallang_db.xlf:tx_rhmajordomo_domain_model_emailverification.register',
            'config' => [
                'type' => 'input',
                'size' => 1,
                'eval' => 'trim,nospace,integer'
            ]
        ],
        
    
    ],
];
