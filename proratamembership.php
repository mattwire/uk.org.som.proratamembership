<?php

require_once 'proratamembership.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function proratamembership_civicrm_config(&$config) {
  _proratamembership_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @param array $files
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function proratamembership_civicrm_xmlMenu(&$files) {
  _proratamembership_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function proratamembership_civicrm_install() {
  _proratamembership_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function proratamembership_civicrm_uninstall() {
  _proratamembership_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function proratamembership_civicrm_enable() {
  _proratamembership_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function proratamembership_civicrm_disable() {
  _proratamembership_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed
 *   Based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function proratamembership_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _proratamembership_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function proratamembership_civicrm_managed(&$entities) {
  _proratamembership_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * @param array $caseTypes
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function proratamembership_civicrm_caseTypes(&$caseTypes) {
  _proratamembership_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function proratamembership_civicrm_angularModules(&$angularModules) {
_proratamembership_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function proratamembership_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _proratamembership_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Functions below this ship commented out. Uncomment as required.
 *

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function proratamembership_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function proratamembership_civicrm_navigationMenu(&$menu) {
  _proratamembership_civix_insert_navigation_menu($menu, NULL, array(
    'label' => ts('The Page', array('domain' => 'uk.co.circleinteractive.module.proratamembership')),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _proratamembership_civix_navigationMenu($menu);
} // */

/** This function has no effect on membership fee (at least on contribution page as it's implemented as priceset
 * Use civicrm_buildAmount instead
 */
/*function proratamembership_civicrm_membershipTypeValues( &$form, &$membershipTypeValues ) {
    foreach ( $membershipTypeValues as &$values) {
        CRM_Core_Error::debug_log_message(print_r($values, true));
        if ( $values['name'] == 'Affiliate') {
            $values['minimum_fee'] = "10";
        }
        if ( $values['name'] == 'Student') {
            $values['minimum_fee'] = "2.22";
        }
        CRM_Core_Error::debug_log_message(print_r($values, true));
    }
} */


function proratamembership_civicrm_buildAmount($pageType, &$form, &$amount) {
  if (!empty($form->get('mid'))) {
    // Don't apply pro-rated fees to renewals
    return;
  }
    //sample to modify priceset fee
    $priceSetId = $form->get( 'priceSetId' );
    if ( !empty( $priceSetId ) ) {
        $feeBlock =& $amount;
        // if you use this in sample data, u'll see changes in
        // contrib page id = 1, event page id = 1 and
        // contrib page id = 2 (which is a membership page
        if (!is_array( $feeBlock ) || empty( $feeBlock ) ) {
            return;
        }

        if ($pageType == 'membership') {
            // pro-rata membership per month
            // membership year is from 1st Jan->31st Dec
            // Subtract 1/12 per month so in Jan you pay full amount,
            //  in Dec you pay 1/12
            // 12 months in year, min 1 month so subtract current numeric month from 13 (gives 12 in Jan, 1 in December)
            $monthNum = date('n');
            $monthsToPay = 13-$monthNum;

            foreach ( $feeBlock as &$fee ) {
                if ( !is_array( $fee['options'] ) ) {
                    continue;
                }
                foreach ( $fee['options'] as &$option ) {
                    // We only have one amount for each membership, so this code may be overkill,
                    // as it checks every option displayed (and there is only one).
                    if ($option['amount'] > 0) {
                        // Only pro-rata paid memberships!
                        $option['amount'] = $option['amount'] * ($monthsToPay / 12);
                        if ($monthsToPay == 1) {
                            $option['label'] .= ' - Pro-rata: Dec only';
                        } elseif ($monthsToPay < 12) {
                            $dateObj = DateTime::createFromFormat('!m', $monthNum);
                            $monthName = $dateObj->format('M');
                            //$option['label']  .= ' - ' . (($monthsToPay/12)*100) . ts( '% Pro-rata for the year' );
                            $option['label'] .= ' - Pro-rata: ' . $monthName . ' to Dec';
                        }
                    }
                }
            }
            // FIXME: Somewhere between 4.7.15 and 4.7.23 the above stopped working and we have to do the following to make the confirm page show the correct amount.
            $form->_priceSet['fields'] = $feeBlock;
        }
    }
}