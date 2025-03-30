<?php

namespace Drupal\article_stats\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\node\Entity\Node;

/**
 * Provides a 'ArticleStatsBlock' block.
 *
 * @Block(
 *   id = "article_stats_block",
 *   admin_label = @Translation("Article Stats Block"),
 *   category = @Translation("Custom"),
 * )
 */
class ArticleStatsBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $account = \Drupal::currentUser();
    if ($account->isAuthenticated()) {
      $query = \Drupal::entityQuery('node')
        ->condition('type', 'article')
        ->condition('uid', $account->id());
      $nids = $query->execute();

      $articles = Node::loadMultiple($nids);
      $count = count($articles);

      return [
        '#markup' => t('Total articles authored: @count', ['@count' => $count]),
        '#cache' => [
          'contexts' => ['user'],
        ],
      ];
    }
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheContexts() {
    return ['user'];
  }
}
