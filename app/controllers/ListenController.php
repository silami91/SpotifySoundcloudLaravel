<?php

class ListenController extends baseController
{
    public function login()
    {
        return View::make('Listen/login');
    }

    public function search()
    {
        if (!Auth::check())
        {
            return Redirect::route("login");
        }
        return View::make('Listen/search');
    }

    public function display()
    {

        if (!Auth::check())
        {
            return Redirect::route("login");
        }
        $search = Input::get('queryString');

        if(Input::get('queryString')== "")
        {
            return Redirect::to('search')->with('empty', 'Please specify what you are looking for.');
        }
        $search = urlencode ($search);
        $spotify = new Spotify();
        $soundcloud = new SoundCloud();
        $type = Input::get('type');
        $spotifyJson = $spotify->getResults($search,$type);
        if($spotifyJson->info->num_results > 0)
        {
            $helperString = $spotify->soundCloudHelper($spotifyJson);
            $helperString = str_replace(' ', '', $helperString);
            $helperString = str_replace('$', 'S', $helperString);
            //dd($helperString);
            $soundcloudJson = $soundcloud->GetResults($helperString);
            //dd($soundcloudJson);
            $soundcloudQuery = $soundcloudJson->id;
            //dd($soundcloudQuery);
        }
        else
        {   $search  = str_replace('+', '', $search);
            $search = str_replace('$', 'S', $search);
            $soundcloudJson = $soundcloud->GetResults($search);

            if($soundcloudJson->track_count == 0)
            {
                return Redirect::to('search')->with('error', 'No Results, please check your query.');
            }
            $soundcloudQuery = $soundcloudJson[0]->id;
        }
        $spotifyQuery  = $spotify->getFormat($spotifyJson);
        //dd($json->artists[0]->href);
        //dd($spotifyQuery);
        if($spotifyJson->info->num_results === 0)
        {
            return Redirect::to('search')->with('error', 'No Results, please check your query.');
        }

        return View::make('Listen/display', [
            'spotifyQuery' => $spotifyQuery,
            'soundcloudQuery' => $soundcloudQuery
        ]);
    }

    public function auth()
    {
        $email = Input::get('username');
        $password = Input::get('password');
        if(Auth::attempt(array('email' => $email, 'password' => $password)))
        {
            return Redirect::to('search')->with('welcome', 'Welcome');
        }
        else
        {
            return Redirect::to('login')->with('failed', 'Login Failed');
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('login')->with('logout', 'Logged Out');
    }
}