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
            '#type' => 'markup',
            '#markup' => $this->get_number_of_user_by_age_range(18, 35),
        ];
    }

    public function get_number_of_user_by_age_range($min_age, $max_age = NULL) {
        
        $user_list = \Drupal::entityTypeManager()->getStorage('user')->loadMultiple();

        $number_of_users_in_range = 0;        

        foreach ($user_list as $user) {
          $age = $user->get('field_user_age')->value;
          if ($age >= $min_age && ($age < $max_age || !$max_age)) {
            $number_of_users_in_range++;
          }
          dpm($user);
        }
        
        return $number_of_users_in_range;
      }

}