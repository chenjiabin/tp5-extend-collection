ThinkPHP5 extend Collection 
=======
thinkphp5.0 扩展collection对象集,而不希望入侵TP源代码

laravel
mapWithKeys方法,清晰的返回api结构


#0.2版本

## Installation

``` bash
$ composer require chenjiabin/tp5-extend-collection
```

使用方法
```
$r = \db('proj')->limit(10)->select();
return json([
    'code' => 0,
    'msg'  => collection($r)->mapWithKeys(function ($key, $v){
        $t[$v] = [
            'name' => $key['name'],
        ];
        return $t;
    }),

]);
```

