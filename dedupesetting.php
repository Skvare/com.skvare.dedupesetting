<?php

require_once 'dedupesetting.civix.php';
// phpcs:disable
use CRM_Dedupesetting_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function dedupesetting_civicrm_config(&$config) {
  _dedupesetting_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function dedupesetting_civicrm_xmlMenu(&$files) {
  _dedupesetting_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function dedupesetting_civicrm_install() {
  _dedupesetting_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function dedupesetting_civicrm_postInstall() {
  _dedupesetting_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function dedupesetting_civicrm_uninstall() {
  _dedupesetting_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function dedupesetting_civicrm_enable() {
  _dedupesetting_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function dedupesetting_civicrm_disable() {
  _dedupesetting_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function dedupesetting_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _dedupesetting_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function dedupesetting_civicrm_managed(&$entities) {
  _dedupesetting_civix_civicrm_managed($entities);
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
function dedupesetting_civicrm_caseTypes(&$caseTypes) {
  _dedupesetting_civix_civicrm_caseTypes($caseTypes);
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
function dedupesetting_civicrm_angularModules(&$angularModules) {
  _dedupesetting_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function dedupesetting_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _dedupesetting_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function dedupesetting_civicrm_entityTypes(&$entityTypes) {
  _dedupesetting_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_thems().
 */
function dedupesetting_civicrm_themes(&$themes) {
  _dedupesetting_civix_civicrm_themes($themes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function dedupesetting_civicrm_preProcess($formName, &$form) {
//
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
function dedupesetting_civicrm_navigationMenu(&$menu) {
  _dedupesetting_civix_insert_navigation_menu($menu, 'Contacts', [
    'label' => E::ts('Dedupe Custom Settings'),
    'name' => 'dedupe_custom_settings',
    'url' => CRM_Utils_System::url('civicrm/admin/dedupesettings', 'reset=1', TRUE),
    'permission' => 'administer CiviCRM',
    'operator' => 'OR',
    'separator' => 0,
  ]);
  _dedupesetting_civix_navigationMenu($menu);
}

/**
 * Implements hook_civicrm_findDuplicates().
 *
 * When submitting an online event registration page we check for duplicate contacts based on specific groups
 *  as specified in the event custom field 'duplicate_if_in_groups'
 */
function dedupesetting_civicrm_findDuplicates($dedupeParams, &$dedupeResults, $context) {

  // only handle Individual contacts
  if ($dedupeParams['contact_type'] != 'Individual') {
    return;
  }

  // get the traces of call.
  $backTraces = debug_backtrace();
  $domainID = CRM_Core_Config::domainID();
  $settings = Civi::settings($domainID);
  $elementNames = [
    'dedupesetting_profile', 'dedupesetting_profile_fallback',
    'dedupesetting_contribute', 'dedupesetting_contribute_fallback',
    'dedupesetting_ufmatch', 'dedupesetting_ufmatch_fallback',
  ];
  $dedupeGroupeMapping = [];
  foreach ($elementNames as $elementName) {
    if ($settings->get($elementName)) {
      $dedupeGroupeMapping[$elementName] = $settings->get($elementName);
    }
  }
  if (empty($dedupeGroupeMapping)) {
    return;
  }

  $component = $dedupeGroupID = NULL;

  foreach ($backTraces as $backtrace) {
    $class = $backtrace['class'];
    if (in_array($class, ['CRM_Contribute_Form_Contribution_Main', 'CRM_Contribute_Form_Contribution_Confirm'])) {
      $component = 'contribute';
      $dedupeGroupID = $dedupeGroupeMapping['dedupesetting_contribute'];
      $dedupeGroupIDFallback = $dedupeGroupeMapping['dedupesetting_profile_fallback'];
      break;
    }
    elseif (in_array($class, ['CRM_Core_BAO_UFMatch'])) {
      $component = 'ufmatch';
      $dedupeGroupID = $dedupeGroupeMapping['dedupesetting_ufmatch'];
      $dedupeGroupIDFallback = $dedupeGroupeMapping['dedupesetting_contribute_fallback'];
      break;
    }
    elseif (in_array($class, ['CRM_Profile_Form'])) {
      $component = 'profile';
      $dedupeGroupID = $dedupeGroupeMapping['dedupesetting_profile'];
      $dedupeGroupIDFallback = $dedupeGroupeMapping['dedupesetting_profile_fallback'];

      break;
    }
  }
  // primary dedupe rule has to be present for any component, fallback dedupe is optional.
  if (empty($dedupeGroupID)) {
    return;
  }
  try {
    // As we are submitting from anonymous event registration form we don't want to check permissions to find matching contacts.
    $dedupeParams['check_permission'] = FALSE;
    if ($dedupeGroupID) {
      $dedupeParams['rule_group_id'] = $dedupeGroupID;
      $dedupeParams['rule'] = CRM_Core_DAO::getFieldValue('CRM_Dedupe_DAO_RuleGroup', $dedupeGroupID, 'used');
    }
    $dedupeResults['ids'] = CRM_Dedupe_Finder::dupesByParams($dedupeParams, $dedupeParams['contact_type'],
      $dedupeParams['rule'], $dedupeParams['excluded_contact_ids'], $dedupeParams['rule_group_id']);

    // in case duplicate contact does not found, try fallback dedupe rule
    if (empty($dedupeResults['ids'])) {
      if ($dedupeGroupIDFallback) {
        $dedupeParams['rule_group_id'] = $dedupeGroupIDFallback;
        $dedupeParams['rule'] = CRM_Core_DAO::getFieldValue('CRM_Dedupe_DAO_RuleGroup', $dedupeGroupIDFallback, 'used');
      }

      $dedupeResults['ids'] = CRM_Dedupe_Finder::dupesByParams($dedupeParams, $dedupeParams['contact_type'],
        $dedupeParams['rule'], $dedupeParams['excluded_contact_ids'], $dedupeParams['rule_group_id']);
    }

    // if we found duplicate contact, let the main function know that, contact found, so that it does not process again
    if (!empty($dedupeResults['ids'])) {
      $dedupeResults['handled'] = TRUE;
    }

    return;
  }
  catch (Exception $e) {
    Civi::log()->debug('dedupesetting_civicrm_findDuplicates: ' . $e->getMessage());

    return;
  }

}
