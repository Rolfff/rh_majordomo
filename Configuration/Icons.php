<?php
   return [
       // icon identifier
       'exticon' => [
            // icon provider class
           'provider' => \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            // the source SVG for the SvgIconProvider
           'source' => 'EXT:rh_majordomo/Resources/Public/Icons/user_plugin_feplugin.svg',
       ],
       'emaillisticon' => [
            // icon provider class
           'provider' => \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            // the source SVG for the SvgIconProvider
           'source' => 'EXT:rh_majordomo/Resources/Public/Icons/tx_rhmajordomo_domain_model_emaillist.svg',
       ],
       'emailverifivationicon' => [
            // icon provider class
           'provider' => \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            // the source SVG for the SvgIconProvider
           'source' => 'EXT:rh_majordomo/Resources/Public/Icons/tx_rhmajordomo_domain_model_emailverification.svg',
       ],
//       'mybitmapicon' => [
//           'provider' => \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
            // the source bitmap file
//           'source' => 'EXT:rh_majordomo/Resources/Public/Icons/mybitmap.png',
//       ],
//       'myfontawesomeicon' => [
//           'provider' => \TYPO3\CMS\Core\Imaging\IconProvider\FontawesomeIconProvider::class,
            // the fontawesome icon name
//           'name' => 'spinner',
            // all icon providers provide the possibility to register an icon that spins
//           'spinning' => true,
//       ],
   ];