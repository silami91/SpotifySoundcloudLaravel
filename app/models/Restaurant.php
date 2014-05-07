<?php

class Restaurant extends Eloquent
{
    public function reviews(){return $this->hasMany('Review');}
}