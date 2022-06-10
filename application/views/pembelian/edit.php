<section id="main-content" class="d-flex flex-column justify-content-center bg-white p-2 rounded" style="overflow: auto;">
  <div class="container" data-aos="fade-up">
    <h2 class="mb-3">
      <strong>Edit Pembelian</strong>
    </h2>
    <form id="formEditPembelian" method="POST">
      <div class="row">
        <div class="col-md-4 col-12 border p-4">
          <div class="form-floating mb-3">
            <select name="produk" id="floatingProduk" class="form-control" required>
              <!-- Diisi JavaScript -->
            </select>
            <label for="floatingProduk">Produk</label>
          </div>
          <div class="form-floating mb-3">
            <select name="marketplace" id="floatingMarketplace" class="form-control" onchange="pickMarketplace(this.value)" required>
              <!-- Diisi JavaScript -->
            </select>
            <label for="floatingMarketplace">Marketplace</label>
          </div>
          <div class="form-floating mb-3" id="wrapDetailMarketplace">
            <input type="text" class="form-control" id="floatingDetailMarketplace" name="detail_marketplace" placeholder="Detail Marketplace" required>
            <label for="floatingDetailMarketplace">Detail Marketplace</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingQty" name="qty" placeholder="Kuantitas" required>
            <label for="floatingQty">Kuantitas</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingOngkir" name="ongkir" placeholder="Ongkir" required>
            <label for="floatingOngkir">Ongkir</label>
          </div>
          <div class="form-floating mb-3">
            <input type="date" class="form-control" id="floatingTanggal" name="tanggal" placeholder="Tanggal" required>
            <label for="floatingTanggal">Tanggal</label>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" style="background-color: #0563bb;">Perbaharui</button>
              </div>
            </div>
            <div class="col-6">
              <div class="d-grid gap-2">
                <a href="<?= site_url('pembelian'); ?>" class="btn btn-light border">Batal</a>
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
    let res = await(await fetch(`${url}pembelian/getDetail/${id}/${Date.now()}`, setHeader())).json()
    console.log(res.result)
    let tanggal = res.result.created_at.split(' ')
    document.getElementById('formEditPembelian').setAttribute('action', `${url}pembelian/update/${id}`)
    document.getElementById('floatingQty').value = res.result.qty
    document.getElementById('floatingDetailMarketplace').style.display = (res.result.mst_marketplace_id == 0) ? 'block' : 'none'
    document.getElementById('floatingDetailMarketplace').value = res.result.detail_marketplace
    document.getElementById('floatingOngkir').value = res.result.ongkir
    document.getElementById('floatingTanggal').value = tanggal[0]
    getProduk(res.result.mst_produk_id)
    getMarketplace(res.result.mst_marketplace_id)
  }

  async function getProduk(produk) {
    let content = `<option value="" ${(produk == '') ? 'selected' : ''}>--Pilih--</option>`
    let res = await(await fetch(`${url}produk/getData/${Date.now()}`)).json()
    res.result.map((item, i) => {
      // if(produk == item.id){
      //   document.getElementById('floatingHargaProduk').value = item.price
      // }
      content += `
        <option value="${item.id}" ${(produk == item.id) ? 'selected' : ''}>${item.name_product}</option>
      `
    })
    $('#floatingProduk').html(content)
  }

  async function getMarketplace(marketplace) {
    let content = `<option value="" ${(marketplace == '') ? 'selected' : ''}>--Pilih--</option>`
    let res = await(await fetch(`${url}marketplace/getData/${Date.now()}`)).json()
    res.result.map((item, i) => {
      content += `
        <option value="${item.id}" ${(marketplace == item.id) ? 'selected' : ''}>${item.name_marketplace}</option>
      `
    })
    content += `
      <option value="0" ${(marketplace == 0) ? 'selected' : ''}>Other</option>
    `
    $('#floatingMarketplace').html(content)
  }
</script>