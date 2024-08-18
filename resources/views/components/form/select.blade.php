@props([
  'name', 
  'value' => [], 
  'label' => false, 
  'options' => [], 
])

@if ($label)
    <label for="{{ $name }}">{{ $label }}</label>
@endif

<select multiple
       name="{{ $name }}[]"
       {{ $attributes->class([
        'custom-select my-1 mr-sm-2',
        'is-invalid' => $errors->has($name)
       ]) }}>
    <option selected disabled>Choose...</option>
    @foreach ($options as $optionValue => $optionLabel)
        <option value="{{ $optionValue }}" >
            {{ $optionLabel }}
        </option>
    @endforeach
</select>

@error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror
