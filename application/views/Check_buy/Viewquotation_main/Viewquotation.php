
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--model-->
        <style>
      /* Full-width input fields */
/* Full-width input fields */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
#example{
                font-size: 13px;
            }#btn1,#btnpay{
                /*background-color: #ff9900;*/
                font-size: 13px;
                 white-space:nowrap;
            }#example td, th{
                text-align: center; white-space:nowrap;
            }* {
  box-sizing: border-box;
}

 
.column  {
  float: left;
  width: 50%;
  padding: 10px;

  height: 500px; /* Should be removed. Only for demonstration */
   border-style: ridge;
  border-radius: 5px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
     margin-top: 10%
  }#btn{
    width: 100%;
    margin-top: 5px;
  }
}.btn-app {
    border-radius: 3px;
    margin: 0 0 10px 10px;
    min-width: 80px;
    padding: 6px 6px;
    position: relative;
    text-align: center;
    white-space: nowrap;
    width:13%;height:30px;background-color:#aeb5bb;border:1px solid #a9a1a1


}html {
  /*overflow: -moz-scrollbars-vertical; 
  overflow-y: scroll;*/
}
#loadding2{
            position: fixed;
            left: 0px;
            width: 100%;
            height: 100%;
            padding-left:45%;
            padding-top: 15%;

            }
          .modalloadding {
            display: none; 
            position: fixed;  
            height:100%; 
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4); 

    }

</style>

    <div id="loadding" class="modalloadding" style="display: none">
        <img src="<?php echo base_url();?>assets/images/loader.gif">
    </div>

      <div class="row" id="checkInsurance_premium">
        <?php $this->load->view('Check_buy/Viewquotation_main/Table_Viewquotation'); ?>

      </div>
   
<style >
     .modal {
        display: none; /* Hidden by default */
        position: fixed;  /*Stay in place 
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        padding-top: 40px;
        overflow: auto;
    }
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 500%; /* Could be more or less, depending on screen size */
    }body{

    }

</style>


 <div id="modalshow" class="modal" style="">
  <form class="modal-content animate" id='frmmodalshow' style="width: 85%;height:auto;margin-top:1%;overflow: auto;" >


  </form>
</div>

      <script>
      var modal = document.getElementById('modalshow');
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      }
      </script>
        <script>
            function Home_Detailed(PROSPECT_LIST_ID,IDCard,NameUser,Insurance_Price,Namecompany,Type_ID,PaymentType,CarLicensePlateProvince,TransStatus,StatusButton,head) {


                var data  ="";
              $('#frmmodalshow').html(data);

               document.getElementById("modalshow").style.display = "block";
         
               // document.getElementById("Head").innerHTML  = "กรอกข้อมูลประกันภัย";
               

            
                var datas = "PROSPECT_LIST_ID=" + PROSPECT_LIST_ID+"&IDCard="+IDCard+"&NameUser="+NameUser+"&Insurance_Price="+Insurance_Price+"&Namecompany="+Namecompany+"&Type_ID="+Type_ID+"&PaymentType="+PaymentType+"&CarLicensePlateProvince="+CarLicensePlateProvince+"&TransStatus="+TransStatus+"&StatusButton="+StatusButton+"&head="+head;

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('Check_buy/Work_Notification') ?>",
                    data: datas,
                }).done(function (data) {
                  
                    $('#frmmodalshow').html(data);
                     
                    
                
                })
            }
        </script>

        <script type="text/javascript">
            function funcRemark(PROSPECT_LIST_ID,Remark,head){

               document.getElementById('modalshow').style.display = "block";
               // document.getElementById("frmmodalshow").innerHTML  = Remark;

               var datas = "PROSPECT_LIST_ID="+PROSPECT_LIST_ID+"&Remark="+Remark+"&head="+head;

               $.ajax({
                  type: "POST",
                  url: "<?php echo site_url('Check_buy/Remark') ?>",
                  data: datas,
                }).done(function (data) {  

                  $('#frmmodalshow').html(data);
                })

             
            }
        </script>
       
        <script type="text/javascript">
         function UploadSlip(PROSPECT_LIST_ID,Insurance_price,payfirst,PaymentType,head,PeriodNumber,TransactionID,Date_Payment,Total_FirstPayment,Installment){

           
           var data  ="";
            $('#frmmodalshow').html(data);

           document.getElementById("modalshow").style.display = "block";
            // document.getElementById("Head").innerHTML  = "Slip";           
          var datas = "PROSPECT_LIST_ID="+PROSPECT_LIST_ID+"&Insurance_price="+Insurance_price+"&payfirst="+payfirst+"&PaymentType="+PaymentType+"&head="+head+"&PeriodNumber="+PeriodNumber+"&TransactionID="+TransactionID+"&Date_Payment="+Date_Payment+"&Total_FirstPayment="+Total_FirstPayment+"&Installment="+Installment;
             $.ajax({
              type: "POST",
              url: "<?php echo site_url('Check_buy/Upload_Slip') ?>",
              data: datas,
            }).done(function (data) {  

              $('#frmmodalshow').html(data);
            })
        }
      </script>
  

      <script>
        function Opencompany() {

            var prefix = document.getElementById('prefix').value;

            if (document.getElementById('prefix').value == "บริษัท") {
                document.getElementById('Code_Company').style.display = 'block';
                document.getElementById('ID_Cardnumber').style.display = 'none';
            } else {
                document.getElementById('Code_Company').style.display = 'none';
                document.getElementById('ID_Cardnumber').style.display = 'block';
            }
        }
    </script>


        <script>
    function Insurance_Notification() {
        document.getElementById("loadding").style.display = "block";
        document.getElementById('mobile_view_Confirm').style.display = "block"; //ให้ modal แสดง
        var datas = "";
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('Work_insurance/Insurance_Notification') ?>",
            data: datas,
        }).done(function (data) {
            document.getElementById("loadding").style.display = "none";
            $('#popup_view_Confirm').html(data);
        })
    }
</script>


        <script type="text/javascript">
            function Home_Preview() {
                window.open(" <?php echo site_url('Preview_controllers/Get_Preview'); ?>", '_blank');
            }
        </script>
        
    <script type="text/javascript">
    function Home_Payment(PRO, C) {
        window.open("<?php echo site_url('Preview_controllers/Get_Payment'); ?>?PRO=" + PRO + "&C=" + C, '_blank');
    }
</script>
        
        <!--<script type="text/javascript">
            function Home_Payment() {
                window.open(" <?php echo site_url('Preview_controllers/Get_Payment'); ?>", '_blank');
            }
        </script>-->

        <script type="text/javascript">
            function openamphur() {

                document.getElementById("Policy_AMPHUR").disabled = false;
                var PROVINCE_ID = document.getElementById('Policy_PROVINCE').value;
                var datas = "PROVINCE_ID=" + PROVINCE_ID;
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('HomeInsurance/FUN_AMPHUR') ?>",
                    data: datas,
                }).done(function (data) {
                    $('#Policy_AMPHUR').html(data);
                })
            }
        </script>

        <script type="text/javascript">
            function openDISTRICT() {
                document.getElementById("Policy_DISTRICT").disabled = false;
                var AMPHUR_ID = document.getElementById('Policy_AMPHUR').value;
                var datas = "AMPHUR_ID=" + AMPHUR_ID;
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('HomeInsurance/FUN_DISTRICTNAME') ?>",
                    data: datas,
                }).done(function (data) {
                    $('#Policy_DISTRICT').html(data);
                })
            }
        </script>



        <script type="text/javascript">
            function AMPHUR_DOCUMENT() {

                document.getElementById("Document_AMPHUR").disabled = false;
                var PROVINCE_ID = document.getElementById('Document_PROVINCE').value;
                var datas = "PROVINCE_ID=" + PROVINCE_ID;
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('HomeInsurance/FUN_AMPHUR') ?>",
                    data: datas,
                }).done(function (data) {
                    $('#Document_AMPHUR').html(data);
                })
            }
        </script>

        <script type="text/javascript">
            function DISTRICT_DOCUMENT() {
                document.getElementById("Document_DISTRICT").disabled = false;
                var AMPHUR_ID = document.getElementById('Document_AMPHUR').value;
                var datas = "AMPHUR_ID=" + AMPHUR_ID;
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('HomeInsurance/FUN_DISTRICTNAME') ?>",
                    data: datas,
                }).done(function (data) {
                    $('#Document_DISTRICT').html(data);
                })
            }
        </script>



<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        type: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
   
  });

</script>


 <script>
            $(document).ready( function () {
                $('#example').DataTable();
            } );
        </script>

<!-- ************************************************************************************************************* -->


