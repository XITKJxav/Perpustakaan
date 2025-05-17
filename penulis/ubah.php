<?php
include '../Layouts/layout.php';

$id = $_GET["id"];
$perintah = "SELECT * FROM tb_penulis WHERE ID_Penulis = '$id'";
$eksekusi = mysqli_query($koneksi, $perintah);
$data = mysqli_fetch_array($eksekusi);

function handleActiveOptionStatus($status, $activeStatus)
{
    $statusSelected = '';
    if ($activeStatus == $status) {
        $statusSelected = 'checked';
    }
    return $statusSelected;
}

ob_start()

?>

<div class="row mt-3 mb-3 text-capitalize">
    <a href="index.php" class="nav-link text-gray">Click back | List Bahasa </a>
</div>

<div class="row mt-3 mb-3 justify-content-center">
    <div class="card p-0">
        <form action=<?= "proses/ProsesUpdate.php?id=" . $data["ID_Penulis"] ?> method="POST">

            <div class="card-header">
                <h3>Form Update Penulis</h3>
            </div>
            <div class="card-body">
                <div class="form-floating mb-3">
                    <input type="text" id="nama" name="nama" class="form-control" value="<?= $data["Nama_Penulis"] ?>" placeholder="Nama Penulis..." />
                    <label for="nama">Nama Penulis</label>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="radio" id="status" name="status" value="1" <?= handleActiveOptionStatus("1", $data["Status"]) ?> /> Active
                    <input type="radio" id="status" name="status" value="0" <?= handleActiveOptionStatus("0", $data["Status"]) ?> /> Inactive
                </div>
            </div>

            <div class="card-footer">
                <button type="reset" class="btn btn-danger">Clear</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
</div>

<?php

$partial = ob_get_clean();
$layout = new Layout(
    $partial,
    'Update Penulis',
    'penulis'
);

echo $layout->render();