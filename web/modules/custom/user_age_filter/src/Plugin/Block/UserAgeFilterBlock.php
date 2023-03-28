<?php

namespace Drupal\user_age_filter\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * @Block(
 *  id = "user_age_filter_block",
 *  admin_label = @Translation("Age filter"),
 * )
 */

class UserAgeFilterBlock extends BlockBase {

    public function build() {
        return [
            '#markup' => t('this is your custom block'),
        ];
    }

}