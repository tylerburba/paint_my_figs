<?php
/**
 * Created by PhpStorm.
 * User: Tyler
 * Date: 2/20/2017
 * Time: 10:52 AM
 */

namespace Drupal\quote_module\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class commissionEntitySettingsForm.
 *
 * @package Drupal\quote_module\Form
 *
 * @ingroup quote_module
 */
class CommissionEntitySettingsForm extends FormBase {
  /**
   * Returns a unique string identifying the form.
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId() {
    return 'commissionEntity_settings';
  }

  /**
   * Form submission handler.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Empty implementation of the abstract submit class.
  }


  /**
   * Defines the settings form for commission entity entities.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   Form definition array.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['commissionEntity_settings']['#markup'] = 'Settings form for Commisoin entity entities. Manage field settings here.';
    return $form;
  }

}