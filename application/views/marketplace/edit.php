<section id="main-content" class="d-flex flex-column justify-content-center bg-white p-2 rounded" style="overflow: auto;">
  <div class="container" data-aos="fade-up">
    <h2 class="mb-3">
      <strong>Edit Marketplace</strong>
    </h2>
    <form id="formEditMarketplace" method="POST">
      <div class="row">
        <div class="col-md-4 col-12 border p-4">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingNamaMarketplace" name="name_marketplace" placeholder="Nama Marketplace" autofocus required>
            <label for="floatingNamaMarketplace">Name Marketplace</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingPercentFee" name="percent_fee" placeholder="Persen Fee" required>
            <label for="floatingPercentFee">Persen Fee</label>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" style="background-color: #0563bb;">Perbaharui</button>
              </div>
            </div>
            <div class="col-6">
              <div class="d-grid gap-2">
                <a href="<?= site_url('marketplace'); ?>" class="btn btn-light border">Batal</a>
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
    let res = await(await fetch(`${url}marketplace/getDetail/${id}/${Date.now()}`, setHeader())).json()
    let data = res.result
    document.getElementById('floatingNamaMarketplace').value = data.name_marketplace
    document.getElementById('floatingPercentFee').value = data.percent_fee
    document.getElementById('formEditMarketplace').setAttribute('action', `${url}marketplace/update/${id}`)
  }
</script>