<?php

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function uibootstrap_civicrm_angularModules(&$angularModules) {
  $angularModules['ui.bootstrap'] = array(
    'ext' => 'org.civicrm.uibootstrap',
    'js' => array(
      'js/ui-bootstrap-tpls.min.js',
    ),
    'settings' => array(
      'sel' => '#bootstrap-theme',
    ),
  );
}
