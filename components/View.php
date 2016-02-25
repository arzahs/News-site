<?php

class View
{

    protected $data = array();

    public function assign($key, $value){
        $this->data[$key]=$value;
    }


    public function render($template)
    {
        foreach ($this->data as $key=>$val){
            $$key = $val;
        }
        ob_start();
        include $_SERVER["DOCUMENT_ROOT"]."views".$template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function display($template){
        echo $this->render($template);
    }



}