<?php
/**
 * Created by PhpStorm.
 * User: cuxiaoke
 * Date: 2018/8/6
 * Time: 15:18
 */
namespace chenjiabin;

class Collection extends \think\Collection
{
    public function mapWithKeys(callable $callback)
    {
        $result = [];

        foreach ($this->items as $key => $value) {
            $assoc = $callback($value, $key);

            foreach ($assoc as $mapKey => $mapValue) {
                $result[$mapKey] = $mapValue;
            }
        }
        return new static($result);
    }
}