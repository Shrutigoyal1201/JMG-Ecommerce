<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    
    public function create()
    {
        return view('admin.category.create');
    }
    public function save(Request $a)
    {
        $data= new Category;

         if($a->hasFile('image'))
        {
            $data->name=$a->name;
            $data->description=$a->description;

            $file=$a->file('image');
            $filename='image'.time().'.'.$a->image->extension();
            $file->move("upload/",$filename);

            $data->image=$filename;
            $data->status='Available';

            $data->save();

            if($data)
            {
                return redirect('category/display')->with('message','Category has been succesfully added');
            }
        }
        else
        {
            $data->name=$a->name;
            $data->description=$a->description;
            $data->status='Available';

            $data->save();

            if($data)
            {
                return redirect('category/display')->with('message','Category has been succesfully added');
            }
        }
    }

    public function display()
    {
        $data=Category::all();
        return view('admin.category.display',compact('data'));
    }
    public function view($id)
    {
        $data=Category::find($id);
        return view('admin.category.view',compact('data'));
    }
    public function edit($id)
    {
        $data=Category::find($id);
        return view('admin.category.edit',compact('data'));
    }
    public function update(Request $a)
    {
        // print_r($a->all());
        // die;
        if($a->hasFile('image'))
        {
            $data=Category::find($a->id);

            $data->name=$a->name;
            $data->description=$a->description;
            
            $file=$a->file('image');
            $filename='image'.time().'.'.$a->image->extension();
            $file->move("upload/",$filename);

            $data->image=$filename;
            $data->status='Available';

            $data->save();
            if($data)
            {
                return redirect('category/display')->with('message','Category has been succesfully updated');
            }
        }
        else
        {
            $data=Category::find($a->id);

            $data->name=$a->name;
            $data->description=$a->description;
            $data->status='Available';

            $data->save();
            if($data)
            {
                return redirect('category/display')->with('message','Category has been succesfully updated');
            }
        }
    }

    public function delete($id)
    {
        $data=Category::find($id);

        $data->delete();

        if($data)
        {
            return redirect('category/display')->with('message','Category deleted');
        }

    }

}
