<?php namespace Chiwake\Entities;

class Staff extends BaseEntity{

    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

} 