<div class="checkbox pull-left ml-15 mt-15">
    <label for="{{ $name }}">
        @if(isset($services) && in_array($name,$services))
            <input id="{{ $name }}" name="{{ $name }}" checked type="checkbox">
            {{ $label }}
        @else
            <input id="{{ $name }}" name="{{ $name }}" {{ (old($name)) ? 'checked' : "" }} type="checkbox">
            {{ $label }}
        @endif
    </label>
</div>