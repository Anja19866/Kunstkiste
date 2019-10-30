<!DOCTYPE html>

<?php
include('../Base/header.php');
require_once '../process.php';
?>
<body>
    <div class="container">
        <div class="container-info">
            <div class="row">

            <form class="form-inline" action="../process.php" method="POST">
                <div class="form-group col-sm-12 mb-3">
                    <label class="col-sm-2"></label>
                    <h3>Kurs-Designer</h3>
                </div>
                <div class="form-group col-sm-12 mb-3">
                    <label class="col-sm-2">Kursname</label>
                    <input type="text" name="name" class="form-control col-sm-9" placeholder="Kurs-Bezeichnung" required>
                </div>
                <div class="form-group col-sm-12 mb-3">
                    <label class="col-sm-2">Beschreibung</label>
                    <input type="text" name="beschreibung" class="form-control col-sm-9" placeholder="Beschreibung">
                </div>
                <div class="form-group col-sm-4 mb-3">
                <div class="form-group col-sm-12 mb-3 ml-2">
                    <label class="col-sm-6">Startdatum</label>
                    <input type="datetime-local" name="start" class="form-control col-sm-3" placeholder="TT.MM.JJJJ" required>
                </div>
                <div class="form-group col-sm-12 mb-3 ml-2">
                    <label class="col-sm-6">Enddatum</label>
                    <input type="datetime-local" name="Ende" class="form-control col-sm-3" placeholder="TT.MM.JJJJ">
                </div>
                </div>
                <div class="form-group col-sm-2 mb-3">
                </div>
                <div class="form-group col-sm-4 mb-3">
                <img class="img-kurs" src="/Kunstkiste/scss/images/placeholder.png">
                <!--<input type="image" width="400">-->
                </div>
                <div class="form-group col-sm-12 mb-3">
                    <label class="col-sm-2">Dauer</label>
                    <input type="text" name="Einheiten" class="form-control col-sm-9" placeholder="Dauer, Uhrzeiten, Wiederholungen, wöchentlich o. eintägig usw. beschreiben">
                </div>
                <div class="form-group col-sm-12 mb-3">
                    <label class="col-sm-2">Bemerkungen</label>
                    <input type="text" name="bemerkung" class="form-control col-sm-9" placeholder="Platz für weitere Infos zum Kurs...">
                </div>
                <div class="form-group col-sm-12">
                    <label class="col-sm-2"></label>
                    <button type="submit" class="btn btn-secondary col-sm-4" name="save">senden</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

