<?php


final Class Registry  Implements ArrayAccess
{

    static private $vars = array();
    private static $_instance;


    public static function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }


    function offsetExists($offset) {

        return isset(self::$vars[$offset]);

    }


    function offsetGet($offset) {

        return $this->get($offset);

    }


    function offsetSet($offset, $value) {

        $this->set($offset, $value);

    }


    function offsetUnset($offset) {

        unset(self::$vars[$offset]);

    }


    function set($key, $var)
    {

        if (isset(self::$vars[$key]) == true) {

            throw new Exception('Unable to set var `' . $key . '`. Already set.');

        }


        self::$vars[$key] = $var;

        return true;

    }


    function get($key)
    {

        if (isset(self::$vars[$key]) == false) {

            return null;

        }


        return self::$vars[$key];

    }


    function remove($var)
    {

        unset(self::$vars[$var]);

    }
}





