<?php
/**
 * Created by PhpStorm.
 * User: Steven
 * Date: 4/29/14
 * Time: 5:39 PM
 */


class SoundCloud
{
    public $client;
    public $tracks;

    public function GetResults($queryString)
    {
        //dd($queryString);
        $endpoint = "http://api.soundcloud.com/resolve.json?url=http://soundcloud.com/$queryString&client_id=608b29e048dcd519e21bfb1cdb21529c";
        $json = file_get_contents($endpoint);
        //$endpoint = "http://api.soundcloud.com/users/$json->id/tracks.json?client_id=608b29e048dcd519e21bfb1cdb21529c";
        //$json = file_get_contents($endpoint);
        return json_decode($json);
    }


}