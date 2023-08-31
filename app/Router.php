<?php
namespace app;


class Router
{
    private array $funcs = [];
    private string $layout = 'main';

    public function get($url,$callback)
    {
        $this->funcs['get'][$url] = $callback;
    }

    public function post($url,$callback)
    {
        $this->funcs['post'][$url] = $callback;
    }

    /**
     * @param string $layout
     */
    public function setLayout(string $layout): void
    {
        $this->layout = $layout;
    }

    public function render($dir, $view)
    {
        ob_start();
        include_once "$dir/../views/layouts/" . $this->layout . ".php";
        $layout = ob_get_clean();
        ob_start();
        include_once "$dir/../views/" . $view . ".php";
        $theView = ob_get_clean();

        return str_replace("{{cn}}", $theView, $layout);
    }

    public function resolve()
    {
//        echo "<pre>";
//        print_r($this->funcs);
//        echo "<pre>";
        $callBack = $this->funcs[(new Request())->getMethod()][(new Request())->getUrl()] ?? false ;
        if (!$callBack) return "Not Found 404";
        if (is_string($callBack)) return $this->render(__DIR__,$callBack);
        return call_user_func($callBack);
    }

    /**
     * @return array
     */
    public function getFuncs(): array
    {
        return $this->funcs;
    }


}