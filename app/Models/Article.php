<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;
class Article extends Model
{
    protected $table = 'article';

    protected $primaryKey = 'id';

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    public static function grid($callback)
    {
        return new Grid(new static, $callback);
    }
    public static function form($callback)
    {
        return new Form(new static, $callback);
    }
}
