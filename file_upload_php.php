<?php
  
  if (!empty($_FILES['file_input']['name'])) {

      $config['upload_path'] = FCPATH . 'media/landing_page_ads';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      //$config['file_name'] = $_FILES['file_input']['name'];
      $config['max_size'] = 0;
      $config['max_width'] = 0;
      $config['max_height'] = 0;
      $config['remove_spaces'] = TRUE;
      $config['encrypt_name']  = TRUE;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if ($this->upload->do_upload('file_input')) {

        $uploadData = $this->upload->data();
        $picture = $uploadData['file_name'];
        $sourcepath = base_url() . "media/landing_page_ads/" . $uploadData['file_name'];
      } else {
        $error = array('error' => $this->upload->display_errors());
        $sourcepath = '';
      }
    }
?>
