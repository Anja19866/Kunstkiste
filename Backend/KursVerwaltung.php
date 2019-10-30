<?php
include('../Base/header.php');
require_once '../process.php';

$mysqli = new mysqli('localhost', 'root', '', 'kunstkiste') or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT kunde.vorname, kunde.nachname, kunden_id, kurs_id, kurs.name FROM teilnehmer, kunde, kurs") or die($mysqli->error);
//pre_r($result);

if (isset($_SESSION['message'])) : ?>

    <div class="alert alert-<?= $_SESSION['msg_type'] ?>">

        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>

    </div>
<?php endif ?>

<div class="row" id="anlegen">
        <form class="form-inline" action="../process.php" method="POST">
            <div class="form-group col-sm-12 mb-3">
                <label class="col-sm-2"></label>
                <h3>Teilnehmer in Kurse Kurse einbuchen</h3>
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label class="col-sm-2">Kd-Nr.</label>
                <input type="text" name="kunden_id" class="form-control col-sm-9" 
                value="<?php echo $kunden_id; ?>" placeholder="Kunden-Nr. (siehe KundenTabelle)" required>
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label class="col-sm-2">Kurs-Nr.</label>
                <input type="text" name="kurs_id" class="form-control col-sm-9" 
                value="<?php echo $kurs_id; ?>" placeholder="Kurs-Nr. (siehe KursTabelle)" required>
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label class="col-sm-2">Belegte Kurse</label>
                <input type="number" name="anzahlKurse" class="form-control col-sm-9" 
                value="<?php echo $anzahlKurse; ?>">
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label class="col-sm-2">Anmeldebestätigung verschickt: </label>
                <input type="checkbutton????" name="nachname" class="form-control col-sm-9" 
                value="<?php echo $name; ?>" placeholder="Name" required>
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label class="col-sm-2">Anwesenheit</label>
                <input type="text" name="anwesenheit" class="form-control col-sm-9" 
                value="<?php echo $anwesenheit; ?>" placeholder="Notizen">
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label class="col-sm-2">Bezahlt:</label>
                <input type="checkbutton???" name="bezahlung" class="form-control col-sm-9">
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label class="col-sm-2">Mahnung:</label>
                <input type="checkbutton???" name="mahnung" class="form-control col-sm-9">
            </div>
            <div class="form-group col-sm-12">
                <label class="col-sm-2"></label>
                <?php
                if ($update == true) :
                    ?>
                    <button type="submit" class="btn btn-secondary 
                    col-sm-4" name="update">ändern</button>
                <?php else : ?>
                    <button type="submit" class="btn btn-secondary 
                    col-sm-4" name="save">speichern</button>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <table class="table-bordered table-hover mb-3">
            <thead>
                <tr>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>KursNr.</th>
                    <th>Kursbezeichnung</th>
                    <th>Termin</th>
                    <th>Bis</th>
                    <th>Dauer/Wdh.</th>
                    <th>Bemerkung</th>
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
                        <td><?php echo $row['str']; ?></td>
                        <td><?php echo $row['hnr']; ?></td>
                        <td><?php echo $row['plz']; ?></td>
                        <td><?php echo $row['ort']; ?></td>
                        <td><?php echo $row['tel']; ?></td>
                        <td><?php echo $row['bemerkung']; ?></td>
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





