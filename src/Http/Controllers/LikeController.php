<?php

namespace Neckerrman\Like\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Statamic\Facades\Entry;

class LikeController extends Controller {
    public function store(Request $req) {
        $user = $req->server->get('HTTP_HOST');
        $entryID = $req->entry_id;

        $entry = Entry::find($entryID);
        $all_likes = $entry->likes ?? 0;

        $liked_users = $entry->likers ?? [];
        $all_likes = $entry->likes ?? 0;

        // Add a like to the entry
        if (!in_array($user, $liked_users)) {
            $liked_users[] = $user;

            $all_likes++;

            $entry->set('likes', $all_likes);
            $entry->set('likers', $liked_users);
            $entry->save();
        } else {
            $liked_users = array_diff($liked_users, [$user]);

            $all_likes--;

            $entry->set('likes', $all_likes);
            $entry->set('likers', $liked_users);
            $entry->save();
        }

        // Go back to the entry
        return redirect()->back();
    }
}

