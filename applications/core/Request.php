<?php

class Request
{
    public function isPost()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            return true;
        }

        return false;
    }

    public function getGet($name, $default = null)
    {
        if(isset($_GET[$name])){
            return $_GET[$name];
        }

        return $default;
    }

    public function getPost($name, $default = null)
    {
        if(isset($_POST[$name])){
            return $_POST[$name];
        }

        return $default;
    }

    public function getHost()
    {
        if(!empty($_SERVER['HTTP_HOST'])){
            return $_SERVER['HTTP_HOST'];
        }

        return $_SERVER['SERVER_NAME'];
    }

    public function isSsl()
    {
        if(isset($_SERVER['HTTPS'] && $_SERVER['HTTPS'] === 'on')){
            return true;
        }

        return false;
    }

    public function getRequestUri()
    {
        return $_SERVER['REQUEST_URI'];
    }

    // http://example.com/index.php/list?foo=bar -> /index.php
    public function getBaseUrI()
    {
        $script_name = $_SERVER['SCRIPT_NAME'];

        $request_uri = $this->getRequestUri();

        if(0 === strpos($request_uri, $script_name)){ // Front controller(/index.php) is included in URL.
            return $script_name;
        } else if(0 === strpos($request_uri, dirname($script_name))){ //URL doesn't have Front controller(/index.php).
            return rtrim(dirname($script_name),'/'); // Trim / from end of URL.
        }

        return '';
    }

    // http://example.com/index.php/list?foo=bar -> /list
    public function getPathinfo()
    {
        $base_uri = $this->getBaseUrI();
        $request_uri = $this->getRequestUri();

        if(false !== ($pos = strpos($request_uri,'?'))){ //URL has GET parameter.
            $request_uri = substr($request_uri, 0, $pos); //Take URL without after ?. $pos is length to find ?.
        }

        $path_info = (string)substr($request_uri, strlen($base_uri)); //Remove baseURL.
        return $path_info;
    }
}