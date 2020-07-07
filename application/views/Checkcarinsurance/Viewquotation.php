
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo base_url(); ?>assets/DataTables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"> 
<script src="<?php echo base_url(); ?>assets/DataTables/js/jquery.dataTables.min.js"></script>
<link href="<?php echo base_url(); ?>assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!--model-->
<style>
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
    }#example{
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


    }


</style>

<div class="row" id="checkInsurance_premium">
    <?php $this->load->view('Checkcarinsurance/Table_Viewquotation'); ?>
</div>




<div class="modal fade" id="modal-xl" style=" margin-top:0px;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="padding: 5px;">
                <h4 class="modal-title" id="Head"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="Show_Interested"  name="Show_Interested">
                <form class="" id='editemployee'>

                </form>
            </div>

        </div>       
    </div>
</div>


<script>
    function Home_Detailed(PROSPECT_LIST_ID, IDCard, NameUser, Insurance_Price, Namecompany, Type_ID, PaymentType, CarLicensePlateProvince, TransStatus, StatusButton) {
        var data = "";
        $('#editemployee').html(data);
        document.getElementById("loadding").style.display = "block";
        document.getElementById("Head").innerHTML = "กรอกข้อมูลประกันภัย";
        document.getElementById('Show_Interested').style.display = "block"; //ให้ modal แสดง
        var datas = "PROSPECT_LIST_ID=" + PROSPECT_LIST_ID + "&IDCard=" + IDCard + "&NameUser=" + NameUser + "&Insurance_Price=" + Insurance_Price + "&Namecompany=" + Namecompany + "&Type_ID=" + Type_ID + "&PaymentType=" + PaymentType + "&CarLicensePlateProvince=" + CarLicensePlateProvince + "&TransStatus=" + TransStatus + "&StatusButton=" + StatusButton;

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('HomeInsurance/Work_Notification') ?>",
            data: datas,
        }).done(function (data) {
            document.getElementById("loadding").style.display = "none";
            $('#editemployee').html(data);
            $(".modal-backdrop").css("display", "none");
        })
    }
</script>
<script type="text/javascript">
    function funcRemark(PROSPECT_LIST_ID, Remark) {


        document.getElementById("Head").innerHTML = "หมายเหตุ";
        document.getElementById('Show_Interested').style.display = "block";
        document.getElementById("editemployee").innerHTML = Remark;

    }
</script>
<script type="text/javascript">
    function UploadSlip(PROSPECT_LIST_ID, Insurance_price, payfirst, PaymentType) {


        var data = "";
        $('#editemployee').html(data);

        document.getElementById("loadding").style.display = "block";

        document.getElementById("Head").innerHTML = "Slip";
        var datas = "PROSPECT_LIST_ID=" + PROSPECT_LIST_ID + "&Insurance_price=" + Insurance_price + "&payfirst=" + payfirst + "&PaymentType=" + PaymentType;

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('HomeInsurance/Upload_Slip') ?>",
            data: datas,
        }).done(function (data) {
            document.getElementById("loadding").style.display = "none";
            $('#editemployee').html(data);
            $(".modal-backdrop").css("display", "none");
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
    function Home_Payment(PRO, C) {
        window.open("<?php echo site_url('Preview_controllers/Get_Payment'); ?>?PRO=" + PRO + "&C=" + C, '_blank');
    }
</script>

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
    $(function () {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('.swalDefaultInfo').click(function () {
            Toast.fire({
                type: 'info',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });

    });

</script>


<!-- 15 นาที ออกจากระบบ--> 
<script>
    var timeout;
    document.onmousemove = function () {
        clearTimeout(timeout);
        timeout = setTimeout(function () {
            window.location.href = "<?php echo site_url('HomeInsurance/Logout'); ?>";
        }, 600000); //1นาที = 60000 หน่วย = 60000 x 15นาที = 900000 หน่วย
    }
</script>
<!-- END 15 นาที ออกจากระบบ-->

