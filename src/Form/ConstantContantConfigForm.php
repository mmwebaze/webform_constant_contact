<?php
namespace Drupal\webform_constant_contact\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ConstantContantConfigForm.
 */
class ConstantContantConfigForm extends ConfigFormBase{

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'webform_constant_contact.config',
    ];
  }
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'webform_constant_contact_config_form';
  }
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $config = $this->config('webform_constant_contact.config');

    $form['constant_contact']['general_list'] = array(
      '#type' => 'textfield', // to be changed to password
      '#title' => $this->t('General List id'),
      '#default_value' => $config->get('general_list'),
      //'#required' => TRUE,
    );

    $form['constant_contact']['api_key'] = array(
      '#type' => 'textfield', // to be changed to password
      '#title' => $this->t('Constant Contact api key'),
      '#default_value' => $config->get('api_key'),
      '#required' => TRUE,
    );

    $form['constant_contact']['cc_token'] = array(
      '#type' => 'textfield', // to be changed to password
      '#title' => $this->t('Constant Contact generated token'),
      '#default_value' => $config->get('cc_token'),
      '#required' => TRUE,
    );

    return parent::buildForm($form, $form_state);
  }
  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }
  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('webform_constant_contact.config')
      ->set('general_list', $form_state->getValue('general_list'))
      ->set('api_key', $form_state->getValue('api_key'))
      ->set('cc_token', $form_state->getValue('cc_token'))
      ->save();
  }
}