<?php

namespace Dakalab\FourPartyExpress;

abstract class Client
{
    public $wsdl;

    public $token;

    public $client;

    public function __construct($token)
    {
        $this->token = $token;
        $this->client = new \SoapClient($this->wsdl);
    }

    public static function toArray($object)
    {
        if ($object instanceof \Traversable) {
            $array = iterator_to_array($object);
        } elseif (method_exists($object, 'toArray')) {
            $array = $object->toArray();
        } elseif (is_object($object)) {
            $array = get_object_vars($object);
        } else {
            $array = (array) $object;
        }

        $data = [];
        foreach ($array as $key => $value) {
            $data[$key] = is_object($value)
            ? self::toArray($value)
            : $value;
        }

        return $data;
    }

    public static function mergeArray($arr0, $arr1)
    {
        foreach ($arr0 as $k => $v) {
            if (!empty($arr1[$k])) {
                $arr0[$k] = $arr1[$k];
            } else {
                unset($arr0[$k]);
            }
        }

        return $arr0;
    }

    public static function toObject($arr)
    {
        $obj = new \stdClass();
        foreach ($arr as $k => $v) {
            $obj->$k = $v;
        }

        return [$obj];
    }

    /**
     * List available web service functions
     *
     * @return array
     */
    public function listFunctions()
    {
        return $this->client->__getFunctions();
    }

    protected function _request($func, $params)
    {
        $res = $this->client->__soapCall($func, [[
            'arg0' => $this->token,
            'arg1' => $params,
        ]]);
        $arr = self::toArray($res);

        return $arr['return'];
    }
}
