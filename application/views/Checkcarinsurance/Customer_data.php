<style>
   .modal-backdrop {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1040;
    background-color: #000;
}
.modal-backdrop.in {
    filter: alpha(opacity=50);
    opacity: .5;
}
</style>

<form id="FormCheckpremium" name="FormCheckpremium" method="POST">
    <div class="row" id="checkInsurance_premium">
        <div class="container">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">เลือกประกันรถตามงบ</h3>
                    <button class="close" data-dismiss="modal"  aria-hidden="true" type="button" onclick="document.getElementById('checkInsurance_premium').style.display = 'none';">&times;</button>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>ยี่ห้อรถยนต์</label>
                                <select class="form-control" id="car_brand" name="car_brand" onchange="show_Carmodel()">
                                    <option value="0">-- เลือกยี่ห้อรถยนต์ --</option>
                                    <?php foreach ($Brandcar as $item) { ?>
                                        <option value="<?php echo iconv('TIS-620', 'UTF-8', $item->CarBrand); ?>"><?php echo iconv('TIS-620', 'UTF-8', $item->CarBrand); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>รุ่นรถยนต์</label>
                                <select class="form-control" id="Car_modil" name="Car_modil" disabled="true" onchange="show_YearGroup()">
                                    <option value="0">-- เลือกรุ่นรถยนต์ --</option>
                                </select>								
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>ปีรถยนต์</label>
                                <select class="form-control " disabled="true" id="YearGroup" name="YearGroup"  onchange="show_TypeCar()">
                                    <option value="0">-- เลือกปีรถยนต์ --</option>

                              </select>
                               <input type="text" class="form-control form-control-sm" id="MakeDescription" name="MakeDescription" style="display:none;">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>ประเภทการใช้รถยนต์</label>
                                <select class="form-control" disabled="true" id="Type_Car" name="Type_Car">    
                                    <option value="0">-- เลือกประเภทการใช้รถยนต์ --</option>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <center><button type="button" class="btn btn-primary" onclick="Sum_Check()">เช็คเบี้ยประกันภัย</button></center>
                </div>
            </div>
        </div>
    </div> 
</form>


<script type="text/javascript">
    function Sum_Check() {

        var car_brand = document.getElementById('car_brand').value;
        var Car_modil = document.getElementById('Car_modil').value;
        var YearGroup = document.getElementById('YearGroup').value;
        var Type_Car = document.getElementById('Type_Car').value;
	var MakeDescription = document.getElementById('MakeDescription').value;

        var datas = "car_brand=" + car_brand + "&Car_modil=" + Car_modil + "&YearGroup=" + YearGroup + "&Type_Car=" + Type_Car+ "&MakeDescription=" + MakeDescription;

        if (car_brand == 0) {
            alert("กรุณากรอกยี่ห้อรถยนต์");
            $('#car_brand').focus();
            document.getElementById("car_brand").style = "border: 1px red solid;";
        } else if (Car_modil == 0) {
            alert("กรุณากรอกรุ่นรถยนต์");
            $('#Car_modil').focus();
            document.getElementById("Car_modil").style = "border: 1px red solid;";
        } else if (YearGroup == 0) {
            alert("กรุณากรอกปีรถยนต์");
            $('#YearGroup').focus();
            document.getElementById("YearGroup").style = "border: 1px red solid;";
        } else if (Type_Car == 0) {
            alert("กรุณากรอกประเภทการใช้รถยนต์ ");
            $('#Type_Car').focus();
            document.getElementById("Type_Car").style = "border: 1px red solid;";
        } else {
            document.getElementById("loadding").style.display = "block"; 
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('HomeInsurance/Check_chip') ?>",
                data: $("#FormCheckpremium").serialize(),
            }).done(function (data) {
		document.getElementById("loadding").style.display = "none";
                $('#Check_insurance').html(data);               
            })
        }
    }
</script>




<script type="text/javascript">
    function show_Carmodel() {

        document.getElementById("Car_modil").disabled = false;
        var car_brand = document.getElementById('car_brand').value;
        var datas = "car_brand=" + car_brand;
         document.getElementById("loadding").style.display = "block"; 
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('HomeInsurance/Check_Car_Model') ?>",
            data: datas,
        }).done(function (data) {
             document.getElementById("loadding").style.display = "none";
            $('#Car_modil').html(data);
                
        })
    }
</script>


<script type="text/javascript">
    function show_YearGroup() {

        document.getElementById("YearGroup").disabled = false;
	
        var Car_modil = document.getElementById('Car_modil').value;
        var datas = "Car_modil=" + Car_modil;
        document.getElementById("loadding").style.display = "block"; 
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('HomeInsurance/Check_Year_Car') ?>",
            data: datas,
        }).done(function (data) {
            $('#YearGroup').html(data);
            document.getElementById("loadding").style.display = "none"; 
        })
    }
</script>


<script type="text/javascript">
    function show_TypeCar() {
   
        document.getElementById("Type_Car").disabled = false;

        var car_brand = document.getElementById('car_brand').value;
        var Car_modil = document.getElementById('Car_modil').value;
        var YearGroup = document.getElementById('YearGroup').value;

        var datas = "car_brand=" + car_brand + "&Car_modil=" + Car_modil + "&YearGroup=" + YearGroup;
        document.getElementById("loadding").style.display = "block";
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('HomeInsurance/Check_Typecar') ?>",
            data: datas,
        }).done(function (data) {
            document.getElementById("loadding").style.display = "none"; 
            $('#Type_Car').html(data);
            
        })
    }
</script>


<!--script loading-->
<script>
    document.getElementById('loadding').style.display = "none";
</script>

<!-- 15 นาที ออกจากระบบ--> 
<script>
    var timeout;
    document.onmousemove = function () {
        clearTimeout(timeout);
        timeout = setTimeout(function () {
            window.location.href = "<?php echo site_url('HomeInsurance/Logout'); ?>";
        }, 900000); //1นาที = 60000 หน่วย = 60000 x 15นาที = 900000 หน่วย
    }
</script>
<!-- END 15 นาที ออกจากระบบ-->