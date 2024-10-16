@if (session('success'))
<x-alert id="success-alert" type="success" :message="session('success')" />
@endif

@if (session('error'))
    <x-alert id="error-alert" type="error" :message="session('error')" />
@endif

@if (session('warning'))
    <x-alert id="warning-alert" type="warning" :message="session('warning')" />
@endif

@if (session('info'))
    <x-alert id="info-alert" type="info" :message="session('info')" />
@endif