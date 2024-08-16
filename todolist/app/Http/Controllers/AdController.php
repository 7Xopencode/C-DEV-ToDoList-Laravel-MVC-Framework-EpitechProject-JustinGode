<?php

namespace App\Http\Controllers;
use App\Models\Ad;
use App\Models\Categorie;
use App\Models\Condition;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{

    public function index()
    {
        $post = Ad::orderBy('created_at', 'DESC');
        $condition = Condition::all();
        $categorie = Categorie::all();
        $location = Location::all();
        return view('home', [
            'posts' => $post->paginate(3),
        ]);
    }

    public function addAds()
    {
        $condition = Condition::all();
        $categorie = Categorie::all();
        $location = Location::all();

        return view('createPost', [
            'conditions' => $condition,
            'categories' => $categorie,
            'locations' => $location,
        ]);
    }

    public function create()
    {
        $condition = Condition::all();
        $categorie = Categorie::all();
        $location = Location::all();

        return view('createPost', [
            'conditions' => $condition,
            'categories' => $categorie,
            'locations' => $location,
        ]);
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
           /*  'condition_id' => 'required', */
            'location_id' => 'required',
            'description' => 'required',
           /*  'price' => 'required', */
            'categorie_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }
    
        Ad::create([
            'title' => $request->title,
            'description' => $request->description,
         /*    'price' => $request->price, */
            'user_id' => Auth::id(),
            /* 'condition_id' => $request->condition_id, */
            'location_id' => $request->location_id,
            'categorie_id' => $request->categorie_id,
            'image' => isset($imagePath) ? '/storage/' . $imagePath : null,
        ]);
    
        return redirect()->route('home')->with('status', 'Ad added successfully');
    }
    
    public function show(Ad $ad)
    {
        return view('ad.show', compact('ad'));
    }

    
    public function edit(Request $request, Ad $ad)
    {
        $condition = Condition::all();
        $categorie = Categorie::all();
        $location = Location::all();
        $pub = Ad::find($request->id);
        return view('editAd', [
            'conditions' => $condition,
            'categories' => $categorie,
            'locations' => $location,
            'ad' => $ad,
        ]);
    }

    public function update(Request $request, Ad $ad)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'condition_id' => 'required',
        'location_id' => 'required',
        'description' => 'required',
        'price' => 'required',
        'categorie_id' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $ad->image = '/storage/' . $imagePath;
    }

    $ad->update([
        'title' => $request->title,
        'description' => $request->description,
        'price' => $request->price,
        'user_id' => Auth::id(),
        'condition_id' => $request->condition_id,
        'location_id' => $request->location_id,
        'categorie_id' => $request->categorie_id,
        'image' => $ad->image,
    ]);

    return redirect()->back()->with('status', 'Ad updated successfully');
}



    public function destroy(Ad $ad)
    {
        $ad->delete();

        return redirect()->back()->with('status', "Ad deleted successfully");
    }
}
