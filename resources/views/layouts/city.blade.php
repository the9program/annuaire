<div class="{{ $width }}">
    <div class="form-group {{ ($errors->has('city_id')) ? 'has-error' : ""}}">
        <label for="city"
               class="control-label">{{ ucfirst(__('validation.attributes.city')) . ' *:' }}</label>
        <select name="city_id" id="city" class="form-control" required>
            @if(!old('city_id') && !isset($city))
                <option value selected disabled>{{ ucfirst(__('validation.attributes.city')) }}</option>
            @endif
            @foreach(\App\City::all() as $cities)
                <option value="{{ $cities->id }}"
                        @if(old('city_id') && (old('city_id') == $cities->id))
                        selected
                        @else
                        @if(isset($city) && $city->id == $cities->id)
                        selected
                        @endif
                        @endif>{{ ucfirst($cities->city) }}</option>
            @endforeach
        </select>
        @if ($errors->has('city_id'))
            <div class="alert alert-danger mt-5" role="alert">
                <span class="text-danger">{{ $errors->first( 'city_id' ) }}</span>
            </div>
        @endif
    </div>
</div>