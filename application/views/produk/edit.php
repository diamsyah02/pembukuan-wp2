<section id="main-content" class="d-flex flex-column justify-content-center bg-white p-2 rounded" style="overflow: auto;">
  <div class="container" data-aos="fade-up">
    <h2 class="mb-3">
      <strong>Edit Produk</strong>
    </h2>
    <form id="formEditProduk" method="POST">
      <div class="row">
        <div class="col-md-4 col-12 border p-4">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingNamaProduk" name="name_product" placeholder="Nama Produk" autofocus required>
            <label for="floatingNamaProduk">Nama Produk</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingHargaBeli" name="price_buy" placeholder="Harga Beli" required>
            <label for="floatingHargaBeli">Harga Beli</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingHargaJual" name="price_sale" placeholder="Harga Jual" required>
            <label for="floatingHargaJual">Harga Jual</label>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" style="background-color: #0563bb;">Perbaharui</button>
              </div>
            </div>
            <div class="col-6">
              <div class="d-grid gap-2">
                <a href="<?= site_url('produk'); ?>" class="btn btn-light border">Batal</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8"></div>
      </div>
    </form>
  </div>
</section>

<script>
  let id = '<?= $id;?>'
  $(function() {
    getDetail()
  })

  async function getDetail() {
    let res = await(await fetch(`${url}produk/getDetail/${id}/${Date.now()}`, setHeader())).json()
    let data = res.result
    document.getElementById('floatingNamaProduk').value = data.name_product
    document.getElementById('floatingHargaBeli').value = data.price_buy
    document.getElementById('floatingHargaJual').value = data.price_sale
    document.getElementById('formEditProduk').setAttribute('action', `${url}produk/update/${id}`)
  }
</script>