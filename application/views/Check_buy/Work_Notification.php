
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}




input {
 /* padding: 10px;*/
  width: 100%;
  font-size: 14px;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
/*input.invalid {
  background-color: #ffdddd;
}
*/
/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 14px;
  cursor: pointer;
  /*height: 40px;*/
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
  font-size: 14px;

}

/* Make circles that indicate the steps of the form: */
.step {
  height: 25px;
  width: 25px;
  margin: 0 2px;
  background-color:  red;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.3;
}

.step.active {
  opacity: 1;
}

.step.finish {
  background-color: #4CAF50;

}#formfollow{
  font-size: 13px;
}b{
  font-size: 18px;
}.nextBtn{
  width: 20%;
   font-size: 14px;
}.input-group-text{
  background-color: #FFF;padding-right:5px;padding-left:5px;padding-top:3px;padding-bottom:2px;
}

</style>







            <div class="card card-danger">
                <div style="padding: 10px;">
                  <div id="show"></div>
                   <div class="tab" id="page1">
                      <div class="card-header">
                          <h3 class="card-title">ข้อมูลผู้เอาประกัน</h3>
                       </div>
                        <?php $this->load->view('Check_buy/SubWork_Notification/Sub_personal'); ?>
                    </div> 
                    <div class="tab" id="page2">
                       <div class="card-header">
                          <h3 class="card-title">ข้อมูลรถยนต์</h3>
                       </div>
                        <?php $this->load->view('Check_buy/SubWork_Notification/Sub_datacar'); ?>
                    </div>
                     <div class="tab" id="page3">
                       <div class="card-header">
                          <h3 class="card-title">ที่อยู่สำหรับส่งเอกสาร</h3>
                       </div>
                        <?php $this->load->view('Check_buy/SubWork_Notification/Sub_Address_send_doc'); ?>
                    </div>
                     <div class="tab" id="page4">
                       <div class="card-header">
                          <h3 class="card-title">ที่อยู่กรมธรรม์</h3>
                       </div>
                        <?php $this->load->view('Check_buy/SubWork_Notification/Sub_policy_address'); ?>
                    </div>
                     <div class="tab" id="page5">
                       <div class="card-header">
                          <h3 class="card-title">รายการการชำระเงิน</h3>
                       </div>
                        <?php $this->load->view('Check_buy/SubWork_Notification/Sub_listcash'); ?>
                    </div>
                    <div style="text-align:center;margin-top:10px;">
                        <span class="step">1</span>
                        <span class="step">2</span>
                        <span class="step">3</span>
                        <span class="step">4</span>
                    </div><br>
                    <div style="height:25px;">
                        <div style="float:right;">
                          <button type="button" id="prevBtn" onclick="nextPrev(-1)" style="height:35px;padding-bottom: 30px;">Previous</button>
                          <button type="button" id="nextBtn" onclick="nextPrev(1)" style="background-color:#dc3545;height:35px;padding-bottom: 30px;">Next</button>
                        </div>
                    </div>
                    

                </div>  
            </div>

            <input type="hidden" name="txt_pospeclist" id="txt_pospeclist" value="<?php echo $PROSPECT_LIST_ID?>">




<div id="show"></div>


<script type="text/javascript">
    function funcSave() {
      document.getElementById("loadding").style.display = "block";

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('Check_buy/Save_Worknotification') ?>",
            data: $("#frmmodalshow").serialize(),
        }).done(function (data) {
              document.getElementById("loadding").style.display = "none";
               document.getElementById("modalshow").style.display = "none"; 
              $('#checkInsurance_premium').html(data); //show  checkInsurance_premium
             alert("บันทึกข้อมูลสำเร็จ");
        })
    }
</script>
<script type="text/javascript">
    function FuncSameAddress() {

        var number = document.getElementById("number").value;
        var moo = document.getElementById("moo").value;
        var village = document.getElementById("village").value;
        var soi = document.getElementById("soi").value;
        var road = document.getElementById("road").value;
        var province = document.getElementById("province").value;
        var district = document.getElementById("district").value;
        var subdistrict = document.getElementById("subdistrict").value;
        var zip = document.getElementById("zip").value;

        var txtAumphur = document.getElementById("txtnumphur").value;
        var txttumbon = document.getElementById("txttumbon").value;
        var txtprovince = document.getElementById("txtprovince").value;
        var datas = "txtAumphur=" + txtAumphur + "&txttumbon=" + txttumbon + "&txtprovince=" + txtprovince;


        if (document.getElementById("same_address").checked == true) {

            document.getElementById("policy_number").value = number;
            document.getElementById("policy_moo").value = moo;
            document.getElementById("policy_village").value = village;
            document.getElementById("policy_soi").value = soi;
            document.getElementById("policy_road").value = road;
            document.getElementById("policy_province").value = province;
            document.getElementById("policy_district").value = district;
            document.getElementById("policy_subdistrict").value = subdistrict;
            document.getElementById("policy_zip").value = zip;

             $.ajax({
            type:"POST",
            url:"<?php echo site_url('Check_buy/selectbox')?>",
            data:datas
        }).done(function(json){ 
             myObj = JSON.parse(json);
              $("#policy_district option").remove();
              $("#policy_subdistrict option").remove();
              $("#policy_province option").remove();

              $("#policy_district").append('<option value="'+ myObj[0].Get_Amphur_id +'">' + myObj[0].Get_Amphur + '</option>');
              $("#policy_subdistrict").append('<option value="'+ myObj[0].Get_Tumbon_id +'">' + myObj[0].Get_Tumbon + '</option>');
              $("#policy_province").append('<option value="'+ myObj[0].Get_Province_id +'">' + myObj[0].Get_Province + '</option>');
          }) 



          



        } else {//ถ้าไม่ถูกติ๊กก้อให้เลือกจังหวัดใหม่

          
            var datas = "";
            document.getElementById("policy_number").value = "";
            document.getElementById("policy_moo").value = "";
            document.getElementById("policy_village").value = "";
            document.getElementById("policy_soi").value = "";
            document.getElementById("policy_road").value = "";
            document.getElementById("policy_province").value = 0;
            document.getElementById("policy_district").value = 0;
            document.getElementById("policy_subdistrict").value = 0;
            document.getElementById("policy_zip").value = "";
  
             $.ajax({
              type:"POST",
              url:"<?php echo site_url('HomeInsurance/PROVINCE') ?>",
              data:datas
            }).done(function(data){ 
            
              $('#policy_province').html(data);

              }) 

        }




    }
</script>
<script>
  
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
       


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

        var x = document.getElementsByClassName("tab");


        if (n == 1 && !validateForm())
            return false;
        x[currentTab].style.display = "none";
        currentTab = currentTab + n;


        if (currentTab >= x.length) { //คำสั่งให้ รู้จำนวนแท็บและเมื่อรู้ให้ใส่ submit หน้าสุดท้าย
            document.getElementById("frmmodalshow").submit();
            return false;
        }

        showTab(currentTab);
    }


    function validateForm() {


        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
       
       var number        = document.getElementById("number").value;
       var province      = document.getElementById("province").value;
       var district      = document.getElementById("district").value;
       var subdistrict   = document.getElementById("subdistrict").value;
       var zip           = document.getElementById("zip").value;
       var contact       = document.getElementById("contact").value;
       var phone         = document.getElementById("phone").value;
       var datacar_paper = document.getElementById("datacar_paper").value; //ทะเบียนรถยนต์
       var amount_install = document.getElementById("amount_install").value;
       var typepay      = document.getElementById("typepay").value;
       var datacar_number   = document.getElementById("datacar_number").value; //เลขถัง
       var datacar_no       = document.getElementById("datacar_no").value;  //เลขเครื่องยนต์
       var policy_number    = document.getElementById("policy_number").value;
       var policy_province  = document.getElementById("policy_province").value; 
       var policy_district  = document.getElementById("policy_district").value; 
       var policy_subdistrict = document.getElementById("policy_subdistrict").value; 
       var policy_zip = document.getElementById("policy_zip").value; 


       var checkpage_1  = $("#page1").css("display");
       var checkpage_2  = $("#page2").css("display");
       var checkpage_3  = $("#page3").css("display");
       var checkpage_4  = $("#page4").css("display");
       var checkpage_5  = $("#page5").css("display");

       if(checkpage_1 == "block"){ // ข้อมูลผู้เอาประกัน         
                document.getElementsByClassName("step")[currentTab].className += " finish";
                return valid;
             

       }else if(checkpage_2 == "block"){ //ข้อมูลรถยนต์
    
            if(datacar_number == ""){
               document.getElementById("datacar_number").focus();
         
            }else if(datacar_no == ""){
                document.getElementById("datacar_no").focus();
            }else{
                document.getElementsByClassName("step")[currentTab].className += " finish";
                return valid;
            }

       }else if(checkpage_3 == "block"){ //ที่อยู่สำหรับส่งเอกสาร

        if(number == ""){
           document.getElementById("number").focus();

        }else if(province == "" || province == 0){
           document.getElementById("province").focus();

        }else if(district == "" || district == 0){
           document.getElementById("district").focus();

        }else if(subdistrict == "" || subdistrict == 0){
           document.getElementById("subdistrict").focus();

        }else if(zip == ""){
           document.getElementById("zip").focus();

        }else if(contact == ""){
           document.getElementById("contact").focus();

        }else if(phone ==""){
           document.getElementById("phone").focus();

        }else{
           document.getElementsByClassName("step")[currentTab].className += " finish";
           return valid;
         }
           
      
       }else if(checkpage_4 == "block"){ //ที่อยู่กรมธรรม์

        if(policy_number == ""){
             document.getElementById("policy_number").focus();
        }else if(policy_province == ""){
             document.getElementById("policy_province").focus();
        }else if(policy_district == "" || policy_district == 0){
             document.getElementById("policy_district").focus();
        }else if(policy_subdistrict == "" || policy_subdistrict == 0){
             document.getElementById("policy_subdistrict").focus();
        }else if(policy_zip == ""){
             document.getElementById("policy_zip").focus();
        }else{

           document.getElementsByClassName("step")[currentTab].className += " finish";
           return valid;
        }



            
         

       }else if(checkpage_5 == "block"){ //รายการการชำระเงิน:

        // if(typepay == "เงินสด"){
        //      funcSave();
        // }else{
        //     if(amount_install < 1 || amount_install > 6){
        //       alert("จำนวนงวดไม่ถูกต้อง");
        //       document.getElementById("amount_install").focus();
        //     }else{
        //       
        //     }

        // }
                  funcSave();
  
       }



    }

    function fixStepIndicator(n) {



        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }

        x[n].className += " active";
    }
</script>
<script type="text/javascript">
 function chkNumber(ele){
    var vchar = String.fromCharCode(event.keyCode);
    if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
    ele.onKeyPress=vchar;
}
</script>



