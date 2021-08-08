<?php

namespace App\lib;


class Controller
{
    private $headers = array();
    private $level = 0;
    private $output;

    public function addHeader($header) {
        $this->headers[] = $header;
    }
    public function redirect($url, $status = 302) {
        header('Location: ' . str_replace(array('&amp;', "\n", "\r"), array('&', '', ''), $url), true, $status);
        exit();
    }
    public function setOutput($output) {
        $this->output = $output;
    }

}