<?php

require_once 'citystatetoken.civix.php';
// phpcs:disable
use CRM_Citystatetoken_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_tokens().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_tokens/
 */
function citystatetoken_civicrm_tokens(&$tokens) {
  $tokens['citystate']['citystate.citystate'] = E::ts('City, State Abbreviation');
}

/**
 * Implements hook_civicrm_tokenValues().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_tokenValues/
 */
function citystatetoken_civicrm_tokenValues(&$values, $cids, $job = null, $tokens = array(), $context = null) {
  if (!empty($tokens['citystate'])) {
    foreach ($values as $contactId => &$tokenValues) {
      $tokenValues['citystate.citystate'] = "";
      $addresses = \Civi\Api4\Address::get(FALSE)
        ->addSelect('is_primary', 'state_province_id:name', 'city', 'country_id:label', 'state_province.abbreviation')
        ->addWhere('is_primary', '=', TRUE)
        ->addWhere('contact_id', '=', $contactId)
        ->execute();
      foreach ($addresses as $address) {
        if (isset($address['city'])) {
          $tokenValues['citystate.citystate'] = "{$address['city']}";
          if (isset($address['state_province.abbreviation'])) {
            $tokenValues['citystate.citystate'] .= ", {$address['state_province.abbreviation']}";
          }
        }
        elseif (isset($address['state_province.abbreviation'])) {
          $tokenValues['citystate.citystate'] .= "{$address['state_province.abbreviation']}";
        }
      }
    }
  }
}

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function citystatetoken_civicrm_config(&$config) {
  _citystatetoken_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function citystatetoken_civicrm_xmlMenu(&$files) {
  _citystatetoken_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function citystatetoken_civicrm_install() {
  _citystatetoken_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function citystatetoken_civicrm_postInstall() {
  _citystatetoken_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function citystatetoken_civicrm_uninstall() {
  _citystatetoken_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function citystatetoken_civicrm_enable() {
  _citystatetoken_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function citystatetoken_civicrm_disable() {
  _citystatetoken_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function citystatetoken_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _citystatetoken_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function citystatetoken_civicrm_managed(&$entities) {
  _citystatetoken_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function citystatetoken_civicrm_caseTypes(&$caseTypes) {
  _citystatetoken_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function citystatetoken_civicrm_angularModules(&$angularModules) {
  _citystatetoken_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function citystatetoken_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _citystatetoken_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function citystatetoken_civicrm_entityTypes(&$entityTypes) {
  _citystatetoken_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_thems().
 */
function citystatetoken_civicrm_themes(&$themes) {
  _citystatetoken_civix_civicrm_themes($themes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function citystatetoken_civicrm_preProcess($formName, &$form) {
//
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
//function citystatetoken_civicrm_navigationMenu(&$menu) {
//  _citystatetoken_civix_insert_navigation_menu($menu, 'Mailings', array(
//    'label' => E::ts('New subliminal message'),
//    'name' => 'mailing_subliminal_message',
//    'url' => 'civicrm/mailing/subliminal',
//    'permission' => 'access CiviMail',
//    'operator' => 'OR',
//    'separator' => 0,
//  ));
//  _citystatetoken_civix_navigationMenu($menu);
//}
