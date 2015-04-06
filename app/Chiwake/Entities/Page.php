<?php namespace Chiwake\Entities;

class Page extends BaseEntity{

    protected $fillable = ['titulo','descripcion','contenido','imagen','published_at','publicar'];

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

} 