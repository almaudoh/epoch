<?php

/**
 * @file
 * Contains \Drupal\epoch\EpochListBuilder.
 */

namespace Drupal\epoch;

use Drupal\Core\Config\Entity\ConfigEntityListBuilder;
use Drupal\Core\Entity\EntityInterface;

/**
 * Provides a listing of Epoch entities.
 */
class EpochListBuilder extends ConfigEntityListBuilder {
  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['label'] = $this->t('Epoch');
    $header['id'] = $this->t('Machine name');
    $header['description'] = $this->t('Description');
    $header['start_time'] = $this->t('Start time');
    $header['duration'] = $this->t('Duration');
    $header['autocreate'] = $this->t('Auto-create');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /** @var EpochInterface $entity */
    $row['label'] = $entity->label();
    $row['id'] = $entity->id();
    $row['description'] = $entity->getDescription();
    $row['start_time'] = $entity->getStartTime();
    $row['duration'] = $entity->getDuration();
    $row['autocreate'] = $entity->getAutoCreate();
    return $row + parent::buildRow($entity);
  }

}
