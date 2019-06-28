@if (session('success'))
    <div class="alert alert-success alert-dismissible mt-5" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        {!! session('success') !!}
    </div>
@endif
@if (session('danger'))
    <div class="alert alert-danger alert-dismissible mt-5" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        {!! session('danger') !!}
    </div>
@endif
@if (session('warning'))
    <div class="alert alert-warning alert-dismissible mt-5" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        {!! session('warning') !!}
    </div>
@endif
@if (session('info'))
    <div class="alert alert-info alert-dismissible mt-5" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        {!! session('info') !!}
    </div>
@endif