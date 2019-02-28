<?php
include 'headerboot.php';
?>
<!doctype HTML>
<html>
<head>
  <style>
  .content{background-color: #c4b7a6;
    width:80%;}

  .heading{background-color: #e6e2d3;}
  </style>
</head>

<body>
<div class="container-fluid" align="center">
<br>
   <div class="content">
   <h2 class="division heading ";>WELCOME</h2>
   <br>

    <p>
     <div class="container">
     <img class="mySlides img-thumbnail" src="image1.jpg" alt="quarters" style="width:50%; align:center; height:200px;">
     <img class="mySlides img-thumbnail" src="image2.jpg" alt="quarters"style="width:50%; align:center; height:200px;">
     <img class="mySlides img-thumbnail" src="image3.jpg" alt="quarters"style="width:50%; align:center; height:200px;">
     <img class="mySlides img-thumbnail" src="image4.jpg" alt="quarters"style="width:50%; align:center; height:200px;">
     </div>
   </p>

<p  class="jumbotron text-justify">
Bharat Coking Coal Limited (BCCL) is a subsidiary of Coal India Limited with its headquarter in Dhanbad, India. It was incorporated in January, 1972 to operate coking coal mines (214 in number) operating in the Jharia and Raniganj Coalfields and was taken over by the Government of India on 16 October 1971.

The company operates 81 coal mines which include 40 underground, 18 opencast and 23 mixed mines as on April 2010. The company also runs 6 coking coal washeries, two non-coking coal washeries, one captive power plant (20 MW), and five by-product coke plants. The mines are grouped into 12 areas for administration purposes.

BCCL is the major producer of prime coking coal (raw and washed) in India. Medium coking coal is produced in its mines in Mohuda and Barakar areas. In addition to production of hard coke, BCCL operates washeries, sand gathering plants, a network of aerial ropeways for transport of sand, and a coal bed methane-based power plant in Moonidih.
</p>

  </div>
</div>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>

</body>

</html>
