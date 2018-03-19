<?php
if(isset($_POST['submit']) && !empty($_POST['submit'])):
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
        //your site secret key
        $secret = '6Ldyk0wUAAAAAB37-piqRNf_n67130OT_sY8pXG0';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success):
            //contact form submission code
            $name = !empty($_POST['name'])?$_POST['name']:'';
            $email = !empty($_POST['email'])?$_POST['email']:'';
            $message = !empty($_POST['message'])?$_POST['message']:'';
            $company = !empty($_POST['company'])?$_POST['company']:'';
            $companytype = !empty($_POST['companytype'])?$_POST['companytype']:'';
            $phone = !empty($_POST['phone'])?$_POST['phone']:'';

            $to = 'olmajor@brandedspiritsusa.com';
            $from = $_POST['email'];
            $subject = 'New Ol Major contact form submission';
            $subject2 = 'Copy of your Ol Major contact form submission';
            $htmlContent = "
                <h1>Contact request details</h1>
                <p><b>Name: </b>".$name."</p>
                <p><b>Email: </b>".$email."</p>
                <p><b>Company Name: </b>".$company."</p>
                <p><b>Company Type: </b>".$companytype."</p>
                <p><b>Phone: </b>".$phone."</p>
                <p><b>Message: </b>".$message."</p>
            ";
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // More headers
            $headers .= 'From:'.$name.' <'.$email.'>' . "\r\n";
            //send email
            @mail($to,$subject,$htmlContent,$headers);
            @mail($from,$subject2,$htmlContent,$headers);

            $succMsg = 'Your contact request have submitted successfully.';
            echo "Mail Sent. Thank you " . $firstname . ", we will contact you shortly.";
        else:
            $errMsg = 'Robot verification failed, please try again.';
        endif;
    else:
        echo "Please click on the reCAPTCHA box and try again.";
        $errMsg = 'Please click on the reCAPTCHA box.';
    endif;
else:
    $errMsg = '';
    $succMsg = '';
endif;
?>




<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/app.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- scripts necessary for store locator -->
    <script
      src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAQpg38og1BS2K1lEWm7TVPSwq-DgWbsLU"></script>
    <script
      src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js">
    </script>
    <script src="store-locator/store-locator.min.js"></script>
    <script src="store-locator/bevmo-store-locator.js"></script>
    <script src="store-locator/panel.js"></script>
    <script>
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-12846745-20']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' === document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
    <!-- end of store locator scripts -->
    <script type="text/javascript" src="js/ageVerify.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Ol' Major Bacon Bourbon</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <body>

    <!-- age gate modal -->
    <div id="agemodal" class="agemodal">
      <div class="overlay"></div>
        <div class="message">
          <div class="message-inner">
            <h1>Welcome</h1>
            <p>You have to be over 21 to enter this site</p>
            <form id="agegate" method="post" action="">
            <div class="birthday">
                <!-- <label class="day" for="day">Birthday:</label> -->
                <select id="day" name="day">
                    <option value="notset">DD</option>
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                    <option value="6">06</option>
                    <option value="7">07</option>
                    <option value="8">08</option>
                    <option value="9">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>
                <select id="month" name="month">
                    <option value="notset">MM</option>
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                    <option value="6">06</option>
                    <option value="7">07</option>
                    <option value="8">08</option>
                    <option value="9">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
                <select id="year" name="year">
                    <option value="notset">YYYY</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                    <option value="2009">2009</option>
                    <option value="2008">2008</option>
                    <option value="2007">2007</option>
                    <option value="2006">2006</option>
                    <option value="2005">2005</option>
                    <option value="2004">2004</option>
                    <option value="2003">2003</option>
                    <option value="2002">2002</option>
                    <option value="2001">2001</option>
                    <option value="2000">2000</option>
                    <option value="1999">1999</option>
                    <option value="1998">1998</option>
                    <option value="1997">1997</option>
                    <option value="1996">1996</option>
                    <option value="1995">1995</option>
                    <option value="1994">1994</option>
                    <option value="1993">1993</option>
                    <option value="1992">1992</option>
                    <option value="1991">1991</option>
                    <option value="1990">1990</option>
                    <option value="1989">1989</option>
                    <option value="1988">1988</option>
                    <option value="1987">1987</option>
                    <option value="1986">1986</option>
                    <option value="1985">1985</option>
                    <option value="1984">1984</option>
                    <option value="1983">1983</option>
                    <option value="1982">1982</option>
                    <option value="1981">1981</option>
                    <option value="1980">1980</option>
                    <option value="1979">1979</option>
                    <option value="1978">1978</option>
                    <option value="1977">1977</option>
                    <option value="1976">1976</option>
                    <option value="1975">1975</option>
                    <option value="1974">1974</option>
                    <option value="1973">1973</option>
                    <option value="1972">1972</option>
                    <option value="1971">1971</option>
                    <option value="1970">1970</option>
                    <option value="1969">1969</option>
                    <option value="1968">1968</option>
                    <option value="1967">1967</option>
                    <option value="1966">1966</option>
                    <option value="1965">1965</option>
                    <option value="1964">1964</option>
                    <option value="1963">1963</option>
                    <option value="1962">1962</option>
                    <option value="1961">1961</option>
                    <option value="1960">1960</option>
                    <option value="1959">1959</option>
                    <option value="1958">1958</option>
                    <option value="1957">1957</option>
                    <option value="1956">1956</option>
                    <option value="1955">1955</option>
                    <option value="1954">1954</option>
                    <option value="1953">1953</option>
                    <option value="1952">1952</option>
                    <option value="1951">1951</option>
                    <option value="1950">1950</option>
                    <option value="1949">1949</option>
                    <option value="1948">1948</option>
                    <option value="1947">1947</option>
                    <option value="1946">1946</option>
                    <option value="1945">1945</option>
                    <option value="1944">1944</option>
                    <option value="1943">1943</option>
                    <option value="1942">1942</option>
                    <option value="1941">1941</option>
                    <option value="1940">1940</option>
                    <option value="1939">1939</option>
                    <option value="1938">1938</option>
                    <option value="1937">1937</option>
                    <option value="1936">1936</option>
                    <option value="1935">1935</option>
                    <option value="1934">1934</option>
                    <option value="1933">1933</option>
                    <option value="1932">1932</option>
                    <option value="1931">1931</option>
                    <option value="1930">1930</option>
                    <option value="1929">1929</option>
                    <option value="1928">1928</option>
                    <option value="1927">1927</option>
                    <option value="1926">1926</option>
                    <option value="1925">1925</option>
                    <option value="1924">1924</option>
                    <option value="1923">1923</option>
                    <option value="1922">1922</option>
                    <option value="1921">1921</option>
                    <option value="1920">1920</option>
                    <option value="1919">1919</option>
                    <option value="1918">1918</option>
                    <option value="1917">1917</option>
                    <option value="1916">1916</option>
                    <option value="1915">1915</option>
                    <option value="1914">1914</option>
                    <option value="1913">1913</option>
                </select>
            </div>
            <div class="remember">
                <input type="checkbox" id="remember" /><label for="remember">Remember Me</label>
            </div>
            <div class="submit">
                <a id="formsubmit" class="formsubmit" data-submit="post">OK</a>
            </div>
        </form>
        <img src="img/white-logo.png">
      </div>
    </div>
</div>

<!-- Changes text to white after selecting an option -->
<script type="text/javascript">
  var daySelect = document.getElementById('day');
  daySelect.onchange = function () {
    daySelect.className = 'whiteText';
  }

  var monthSelect = document.getElementById('month');
  monthSelect.onchange = function () {
    monthSelect.className = 'whiteText';
  }

  var yearSelect = document.getElementById('year');
  yearSelect.onchange = function () {
    yearSelect.className = 'whiteText';
  }
</script>

<!-- end age modal -->




    <!-- mobile nav -->
    <nav class="site-navbar">
      <input type="checkbox" id="toggle_menu" class="toggle-menu-checkbox" />
      <label for="toggle_menu" class="toggle-menu-label uppercase"></label>
      <input type="checkbox" id="toggle_overlay" class="toggle-overlay-checkbox" />
      <label for="toggle_menu" class="toggle-overlay-label uppercase"></label>
      <ul class="site-menu">
        <li class="site-menu-item"><a href="#home">Home</a></li>
        <li class="site-menu-item"><a href="#about">About</a></li>
        <li class="site-menu-item"><a href="pages/assets.html">Press & Trade</a></li>
        <li class="site-menu-item"><a href="#our-products">Our Products</a></li>
        <li class="site-menu-item"><a href="#cocktails">Cocktails</a></li>
        <li class="site-menu-item"><a href="#where-to-buy">Where To Buy</a></li>
        <li class="site-menu-item"><a href="#contact">Contact</a></li>
      </ul>
    </nav>
    <!-- end mobile nav -->

    <!-- mobile nav -->
    <!-- <div class="nav-mobile">
      <nav role="navigation">
        <div id="menuToggle">
          <input type="checkbox" />

          <span></span>
          <span></span>
          <span></span>

          <ul id="menu">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#our-products">Our Products</a></li>
            <li><a href="#cocktails">Cocktails</a></li>
            <li><a href="#where-to-buy">Where To Buy</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
      </nav>
    </div> -->
    <!-- end mobile nav -->

    <!-- desktop nav -->
    <nav class="nav-desktop">
      <div class="row">
        <div class="col-xs-4">
          <img src="img/white-logo.png">
        </div>
        <div class="col-xs-8">
          <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="pages/assets.html">Press & Trade</a></li>
            <li><a href="#our-products">Our Products</a></li>
            <li><a href="#cocktails">Cocktails</a></li>
            <li><a href="#where-to-buy">Where To Buy</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- end desktop nav -->

    <!-- nav link scroll point -->
    <a name="home"></a>

    <!-- hero -->
    <div class="hero">
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <h1>Bacon + Bourbon<br>=</h1>
          <h2>Heaven</h2>
        </div>
      </div>
    </div>
    <!-- end hero -->

    <!-- scroll to top button and script -->
    <div>
      <a id="toTop" class="scroll-to-top" href="#home"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
    </div>

    <script>
      $(window).scroll(function() {
          if ($(this).scrollTop()) {
              $('#toTop').fadeIn();
          } else {
              $('#toTop').fadeOut();
          }
      });
    </script>
    <!-- end of scroll to top button and script -->

    <!-- nav link scroll point -->
    <a name="about"></a>

    <!-- about section -->
    <div class="about">
      <div class="row">
        <div class="col-xs-12">
          <ul class="title">
            <li><h1><span>*</span></h1></li>
            <li><h1>About</h1></li>
            <li><h1><span>*</span></h1></li>
          </ul>
        </div>
      </div>
      <div class="row">
        <p>
          This country was founded by those who dare to be bold.
          Ol’ Major Bacon Bourbon (Formerly Bacon Bourbon USA)
          takes two of America’s greatest assets and challenges the
          boundaries of their potential by fusing them in the world’s
          first and original bottled bacon bourbon.
        <br>
        <br>
          The mixture has been called both “crazy” and “delicious,”
          but those with taste buds agree that the bacon and bourbon
          form a delicate, but rugged balance of savory and sweet.
        </p>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <img src="img/gold-pig.png">
          <img src="img/silver-pig.png">
        </div>
      </div>
    </div>
    <!-- end about section -->

    <!-- nav link scroll point -->
    <a name="our-products"></a>

    <!-- our products section -->
    <div class="our-products">
      <div class="row">
        <div class="col-xs-12">
          <ul class="title">
            <li><h1><span>*</span></h1></li>
            <li><h1>Our Products</h1></li>
            <li><h1><span>*</span></h1></li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-6 col-md-3">
          <img src="img/bottle.jpg">
          <p>Ol' Major Bacon<br>Flavored Bourbon</p>
          <a href="#" target="_blank">Buy Online</a>
          <h6>7</h6>
        </div>
        <!-- <div class="col-xs-6 col-md-3">
          <img src="img/bloody-mary-kit.jpg">
          <p>Ol' Major<br>Bacon Bloody Mary Kit</p>
          <a href="#">Buy Online</a>
          <h6>7</h6>
        </div> -->
        <div class="col-xs-6 col-md-3">
          <img src="img/bloody-mary-mix.jpg">
          <p>Ol' Major<br>Bacon Bloody Mary Mix</p>
          <p class="price">$8.00</p>
          <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=5HNGYCN4N7M2S" target="_blank">Buy Online</a>
          <h6>7</h6>
        </div>
        <div class="col-xs-6 col-md-3">
          <img src="img/bacon-salt.jpg">
          <p>Ol' Major<br>Maple Bacon Salt</p>
          <p class="price">$5.00</p>
          <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9EY74HZ6G4RPG" target="_blank">Buy Online</a>
          <h6>7</h6>
        </div>
        <div class="col-xs-6 col-md-3">
          <img src="img/gold-pourer.jpg">
          <p>Gold Pig's Head Pourer</p>
          <p class="price">$19.00</p>
          <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZAVTM5H2BLT2C" target="_blank">Buy Online</a>
          <h6>7</h6>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-6 col-md-3">
          <img src="img/silver-pourer.jpg">
          <p>Silver Pig's Head Pourer</p>
          <p class="price">$19.00</p>
          <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XZVN9FXVSZ2NW" target="_blank">Buy Online</a>
          <h6>7</h6>
        </div>
        <div class="col-xs-6 col-md-3">
          <img src="img/black-hat.jpg">
          <p>Ol' Major Bacon Bourbon<br>Trucker Hat</p>
          <p class="price">$15.00</p>
          <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=RDG9FPZSP3GMS" target="_blank">Buy Online</a>
          <h6>7</h6>
        </div>
        <div class="col-xs-6 col-md-3">
          <img src="img/white-hat.jpg">
          <p>Ol' Major Bacon Bourbon<br>Snapback Cap</p>
          <p class="price">$15.00</p>
          <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=RDG9FPZSP3GMS" target="_blank">Buy Online</a>
          <h6>7</h6>
        </div>
      </div>
    </div>
    <!-- end our products section -->

    <!-- nav link scroll point -->
    <a name="cocktails"></a>

    <!-- cocktails section -->
    <div class="cocktails">
      <div class="row">
        <div class="col-xs-12">
          <ul class="title">
            <li><h1><span>*</span></h1></li>
            <li><h1>Cocktails</h1></li>
            <li><h1><span>*</span></h1></li>
          </ul>
        </div>
      </div>
      <div class="row cocktail-row">
        <div class="col-xs-6 col-sm-4 col-lg-2">
          <div data-toggle="modal" data-target="#babesJulepModal">
            <img src="img/babes-julep.jpeg">
            <p>Babe's Julep</p>
            <h6>7</h6>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="babesJulepModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <div class="row">
                    <div class="col-xs-12">
                      <p>Babe's Julep</p>
                      <h6>7</h6>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-1">
                      <button class="prev-next prev" type="button" onclick="showModal('baconBirthdayShotModal')"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5 image">
                      <img src="img/babes-julep.jpeg">
                    </div>
                    <div class="col-xs-1 prev-next-sm-screens">
                      <button class="prev-next next" type="button" onclick="showModal('yearOfThePigModal')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5">
                      <h5>Ingredients:</h5>
                      <ul>
                        <li>Leaves from 4-5 mint sprigs</li>
                        <li> 2 sugar cubes or 1/2 oz simple syrup</li>
                        <li> 2 1/2 oz bourbon </li>
                        <li>mint sprig (or piece of bacon) for garnish</li>
                      </ul>
                      <h5>Instructions:</h5>
                      <ol>
                        <li>Add mint, syrup, sugar in a julep cup</li>
                        <li>Muddle</li>
                        <li>Add Ol' Major Bacon Bourbon</li>
                        <li>Fill with ice and stir</li>
                        <li>Add a crispy slice of bacon for garnish</li>
                      </ol>
                    </div>
                    <div class="col-xs-1 prev-next-lg-screens">
                      <button class="prev-next next" type="button" onclick="showModal('yearOfThePigModal')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <img class="logo" src="img/logo.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end modal -->
        </div>

        <div class="col-xs-6 col-sm-4 col-lg-2">
          <div data-toggle="modal" data-target="#yearOfThePigModal">
            <img src="img/year-of-the-pig.jpeg">
            <p>Year of the Pig</p>
            <h6>7</h6>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="yearOfThePigModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <div class="row">
                    <div class="col-xs-12">
                      <p>Year of the Pig</p>
                      <h6>7</h6>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-1">
                      <button class="prev-next prev" type="button" onclick="showModal('babesJulepModal')"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5 image">
                      <img src="img/year-of-the-pig.jpeg">
                    </div>
                    <div class="col-xs-1 prev-next-sm-screens">
                      <button class="prev-next next" type="button" onclick="showModal('yankeeBaconCapetaModal')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5">
                      <h5>Ingredients:</h5>
                      <ul>
                        <li>2 oz. Ol' Major Bacon Bourbon </li>
                        <li> 1 oz. fresh lemon juice</li>
                        <li>1/2 oz Maple Syrup</li>
                        <li>1 teaspoon egg white</li>
                        <li>   Crushed ice</li>
                        <li>1/8 to 1/4 teaspoon Sriracha </li>
                        <li>Orange slice and halved serrano pepper, for garnish</li>
                      </ul>
                      <h5>Instructions:</h5>
                      <ol>
                        <li>Pour Ol' Major Bacon Bourbon, lemon juice, syrup and egg white into a shaker and shake</li>
                        <li>Add hot sauce and ice, shake again</li>
                        <li>Strain into a cup add the orange slice and pepper to garnish</li>
                      </ol>
                    </div>
                    <div class="col-xs-1 prev-next-lg-screens">
                      <button class="prev-next next" type="button" onclick="showModal('yankeeBaconCapetaModal')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <img class="logo" src="img/logo.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end modal -->
        </div>



        <div class="col-xs-6 col-sm-4 col-lg-2">
          <div data-toggle="modal" data-target="#yankeeBaconCapetaModal">
            <img src="img/yankee-bacon-capeta.png">
            <p>Yankee Bacon Capeta</p>
            <h6>7</h6>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="yankeeBaconCapetaModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <div class="row">
                    <div class="col-xs-12">
                      <p>Yankee Bacon Capeta</p>
                      <h6>7</h6>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-1">
                      <button class="prev-next prev" type="button" onclick="showModal('yearOfThePigModal')"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5 image">
                      <img src="img/yankee-bacon-capeta.png">
                    </div>
                    <div class="col-xs-1 prev-next-sm-screens">
                      <button class="prev-next next" type="button" onclick="showModal('oldFashionedModal')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5">
                      <h5>Ingredients:</h5>
                      <ul>
                        <li>1 1/2 oz. Ol’ Major Bacon Bourbon</li>
                        <li> 1 teaspoon instant powdered chocolate milk mix, such as Quik</li>
                        <li>1 teaspoon ground cinnamon</li>
                        <li>1 oz. milk</li>
                        <li>   1/2 cup sweetened condensed milk</li>
                        <li>
                          1 piece of chocolate covered bacon
                           (The original Brazilian Capeta would add 1 teaspoon guarana protein powder,
                          but we do not advise this addition.
                          The combination of alcohol and caffeine can be dangerous to your health.)
                        </li>
                      </ul>
                      <h5>Instructions:</h5>
                      <ol>
                        <li>Combine Ol’ Major Bacon Bourbon, St-Germain, lemon juice, diluted maple syrup, bitters, and egg white into a mixing glass and shake vigorously with ice.</li>
                        <li>Strain neat over a chilled martini glass</li>
                        <li>Garnish with a piece of chocolate covered bacon</li>
                      </ol>
                    </div>
                    <div class="col-xs-1 prev-next-lg-screens">
                      <button class="prev-next next" type="button" onclick="showModal('oldFashionedModal')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <img class="logo" src="img/logo.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end modal -->
        </div>

        <div class="col-xs-6 col-sm-4 col-lg-2">
          <div data-toggle="modal" data-target="#oldFashionedModal">
            <img src="img/old-fashioned.jpeg">
            <p>Bacon Ol' Fashioned</p>
            <h6>7</h6>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="oldFashionedModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <div class="row">
                    <div class="col-xs-12">
                      <p>Bacon Ol' Fashioned</p>
                      <h6>7</h6>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-1">
                      <button class="prev-next prev" type="button" onclick="showModal('yankeeBaconCapetaModal')"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5 image">
                      <img src="img/old-fashioned.jpeg">
                    </div>
                    <div class="col-xs-1 prev-next-sm-screens">
                      <button class="prev-next next" type="button" onclick="showModal('kevinsBaconModal')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5">
                      <h5>Ingredients:</h5>
                      <ul>
                        <li>2 oz. Ol’ Major Bacon Bourbon</li>
                        <li>2 dashes Angostura® bitters </li>
                        <li> 1 splash water</li>
                        <li>1 tsp. brown sugar</li>
                        <li>     1 maraschino cherry </li>
                        <li>1 orange wedge</li>
                      </ul>
                      <h5>Instructions:</h5>
                      <ol>
                        <li>Combine ingredients in a shaker</li>
                        <li>Shake and serve</li>
                      </ol>
                    </div>
                    <div class="col-xs-1 prev-next-lg-screens">
                      <button class="prev-next next" type="button" onclick="showModal('kevinsBaconModal')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <img class="logo" src="img/logo.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end modal -->
        </div>

        <div class="col-xs-6 col-sm-4 col-lg-2">
          <div data-toggle="modal" data-target="#kevinsBaconModal">
            <img src="img/kevins-bacon.jpeg">
            <p>Kevin's Bacon</p>
            <h6>7</h6>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="kevinsBaconModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <div class="row">
                    <div class="col-xs-12">
                      <p>Kevin's Bacon</p>
                      <h6>7</h6>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-1">
                      <button class="prev-next prev" type="button" onclick="showModal('oldFashionedModal')"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5 image">
                      <img src="img/kevins-bacon.jpeg">
                    </div>
                    <div class="col-xs-1 prev-next-sm-screens">
                      <button class="prev-next next" type="button" onclick="showModal('kentuckyWildboarModal')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5">
                      <h5>Ingredients:</h5>
                      <ul>
                        <li>3 cups water</li>
                        <li>2 or 3 black tea bags</li>
                        <li> 1/8 cup maple syrup</li>
                        <li>1/8 to 1/4 cup Ol’ Major Bacon Bourbon</li>
                        <li>     2 to 3 sliced orange rounds </li>
                        <li>3 sprigs of fresh mint</li>
                        <li>Ice to fill</li>
                      </ul>
                      <h5>Instructions:</h5>
                      <ol>
                        <li>Boil water. Remove water from heat and let tea steep for three to five minutes</li>
                        <li>Place tea in pitcher without tea bags and cool in fridge</li>
                        <li>Place Ol’ Major Bacon Bourbon, maple syrup, mint, and orange slices in a medium bowl</li>
                        <li>Muddle and press together</li>
                        <li>Once mixed together add it to the pitcher and stir well</li>
                        <li>Fill glasses with ice and pour</li>
                      </ol>
                    </div>
                    <div class="col-xs-1 prev-next-lg-screens">
                      <button class="prev-next next" type="button" onclick="showModal('kentuckyWildboarModal')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <img class="logo" src="img/logo.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end modal -->
        </div>

        <div class="col-xs-6 col-sm-4 col-lg-2">
          <div data-toggle="modal" data-target="#kentuckyWildboarModal">
            <img src="img/kentucky-wildboar.jpg">
            <p>Kentucky Wildboar</p>
            <h6>7</h6>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="kentuckyWildboarModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <div class="row">
                    <div class="col-xs-12">
                      <p>Kentucky Wildboar</p>
                      <h6>7</h6>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-1">
                      <button class="prev-next prev" type="button" onclick="showModal('kevinsBaconModal')"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5 image">
                      <img src="img/kentucky-wildboar.jpg">
                    </div>
                    <div class="col-xs-1 prev-next-sm-screens">
                      <button class="prev-next next" type="button" onclick="showModal('fizzyPiggyModal')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5">
                      <h5>Ingredients:</h5>
                      <ul>
                        <li>1/2 oz Ol’ Major Bacon Bourbon </li>
                        <li>1/2 oz peach liqueur</li>
                        <li>1/2 oz Canadian whiskey</li>
                        <li>  2 oz sweet and sour mix</li>
                        <li>   2 oz Dr. Pepper® soda</li>
                      </ul>
                      <h5>Instructions:</h5>
                      <ol>
                        <li>Combine ingredients in a highball glass full of ice</li>
                        <li>Stir gently</li>
                        <li>Garnish with a twist of orange</li>
                      </ol>
                    </div>
                    <div class="col-xs-1 prev-next-lg-screens">
                      <button class="prev-next next" type="button" onclick="showModal('fizzyPiggyModal')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <img class="logo" src="img/logo.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end modal -->
        </div>
      </div>
      <!-- end first row -->

      <!-- start second row -->
      <div class="row cocktail-row">
        <div class="col-xs-6 col-sm-4 col-lg-2">
          <div data-toggle="modal" data-target="#fizzyPiggyModal">
            <img src="img/fizzy-piggy.jpeg">
            <p>Fizzy Piggy</p>
            <h6>7</h6>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="fizzyPiggyModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <div class="row">
                    <div class="col-xs-12">
                      <p>Fizzy Piggy</p>
                      <h6>7</h6>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-1">
                      <button class="prev-next prev" type="button" onclick="showModal('kentuckyWildboarModal')"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5 image">
                      <img src="img/fizzy-piggy.jpeg">
                    </div>
                    <div class="col-xs-1 prev-next-sm-screens">
                      <button class="prev-next next" type="button" onclick="showModal('commieCripplerModal')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5">
                      <h5>Ingredients:</h5>
                      <ul>
                        <li>2 oz Ol' Major Bacon Bourbon  </li>
                        <li>3/4 oz fresh orange juice </li>
                        <li>1 1/2 tsp superfine sugar </li>
                        <li>  3 oz club soda</li>
                      </ul>
                      <h5>Instructions:</h5>
                      <ol>
                        <li>Mix all ingredients except ice in a chilled Tom Collins glass</li>
                        <li>Fill glass halfway with ice and then strain into a glass</li>
                        <li>Finally, top with club soda</li>
                      </ol>
                    </div>
                    <div class="col-xs-1 prev-next-lg-screens">
                      <button class="prev-next next" type="button" onclick="showModal('commieCripplerModal')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <img class="logo" src="img/logo.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end modal -->
        </div>

        <div class="col-xs-6 col-sm-4 col-lg-2">
          <div data-toggle="modal" data-target="#commieCripplerModal">
            <img src="img/commie-crippler.png">
            <p>Commie Crippler</p>
            <h6>7</h6>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="commieCripplerModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <div class="row">
                    <div class="col-xs-12">
                      <p>Commie Crippler</p>
                      <h6>7</h6>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-1">
                      <button class="prev-next prev" type="button" onclick="showModal('fizzyPiggyModal')"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5 image">
                      <img src="img/commie-crippler.png">
                    </div>
                    <div class="col-xs-1 prev-next-sm-screens">
                      <button class="prev-next next" type="button" onclick="showModal('brokenHoofModal')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5">
                      <h5>Ingredients:</h5>
                      <ul>
                        <li>1 1/2 oz Ol' Major Bacon Bourbon</li>
                        <li>3/4 oz triple sec </li>
                        <li>  3/4 oz lime juice </li>
                        <li> A couple of dashes licorice liqueur</li>
                      </ul>
                      <h5>Instructions:</h5>
                      <ol>
                        <li>Pour the bourbon, triple sec, pernod and lime juice into a cocktail shaker half-filled with ice cubes</li>
                        <li>Shake well, strain into a cocktail glass, and serve</li>
                      </ol>
                    </div>
                    <div class="col-xs-1 prev-next-lg-screens">
                      <button class="prev-next next" type="button" onclick="showModal('brokenHoofModal')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <img class="logo" src="img/logo.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end modal -->
        </div>

        <div class="col-xs-6 col-sm-4 col-lg-2">
          <div data-toggle="modal" data-target="#brokenHoofModal">
            <img src="img/broken-hoof.png">
            <p>Broken Hoof</p>
            <h6>7</h6>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="brokenHoofModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <div class="row">
                    <div class="col-xs-12">
                      <p>Broken Hoof</p>
                      <h6>7</h6>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-1">
                      <button class="prev-next prev" type="button" onclick="showModal('commieCripplerModal')"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5 image">
                      <img src="img/broken-hoof.png">
                    </div>
                    <div class="col-xs-1 prev-next-sm-screens">
                      <button class="prev-next next" type="button" onclick="showModal('baconBloodyMaryModal')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5">
                      <h5>Ingredients:</h5>
                      <ul>
                        <li>1 1/2 oz Ol' Major Bacon Bourbon</li>
                        <li>4 1/2 oz warm/hot apple cider  </li>
                        <li>lemon or lime wedge</li>
                        <li>  cinnamon stick</li>
                      </ul>
                      <h5>Instructions:</h5>
                      <ol>
                        <li>Mix Ol' Major Bacon Bourbon in mug or tall glass</li>
                        <li>Add cinnamon stick and lemon or lime wedge as garnish</li>
                      </ol>
                    </div>
                    <div class="col-xs-1 prev-next-lg-screens">
                      <button class="prev-next next" type="button" onclick="showModal('baconBloodyMaryModal')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <img class="logo" src="img/logo.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end modal -->
        </div>

        <div class="col-xs-6 col-sm-4 col-lg-2">
          <div data-toggle="modal" data-target="#baconBloodyMaryModal">
            <img src="img/bacon-bloody-mary.png">
            <p>Bacon Bloody Mary</p>
            <h6>7</h6>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="baconBloodyMaryModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <div class="row">
                    <div class="col-xs-12">
                      <p>Bacon Bloody Mary</p>
                      <h6>7</h6>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-1">
                      <button class="prev-next prev" type="button" onclick="showModal('brokenHoofModal')"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5 image">
                      <img src="img/bacon-bloody-mary.png">
                    </div>
                    <div class="col-xs-1 prev-next-sm-screens">
                      <button class="prev-next next" type="button" onclick="showModal('baconSourModal')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5">
                      <h5>Ingredients:</h5>
                      <ul>
                        <li>1 1/2 oz Ol’ Major Bacon Bourbon</li>
                        <li>3 oz Ol’ Major Bacon Bloody Mary Mix  </li>
                        <li>(1 teaspoon of horseradish, if preferred)</li>
                        <li>Ol’ Major Maple Bacon Salt to Rim the Glass</li>
                        <li>1 stick bacon to garnish (Well-cooked, left to dry on a paper towel)</li>
                      </ul>
                      <h5>Instructions:</h5>
                      <ol>
                        <li>Combine Ol’ Major Bacon Bourbon, Ol’ Major Bacon Bloody Mary Mix, and horseradish (if desired) in a shaker</li>
                        <li>Stir, then gently swirl until ingredients are well mixed</li>
                        <li>Using Ol’ Major Maple Bacon Salt, rim a large glass – we chose a mason jar because we are just cool like that..</li>
                        <li>Pour your drink into the mason jar and garnish with a piece of thoroughly cooked and fairly dry bacon</li>
                      </ol>
                    </div>
                    <div class="col-xs-1 prev-next-lg-screens">
                      <button class="prev-next next" type="button" onclick="showModal('baconSourModal')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <img class="logo" src="img/logo.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end modal -->
        </div>

        <div class="col-xs-6 col-sm-4 col-lg-2">
          <div data-toggle="modal" data-target="#baconSourModal">
            <img src="img/bacon-sour.jpg">
            <p>Bacon Sour</p>
            <h6>7</h6>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="baconSourModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <div class="row">
                    <div class="col-xs-12">
                      <p>Bacon Sour</p>
                      <h6>7</h6>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-1">
                      <button class="prev-next prev" type="button" onclick="showModal('baconBloodyMaryModal')"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5 image">
                      <img src="img/bacon-sour.jpg">
                    </div>
                    <div class="col-xs-1 prev-next-sm-screens">
                      <button class="prev-next next" type="button" onclick="showModal('baconBirthdayShotModal')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5">
                      <h5>Ingredients:</h5>
                      <ul>
                        <li>1 1/4 parts Ol’ Major Bacon Bourbon</li>
                        <li>1 part St-Germain Liqueur</li>
                        <li>1 part freshly squeezed and strained lemon juice</li>
                        <li>1/2 part diluted maple syrup (1:1 ratio of Vermont Grade-A Medium Amber Syrup to water)</li>
                        <li>1 dash Peychaud’s Bitters</li>
                        <li>1/4 part pasteurized egg white</li>
                      </ul>
                      <h5>Instructions:</h5>
                      <ol>
                        <li>Combine Ol’ Major Bacon Bourbon, St-Germain, lemon juice, diluted maple syrup, bitters, and egg white into a mixing glass and shake vigorously with ice</li>
                        <li>Strain over fresh ice into a double-old fashioned glass</li>
                        <li>Garnish with an orange slice and a piece of Applewood smoked bacon</li>
                      </ol>
                    </div>
                    <div class="col-xs-1 prev-next-lg-screens">
                      <button class="prev-next next" type="button" onclick="showModal('baconBirthdayShotModal')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <img class="logo" src="img/logo.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end modal -->
        </div>

        <div class="col-xs-6 col-sm-4 col-lg-2">
          <div data-toggle="modal" data-target="#baconBirthdayShotModal">
            <img src="img/bacon-birthday-shot.png">
            <p>Bacon Birthday Shot</p>
            <h6>7</h6>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="baconBirthdayShotModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <div class="row">
                    <div class="col-xs-12">
                      <p>Bacon Birthday Shot</p>
                      <h6>7</h6>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-1">
                      <button class="prev-next prev" type="button" onclick="showModal('baconSourModal')"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5 image">
                      <img src="img/bacon-birthday-shot.png">
                    </div>
                    <div class="col-xs-1 prev-next-sm-screens">
                      <button class="prev-next next" type="button" onclick="showModal('babesJulepModal')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5">
                      <h5>Ingredients:</h5>
                      <ul>
                        <li>1 oz Ol’ Major Bacon Bourbon </li>
                        <li>1/2 oz Fragelico® or other hazelnut liqueur </li>
                        <li>1 slice of lemon</li>
                        <li> Sugar</li>
                      </ul>
                      <h5>Instructions:</h5>
                      <ol>
                        <li>Spread sugar on a small plate or other clean flat surface</li>
                        <li>Slide lemon slice around the lip of the shot glass, then dip the top of the glass into the sugar</li>
                        <li>Combine Frangelico® and Ol’ Major Bacon Bourbon in the glass</li>
                        <li>Take the shot then bite the lemon</li>
                      </ol>
                    </div>
                    <div class="col-xs-1 prev-next-lg-screens">
                      <button class="prev-next next" type="button" onclick="showModal('babesJulepModal')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <img class="logo" src="img/logo.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end modal -->
        </div>
      </div>
    </div>

    <script>
      function showModal(id) {
        $(".modal").modal('hide');
        $("#" + id).modal();
      }
    </script>
    <!-- end cocktails section -->

    <!-- nav link scroll point -->
    <a name="where-to-buy"></a>

    <!-- locations section -->
    <div class="locations">
      <div class="row">
        <div class="col-xs-12">
          <ul class="title">
            <li><h1><span>*</span></h1></li>
            <li><h1>Where You Can Find Us</h1></li>
            <li><h1><span>*</span></h1></li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div id="map-canvas"></div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div id="panel"></div>
          <div class="show-more">
            <a href="#">Show more</a>
          </div>
        </div>
      </div>
    </div>

    <!-- script for show more button -->
    <script>

      $( document ).ready(function() {
        $(document).on("click", ".show-more a", function(e) {
        		e.preventDefault();
            if($(this).text() == "Show more"){
                $(this).text("Show less")
                $('#panel').addClass('tall')
                $('li.store:nth-of-type(4)').addClass('visible')
                $('li.store:nth-of-type(5)').addClass('visible')
                $('li.store:nth-of-type(6)').addClass('visible')
                $('li.store:nth-of-type(7)').addClass('visible')
                $('li.store:nth-of-type(8)').addClass('visible')
                $('li.store:nth-of-type(9)').addClass('visible')
                $('li.store:nth-of-type(10)').addClass('visible')
            } else {
                $(this).text("Show more")
                $('#panel').removeClass('tall')
                $('li.store:nth-of-type(4)').removeClass('visible')
                $('li.store:nth-of-type(5)').removeClass('visible')
                $('li.store:nth-of-type(6)').removeClass('visible')
                $('li.store:nth-of-type(7)').removeClass('visible')
                $('li.store:nth-of-type(8)').removeClass('visible')
                $('li.store:nth-of-type(9)').removeClass('visible')
                $('li.store:nth-of-type(10)').removeClass('visible')
            };

            $this.text(linkText);
        });
      });

    </script>
    <!-- end locations section -->

    <!-- nav link scroll point -->
    <a name="contact"></a>

    <!-- contact section -->
    <div class="contact">
      <div class="row">
        <div class="col-xs-12">
          <ul class="title">
            <li><h1><span>*</span></h1></li>
            <li><h1>Contact Us</h1></li>
            <li><h1><span>*</span></h1></li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <form action="" method="POST">
            <p>Your Name*</p>
            <input type="text" name="name" value="" required />
            <p>Company Name*</p>
            <input type="text" name="company" value="" required />
            <p>Company Type*</p>
            <select class="small-input" name="companytype" value="" required />
                <option value="" selected="selected">Select</option>
                <option value="Retailer">Retailer</option>
                <option value="Distributor">Distributor</option>
                <option value="Individual/Customer">Individual/Customer</option>
                <option value="Press/Media">Press/Media</option>
                <option value="Other">Other</option>
            </select>
            <p>Email Address*</p>
            <input type="text" name="email" value="" required />
            <p>Phone Number*</p>
            <input type="tel" name="phone" value="" required />
            <p>Message*</p>
            <input type="text" name="message" required />
            <p></p>
            <div class="g-recaptcha" data-sitekey="6Ldyk0wUAAAAAMYGyuIrI-pGxlHpgseVDDEPWg36"></div>
            <p></p>
            <input class="submit-button" type="submit" name="submit" value="submit">
        </form>
        <style>
        .contact input.submit-button {
          padding: 10px 20px;
          background-color: #a33d2c;
          border: 1px solid #a33d2c;
          border-radius: 3px;
          color: #fff;
          text-transform: uppercase;
          letter-spacing: 1px;
          font-family: 'Myriad';
        }
        </style>
        </div>
        <div class="col-xs-12 col-sm-4 address">
          <h3>Address</h3>
          <p>
            500 Sansome Street #600
            <br>
            San Francisco, CA 94111
            <br>
            +1 415-813-5045
            <br>
            olmajor@brandedspiritsusa.com
          </p>
          <div class="office-map" style="overflow: hidden;">
              <iframe style="position:relative; top:-50px; border:none;" src="https://www.google.com/maps/d/embed?mid=1MMQhdWelzSPPP1iyYGn66LwRDD4" width="300" height="300"></iframe>
          </div>
        </div>
      </div>
    </div>
    <!-- end contact section -->

    <!-- footer -->
    <div class="footer">
      <div class="row">
        <div class="col-xs-12">
          <img src="img/white-logo.png">
          <br>
          <a class="facebook" href="https://www.facebook.com/Bacon.Bourbon.USA/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a class="facebook" href="https://www.instagram.com/baconbourbon/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
          <a class="facebook" href="https://twitter.com/baconbourbonusa"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <a class="facebook" href="https://www.linkedin.com/company/branded-spirits-usa-ltd"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
          <p>Crafted in California</p>
          <p>© 2017 <a href="http://brandedspiritsusa.com/">Branded Spirits USA Ltd.</a></p>
        </div>
      </div>
    </div>

    <script
          src="https://code.jquery.com/jquery-3.2.1.min.js"
          integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
          crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="js/animateScroll.js"></script>


  </body>
</html>
