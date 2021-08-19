<?php

$admin = 0;
if( isset($_COOKIE["admin"]) && $_COOKIE["admin"] === 'True'){
    $admin = 1;
}

if(!isset($_COOKIE["admin"]))
    setcookie('admin','False');

if(!isset($_COOKIE["babyfirst2"]))
    setcookie('babyfirst2','AD{c00k1e_i5_s0_yummy}');

header('babyfirst3: AD{Y0u_Find_5ometh1ng_in_h34d3r}');
?>

<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>Advanced Defense Lab</title>
   
<style type="text/css">

html,body{
    background-color:#111111;
    font-family: 'Dosis', sans-serif;
}
body{
    padding-bottom: 70px;
}
#maindiv{
    padding-top:10%;
    position:relative;
}

#mainimg{
    width:280px;
    height:280px;
}
#middle{
    width: 280px;
    height: 280px;
    margin:auto;
/*  padding-top:15% ;*/
}
#title{
    text-align:center;
    color:rgb(255,255,255) ;
/*  padding-top:17%;*/
    text-shadow: 0px 0px 6px rgba(255,255,255,0.7);

}

</style>
<body>
<div>
    <div id="maindiv" style="display: block;">
        <div id="middle">
            <img id="mainimg" src="adl.png">
        </div>
        <div id="title">
            <?php
                if($admin === 1){
                    echo "<h1>Welcome! Admin!</h1> <hr><h3>babyfirst4 flag is AD{h4v3_kn0wn_usin9_f1r3} </h3><br>";
                }
                else{
                    echo "<h1>Advanced Defense Lab</h1><hr><h3>先進防禦實驗室</h3><br>";
                } 
            ?>       
            <!-- Don't doubt it! This is the babyfirst_1 key AD{I_l00k_thr0u9h_50urc3} -->
        </div>
    </div>
</div>

</body></html>