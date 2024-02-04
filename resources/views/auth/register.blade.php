<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title style="font-family: cursive">Register || Nursery</title>
    <link rel="apple-touch-icon" href="{{asset('backend2')}}/img/apple-touch-icon.png">
    <link rel="icon" type="image/gif" href="{{asset('backend2')}}/img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.2/font/bootstrap-icons.min.css"/>
  </head>

  <body>
    <style>
      .hidden {
        display: none;
      }
    </style>
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-8 col-sm-10 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="{{route('welcome')}}" class="d-flex align-items-center w-auto" style="text-decoration: none">
                <img src="{{asset('backend2')}}/img/logo.png" width="50px" height="50px"><span class="d-lg-block" style="font-weight:800;font-size:36px;color:#81c408">Nursery</span></a>
            </div><!-- End Logo -->
            <div class="card mb-3">
              <div class="card-body">
                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Create A New Account</h5>
                </div>
                <form action="{{route('register')}}" method="POST" class="row g-3" enctype="multipart/form-data">
                  @csrf
                  <div class="col-12" style="position: relative">
                    <label for="name" class="form-label"><strong>Name</strong><span style="color:red"> *</span></label>
                    <div class="input-group">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-signature"></i></span>
                      <input type="text" name="name" class="form-control" id="name" required autofocus
                        autocomplete="name">
                    </div>
                  </div>
                  <div class="col-12" style="position: relative">
                    <label for="username" class="form-label"><strong>User Name</strong></label>
                    <div class="input-group">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-signature"></i></span>
                      <input type="text" name="username" class="form-control" id="username" required placeholder="This name shows on your Profile...">
                    </div>
                  </div>
                  <div class="col-12" style="position: relative">
                    <label for="email" class="form-label"><strong>E-mail</strong></label>
                    <div class="input-group">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-envelope"></i></span>
                      <input type="email" name="email" class="form-control" id="email" autocomplete="email">
                    </div>
                  </div>
                  <div class="col-12" style="position: relative">
                    <label for="phone" class="form-label"><strong>Phone</strong><span
                        style="color:red; text-align:right">
                        *</span></label>
                    <div class="input-group">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-phone"></i></span>
                      <input type="text" name="phone" class="form-control" id="phone" required autocomplete="phone">
                    </div>
                  </div>
                  <div class="col-12" style="position: relative">
                    <label for="photo" class="form-label"><strong>Profile Photo</strong></label>
                    <div class="input-group">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-image"></i></span>
                      <input type="file" name="photo" class="form-control" id="photo">
                    </div>
                  </div>
                  <div class="col-12" style="position: relative">
                    <label for="usertype" class="form-label"><strong>Account Type</strong><span style="color:red"> *</span></label>
                    <div class="input-group">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-user-tie"></i></span>
                      <select name="type" id="type" class="form-select">
                        <option value="buyer" selected>Buyer / Customer</option>
                        <option value="seller">Seller / Vendor</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12" style="position: relative">
                    <label for="password" class="form-label"><strong>New Password</strong><span style="color:red">
                        *</span></label>
                    <div class="input-group">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-lock-open"></i></span>
                      <input type="password" name="password" class="form-control" id="password" required
                        autocomplete="new-password">
                    </div>
                  </div>
                  <div class="col-12" style="position: relative">
                    <label for="password_confirmation" class="form-label"><strong>Confirm Password</strong><span
                        style="color:red"> *</span></label>
                    <div class="input-group">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-unlock"></i></span>
                      <input type="password" name="password_confirmation" class="form-control"
                        id="password_confirmation" required autocomplete="new-password">
                    </div>
                  </div>
                  @php
                  $user_ip = getenv('REMOTE_ADDR');
                  $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
                  $geoCurrencyCode = $geo["geoplugin_currencyCode"];
                  $country = $geo["geoplugin_countryName"];
                  $city = $geo["geoplugin_city"];
                  $currencyCodeArray = array ('ALL' => 'Albania Lek','AFN' => 'Afghanistan Afghani','ARS' => 'Argentina Peso','AWG' => 'Aruba Guilder','AUD' => 'Australia Dollar','AZN' => 'Azerbaijan New Manat','BSD' => 'Bahamas Dollar','BBD' => 'Barbados Dollar','BDT' => 'Bangladeshi taka','BYR' => 'Belarus Ruble','BZD' => 'Belize Dollar','BMD' => 'Bermuda Dollar','BOB' => 'Bolivia Boliviano','BAM' => 'Bosnia and Herzegovina Convertible Marka','BWP' => 'Botswana Pula','BGN' => 'Bulgaria Lev','BRL' => 'Brazil Real','BND' => 'Brunei Darussalam Dollar','KHR' => 'Cambodia Riel','CAD' => 'Canada Dollar','KYD' => 'Cayman Islands Dollar','CLP' => 'Chile Peso','CNY' => 'China Yuan Renminbi','COP' => 'Colombia Peso','CRC' => 'Costa Rica Colon','HRK' => 'Croatia Kuna','CUP' => 'Cuba Peso','CZK' => 'Czech Republic Koruna','DKK' => 'Denmark Krone','DOP' => 'Dominican Republic Peso','XCD' => 'East Caribbean Dollar','EGP' => 'Egypt Pound','SVC' => 'El Salvador Colon','EEK' => 'Estonia Kroon','EUR' => 'Euro Member Countries','FKP' => 'Falkland Islands (Malvinas) Pound','FJD' => 'Fiji Dollar','GHC' => 'Ghana Cedis','GIP' => 'Gibraltar Pound','GTQ' => 'Guatemala Quetzal','GGP' => 'Guernsey Pound','GYD' => 'Guyana Dollar','HNL' => 'Honduras Lempira','HKD' => 'Hong Kong Dollar','HUF' => 'Hungary Forint','ISK' => 'Iceland Krona','INR' => 'India Rupee','IDR' => 'Indonesia Rupiah','IRR' => 'Iran Rial','IMP' => 'Isle of Man Pound','ILS' => 'Israel Shekel','JMD' => 'Jamaica Dollar','JPY' => 'Japan Yen','JEP' => 'Jersey Pound','KZT' => 'Kazakhstan Tenge','KPW' => 'Korea (North) Won','KRW' => 'Korea (South) Won','KGS' => 'Kyrgyzstan Som','LAK' => 'Laos Kip','LVL' => 'Latvia Lat','LBP' => 'Lebanon Pound','LRD' => 'Liberia Dollar','LTL' => 'Lithuania Litas','MKD' => 'Macedonia Denar','MYR' => 'Malaysia Ringgit','MUR' => 'Mauritius Rupee','MXN' => 'Mexico Peso','MNT' => 'Mongolia Tughrik','MZN' => 'Mozambique Metical','NAD' => 'Namibia Dollar','NPR' => 'Nepal Rupee','ANG' => 'Netherlands Antilles Guilder','NZD' => 'New Zealand Dollar','NIO' => 'Nicaragua Cordoba','NGN' => 'Nigeria Naira','NOK' => 'Norway Krone','OMR' => 'Oman Rial','PKR' => 'Pakistan Rupee','PAB' => 'Panama Balboa','PYG' => 'Paraguay Guarani','PEN' => 'Peru Nuevo Sol','PHP' => 'Philippines Peso','PLN' => 'Poland Zloty','QAR' => 'Qatar Riyal','RON' => 'Romania New Leu','RUB' => 'Russia Ruble','SHP' => 'Saint Helena Pound','SAR' => 'Saudi Arabia Riyal','RSD' => 'Serbia Dinar','SCR' => 'Seychelles Rupee','SGD' => 'Singapore Dollar','SBD' => 'Solomon Islands Dollar','SOS' => 'Somalia Shilling','ZAR' => 'South Africa Rand','LKR' => 'Sri Lanka Rupee','SEK' => 'Sweden Krona','CHF' => 'Switzerland Franc','SRD' => 'Suriname Dollar','SYP' => 'Syria Pound','TWD' => 'Taiwan New Dollar','THB' => 'Thailand Baht','TTD' => 'Trinidad and Tobago Dollar','TRY' => 'Turkey Lira','TRL' => 'Turkey Lira','TVD' => 'Tuvalu Dollar','UAH' => 'Ukraine Hryvna','GBP' => 'United Kingdom Pound','USD' => 'United States Dollar','UYU' => 'Uruguay Peso','UZS' => 'Uzbekistan Som','VEF' => 'Venezuela Bolivar','VND' => 'Viet Nam Dong','YER' => 'Yemen Rial','ZWD' => 'Zimbabwe Dollar');
                @endphp
               <div class="col-lg-12">
               <div class="row d-flex px-2">
                <div class="col-xxl-4 col-lg-6 col-md-6 px-0">                      
                  <label for="states" class="form-label"><strong>States</strong></label>
                  <div class="input-group">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-geo-alt-fill"></i></span>
                    <input type="text" name="states" class="form-control" id="states" value="{{$city}}" readonly>
                  </div>
                </div>
                <div class="col-xxl-4 col-lg-6 col-md-6 px-0">                      
                  <label for="country" class="form-label"><strong>Country</strong></label>
                  <div class="input-group">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-globe-central-south-asia"></i></span>
                    <input type="text" name="country" class="form-control" id="country" value="{{$country}}" readonly>
                  </div>
                </div>
                <div class="col-xxl-4 col-lg-12 col-md-12 px-0">                      
                  <label for="currency" class="form-label"><strong>Currency</strong></label>
                  <div class="input-group">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-currency-dollar"></i></span>
                    <select name="currency" id="currency" class="form-select">
                      @foreach ($currencyCodeArray as $key=>$currencyCode)
                          <option value="{{$key}}" <?php if($geoCurrencyCode == $key) echo 'selected';?>>{{$currencyCode}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
               </div>
               </div>
                  <div class="col-12">
                    <p style="color:red"> <strong>*</strong> marked fields are mandatory.</p>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Create Account</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Have an Account? <a href="{{route('login')}}" class="btn btn-sm btn-outline-success btn-warning">Log-In</a></p>
                  </div>
                </form>
              </div>
            </div>
            <div class="credits">
              Designed by <a href="https://www.blooms-ai.com">Blooms-AI</a>
            </div>

          </div>
        </div>
      </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/fontawesome.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"></script>
    <script>
      if (document.querySelector('.alertDiv')) {
        var hideableDivs = document.querySelectorAll('.alertDiv');
        hideableDivs.forEach(function (div) {
          div.addEventListener('click', function () {
            hideDiv(this);
          });
        });
        function hideDiv(element) {
          element.style.display = 'none';
        };
        hideableDivs.forEach(function (div) {
          setTimeout(function () {
            div.style.display = 'none';
          }, 5000);
        });
      }
    </script>
  </body>

</html>