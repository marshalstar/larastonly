<?php

class Rounting {

    /**
     * @param array $attributes
     * @param array $models
     * @param \Closure $callback
     */
    public static function eachController($attributes, $models, $callback) {
        Route::group($attributes, function() use($models, $callback)
        {
            foreach($models as $model) {
                $plural = Str::plural($model);
                $routeName = Str::camel($plural);
                $urlName = String::slug($plural);
                $controllerName = Str::studly($plural)."Controller";
                $callback($urlName, $routeName, $controllerName);
            }
        });
    }

} 