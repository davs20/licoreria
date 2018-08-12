<?php
namespace Configuracion\Routing;
class Route {

	protected $uri;
	protected $closure;
	protected $post;
	// protected $uriPattern;


	const PARAMETER_PATTERN = '/:([^\/]+)/';
	const PARAMETER_REPLACEMENT = '(?<\1>[^/]+)';
	protected $parameters;

	public function __construct($uri, $closure,$post)
	{
		$this->uri = $uri;
		$this->closure = $closure;
		$this->post=$post;


	}

	public function getUriPattern()
	{
		$uriPattern = preg_replace(self::PARAMETER_PATTERN, self::PARAMETER_REPLACEMENT, $this->uri);
		$uriPattern = str_replace('/', '\/', $uriPattern);
		$uriPattern = '/^' . $uriPattern . '\/*$/s';
		return $uriPattern;
	}

	public function getParameterNames()
	{
		preg_match_all(self::PARAMETER_PATTERN, $this->uri, $parameterNames);
		return array_flip($parameterNames[1]);
	}

	public function resolveParameters($matches)
	{
		$this->parameters = array_intersect_key($matches, $this->getParameterNames());
	}

	public function getParameters(){   
		if($this->post==null){
			return $this->parameters;
	     }
	     return $this->post;
		
	}

	public function checkIfMatch($requestUri)
	{
		$uriPattern = $this->getUriPattern();
		if (preg_match($uriPattern, $requestUri, $matches))
		{
			$this->resolveParameters($matches);
			return true;
		}
		return false;
	}

	public function execute()
	{
		$closure = $this->closure;
		$parameters = $this->getParameters();
		return call_user_func_array($closure, $parameters);
	}

}

