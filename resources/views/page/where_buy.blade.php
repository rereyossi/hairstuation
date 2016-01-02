@extends('template_user.main')
@section('content')
<div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8" style="margin-top:50px;" align="center">
      	<img src="{{ url('images/separatetop.png') }}" style="margin-bottom:50px;">
      	<p>Available At:</p>
        <p>Salons: Selected hair salons in California, New York and New Jersey</p>
        <p><a href="http://www.cvs.com/stores" target="_blank">CVS /Pharmacy</a></p>
        <p><a href="http://www.amazon.com/" target="_blank">Amazon.com</a></p>
        <p><a href="http://www.ebay.com/" target="_blank">Ebay.com</a></p>
        <img src="{{ url('images/separatebottom.png') }}" style="margin-top:50px;">
      </div>
      <div class="col-md-2"></div>
    </div>
    @stop
