<?php

namespace Drupal\dvglogaudit\EventSubscriber;

use Drupal;
use Drupal\dvglogaudit\Entity\Dvglogaudit;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Drupal\dvglogaudit\Event\DvgAuditLogEvent;

/**
 * Logs the creation of a new node.
 */
class DvgAuditLogSubscriber implements EventSubscriberInterface
{

  /**
   * Log the creation of a new node.
   *
   * @param DvgAuditLogEvent $event
   */
  public function onNodeInsert(DvgAuditLogEvent $event)
  {
    $entity = $event->getEntity();
//    Drupal::logger('dvgauditlog.event_subscribe_node_insert')->notice('New en nu ==@type: ==@title. Created by:==@owner==@id',
//      array(
//        '@type' => $entity->getType(),
//        '@title' => $entity->label(),
//        '@owner' => $entity->getOwner()->getDisplayName(),
//        '@id' => $entity->id()
//      ));
    $values = [
      'title' => $entity->label(),
      'status' => true,
      'description' => 'Description',
      'uid' => Drupal::currentUser()->getDisplayName(),
      'created' => date("Y-m-d", \Drupal::time()->getCurrentTime()),
      'changed' => date("Y-m-d", \Drupal::time()->getCurrentTime())
    ];
    Dvglogaudit::create($values)->save();
  }


  /**
   * Log the creation of a new node.
   *
   * @param DvgAuditLogEvent $event
   */
  public function onNodeUpdate(DvgAuditLogEvent $event)
  {
    $entity = $event->getEntity();
    $values = [
      'title' => $entity->label(),
      'status' => true,
      'description' => 'Description',
      'uid' => Drupal::currentUser()->getDisplayName(),
      'created' => date("Y-m-d", \Drupal::time()->getCurrentTime()),
      'changed' => date("Y-m-d", \Drupal::time()->getCurrentTime())
    ];
    Dvglogaudit::create($values)->save();

    Drupal::logger('dvgauditlog.event_subscribe_node_update')->notice('Updated ==@type: ==@title. Created by:==@owner==@id',
      array(
        '@type' => $entity->getType(),
        '@title' => $entity->label(),
        '@owner' => $entity->getOwner()->getDisplayName(),
        '@id' => $entity->id()
      ));

  }


  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents()
  {
    return [
      DvgAuditLogEvent::DVGAUDITLOG_NODE_INSERT => 'onNodeInsert',
      DvgAuditLogEvent::DVGAUDITLOG_NODE_UPDATE => 'onNodeUpdate'
    ];

  }
}
