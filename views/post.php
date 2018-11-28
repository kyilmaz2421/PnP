<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		Post a place!
	</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<!-- fix this so that it doesn't use the href__-->

	<!--Custom CSS -->
	<link rel="stylesheet" type="text/css" href="../css/view.css">
    <link rel="stylesheet" type="text/css" href="../css/general.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

</head>
<body>
<!-- <nav>
    <h1>PnP</h1>
</nav> -->
<header>
  <h1>PnP</h1>
  <p> - - - Place n Party</p>
  <a href="../index.php"><button class="logoutbtn">Log Out</button></a>
</header>

<form action="../php/create_place.php" method="post">
<!-- <div>
    <h1>Post A Place</h1>
</div> -->
<!-- NEW HEADER (CONSISTENT W/ OTHER PAGES): -->

    <section class="navBar">
        <div class="leftRightNavBar"> 
            <!-- <button id="backToView" class="backbtn"><i class="left"></i> Cancel</button> -->
            <a href="viewingPage.php"><button type="button" class="cancelbtn">Cancel</button></a>
        </div>
        <div class="pageTitle">Post A Place</div>
        <div class="leftRightNavBar" style="text-align: right"> 
            <button type="submit" class="postbtn">Submit Place</button>
        </div>
    </section>

    <div class="container">
      <hr>
      <p>Please fill in this form to post a new place.</p>
    <p>
      <label for="photos"><b>Photos: </b></label>
      <input type="file" placeholder="Add Photos" name="photos1" >
      <input type="file" placeholder="Add Photos" name="photos2" >
      <input type="file" placeholder="Add Photos" name="photos3" >
    </p> 

    <p>
      <label for="building"><b>Building Number: </b></label>
      <input type="number" placeholder="Building Number" name="building" required>
    </p> 
    
    <p>
        <label for="adr"><b>Address: </b></label>
        <input type="text" placeholder="Address" name="adr" required>
    </p> 

    <p>
        <label for="aptNum"><b>Apartment Number: </b></label>
        <input type="number" placeholder="Apartment Number" name="aptNum">
    </p>   

    <p>
      <label for="city"><b>City: </b></label>
      <input type="text" placeholder="City" name="city" required>
    </p>

    <p>
      <label for="province"><b>Province: </b></label>
      <input type="text" placeholder="Province" name="province" required>
    </p>

    <p>
        <label for="country"><b>Country: </b></label>
        <input type="text" placeholder="Country" name="country" required>
    </p>

    <p>
        <label for="postalCode"><b>Postal Code: </b></label>
        <input type="text" placeholder="Postal Code" name="postalCode" required>
    </p>

    <p>
    <label for="spaceType"><b>Type Of Space: </b></label>
        <input type="radio" checked="checked" name="spaceType" style="margin-bottom:15px"> Home
        <input type="radio" name="spaceType" style="margin-bottom:15px" value="Apartment"> Apartment
        <input type="radio" name="spaceType" style="margin-bottom:15px" value="Loft"> Loft
        <input type="radio" name="spaceType" style="margin-bottom:15px" value="Large Space"> Large Space (i.e warehouse, gym)
        <input type="radio" name="spaceType" style="margin-bottom:15px" value="Backyard/Deck"> Backyard/Deck
        <input type="radio" name="spaceType" style="margin-bottom:15px" value="Rooftop/Penthouse"> Rooftop/Penthouse
    </label>
    </p>

    <p>
        <label for="price"><b>Price Per Night: </b></label>
        <input type="number" placeholder="Price Per Night" name="price" required>
    </p>

    <p>
            <label for="pets"><b>Pets Permited: </b></label>
            <input type="radio" checked="checked" name="pets" style="margin-bottom:15px" value="FALSE"> No
            <input type="radio" name="pets" style="margin-bottom:15px" value="TRUE"> Yes
    </p>

    <p>
            <label for="alcohol"><b>Alcohol Permited: </b></label>
            <input type="radio" checked="checked" name="alcohol" style="margin-bottom:15px" value="FALSE"> No
            <input type="radio" name="alcohol" style="margin-bottom:15px" value="TRUE"> Yes
    </p>

    <p>
            <label for="weelchair"><b>Weelchair Accessible: </b></label>
            <input type="radio" checked="checked" name="wheelchair" style="margin-bottom:15px" value="FALSE"> No
            <input type="radio" name="wheelchair" style="margin-bottom:15px" value="TRUE"> Yes
    </p>

    <p>
            <label for="smoking"><b>Smoking Permited: </b></label>
            <input type="radio" checked="checked" name="smoking" style="margin-bottom:15px" value="FALSE"> No
            <input type="radio" name="smoking" style="margin-bottom:15px" value="TRUE"> Yes
    </p>

    <p>
            <label for="outdoors"><b>Outdoor Access: </b></label>
            <input type="radio" checked="checked" name="outdoors" style="margin-bottom:15px" value="FALSE"> No
            <input type="radio" name="outdoors" style="margin-bottom:15px" value="TRUE"> Yes
    </p>

    <p>
            <label for="description"><b>Brief Description: </b></label>
            <input type="text" placeholder="Brief Description" name="description" style = "width: 400px; height: 100px; padding-top: 50 px;" required>
    </p>

    <div class="clearfix">
            <!-- <button type="button" class="cancelbtn">Cancel</button>
            <button type="submit" class="postbtn">Submit Place</button> -->

            <div style="text-align: center; float: none; display: flex; justify-content: center">
                <div style="width: 25%; padding-right: 10px">
                    <a href="viewingPage.php"><button type="button" class="cancelbtn" style="width: 100%;">Cancel</button></a>
                </div>
                <button type="submit" class="postbtn" style="width: 25%; padding-left: 10px">Submit Place</button>
            </div>
    </div>

    </div>
  </form>


</body>
</html>
