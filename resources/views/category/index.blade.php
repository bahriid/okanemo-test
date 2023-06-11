<div>
    <div>
        <x-alert.notification/>
    </div>
    <div class="card">
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Category Product List</span>
                </h3>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end">
                    <!--begin::Add user-->
                    <button type="button" class="btn btn-primary" wire:click="openModal">
                        <i class="ki-outline ki-plus fs-2"></i>Add Product
                    </button>
                    <!--end::Add user-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <div class="card-body py-4">
            <livewire:category.table/>
        </div>
    </div>

    <!--begin::Modal - Add task-->
    <div class="modal fade" id="{{$modal_id}}" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold">Add Category</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" wire:click="closeModal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body">
                    <!--begin::Form-->
                    <form id="kt_modal_add_user_form" class="form" wire:submit.prevent="submit">
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <label class="required fs-6 fw-semibold mb-2">Name</label>
                            <input type="text" wire:model.defer="name"
                                   class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"/>
                            @error('name')
                            <p class="text-danger mt-1 ms-1 fw-bold mb-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="text-center pt-15">
                            <button type="button" class="btn btn-light me-3" wire:click="closeModal">Discard</button>
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Add task-->
</div>
