                                        
<!--start SearchsubCarInformation-->
<div class="col-md-12">     
    <div class="row" style=" margin-top: 2%;"> 
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-2">
                    <!-- select -->
                    <div class="form-group">
                        <label>ยี่ห้อรถยนต์</label>
                        <select class="form-control" id="CarBrand" name="CarBrand" onchange="Main_CarBrand()">
                            <option value="0"> -- เลือกยี่ห้อรถยนต์ --</option>
                            <?php foreach ($GetCarBrand as $value) { ?>
                                <option value="<?php echo $value->CarBrand; ?>"><?php echo $value->CarBrand; ?></option>         
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>รุ่นรถยนต์</label>
                        <select class="form-control" id="CarDesc" name="CarDesc" disabled="true" onchange="Main_CarFamilyDesc()">
                            <option value="0"> -- เลือกรุ่นรถยนต์ --</option>

                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>ปีรถยนต์</label>
                        <select class="form-control " disabled="true" id="CarYear" name="CarYear">
                            <option value="0">-- เลือกปีรถยนต์ --</option>

                        </select>
                    </div>
                </div>
                
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>บริษัท</label>
                        <select class="form-control" id="ID_InsureCode" name="ID_InsureCode" onchange="show_Packagc()">
                            <option value="0"> -- เลือกรหัสบริษัท --</option>
                            <?php foreach ($Get_Insure as $value) { ?>
                                <option value="<?php echo $value->Auto_ID ?>"><?php echo iconv('TIS-620', 'UTF-8', $value->Insure_Company) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>แพ็คเกจ</label>
                        <select class="form-control" id="IDPackag" name="IDPackag" disabled="true" onchange="show_CoverRate()">
                            <option value="0"> -- เลือกแพ็คเกจ --</option>  
                            
                        </select>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <label>รหัสความคุ้มครอง</label>

                        <select class="form-control" id="ID_CoverRate" name="ID_CoverRate" disabled="true" onchange="Main_DETAILS()">
                            <option value="0"> -- เลือกรความคุ้มครอง --</option>

                        </select>
                    </div>
                </div>

<!--                <div class="col-sm-2">
                    <div class="form-group">
                        <label>เลือกหัวข้อมค้นหา</label>
                        <select class="form-control" id="SearchsubDetail" name="SearchsubDetail"  disabled="true">
                            <option value="0"> -- เลือก --</option>
                            <option value="ID_InsureCode"> บริษัท </option>
                            <option value="ID_CoverRate"> ID ความคุ้มครอง </option>
                            <option value="IDPackage"> ID Package </option>
                        </select>
                    </div>
                </div>-->

<!--                <div class="col-sm-2">
                    <label>กรอกข้อมูล</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control rounded-0" id="SearchNamemiddle" name="SearchNamemiddle">
                        <span class="input-group-append">
                            <button type="button" class="btn btn-info btn-flat" style="background-color: #16A951;" onclick="Main_DETAILS()"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </span>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
</div>
<!--End SearchsubCarInformation-->

<div class="col-12 col-md-12">
    <div  id="Table_DetailsCar" name="Table_DetailsCar" style=" margin-top: 2%;" >
        <?php $this->load->view('SettingData/Table_DetailsCar'); ?>
    </div>
</div>


<script type="text/javascript">
    function SearchMiddle() {
        
        
        alert('12345678799');

       var CarBrand = document.getElementById('CarBrand').value;
       var CarModel = document.getElementById('CarDesc').value;
       var CarYear = document.getElementById('CarYear').value;
       var IDPackag = document.getElementById('IDPackag').value;
       var ID_InsureCode = document.getElementById('ID_InsureCode').value;
       var ID_CoverRate = document.getElementById('ID_CoverRate').value;
       var SearchsubDetail = document.getElementById('SearchsubDetail').value;
       var SearchNamemiddle = document.getElementById('SearchNamemiddle').value;
        
        var datas = "CarBrand="+CarBrand+"&CarModel="+CarModel+"&CarYear="+CarYear
        +"&ID_InsureCode="+ID_InsureCode+"&IDPackag="+IDPackag+"&ID_CoverRate="+ID_CoverRate
        +"&SearchsubDetail="+SearchsubDetail+"&SearchNamemiddle="+SearchNamemiddle;
    
        
        alert(datas);
//        if(SearchsubCarBrand == '0') {
//            $('#SearchsubCarBrand').focus();
//            document.getElementById("SearchsubCarBrand").style = "border: 1px red solid;";
//        }if (SearchsubCarModel == '0') {
//            $('#SearchsubCarModel').focus();
//            document.getElementById("SearchsubCarModel").style = "border: 1px red solid;";
//        }if (SearchsubCarYear == '0') {
//            $('#SearchsubCarYear').focus();
//            document.getElementById("SearchsubCarYear").style = "border: 1px red solid;";
//        }else {
        document.getElementById("loaddingearch").style.display = "block";
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('Management_Data/SearchCarMiddleCar') ?>",
            data: datas,
        }).done(function (data) {
            alert(datas);
            document.getElementById("loaddingearch").style.display = "none";
            $('#Table_DetailsCar').html(data);
        })
    }
//}   

</script>

        <!--
                <div class="col-md-2">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-default "  style="background-color: #44CEF6;"><b>รุ่นรถยนต์</b></button>
                        </div>
                        <select class="form-control" id="SearchsubCarModel" name="SearchsubCarModel" disabled="true" onchange="Main_CarFamilyDesc()">
                            <option value="0"> -- เลือกรุ่นรถยนต์ --</option>
        
                        </select>
                    </div>
                </div>
        
                <div class="col-md-2">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-default "  style="background-color: #44CEF6;"><b>ปีรถยนต์</b></button>
                        </div>
                        <select class="form-control" id="SearchsubCarYear" name="SearchsubCarYear">
                            <option value="0"> - เลือก -</option>
                            <option value="CarYear"> เลือกปีรถยนต์ </option>
                        </select>
                    </div>
                </div>-->

        <!--        <div class="col-md-2">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-default "  style="background-color: #44CEF6;"><b> ค้นหา</b></button>
                        </div>
                        <select class="form-control" id="SearchsubDetail" name="SearchsubDetail">
                            <option value="0"> -- เลือก --</option>
                            <option value="DetailCoverage1"> ความรับผิดต่อบุคคล </option>
                            <option value="ID_CoverRate"> ID ความคุ้มครอง </option>
                            <option value="IDPackage"> ID Package </option>
                        </select>
                    </div>
                </div>-->

        <!--        <div class="col-md-2">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="SearchNameCarInformation" name="SearchNameCarInformation">
                    </div>
                </div>
        
                <div class="col-md-1">
                    <button type="button" class="btn btn-default " style="background-color: #16A951;" onclick="SearchMiddle()"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>-->




<!--<div class="col-12 col-md-12">
    <div class="col-md-12" id="Div_Table_DetailsMiddle" name="Div_Table_DetailsMiddle" style=" margin-top: 2%;" >
        <?php //$this->load->view('SettingData/Table_MiddleCarInsurance'); ?>
    </div>
</div>-->
