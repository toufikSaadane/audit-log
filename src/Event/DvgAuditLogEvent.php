<?php

namespace Drupal\dvglogaudit\Event;

use Symfony\Component\EventDispatcher\Event;
use Drupal\Core\Entity\EntityInterface;

/**
 * Wraps a node insertion demo event for event listeners.
 */
class DvgAuditLogEvent extends Event {

  const DVGAUDITLOG_NODE_INSERT = 'dvgauditlog.event_subscribe_node_insert';
  const DVGAUDITLOG_NODE_UPDATE = 'dvgauditlog.event_subscribe_node_update';
  /**
   * Node entity.
   *
   * @var EntityInterface
   */
  protected $entity;


  /**
   * Constructs a node insertion demo event object.
   *
   * @param EntityInterface $entity
   */
  public function __construct(EntityInterface $entity) {
    $this->entity = $entity;
  }

  /**
   *
   * Geeft the Entity Info
   * @return EntityInterface
   */
  public function getEntity() {
    return $this->entity;
  }

}
