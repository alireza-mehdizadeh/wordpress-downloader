<?php

$version = $_GET['version'] ?? null;
$link = $version ? "https://wordpress.org/wordpress-{$version}.zip" : "https://wordpress.org/latest.zip";

$base_directory = "./downloads";
$directory = "{$base_directory}/wordpress.zip";

$is_base_directory_exist = file_exists($base_directory);

if (!$is_base_directory_exist)
    mkdir($base_directory);

$curl_service = curl_init($link);

$directory_open = fopen($directory, "wp");


curl_setopt($curl_service, CURLOPT_FILE, $directory_open);
curl_setopt($curl_service, CURLOPT_HEADER, 0);

curl_exec($curl_service);
curl_close($curl_service);

fclose($directory_open);

$zip = new ZipArchive;

$response = $zip->open($directory);

if ($response === TRUE) {
    $download_directory = "./wordpress";
    $zip->extractTo("./");
    $zip->close();

    unlink($directory);
    rmdir($base_directory);


    $files = scandir($download_directory);
    $files = array_diff($files, ['.', '..']);

    foreach ($files as $file) {
        $file_path = "{$download_directory}/{$file}";
        rename($file_path, "./{$file}");
    }

    rmdir($download_directory);
    unlink(__FILE__);

    header("Location: /");
}

