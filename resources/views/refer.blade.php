@extends('layouts.dashboard')
@section('content')


<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="h3 mb-4 page-title">Refer Now</h2>
              <p class="h5">Refer to your friend and receive a reward of Kes. 250.00 when they activate their account.</p>
              <br>
              <p class="p">Share this code with your friend and once they install this app and activate their account, you will receive Kes. 250.00 as a reward.</p>
              <div class="card-deck my-4">
                
                <div class="card mb-4">
                  <div class="card-body text-center my-4">
                  <center><input class="form-control" type="text" readonly value="{{$code}}" id="myInput" onclick="myFunction()">
                  </center>
                    <br>  
                    <script>
                    function myFunction() {
                    // Get the text field
                    var copyText = document.getElementById("myInput");

                    // Select the text field
                    copyText.select();
                    copyText.setSelectionRange(0, 99999); // For mobile devices

                    // Copy the text inside the text field
                    navigator.clipboard.writeText(copyText.value);

                    // Alert the copied text
                    alert("Referal Code copied: " + copyText.value);
                    }
                    </script>  
                    
                    <a class="btn mb-2 btn-success btn-lg" href="whatsapp://send?text=Hey, checkout this amazing from DigiPay! <?php echo URL::to('/'); ?>/register?refered_by={{$code}}" data-action="share/whatsapp/share"> Refer a friend</a>

                    
                  </div> <!-- .card-body -->
                </div> <!-- .card -->
              </div> <!-- .card-group -->


              </div>
      </main> <!-- main -->
    </div> <!-- .wrapper -->

@endsection