<?php
//if download button is clicked 
if(isset($_POST['downloadBtn'])){
    // get the img url from input field
    $imgURL = $_POST['file']; // store it in variable 
    $regPatern = "/(http(s?):)([/|.|\w|\s|-])*\.(?:jpg|gif|png)/g"; // pattern to check if the input is url or not
    if(preg_match($regPatern, $imgURL)){
        $initCurl = curl_init($imgURL); // initialize the curl session
        curl_setopt($initCurl, CURLOPT_RETURNTRANSFER, true); // set the option to return the transfer as a string of the return value
        $donwloadImgLink = curl_exec($initCurl); // execute the curl session and return the output
        curl_close($initCurl); // close the curl session
        header('Content-Type: image/jpg'); // set the header to image/jpg
        header("Content-Disposition: attachment; filename=".basename($imgURL)); // set the header for the download
        echo $donwloadImgLink; // echo the image link
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Download in PHP</title>
    <link rel="stylesheet" href="style.css">
  <link href="fontawesome-free-6.5.1-web/css/solid.css" rel="stylesheet" />
  <script  src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="preview-box">
            <div class="cancel-icon"><i class="fa-solid fa-xmark"></i></div>
            <div class="img preview">
            
            </div>
            <div class="content">
            <div class="img-icon"><i class="fa-solid fa-image"></i></div>
                 <div class="text">Paste the image url below, <br>to see a preview or download!</div>
            </div>
        </div>
    
        <form action="index.php" method="POST" class="input-data">
            <input type="text" id="field" name="file"  placeholder="Paste the image url to download...">
            <input type="submit" id="button" name="downloadBtn" value="Download">
        </form>
    </div>

    <script>
        $(document).ready(function(){
            //if user focus out from the input field 
            $("#field").on("focusout", function(){
                //get the image url
                var imgURL = $("#field").val();
                if(imgURL != ""){ // if input is not empty
                    var regPattern = /(http(s?):)([/|.|\w|\s|-])*\.(?:jpg|gif|png)/g; // pattern to check if the input is url or not
                    if(regPattern.test(imgURL)){ // if the input is url
                        //show the image
                        var imgTag = '<img src="'+imgURL+'" alt="">'; // creating an image tag
                        $(".img-preview").append(imgTag); // adding that created image tag in the preview box
                        $("#button").addClass("active"); // add class active to the button
                        $("#field").addClass("disabled"); // add class disabled to the input field
                        $(".preview-box").addClass("imgActive"); // add class active to the preview box
                        $(".cancel-icon").on("click", function(){ // if user click on the cancel icon of the preview box
                            $(".img-preview img").empty(); // empty the image tag
                            $("#field").val(''); // empty the input field
                            $("#button").removeClass("active"); // remove class active from the button
                            $("#field").removeClass("disabled"); // remove class disabled from the input field
                            $(".preview-box").removeClass("imgActive"); // remove class active from the preview box
                        }); 
                }else{
                    alert("Invalid img URL - " + imgURL); // if the input is not a url
                    $("#field").val(''); // empty the input field
                }
            }
            });
        });
    </script>
</body>
</html>

