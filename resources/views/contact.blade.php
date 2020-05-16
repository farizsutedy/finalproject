@extends('template/home')

@section('design')
<link rel="stylesheet" href=" /css/contact.css">
@endsection

@section('container')
<div class="wrapper">
  <form method="post" action="" class="ccform">
    <div class="ccfield-prepend">
      <span class="ccform-addon"><i class="fa fa-user fa-2x"></i></span>
      <input class="ccformfield" type="text" placeholder="Full Name" required>
    </div>
    <div class="ccfield-prepend">
      <span class="ccform-addon"><i class="fa fa-envelope fa-2x"></i></span>
      <input class="ccformfield" type="text" placeholder="Email" required>
    </div>
    <div class="ccfield-prepend">
      <span class="ccform-addon"><i class="fa fa-mobile-phone fa-2x"></i></span>
      <input class="ccformfield" type="text" placeholder="Phone">
    </div>
    <div class="ccfield-prepend">
      <span class="ccform-addon"><i class="fa fa-info fa-2x"></i></span>
      <input class="ccformfield" type="text" placeholder="Subject" required>
    </div>
    <div class="ccfield-prepend">
      <span class="ccform-addon"><i class="fa fa-comment fa-2x"></i></span>
      <textarea class="ccformfield" name="comments" rows="8" placeholder="Message" required></textarea>
    </div>
    <div class="ccfield-prepend">
      <input class="ccbtn" type="submit" value="Submit">
    </div>
  </form>
</div>
@endsection