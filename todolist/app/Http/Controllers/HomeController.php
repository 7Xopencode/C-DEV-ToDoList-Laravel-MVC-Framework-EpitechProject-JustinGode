<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Categorie;
use App\Models\Condition;
use App\Models\Location;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class HomeController extends Controller
{
    public function home()
    {
      /*   $qcondition = (request('condition')); */
        $qlocation = (request('location'));
        $qcategorie = (request('categorie'));

       /*  $doCondition = false; */
        $doLocation = false;
        $doCategorie = false;

        $filter=null;


        $ad = Ad::orderBy('created_at', 'DESC');
       /*  $condition = Condition::all(); */
        $categorie = Categorie::all();
        $location = Location::all();

        $filter=Ad::query();
        $filter->where("title", "like", '%' . request('search') . '%');
        $filter->orWhere("categorie_id", "=",(int)$qcategorie );
        $filter->orWhere("location_id", "=",(int)$qlocation);
     /*    $filter->orWhere("condition_id", "=", (int)$qcondition); */
        if (request('search')) {

        }


         /*  if (!isNull($qcondition) || !empty(trim($qcondition))) {
            $filter=Ad::query();
            $filter->where("condition_id", $qcondition);
            $doCondition = true;
        }  */


        /* if (!isNull($qlocation) || !empty(trim($qlocation))) {
            if ($doCondition === true) {
                $filter->orWhere("location_id","=", $qlocation);
                $doLocation=true;

            var_dump(2);
            } else {
                $filter=Ad::query();
                $filter->where("location_id","=",$qlocation);
                $doLocation=true;

            }
        } */


       /*  if (!isNull($qcategorie) || !empty(trim($qcategorie))) {
            if ($doCondition===true || $doLocation===true) {
                $filter->orWhere("categorie_id","=",$qcategorie);
                $doCategorie=true;
            }else{
                $filter=Ad::query();
                $filter->where("categorie_id","=",$qcategorie);
                $doCategorie=true;

            }
        } */


        if ($filter != null) {
            $filter->get();
            $ad=$filter;
        }


        $ad=$filter;
        return view('home', [
            /* 'conditions' => $condition, */
            'categories' => $categorie,
            'locations' => $location,
            'posts' => $ad->paginate(6),
        ]);
    }
}
