<?php
try {
    $path = getcwd();
    $path .= '\HelloWorld';
    $message = '';

    if (is_dir($path)) {
        array_map('unlink', glob($path . '\*.*'));
        rmdir('HelloWorld');
        $message = $path . " removed.";
    }

    mkdir('HelloWorld');
    $content = "<?php\n";
    $content .= "echo 'Hello world! It is now " . date("h:i a e") . '.';
    file_put_contents($path . '\index.php', $content);

    $content .= " File size: " . filesize($path . '\index.php') . ' bytes' . "';";

    file_put_contents($path . '\index.php', $content);

    $message .= "\nFile index.php generated with successful.";

    echo nl2br($message);

} catch (Throwable $th) {
    echo 'Error to generate file index.php. Details: ' . $th->getMessage();
}
