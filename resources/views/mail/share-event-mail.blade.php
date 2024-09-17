@component('mail::message')
    ## Details

    - **Message:** {{ $data->message }}
    - **Code:** {{ $data->code }}
    - **Link:** {{ $data->register_event_url }}
@endcomponent
