<?php

class Response
{
    protected $content;
    protected $status_code = 200;
    protected $status_text ='OK';
    protected $http_header = array();

    public function send()
    {
        // Set Http protocol version
        header('HTTP/1.1 ' . $this->status_code . ' ' . $this->status_text); //Ex. "HTTP/1.1 200 OK"
        
        foreach ($this->http_header as $name => $value){
            header($name . ':' . $value);
        }

        // Output response content.
        echo $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setStatusCode($status_code, $status_text = '')
    {
        $this->status_code = $status_code;
        $this->status_text = $status_text;
    }

    public function setHttpHeader($name, $value)
    {
        $this->http_header[$name] = $value;
    }

}