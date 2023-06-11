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
                    <span class="card-label fw-bold fs-3 mb-1">Product List</span>
                </h3>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end">
                    <!--begin::Add user-->
                    <a href="{{route('product.create')}}" class="btn btn-primary">
                        <i class="ki-outline ki-plus fs-2"></i>Add Product
                    </a>
                    <!--end::Add user-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <div class="card-body py-4">
            <livewire:product.table/>
        </div>
    </div>
</div>
