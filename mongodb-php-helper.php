<?php
function get_value_by_id($id, $collection, $field)
    {

        $db = MONGODB_DATABASE;
        $coll = $collection;
        $data = array();
        $collection = $this->mongodb_client->$db->$coll;

        $cursor = $collection->find(['_id' => new MongoDB\BSON\ObjectID($id)], ['projection' => [$field => 1]]);

        $data = $cursor->toArray();
        $ret_val = !empty($data[0][$field]) ? $data[0][$field] : '';

        return $ret_val;
    }

    function get_value_by_colms($colm, $val, $collection, $field)
    {

        $db = MONGODB_DATABASE;
        $coll = $collection;

        $data = array();
        $collection = $this->mongodb_client->$db->$coll;

        if ($colm == 'slug') {
            $regec = $val;
        } else {
            $regec = new \MongoDB\BSON\Regex($val, 'i');
        }

        $cursor = $collection->find(
            [
                //$colm=>$val
                $colm => $regec
            ],
            [
                'projection' =>
                [
                    $field => 1
                ],
                'sort' => ['_id' => -1],
            ]
        );


        $data = $cursor->toArray();
        // echo "<pre>";
        // 	print_r ($data);
        // 	echo "</pre>";
        // 	exit;
        $ret_val = $data;
        //$ret_val = !empty($data[0][$field])?$data[0][$field]:'';

        return $ret_val;
    }

    function get_value_by_colm($colm, $val, $collection, $field)
    {

        $db = MONGODB_DATABASE;
        $coll = $collection;

        $data = array();
        $collection = $this->mongodb_client->$db->$coll;

        if ($colm == 'slug') {
            $regec = $val;
        } else {
            $regec = new \MongoDB\BSON\Regex('^' . $val, 'i');
        }
        $cursor = $collection->find(
            [
                //$colm => $val
                $colm => $regec
            ],
            [
                'projection' =>
                [
                    $field => 1
                ]

            ]
        );

        $data = $cursor->toArray();
        $ret_val = !empty($data[0][$field]) ? $data[0][$field] : '';

        return $ret_val;
    }

    function get_data_by_id($id, $collection, $field)
    {
        //$data = array();
        if (strlen($id) != 24) {
            $data = array();
        } else {
            $db = MONGODB_DATABASE;
            $coll = $collection;
            $data = array();
            $collection = $this->mongodb_client->$db->$coll;

            $proj_colm = explode(',', $field);
            //$filter['active'] = true;
            $filter['_id'] = new MongoDB\BSON\ObjectID($id);
            $filter['active'] = true;
            if (!empty($proj_colm)) {
                foreach ($proj_colm as $key => $value) {
                    $project[$value] = 1;
                }
            }

            $cursor = $collection->find(['_id' => new MongoDB\BSON\ObjectID($id)], ['projection' => $project]);

            $data = $cursor->toArray();
        }
        return $data;
    }

    function get_data_($collection, $filter, $fields)
    {
        //$data = array();

        $data = array();

        $db = MONGODB_DATABASE;
        $coll = $collection;
        $data = array();
        $collection = $this->mongodb_client->$db->$coll;

        $proj_colm = explode(',', $fields);

        $filter['active'] = true;
        if (!empty($proj_colm)) {
            foreach ($proj_colm as $key => $value) {
                $project[$value] = 1;
            }
        }

        $cursor = $collection->find($filter, ['projection' => $project]);

        $data = $cursor->toArray();

        return $data;
    }
