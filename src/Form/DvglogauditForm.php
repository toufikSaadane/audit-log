<?php

namespace Drupal\dvglogaudit\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the dvglogaudit entity edit forms.
 */
class DvglogauditForm extends ContentEntityForm {

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
      $this->messenger()->addStatus($this->t('New dvglogaudit %label has been created.', $message_arguments));
      $this->logger('dvglogaudit')->notice('Created new dvglogaudit %label', $logger_arguments);
    }
    else {
      $this->messenger()->addStatus($this->t('The dvglogaudit %label has been updated.', $message_arguments));
      $this->logger('dvglogaudit')->notice('Updated new dvglogaudit %label.', $logger_arguments);
    }

    $form_state->setRedirect('entity.dvglogaudit.canonical', ['dvglogaudit' => $entity->id()]);
  }

}
