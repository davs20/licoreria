<?php
namespace Configuracion\Routing;
class Router {

	protected $requestUri;
	protected $routes;
	public static $dir_root;
	protected $method;
	protected $post;

	const GET_PARAMS_DELIMITER = '?';

	public function __construct($requestUri)
	{
		$this->routes = [];

		$this->setRequestUri($requestUri);
	}

	public function setRequestUri($requestUri)
	{
		if (strpos($requestUri, self::GET_PARAMS_DELIMITER))
		{
			$requestUri = strstr($requestUri, self::GET_PARAMS_DELIMITER, true);
		}
		$this->requestUri = $requestUri;
	}

	public function getRequestUri()
	{
		return $this->requestUri;
	}

	public function add($uri, $closure,$post)
	{
		$route = new Route(self::$dir_root.$uri, $closure,$post);
		array_push($this->routes, $route);
	}

	public function run()
	{
		$response = false;
		$requestUri = $this->getRequestUri();

		foreach ($this->routes as $route)
		{
			if ($route->checkIfMatch($requestUri))
			{
				//request uri es lo que se envia en el constructor

				$response = $route->execute();
				
				// break para no seguir dando vueltas
				// Ya se encontró la ruta correspondiente
				break;
			}
		}

		//$this->sendResponse($response,$this->method);
	}

	public function sendResponse($response,$method)
	{
		if ($method="post") {
			echo $response;
		}
		else if (is_array($response))
		{
			echo json_encode($response);
		}
		else if ($response instanceof Response)
		{
			$response->execute();
		}
		else
		{
			
		}
	}

}
