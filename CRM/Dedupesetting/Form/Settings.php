<?php

use CRM_Dedupesetting_ExtensionUtil as E;

/**
 * Form controller class
 *
 * @see https://docs.civicrm.org/dev/en/latest/framework/quickform/
 */
class CRM_Dedupesetting_Form_Settings extends CRM_Core_Form {
  public function buildQuickForm() {

    // add form elements
    $query = "SELECT id, used, title FROM civicrm_dedupe_rule_group WHERE contact_type = 'Individual'";
    $dao = CRM_Core_DAO::executeQuery($query);
    $dedupeGroup = [];
    while ($dao->fetch()) {
      $dedupeGroup[$dao->id] = $dao->title . ' - ( ' . $dao->used . ' )';
    }
    $dedupeGroup = ['' => '-- select --'] + $dedupeGroup;

    $this->add('select', 'dedupesetting_profile', ts('Dedupe for Profile'), $dedupeGroup);
    $this->add('select', 'dedupesetting_profile_fallback', ts('Dedupe for Profile (Fallback)'), $dedupeGroup);
    $this->add('select', 'dedupesetting_contribute', ts('Dedupe for Online Contribution Pages'), $dedupeGroup);
    $this->add('select', 'dedupesetting_contribute_fallback', ts('Dedupe for Online Contribution Pages (Fallback)'), $dedupeGroup);
    $this->add('select', 'dedupesetting_ufmatch', ts('Dedupe for UF Match'), $dedupeGroup);
    $this->add('select', 'dedupesetting_ufmatch_fallback', ts('Dedupe for UF Match (Fallback)'), $dedupeGroup);

    $this->addButtons([
      [
        'type' => 'submit',
        'name' => E::ts('Submit'),
        'isDefault' => TRUE,
      ],
    ]);

    // export form elements
    $this->assign('elementNames', $this->getRenderableElementNames());

    // use settings as defined in default domain
    $domainID = CRM_Core_Config::domainID();
    $settings = Civi::settings($domainID);
    $setDefaults = [];
    foreach ($this->getRenderableElementNames() as $elementName) {
      $setDefaults[$elementName] = $settings->get($elementName);
    }
    $this->setDefaults($setDefaults);

    parent::buildQuickForm();
  }

  public function postProcess() {
    $values = $this->exportValues();

    // use settings as defined in default domain
    $domainID = CRM_Core_Config::domainID();
    $settings = Civi::settings($domainID);

    foreach ($values as $k => $v) {
      if (strpos($k, 'dedupesetting_') === 0) {
        $settings->set($k, $v);
      }
    }
    CRM_Core_Session::setStatus(E::ts('Setting updated successfully'));
    parent::postProcess();
  }

  /**
   * Get the fields/elements defined in this form.
   *
   * @return array (string)
   */
  public function getRenderableElementNames() {
    // The _elements list includes some items which should not be
    // auto-rendered in the loop -- such as "qfKey" and "buttons".  These
    // items don't have labels.  We'll identify renderable by filtering on
    // the 'label'.
    $elementNames = [];
    foreach ($this->_elements as $element) {
      /** @var HTML_QuickForm_Element $element */
      $label = $element->getLabel();
      if (!empty($label)) {
        $elementNames[] = $element->getName();
      }
    }

    return $elementNames;
  }

}