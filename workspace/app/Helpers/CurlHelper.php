<?php

namespace App\Helpers;

use CURLFile;

final class CurlHelper
{
    final public static function get(string $url, array $payload = [])
    {
        $queries = count($payload) > 0 ? "?" . http_build_query($payload) : "";

        $curl = curl_init($url . $queries);

        $options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_FRESH_CONNECT => true,
            CURLOPT_FORBID_REUSE => true,
            CURLOPT_FAILONERROR => true,
        ];

        foreach ($options as $key => $value) {
            curl_setopt($curl, $key, $value);
        }

        $data = curl_exec($curl);

        $info = curl_getinfo($curl);

        curl_close($curl);

        $response = compact('data', 'info');

        foreach ($info as $key => $value) {
            LogHelper::curl("Info", [$key => gettype($value) === "string" ? $value : json_encode($value)]);
        }

        foreach ($payload as $key => $value) {
            LogHelper::curl("Payload", [$key => gettype($value) === "string" ? $value : json_encode($value)]);
        }

        LogHelper::curl("Data: " . PHP_EOL . $data);

        LogHelper::curl("=====================END=====================");

        return $response;
    }

    final public static function post(string $url, array $payload = [])
    {
        $curl = curl_init($url);

        $options = [
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_FRESH_CONNECT => true,
            CURLOPT_FORBID_REUSE => true,
            CURLOPT_FAILONERROR => true,
        ];

        foreach ($options as $key => $value) {
            curl_setopt($curl, $key, $value);
        }

        $data = curl_exec($curl);

        $info = curl_getinfo($curl);

        curl_close($curl);

        $response = compact('data', 'info');

        foreach ($info as $key => $value) {
            LogHelper::curl("Info", [$key => gettype($value) === "string" ? $value : json_encode($value)]);
        }

        foreach ($payload as $key => $value) {
            LogHelper::curl("Payload", [$key => gettype($value) === "string" ? $value : json_encode($value)]);
        }

        LogHelper::curl("Data: " . PHP_EOL . $data);

        LogHelper::curl("=====================END=====================");

        return $response;
    }

    final public static function file(string $file)
    {
        return new CURLFile($file);
    }
}
