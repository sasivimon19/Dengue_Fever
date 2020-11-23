
<link href="<?php echo base_url(); ?>assets/css/Login/bootstrap4.0.0.min.css" rel="stylesheet" id="bootstrap-css">
<script src="<?php echo base_url(); ?>assets/css/Login/bootstrap4.0.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/css/Login/jquery-1.11.1.min.js"></script>
<link rel="icon" href="<?php echo base_url(); ?>assets/images/JPinsurance_EN.png" type="image/gif">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>JP INSURANCE BROKER</title>

<!------ Include the above in your HEAD tag ---------->

<style>
    body {
        margin:0;
        color:#000000;
        background:#404040;
        padding:0%;
        background:url('<?php echo base_url(); ?>assets/images/131751.jpg')fixed;
        background-size: cover;
        font:600 16px/18px 'Open Sans',sans-serif;
    }
    :after,:before{box-sizing:border-box}
    .clearfix:after,.clearfix:before{content:'';display:table}
    .clearfix:after{clear:both;display:block}
    a{color:inherit;text-decoration:none}

    .login-wrap{
        width: 100%;
        margin:auto;
        max-width:510px;
        min-height:510px;
        position:relative;
        padding:0%;
        background:url('<?php echo base_url(); ?>assets/images/Untitled-5.jpg') no-repeat center;
        background-size: cover;
        box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
    }
    .login-html{
        width:100%;
        height:100%;
        position:absolute;
        padding:90px 70px 50px 70px;
        /*background:rgba(0,0,0,0.5);*/   /*เงา */
    }
    .login-html .sign-in-htm,
    .login-html .for-pwd-htm{
        top:0;
        left:0;
        right:0;
        bottom:0;
        position:absolute;
        -webkit-transform:rotateY(180deg);
        transform:rotateY(180deg);
        -webkit-backface-visibility:hidden;
        backface-visibility:hidden;
        -webkit-transition:all .4s linear;
        transition:all .4s linear;
    }
    .login-html .sign-in,
    .login-html .for-pwd,
    .login-form .group .check{
        display:none;
    }
    .login-html .tab,
    .login-form .group .label,
    .login-form .group .button{
        text-transform:uppercase;
    }
    .login-html .tab{
        font-size:22px;
        margin-right:15px;
        padding-bottom:5px;
        margin:0 15px 10px 0;
        display:inline-block;
        border-bottom:2px solid transparent;
    }
    .login-html .sign-in:checked + .tab,
    .login-html .for-pwd:checked + .tab{
        color:#000000;
        border-color:#1161ee;
    }
    .login-form{
        min-height:345px;
        position:relative;
        -webkit-perspective:1000px;
        perspective:1000px;
        -webkit-transform-style:preserve-3d;
        transform-style:preserve-3d;
    }
    .login-form .group{
        margin-bottom:15px;
    }
    .login-form .group .label,
    .login-form .group .input,
    .login-form .group .button{
        width:100%;
        color:#ffffff;  /*ตัวหนังสือ */
        display:block;
    }
    .login-form .group .input,
    .login-form .group .button{
        border:none;
        padding:15px 20px;
        border-radius:25px;
        background:rgb(128, 128, 128);
    }
    .login-form .group input[data-type="password"]{
        text-security:circle;
        -webkit-text-security:circle;
    }
    .login-form .group .label{
        color:#333333;
        font-size:13px;
        padding:5px 10px;
    }
    .login-form .group .button{
        background:#1161ee;
    }
    .login-form .group label .icon{
        width:15px;
        height:15px;
        border-radius:2px;
        position:relative;
        display:inline-block;
        background:rgba(255,255,255,.1);
    }
    .login-form .group label .icon:before,
    .login-form .group label .icon:after{
        content:'';
        width:10px;
        height:2px;
        background:#fff;
        position:absolute;
        -webkit-transition:all .2s ease-in-out 0s;
        transition:all .2s ease-in-out 0s;
    }
    .login-form .group label .icon:before{
        left:3px;
        width:5px;
        bottom:6px;
        -webkit-transform:scale(0) rotate(0);
        transform:scale(0) rotate(0);
    }
    .login-form .group label .icon:after{
        top:6px;
        right:0;
        -webkit-transform:scale(0) rotate(0);
        transform:scale(0) rotate(0);
    }
    .login-form .group .check:checked + label{
        color:#fff;
    }
    .login-form .group .check:checked + label .icon{
        background:#1161ee;
    }
    .login-form .group .check:checked + label .icon:before{
        -webkit-transform:scale(1) rotate(45deg);
        transform:scale(1) rotate(45deg);
    }
    .login-form .group .check:checked + label .icon:after{
        -webkit-transform:scale(1) rotate(-45deg);
        transform:scale(1) rotate(-45deg);
    }
    .login-html .sign-in:checked + .tab + .for-pwd + .tab + .login-form .sign-in-htm{
        -webkit-transform:rotate(0);
        transform:rotate(0);
    }
    .login-html .for-pwd:checked + .tab + .login-form .for-pwd-htm{
        -webkit-transform:rotate(0);
        transform:rotate(0);
    }

    .hr{
        height:2px;
        margin:60px 0 50px 0;
        background: #000000;
    }
    .foot-lnk{
        text-align:center;
    }
</style>

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
    }
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 500%; /* Could be more or less, depending on screen size */
    }
    #loadding{
            position: fixed;
            left: 0px;
            width: 100%;
            height: 100%;
            padding-left:20%;
            padding-top: 10%;

            }.modal {
            display: none; 
            position: fixed;  
            height:100%; 
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            padding-top: 0px;

        }

</style> 
<div class="group">
    <center>
        <label for="tab-1" class="tab" style=" font-size:40px; margin-top: 5%"><b> Dengue Fever (ไข้เลือดออก)</b>
        <img style=" height: 10%;" src="<?php echo base_url(); ?>assets/images/JPinsurance_EN.png">
        </label>  
    </center>
</div>
<br>
<div class="login-wrap" >
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
        <input id="tab-2" type="radio" name="tab" class="for-pwd">
        <label for="tab-2" class="tab" style=" color: black;"></label>
        <div class="login-form">
            <form class="login-form" id="pop_login" name="pop_login" action="<?php echo site_url('Con_Dengue_Fever/login') ?>" method="post" >
                <div class="sign-in-htm">
                    <div class="group">
                        <label for="user" class="label"><b>Username</b></label>
                        <input id="Username" name="Username" type="text" class="input">
                    </div>
                    <div class="group">
                        <label for="pass" class="label"><b>Password</b></label>
                        <input id="password" name="password" type="password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <input type="button" class="button" value="Sign In" onclick="SentSubmit()">
                    </div>
                    <div class="hr"></div>
		    <div style="margin-left: 70%; font-size: 12px;"><p>V.1.0 202009</p></div>
                </div>
                <!-- loading -->
                <div id="loadding"><img src="<?php echo base_url(); ?>assets/images/loader.gif"></div>

                <!--script loading-->
                <script>
                    document.getElementById('loadding').style.display = "none";
                </script>
            </form>        
        </div>
    </div>
</div>



<script type="text/javascript">
function SentSubmit() {

    document.getElementById("loadding").style.display = "block";
    pop_login.submit(); // submit form ด้วย Javascript

    
};

</script>

<script language="JavaScript">
       window.onload = function () {
           document.addEventListener("contextmenu", function (e) {
               e.preventDefault();
           }, false);
           document.addEventListener("keydown", function (e) {
               //document.onkeydown = function(e) {
               // "I" key
               if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
                   disabledEvent(e);
               }
               // "J" key
               if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
                   disabledEvent(e);
               }
               // "S" key + macOS
               if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
                   disabledEvent(e);
               }
               // "U" key
               if (e.ctrlKey && e.keyCode == 85) {
                   disabledEvent(e);
               }
               // "F12" key
               if (event.keyCode == 123) {
                   disabledEvent(e);
               }
           }, false);
           function disabledEvent(e) {
               if (e.stopPropagation) {
                   e.stopPropagation();
               } else if (window.event) {
                   window.event.cancelBubble = true;
               }
               e.preventDefault();
               return false;
           }
       }
</script>



