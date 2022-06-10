<section id="main-content" class="d-flex flex-column justify-content-center bg-white p-2 rounded" style="overflow: auto;">
  <div class="container" data-aos="fade-up">
    <div class="row d-flex align-items-center mb-2">
      <div class="col-md-11 col-12">
        <h2>
          <strong>Daftar Produk</strong>
        </h2>
      </div>
      <div class="col-md-1 col-12">
        <a href="<?= site_url('produk/add'); ?>" class="btn btn-primary" style="background-color: #0563bb;" title="Tambah data">+ Data</a>
      </div>
    </div>
    <div class="bg-white">
      <table class="table table-striped table-bordered" id="table-produk">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Produk</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>##</th>
          </tr>
        </thead>
        <tbody id="content-table">
          <!-- Diisi JavaScript -->
        </tbody>
      </table>
    </div>
  </div>
</section>

<script>
  $(function() {
    getProduk()
  })

  async function getProduk() {
    let content = ``
    let res = await(await fetch(`${url}produk/getData/${Date.now()}`, setHeader())).json()
    if(res != undefined) {
      res.result.map((item, i) => {
        content += `
          <tr>
            <td>${i+1}</td>
            <td>${item.name_product}</td>
            <td>Rp ${parseFloat(item.price_buy).toLocaleString()}</td>
            <td>Rp ${parseFloat(item.price_sale).toLocaleString()}</td>
            <td>${item.stock} item</td>
            <td>
              <a href="${url}produk/edit/${item.id}" style="text-decoration: none;" title="Edit data ${item.name_product}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #0563bb;"><path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path><path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path></svg>
              </a>
            </td>
          </tr>
        `
      })
      $('#content-table').html(content)
      $('#table-produk').DataTable()
    }
  }

  function remove(urlText) {
    if(window.confirm('Yakin data ini dihapus?'))
      window.location = urlText
  }
</script>