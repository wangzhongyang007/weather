<?php


namespace Wangzhongyang007\Weather;

//延迟注册： 不会在框架启动的时候就注册，当被调用的时候才注册
class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true; //设置延迟注册 step1

    public function register()
    {
        $this->app->singleton(Weather::class,function (){
            return new Weather(config(config('services.weather.key')));
        });

        $this->app->alias(Weather::class,'weather');
    }

    // 设置延迟注册 step2
    public function provides()
    {
        return [Weather::class,'weather'];
    }

}