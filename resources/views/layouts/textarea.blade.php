<div class="{{ $width }}">

    <div class="form-group {{ ($errors->has($name)) ? 'has-error' : ""}}">

        <label for="{{ $name }}" class="control-label">{{ $label }}</label>

        <textarea name="{{ $name }}" style="height: 150px" id="{{ $name }}" {{ $attribute }}
        class="form-control"
                  placeholder="{{ $label }}">{{ $value }}</textarea>

        @if($errors->has( $name ))
            <div class="alert alert-danger mt-5" role="alert">
                <span class="text-danger">{{ $errors->first( $name ) }}</span>
            </div>
        @endif

    </div>

</div>