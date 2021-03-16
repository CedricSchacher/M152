<?php

class changePage{
    private static $instance;
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new changePage();
        }
        return self::$instance;
    }
    function changePages($id){
        header('Location: /artikel.php?id=' . $id);
    }
}
