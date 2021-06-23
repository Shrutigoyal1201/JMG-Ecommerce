<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;

class SubcategoryController extends Controller
{
      public function create()
    {
        $categories=Category::all();

        return view('admin.subcategory.create',compact('categories'));
    }
    public function save(Request $a)
    {
        $data= new Subcategory;

        $data->subcategory=$a->subcategory;
        $data->category_id=$a->category_id;
        
        $data->save();
        if($data)
        {
            return redirect('subcategory/display')->with('message','Category has been succesfully added');
        }
    }

    public function display()
    {
        $data=Subcategory::all();
         // $data=Subcategory::join('categories','subcategories.category_id','=','categories.id')->get();
        // print_r($data->all());
        // die;
        return view('admin.subcategory.display',compact('data'));
    }
    public function edit($id)
    {
        $categories=Category::all();

        $data=Subcategory::find($id);

        return view('admin.subcategory.edit',compact('data','categories'));
    }
    public function update(Request $a)
    {
        $data=Subcategory::find($a->id);

            $data->subcategory=$a->subcategory;
            $data->category_id=$a->category_id;
            
            $data->save();
            if($data)
            {
                return redirect('subcategory/display')->with('message','Category has been succesfully updated');
            }
      
    }

    public function delete($id)
    {
        $data=Subcategory::find($id);

        $data->delete();

        if($data)
        {
            return redirect('subcategory/display')->with('message','Category deleted');
        }

    }

}
