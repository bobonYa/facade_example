<?php


namespace FormatSaver;


class JsonSaver extends FormatSaver
{

    public static function returnData($array)
    {
        $data = [
            'date' => date("Y-m-d"),
            'temp' => $array['temp'] ?? null,
            'wind_deg' => $array['wind_deg'] ?? null,
            'wind_speed' => $array['wind_speed'] ?? null,
            'cloudy' => $array['cloudy'] ?? null,
        ];
        return json_encode($data);
    }
}