<?php

namespace App\Services\Product;

use App\Models\Category;
use App\Models\Product;
use App\Utilities\Helpers;
use DB;
use Illuminate\Support\Facades\Validator;

class ProductService
{

    public function rulesCreate($data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string'],
            'category_id' => ['required', 'exists:categories,id', 'integer'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['required', 'string'],
            'image' => 'image|sometimes|nullable|mimes:jpg,png,jpeg|max:512',
        ], [], [
            'name' => 'Product Name',
            'category_id' => 'Category',
            'price' => 'Price',
            'description' => 'Description',
            'image' => 'Image',
        ])->validate();
    }

    public function rulesUpdate($data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string'],
            'id' => ['required', 'exists:products,id', 'integer'],
            'category_id' => ['required', 'exists:categories,id', 'integer'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['required', 'string'],
            'image' => 'image|sometimes|nullable|mimes:jpg,png,jpeg|max:512',
        ], [], [
            'name' => 'Product Name',
            'category_id' => 'Category',
            'price' => 'Price',
            'description' => 'Description',
        ])->validate();
    }

    public function create($request): array
    {
        $data = $this->rulesCreate($request);
        try {
            DB::beginTransaction();

            $data = Product::create([
                'name' => $data['name'],
                'image' => Helpers::uploadImage('product', $data['image']),
                'category_id' => $data['category_id'],
                'price' => $data['price'],
                'description' => $data['description'],
            ]);

            DB::commit();
            return [
                'status' => true,
                'message' => 'Product Stored Successfully',
                'data' => $data,
            ];
        } catch (\Throwable $th) {
            DB::rollBack();

            return [
                'status' => false,
                'message' => $th->getMessage(),
            ];
        }
    }

    public function update($request): array
    {
        $data = $this->rulesUpdate($request);
        try {
            DB::beginTransaction();
            $product = Product::where('id', $data['id'])->first();
            if ($data['image']) {
                $product['image'] = Helpers::uploadImage('product', $data['image']);
            }
            $product['name'] = $data['name'];
            $product['category_id'] = $data['category_id'];
            $product['price'] = $data['price'];
            $product['description'] = $data['description'];
            $product->save();

            DB::commit();
            return [
                'status' => true,
                'message' => 'Product Updated Successfully',
                'data' => $product,
            ];
        } catch (\Throwable $th) {
            DB::rollBack();

            return [
                'status' => false,
                'message' => $th->getMessage(),
            ];
        }
    }

    public function delete($request): array
    {
        try {
            DB::beginTransaction();

            Product::where('id', $request['id'])->delete();

            DB::commit();
            return [
                'status' => true,
                'message' => 'Product Deleted Successfully',
                'data' => null,
            ];
        } catch (\Throwable $th) {
            DB::rollBack();

            return [
                'status' => false,
                'message' => $th->getMessage(),
            ];
        }
    }
}
