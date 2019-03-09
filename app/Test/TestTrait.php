<?php

// 使用特性( Trait )：特性中可以含有属性和方法。
// 当两个或多个类中含有一部分相同的代码时，就可以使用特性。
// 这类情况的常规处理方式时创建抽象类并扩展它，与特性相比具有一定优势。
// 特性无法用于确定继承关系，而抽象父类可以做到这一点。

namespace App\Test;

use PDO;

trait TestTrait
{
    public function listShow()
    {
        $list = [];
        $sql = sprintf(
            'SELECT %s, %s FROM %s',
            $this->key,
            $this->value,
            $this->table
        );
        $stmt = $this->connection->query( $sql );
        while ( $item = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
            $list[$item[$this->key]] = $item[$this->value];
        }
        return $list;
    }
}