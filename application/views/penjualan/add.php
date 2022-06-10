<section id="main-content" class="d-flex flex-column justify-content-center bg-white p-2 rounded" style="overflow: auto;">
  <div class="container" data-aos="fade-up">
    <h2 class="mb-3">
      <strong>Tambah Penjualan</strong>
    </h2>
    <form action="<?= site_url('penjualan/save'); ?>" method="POST">
      <div class="row">
        <div class="col-md-4 col-12 border p-4">
          <div class="form-floating mb-3">
            <select name="produk" id="floatingProduk" class="form-control" onchange="pickProduk(this.value)" required>
              <!-- Diisi JavaScript -->
            </select>
            <label for="floatingProduk">Produk</label>
          </div>
          <!-- <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingHargaProduk" name="harga_produk" placeholder="Harga Produk" readonly required>
            <label for="floatingHargaProduk">Harga Produk</label>
          </div> -->
          <div class="form-floating mb-3">
            <select name="marketplace" id="floatingMarketplace" class="form-control" onchange="pickMarketplace(this.value)" required>
              <!-- Diisi JavaScript -->
            </select>
            <label for="floatingMarketplace">Marketplace</label>
          </div>
          <div class="form-floating mb-3" id="wrapDetailMarketplace" style="display: none;">
            <input type="text" class="form-control" id="floatingDetailMarketplace" name="detail_marketplace" placeholder="Detail Marketplace">
            <label for="floatingDetailMarketplace">Detail Marketplace</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingQty" name="qty" placeholder="Kuantitas" required>
            <label for="floatingQty">Kuantitas</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingDiscount" name="discount" placeholder="Diskon" required>
            <label for="floatingDiscount">Diskon</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingPromo" name="promo" placeholder="Promo" required>
            <label for="floatingPromo">Promo</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingPacking" name="packing" placeholder="Packing" required>
            <label for="floatingPacking">Packing</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingAdmin" name="admin" placeholder="Admin" required>
            <label for="floatingAdmin">Admin</label>
          </div>
          <div class="form-floating mb-3">
            <input type="date" class="form-control" id="floatingTanggal" name="tanggal" placeholder="Tanggal" required>
            <label for="floatingTanggal">Tanggal</label>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" style="background-color: #0563bb;">Simpan</button>
              </div>
            </div>
            <div class="col-6">
              <div class="d-grid gap-2">
                <a href="<?= site_url('penjualan'); ?>" class="btn btn-light border">Batal</a>
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
  $(function() {
    getProduk()
    getMarketplace()
  })

  async function getProduk() {
    let content = `<option value="">--Pilih--</option>`
    let res = await(await fetch(`${url}/produk/getData`)).json()
    res.result.map((item, i) => {
      content += `
        <option value="${item.id}">${item.name_product} - ${item.stock} item</option>
      `
    })
    $('#floatingProduk').html(content)
  }

  async function getMarketplace() {
    let content = `<option value="">--Pilih--</option>`
    let res = await(await fetch(`${url}/marketplace/getData`)).json()
    res.result.map((item, i) => {
      content += `
        <option value="${item.id}">${item.name_marketplace}</option>
      `
    })
    content += `
      <option value="0">Other</option>
    `
    $('#floatingMarketplace').html(content)
  }

  function pickMarketplace(val) {
    if(val == 0)
      document.getElementById('wrapDetailMarketplace').style.display = 'block'
    else
      document.getElementById('wrapDetailMarketplace').style.display = 'none'
  }
</script>