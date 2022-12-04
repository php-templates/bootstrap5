<?php

require('../vendor/autoload.php');

use PhpTemplates\Config;
use PhpTemplates\ConfigHolder;
use PhpTemplates\EventHolder;
use PhpTemplates\Template;
use PhpTemplates\Bootstrap;

//header("Content-Type: text/plain");

$cfg = new Config('default', __DIR__ . '/cases');
$eventHolder = new EventHolder();
$viewFactory = new Template(__DIR__.'/results', $cfg, $eventHolder);
(new Bootstrap)->mount($viewFactory);


$files = array_diff(scandir('./results'), array('.', '..'));
foreach($files as $file){ // iterate files
    $file = './results/' . $file;
    if(is_file($file)) {
        unlink($file); // delete file
    }
}

$files = scandir('./cases');
$files = array_diff($files, ['.', '..', './']);

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    </head>
    <body>
<?php
foreach($files as $f) {
    if (isset($_GET['t']) && explode('.', $f)[0] !== $_GET['t']) {
        continue;
    }
    $rfilepath = str_replace('.t.php', '', $f);
    $rfilepath = explode(DIRECTORY_SEPARATOR, $rfilepath);
    $rfilepath = end($rfilepath);
    echo '- ' . $rfilepath . "\n";
    $view = $viewFactory->make($rfilepath);
    $view->render();
}

?>
</body>
</html>