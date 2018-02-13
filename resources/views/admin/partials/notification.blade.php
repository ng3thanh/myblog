
@if (session()->has('info'))
    <div class="admin_notification">
        <div class="callout callout-info">
            <h4>Info!</h4>

            <p>{{ session()->get('info') }}</p>
        </div>
    </div>
@endif

@if (session()->has('warning'))
    <div class="admin_notification">
        <div class="callout callout-warning">
            <h4>Warning!</h4>

            <p>{{ session()->get('warning') }}</p>
        </div>
    </div>
@endif

@if (session()->has('success'))
    <div class="admin_notification">
        <div class="callout callout-success">
            <h4>Success!</h4>

            <p>{{ session()->get('success') }}</p>
        </div>
    </div>
@endif

@if (session()->has('danger'))
    <div class="admin_notification">
        <div class="callout callout-danger">
            <h4>Error!</h4>

            <p>{{ session()->get('danger') }}</p>
        </div>
    </div>
@endif