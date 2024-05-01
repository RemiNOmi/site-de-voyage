
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <!-- Link your external CSS file here -->
    
    <style>
      /* =========== Google Fonts ============ */
@import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap");

/* =============== Globals ============== */
* {
  font-family: "Ubuntu", sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

:root {
  --blue: #2a2185;
  --white: #fff;
  --gray: #f5f5f5;
  --black1: #222;
  --black2: #999;
}

body {
  min-height: 100vh;
  overflow-x: hidden;

}

.container {
  position: relative;
  width: 100%;
 
}

/* =============== Navigation ================ */
.navigation {
  position: fixed;
  width: 300px;
  height: 100%;
  background: var(--blue);
  border-left: 10px solid var(--blue);
  transition: 0.5s;
  overflow: hidden;
}
.navigation.active {
  width: 80px;
}

.navigation ul {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
}

.navigation ul li {
  position: relative;
  width: 100%;
  list-style: none;
  border-top-left-radius: 30px;
  border-bottom-left-radius: 30px;
}

.navigation ul li:hover,
.navigation ul li.hovered {
  background-color: var(--white);
}

.navigation ul li:nth-child(1) {
  margin-bottom: 40px;
  pointer-events: none;
}

.navigation ul li a {
  position: relative;
  display: block;
  width: 100%;
  display: flex;
  text-decoration: none;
  color: var(--white);
}
.navigation ul li:hover a,
.navigation ul li.hovered a {
  color: var(--blue);
}

.navigation ul li a .icon {
  position: relative;
  display: block;
  min-width: 60px;
  height: 60px;
  line-height: 75px;
  text-align: center;
}
.navigation .title .official{
  font-size: 40px;
  font-weight: 500;
}
.navigation ul li a .icon .user{
  width: 50px;
  height:50px;
 
}
.navigation .button-return {
  width: 50px;
  height:50px;
 
}

.navigation ul li a .icon ion-icon {
  font-size: 1.75rem;
}

.navigation ul li a .title {
  position: relative;
  display: block;
  padding: 0 10px;
  height: 60px;
  line-height: 60px;
  text-align: start;
  white-space: nowrap;
}

/* --------- curve outside ---------- */
.navigation ul li:hover a::before,
.navigation ul li.hovered a::before {
  content: "";
  position: absolute;
  right: 0;
  top: -50px;
  width: 50px;
  height: 50px;
  background-color: transparent;
  border-radius: 50%;
  box-shadow: 35px 35px 0 10px var(--white);
  pointer-events: none;
}
.navigation ul li:hover a::after,
.navigation ul li.hovered a::after {
  content: "";
  position: absolute;
  right: 0;
  bottom: -50px;
  width: 50px;
  height: 50px;
  background-color: transparent;
  border-radius: 50%;
  box-shadow: 35px -35px 0 10px var(--white);
  pointer-events: none;
}

/* ===================== Main ===================== */
.main {
  position: absolute;
  width: calc(100% - 300px);
  left: 300px;
  min-height: 100vh;
  background: var(--white);
  transition: 0.5s;
}
.main.active {
  width: calc(100% - 80px);
  left: 80px;
}

.topbar {
  width: 100%;
  height: 60px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 10px;
}

.toggle {
  position: relative;
  width: 60px;
  height: 60px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 2.5rem;
  cursor: pointer;
}

.search {
  position: relative;
  width: 400px;
  margin: 0 10px;
}

.search label {
  position: relative;
  width: 100%;
}

.search label input {
  width: 100%;
  height: 40px;
  border-radius: 40px;
  padding: 5px 20px;
  padding-left: 35px;
  font-size: 18px;
  outline: none;
  border: 1px solid var(--black2);
}

.search label ion-icon {
  position: absolute;
  top: 0;
  left: 10px;
  font-size: 1.2rem;
}

.user {
  position: relative;
  width: 80px;
  height: 80px;
  border-radius: 50%;
  overflow: hidden;
  cursor: pointer;
 
}
.user a{
  font-weight: 800;
}

.user img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* ======================= Cards ====================== */
.cardBox {
  position: relative;
  width: 100%;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-gap: 30px;
  padding:30px;
  margin-top: 500px;
}

.cardBox .card {
  position: relative;
  background: var(--white);
  padding: 30px;
  border-radius: 20px;
  display: flex;
  justify-content: space-between;
  cursor: pointer;
  box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
}

.cardBox .card .numbers {
  position: relative;
  font-weight: 500;
  font-size: 2.5rem;
  color: var(--blue);
}

.cardBox .card .cardName {
  color: var(--black2);
  font-size: 1.1rem;
  margin-top: 5px;
}

.cardBox .card .iconBx {
  font-size: 3.5rem;
  color: var(--black2);
}

.cardBox .card:hover {
  background: var(--blue);
}
.cardBox .card:hover .numbers,
.cardBox .card:hover .cardName,
.cardBox .card:hover .iconBx {
  color: var(--white);
}

/* ================== Order Details List ============== */
.details {
  position: relative;
  width: 100%;
  padding: 20px;
  display: grid;
  grid-template-columns: 2fr 1fr;
  grid-gap: 30px;
  /* margin-top: 10px; */
}

.details .recentOrders {
  position: relative;
  display: grid;
  min-height: 500px;
  background: var(--white);
  padding: 20px;
  box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
  border-radius: 20px;
}

.details .cardHeader {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
}
.cardHeader h2 {
  font-weight: 600;
  color: var(--blue);
}
.cardHeader .btn {
  position: relative;
  padding: 5px 10px;
  background: var(--blue);
  text-decoration: none;
  color: var(--white);
  border-radius: 6px;
}
 .btn1 {
  position: relative;
  padding: 5px 10px;
  background: var(--blue);
  text-decoration: none;
  color: var(--white);
  border-radius: 6px;
  margin-left: -180px;
}
.btn{
  position: relative;

  background: var(--blue);
  text-decoration: none;
  color: var(--white);
  border-radius: 6px;
}

/*///////////////////MEN HOUNI YABDA CODEK ENTI/////////////////////////////////////*/

/*zina mta tableau mtaa category*/
th {
  background-color: #f2f2f2; /* Background color */
  color: #242358; /* Text color */
  font-weight: bold; /* Font weight */
  text-align: center; /* Text alignment */
  padding: 10px; /* Padding */
  font-size: 20px;
}
.image img {
  width: 150px; /* Adjust the width as needed */
  height: auto; /* Maintain aspect ratio */
  border-radius: 5px; /* Add rounded corners */
}
.category{
  font-weight: 800; /* Normal font weight */
  font-size: 30px; /* Adjust the font size */
  color: #152479; /* Text color */
  text-transform: uppercase; /* Convert text to uppercase */
  letter-spacing: 1px; /* Add spacing between letters */
 
}

/* Optional: Add margin or padding to separate the images */
.image {
  margin-right: 10px; /* Adjust the right margin as needed */
}

.details table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 10px;
  justify-content: center;
  align-items: center;   
}
.table-container {
  
    justify-content: center;
    align-items: center;   
}
.details table thead td {
  font-weight: 300;
  
}
.details .recentOrders table tr {
  color: var(--black1);
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}
.details .recentOrders table tr:last-child {
  border-bottom: none;
}
.details .recentOrders table tbody tr:hover {
  background: var(--blue);
  color: var(--white);
}
.details .recentOrders table tr td {
  padding: 10px;
}
.details .recentOrders table tr td:last-child {
  text-align: end;
}
.details .recentOrders table tr td:nth-child(2) {
  text-align: end;
}
.details .recentOrders table tr td:nth-child(3) {
  text-align: center;
}
.recentCustomers {
  position: relative;
  display: grid;
  min-height: 500px;
  padding: 20px;
  background: var(--white);
  box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
  border-radius: 20px;
}
.recentCustomers .imgBx {
  position: relative;
  width: 40px;
  height: 40px;
  border-radius: 50px;
  overflow: hidden;
}
.recentCustomers .imgBx img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.recentCustomers table tr td {
  padding: 12px 10px;
}
.recentCustomers table tr td h4 {
  font-size: 16px;
  font-weight: 500;
  line-height: 1.2rem;
}
.recentCustomers table tr td h4 span {
  font-size: 14px;
  color: var(--black2);
}
.recentCustomers table tr:hover {
  background: var(--blue);
  color: var(--white);
}
.recentCustomers table tr:hover td h4 span {
  color: var(--white);
}

/* ====================== Responsive Design ========================== */
@media (max-width: 991px) {
  .navigation {
    left: -300px;
  }
  .navigation.active {
    width: 300px;
    left: 0;
  }
  .main {
    width: 100%;
    left: 0;
  }
  .main.active {
    left: 300px;
  }
  .cardBox {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 768px) {
  .details {
    grid-template-columns: 1fr;
  }
  .recentOrders {
    overflow-x: auto;
  }
  .status.inProgress {
    white-space: nowrap;
  }
}

@media (max-width: 480px) {
  .cardBox {
    grid-template-columns: repeat(1, 1fr);
  }
  .cardHeader h2 {
    font-size: 20px;
  }
  .user {
    min-width: 40px;
  }
  .navigation {
    width: 100%;
    left: -100%;
    z-index: 1000;
  }
  .navigation.active {
    width: 100%;
    left: 0;
  }
  .toggle {
    z-index: 10001;
  }
  .main.active .toggle {
    color: #fff;
    position: fixed;
    right: 0;
    left: initial;
  }
}
/*/////////////////////HOUNI TABDA L ACTIVITY TABLE CSS*/
/* Style for the image cell */
.image-cell {
  width: 150px; /* Adjust the width as needed */
  vertical-align: top; /* Ensure content aligns to the top */
}

/* Style for the image inside the cell */
.image-cell img {
  width: 100%;
  height: auto;
}

.activity {
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}

.activity-details {
  flex-grow: 1;
  font-size: 300px;
}

.activity-image {
  margin-left: 20px;
  
}

.table tbody {
    margin-top: 20px; /* Add margin at the top */
}


     .table {
            width: 80%;
          
            margin-top: 1500px;
            align-items: center;

        }

        .table th, .table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table tbody tr:hover {
            background-color: #ddd;
        }

        .activity-details {
          font-family: Arial, sans-serif;
          font-size: 14px;
          color: #333; /* Adjust color as needed */
      }
     .container .table-container .details .recentOrders .table .activity-details  .activity-name{
        font-weight: 400;
        font-size: 20px;
        margin: 10px;
        color: #090e14; /* Adjust color as needed */
      }
      .container .table-container .details .recentOrders .table .activity-details  .activity-name1{
        font-weight: 700;
        font-size: 34px;
        color: #0a3263; /* Adjust color as needed */
      }
      
    
      .activity-description {
          font-style: italic;
          color: #000000; /* Adjust color as needed */
      }
      .details .recentOrders table tr td:last-child {
        text-align: end;
        /* Add margin to the first button to separate it from the second */
        margin-right: 10px;
      }
      
      /* Adjust spacing between buttons */
      .btn {
        margin-right: 5px;
      }
   
      /*THEB TBADEL TASWIRA IIJA HOUNI*/
      .activity-img {
        margin-right: px; /* Add margin between the image and the text */
        margin-left: 30px;
        width: 500px;
        height: 750px;
      
      }
      /*THEB TBADEL BUTTON IJA HOUNI*/
      .container .table-container .details .recentOrders .table .button {
        background-color: #2a2185;
        color: #fff;
        font-size: 12px;
        padding: 10px 45px;
        border: 1px solid transparent;
        border-radius: 8px;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        margin-top: 10px;
        cursor: pointer;
      }
      .activity-name{
        font-size:10px;
      }
    </style>
</head>
<body>

<?php
// Include the configuration file
include_once "../config.php";

// Check if the input is set
if(isset($_POST['input'])){
    $input = $_POST['input'];
    $query = "SELECT * FROM activity WHERE nom_activity LIKE '{$input}%'";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0){ ?>
  
        <div class="cardBox">
      
            <?php
            while($row = mysqli_fetch_assoc($result)){
                // Assign values to variables from the row
                $id = $row['id_act'];
                $nom_activity = $row['nom_activity'];
                $description = $row['description'];
                $lieu = $row['lieu'];
                $date = $row['date'];
                $prix = $row['prix'];
                $capacity_max = $row['capacity_max'];
                $image = $row['image'];
                $id_category = $row['id_category'];
                $duration = $row['duration'];
                $date_debut = $row['date_debut'];
                $date_fin = $row['date_fin'];
            ?>
            <div class="card">
            
                <div class="activity-details">
                    <div class="activity-name"><?php echo $nom_activity; ?></div>
                    <div class="activity-name"><?php echo $description; ?></div>
                   
                        <div class="activity-name">Location: <?php echo $lieu; ?></div>
                        <div class="activity-name">Date: <?php echo $date; ?></div>
                        <div class="activity-name">Price: <?php echo $prix; ?></div>
                        <div class="activity-name">Capacity: <?php echo $capacity_max; ?></div>
                    
                   
                        <div class="activity-name">Start Date: <?php echo $date_debut; ?></div>
                        <div class="activity-name">End Date: <?php echo $date_fin; ?></div>
                    
                </div>
                <div class="activity-image">
                    <img src="<?php echo $image; ?>" alt="<?php echo $nom_activity; ?>">
                </div>
            </div>
            <?php } ?>
        </div>
    <?php } else {
        echo "<h6>No data found</h6>";
    }
}
?>
