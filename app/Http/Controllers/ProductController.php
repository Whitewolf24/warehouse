<?php
 namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
class ProductController extends Controller{
public function index(){
$products=Cache::remember('products_paginated',600,function(){
return Product::paginate(10);
}
);
return view('product.index',compact('products'));
}
public function showForm(){
return view('product.add');
}
public function saveProduct(Request $request){
$types=['val1'=>'DVD','val2'=>'Book','val3'=>'Furniture',];
$productType=$types[$request->productType]?? null;
$rules=$this->getValidationRules($productType);
$validated=$request->validate($rules);
$price=$validated['price'].' $';
$weight=$productType==='Book'?$this->formatWeight($validated['weight']?? null):null;
$dimensions=$productType==='Furniture'?$this->formatDimensions($validated):null;
$size=$productType==='DVD'?$this->formatSize($validated['size']?? null):null;
Product::create([
    'sku' => $validated['sku'],
    'name' => $validated['name'],
    'price' => $price,
    'size' => $size,
    'weight' => $weight,
    'dimensions' => $dimensions,
    'height' => $validated['height'] ?? null,
    'width' => $validated['width'] ?? null,
    'length' => $validated['length'] ?? null,
]);Cache::forget('products_paginated');
return redirect()->route('product.index')->with('success','Product added successfully!');
}
public function massDelete(Request $request){
if(!is_array($request->ids)||empty($request->ids)){
return redirect()->route('product.index')->with('error','No products selected for deletion');
}
Product::whereIn('id',$request->ids)->delete();
Cache::forget('products_paginated');
return redirect()->route('product.index')->with('success','Selected products deleted successfully');
}
private function getValidationRules($productType){
return['sku'=>'required|string|max:255|unique:stock','name'=>'required|string|max:255','price'=>'required|numeric|min:0','size'=>$productType==='DVD'?'required|numeric|min:0':'nullable','weight'=>$productType==='Book'?'required|numeric|min:0':'nullable','height'=>$productType==='Furniture'?'required|numeric|min:0':'nullable','width'=>$productType==='Furniture'?'required|numeric|min:0':'nullable','length'=>$productType==='Furniture'?'required|numeric|min:0':'nullable',];
}
private function formatWeight($weight){
return $weight?$weight.' kg':null;
}
private function formatDimensions($data){
return implode('x',[$data['height']?? 0,$data['width']?? 0,$data['length']?? 0,]);
}
private function formatSize($size){
return $size?$size.' MB':null;
}
}
