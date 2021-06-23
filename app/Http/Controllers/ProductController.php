<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Subcategory;

class ProductController extends Controller
{
    public function create()
    {
        $categories=Category::all();
        $subcategories=Subcategory::all();

        return view('admin.product.create',compact('categories','subcategories'));
    }
    public function save(Request $a)
    {
        $data= new Product;

        //print_r($data->all());
        //die;
        $data->category_id=$a->category_id;
        $data->subcategory_id=$a->subcategory_id;
        $data->product_name=$a->product_name;
        $data->product_size=$a->product_size;
        $data->product_description=$a->product_description;
        
        $file=$a->file('image');
        $filename='image'.time().'.'.$a->image->extension();
        $file->move("upload/",$filename);

        $data->image=$filename;
        
        $data->product_price=$a->product_price;
        $data->product_quantity=$a->product_quantity;

        $data->save();
        if($data)
        {
            return redirect('product/display')->with('message','Data inserted successfully');
        }
    }

    public function display()
    {
        $data=Product::all();

        return view('admin.product.display',compact('data'));
    }

    public function view($id)
    {
        $data=Product::find($id);

        return view('admin.product.view',compact('data'));
    }

    public function edit($id)
    {
        $categories=Category::all();
        $subcategories=Subcategory::all();

        $data=Product::find($id);
         
        return view('admin.product.edit',compact('data','categories','subcategories'));
    }
    public function update(Request $a)
    {
        // print_r($a->all());
        // die;
        if($a->hasFile('image'))
        {
            $data=Product::find($a->id);

            $data->category_id=$a->category_id;
            $data->subcategory_id=$a->subcategory_id;
            $data->product_name=$a->product_name;
            $data->product_size=$a->product_size;
            $data->product_description=$a->product_description;
            
            $file=$a->file('image');
            $filename='image'.time().'.'.$a->image->extension();
            $file->move("upload/",$filename);
    
            $data->image=$filename;
            
            $data->product_price=$a->product_price;
            $data->product_quantity=$a->product_quantity;
    
            $data->save();
            if($data)
            {
                return redirect('product/display')->with('message','Data updated successfully');
            }
        }
        else
        {
            $data=Product::find($a->id);
   
            $data->category_id=$a->category_id;
            $data->subcategory_id=$a->subcategory_id;
            $data->product_name=$a->product_name;
            $data->product_size=$a->product_size;
            $data->product_description=$a->product_description;
            $data->product_price=$a->product_price;
            $data->product_quantity=$a->product_quantity;
    
            $data->save();
            if($data)
            {
                return redirect('product/display')->with('message','Data updated successfully');
            }
        }
    }

    public function delete($id)
    {
        $data=Product::find($id);

        $data->delete();

        if($data)
        {
            return redirect('product/display')->with('message','Product deleted');
        }

    }
}
