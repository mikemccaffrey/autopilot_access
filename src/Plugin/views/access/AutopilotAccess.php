<?php

namespace Drupal\autopilot_access\Plugin\views\access;

use Drupal\views\Plugin\views\access\AccessPluginBase;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\Routing\Route;

/**
 * EventOutcomesAccess plugin class.
 *
 * @ingroup views_access_plugins
 *
 * @ViewsAccess(
 *   id = "autopilot_access.event_outcomes.access_handler",
 *   title = @Translation("Autopilot Only"),
 * )
 */
class AutopilotAccess extends AccessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function summaryTitle() {
    return $this->t('Autopilot Only');
  }

  /**
   * {@inheritdoc}
   */
  public function access(AccountInterface $account) {
    return TRUE;
  }

  /**
   * {@inheritdoc}
   */
  public function alterRouteDefinition(Route $route) {
    $route->setRequirement('_custom_access', '\Drupal\autopilot_access\Controller\AutopilotAccessController:isAllowedAccessToEventOutcomes');
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheMaxAge() {
    return 0;
  }

}
