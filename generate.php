<?php
try {
    $path = getcwd();
    $path .= '\HelloWorld';
    $pathFileName = $path . '\index.php';
    $message      = '';

    if (is_dir($path)) {
        array_map('unlink', glob($path . '\*.*'));
        rmdir('HelloWorld');
        $message = $path . " removed.";
    }

    mkdir('HelloWorld');
    $content = "<?php\n";
    $content .= "echo 'Hello world! It is now " . date("h:i a e") . "';";
    file_put_contents($pathFileName, $content);

    $message .= "\nFile index.php generated with successful.";

    echo nl2br($message);

} catch (Throwable $th) {
    echo 'Error to generate file index.php. Details: ' . $th->getMessage();
}
