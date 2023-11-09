<?php

namespace Drupal\tcdrupalmigration\Plugin\migrate\source;

use Drupal\user\Plugin\migrate\source\d7\User as D7User;
use Drupal\migrate\Row;

/**
 * The 'tcdrupal_users' source plugin.
 *
 * @MigrateSource(
 *   id = "tcdrupal_users",
 *   source_module = "user"
 * )
 */
class TcdrupalUsers extends D7User {

  public function query() {
    $query = parent::query();
    $query->innerJoin('users_roles', 'ur', 'ur.uid = u.uid');
    $query->condition('ur.rid', 3);
    return $query;
  }

  public function prepareRow(Row $row) {
    parent::prepareRow($row);
    //var_dump($row->getSourceProperty('uid'));
  }


}
