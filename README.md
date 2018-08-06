ThinkPHP5 extend Collection 
=======
thinkphp5.0 扩展collection对象集,而不希望入侵TP源代码

laravel
mapWithKeys方法,清晰的返回api结构


## Installation

``` bash
$ composer require chenjiabin/tp5-extend-collection
```


```
common.php 添加如下方法
if (!function_exists('collection')) {
    /**
     * 数组转换为数据集对象
     * @param array $resultSet 数据集数组
     * @return \think\model\Collection|\chenjiabin\Collection
     */
    function collection($resultSet)
    {
        $item = current($resultSet);
        if ($item instanceof Model) {
            return \think\model\Collection::make($resultSet);
        } else {
            return \chenjiabin\Collection::make($resultSet);
        }
    }
}

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

