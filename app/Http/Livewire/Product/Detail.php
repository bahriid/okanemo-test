<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use App\Services\Product\ProductService;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;

class Detail extends Component
{
    use WithFileUploads;

    public $product;

    public $name;
    public $categories;
    public $category_id;
    public $price;

    public $descriptions;
    public $thumbnail;

    public $thumb_thumbnail;

    public function mount($id)
    {
        $this->product = Product::find($id);
        if(!$this->product){
            abort(404);
        }

        $this->categories = Category::all();
        $this->name = $this->product->name;
        $this->price = (float) $this->product->price;
        $this->descriptions = $this->product->description;
        $this->category_id = $this->product->category_id;
        $this->thumb_thumbnail = asset($this->product->image);
    }

    public function render()
    {
        return view('product.create')->layoutData([
            'title' => 'Product Detail',
            'breadcrumb' => $this->breadcrumb()
        ]);
    }

    public function breadcrumb(): array
    {
        return [
            [
                'label' => 'Home',
                'link' => route('home'),
            ],
            [
                'label' => 'Product',
                'link' => route('product.index'),
            ],
            [
                'label' => 'Product Detail',
            ],
        ];
    }

    public function updatingThumbnail($thumbnail)
    {
        $req['thumbnail'] = $thumbnail;

        Validator::make($req, [
            'thumbnail' => 'image|sometimes|nullable|mimes:jpg,png,jpeg|max:512',
        ])->validate();
    }

    public function remove_thumbnail()
    {
        $this->thumbnail = null;
    }

    public function submit(ProductService $product): void
    {
        $payload = $product->update([
            'name' => $this->name,
            'id' => $this->product->id,
            'category_id' => $this->category_id,
            'price' => $this->price,
            'description' => $this->descriptions,
            'image' => $this->thumbnail,
        ]);

        if ($payload['status']) {
            $this->resetErrorBag();
            session()->flash('success', $payload['message']);
        } else {
            session()->flash('error', $payload['message']);
        }

    }
}
