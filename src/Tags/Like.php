<?php

namespace Neckerrman\Like\Tags;

use Statamic\Tags\Tags;

class Like extends Tags
{

    protected $scriptsLoaded = false;

    /**
     * Private function viewData()
     * @return data for the view
     */
    private function viewData () {
        $context = $this->context;
        $data = [
            'csrf_field' => csrf_field(),
            'id' => $context->get('id'),
            'likes' => $context->get('likes'),
            'route_store' => route('statamic.like.store')
        ];

        return $data;
    }

    /**
     * The {{ like }} tag.
     *
     * @return string|array
     */
    public function index()
    {
        return view('like::button', $this->viewData());
    }


    /**
     * The {{ like:scripts }} tag.
     *
     * @return string|array
     */
    public function scripts()
    {
        if(!$this->scriptsLoaded) {
            $this->scriptsLoaded = true;
            $scriptPath = url('vendor/like/js/app.js');
            $cssPath = url('vendor/like/css/style.css');
            return "<script src=" . $scriptPath . "></script> <link rel='stylesheet' href='$cssPath'/>";
        };

        return '';
    }
}
