<?php

namespace App\Config;

class Config
{
    protected $config = [];

    public function merge(array $config)
    {
        $this->config = array_merge_recursive($this->config, $config);

        return $this;
    }

    public function get($key, $default=null)
    {
        return dot($this->config)->get($key, $default);
    }
}