<?php
include('../Base/header.php');
require_once '../process.php';

$mysqli = new mysqli('localhost', 'root', '', 'kunstkiste') or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * FROM kunde") or die($mysqli->error);
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
    <div class="row justify-content-center">
        <div class="col-sm-12 ml-4">
            <h3>Kunden</h3>
        </div>
        <table class="table-bordered table-hover mb-3">
            <thead>
                <tr>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>Straße</th>
                    <th>HNr</th>
                    <th>PLZ</th>
                    <th>Ort</th>
                    <th>Telefon</th>
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
    <div class="row" id="anlegen">
        <form class="form-inline" action="../process.php" method="POST">
            <div class="form-group col-sm-12 mb-3">
                <label class="col-sm-2"></label>
                <h3>Neuer Kunde</h3>
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label class="col-sm-2">Vorname</label>
                <input type="text" name="vorname" class="form-control col-sm-9" value="<?php echo $vorname; ?>" placeholder="Vorname" required>
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label class="col-sm-2">Name</label>
                <input type="text" name="nachname" class="form-control col-sm-9" value="<?php echo $name; ?>" placeholder="Name" required>
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label class="col-sm-2">Straße</label>
                <input type="text" name="str" class="form-control col-sm-9" value="<?php echo $str; ?>" placeholder="Straße">
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label class="col-sm-2">Hausnummer</label>
                <input type="number" name="hnr" class="form-control col-sm-9" value="<?php echo $hnr; ?>" placeholder="Hausnummer">
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label class="col-sm-2">Postleitzahl</label>
                <input type="number" name="plz" class="form-control col-sm-9" value="<?php echo $plz; ?>" placeholder="Postleitzahl">
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label class="col-sm-2">Ort</label>
                <input type="text" name="ort" class="form-control col-sm-9" value="<?php echo $ort; ?>" placeholder="Ort">
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label class="col-sm-2">Telefon</label>
                <input type="text" name="tel" class="form-control col-sm-9" value="<?php echo $tel; ?>" placeholder="Telefonnummer">
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label class="col-sm-2" for="email">E-Mail</label>
                <input type="email" class="form-control col-sm-9" name="email" id="email" value="<?php echo $email; ?>" placeholder="E-Mail-Adresse" required>
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label class="col-sm-2">Bemerkungen</label>
                <input type="text" name="bemerkung" class="form-control col-sm-9" value="<?php echo $text; ?>" placeholder="Ihre Mitteilung an uns:">
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
                        col-sm-4" name="save_customer">speichern</button>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>




<?php
function pre_r($array)
{
    echo '
    <pre>';
    print_r($array);
    echo '</pre>';
}
?>