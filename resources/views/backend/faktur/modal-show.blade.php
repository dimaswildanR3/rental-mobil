<!-- Modal -->
<div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header rounded-0 bg-gradient-primary">
                <h5 class="modal-title text-white">Detail Faktur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body rounded-0">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Kode Factur</label>
                            <input type="text" name="kode_faktur" class="form-control" readonly="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Tahun</label>
                            <input type="number" name="tahun" class="form-control" readonly="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Tanggal Pemesanan</label>
                            <input type="date" name="tanggal_pemesanan" class="form-control" readonly="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Total Pembayaran</label>
                            <input type="number" name="total_bayar" class="form-control" readonly="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                          <label>Metode Pembayaran</label>
                          <input type="text" name="metode_pembayaran" class="form-control" readonly="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                          <label>Pesanan</label>
                          <input type="text" name="id_pemesanan" class="form-control" readonly="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
