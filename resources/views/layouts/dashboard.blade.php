<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>User Dashboard - DigiPay</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="dashboard/css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,4JUdGzvrMFDWrUUwY3toJATSeNwjn54LkCnKBPRzDuhzi5vSepHfUckJNxRL2gjkNrSqtCoRUrEDAgRwsQvVCjZbRyFTLRNyDmT1a1boZV">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="dashboard/css/feather.css">
    <link rel="stylesheet" href="dashboard/css/select2.css">
    <link rel="stylesheet" href="dashboard/css/dropzone.css">
    <link rel="stylesheet" href="dashboard/css/uppy.min.css">
    <link rel="stylesheet" href="dashboard/css/jquery.steps.css">
    <link rel="stylesheet" href="dashboard/css/jquery.timepicker.css">
    <link rel="stylesheet" href="dashboard/css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="dashboard/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="dashboard/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="dashboard/css/app-dark.css" id="darkTheme" disabled>
  </head>
  <body class="vertical  light  ">
    <div class="wrapper">
      <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
          <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
      
       
      </nav>
      <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
          <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="">
             
            </a>
          </div>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="{{route('home')}}" class="nav-link pl-3">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Dashboard</span><span class="sr-only">(current)</span>
              </a>
              
            </li>
          </ul>
         
          <ul class="navbar-nav flex-fill w-100 mb-2">
           
           
            <li class="nav-item dropdown">
              <a href="#transact" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-credit-card fe-16"></i>
                <span class="ml-3 item-text">Transact</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="transact">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{route('deposit')}}"><span class="ml-1 item-text">Deposit to Digipay</span></a>
                </li>
                <p class="text-muted nav-heading mt-4 mb-1">
                <span>Send Money</span>
              </p>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{route('digipay')}}"><span class="ml-1 item-text">Another DigiPay Account</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{route('mobile')}}"><span class="ml-1 item-text">Mobile wallet</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{route('banking')}}"><span class="ml-1 item-text">Another Bank</span></a>
                </li>
                <p class="text-muted nav-heading mt-4 mb-1">
                <span>Pay with DigiPay</span>
              </p>
              <li class="nav-item">
                  <a class="nav-link pl-3" href="{{route('paybill')}}"><span class="ml-1 item-text">Pay Bill</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{route('buygoods')}}"><span class="ml-1 item-text">Buy Goods</span></a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#invests" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-grid fe-16"></i>
                <span class="ml-3 item-text">Investments</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="invests">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{route('investment')}}"><span class="ml-1 item-text">Investment Plans</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{route('investmenthistory')}}"><span class="ml-1 item-text">My Investments</span></a>
                </li>
                
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#budget" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-pie-chart fe-16"></i>
                <span class="ml-3 item-text">Budget</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="budget">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{route('budget1')}}"><span class="ml-1 item-text">This Month</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{route('budget0')}}"><span class="ml-1 item-text">This Week</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{route('budget2')}}"><span class="ml-1 item-text">This Year</span></a>
                </li>
                
              </ul>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Profile</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            
            
            <li class="nav-item dropdown">
              <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-user fe-16"></i>
                <span class="ml-3 item-text">Profile</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="profile">
              <p class="text-muted nav-heading mt-4 mb-1">
                <span>User Settings</span>
              </p>
                <a class="nav-link pl-3" href="{{route('profile-security')}}"><span class="ml-1">Security</span></a>
                <a class="nav-link pl-3" href="{{route('contact')}}"><span class="ml-1">Help</span></a>
                <a class="nav-link pl-3" href="{{route('terms')}}"><span class="ml-1">Terms and Conditions</span></a>
                <a class="nav-link pl-3" href="{{route('privacy')}}"><span class="ml-1">Privacy Policy</span></a>
                <a class="nav-link pl-3" href="{{route('contact')}}"><span class="ml-1">Contact</span></a>
                <p class="text-muted nav-heading mt-4 mb-1">
                <span>Other Actions</span>
              </p>
              <a class="nav-link pl-3" href="{{route('refer')}}"><span class="ml-1">Refer Earn with Us</span></a>

              </ul>
            </li>
          </ul>
         
         
          
        
          <div class="btn-box w-100 mt-4 mb-1">
            <a href="{{route('logout')}}"  class="btn mb-2 btn-primary btn-lg btn-block">
              <i class="fe fe-user-icon fe-12 mx-2"></i><span class="small">Sign Out</span>
            </a>
          </div>
        </nav>
      </aside>

      <main class="py-4">
            @yield('content')
        </main>


</div> <!-- .wrapper -->
    <script src="dashboard/js/jquery.min.js"></script>
    <script src="dashboard/js/popper.min.js"></script>
    <script src="dashboard/js/moment.min.js"></script>
    <script src="dashboard/js/bootstrap.min.js"></script>
    <script src="dashboard/js/simplebar.min.js"></script>
    <script src='dashboard/js/daterangepicker.js'></script>
    <script src='dashboard/js/jquery.stickOnScroll.js'></script>
    <script src="dashboard/js/tinycolor-min.js"></script>
    <script src="dashboard/js/config.js"></script>
    <script src="dashboard/js/d3.min.js"></script>
    <script src="dashboard/js/topojson.min.js"></script>
    <script src="dashboard/js/datamaps.all.min.js"></script>
    <script src="dashboard/js/datamaps-zoomto.js"></script>
    <script src="dashboard/js/datamaps.custom.js"></script>
    <script src="dashboard/js/Chart.min.js"></script>
    <script>
      /* defind global options */
      Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
      Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="dashboard/js/gauge.min.js"></script>
    <script src="dashboard/js/jquery.sparkline.min.js"></script>
    <script src="dashboard/js/apexcharts.min.js"></script>
    <script src="dashboard/js/apexcharts.custom.js"></script>
    <script src='dashboard/js/jquery.mask.min.js'></script>
    <script src='dashboard/js/select2.min.js'></script>
    <script src='dashboard/js/jquery.steps.min.js'></script>
    <script src='dashboard/js/jquery.validate.min.js'></script>
    <script src='dashboard/js/jquery.timepicker.js'></script>
    <script src='dashboard/js/dropzone.min.js'></script>
    <script src='dashboard/js/uppy.min.js'></script>
    <script src='dashboard/js/quill.min.js'></script>
    <script>
      $('.select2').select2(
      {
        theme: 'bootstrap4',
      });
      $('.select2-multi').select2(
      {
        multiple: true,
        theme: 'bootstrap4',
      });
      $('.drgpicker').daterangepicker(
      {
        singleDatePicker: true,
        timePicker: false,
        showDropdowns: true,
        locale:
        {
          format: 'MM/DD/YYYY'
        }
      });
      $('.time-input').timepicker(
      {
        'scrollDefault': 'now',
        'zindex': '9999' /* fix modal open */
      });
      /** date range picker */
      if ($('.datetimes').length)
      {
        $('.datetimes').daterangepicker(
        {
          timePicker: true,
          startDate: moment().startOf('hour'),
          endDate: moment().startOf('hour').add(32, 'hour'),
          locale:
          {
            format: 'M/DD hh:mm A'
          }
        });
      }
      var start = moment().subtract(29, 'days');
      var end = moment();

      function cb(start, end)
      {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      }
      $('#reportrange').daterangepicker(
      {
        startDate: start,
        endDate: end,
        ranges:
        {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, cb);
      cb(start, end);
      $('.input-placeholder').mask("00/00/0000",
      {
        placeholder: "__/__/____"
      });
      $('.input-zip').mask('00000-000',
      {
        placeholder: "____-___"
      });
      $('.input-money').mask("#.##0,00",
      {
        reverse: true
      });
      $('.input-phoneus').mask('(000) 000-0000');
      $('.input-mixed').mask('AAA 000-S0S');
      $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ',
      {
        translation:
        {
          'Z':
          {
            pattern: /[0-9]/,
            optional: true
          }
        },
        placeholder: "___.___.___.___"
      });
      // editor
      var editor = document.getElementById('editor');
      if (editor)
      {
        var toolbarOptions = [
          [
          {
            'font': []
          }],
          [
          {
            'header': [1, 2, 3, 4, 5, 6, false]
          }],
          ['bold', 'italic', 'underline', 'strike'],
          ['blockquote', 'code-block'],
          [
          {
            'header': 1
          },
          {
            'header': 2
          }],
          [
          {
            'list': 'ordered'
          },
          {
            'list': 'bullet'
          }],
          [
          {
            'script': 'sub'
          },
          {
            'script': 'super'
          }],
          [
          {
            'indent': '-1'
          },
          {
            'indent': '+1'
          }], // outdent/indent
          [
          {
            'direction': 'rtl'
          }], // text direction
          [
          {
            'color': []
          },
          {
            'background': []
          }], // dropdown with defaults from theme
          [
          {
            'align': []
          }],
          ['clean'] // remove formatting button
        ];
        var quill = new Quill(editor,
        {
          modules:
          {
            toolbar: toolbarOptions
          },
          theme: 'snow'
        });
      }
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function()
      {
        'use strict';
        window.addEventListener('load', function()
        {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form)
          {
            form.addEventListener('submit', function(event)
            {
              if (form.checkValidity() === false)
              {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
    <script>
      var uptarg = document.getElementById('drag-drop-area');
      if (uptarg)
      {
        var uppy = Uppy.Core().use(Uppy.Dashboard,
        {
          inline: true,
          target: uptarg,
          proudlyDisplayPoweredByUppy: false,
          theme: 'dark',
          width: 770,
          height: 210,
          plugins: ['Webcam']
        }).use(Uppy.Tus,
        {
          endpoint: 'https://master.tus.io/files/'
        });
        uppy.on('complete', (result) =>
        {
          console.log('Upload complete! We’ve uploaded these files:', result.successful)
        });
      }
    </script>
    <script src="dashboard/js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    
  </body>
</html>