<?php

namespace App\Http\Controllers\Api;

use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostsResource;
use App\Http\Resources\YearPostsResource;

class PostsController extends Controller
{
    public function posts() {

        $post = Inventory::selectRaw('YEAR(tanggal) as year')->distinct()->orderBy('year', 'desc') ->pluck('year');
    
        return [
                'title' => "Data Inventaris Puskesmas Muara Satu",
                'data' => PostsResource::collection($post)
        ];
    }

    public function postsByYear($year) {
        
        $postsByYear = Inventory::whereYear('tanggal', $year)->get();
        
        return [
            'title' => 'Data Inventaris tahun ' . $year,
            'tahun' => $year,
            'data' => YearPostsResource::collection($postsByYear),
        ];
    }

    public function postById($year, $id) {
        
        $postsByYear = Inventory::find($id);

        return [
            'title' => 'Details',
            'year' => $year,
            'data' => new PostResource($postsByYear)
        ];
    }

    
}
