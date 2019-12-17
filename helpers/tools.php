<?php
use anlutro\cURL\Request;
if (!function_exists('SendRequest')) {
    function SendRequest($url, $method = 'GET', $data = [], $headers = ['Content-Type' => 'application/json'], $options = [], $encoding = Request::ENCODING_JSON)
    {
        $baseOptions = [
            CURLOPT_TIMEOUT_MS        => 30000,
            CURLOPT_CONNECTTIMEOUT_MS => 1000,
            CURLOPT_FORBID_REUSE      => false,
            CURLOPT_FRESH_CONNECT     => true,
        ];
        $options     = $baseOptions + $options;

        $request = \cURL::newRequest($method, $url)
            ->setHeaders($headers)
            ->setOptions($options);
        if ($data) {
            $request->setData($data);
            $request->setEncoding($encoding);
        }
        $response = json_decode($request->send()->body, true);

        return $response;
    }
}

if (!function_exists('rate_calc')) {

    /**
     * 率值计算
     * @param $num
     * @param $total
     * @param int $digit
     * @return int|string
     */
    function rate_calc($num, $total, $digit = 4)
    {
        if (!$num || !$total) {
            return 0;
        }

        return number_format($num / $total, $digit);
    }
}

if (!function_exists('array_filters')) {
    function array_filters($data, $index)
    {
        $data = array_filter($data, function ($var) use ($index){
            if ($var[$index] !== '' && $var[$index] != null) {
                return 1;
            }
            return 0;
        }
        );
        return $data;
    }
}




