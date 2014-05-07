<?php

class Spotify
{

    public $type;

    public function getResults($queryString,$queryType)
    {
        if($queryType == 'Artist')
        {
            $this->type = 'artist';
            $endpoint = "http://ws.spotify.com/search/1/artist.json?q=$queryString";
        }
        else if($queryType == 'Song')
        {
            $this->type = 'track';
            $endpoint = "http://ws.spotify.com/search/1/track.json?q=$queryString";
        }
        else if($queryType == 'Album')
        {
            $this->type = 'album';
            $endpoint = "http://ws.spotify.com/search/1/album.json?q=$queryString";
        }
        $json = file_get_contents($endpoint);
        return json_decode($json);
    }

    public function getFormat($json)
    {
        if($this->type == 'artist')
        {
            return $json->artists;
        }
        else if($this->type == 'track')
        {
            return $json->tracks;
        }
        else if($this->type == 'album')
        {
            return $json->albums;
        }
        return NULL;
    }

    public function soundCloudHelper($json)
    {
        if($this->type == 'artist')
        {
            return $json->artists[0]->name;
        }
        else if($this->type == 'track')
        {
            //dd($json);
            return $json->tracks[0]->artists[0]->name;
        }
        else if($this->type == 'album')
        {
            //dd($json->albums[0]->artists[0]->name);
            return $json->albums[0]->artists[0]->name;
        }
        return NULL;
    }

    public function getWidget($spotifyString)
    {

    }
}