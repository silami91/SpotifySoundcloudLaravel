<?php

class Review extends Eloquent{
    public function restaurant(){return $this->belongsTo('Restaurant');}

    public static function getReviews($id)
    {
        $query = Review::with('restaurant')->where('restaurant_id','=',$id);
        $reviews = $query->get();
        return $reviews;
    }
}