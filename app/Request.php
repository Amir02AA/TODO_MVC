<?php
namespace app;

class Request
{
    public static function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public static function getUrl()
    {
        $path = $_SERVER['REQUEST_URI'];
        $position = strpos($path, '?');
        if ($position !== false) {
            $path = substr($path, 0, $position);
        }
        return $path;
    }

    public static function getSanitizedData(): ?array
    {
        return (self::getMethod() == 'post') ? self::sanitize($_POST) : self::sanitize($_GET);
    }

    public static function sanitize(array $data): ?array
    {
        return array_map(fn($x) => htmlspecialchars($x), $data);
    }


}