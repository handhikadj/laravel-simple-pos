<div class="modal fade" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="form-contact" method="post" class="form-horizontal" data-toggle="validator">
        @csrf
        @method("POST")
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"> &times; </span>
          </button>
          <h3 class="modal-title"></h3>
        </div>

        <div class="modal-body">

          <div class="row">

            <div id="formcontain1">
              <input type="hidden" id="id" name="id">
              <input type="hidden" id="kd_barang" name="kd_barang">

              <div class="form-group">
                <label id="nm_rotilabel" for="nama_roti" class="col-md-12 control-label">Nama Roti</label>
                <div class="col-md-12" id="buattypeahead">
                  <input type="text" id="nama_roti" name="nama_roti" class="form-control">
                  <span class="help-block with-errors"></span>
                </div>
              </div>

              <div class="form-group">
                <label id="hargalabel" for="harga" class="col-md-12 control-label">Harga</label>
                <div class="col-md-12" id="maudipilih">
                  <input type="number" id="harga" name="harga" class="form-control" required>
                  <span class="help-block with-errors"></span>
                </div>
              </div>

              <div class="d-flex col-md-12 offset-6">
                <button type="submit" class="btn btn-success" id="inputhitung">Input<i class="fas fa-chevron-circle-right ml-2"></i></button>
              </div>
            </div> {{-- end of md-4 --}}






          </div> {{-- end of row --}}

        </div>

        <div class="modal-footer" id="modalfooter">
          <button type="submit" class="btn btn-primary btn-save" id="btnsubmit">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>

      </form> {{-- end of form contact --}}

      <div id="form-inputbarang">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"> &times; </span>
          </button>
          <h3 class="modal-title"></h3>
        </div>

        <div class="modal-body">

          <div class="row">
          
          <div id="formcontain2">
            <form id="forminputbarang" method="post" class="form-horizontal" data-toggle="validator">
              @csrf
              @method("POST")
              <input type="hidden" id="transaction_detail_id" name="transaction_detail_id">
              <input type="hidden" id="id_transaksi" name="id_transaksi">

              <div class="form-group">
                <label id="kdproduk" for="kdproduk" class="col-md-12 control-label">Kode Produk</label>
                <div class="col-sm-12" id="buattypeahead">
                  <input type="text" id="typeahead" name="kd_barang" class="form-control" autocomplete="off">
                  <span class="help-block with-errors"></span>
                </div>
              </div>

              <div class="form-group">
                <label id="jumbellabel" for="jumbel" class="col-md-12 control-label">Jumlah Pembelian</label>
                <div class="col-md-12" id="maudipilih">
                  <input type="number" id="jumbel" name="jumlah" class="form-control" autocomplete="off">
                  <span id="error-block" class="help-block with-errors"></span>
                </div>
              </div>


              <div class="d-flex flex-column col-md-7  offset-sm-5">
                <button type="submit" class="btn btn-success" id="inputhitung" name="input">Input
                  <i class="fas fa-chevron-circle-right ml-2"></i></button>
                <button type="submit" class="btn btn-danger mt-2" id="bayar">Bayar
                  <i class="far fa-money-bill-alt ml-2"></i></button>
              </div>
            </form> 
          </div> {{-- end of formcontain --}}

            <div id="tableinmodal">
              <div class="d-flex">
                <p class="mr-2">No. Transaksi:</p>
                <strong id="kdotomatis">
                </strong>
              </div>
              <div id="the_table">
                
              </div>
            
            </div> {{-- end of tableinmodal --}}

          </div> {{-- end of row --}}

        </div>
       </div> 
    </div>
  </div>
</div>



