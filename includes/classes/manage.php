<?php

class manage
{
    /*========================================/*
    *| construcs function
    *| Xay dung doi tuong can thiet
    *| Dinh nghia $data va $skin
    /*========================================*/
    public $data;
    public $skin;
    public $userid;

    function __construct()
    {
        $this->skin = $this->load('class_skin');
    }


    /*========================================/*
    *|
    *| Class load
    *| Chi input class name , ko .php
    /*========================================*/
    function load($class_name)
    {
        if (!class_exists($class_name)) {
            $class_file = $class_name . '.php';
            include($class_file);
            $load = new $class_name;
            return $load;
        }
        $load = new $class_name();
        return $load;
    }

    /*========================================/*
    *|
    *| Uu tien load language tai class manage
    *|
    /*========================================*/

    // Load language if no contents replace
    function language_normal($key) // Call language by call this function with key (Array in language file)
    {
        include('././language/' . LANGUAGE_FILE);
        return $tlca_lang[$key];
    }


    // Load language if want to replace contents
    function language_replace($key_lang, $input)
    {
        include('././language/' . LANGUAGE_FILE);

        if (is_array($input)) {
            foreach ($input as $key => $value) {
                $tlca_lang[$key_lang] = str_replace('{' . $key . '}', $value, $tlca_lang[$key_lang]);
            }
        } else {
            $tlca_lang[$key_lang] = str_replace('{1}', $input, $tlca_lang[$key_lang]);
        }
        return $tlca_lang[$key_lang];

    }


    /*========================================/*
    *|
    *| End Uu tien load language tai class manage
    *|
    /*========================================*/


}

?>