<?php

class Rounting {

    /**
     * @param array $attributes
     * @param array $models
     * @param \Closure $callback
     */
    public static function eachController($attributes, $models, $callback) {
        Route::group(['prefix' => 'admin'], function() use($models, $callback)
        {
            foreach($models as $model) {
                $routeName = Str::plural($model);
                $controllerName = Str::studly($routeName)."Controller";
                $callback($routeName, $controllerName);
            }
        });
    }

} 