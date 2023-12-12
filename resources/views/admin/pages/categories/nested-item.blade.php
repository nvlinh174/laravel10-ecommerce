<div class="list-group-item border border-0 py-0 px-0 @if ($item->depth > 1) ps-6 @endif mt-1 nested-{{ $item->depth }}"
    data-id="{{ $item->id }}">
    <div class="btn btn-outline-dark d-block w-100 text-start d-flex align-items-center">
        <div>
            {{-- <span class="badge bg-blue text-blue-fg badge-pill">{{ $item->depth }}</span> --}}
            {{ $item->name }}
            {{-- - {{ $item->id }} --}}
        </div>
        <div class="ms-auto d-flex align-items-center">
            <livewire:admin.general.switch-status :value="$item->status" model="Category" :id="$item->id" />
            <div class="actions">
                <a href="{{ route("{$routeNamePrefix}edit", ['category' => $item]) }}"
                    class="btn btn-outline-warning btn-sm">Sửa</a>
                <button type="button" class="btn btn-outline-danger btn-sm btnDelete">
                    Xóa
                    <form method="POST" class="d-none"
                        action="{{ route("{$routeNamePrefix}destroy", ['category' => $item]) }}">
                        @csrf
                        @method('DELETE')
                    </form>
                </button>
            </div>
        </div>
    </div>
    <div class="list-group border border-0 nested-sortable">
        @if ($item->children->count() > 0)
            @foreach ($item->children as $itemChild)
                @include('admin.pages.categories.nested-item', [
                    'item' => $itemChild,
                ])
            @endforeach
        @endif
    </div>
</div>
