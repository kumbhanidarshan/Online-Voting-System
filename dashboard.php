<?php 
 session_start();
 if(!isset($_SESSION['userdata'])) {
 header("location: ../");
 }

 
 $userdata = $_SESSION['userdata']; 
 $groupsdata= $_SESSION['groupsdata'];

 if($_SESSION['userdata']['status']==0){
    $status='<b style = color:red;>Not Voted </b>';
 }else{
    $status='<b style = color:green;>Voted </b>';
 }

?> 

<html>
    <head>
        <title>online Voting system -Dashboard</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
    </head>
    <body>

    <style>
        #backbtn{
            padding: 5px;
             border-radius: 5px;
            background-color: cornflowerblue;
            color: white;
            font-size: 15px;
            float: left;
            margin: 10px;
        }

        #logoutbtn{
            padding: 5px;
            border-radius: 5px;
            background-color: cornflowerblue;
            color: white;
            font-size: 15px;
            float: right;
            margin: 10px;
        }
        
        #Profile{
            background-color: white;
            width: 30%;
            padding: 20px;
            float: left;
        }

        #Group{
            background-color: white;
            width: 60%;
            padding: 20px;
            float: right;
        }

        #votebtn{
            padding: 5px;
             border-radius: 5px;
            background-color: cornflowerblue;
            color: white;
            font-size: 15px;
        }

        #mainpanel{
            padding: 10px;
        }

        #voted{
            padding: 5px;
             border-radius: 5px;
            background-color: green;
            color: white;
            font-size: 15px;
        }

    
       

    </style>

        <div id="mainSection">
            <center>
        <div id="headerSection">
        <a href="../"> <button id="backbtn" type="submit">Back</button> </a>
       <a href="logout.php"><button id="logoutbtn" type="submit">Logout</button></a>
        <h1>Online Voting system</h1>
        </div>
        </center>
        <hr>

        <div id="mainpanel">
        <div id="Profile">
        <center> <img src="../uploads/<?php echo $userdata['photo']?>"  height="100px" ></center><br><br> 
         <b>Name :</b> <?php echo $userdata['name']?><br> <br>
          <b>Mobile :</b> <?php echo $userdata['mobile']?><br><br>
         <b>Address :</b> <?php echo $userdata['address']?> <br><br>
         <b>Status :</b>  <?php echo $status?> <br><br>
    </div>
        <div id="Group">
        <?php 
            if($_SESSION['groupsdata']){
                    for($i=0;$i<count($groupsdata);$i++){
                            ?>
                            <div>
                                <input style="float: right;" src="../uploads/<?php echo $groupsdata[$i]['photo']?>"height=100px; width="100px";>
                                <b>Group Name : <?php echo $groupsdata[$i]['name']?></b> <br> <br>
                                <b>Votes : <?php echo $groupsdata[$i]['votes']?></b> <br> <br>

                                <form action="../api/vote.php" method="POST">
                                    <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                                    <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
                                    <?php 
                                         if($_SESSION['userdata']['status']==0){
                                            ?>
                                             <input type="submit" name="votebtn" value="vote" id="votebtn">
                                    <?php
                                         }
                                    else{
                                        ?>
                                        <button disabled  type="button" name="votebtn" value="voted  "> Voted</button>
                                        <?php
                                    }
                                   
                                    
                                    ?>
                                </form>

                            </div>
                            <hr>
                            <?php
                    }
            }

            else{

            }
        ?>

        </div>
        </div>
     

        </div>

       
</body>
</html>