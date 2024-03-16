<?php

namespace Drupal\autopilot_access\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Access\AccessResult;
use Drupal\user\UserInterface;
use Drupal\user\Entity\User;

/**
 * Determine access based on the pantheon environment.
 */
class AutopilotAccessController extends ControllerBase {

  /**
   * Determine access based on whether this is the autopilot environment.
   *
   * @return \Drupal\Core\Access\AccessResult
   *   If $condition is TRUE, isAllowed() will be TRUE, otherwise isNeutral()
   *   will be TRUE.
   */
  public function isAllowedAccessToEventOutcomes() {

    $access = false;

    if (isset($_ENV['PANTHEON_ENVIRONMENT']) && ($_ENV['PANTHEON_ENVIRONMENT'] == 'autopilot' || $_ENV['PANTHEON_ENVIRONMENT'] == 'dev')) {
      $access = true;
    }

    return AccessResult::allowedIf($access);
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheMaxAge() {
    return 0;
  }

}
