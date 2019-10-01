@component('mail::message')
# Join To It

Thank you for you registration company - "{{$data['name']}}"  in our Web-Service <br />
<strong>Company: </strong> {{$data['name']}}<br />
<strong>Email: </strong>   {{$data['email']}}<br />
<strong>WebSite: </strong> {{$data['website']}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
