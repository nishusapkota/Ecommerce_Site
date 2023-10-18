<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.css')
    <style>
      label{
        display: inline-block;
        width: 300px;
      }
    </style>
  </head>
  <body>
@include('admin.header')
<div class="main-panel">
    <div class="content-wrapper">
      <h1 style="text-align: center; font-size:25px; padding-bottom:15px;">Send Email to: {{$order->email}}</h1>
      <form action="{{route('sendEmail',$order->id)}}" method="post">
        @csrf
        <div style="text-align: center; padding-bottom:10px;">
          <label>Email Greetings:</label>
          <input type="text" name="greeting">
        </div>
        
        <div style="text-align: center;padding-bottom:10px;">
          <label>Email FirstLine:</label>
          <input type="text" name="firstline">
        </div>
        <div style="text-align: center;padding-bottom:10px;">
          <label>Email Body:</label>
          <input type="text" name="body">
        </div>
        <div style="text-align: center;padding-bottom:10px;">
          <label>Email Button Name:</label>
          <input type="text" name="button">
        </div>
        <div style="text-align: center;padding-bottom:10px;">
          <label>Email URL:</label>
          <input type="text" name="url">
        </div>
        <div style="text-align: center;padding-bottom:10px;">
          <label>Email LastLine:</label>
          <input type="text" name="lastline">
        </div>
        <div style="text-align: center;padding-left:200px;">
          <input type="submit" value="Send Email" class="btn btn-primary">
        </div>
      </form>


    </div>
</div>
    @include('admin.script')   
</body>
</html>
