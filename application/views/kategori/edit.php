<section id="main-content" class="d-flex flex-column justify-content-center bg-white p-2 rounded" style="overflow: auto;">
  <div class="container" data-aos="fade-up">
    <h2 class="mb-3">
      <strong>Edit Kategori Produk</strong>
    </h2>
    <form id="formEditKategori" method="POST">
      <div class="row">
        <div class="col-md-4 col-12 border p-4">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingNamaKategori" name="nama_kategori" placeholder="Nama Kategori Produk" autofocus required>
            <label for="floatingNamaKategori">Nama Kategori</label>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" style="background-color: #feb500;">Perbaharui</button>
              </div>
            </div>
            <div class="col-6">
              <div class="d-grid gap-2">
                <a href="<?= site_url('kategori'); ?>" class="btn btn-light border">Batal</a>
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
    let res = await(await fetch(`${url}kategori/getDetail/${id}/${Date.now()}`, setHeader())).json()
    let data = res.result
    document.getElementById('floatingNamaKategori').value = data.nama_kategori
    document.getElementById('formEditKategori').setAttribute('action', `${url}kategori/update/${id}`)
  }
</script>