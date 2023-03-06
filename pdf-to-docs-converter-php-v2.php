<?php
       // composer require aspose-cloud/aspose-words-cloud 
       // Start README example
      require_once('vendor/autoload.php');
        $api = new WordsApi($clientId, $clientSecret);
        // the step is optional, the default value is https://api.aspose.cloud
        $api->getConfig()->setHost($baseUrl);

        // upload file to cloud
        $upload_request = new Requests\UploadFileRequest($localFilePath, 'fileStoredInCloud.doc');
        $upload_result = $api->uploadFile($upload_request);

        // save as pdf file
        $saveOptions = new PdfSaveOptionsData(array("file_name" => 'destination.pdf'));
        $request = new Requests\SaveAsRequest('fileStoredInCloud.doc', $saveOptions);
        $result = $api->saveAs($request);

        // End README example
