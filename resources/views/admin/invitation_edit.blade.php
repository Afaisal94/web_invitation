@extends('layouts.app')

@section('content')

<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 50px auto;
  margin-top: 0px;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Invitation') }}</div>

                    <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="regForm" method="post" action="{{ url('/invitations/update', $invitation->id) }}" enctype="multipart/form-data">
                    @csrf
                    <!-- One "tab" for each step in the form: -->
                    <div class="tab"><h2 style="">Data Invitation:</h2><br>
                        <div class="form-group">
                        <label>Select Theme:</label>
                        <select name="theme_id" class="form-control">
                            <option value="{{ $theme_id }}"> {{ $theme_name }} </option>
                        @foreach ($themes as $theme)
                            <option value="{{ $theme->id }}">{{ $theme->theme_name }}</option>
                        @endforeach
                        </select>
                        </div>  
                        <div class="form-group">
                        <label>Wedding Date:</label>
                        <input type="date" class="form-control" name="wedding_date" value="{{ $invitation->wedding_date }}">
                        </div> 
                        <div class="form-group">
                        <label>Wedding Time:</label>
                        <input type="text" class="form-control" name="wedding_time" placeholder="Ex: 10.00 WIB" value="{{ $invitation->wedding_time }}">
                        </div>
                        <div class="form-group">
                        <label>Location:</label>
                        <textarea class="form-control" name="location"> {{ $invitation->location }} </textarea>
                        </div> 
                        <div class="form-group">
                        <label>Google Map Embed:</label>
                        <textarea class="form-control" name="gmap_code"> {{ $invitation->gmap_code }} </textarea>
                        </div> 
                        <div class="form-group">
                        <label>Slug:</label>
                        <input type="text" class="form-control" name="slug" placeholder="Ex: anna&james" value="{{ $invitation->slug }}" readonly>
                        </div>                       
                    </div>
                    <div class="tab"><h2 style="">Data Groom:</h2><br>
                        <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="name_groom" value="{{ $groom->name }}">
                        </div> 
                        <div class="form-group">
                        <label>Nickname:</label>
                        <input type="text" class="form-control" name="nickname_groom" value="{{ $groom->nickname }}">
                        </div> 
                        <div class="form-group">
                        <label>Father Name:</label>
                        <input type="text" class="form-control" name="father_groom" value="{{ $groom->father_name }}">
                        </div>
                        <div class="form-group">
                        <label>Mother Name:</label>
                        <input type="text" class="form-control" name="mother_groom" value="{{ $groom->mother_name }}">
                        </div>
                        <div class="form-group">
                        <label>Groom's Photo:</label>
                        <br><img style="width:100px" class="img-fluid" src="{{ url('/wedding_photo/'.$groom->photo) }}"><br>
                        <input type="file" class="form-control" name="photo_groom" value="{{ $groom->photo }}">
                        </div>                      
                    </div>
                    <div class="tab"><h2 style="">Data Bridge:</h2><br>
                        <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="name_bridge" value="{{ $bridge->name }}">
                        </div> 
                        <div class="form-group">
                        <label>Nickname:</label>
                        <input type="text" class="form-control" name="nickname_bridge" value="{{ $bridge->nickname }}">
                        </div> 
                        <div class="form-group">
                        <label>Father Name:</label>
                        <input type="text" class="form-control" name="father_bridge" value="{{ $bridge->father_name }}">
                        </div>
                        <div class="form-group">
                        <label>Mother Name:</label>
                        <input type="text" class="form-control" name="mother_bridge" value="{{ $bridge->mother_name }}">
                        </div>
                        <div class="form-group">
                        <label>Bridge's Photo:</label>
                        <br><img style="width:100px" class="img-fluid" src="{{ url('/wedding_photo/'.$bridge->photo) }}"><br>
                        <input type="file" class="form-control" name="photo_bridge">
                        </div>                      
                    </div>
                    
                    <div style="overflow:auto;">
                        <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                        </div>
                    </div>
                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>

                    </form>

                    <script>
                    var currentTab = 0; // Current tab is set to be the first tab (0)
                    showTab(currentTab); // Display the current tab

                    function showTab(n) {
                    // This function will display the specified tab of the form...
                    var x = document.getElementsByClassName("tab");
                    x[n].style.display = "block";
                    //... and fix the Previous/Next buttons:
                    if (n == 0) {
                        document.getElementById("prevBtn").style.display = "none";
                    } else {
                        document.getElementById("prevBtn").style.display = "inline";
                    }
                    if (n == (x.length - 1)) {
                        document.getElementById("nextBtn").innerHTML = "Update";
                    } else {
                        document.getElementById("nextBtn").innerHTML = "Next";
                    }
                    //... and run a function that will display the correct step indicator:
                    fixStepIndicator(n)
                    }

                    function nextPrev(n) {
                    // This function will figure out which tab to display
                    var x = document.getElementsByClassName("tab");
                    // Exit the function if any field in the current tab is invalid:
                    if (n == 1 && !validateForm()) return false;
                    // Hide the current tab:
                    x[currentTab].style.display = "none";
                    // Increase or decrease the current tab by 1:
                    currentTab = currentTab + n;
                    // if you have reached the end of the form...
                    if (currentTab >= x.length) {
                        // ... the form gets submitted:
                        document.getElementById("regForm").submit();
                        return false;
                    }
                    // Otherwise, display the correct tab:
                    showTab(currentTab);
                    }

                    function validateForm() {
                    // This function deals with validation of the form fields
                    var x, y, i, valid = true;
                    x = document.getElementsByClassName("tab");
                    y = x[currentTab].getElementsByTagName("input");
                    // A loop that checks every input field in the current tab:
                    
                    // If the valid status is true, mark the step as finished and valid:
                    if (valid) {
                        document.getElementsByClassName("step")[currentTab].className += " finish";
                    }
                    return valid; // return the valid status
                    }

                    function fixStepIndicator(n) {
                    // This function removes the "active" class of all steps...
                    var i, x = document.getElementsByClassName("step");
                    for (i = 0; i < x.length; i++) {
                        x[i].className = x[i].className.replace(" active", "");
                    }
                    //... and adds the "active" class on the current step:
                    x[n].className += " active";
                    }
                    </script>

                    </div>
            </div>
        </div>
    </div>
</div>
@endsection