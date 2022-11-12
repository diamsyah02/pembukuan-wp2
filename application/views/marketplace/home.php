<section id="main-content" class="d-flex flex-column justify-content-center bg-white p-2 rounded" style="overflow: auto;">
  <div class="container" data-aos="fade-up">
    <?php
    if ($this->session->flashdata('msg_marketplace') != NULL) echo $this->session->flashdata('msg_marketplace');
    ?>
    <div class="row d-flex align-items-center mb-2">
      <div class="col-md-11 col-12">
        <h2>
          <strong>Daftar Marketplace</strong>
        </h2>
      </div>
      <div class="col-md-1 col-12">
        <a href="<?= site_url('marketplace/add'); ?>" class="btn btn-primary" style="background-color: #feb500;" title="Tambah data">+ Data</a>
      </div>
    </div>
    <div class="bg-white">
      <table class="table table-striped table-bordered" id="table-marketplace">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Marketplace</th>
            <th>Persen Fee</th>
            <th>##</th>
          </tr>
        </thead>
        <tbody id="content-table">

        </tbody>
      </table>
    </div>
  </div>
</section>

<script>
  $(function() {
    getMarketplace()
  })

  async function getMarketplace() {
    let content = ``
    let res = await (await fetch(`${url}marketplace/getData/${Date.now()}`, setHeader())).json()
    if (res != undefined) {
      res.result.map((item, i) => {
        content += `
          <tr>
            <td>${i+1}</td>
            <td>${item.name_marketplace}</td>
            <td>${item.percent_fee}%</td>
            <td>
              <a href="${url}marketplace/edit/${item.id}" style="text-decoration: none;" title="Edit data ${item.name_marketplace}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #feb500;"><path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path><path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path></svg>
              </a>
              &nbsp; | &nbsp;
              <a href="#" style="text-decoration: none;" onclick="remove('${url}marketplace/delete/${item.id}')" title="Hapus data ${item.name_marketplace}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #feb500;"><path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path></svg>
              </a>
            </td>
          </tr>
        `
      })
      $('#content-table').html(content)
      $('#table-marketplace').DataTable()
    }
  }

  function remove(urlText) {
    if (window.confirm('Yakin data ini dihapus?'))
      window.location = urlText
  }
</script>