<div class="{{ $width }}">

    <div class="form-group {{ ($errors->has($name)) ? 'has-error' : ""}}">

        <label for="{{ $name }}" class="control-label">{{ $label }}</label>

        <select name="{{ $name }}" id="{{ $name }}"
                class="form-control border-dark" {{ $attribute }}>
            @guest
                @if(!old('gender'))
                    <option value disabled selected>Gender</option>
                @endif
                <option value="1" {{ (old('gender') === '1') ? 'selected' : '' }}>Homme</option>
                <option value="0" {{ (old('gender') === '0') ? 'selected' : '' }}>Femme</option>
                @else
                    @if(!old('gender'))
                        <option value="1" {{ (auth()->user()->real->gender) ? 'selected' : '' }}>Homme</option>
                        <option value="0" {{ (!auth()->user()->real->gender) ? 'selected' : '' }}>Femme</option>
                    @else
                        <option value="1" {{ (old('gender') === '1') ? 'selected' : '' }}>Homme</option>
                        <option value="0" {{ (old('gender') === '0') ? 'selected' : '' }}>Femme</option>
                    @endif
                    @endguest
        </select>

        @if($errors->has( $name ))
            <div class="alert alert-danger mt-5" role="alert">
                <span class="text-danger">{{ $errors->first( $name ) }}</span>
            </div>
        @endif
    </div>

</div>