<?php
$NameError=""; //on load nameerror will be empty
$EmailError="";
$GenderError="";
$WebsiteError="";
// /^[A-Za-z. ]*$/
// /[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/
// /(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/

//When submitted check if name is there if not set name error to show "name is required"
if(isset($_POST["Submit"])){
    if(empty($_POST["Name"])){
        $NameError="Name is Required";
    } else{
        $Name=Test_User_Input($_POST["Name"]);
        if(!preg_match("/^[A-Za-z. ]*$/", $Name)){
            $NameError="Only Letters and white spaces are allowed";
        }
    } 
    if(empty($_POST["Email"])){
        $EmailError="Email is Required";
    } else{
        $Email=Test_User_Input($_POST["Email"]);
        if(!preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/", $Email)){
            $EmailError="Invalid email Format";
        }
    } 
    if(empty($_POST["Gender"])){
        $GenderError="Gender is Required";
    } else{
        $Gender=Test_User_Input($_POST["Gender"]);
    } 
    if(empty($_POST["Website"])){
        $WebsiteError="Website is Required";
    } else{
        $Website=Test_User_Input($_POST["Website"]);
        if(!preg_match("/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/",$Website)){
            $WebsiteError="Invalid Website Address";
        }
    }
        if(!empty($_POST["Name"])&&!empty($_POST["Email"])&&!empty($_POST["Gender"])&&!empty($_POST["Website"])){
            if((preg_match("/^[A-Za-z. ]*$/", $Name)==true)&&(preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/", $Email)==true)&&(preg_match("/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/", $Website)==true)){
                echo "<h2>Submited Information</h2> <br>";
                echo "Name:".ucwords ($_POST["Name"])."<br>";
                echo "Email: {$_POST["Email"]}<br>";
                echo "Gender: {$_POST["Gender"]}<br>";
                echo "Website: {$_POST["Website"]}<br>";
                echo "Comment: {$_POST["Comment"]}<br>";
            } else{
                echo "Please Complete and correct your form again";
            }
        
        }
}
function Test_User_Input($Data){
    return $Data;
}


?>

<!DOCTYPE>
 
<html>
    <head>
        <title>Form Validation Project</title>
    </head>
<style type="text/css">
input[type="text"],input[type="email"],textarea{
    border:  1px solid dashed;
    background-color: rgb(221,216,212);
    width: 600px;
    padding: .5em;
    font-size: 1.0em;
}
.Error{
    color: red;
}
</style>
    <body>
<?php ?>
<h2>Form Validation with PHP.</h2>
 
<form  action="FormValidationProject.php" method="post"> 
<legend>* Please Fill Out the following Fields.</legend>            
<fieldset>
Name:<br>
<input class="input" type="text" Name="Name" value="">
*<?php echo $NameError;  ?><br>   
E-mail:<br>
<input class="input" type="text" Name="Email" value="">
*<?php echo $EmailError; ?><br>
Gender:<br>
<input class="radio" type="radio" Name="Gender" value="Female">Female
<input class="radio" type="radio" Name="Gender" value="Male">Male
*<?php echo $GenderError; ?><br>        
Website:<br>
<input class="input" type="text" Name="Website" value="">
*<?php echo $WebsiteError; ?><br>
Comment:<br>
<textarea Name="Comment" rows="5" cols="25"></textarea>
<br>
<br>
<input type="Submit" Name="Submit" value="Submit Your Information">
   </fieldset>
</form>
 
 
         
    </body>
</html>