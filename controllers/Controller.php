<?php
abstract class Controller{
    protected $data = array();
    protected $view = "";
    protected $header = array('title' => '','key_words' => '', 'description' => '');

    abstract function proccess($parameters);

    public function printView(){
        if($this->data){
            extract($this->data);
            require ("views/" . $this->view . ".phtml");
        }
    }

    public function route($url){
        header("Location: /$url");
        header("Connection: close");
        exit;
    }
}
?>