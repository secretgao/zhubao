<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    public function handle($request, Closure $next)
    {
       // $response = $next($request);
        $route = $request->route();
        // 或者使用 $request->route('name') 来获取具名路由的名称

        // 访问路由的各个属性
        $name = $route->getName();
        $uri = $route->uri();
        $methods = $route->methods();
        $action = $route->getAction();

        if (!Auth::check()) {
            // 用户未登录，重定向到登录页面
        //    if ($name != 'product.detail'){
                return redirect()->route('login.show');
          //  }
        }
// 获得当前认证用户．．．
        //$user = Auth::user();
//var_dump($user);
// 获得当前认证用户的ID．．．
     //   $id = Auth::id();
      //  var_dump($id);
        return $next($request);
    }
}
