@extends('layouts.default')
@section('title', $book->name)
@section('content')
<div class="row">
  <div class="col-md-offset-1 col-md-10 panel panel-default">
      @include('books._book_info', ['book' => $book])
  </div>
</div>

<!--PC和WAP自适应版-->
    <div class="panel panel-default col-md-12">
        <div id="SOHUCS" sid="book_comment_{{ $book->id }}" ></div>
    </div>
    <script type="text/javascript">
        (function(){
            var appid = 'cytcmrKfy';
            var conf = 'prod_c166102c81bde2ffeca0f02bbb4d6957';
            var width = window.innerWidth || document.documentElement.clientWidth;
            if (width < 960) {
                window.document.write('<script id="changyan_mobile_js" charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/mobile/wap-js/changyan_mobile.js?client_id=' + appid + '&conf=' + conf + '"><\/script>'); } else { var loadJs=function(d,a){var c=document.getElementsByTagName("head")[0]||document.head||document.documentElement;var b=document.createElement("script");b.setAttribute("type","text/javascript");b.setAttribute("charset","UTF-8");b.setAttribute("src",d);if(typeof a==="function"){if(window.attachEvent){b.onreadystatechange=function(){var e=b.readyState;if(e==="loaded"||e==="complete"){b.onreadystatechange=null;a()}}}else{b.onload=a}}c.appendChild(b)};loadJs("https://changyan.sohu.com/upload/changyan.js",function(){window.changyan.api.config({appid:appid,conf:conf})}); } })();
    </script>
@stop
