<datepicker
    @if ($value !== '')
        :value="new Date('{{ $value }}')"
    @endif
    format="yyyy-MM-dd"
    id="{{ $name }}"
    input-class="form-control @error($name) is-invalid @enderror"
    name="{{ $name }}"
    placeholder="Select date"
    :disabled-dates="{ 'days': [6, 0] }"
    :full-month-name="true"
    :monday-first="true"
>
</datepicker>
