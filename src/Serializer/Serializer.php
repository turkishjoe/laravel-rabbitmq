<?php
/**
 * Created by PhpStorm.
 * User: prog12
 * Date: 25.09.18
 * Time: 3:09
 */

namespace Ipunkt\LaravelRabbitMQ\Serializer;


class Serializer
{
    public function __construct( array $configuration ) {
        $this->configuration = $configuration;
    }

    /**
     * @param $data
     * @return string
     */
    public function serialize($data)
    {
        $type = array_get($this->configuration, 'type');
        if($type == 'json')
        {
            return json_encode($data);
        }

        return serialize($data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function unserialize($data)
    {
        $type = array_get($this->configuration, 'type');
        if($type == 'json')
        {
            return json_decode($data, true);
        }

        return unserialize($data);
    }
}