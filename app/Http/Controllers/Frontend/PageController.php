<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RobertSeghedi\News\Models\Article;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    public static function article($slug){
        $id = Article::where('slug', $slug)->first();
        if($id){
            $data = Cache::rememberForever('article-'.$id->id, function () use($slug) {
                $row = Article::where('slug', $slug)->first();
                return $row;
            });

            return $data;
        }else{
            abort(404);
        }
    }
}
