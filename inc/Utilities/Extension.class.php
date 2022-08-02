<?php

    class DropOff
    {

        static function verifyMessage(bool $login = false)   {
          
          if(!empty($_SESSION['msg']) && ($url = $_SESSION['msg']['url']) != ''){

            if(!empty($_SESSION['msg']['success'])){
              DropOff::sucessful($_SESSION['msg']['success']);
              unset($_SESSION['msg']);
              if(!$login) 
              {
                header("Refresh: 2; url=$url");
              }
            }

            if(!empty($_SESSION['msg']['error'])){
              DropOff::fail($_SESSION['msg']['error']);
              unset($_SESSION['msg']);
              if(!$login) 
              {
                header("Refresh: 2; url=$url");
              }
            }
          }
        }


        static function fail($msg)
        {
          if(!empty($msg))
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
        }

        static function sucessful($msg)
        {
          if(!empty($msg))
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
    }
