@extends('frontend.layouts.app')
@section('title')
@section('content')
<div class="pin-container">
    <div class="pin-title">Enter Your Pin Number</div>
    <div class="d-flex justify-content-center">
      <input type="text" maxlength="1" class="pin-input" placeholder="0"/>
      <input type="text" maxlength="1" class="pin-input" placeholder="0"/>
      <input type="text" maxlength="1" class="pin-input" placeholder="0"/>
      <input type="text" maxlength="1" class="pin-input" placeholder="0"/>
      <input type="text" maxlength="1" class="pin-input" placeholder="0"/>
      <input type="text" maxlength="1" class="pin-input" placeholder="0"/>
    </div>
    <button type="button" class="submit-btn">Submit</button>
  </div>

@endsection
@section('js')
<script>
    const pinInputs = document.querySelectorAll('.pin-input');

    pinInputs.forEach((input, index) => {
      input.addEventListener('input', (e) => {
        // Agar input mein ek character hai, to next input field pe focus transfer karte hain
        if (e.target.value.length === 1 && index < pinInputs.length - 1) {
          pinInputs[index + 1].focus();
        }
      });

      input.addEventListener('keydown', (e) => {
        // Agar user backspace press kare aur pichle input pe jana ho to
        if (e.key === 'Backspace' && e.target.value === '' && index > 0) {
          pinInputs[index - 1].focus();
        }
      });
    });
  </script>
@endsection
