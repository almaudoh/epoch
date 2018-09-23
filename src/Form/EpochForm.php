<?php

/**
 * @file
 * Contains \Drupal\epoch\Form\EpochForm.
 */

namespace Drupal\epoch\Form;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\epoch\EpochInterface;

/**
 * Class EpochForm.
 *
 * @package Drupal\epoch\Form
 */
class EpochForm extends EntityForm {
  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    /** @var \Drupal\epoch\EpochInterface $epoch */
    $epoch = $this->entity;
    $form['label'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $epoch->label(),
      '#description' => $this->t("Label for the Epoch."),
      '#required' => TRUE,
    );

    $form['id'] = array(
      '#type' => 'machine_name',
      '#default_value' => $epoch->id(),
      '#machine_name' => array(
        'exists' => '\Drupal\epoch\Entity\Epoch::load',
      ),
      '#disabled' => !$epoch->isNew(),
    );

    $form['description'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Description'),
      '#maxlength' => 255,
      '#default_value' => $epoch->getDescription(),
      '#description' => $this->t("Description for the Epoch."),
      '#required' => TRUE,
    );

    $form['start_time'] = array(
      '#type' => 'date',
      '#title' => $this->t('Start date'),
      '#default_value' => $epoch->getStartTime(),
      '#description' => $this->t("Start time for the Epoch."),
      '#required' => TRUE,
    );

    $form['duration'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Duration'),
      '#maxlength' => 255,
      '#default_value' => $epoch->getDuration(),
      '#description' => $this->t("Duration for the Epoch."),
      '#required' => TRUE,
    );

    $form['autocreate'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $epoch->getAutoCreate(),
      '#description' => $this->t("Automatically create new epochs."),
      '#required' => TRUE,
    );


    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $epoch = $this->entity;
    $status = $epoch->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Epoch.', [
          '%label' => $epoch->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Epoch.', [
          '%label' => $epoch->label(),
        ]));
    }
    $form_state->setRedirectUrl($epoch->urlInfo('collection'));
  }

}
