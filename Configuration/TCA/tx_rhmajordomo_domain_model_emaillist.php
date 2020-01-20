<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:rh_majordomo/Resources/Private/Language/locallang_db.xlf:tx_rhmajordomo_domain_model_emaillist',
        'label' => 'digest_name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'digest_name,list_name,list_email_address,email_moderator,approve_passwd,majordomo_mail_box',
        'iconfile' => 'EXT:rh_majordomo/Resources/Public/Icons/tx_rhmajordomo_domain_model_emaillist.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, digest_name, list_name, list_email_address, email_moderator, approve_passwd, majordomo_mail_box',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, digest_name, list_name, list_email_address, email_moderator, approve_passwd, majordomo_mail_box, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_rhmajordomo_domain_model_emaillist',
                'foreign_table_where' => 'AND {#tx_rhmajordomo_domain_model_emaillist}.{#pid}=###CURRENT_PID### AND {#tx_rhmajordomo_domain_model_emaillist}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
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

        'digest_name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rh_majordomo/Resources/Private/Language/locallang_db.xlf:tx_rhmajordomo_domain_model_emaillist.digest_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,nospace,required'
            ],
        ],
        'list_name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rh_majordomo/Resources/Private/Language/locallang_db.xlf:tx_rhmajordomo_domain_model_emaillist.list_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'list_email_address' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rh_majordomo/Resources/Private/Language/locallang_db.xlf:tx_rhmajordomo_domain_model_emaillist.list_email_address',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'nospace,email'
            ]
        ],
        'email_moderator' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rh_majordomo/Resources/Private/Language/locallang_db.xlf:tx_rhmajordomo_domain_model_emaillist.email_moderator',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'nospace,email'
            ]
        ],
        'approve_passwd' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rh_majordomo/Resources/Private/Language/locallang_db.xlf:tx_rhmajordomo_domain_model_emaillist.approve_passwd',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'majordomo_mail_box' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rh_majordomo/Resources/Private/Language/locallang_db.xlf:tx_rhmajordomo_domain_model_emaillist.majordomo_mail_box',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'nospace,email,required'
            ]
        ],
    
    ],
];
