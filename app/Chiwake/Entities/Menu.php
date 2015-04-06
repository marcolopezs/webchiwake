<?php namespace Chiwake\Entities;

class Menu extends BaseEntity{

    protected $fillable = ['titulo','slug_url','descripcion','precio','descripcion','imagen','imagen_carpeta','menu_category_id','published_at','publicar'];

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo('Chiwake\Entities\MenuCategory', 'menu_category_id');
    }

} 