<?php


namespace Parser;


class OpenWeather extends BaseParser
{
    protected $url;
    protected $key = 'e23a2eec842224bfb43a84ede77743d9'; /// выносится в конфиг по хорошему

    public function __construct()
    {

    }

    public function setCity($city = 'Moscow')
    {
        $this->url = str_replace(["[CITY]", "[KEY]"], [$city, $this->key], "http://api.openweathermap.org/data/2.5/find?q=[CITY]&type=like&APPID=[KEY]&units=metric");
    }

    public function getData()
    {
        $data = file_get_contents($this->url);
        $data = json_decode($data);
        if ($data->count) {
            $answer = [
                'temp' => $data->list[0]->main->temp ?? null,
                'wind_speed' => $data->list[0]->wind->speed ?? null,
                'wind_deg' => $data->list[0]->wind->deg ?? null,
                'clouds' => $data->list[0]->clouds->all ?? null,
            ];
            return $answer;
        }
        return null;

    }
}