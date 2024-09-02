<?php
namespace App\Http\Controllers;

use App\Models\Stade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class StadeController extends Controller
{
    public function add()
    {
        return view('addStade');
    }
    
    public function update(Request $request, $stade)
{
    $stade = Stade::findOrFail($stade);
    $stade->title = $request->input('name');
    $stade->description = $request->input('description');
    $stade->size = $request->input('size');
    $stade->sport = $request->input('sport');
    $stade->city = $request->input('city');
    $stade->reviews = $request->input('review');
    $stade->type = $request->input('type');
    $stade->price = $request->input('price');
    $stade->status = $request->input('status');
    $stade->save();
    return redirect()->route('home');
}

    public function show($id)
    {
        $stade = Stade::findOrFail($id);
        return view('edit',compact('stade'));
    }
    

    public function store(Request $request)
    {
        $stade = new Stade();
        $stade->title = $request->input('name');
        $stade->description = $request->input('description');
        $stade->size = $request->input('size');
        $stade->price = $request->input('price');
        $stade->city = $request->input('city');
        $stade->sport = $request->input('sport');
        $stade->type = $request->input('type');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->storeAs( $image->getClientOriginalName());
            $stade->image = $imagePath;
        }

        $stade->save();


        return Redirect::route('home');    }
    public function delete($id){
        Stade::where('id', $id)->delete();
        $stades=Stade::all();
        return redirect()->back();
    
       
    }
}
?>