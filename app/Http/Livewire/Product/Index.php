<?php

namespace App\Http\Livewire\Product;

use App\Services\Product\ProductService;
use Livewire\Component;

class Index extends Component
{
    public $modal_id = 'modal-product';

    protected $listeners = [
        'edit_table',
        'delete_table'
    ];

    public function delete_table($data, ProductService $product): void
    {
        $payload = $product->delete($data);

        if ($payload['status']) {
            $this->emit('re_render_table');
            session()->flash('success', $payload['message']);
        } else {
            session()->flash('error', $payload['message']);
        }
    }

    public function edit_table($data): void
    {
       redirect()->route('product.detail', ['id' => $data['id']]);
    }

    public function render()
    {
        return view('product.index')->layoutData([
            'title' => 'Product',
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
            ],
        ];
    }


}

