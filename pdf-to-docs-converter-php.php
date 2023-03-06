<?php
// composer require aspose-cloud/aspose-words-cloud

require_once('vendor/autoload.php'); 
 
use Aspose\Words\WordsApi;

$wordsApi = new WordsApi('####-####-####-####-####', '##################');

$doc = "datasheet_pdf.pdf";
$request = new ConvertDocumentRequest(
    $doc, "docx", NULL, NULL, NULL, NULL
);
$convert = $wordsApi->convertDocument($request);
