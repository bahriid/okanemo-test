<div>
    <div class="text-center">
        <label class="fw-semibold fs-6 mb-2">{{ $label }}</label>
    </div>
    <div class="frame d-flex justify-content-center align-items-center flex-column mb-5">
        <div {{ $attributes->merge(['class' => 'border bg-light rounded']) }}>
            @if($image)
                <img src="{{ $image->temporaryUrl() }}" class="w-100 h-100 rounded" style="object-fit:contain">
            @else
                <img src="{{ $thumbnail }}" class="w-100 h-100 rounded" style="object-fit:contain">
            @endif
        </div>
        {{ $help_text }}
    </div>
    <div wire:ignore.self>
        <input type="file" wire:model.defer="{{ $model }}"
               class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" accept="image/*">
    </div>
    <div class="form-control form-control-solid form-control-lg mt-2" wire:loading wire:target="{{ $model }}">
        <div class="d-flex align-items-center">
            <strong>Memproses...</strong>
            <span class="spinner-border spinner-border-sm ms-auto"></span>
        </div>
    </div>
    <div class="frame d-flex justify-content-center mb-5">
        @if($image)
            <span wire:click="{{ $remove }}" class="btn btn-sm btn-danger mt-3 me-2">Hapus</span>
        @endif
    </div>
    <div class="text-center">
        @error($model)
        <p class="text-danger mt-1 ms-1 fw-bold mb-2">{{ $message }}</p>
        @enderror
    </div>
</div>
