<?php
/**
 * Created by PhpStorm.
 * User: jason
 * Date: 04/08/15
 * Time: 23:50
 */

namespace Jastew\Models;

class Category extends \Model
{
    public static $_table_use_short_name = true;

    public function articles()
    {
        return $this->has_many_through('Article');
    }
}