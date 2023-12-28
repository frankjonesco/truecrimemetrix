<?php

namespace App\Models;

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Site extends Model
{
    use HasFactory;


    // FORCE TABLE NAME

    protected $table = 'config';




    // GET CONFIRATION


    public function getConfig(){

        return Site::where('id', 1)->first();

    }




    // GET RESOURCES

    private function getResources(
        object $model, 
        bool $paginate = false, 
        int $limit = null, 
        bool $random = false, 
        string $order = null, 
        string $sort = null
    ){

        $order = $order ?: 'created_at';
        $sort = $sort ?: 'desc';

        if($paginate){

            $limit = $limit ?: 12;
            $prepend = self::getController() == 'AdminController' ? 'admin/' : null;

            return $model::orderBy($order, $sort)
                ->paginate($limit)
                ->withPath($prepend.$model->getModelData()->directory);

        }

        if($limit){
            if($random)
                return $model::inRandomOrder()->take($limit)->get();
            else
                return $model::orderBy($order, 'desc')->take($limit)->get();
        }

        return $model::orderBy($order, $sort)->get();

    }




    // RESOURCE: CATEGORIES

    public function categories(bool $paginate = false, int $limit = 30, $random = false, $order = 'name', $sort = 'ASC'){

        $model = new Category();
        return self::getResources($model, $paginate, $limit, $random, $order, $sort);

    }

    // GET CONTROLLER NAME

    public function getController(){

        return strtok(substr(strrchr(request()->route()->getActionName(), '\\'), 1), '@');

    }




    // GET THE METHOD IN USE

    public function getMethod(){
        list(, $method) = explode('@', Route::getCurrentRoute()->getActionName());
        return $method;
    }

}
