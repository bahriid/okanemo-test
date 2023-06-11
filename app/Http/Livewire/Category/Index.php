<?php

namespace App\Http\Livewire\Category;

use App\Services\Category\CategoryService;
use Livewire\Component;

class Index extends Component
{
    public $modal_id = 'modal-category';
    public $is_edit = false;
    public $_id;

    public $name;

    protected $listeners = [
        'edit_table',
        'delete_table'
    ];


    public function delete_table($data, CategoryService $category): void
    {
        $payload = $category->delete($data);

        if ($payload['status']) {
            $this->emit('re_render_table');
            session()->flash('success', $payload['message']);
        } else {
            session()->flash('error', $payload['message']);
        }
    }

    public function edit_table($data): void
    {
        $this->is_edit = true;
        $this->name = $data['name'];
        $this->_id = $data['id'];

        $this->dispatchBrowserEvent('modal-show', ['modal' => $this->modal_id]);
    }

    public function render()
    {
        return view('category.index')->layoutData([
            'title' => 'Category Product',
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
                'label' => 'Category',
            ],
        ];
    }

    public function reset_field(): void
    {
        $this->resetErrorBag();
        $this->name = null;
    }

    public function openModal($mode = 'create'): void
    {
        if ($mode == 'create') {
            $this->reset_field();
            $this->is_edit = false;
        } else {
            $this->is_edit = true;
            $this->resetErrorBag();
        }
        $this->dispatchBrowserEvent('modal-show', ['modal' => $this->modal_id]);
    }

    public function closeModal(): void
    {
        $this->reset_field();
        $this->dispatchBrowserEvent('modal-hide', ['modal' => $this->modal_id]);
    }

    public function submit(): void
    {
        if ($this->is_edit) {
            $payload = (new CategoryService())->update([
                'name' => $this->name,
                'id' => $this->_id,
            ]);
        } else {
            $payload = (new CategoryService())->create([
                'name' => $this->name,
            ]);
        }

        if ($payload['status']) {
            $this->resetErrorBag();
            $this->closeModal();
            $this->emit('re_render_table');
            session()->flash('success', $payload['message']);
        } else {
            session()->flash('error', $payload['message']);
        }
    }
}

