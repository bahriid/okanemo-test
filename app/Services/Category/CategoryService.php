<?php

namespace App\Services\Category;

use App\Models\Category;
use App\Models\Product;
use DB;
use Illuminate\Support\Facades\Validator;

class CategoryService
{

    public function rulesCreate($data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string'],
        ], [], [
            'name' => 'Category Name',
        ])->validate();
    }
    public function rulesUpdate($data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string'],
            'id' => ['required', 'exists:categories,id'],
        ], [], [
            'name' => 'Category Name',
        ])->validate();
    }

    public function create($request): array
    {
        $data = $this->rulesCreate($request);
        try {
            DB::beginTransaction();

            $data = Category::create($data);

            DB::commit();
            return [
                'status' => true,
                'message' => 'Category Stored Successfully',
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

            $data = Category::where('id', $data['id'])->update($data);

            DB::commit();
            return [
                'status' => true,
                'message' => 'Category Updated Successfully',
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

    public function delete($request): array
    {
        try {
            DB::beginTransaction();

            $product = Product::where('category_id', $request['id'])->exists();

            if ($product) {
                throw new \Exception('Cant Delete Category, Category used by Product!');
            }

            Category::where('id', $request['id'])->delete();

            DB::commit();
            return [
                'status' => true,
                'message' => 'Category Deleted Successfully',
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
