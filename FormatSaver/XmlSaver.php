<?php


namespace FormatSaver;


class XmlSaver extends FormatSaver
{

    public static function returnData($array)
    {
        $data = [
            'date' => date("Y-m-d"),
            'wind_speed' => $array['wind_speed'] ?? 'none',
            'temp' => $array['temp'] ?? 'none',
            'wind_deg' => $array['wind_deg'] ?? 'none',
            'cloudy' => $array['cloudy'] ?? 'none',
        ];
        return self::arrayToXml($data);
    }


    private static  function arrayToXml($array, $rootElement = null, $xml = null)
    {
        $_xml = $xml;
        if ($_xml === null) {
            $_xml = new \SimpleXMLElement($rootElement !== null ? $rootElement : '<root/>');
        }
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                self::arrayToXml($v, $k, $_xml->addChild($k));
            } else {
                $_xml->addChild($k, $v);
            }
        }
        return $_xml->asXML();
    }


}