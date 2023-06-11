<ul class="breadcrumb breadcrumb-separatorless fs-7 fw-semibold my-0 pt-1">
    @foreach ($list as $data)
        @if ($loop->last)
            <li class="breadcrumb-item text-dark">{{ $data['label'] }}</li>
        @else
            <li class="breadcrumb-item text-muted">
                <a href="{{ $data['link'] }}" class="text-muted text-hover-primary">{{ $data['label'] }}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-400 w-5px h-2px"></span>
            </li>
        @endif
    @endforeach
</ul>
