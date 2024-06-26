<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Inscription</title>
    <style>
    .form {
        border: 2px solid blue;
        padding: 20px;
        border-radius: 10px;
        max-width: 1100px; /* Ajustez la largeur selon vos besoins */
        margin: auto; /* Centrer le formulaire horizontalement */
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .form .submit1 {
  /* Styles spécifiques pour le bouton submit à l'intérieur du formulaire */
  border: none;
  outline: none;
  background-color: royalblue;
  padding: 10px 20px;
  border-radius: 50px;
  color: #fff;
  font-size: 16px;
  width:610px;;
  transition: transform 0.3s ease;
}
 .form .signin {
  text-align: center;
  position: absolute;
  top: 110%; 
  left: 50%; 
  transform: translate(-50%, -50%); 
}
</style>
</head>
    <body>
    <p class="title">Register </p>
    <p class="message">Signup now and get full access to our app. </p>
    <a href = "front.html" class="btn btn-primary">Back</a>
    <form class="form" method="POST" name="inscription" id="formulaire" enctype="multipart/form-data">
            <div class="flex">
                <label>
                <input placeholder="" type="number" name="cin" class="input" >
                    <span>Cin User</span>
                    <div id="cin"></div>
                </label>
                <label>
                    <input placeholder="" type="text" name="nom" class="input" >
                    <span>Nom User</span>
                    <div id="nom"></div>
                </label>
            </div>
            <div class="flex">
                <label>
                    <input placeholder="" type="text" name="prenom" class="input">
                    <span>Prenom User</span>
                    <div id="prenom"></div>
                </label>
                <label>
                    <input placeholder="" type="date" name="d_n" class="input" >
                    <span>Date De Naissance</span>
                    <div id="d_n"></div>
                </label>
            </div>
            <div class="flex">
                <label>
                    <input placeholder="" type="email" name="email" class="input">
                    <span>Email User</span>
                    <div id="email"></div>

                </label>
                <label>
                    <input placeholder="" type="number" name="phone" class="input">
                    <span>Phone User</span>
                    <div id="phone"></div>
                </label>
            </div>
            <div class="flex">
                <label>
                    <input placeholder="" type="password" name="pwd" class="input" >
                    <span>Password User</span>
                    <div id="password"></div>
                </label>
                <label>
                    <input placeholder="" type="password" name="confirm_pwd" class="input" >
                    <span>Confirm Password</span>
                    <div id="confirm_password"></div>
                </label>
            </div>
                <label>
                    <input type="file" name="img" id="img" class="input" >
                    <span>Image User</span>
                    <div id="img_error"></div>
                </label>
                <button type="submit" name="ajouter" value="ajouter" class="submit1">Submit</button>
              <p class="signin">Already have an acount ? <a href="login.php">Signin</a> </p>
    </form>
    <script src="assets/User_js/Ajout_User.js"></script>
    </body>
</HTML>

<?PHP
if ((isset($_POST['pwd']))&&(isset($_POST['confirm_pwd'])) ){
$password=$_POST['pwd'];
$confirm_password=$_POST['confirm_pwd'];}
if (isset($_POST['ajouter']))
{
    require_once('../config.php');
    $conn = config::getConnexion();
try {
    $requette = $conn->prepare("SELECT * FROM tab_user where email=:email");
    $requette->bindParam(':email',$_POST["email"]);
    $requette->execute();
    $count1=$requette->rowCount();
    $query = $conn->prepare("SELECT * FROM tab_user where cin=:cin");
    $query->bindParam(':cin',$_POST["cin"]);
    $query->execute();
    $count=$query->rowCount();
    $query2= $conn->prepare("SELECT * FROM tab_user where phone=:phone");
    $query2->bindParam(':phone',$_POST["phone"]);
    $query2->execute();
    $count2=$query2->rowCount();
    if($count>0)
    {
        echo '<script>alert("CIN existe deja!!");</script>';}
    else if($count1>0)
    {
        echo '<script>alert("Email existe deja!!");</script>';}
    else if($count2>0)
    {
        echo '<script>alert("phone Number existe deja!!");</script>';}
    else if($password!=$confirm_password)
    {
        echo '<script>alert("vérifier votre password!!");</script>';}
    else{
        include "../Controller/UserC.php";
        $password=password_hash($_POST['pwd'], PASSWORD_DEFAULT);
        if (isset($_FILES['img'])){
        $image = $_FILES['img'];
        $img_loc = $_FILES['img']['tmp_name'];
        $img_name = $_FILES['img']['name'];}
        $img_des = "assets/imgs/".$img_name;
        move_uploaded_file($img_loc, 'assets/imgs/'.$img_name);
    $User= new User($_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['d_n'],$_POST['email'],$_POST['phone'],$password,$img_des);
    $UserC=new UserC();
    $UserC->ajouterUser($User);
    session_start();
    $_SESSION['prenom'] = $_POST['prenom']; 
    $_SESSION['cin'] = $_POST['cin']; 
    header("Location:back_User.php");
        }
} catch (PDOException $e) {
    echo 'echec de connexion:' . $e->getMessage();}       

}

?>