<div>
    <div>
        <x-alert.notification/>
        <x-alert.validation/>
    </div>
    <div class="card">
        <div class="card-header border-1">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">
                        Create Product</span>
                </h3>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end">
                    <!--begin::Add user-->
                    <button type="button" class="btn btn-primary" wire:click="submit">
                        <i class="ki-outline ki-plus fs-2"></i>Save Product
                    </button>
                    <!--end::Add user-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <div class="card-body p-4 d-flex flex-column">
            <div class="row mb-6 d-flex justify-content-center align-items-center flex-column">
                <div class="col-lg-6">
                    <x-base.image-upload label="Produk Image" :image="$thumbnail"
                                         :thumbnail="$thumb_thumbnail"
                                         model="thumbnail" remove="remove_thumbnail" class="w-250px h-150px">
                        <x-slot name="help_text">
                            <p class="text-muted mt-8 mb-0">* Maksimum ukuran gambar: 512KB</p>
                            <p class="text-muted mt-2 mb-0">* Tipe file: jpg, jpeg, png.</p>
                        </x-slot>
                    </x-base.image-upload>
                </div>
                <div class="col-lg-8 row mt-5">
                    <label class="col-lg-3 col-form-label fw-semibold fs-6 required">Name</label>
                    <div class="col-lg-9">
                        <input type="text" wire:model.defer="name"
                               class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                               placeholder="Name"/>
                        @error('name')
                        <p class="text-danger mt-1 ms-1 fw-bold mb-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-8 row mt-5">
                    <label class="col-lg-3 col-form-label fw-semibold fs-6 required">Category</label>
                    <div class="col-lg-9">
                        <select class="form-select form-select-solid fw-semibold" wire:model.defer="category_id">
                            <option value="">Choose Category</option>
                            @forelse($categories as $data)
                                <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                            @empty
                                <option value="">Category Product Empty</option>
                            @endforelse
                        </select>
                        @error('category_id')
                        <p class="text-danger mt-1 ms-1 fw-bold mb-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-8 row mt-5">
                    <label class="col-lg-3 col-form-label fw-semibold fs-6 required">Price</label>
                    <div class="col-lg-9">
                        <x-base.currency-input type="text" wire:model.defer="price" placeholder="Rp. 0"
                                               class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 text-end"/>
                        @error('price')
                        <p class="text-danger mt-1 ms-1 fw-bold mb-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-8 row mt-5">
                    <label class="col-lg-3 col-form-label fw-semibold fs-6 required">Description</label>
                    <div class="col-lg-9">
                        <textarea wire:model.defer="descriptions"
                                  class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                  placeholder="Descriptions"></textarea>
                        @error('descriptions')
                        <p class="text-danger mt-1 ms-1 fw-bold mb-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
