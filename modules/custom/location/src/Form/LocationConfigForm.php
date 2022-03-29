<?php

namespace Drupal\location\Form;
 
use Drupal\Core\Form\ConfigFormBase;
 
use Drupal\Core\Form\FormStateInterface;
 
class LocationConfigForm extends ConfigFormBase {
 
  /**
 
   * {@inheritdoc}
 
   */
  protected function getEditableConfigNames() {  
    return [  
      'location.settings',  
    ];  
  }
  public function getFormId() {
 
    return 'location_config_form';
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function buildForm(array $form, FormStateInterface $form_state) {
 
    $form = parent::buildForm($form, $form_state);
 
    $config = $this->config('location.settings');
 
    $form['country'] = array(
 
      '#type' => 'textfield',
 
      '#title' => 'Country',
 
      
 
      '#required' => TRUE,
 
    );

    $form['city'] = array(
 
        '#type' => 'textfield',
   
        '#title' => 'City',
   
        
   
        '#required' => TRUE,
   
      );

      $form['timezone'] = array(
        '#title' => t('Time Zone'),
        '#required' => TRUE,
        '#type' => 'select',
        '#description' => 'Select your time zone.',
        '#options' => array(t('--- SELECT ---'),
        'America/Chicago' =>t('America/Chicago'), 
        'America/New_York' =>t('America/New_York'), 
        'Asia/Tokyo' =>t('Asia/Tokyo'),
        'Asia/Dubai' => t('Asia/Dubai'), 
        'Asia/Kolkata' =>t('Asia/Kolkata'),
        'Europe/Amsterdam' => t('Europe/Amsterdam'),
        'Europe/Oslo' =>  t('Europe/Oslo'),
        'Europe/London' =>   t('Europe/London')),
      );
 
   
    return $form;
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function submitForm(array &$form, FormStateInterface $form_state) {
 
    $config = $this->config('location.settings');
 
    $config->set('location.country', $form_state->getValue('country'));
    $config->set('location.city', $form_state->getValue('city'));
    $config->set('location.timezone', $form_state->getValue('timezone'));
 
   
 
    $config->save();
 
    return parent::submitForm($form, $form_state);
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
 
 
}