
<?php if ($TITLE == 'Occupation') { ?>
    <div class="col-md-12">     
        <div class="row" style=" margin-top: 1%;"> 
            <div class="col-md-3">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-primary btn-sm"><b> เลือกข้อมูลค้นหา </b></button>
                    </div>
                    <select class="form-control form-control-sm" id="Occupation" name="Occupation">
                        <option value="0"> เลือกข้อมูล </option>
                        <option value="CODE_OCCUP"> รหัสอาชีพ </option>
                        <option value="Occupation"> อาชีพ </option>                 
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-primary btn-sm"> <b> กรอกข้อมูล </b> </button>
                    </div>
                    <input  type="text" class="form-control form-control-sm" id="dataSearchOccupation" name="dataSearchOccupation">
                </div>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-success btn-sm"  onclick="Search_Occupation(TITLE='<?php echo $TITLE; ?>')"><i class="fa fa-search" aria-hidden="true"></i> <b> ค้นหาข้อมูลอาชีพ </b> </button>
            </div>
            <div class="col-md-2" style=" margin-left: 15%">
                <a href="<?php echo site_url('Con_Dengue_Fever/Export_Occupation') ?>"><button type="button" class="btn btn-warning btn-sm"><i class="fas fa-cloud-download-alt"></i> <b> Export ข้อมูลอาชีพ </b> </button></a>
            </div>
        </div>
    </div>    
<?php } elseif ($TITLE == 'District') { ?>
    <div class="col-md-12">     
        <div class="row" style=" margin-top: 1%;"> 
            <div class="col-md-3">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-primary btn-sm"><b> เลือกข้อมูลค้นหา </b></button>
                    </div>
                    <select class="form-control form-control-sm" id="DISTRICT" name="DISTRICT">
                        <option value="0"> เลือกข้อมูล </option>
                        <option value="DISTRICT_CODE"> รหัสอำเภอ/เขต </option>
                        <option value="DISTRICT"> อำเภอ/เขต </option>                 
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-primary btn-sm"> <b> กรอกข้อมูล </b> </button>
                    </div>
                    <input  type="text" class="form-control form-control-sm" id="dataSearchDISTRICT" name="dataSearchDISTRICT">
                </div>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-success btn-sm"  onclick="Search_District(TITLE='<?php echo $TITLE; ?>')"><i class="fa fa-search" aria-hidden="true"></i> <b> ค้นหาข้อมูลอำเภอ/เขต </b> </button>
            </div>
            <div class="col-md-2" style=" margin-left: 15%">
                    <a href="<?php echo site_url('Con_Dengue_Fever/Export_DISTRICT') ?>"><button type="button" class="btn btn-warning btn-sm"><i class="fas fa-cloud-download-alt"></i> <b> Export ข้อมูลอำเภอ </b> </button></a>
            </div>
        </div>
    </div>    
<?php } elseif ($TITLE == 'Province') { ?>

    <div class="col-md-12">     
        <div class="row" style=" margin-top: 1%;"> 
            <div class="col-md-3">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-primary btn-sm"><b> เลือกข้อมูลค้นหา </b></button>
                    </div>
                    <select class="form-control form-control-sm" id="Province" name="Province">
                        <option value="0"> เลือกข้อมูล </option>
                        <option value="PROVINCE_CODE"> รหัสจังหวัด </option>
                        <option value="PROVINCE"> จังหวัด </option>                 
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-primary btn-sm"> <b>กรอกข้อมูล</b> </button>
                        </div>
                        <input  type="text" class="form-control form-control-sm" id="dataSearchPROVINCE" name="dataSearchPROVINCE">
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-success btn-sm"  onclick="Search_Province(TITLE='<?php echo $TITLE; ?>')"><i class="fa fa-search" aria-hidden="true"></i> <b> ค้นหาข้อมูลจังหวัด </b> </button>
                </div>
                <div class="col-md-2" style=" margin-left: 15%">
                    <a href="<?php echo site_url('Con_Dengue_Fever/Export_PROVINCE') ?>"><button type="button" class="btn btn-warning btn-sm"><i class="fas fa-cloud-download-alt"></i> <b> Export ข้อมูลจังหวัด </b> </button></a>
                </div>
            </div>
        </div>   
<?php } elseif ($TITLE == 'Title') { ?> 
    <div class="col-md-12">     
        <div class="row" style=" margin-top: 1%;"> 
            <div class="col-md-3">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-primary btn-sm"><b> เลือกข้อมูลค้นหา </b></button>
                    </div>
                    <select class="form-control form-control-sm" id="Title_id" name="Title_id">
                        <option value="0"> เลือกข้อมูล </option>
                        <option value="TITLE_CODE"> รหัสคำนำหน้า </option>
                        <option value="Title"> คำนำหน้า </option>                 
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-primary btn-sm"> <b> กรอกข้อมูล </b> </button>
                    </div>
                    <input  type="text" class="form-control form-control-sm" id="dataSearchTITLE" name="dataSearchTITLE">
                </div>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-success btn-sm"  onclick="Search_TITLE(TITLE='<?php echo $TITLE; ?>')"><i class="fa fa-search" aria-hidden="true"></i> <b> ค้นหาข้อมูลคำนำหน้า </b> </button>
            </div>
              <div class="col-md-2" style=" margin-left: 15%">
                    <a href="<?php echo site_url('Con_Dengue_Fever/Export_TITLE_JP') ?>"><button type="button" class="btn btn-warning btn-sm"><i class="fas fa-cloud-download-alt"></i> <b> Export ข้อมูลคำนำหน้า </b> </button></a>
            </div>
        </div>
    </div>   
<?php } ?>




