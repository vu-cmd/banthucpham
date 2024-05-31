<?php

namespace App\Http\Controllers;
use App\Models\Listfood;
use App\Models\T_food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{

    // Kiểm tra nếu có từ khóa tìm kiếm
    $query = $request->input('s');

    if ($query) {
        // Tìm kiếm sản phẩm theo tên
        $listfoods = Listfood::where('name', 'LIKE', '%' . $query . '%')->get();
    } else {
        // Lấy tất cả sản phẩm nếu không có từ khóa tìm kiếm
        $listfoods = Listfood::all();
    }
    return view('index', compact('listfoods'))->withInput($request->input());
    // return view('index', compact('listfoods'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $t_foods=T_food::all();
        return view('create',compact('t_foods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),
        [
            "name"  => "required|max:300",
            "price" => "required|numeric",
            "produced_on"  => "required|date",
            "Tfood_id" => "required",
            "description" => "required|max:10000",
            'image_file' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
    
        if ($validation->fails()){
            return redirect('listfoods/create')->withErrors($validation)->withInput();
        }
        
        if($request->hasfile('image_file'))
        {
            $file = $request->file('image_file');
            $name = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('images');
            $file->move($destinationPath, $name);
        }
        
        $food = new Listfood();
        $food->name = $request->input('name');
        $food->price = $request->input('price');
        $food->produced_on = $request->input('produced_on');
        $food->Tfood_id = $request->input('Tfood_id');
        $food->description = $request->input('description');
        $food->image ='images/'.$name;
        $food->save();
        
        return redirect('admin')->with('message', 'Thêm thực phẩm thành công');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $listfood=Listfood::findOrFail($id);
        return view('detail', compact('listfood'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $listfood = Listfood::findOrFail($id);
        $t_foods = T_food::all();
        return view('edit', compact('listfood', 't_foods'));
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(),
        [
            "name"  => "required|max:300",
            "price" => "required|numeric",
            "produced_on"  => "required|date",
            "Tfood_id" => "required",
            "description" => "required|max:10000",
            'image_file' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        if ($validation->fails()){
            return redirect()->route('foods.edit', $id)->withErrors($validation)->withInput();
        }

        $food = Listfood::findOrFail($id);
        $food->name = $request->input('name');
        $food->price = $request->input('price');
        $food->produced_on = $request->input('produced_on');
        $food->Tfood_id = $request->input('Tfood_id');
        $food->description = $request->input('description');

        if ($request->hasFile('image_file')) {
            $imagePath = public_path($food->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            $file = $request->file('image_file');
            $name = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('images');
            $file->move($destinationPath, $name);
            $food->image = 'images/'.$name;
        }

        $food->save();

        return redirect('admin')->with('message', 'Cập nhật thực phẩm thành công');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $food = Listfood::find($id);
    
        if ($food) {
            $imagePath = public_path($food->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $food->delete();
            return redirect()->back()->with('message', 'Bạn đã xóa thành công');
        } else {
            return redirect()->back()->with('error', 'Thực phẩm không tồn tại');
        }
    }
}