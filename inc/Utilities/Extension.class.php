<?php

    class DropOff
    {

        static function fail($msg )
        {
            echo '<div class="offcanvas show bg-danger offcanvas-top text-white text-small message" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                <div class="offcanvas-header m-0 p-1 justify-content-center">
                  <span id="offcanvasTopLabel m-0 text-small">'.$msg.'</span>
                </div>
              </div>
              <script>
              setTimeout(function() 
              {
              $(".offcanvas-backdrop").css("display", "none");
              $(".offcanvas").css("display", "none");
              $("body").css("overflow","auto");
              $("body").css("padding-right","0px");
              },3000);
              </script>';
        }

        static function sucessful($msg )
        {
            echo '<div class="offcanvas show bg-success offcanvas-top text-white text-small message" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                <div class="offcanvas-header m-0 p-1 justify-content-center">
                  <span id="offcanvasTopLabel m-0 text-small">'.$msg.' </span>
                </div>
              </div>
              <script>
              setTimeout(function() 
              {
              $(".offcanvas-backdrop").css("display", "none");
              $(".offcanvas").css("display", "none");
              $("body").css("overflow","auto");
              $("body").css("padding-right","0px");
              },3000);
              
              </script>';
        }
    }
