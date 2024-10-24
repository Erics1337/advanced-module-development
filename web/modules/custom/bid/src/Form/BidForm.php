<?php

namespace Drupal\bid\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the bid entity edit forms.
 */
class BidForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {

    $entity = $this->getEntity();
    $result = $entity->save();
    $link = $entity->toLink($this->t('View'))->toRenderable();

    $message_arguments = ['%label' => $this->entity->label()];
    $logger_arguments = $message_arguments + ['link' => render($link)];

    if ($result == SAVED_NEW) {
      $this->messenger()->addStatus($this->t('New bid %label has been created.', $message_arguments));
      $this->logger('bid')->notice('Created new bid %label', $logger_arguments);
    }
    else {
      $this->messenger()->addStatus($this->t('The bid %label has been updated.', $message_arguments));
      $this->logger('bid')->notice('Updated new bid %label.', $logger_arguments);
    }

    $form_state->setRedirect('entity.bid.canonical', ['bid' => $entity->id()]);
  }

}
