<?php include "includes/header.php";

if (isset($_GET["id"])) {
    $albumId = $_GET["id"];
} else {
    header("Location: index.php");
}

$album = new Album($con, $albumId);
$artist = $album->getAlbumArtist();

echo $album->getAlbumTitle();
echo $artist->getArtistName();
?>


<?php include "includes/footer.php";
