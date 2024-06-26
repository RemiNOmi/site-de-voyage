<?php
if (isset($_GET['id'])) {
}
if (isset($_POST['send'])) {
    if (
        isset($_POST['id_reservation']) &&
        isset($_POST['nom_client']) &&
        isset($_POST['id_voiture']) &&
        isset($_POST['date_debut']) &&
        isset($_POST['date_fin']) &&
        isset($_POST['email']) &&
        isset($_POST['statut']) &&

        $_POST['id_reservation'] !=  "" &&
        $_POST['nom_client'] != "" &&
        $_POST['id_voiture'] != "" &&
        $_POST['date_debut'] != "" &&
        $_POST['date_fin'] != "" &&
        $_POST['email'] != "" &&
        $_POST['statut'] != ""
    ) {
        try {
            include_once "../config.php";
            include_once "../controller/mailsender.php";
            extract($_POST);

            $pdo = new PDO("mysql:host=localhost;dbname=xplore", "root", "");
            $mail = new MailSender();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->prepare("INSERT INTO reservation (id_reservation, nom_client, id_voiture, date_debut, date_fin, email, statut) 
                VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bindParam(1, $id_reservation);
            $stmt->bindParam(2, $nom_client);
            $stmt->bindParam(3, $id_voiture);
            $stmt->bindParam(4, $date_debut);
            $stmt->bindParam(5, $date_fin);
            $stmt->bindParam(6, $email);
            $stmt->bindParam(7, $statut);
            $stmt->execute();
            $date = new DateTime();
            $mail->send_email($email, $nom_client, $date->format('Y-m-d'));

            header("Location: showreservation.php");
            exit();
        } catch (PDOException $e) {
            header("Location: addreservation.php?message=AddFailed");
            exit();
        }
    } else {
        header("Location: addreservation.php?message=EmptyField");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Reservation</title>
    <link rel="stylesheet" href="../view/backoffice/assets/css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="container">
        <!-- ===============XPLORE================ -->

        <!-- ========================= partie form==================== -->
        <form action="payement_car.php" method="post" id="reservation-form">
            <div class="form">
                <div class="text-center">
                    <h1>Add Reservation</h1>
                </div>



                <div class="input">

                    <input type="hidden" name="id_reservation" id="id_reservation" placeholder="Enter reservation ID">
                    <small id="error-id-reservation" class="error-message"></small>
                </div>

                <script>
                    function generateID1() {
                        return Math.floor(Math.random() * (99999999 - 10000000 + 1)) + 10000000;
                    }


                    document.getElementById('id_reservation').value = generateID1();
                </script>

                <div class="input">
                    <label for="nom_client">Client Name</label>
                    <input type="text" name="nom_client" id="nom_client" placeholder="Enter client name">
                    <small id="error-nom-client" class="error-message"></small>
                </div>

                <div class="input">
                    <label for="id_voiture">Car ID</label>
                    <input type="text" name="id_voiture" id="id_voiture" placeholder="Enter car ID" value="<?php echo isset($_GET['id']) ? htmlspecialchars($_GET['id']) : ''; ?>" <?php echo isset($_GET['id']) ? 'readonly' : ''; ?>>
                    <small id="error-id-voiture" class="error-message"></small>
                </div>

                <div class="input">
                    <label for="date_debut">Start Date</label>
                    <input type="date" name="date_debut" id="date_debut">
                    <small id="error-date-debut" class="error-message"></small>
                </div>

                <div class="input">
                    <label for="date_fin">End Date</label>
                    <input type="date" name="date_fin" id="date_fin">
                    <small id="error-date-fin" class="error-message"></small>
                </div>

                <div class="input">
                    <label for="email">email</label>
                    <input type="text" name="email" id="email" placeholder="Enter your email">
                    <small id="error-prix-total" class="error-message"></small>
                </div>

                <div class="input">
                    <label for="statut">Status</label>
                    <select name="statut" id="statut">
                        <option value="">Select status</option>
                        <option value="active">Active</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                    <small id="error-statut" class="error-message"></small>
                </div>

                <div class="input">
                    <a class="button" href="showcarfront.php">submit</a>
                    <a class="button" href="showcarfront.php">Annuler</a>
                </div>
            </div>
        </form>
    </div>
    <script src="reservation.js"></script>
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>