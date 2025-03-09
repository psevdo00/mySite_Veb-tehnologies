<?php
	class Route {

		static function start(){
			// контроллер и действие по умолчанию
			$controller_name = 'index';
			$action_name = 'index';
			
			$routes = explode('/', $_SERVER['REQUEST_URI']);

			// получаем имя контроллера
			if ( !empty($routes[2]) ) {	

				$controller_name = $routes[2];

			}
			
			//получаем имя экшена
			if ( !empty($routes[3]) ) {

				$action_name = $routes[3];

			}

			// добавляем префиксы
			$model_name = 'Model_'.$controller_name;
			$controller_name = 'Controller_'.$controller_name;
			$action_name = 'action_'.$action_name;

			//echo '1 '.$model_name;

			// подцепляем файл с классом модели
			$model_file = strtolower($model_name).'.php';
			$model_path = "app/models/".$model_file;

			//echo '2 '.$model_name.' '.$model_file;

			if(file_exists($model_path)) {

				include "app/models/".$model_file;

			}

			// подцепляем файл с классом контроллера
			$controller_file = strtolower($controller_name).'.php';
			$controller_path = "app/controllers/".$controller_file;

			if(file_exists($controller_path)){

				include "app/controllers/".$controller_file;

			} else {
		
				Route::ErrorPage404();

			}

			// создаем контроллер
			$controller = new $controller_name;
			$action = $action_name;
			
			if(method_exists($controller, $action)) {

				$controller->$action();

			} else {

				Route::ErrorPage404();

			}
		
		}

		static function ErrorPage404() {
			
			include "app/controllers/Controller_404.php";
			
			header('HTTP/1.1 404 Not Found');
			header("Status: 404 Not Found");
			
			$controller_name = 'Controller_404';
			$controller = new $controller_name;
			$action = 'action_index';

			$controller->$action();
			
		}
		
	}
