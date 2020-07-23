@component('mail::message')
{{--Welcome Mr {{$employee->name}}--}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
