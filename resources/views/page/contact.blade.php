@extends('template_user.main')
@section('content')

<div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" style="margin-top:50px;" align="center">
      	<img src="{{ url('images/separatetop.png') }}" style="margin-bottom:50px;">
        <h3><span style="color:#f7941d;">Hair </span>Situation</h3>
        <span>&nbsp;</span>
        <p>1086 Teaneck Road</p>
        <p>Teaneck New Jersey 07666</p>
        <p><a href="mailto:info@hairsituation.com">info@hairsituation.com</a></p>
        <img src="{{ url('images/separatebottom.png') }}" style="margin-top:50px;">
      </div>
      <div class="col-md-4"></div>
    </div>
    @stop
