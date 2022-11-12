<section id="main-content" class="d-flex flex-column justify-content-center bg-white p-2 rounded" style="overflow: auto;">
  <div class="container" data-aos="fade-up">
    <div class="row d-flex align-items-center mb-2">
      <div class="col-md-4 col-12">
        <h2>
          <strong>Report Bulan <span id="setBulan">Januari</span></strong>
        </h2>
      </div>
      <div class="col-md-2 col-12">
        <select name="filterType" id="filterType" class="form-control" onchange="pickType(this.value)">
          <option value="pembelian">Pembelian</option>
          <option value="penjualan">Penjualan</option>
        </select>
      </div>
      <div class="col-md-1 col-12">
        <select name="filterTahun" id="filterTahun" class="form-control">
          <!-- Diisi JavaScript -->
        </select>
      </div>
      <div class="col-md-2 col-12">
        <select name="filterBulan" id="filterBulan" class="form-control" onchange="pickBulan(this.value)">
          <option value="1-Januari">Januari</option>
          <option value="2-Februari">Februari</option>
          <option value="3-Maret">Maret</option>
          <option value="4-April">April</option>
          <option value="5-Mei">Mei</option>
          <option value="6-Juni">Juni</option>
          <option value="7-Juli">Juli</option>
          <option value="8-Agustus">Agustus</option>
          <option value="9-September">September</option>
          <option value="10-Oktober">Oktober</option>
          <option value="11-November">November</option>
          <option value="12-Desember">Desember</option>
        </select>
      </div>
      <div class="col-md-2 col-12" id="profit"></div>
      <div class="col-md-1 col-12">
        <a href="#" id="btn-print" class="btn btn-primary" target="_blank">Print</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-12">
        <div align="center" style="width: 100%;">
          <canvas id="chartTotalItem"></canvas>
        </div>
        <br />
        <div align="center" style="width: 100%;height: 300px">
          <canvas id="chartTotalNominal"></canvas>
        </div>
      </div>
      <div class="col-md-9 col-12">
        <div class="bg-white" id="table-report-pembelian">
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
              <!-- Diisi JavaScript -->
            </tbody>
          </table>
        </div>
        <div class="bg-white" id="table-report-penjualan">
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
              <!-- Diisi JavaScript -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  let chartTotalItem = null;
  let chartTotalNominal = null;
  $(function() {
    $('#table-report-pembelian').show()
    $('#table-report-penjualan').hide()
    getReport('pembelian')
    setDate()
  })

  function getReport(val) {
    let d = new Date()
    let from = new Date(d.getFullYear(), 12, 1)
    let to = new Date(d.getFullYear(), 12 + 1, 0)
    let data = new FormData()
    data.append('dateFrom', `${from.getFullYear()}-${from.getMonth()+1}-${from.getDate()}`)
    data.append('dateTo', `${to.getFullYear()}-${to.getMonth()+1}-${to.getDate()}`)
    getPembelian(data)
    getPenjualan(data)
    getTotalReport(data)
    $('#btn-print').attr('href', `${url}report/print_report/${from.getFullYear()}-${from.getMonth()+1}-${from.getDate()}/${to.getFullYear()}-${to.getMonth()+1}-${to.getDate()}`);
  }

  async function getPembelian(data) {
    let content = ``
    let res = await(await fetch(`${url}pembelian/getDataByDate/${Date.now()}`, setHeaderPost(data))).json()
    if(res != undefined) {
      if(res.result.length > 0) {
        res.result.map((item, i) => {
          content += `
            <tr>
              <td>${i+1}</td>
              <td>${item.name_product}</td>
              <td>${(item.mst_marketplace_id == 0) ? item.detail_marketplace : item.name_marketplace}</td>
              <td>${parseFloat(item.qty).toLocaleString()}</td>
              <td>Rp ${parseFloat(item.price_produk).toLocaleString()}</td>
              <td>Rp ${parseFloat(item.ongkir).toLocaleString()}</td>
            </tr>
          `
        })
        $('#content-table-pembelian').html(content)
      } else {
        $('#content-table-pembelian').html('')
      }
    } else {
      $('#content-table-pembelian').html('')
    }
  }

  async function getPenjualan(data) {
    let content = ``
    let res = await(await fetch(`${url}penjualan/getDataByDate/${Date.now()}`, setHeaderPost(data))).json()
    if(res != undefined) {
      if(res.result.length > 0) {
        res.result.map((item, i) => {
          content += `
            <tr>
              <td>${i+1}</td>
              <td>${item.name_product}</td>
              <td>${(item.mst_marketplace_id == 0) ? item.detail_marketplace : item.name_marketplace}</td>
              <td>${parseFloat(item.qty).toLocaleString()}</td>
              <td>${parseFloat(item.discount)}%</td>
              <td>Rp ${parseFloat(item.price_produk).toLocaleString()}</td>
              <td>Rp ${parseFloat(item.promo).toLocaleString()}</td>
              <td>Rp ${parseFloat(item.cost_packing).toLocaleString()}</td>
              <td>Rp ${parseFloat(item.cost_admin).toLocaleString()}</td>
            </tr>
          `
        })
        $('#content-table-penjualan').html(content)
      } else {
        $('#content-table-penjualan').html('')
      }
    } else {
      $('#content-table-penjualan').html('')
    }
  }

  async function getTotalReport(data) {
    let res = await (await (fetch(`${url}report/getTotalReport/${Date.now()}`, setHeaderPost(data)))).json()
    if(chartTotalItem != null && chartTotalNominal !=  null) {
      chartTotalItem.data.datasets[0].data = [res.pembelian, res.penjualan]
      chartTotalItem.update()
      chartTotalNominal.data.datasets[0].data = [res.nominal_pembelian, res.nominal_penjualan]
      chartTotalNominal.update()
    } else {
      generateChartTotalItem([res.pembelian, res.penjualan])
      generateChartTotalNominal([res.nominal_pembelian, res.nominal_penjualan])
    }
    $('#profit').html(`<b>Profit : Rp ${parseFloat(res.profit).toLocaleString()}<b>`)
  }

  function setDate() {
    let d = new Date()
    let years = parseFloat(d.getFullYear()) - 2020
    let content = ``
    for (let i = 2020; i <= 2020 + years; i++) {
      content += `
        <option value="${i}" ${i == d.getFullYear() ? 'selected' : ''}>${i}</option>
      `
    }
    document.getElementById('filterTahun').innerHTML = content
  }

  function generateChartTotalItem(data) {
    let ctx = document.getElementById("chartTotalItem").getContext('2d');
    chartTotalItem = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["Pembelian", "Penjualan"],
        datasets: [{
          label: '# of Votes',
          data: data,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          title: {
            display: true,
            text: 'Total Item'
          }
        },
      }
    })
  }

  function generateChartTotalNominal(data) {
    let ctx = document.getElementById("chartTotalNominal").getContext('2d');
    chartTotalNominal = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ["Pembelian", "Penjualan"],
        datasets: [{
          label: '# of Votes',
          data: data,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          title: {
            display: true,
            text: 'Total Nominal'
          }
        },
      }
    })
  }

  async function pickType(val) {
    if (val == 'pembelian') {
      $('#table-report-pembelian').show()
      $('#table-report-penjualan').hide()
    } else {
      $('#table-report-penjualan').show()
      $('#table-report-pembelian').hide()
    }
  }

  async function pickBulan(val) {
    let bulan = val.split('-')
    let tahun = document.getElementById('filterTahun').value
    let type = document.getElementById('filterType').value
    document.getElementById('setBulan').innerHTML = bulan[1]
    let from = new Date(parseFloat(tahun), (parseFloat(bulan) == 1 ? 13 - 1 : parseFloat(bulan) - 1), 1)
    let to = new Date(parseFloat(tahun), (parseFloat(bulan) == 1 ? 13 - 1 : parseFloat(bulan) - 1) + 1, 0)
    let data = new FormData()
    data.append('dateFrom', `${from.getFullYear()}-${from.getMonth()+1}-${from.getDate()}`)
    data.append('dateTo', `${to.getFullYear()}-${to.getMonth()+1}-${to.getDate()}`)
    getPembelian(data)
    getPenjualan(data)
    getTotalReport(data)
    $('#btn-print').attr('href', `${url}report/print_report/${from.getFullYear()}-${from.getMonth()+1}-${from.getDate()}/${to.getFullYear()}-${to.getMonth()+1}-${to.getDate()}`);
  }
</script>