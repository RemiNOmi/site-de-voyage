<?php

include '../config.php';
$conn = config::getConnexion();

// Check if hotel name is provided in the URL
if(isset($_GET['hotel'])) {
    // Get the hotel name from the URL parameter
    $hotelName = $_GET['hotel'];
    $sql = "SELECT hotels.nomHotel, hotels.lienPhotoHotel, hotels.adresse, hotels.description, hotels.etoiles, hotels.infoContact, 
                   offres.lienOffre1, offres.lienOffre2, offres.lienOffre3, offres.descriptionOffre,
                   chambres.typeChambre, chambres.prixChambre
            FROM offres
            LEFT JOIN hotels ON  offres.nomHotel = hotels.nomHotel
            LEFT JOIN chambres ON hotels.nomHotel = chambres.nomHotel
            WHERE hotels.nomHotel = :hotel";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':hotel', $hotelName, PDO::PARAM_STR);
    $stmt->execute();

    $selectedHotel = $stmt->fetch(PDO::FETCH_ASSOC);

    
}

include('../view/readMore_template.php');
?>
