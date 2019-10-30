<!DOCTYPE html>

<?php
include('../Base/header.php');
require_once '../process.php';
?>

<body>
    <div class="container">
        <div class="container-info">
            <div class="row">
                <h3>Anmeldung für den Kurs Kreative Köpfe</h3>
                <p>
                    Wir freuen uns sehr über Ihr Interesse an unserem Kurs Kreative Köpfe!
                    Sie können sich hier für den Kurs vormerken lassen.
                </p>
                <p>
                    Anschließend bekommen Sie eine Bestätigungsmail, dass Ihre Anfrage eingegangen ist.<br>
                    Zeitnah werden Sie benachrichtigt ob noch Plätze frei sind und ob der Kurs stattfinden kann.
                </p>
                <p>
                    Bitte geben Sie im Formular Ihre Daten ein und drücken dann auf "senden".
                </p>
            </div>
        </div>
        <div class="row">
            <form class="form-inline" action="../process.php" method="POST">
                <div class="form-group col-sm-12 mb-3">
                    <label class="col-sm-2">Vorname</label>
                    <input type="text" name="vorname" class="form-control col-sm-9" placeholder="Vorname" required>
                </div>
                <div class="form-group col-sm-12 mb-3">
                    <label class="col-sm-2">Name</label>
                    <input type="text" name="nachname" class="form-control col-sm-9" placeholder="Name" required>
                </div>
                <div class="form-group col-sm-12 mb-3">
                    <label class="col-sm-2">Straße</label>
                    <input type="text" name="str" class="form-control col-sm-9" placeholder="Straße">
                </div>
                <div class="form-group col-sm-12 mb-3">
                    <label class="col-sm-2">Hausnummer</label>
                    <input type="number" name="hnr" class="form-control col-sm-9" placeholder="Hausnummer">
                </div>
                <div class="form-group col-sm-12 mb-3">
                    <label class="col-sm-2">Postleitzahl</label>
                    <input type="number" name="plz" class="form-control col-sm-9" placeholder="Postleitzahl">
                </div>
                <div class="form-group col-sm-12 mb-3">
                    <label class="col-sm-2">Ort</label>
                    <input type="text" name="ort" class="form-control col-sm-9" placeholder="Ort">
                </div>
                <div class="form-group col-sm-12 mb-3">
                    <label class="col-sm-2">Telefon</label>
                    <input type="text" name="tel" class="form-control col-sm-9" placeholder="Telefonnummer">
                </div>
                <div class="form-group col-sm-12 mb-3">
                    <label class="col-sm-2" for="email">E-Mail</label>
                    <input type="email" class="form-control col-sm-9" name="email" id="email" placeholder="E-Mail-Adresse" required>
                </div>
                <div class="form-group col-sm-12 mb-3">
                    <label class="col-sm-2">Bemerkungen</label>
                    <input type="text" name="bemerkung" class="form-control col-sm-9" placeholder="Ihre Mitteilung an uns:">
                </div>
                <div class="form-group col-sm-12">
                    <label class="col-sm-2"></label>
                    <button type="submit" class="btn btn-secondary col-sm-4" name="save_customer">senden</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>