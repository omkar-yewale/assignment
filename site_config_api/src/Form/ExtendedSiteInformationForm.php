<?php

namespace Drupal\site_config_api\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\system\Form\SiteInformationForm;
use Drupal\Core\Render\Markup;

/**
 * ExtendedSiteInformationForm Site Config Form Extended.
 */
class ExtendedSiteInformationForm extends SiteInformationForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $site_config = $this->config('system.site');
    $form = parent::buildForm($form, $form_state);
    $form['api_key'] = [
      '#type' => 'details',
      '#title' => 'Custom Field',
      '#open' => TRUE,
    ];
    $form['api_key']['apikey'] = [
      '#type' => 'textfield',
      '#title' => 'Site API Key',
      // Set Default api key in field,
      // if api key not set No API key yet value has been set.
      '#default_value' => $site_config->get('apikey') ?: 'No API Key yet',
      '#description' => $this->t("Please Enter API Key witout space."),
    ];
    // Chnage the save configuration button name.
    $form['actions']['submit']['#value'] = 'Update Configuration';
    return $form;
  }

  /**
   * Basic Config form Custom submit handler.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $apikey = str_replace(' ', '', $form_state->getValue('apikey'));
    $this->config('system.site')
      ->set('apikey', $apikey)
      ->save();
    parent::submitForm($form, $form_state);
    if (!empty($apikey)) {
      \Drupal::messenger()->deleteAll();
      \Drupal::messenger()->addStatus(Markup::create('The configuration options have been saved. with <strong>"' . $apikey . '"</strong> API Key.'));
    }
  }

}
