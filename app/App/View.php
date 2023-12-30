<?php

namespace Krispachi\KrisnaLTE\App;

class View {
    public static function render(string $view, $model = []) {
        extract($model);  
        require __DIR__ . "/../View/" . $view . ".php";
        
    }
    public static function render2(string $view, $model = []) {
        ob_start();
        require __DIR__ . "/../View/" . $view . ".php";
        return ob_get_clean();
    }
}