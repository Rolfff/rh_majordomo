# rh_majordomo
A Typo3 plugin that allows a FE user to add himself to a [Majordomo email list](https://en.wikipedia.org/wiki/Majordomo_(software)).
After validating the email address or logging in as a FE user, the plugin sends commands to your Majordomo daemon to subscribe or unsubscribe.

https://extensions.typo3.org/extension/rh_majordomo

## Install
After install via [TER](https://extensions.typo3.org/extension/rh_majordomo) or Composer you have to add a 'Email List' on any page of your Typo3 system. 
Then you should create the Frontend-Plugin and choose one 'Email List'. That is it.

### Layout
- Copy the templateRootPath files to use your own layout and style.
- Override the templateRootPath in your template constants..
`plugin.tx_rhmajordomo_feplugin.view.templateRootPath = EXT:rh_majordomo/Resources/Private/Templates/`
- Edit the template files as you like.

### Composer
Install via Composer
 `composer require rh/rh-majordomo`
 `./vendor/bin/typo3 extension:activate rh_majordomo`

## Collaboration
Please feel free to help me with the maintenance and development. I am thankful for any cooperation. 
https://github.com/Rolfff/rh_majordomo/issues
