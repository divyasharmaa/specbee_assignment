<?php

namespace Drupal\location\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Timezone' Block.
 *
 * @Block(
 *   id = "timezone_block",
 *   admin_label = @Translation("Timezone"),
 *   category = @Translation("Timezone"),
 * )
 */
class TimezoneBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $timestamp =   \Drupal::time()
    ->getCurrentTime();
    $my_config = \Drupal::config('location.settings')->get('location.timezone');
    $dt = new \DateTime();

    $dt->setTimezone(new \DateTimeZone($my_config ));
    
    
   

  
    $renderable = [
      '#theme' => 'my_template',
      '#content' => "Current Date and Time in Your Timezone :".$dt->format('dS M Y - H:i A'),
      '#cache' => ['max-age'=>0],

    ];

    return $renderable;
  }

}