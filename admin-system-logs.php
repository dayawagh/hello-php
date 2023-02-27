<?php
 public function admin_logs($collection, $log_type, $log_data, $id)
    {
        $user_id = $this->session->userdata('UAADMINID');
        $user = '';
        if ($this->session->userdata('UADMINTYPE') == 'super_admin') {
            $user = 'super_admin';
        }

        $log_array = array_merge($id, $log_data);
        $logs_data = json_encode($log_array, JSON_FORCE_OBJECT);
        $data = array(
            'user_type' => $user,
            'collection_name' => $collection,
            'log_type' => $log_type,
            'log_data' => $logs_data,
            'logged_in_user_id' => $user_id,

            'created_at' => time(),
            'created_date' => date('Y-m-d'),
            'created_time' => date('H:i:s'),
        );

        $db = MONGODB_DATABASE;
        $coll = COLLECTION_ADMIN_LOGS;

        $collection = $this->mongodb_client->$db->$coll;

        $insertOneResult = $collection->insertOne($data);
    }
