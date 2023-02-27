<?php

public function get_collection_data($collection, $filter, $project, $sort, $limit)
    {
        try {
            $db = MONGODB_DATABASE;
            $coll = $collection;

            $collection = $this->mongodb_client->$db->$coll;

            $agg = [
                ['$match' => $filter],
                ['$project' => $project]
            ];

            //$cursor = $collection->find($filter, ['projection' => $project, 'sort' => $sort]);

            $cursor = $collection->aggregate($agg);

            $data = $cursor->toArray();

            return $data;
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }
