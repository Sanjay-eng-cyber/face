@component('mail::message')
    ## Details

    - **Code:** {{ $data->code }}
    - **Message:** {{ $data->message }}
    - **Link:** {{ $data->register_event_url }}
@endcomponent
