<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Report</title>
    <link href="<?= base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/DataTables/datatables.min.css">
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">

    <script src="<?= base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/DataTables/datatables.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="bg-white" id="table-report-pembelian">
            <h3 class="mb-3 mt-3">Data Pembelian</h3>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Produk</th>
                        <th>Marketplace</th>
                        <th>Kuantitas</th>
                        <th>Harga Produk</th>
                        <th>Ongkir</th>
                    </tr>
                </thead>
                <tbody id="content-table-pembelian">
                    <?php
                    foreach ($pembelian as $key => $item) :
                    ?>
                        <tr>
                            <td><?= $key + 1; ?>{i+1}</td>
                            <td><?= $item['name_product']; ?></td>
                            <td><?= ($item['mst_marketplace_id'] == 0) ? $item['detail_marketplace'] : $item['name_marketplace']; ?></td>
                            <td><?= number_format((float)$item['qty']); ?></td>
                            <td>Rp <?= number_format((float)$item['price_produk']); ?></td>
                            <td>Rp <?= number_format((float)$item['ongkir']); ?></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
        <br/>
        <hr/>
        <br/>
        <div class="bg-white" id="table-report-penjualan">
            <h3 class="mb-3">Data Penjualan</h3>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Produk</th>
                        <th>Marketplace</th>
                        <th>Kuantitas</th>
                        <th>Diskon</th>
                        <th>Harga Produk</th>
                        <th>Promo</th>
                        <th>Packing</th>
                        <th>Admin</th>
                    </tr>
                </thead>
                <tbody id="content-table-penjualan">
                    <?php
                    foreach ($penjualan as $key => $item) :
                    ?>
                        <tr>
                            <td><?= $key+1;?>{i+1}</td>
                            <td><?= $item['name_product'];?></td>
                            <td><?= ($item['mst_marketplace_id'] == 0) ? $item['detail_marketplace'] : $item['name_marketplace'];?></td>
                            <td><?= number_format((float)$item['qty']);?></td>
                            <td><?= (float)$item['discount'];?>%</td>
                            <td>Rp <?= number_format((float)$item['price_produk']);?></td>
                            <td>Rp <?= number_format((float)$item['promo']);?></td>
                            <td>Rp <?= number_format((float)$item['cost_packing']);?></td>
                            <td>Rp <?= number_format((float)$item['cost_admin']);?></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        function print_page() {
            setTimeout(() => window.print(), 500)
        }
        print_page()
    </script>
</body>

</html>