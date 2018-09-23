<?php

/**
 * @file
 * Contains \Drupal\epoch\EpochInterface.
 */

namespace Drupal\epoch;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

/**
 * Provides an interface for defining Epoch entities.
 */
interface EpochInterface extends ConfigEntityInterface {
  // Add get/set methods for your configuration properties here.
  
  public function getDescription();
  
  public function getStartTime();
  
  public function getDuration();
  
  public function getAutoCreate();
  
  public function setDescription($value);
  
  public function setStartTime($value);
  
  public function setDuration($value);
  
  public function setAutoCreate($value);
  
}
