<?php include_once "../config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js.bootstrap.min.js"></script>
    <title>Chatbot</title>
    <style>
        body{
            margin: 0 auto;
            max-width: 800px;
            padding: 0 20px;
        }
        .container1 {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 23px;
            margin: 10px 0;
        }
        
        .darker{
            border-color: #ccc;
            background-color: #ddd;
        }
        .container1 img.right{
            float: right;
            margin-left: 20px;
            margin-right: 0;
        }
        .time-right {
         float: right;
         color: #aaa;
        }
        .time-left{
            float: left;
            color: #999;
        }
        div.sticky {
            position -webkit-sticky;
            position: sticky;
            bottom: 0;
            margin-top: 200px;
            background-color: #ddd;
            padding: 10px 0 0 10px;
            font-size: 20px;
        }
        .square{
            height: auto;
            width: 810px;
            padding: 8px;
            background-color: #fff;
            border: 2px solid #dedede;
        }
        .title{
            text-align: center;
        }

    </style>
</head>
<body>
    <span id ="ref">
        <div class="square">
        <div class="title"><h2>chat messages</h2></div>
    <?php
    $query="select * from chats ORDER by date DESC";
    $res=mysqli_query($con,$query);
    while($data=mysqli_fetch_array($res)){
        $user=$data['user'];
        $chatbot=$data['chatbot'];
        $date=$data['date'];

        ?>
        <div class="container1" style="margin-right: 400px;">
        <img src ="" alt="avatar" style ="width:100%;">
        <p id="message"><?php echo $user; ?>
        </p>
            <span class="time-right"><?php echo $date;?></span>
        </div>
        
        <div class="container1 darker" style="margin-left: 400px;">
        <img src="" alt="avatar" class="right" style="width:100%;">
        <p><?php echo $chatbot; ?></p>
        <span class="time-left"><?php echo $date;?></span>
        </div>
    <?php } ?>
    <div class="sticky">
        <div class="row">
            <div class="col-md-12">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="msg">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" onclick="send()">send</button>                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </span>
    <script type="text/javascript">
        function send()
        {
var text=$('#msg').val().toLowerCase();
$.ajax({
    type:"post",
    url:"chatbotsearch.php",
    data:{text:text},
    success:function(data){
        //alert(data);
        $("#ref").load("#ref");
    }
})
        }  
  </script>
</body>
</html>