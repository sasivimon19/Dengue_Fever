<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
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


<div class="panel-heading " style=" background-color:#b30000; color: #fefefe; ">
    <button class="close" data-dismiss="modal"  aria-hidden="true" type="button" onclick="document.getElementById('mobile_view_Confirm').style.display = 'none';">&times;</button>
    <div style="font-size: 23px;" class="panel-title" style="color:  #0099ff; font-size: 18px;"> กรอกข้อมูล </div>
</div>

<div id="mobile_model" style="position: -webkit-sticky;  position: sticky;  ">
    <div class="panel-body">
           <div id="regForm" style=" margin-top: -2.5%; position: -webkit-sticky;  position: sticky;">
            <h4>ข้อมูลผู้เอาประกันภัย : </h4>
            <br>
            <div class="tab">
                <div class=" row">
                    <div class="col-md-4">
                        <p>
                             <label>เลขบัตรประชาชน :</label>
                             <input  class="form-control" placeholder=" เลขบัตรประชาชน " id="ID_Cardnumber" name="ID_Cardnumber" >
                        </p>
                        <p>
                             <label>ชื่อผู้เอาประกัน :</label>
                             <input class="form-control" type="text" placeholder="Last name..." oninput="this.className = ''" name="lname">
                        </p>
                        <p>
                            <label>วันเกิด :</label>
                            <input class="form-control" type="date" placeholder="First name..." oninput="this.className = ''" name="fname">
                        </p>
                        <p>
                            <label>ชื่อผู้ขับขี่ที่ 1 :</label>
                            <input class="form-control" placeholder="Last name..." oninput="this.className = ''" name="lname">
                        </p>
                             <p>
                            <label>ชื่อผู้เอาประกัน :</label>
                            <input class="form-control" placeholder="First name..." oninput="this.className = ''" name="fname">
                        </p>
                    </div>
                  <div class="col-md-4">          
                        <p>
                             <label>เลขบัตรประชาชน :</label>
                            <input class="form-control" placeholder="First name..."  name="fname">
                        </p>
                        <p>
                             <label>ชื่อผู้เอาประกัน :</label>
                            <input class="form-control" placeholder="Last name..." oninput="this.className = ''" name="lname">
                        </p>
                        <p>
                            <label>ชื่อผู้เอาประกัน :</label>
                            <input class="form-control" placeholder="First name..." oninput="this.className = ''" name="fname">
                        </p>
                        <p>
                            <label>นามสุกล :</label>
                            <input class="form-control" placeholder="Last name..." oninput="this.className = ''" name="lname">
                        </p>
                                    <p>
                            <label>นามสกุลผู้ขับขี่ที่ 1 :</label>
                            <input class="form-control" placeholder="Last name..." oninput="this.className = ''" name="lname">
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p>
                           <label>คำนำหน้า : </label>
                            <select class="form-control">
                                <option value="0">--- เลือกคำนำหน้า---</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="นาง">นาง</option>
                                <option value="นาย">นาย</option>
                            </select>  
                        </p>
                           
                          <p>
                            <label>นามสุกล :</label>
                            <input class="form-control" placeholder="Last name..." oninput="this.className = ''" name="lname">
                        </p>
                         <p>
                            <label>นามสุกล :</label>
                            <input class="form-control" placeholder="Last name..." oninput="this.className = ''" name="lname">
                        </p>
                         <p>
                             <label>อายุ :</label>
                            <input class="form-control" placeholder="Last name..." oninput="this.className = ''" name="lname">
                        </p>
               
                    </div>
                </div>
            </div>
            <div class="tab">Contact Info:
                <p><input placeholder="E-mail..." oninput="this.className = ''" name="email"></p>
                <p><input placeholder="Phone..." oninput="this.className = ''" name="phone"></p>
            </div>
            
            <div class="tab">Birthday:
                <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
                <p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
                <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
            </div>
            
            <div class="tab">Login Info:
                <p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>
                <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>
            </div>
            
            <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                </div>
            </div>
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center; margin-bottom: -60px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>
        </div>
    </div>
</div> 

<div class="modal-footer" style=" background-color:#b30000;">
    <button  data-dismiss="modal" class="btn btn-warning" aria-hidden="true" type="button"  onclick="document.getElementById('mobile_view_Confirm').style.display = 'none';">ออก</button>
</div>


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
    document.getElementById("nextBtn").innerHTML = "Submit";
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
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
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
