<div class="container-fluid">
	<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i>Tambah Barang
	</button>

	<table class="table table-bordered">
		<tr>
			<th>NO</th>
			<th>NAMA BARANG</th>
			<th>JENIS BARANG</th>
			<th>KATEGORI</th>
			<th>HARGA BARANG</th>
			<th>QTY</th>
			<th style="text-align:center" colspan="3">AKSI</th>
		</tr>

		<?php 
		$no=1;
		foreach($barang as $brg) : ?>

			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $brg->nama_brg ?></td>
				<td><?php echo $brg->keterangan ?></td>
				<td><?php echo $brg->kategori ?></td>
				<td><?php echo $brg->harga ?></td>
				<td><?php echo $brg->stok ?></td>
				<td><?php echo anchor('admin/data_barang/detail/' .$brg->id_brg, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?></td>
				<td><?php echo anchor('admin/data_barang/edit/' .$brg->id_brg, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?></td>
				<td><?php echo anchor('admin/data_barang/hapus/' .$brg->id_brg, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?></td>
			</tr>

		<?php endforeach; ?>
	</table>

</div>


<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      	<?php echo form_open_multipart('admin/data_barang/tambah_aksi'); ?>
       

        	<div class="form-group">
        		<label>Nama Produk</label>
        		<input type="text" name="nama_brg" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Keterangan</label>
        		<input type="text" name="keterangan" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Kategori</label>
        		<select class="form-control" name="kategori">
        			<option>Pakaian Pria</option>
        			<option>Pakaian Wanita</option>
        			<option>Pakaian Anak</option>
        		</select>
        	</div>
        	<div class="form-group">
        		<label>Harga</label>
        		<input type="text" name="harga" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Stok</label>
        		<input type="text" name="stok" class="form-control">
        	</div>

        	<div class="form-group">
        		<label>Gambar Produk</label><br>
        		<input type="file" name="gambar" class="form-control">
        	</div>
        	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>

      <?php echo form_close(); ?>
      
    </div>
  </div>
</div>