<?php

/**
 * @file
 * Contains \Drupal\epoch\Entity\Epoch.
 */

namespace Drupal\epoch\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\epoch\EpochInterface;

/**
 * Defines the Epoch entity.
 *
 * @ConfigEntityType(
 *   id = "epoch",
 *   label = @Translation("Epoch"),
 *   handlers = {
 *     "list_builder" = "Drupal\epoch\EpochListBuilder",
 *     "form" = {
 *       "add" = "Drupal\epoch\Form\EpochForm",
 *       "edit" = "Drupal\epoch\Form\EpochForm",
 *       "delete" = "Drupal\epoch\Form\EpochDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\epoch\EpochHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "epoch",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/epoch/{epoch}",
 *     "add-form" = "/admin/structure/epoch/add",
 *     "edit-form" = "/admin/structure/epoch/{epoch}/edit",
 *     "delete-form" = "/admin/structure/epoch/{epoch}/delete",
 *     "collection" = "/admin/structure/epoch"
 *   }
 * )
 */
class Epoch extends ConfigEntityBundleBase implements EpochInterface {
  /**
   * The Epoch ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Epoch label.
   *
   * @var string
   */
  protected $label;

  /**
   * The Epoch description.
   *
   * @var int
   */
  protected $description;

  /**
   * The timestamp from when this Epoch starts.
   *
   * @var int
   */
  protected $start_time;

  /**
   * The duration that this Epoch lasts in days.
   *
   * @var int
   */
  protected $duration;

  /**
   * The recurrence rule for repeating instances of this epoch.
   *
   * @todo This should be captured in the epoch type.
   *
   * @var string
   */
  protected $recurrence;

  /**
   * Whether to automatically create a new Epoch when the latest one ends.
   *
   * @var bool
   */
  protected $autocreate;

  /**
   * {@inheritdoc}
   */
  public function getDescription() {
    return $this->description;
  }

  /**
   * {@inheritdoc}
   */
  public function getStartTime() {
    return $this->start_time;
  }

  /**
   * {@inheritdoc}
   */
  public function getDuration() {
    return $this->duration;
  }

  /**
   * {@inheritdoc}
   */
  public function getAutoCreate() {
    return $this->autocreate;
  }

  /**
   * {@inheritdoc}
   */
  public function setDescription($value) {
    $this->description = $value;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setStartTime($value) {
    $this->start_time = $value;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setDuration($value) {
    $this->duration = $value;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setAutoCreate($value) {
    $this->autocreate = $value;
    return $this;
  }

  /**
   * Returns the current epoch for the specified entity type and field.
   *
   * Used a default value callback for base field definition.
   *
   * @param \Drupal\Core\Entity\EntityInterface $entity
   *   The entity type.
   * @param \Drupal\Core\Field\FieldDefinitionInterface $field_definition
   *   The field definition instance.
   */
  public static function getCurrentEpoch(EntityInterface $entity, FieldDefinitionInterface $field_definition) {

  }

}
