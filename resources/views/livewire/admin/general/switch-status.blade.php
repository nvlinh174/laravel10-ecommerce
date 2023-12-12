<label class="form-check form-switch mb-0">
    <input class="form-check-input" type="checkbox" value="{{ $value }}"
        @if ($value) checked @endif wire:model.live="value" />
</label>
