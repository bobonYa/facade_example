<?php


namespace Facade;


use FormatSaver\JsonSaver;
use FormatSaver\XmlSaver;
use Parser\OpenWeather;

class Weather
{
    protected $parser;
    protected $format_saver;

    public function __construct($city, $parser = null)
    {

        $this->parser = $parser ??  new OpenWeather();
        $this->parser->setCity($city);

    }

    public function getWeather($type='json',$method='save')
    {
        $data = $this->parser->getData();
        if($type=='xml'){
            $dataSave=XmlSaver::returnData($data);
            $fileType="xml";
        } else {
            $dataSave=JsonSaver::returnData($data);
            $fileType="json";
        }

        if($method=='show'){
            print_r($dataSave);
        } else {
            file_put_contents("weather.{$fileType}",$dataSave);
        }
    }
}