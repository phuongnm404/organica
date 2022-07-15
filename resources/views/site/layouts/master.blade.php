<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Home | E-Shopper</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">


  <link href="{{ asset('eshopper/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('eshopper/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('eshopper/css/prettyPhoto.css') }}" rel="stylesheet">
  <link href="{{ asset('eshopper/css/price-range.css') }}" rel="stylesheet">
  <link href="{{ asset('eshopper/css/animate.css') }}" rel="stylesheet">
  <link href="{{ asset('eshopper/css/main.css') }}" rel="stylesheet">



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  @yield('css')
  @yield('title')

</head>
<!--/head-->

<body>
  @include("site.components.header")

  @yield('content')

  @include("site.components.footer")

  <script src="{{ asset('eshopper/js/jquery.js') }}"></script>
  <script src="{{ asset('eshopper/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('eshopper/js/jquery.scrollUp.min.js') }}"></script>
  <script src="{{ asset('eshopper/js/price-range.js') }}"></script>
  <script src="{{ asset('eshopper/js/jquery.prettyPhoto.js') }}"></script>
  <script src="{{ asset('eshopper/js/main.js') }}"></script>

  <script src="{{ asset('vendors/alert/sweetalert2@11.js') }}"></script>
  <script type="text/javascript" src="{{ asset('adminn\main.js') }}"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
    integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- JavaScript Bundle with Popper -->
  <script>
    @if(Session::has('message'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
        toastr.success("{{ session('message') }}");
    @endif
  
    @if(Session::has('error'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
        toastr.error("{{ session('error') }}");
    @endif
  
    @if(Session::has('info'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
        toastr.info("{{ session('info') }}");
    @endif
  
    @if(Session::has('warning'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
        toastr.warning("{{ session('warning') }}");
    @endif
  </script>

  @yield('js')
  <script>
    window.onscroll = function() {myFunction()};
        
        var navbar = document.getElementById("header-bottom");
        var sticky = navbar.offsetTop;
        
        function myFunction() {
          if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
         
          } else {
            navbar.classList.remove("sticky");
          }
        }
  </script>
  <script>
    $( function() {
            $( "#birthday" ).datepicker({
                dateFormat: 'dd/mm/yy',
                changeMonth: true,
                 changeYear: true,
                 yearRange:"-50:-18" 
            })

          jQuery(document).ready(function(){
            jQuery('#province_user_id').change(function(){
              let provinceId=jQuery(this).val();
              
              jQuery('#ward_user_id').html('<option value = "">--Chọn--</option>')

              jQuery.ajax({
                url:"{{route('site.address.district')}}",
                type:'post',
                data:'provinceId='+provinceId+'&_token={{csrf_token()}}',
                success:function(result){
                   jQuery('#district_user_id').html(result)
                }
              });
            });     
            jQuery('#district_user_id').change(function(){
              let districtId=jQuery(this).val();
              jQuery.ajax({
                url:"{{route('site.address.ward')}}",
                type:'post',
                data:'districtId='+districtId+'&_token={{csrf_token()}}',
                success:function(result){
                  jQuery('#ward_user_id').html(result)
                }
              });
			      });
		      });
    });
  </script>

</body>

</html>