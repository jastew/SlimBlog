<?php
/**
 * Created by PhpStorm.
 * User: jason
 * Date: 04/08/15
 * Time: 23:48
 */

namespace Jastew\Models;

class Article extends \Model
{
    public static $_table_use_short_name  = true;

    public function getId()
    {
        return $this->get('id');
    }

    public function getName()
    {
        return $this->get('name');
    }

    public function getText()
    {
        return $this->get('text');
    }

    public function getCategories()
    {
        return $this->has_many_through('Jastew\Models\Category');
    }
}