<?php 
public function check_unique_slug($slug, $k)
  {
    $db = MONGODB_DATABASE;
    $coll = Y_TEST;

    $data = array();

    $filter = [
      '$or' => [
        ['slug' => $slug],
        ['slug' => new MongoDB\BSON\Regex('^' . $slug . '-', 'i')],

      ]
    ];
    $project = ['slug' => 1];
    $collection = $this->mongodb_client->$db->$coll;
    $cursor = $collection->find($filter, ['projection' => $project])->toArray();

    $k = 1;
    if (!empty($cursor)) {
      $tmpslug = $slug;
      foreach ($cursor as $key => $value) {
        if ($value['slug'] == $tmpslug) {
          $tmpslug = $slug . '-' . $k;
          $k = $k + 1;
        }
      }
      $slug =  $tmpslug;
    }

    return $slug;
  }
?>
