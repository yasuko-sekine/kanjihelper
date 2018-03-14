<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>幹事Helper</title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
        <style>
            /* body */
            body {
                background: #f2f2f2;
            }
            footer {
                margin-top: 40px;
            }
            
            /* navbar */
            .navbar {
                background-color: #fff;
            }
            .navbar-header img {
                margin-top: 5px;
                height: 40px;
            }
            
            .btn-primary {
                margin: 20px;
                background-color: #ff6666;
                border-color: #ff6666;
            }
            /* search */
            .search {
                margin-bottom: 50px;
            }
            
            /* item */
            .rest .panel-body {
                height: 150px;
            }
            .rest .panel-heading {
                height: 200px;
            }
            .rest .panel-heading img {
                height: 100%;
                max-width: 100%;
            }
            p.rest-title {
                /* 文の行数を2行に保ち、最後に ... を追加するスタイル */
                display: -webkit-box;
                -webkit-box-orient: vertical;
                -webkit-line-clamp: 10;
                overflow: hidden;
            }
            
            a:hover {
              color: #ff6666;
            }
            
            a:active {
              color: #ff00ff;
            }
        
            #target {
                margin: 0 auto;
                margin-top: 50px;
                margin-bottom: 50px;
                width: 550px;
                height: 200px;
            }
        </style>
    </head>
    <body>
      @include('commons.navbar')
      
      <div id="target"></div>
      
      <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyA0bDtdfUX5XlnUH_W9hONVb1ZOEwW-D_c&callback=initMap"
        async defer></script>
      <script>
        function initMap() {
          'use strict';
          
          var target = document.getElementById('target');
          
          if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(
                  function(position) {
                      var mapLatLng = new google.maps.LatLng(position.coords.latitude,
                      position.coords.longitude);
                      var mapOptions = {
                          center : mapLatLng,
                          zoom : 15,
                          disableDefaultUI:true,
                          zoomControl: true
                      };
                      var map = new google.maps.Map(
                          target,
                          mapOptions
                      );
                      var marker = new google.maps.Marker({
                          map:map,
                          position : mapLatLng,
                          title:"現在地"
                      });
                  },
                  
                  function(error) {
                      switch(error.code) {
                        case 1: // PERMISSION_DENIED
                          alert("位置情報の利用が許可されていません");
                          break;
                        case 2: // POSITION_UNAVAILABLE
                          alert("現在位置が取得できませんでした");
                          break;
                        case 3: // TIMEOUT
                          alert("タイムアウトになりました");
                          break;
                        default:
                          alert("その他のエラー(エラーコード:"+error.code+")");
                          break;
                      }
                    }
                  );
                } else {
                  alert("この端末では位置情報が取得できません");
                }
            }
      </script>
      
      
      @include('commons.footer')
    </body>
</html>  

    


