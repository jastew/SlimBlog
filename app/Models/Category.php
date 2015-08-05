<?php
/**
 * Created by PhpStorm.
 * User: jason
 * Date: 04/08/15
 * Time: 23:50
 *
 * @var getTitle()
 */

namespace Jastew\Models;

class Category extends \Model
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

    public function getArticles()
    {
        return $this->has_many_through('Jastew\Models\Article');
    }
}