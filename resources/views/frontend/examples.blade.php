@extends('frontend.general_layout')

@section('content')


<div class="container">
  {{$step = 'test'}}
  @if(!$step)
    Konversation suchen
    <form action="#" method="post">
      @csrf

    <input type="number" name="ConvID"> Konversationsid
    <input type="text" name="key"> Key
    <input type="submit" > Absenden

@endif
<Chat user="@if($step) 1 @else 0 @endif"></Chat>
</div>
@endsection

@section('additional_js')
<script>
console.log()

</script>
@endsection
