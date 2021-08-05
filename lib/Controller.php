<?php

namespace Lib;

class Controller
{
    public function render($view, $data_array = array())
    {
        $twig_loader = new Twig_Loader_Filesystem(PATH_VIEWS);
        $twig = new Twig_Environment($twig_loader);

        // render a view while passing the to-be-rendered data
        echo $twig->render($view . PATH_VIEW_FILE_TYPE, $data_array);
    }

}