<?php


if (!function_exists('extractLatLngFromGoogleMapsUrl')) {

    function extractLatLngFromGoogleMapsUrl($url): ?array
    {
        $pattern = '/@([-0-9.]+),([-0-9.]+)/';
        if (preg_match($pattern, $url, $matches)) {
            return [
                'lat' => (float) $matches[1],
                'lng' => (float) $matches[2],
            ];
        }

        return null;
    }
}
