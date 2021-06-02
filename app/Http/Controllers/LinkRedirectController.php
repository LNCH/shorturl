<?php

namespace App\Http\Controllers;

use App\Models\Link;

class LinkRedirectController extends Controller
{
    public function redirect($code)
    {
        // Find the Link record
        $link = Link::where('unique_key', $code)->first();
        // TODO: Handle missing link

        // Store any intermediate data we want to keep
        // Increment visits
        $link->increment('visits');

        // Process the redirect
        return redirect($link->destination_url);
    }
}
