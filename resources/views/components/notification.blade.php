<div>
    @if (Session::has('success'))
    <div class="bg-success text-light alert alert-success">
        <i class="fa fa-check" aria-hidden="true"></i> {{ Session::get('success') }}
        @php
            Session::forget('success');
        @endphp
    </div>
@endif

@if (Session::has('warning'))
    <div class="bg-warning text-light alert alert-success">
        <i class="fa fa-spin fa-refresh"></i> {{ Session::get('warning') }}
        @php
            Session::forget('warning');
        @endphp
    </div>
@endif


@if (Session::has('info'))
    <div class="bg-info text-light alert alert-success">
        <i class="fa fa-check" aria-hidden="true"></i> {{ Session::get('info') }}
        @php
            Session::forget('info');
        @endphp
    </div>
@endif

@if (Session::has('error'))
    <div class="bg-danger text-light alert alert-success">
        <i class="fa fa-check" aria-hidden="true"></i> {{ Session::get('danger') }}
        @php
            Session::forget('danger');
        @endphp
    </div>
@endif
</div>