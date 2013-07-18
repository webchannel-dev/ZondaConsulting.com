<!DOCTYPE html>
<html>
    <head>
        <link href='http://fonts.googleapis.com/css?family=Tenor+Sans' rel='stylesheet' type='text/css'>
        <title>ZONDA CONSULTING CONTACT PAGE </title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="htdocs/css/main.css" type="text/css"/>
        <style>
            .button::-webkit-file-upload-button {
                visibility: hidden;
            }
            .button:before {
                content: 'Select files';
                display: inline-block;
                background: #00C4FF;
                border: 1px solid #999;
                border-radius: 3px;
                padding: 5px 8px;
                outline: none;
                white-space: nowrap;
                -webkit-user-select: none;
                cursor: pointer;
                color : #fff;

                font-weight: 700;
                font-size: 12px;

            }
            .button:hover:before {
                border-color: black;
            }
            .button:active:before {

                background: #00C4FF;
            }

            .button2:hover{

                border-color: black;
            }

            .button2{
                display: inline-block;
                background: #00C4FF;
                border: 1px solid #999;
                border-radius: 3px;
                padding: 5px 8px;
                outline: none;
                white-space: nowrap;
                -webkit-user-select: none;
                cursor: pointer;
                color : #fff;
                font-weight: 700;
                font-size: 12px;
                margin-left: 110px;
            }

            select {
                font-weight: 700;
                font-size: 12px;
                background: #999;
                color: white;
                border-radius: 3px;
                height:30px;
                border: 1px solid #999;
            }
        </style>
        <script type="text/javascript" src="htdocs/js/analyticstracking.js"></script>
    </head>
    <body>
    <center>
        <div id="wrapper">
            <div style="position:absolute; left:0px; top:0px; width:1024px; height:252px;" title="">    
                <img src="htdocs/img/Carrers_01.png" width="1024px" height="253px" usemap="#Navigation" border="0"/>
                <map name="Navigation">
                    <area shape="rect" coords="451,181,511,203" href="about.html">
                    <area shape="rect" coords="544,182,587,202" href="http://www.zondaconsulting.com/forum">
                    <area shape="rect" coords="618,181,679,203" href="client.html">
                    <area shape="rect" coords="707,181,785,203" href="carrers.php">
                    <area shape="rect" coords="810,182,886,204" href="contact.html">
                    <area shape="poly" coords="110,117,389,148,337,237,137,242" href="http://www.zondaconsulting.com/">
                </map>
            </div>

            <div style="background-image:url(htdocs/img/Carrers_02.png); position:absolute; left:0px; top:253px; width:496px; height:124px;" title="">
            </div>
            <div style="background-image:url(htdocs/img/Carrers_03.png); position:absolute; left:496px; top:253px; width:528px; height:124px;" title="">
            </div>
            <div style="background-image:url(htdocs/img/Carrers_04.png); position:absolute; left:0px; top:377px; width:199px; height:277px;" title="">
            </div>
            <div style="background-image:url(htdocs/img/Carrers_05.png); position:absolute; left:199px; top:377px; width:603px; height:277px; text-align: left;" title="">
                <br/>
                <?php
                if (isset($_POST['submit'])) {
                    $folderName = array(
                        'Accounting'
                        , 'Admin-Clerical'
                        , 'Banking-Finance'
                        , 'Business-Development'
                        , 'Business-Opportunities'
                        , 'Consultant'
                        , 'Contract-Freelance'
                        , 'Customer-Service'
                        , 'General-Business'
                        , 'Government'
                        , 'HR'
                        , 'IT'
                        , 'Research'
                        , 'Sales-Marketing'
                        , 'Strategy-Planning'
                        , 'Other'
                    );

                    if (($_FILES["file"]["type"] == "application/msword") || ($_FILES["file"]["type"] == "application/pdf") || ($_FILES["file"]["type"] == "application/rtf") && ($_FILES["file"]["size"] < 20000)) {

                        if ($_FILES["file"]["error"] > 0) {
                            
                        } else {
                            if (file_exists("upload/" . $_FILES["file"]["name"])) {
                                
                            } else {
                                move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $folderName[$_POST['job_cat']] . "/" . $_FILES["file"]["name"]);
                            }
                            Echo "<br/><br/><br/><br/><br/><br/><center><h3>Thank you for submitting your CV/Resume .<br/> We will be in contact with you shortly .</h3></center>";
                        }
                    } else {
                        echo "<br/><br/><br/><br/><br/><br/><center><h3>We are sorry . Please submit in PDF format .</h3></center>";
                    }
                } else {
                    echo '
                     <p> <br/>Thank you for visiting our CAREERS page . 
                      You can upload your CV/Resumne in PDF format below or send us an email to careers@zondaconsulting.com .
                    </p>
                    <br/>
                    <form action="carrers.php" method="post"
                          enctype="multipart/form-data">
                        <label for="file">Filename  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
                        <input type="file" name="file" id="file" required  class="button"> <br/><br/>
                        <label for="job_cat">Job Categories  :</label>
                        <select name="job_cat" >
                            <option value="15" selected>Other</option>
                            <option value="0">Accounting</option>
                            <option value="1">Admin & Clerical</option>
                            <option value="2">Banking & Finance</option>
                            <option value="3">Business Development</option>
                            <option value="4">Business Opportunities</option>
                            <option value="5">Consultant</option>
                            <option value="6">Contract & Freelance</option>
                            <option value="7">Customer Service</option>
                            <option value="8">General Business</option>
                            <option value="9">Government</option>
                            <option value="10">HR</option>
                            <option value="11">IT</option>
                            <option value="12">Research</option>
                            <option value="13">Sales & Marketing</option>
                            <option value="14">Strategy & Planning</option>                 
                        </select>
                        <br/> <br/>
                        <input type="submit" name="submit" value="Upload" class="button2">
                          <br/>  <br/>
                    </form>    
               ';
                }
                ?>
            </div>
            <div style="background-image:url(htdocs/img/Carrers_06.png); position:absolute; left:802px; top:377px; width:222px; height:278px;" title="">

            </div>
            <div style="background-image:url(htdocs/img/Carrers_07.png); position:absolute; left:0px; top:654px; width:496px; height:227px;" title="">
            </div>
            <div style="background-image:url(htdocs/img/Carrers_08.png); position:absolute; left:496px; top:654px; width:306px; height:1px;" title="">
            </div>
            <div style="background-image:url(htdocs/img/Carrers_09.png); position:absolute; left:496px; top:655px; width:528px; height:226px;" title="">
            </div>
            <div style="position:absolute; left:0px; top:881px; width:1024px; height:69px;" title="">
                <img src="htdocs/img/Carrers_10.png"  width="1024px" height="69px" usemap="#Map" border="0"/>
                <map name="Map">
                    <area shape="rect" coords="160,1,273,20" href="http://www.zondaconsulting.com/">
                </map>
            </div>
        </div>
    </center>
</body>
</html>
