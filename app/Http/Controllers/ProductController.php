<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImg;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 關聯
        // $product_list = Product::with('product_type')->find(1);
        // dd($product_list->product_type->type_name);

        // 無關聯
        // $product_list = Product::find(1);
        // $type = ProductType::where('id', '=', '$news_list-type_id')->get();
        // $types = ProductType:: all();

        // 尋找關聯類型的方式
        // $type = ProductType::with('product')->find(1);
        // dd($type);

        $product_list = Product::all();
        //解構json物件
        // $product = Product::find(28);
        // $object = json_decode($product->product_info);
        // dd($object);
        return view('admin.product.index', compact('product_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_types = ProductType::all();
        return view('admin.product.create',compact('product_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $files = $request->file('multiple_images');

        // dd($files);
        $requestData = $request->all();
        $size = $request->size;
        $amount = $request->amount;

        // // 第二種取得檔案的方式，需新增private function fileUpload($file,$dir)
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $path = $this->fileUpload($file, 'news');  //$this表示NewsController自己本身
            $requestData['image_url'] = $path;
        }

        $product = Product::create($requestData);
        //將多個不同資料儲存在一起
        //要儲存的資料打包成陣列/物件
        $product_info = ['size'=>$size,'amount'=> $amount];
        //儲存剛建立的資料中
        $product ->product_info = json_encode($product_info);
        $product->save();

        //取得剛剛建立資料的id
        $product_id = $product->id;

        // 多圖上傳(使用第二種方式)
        if ($request->hasFile('multiple_images')) {
            $files = $request->file('multiple_images');
            foreach( $files as $file){
                $path = $this->fileUpload($file, 'product');
                ProductImg::create([
                    'img_url' => $path,
                    'product_id' => $product_id,
                ]);
            }

        }

        // Product::create($requestData);

        return redirect('/admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);
        // dd($product ->productImgs);
        $product_types = ProductType::all();
        // $productImgs = ProductImg::orderBy('sort','desc')->get();
        return view('admin.product.edit', compact('product','product_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $requestData = $request->all();

        if ($request->hasFile('image_url')) {
            $old_image = $product->image_url;
            File::delete(public_path() . $old_image);

            $file = $request->file('image_url');
            $path = $this->fileUpload($file, 'product');
            $requestData['image_url'] = $path;
        }

        $product->update($requestData);
        //快閃資料
        return redirect('/admin/product')->with('update','更新成功!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $old_image = $product->image_url;
        if (file_exists(public_path() . $old_image)) {
            File::delete(public_path() . $old_image);
        }
        $product->delete();

        return redirect('/admin/product');
    }

    private function fileUpload($file, $dir)
    {
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/')) {
            mkdir('upload/');
        }
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/' . $dir)) {
            mkdir('upload/' . $dir);
        }
        //取得檔案的副檔名
        $extension = $file->getClientOriginalExtension();
        //檔案名稱會被重新命名
        $filename = strval(time() . md5(rand(100, 200))) . '.' . $extension;
        //移動到指定路徑
        move_uploaded_file($file, public_path() . '/upload/' . $dir . '/' . $filename);
        //回傳 資料庫儲存用的路徑格式
        return '/upload/' . $dir . '/' . $filename;
    }
}
