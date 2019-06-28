<div class="{{ $width }}">

    <div class="form-group {{ ($errors->has($name)) ? 'has-error' : ""}}">

        <label for="{{ $name }}" class="control-label">{{ $label }}</label>

        <input type="{{ $type }}" id="{{ $name }}" value="{{ $value }}"
               name="{{ $name }}" class="form-control border-dark"
               placeholder="{{ $label }}" {{ $attribute }}>

        @if($errors->has( $name ))
            <div class="alert alert-danger mt-5" role="alert">
                <span class="text-danger">{{ $errors->first( $name ) }}</span>
            </div>
        @endif
    </div>

</div>
