<?php
if(isset($_POST["submit_map"]))
{
    $map = $_POST["map"];
    ?>
    <iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $map; ?>&output=embed"></iframe>
<?php }

// include db connection
include '../../config.php'; 

if(isset($_POST['upload'])){
    try {
        // Retrieve form data
        $NOM_ACTIVITY = $_POST['nom_activity'];
        $DESCRIPTION = $_POST['description'];
        $LIEU = $_POST['lieu'];
        $DATE = $_POST['date'];
        $DATE_DEBUT = $_POST['date_debut'];
        $DATE_FIN = $_POST['date_fin'];
        $PRIX = $_POST['prix'];
        $CAPACITY_MAX = $_POST['capacity_max'];
        $image = $_FILES['image'];
        $ID_CATEGORY = $_POST['id_category'];
        $DURATION = $_POST['duration'];
        $map = $_POST['map'];

        
        // File upload
        $img_loc = $_FILES['image']['tmp_name'];
        $img_name = $_FILES['image']['name'];
        $img_des = "uploadImage/".$img_name;
        move_uploaded_file($img_loc,'uploadImage/'.$img_name);

        // Connect to database using PDO directly
        $pdo = new PDO("mysql:host=localhost;dbname=xplore", "root", "");
        // Set PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare SQL statement
        $stmt = $pdo->prepare("INSERT INTO `activity` (`nom_activity`, `description`, `lieu`, `date`, `prix`, `capacity_max`, `image`, `id_category`, `duration`, `date_debut`, `date_fin`, `map`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        
        // Bind parameters
        $stmt->bindParam(1, $NOM_ACTIVITY);
        $stmt->bindParam(2, $DESCRIPTION);
        $stmt->bindParam(3, $LIEU);
        $stmt->bindParam(4, $DATE);
        $stmt->bindParam(5, $PRIX);
        $stmt->bindParam(6, $CAPACITY_MAX);
        $stmt->bindParam(7, $img_des);
        $stmt->bindParam(8, $ID_CATEGORY);
        $stmt->bindParam(9, $DURATION);
        $stmt->bindParam(10, $DATE_DEBUT);
        $stmt->bindParam(11, $DATE_FIN);
        $stmt->bindParam(12, $map);

        // Execute statement
        $stmt->execute();

        // If successful, redirect to showActivity.php
        header("Location: ../../view/back.php");
        exit(); // Make sure to exit after redirecting
    } catch(PDOException $e) {
        // If there was an error, display error message
        echo "Error: " . $e->getMessage();
    }
}
?>
