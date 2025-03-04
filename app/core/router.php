<?php

    class Router{

        static function route(){

            $controllerName = $_REQUEST["controller"] ? $_REQUEST["controller"] : "page";

            $actionName = $_REQUEST["action"] ? $_REQUEST["action"] : "index";

            $controllerFile = "app/controllers".$controllerName.'_controller.php';

            if(file_exists($controllerFile)){

                include $controllerFile;
                
            } else {

                die("Ошибка!1");

            }

            $controllerClassNme = ucfirst($controllerName)."Controller";
            $controller = new $controllerClassNme;

            $modelName = $controllerName.'model';
            $modelFile = "app/models/".$modelName."php";

            if(file_exists($modelFile)){

                include $modelFile;

            } else {

                die("Ошибка!2");

            }

            $modelClassName = ucfirst($controllerName)."Model";
            $model = new $modelClassName;

            $controller -> model = $model;

            if (method_exists($controller, $actionName)) {

                $controller -> $actionName();

            } else {

                die("Ошибка!3");

            }

        }

    }

    ?>