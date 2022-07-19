<?php
    $server = 'localhost';
    $username ='root';
    $password ='';

    $conn = mysqli_connect($server,$username,$password,'test');
    if(!$conn){
        die("Connection died due to".mysqli_connect_error());
    }
    
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="feedback.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <main class="container">
        <div class="header">
            <span id="first">How much helpful you found for you?</span>
            <button class="share">Share</button>
        </div>
        <div class="sub-container">
            <div class="ratedBy">
                <div class="img_text">
                    <i class="fa fa-star" style="font-size:48px;color:magenta"></i>
                    <div id="text">0</div>
                </div>
                <p>Rated by<br><span id="num_readers">0 </span>readers</p>
            </div>
            <div class="star_rating">
                <span data-rating="1" class="stars">☆</span>
                <span data-rating="2" class="stars">☆</span>
                <span data-rating="3" class="stars">☆</span>
                <span data-rating="4" class="stars">☆</span>
                <span data-rating="5" class="stars">☆</span>

                <div id="token">
                    <div><i class="fa fa-check-circle" style="font-size:24px;color:green"></i></div>
                    <p class="thankyou">Thank you for your feedback</p>
                </div>

            </div>
        </div>
        <form action="thankyou.php" method="post">
            <p class="helpful_p">Helpful: <input type="hidden" name="ratings" id="ratings"></p>

            
            <div style="display:flex">
                <button type="button" class="average" onclick="submit()">Submit</button>
                <button type="button" class="average" onclick="average()">Average</button>
            </div>
        </form>
        <!-- <button type="button" onclick="submit()" class="average">Save</button> -->
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){

                $rating = $_POST["ratings"];
                $sql = "INSERT INTO rating(rating) VALUES('$rating')";
        
                if($result=mysqli_query($conn,$sql)){
                    // echo "Returned rows are: " . mysqli_num_rows($result);
                    // Free result set
                    $edit = true;
                }
                mysqli_close($conn);
            }
        ?>
    </main>

</body>
<script src="feedback.js"></script>

</html>
