<div class="{{ $width }}">
    <div class="form-group{{ ($errors->has($name)) ? 'has-error' : ""}}">
        <label for="{{ $name }}" class="control-label">{{ $label }}</label><br>
        <img id="img_change" style="max-width: 100px"
             src="{{ (isset($value)) ? asset('storage/' . $value) : asset('images/placeholder.png') }}">
        <input type="file" name="{{ $name }}"
               id="listenToChange" class="form-control-file"
                {{ (isset($attribute)) ? $attribute : '' }}
        >
        @if($errors->has( $name ))
            <div class="alert alert-danger mt-5" role="alert">
                <span class="text-danger">{{ $errors->first( $name ) }}</span>
            </div>
        @endif
    </div>
</div>

<script>
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img_change').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#listenToChange").change(function () {
        readURL(this);
    });
</script>