<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use App\Services\Product\ProductService;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $categories;
    public $category_id;
    public $price;

    public $descriptions;
    public $thumbnail;

    public $thumb_thumbnail;

    public function mount()
    {
        $this->categories = Category::all();
        $this->thumb_thumbnail = asset('assets/media/misc/500x300.jpg');
    }

    public function render()
    {
        return view('product.create')->layoutData([
            'title' => 'Product Create',
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
                'label' => 'Product Create',
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
        $payload = $product->create([
            'name' => $this->name,
            'category_id' => $this->category_id,
            'price' => $this->price,
            'description' => $this->descriptions,
            'image' => $this->thumbnail,
        ]);

        if ($payload['status']) {
            $this->resetErrorBag();
            session()->flash('success', $payload['message']);
            sleep(1);
            redirect()->route('product.index');
        } else {
            session()->flash('error', $payload['message']);
        }

    }
}
