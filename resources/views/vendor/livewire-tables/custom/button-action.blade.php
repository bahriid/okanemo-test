<div class="d-flex justify-content-center">
    <button class="btn btn-icon btn-light-primary btn-hover-primary btn-sm me-2" wire:click="$emit('edit_table', {{json_encode($row)}})">
        <i class="ki-duotone ki-notepad-edit">
            <i class="path1"></i>
            <i class="path2"></i>
        </i>
    </button>
    <button class="btn btn-icon btn-light-danger btn-hover-danger btn-sm" wire:click="$emit('delete_table', {{json_encode($row)}})">
        <i class="ki-duotone ki-cross-square">
            <i class="path1"></i>
            <i class="path2"></i>
        </i>
    </button>
</div>
