<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Entry;

use Illuminate\Http\Request;

class PageController extends Controller {
    
    public function index() {
        return view('dev');
    }

    public function addCategory(Request $request) {
        //dd($request);
        $cat = new Category;
        $cat->title = $request->category;
        $cat->save();
        return back();
        
    }

    public function deleteCategory(Request $request) {
        // dd($request);
        $cat = Category::find($request->catID);
        $cat->delete();
        return back();
    }



    public function loadCatDeleteModal(Request $request) {
        // dd($request);
        $cat = Category::findOrFail($request->catID);
        return view('deleteCatModal')->with([
            'entry' => $cat
        ]);
    }

    public function editCategory(Request $request) {
        // dd($request);
        $cat = Category::find($request->catID);
        $cat->title = $request->category;
        $cat->save();
        return back();
    }

    public function loadCatEditModal(Request $request) {
        // dd($request);
        $cat = Category::findOrFail($request->catID);
        return view('editCatModal')->with([
            'entry' => $cat
        ]);
    }
}
