<?php
session_start();

if (!isset($_SESSION["userid"])) {
    header("Location: /index.php?error=notloggedin");
    exit();
}
?>
<?php include 'includes/00.inc.php'; ?>
    <title>Chemperator | Produkt bearbeiten</title>
<?php include 'includes/01.inc.php'; ?>
<?php include 'includes/02.inc.php'; ?>
    <main>
<?php
include_once("classes/dbh.classes.php");
$dbh = new Dbh();
$conn = $dbh->getDbConnection();

$id = $_POST['id'];

$sql = 'SELECT * FROM Artikel WHERE ArtikelID=:id';
$stmt = $conn->prepare($sql);
$stmt->execute([':id' => $id ]);

$product = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (isset($_POST["name"]) && isset($product[0])) {
    $product[0]['Name'] = $_POST['name'];
    $product[0]['Artikelnummer'] = $_POST['Artikelnummer'];
    $product[0]['Kurzbeschreibung'] = $_POST['Kurzbeschreibung'];
    $product[0]['LangeBeschreibung'] = $_POST['LangeBeschreibung'];
    $product[0]['Nettopreis'] = $_POST['Nettopreis'];
    $product[0]['Steuerklasse'] = $_POST['Steuerklasse'];
    $sql = "UPDATE Artikel 
            SET    Artikel.Name = :name, 
                   Artikel.Artikelnummer = :Artikelnummer, 
                   Artikel.Kurzbeschreibung = :Kurzbeschreibung,
                   Artikel.LangeBeschreibung = :LangeBeschreibung,
                   Artikel.Nettopreis = :Nettopreis,
                   Artikel.Steuerklasse = :Steuerklasse
            WHERE  Artikel.ArtikelID = :id";

    $statement = $conn->prepare($sql);

    if ($statement->execute([
        ':name' => $product[0]['Name'],
        ':Artikelnummer' => $product[0]['Artikelnummer'],
        ':Kurzbeschreibung' => $product[0]['Kurzbeschreibung'],
        ':LangeBeschreibung' => $product[0]['LangeBeschreibung'],
        ':Nettopreis' => $product[0]['Nettopreis'],
        ':Steuerklasse' => $product[0]['Steuerklasse'],
        ':id' => $id
    ])) {
        header("Location: products.php");
    }
}
?>
        <h1>Produkt bearbeiten</h1>
        <form action="edit_product.php" method="post">
            <input type="hidden" name="id" value="<?php echo $product[0]['ArtikelID']; ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $product[0]['Name']; ?>">
            <label for="Artikelnummer">Artikelnummer:</label>
            <input type="text" id="Artikelnummer" name="Artikelnummer" value="<?php echo $product[0]['Artikelnummer']; ?>">
            <label for="Kurzbeschreibung">Kurzbeschreibung:</label>
            <textarea id="Kurzbeschreibung" name="Kurzbeschreibung"><?php echo $product[0]['Kurzbeschreibung']; ?></textarea>
            <label for="LangeBeschreibung">LangeBeschreibung:</label>
            <textarea id="LangeBeschreibung" name="LangeBeschreibung"><?php echo $product[0]['LangeBeschreibung']; ?></textarea>
            <label for="Nettopreis">Nettopreis:</label>
            <input type="number" id="Nettopreis" name="Nettopreis" value="<?php echo $product[0]['Nettopreis']; ?>">
            <label for="Steuerklasse">Steuerklasse:</label>
            <input type="number" id="Steuerklasse" name="Steuerklasse" value="<?php echo $product[0]['Steuerklasse']; ?>">
            <input type="submit" value="Änderungen speichern">
        </form>
    </main>
<?php include_once 'includes/99.inc.php'; ?>