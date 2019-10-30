<?php
include('../Base/header.php');
require_once '../process.php';

$mysqli = new mysqli('localhost', 'root', '', 'kunstkiste') or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT kunde.vorname, kunde.nachname, teilnehmer.kunden_id, teilnehmer.kurs_id, kurs.name, teilnehmer.anmeldeBestaetigung, teilnehmer.bezahlung, teilnehmer.mahnung 
FROM teilnehmer JOIN kunde ON kunde.id = teilnehmer.kunden_id
JOIN kurs ON kurs.id = teilnehmer.kurs_id") or die($mysqli->error);
//pre_r($result);

if (isset($_SESSION['message'])) : ?>

    <div class="alert alert-<?= $_SESSION['msg_type'] ?>">

        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>

    </div>
<?php endif ?>
<div class="container">
    <div class="row" id="anlegen">
        <form class="form-inline" action="../process.php" method="POST">
        
        <div class="form-group col-sm-12 mb-3">
            <h3 class="h ml-4">Teilnehmer in Kurse einbuchen</h3>
        </div>
                    <div class="form-group col-sm-6">
                <div class="form-group col-sm-12 mb-3">
                    <label class="col-sm-4">Kunden-Nr.</label>
                    <input type="text" name="kunden_id" class="form-control col-sm-8" value="<?php echo $kunden_id; ?>" placeholder="Kunden-Nr. (siehe Kunden-Tabelle)" required>
                </div>
                <div class="form-group col-sm-12 mb-3">
                    <label class="col-sm-4">Kurs-Nr.</label>
                    <input type="text" name="kurs_id" class="form-control col-sm-8" value="<?php echo $kurs_id; ?>" placeholder="Kurs-Nr. (siehe Kurs-Tabelle)" required>
                </div>

            <div class="form-group col-sm-12 mb-3">
            <div class="form-group col-sm-8 mb-3">
                
                <label class="col-sm-4">Anmelde-Bestätigung:<input type="checkbox" class="form-control col-sm-1 ml-3"></label>
                <label class="col-sm-4">Rechnung bezahlt:<input type="checkbox" class="form-control col-sm-1 ml-3"></label>
                <label class="col-sm-4">Mahnung versendet:<input type="checkbox" class="form-control col-sm-1 ml-3"></label>
            </div>
            <div class="form-group col-sm-4">
                <label class="col-sm-3"></label>
                <?php
                if ($update_member == true) :
                    ?>
                    <button type="submit" class="btn btn-secondary col-sm-6 ml-2" name="update_member">ändern</button>
                    <?php else : ?>
                    <button type="submit" class="btn btn-secondary col-sm-6 ml-2" name="save_member">speichern</button>
                    <?php endif; ?>
                </div>
            </div>
        </form>
    </div>

    <div class="row justify-content-center">
        <table class="table-bordered table-hover mb-3 mt-5">
            <thead>
                <tr>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>Kunden-Nr.</th>
                    <th>Kurs-Nr.</th>
                    <th>KursName</th>
                    <th>Anzahl</th>
                    <th>Anm.-Best.</th>
                    <th>Bezahlt</th>
                    <th>Gemahnt</th>
                    <th colspan="2">

                    </th>
                </tr>
            </thead>
            <?php
            while ($row = $result->fetch_assoc()) : ?>
                <tbody>
                    <tr>
                        <td><?php echo $row['vorname']; ?></td>
                        <td><?php echo $row['nachname']; ?></td>
                        <td><?php echo $row['kunden_id']; ?></td>
                        <td><?php echo $row['kurs_id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['anzahlKurse']; ?></td>
                        <td><?php echo $row['anmeldeBestaetigung']; ?></td>
                        <td><?php echo $row['bezahlung']; ?></td>
                        <td><?php echo $row['mahnung']; ?></td>
                        <td>
                            <div class="dropdown dropright">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    bearbeiten
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item btn" href="#anlegen">neu</a>
                                    <a class="dropdown-item btn" href="../process.php?edit=<?php echo $row['id']; ?>">ändern</a>
                                    <a class="dropdown-item btn" href="../process.php?delete=<?php echo $row['id']; ?>">löschen</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            <?php endwhile; ?>
        </table>
    </div>