@extends('Layout')
@section('Content')

<a href="#" onclick="ModalTambahBerita()"  class="btn btn-success"> + Add New Data</a>

<table border="1">
    <tr>
        <th>No</th>
        <th>Kode kontak</th>
        <th>Nama kontak</th>
        <th>Opsi</th>
    </tr>
    <?php $no = 1; ?>
    @foreach($kontak as $Get)
    <tr>
        <td><?= $no; ?></td>
        <td>{{ $Get->kd_kontak }}</td>
        <td>{{ $Get->nama_kontak }}</td>
        <td>
            <a href="#" onclick="ModalEditBerita({{ $Get->kd_kontak }} ,'{{ $Get->nama_kontak }}')" class="btn btn-info" >Update</a>
            |
            <a href="#" onclick="ModalHapusBerita({{ $Get->kd_kontak }})" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    <?php $no++; ?>
    @endforeach
</table>

<!-- Form Modal Tambah Berita -->
<form action="kontak/tambah" method="post">
    @csrf
<div class="modal fade" id="ModalTambahBerita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" >Form Tambah</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="mb-3">
                <label  class="form-label">Kode Kontak</label>
                <input type="text" class="form-control" name="kd_kontak" required>
            </div>
            <div class="mb-3">
                <label  class="form-label">Nama Kontak</label>
                <textarea name="nama_kontak" class="form-control" required></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
        </div>
        </div>
    </div>
</div>
</form>
<!-- Form Modal Tambah Berita -->

<!-- Form Modal Hapus Berita-->
<form action="kontak/hapus" method="post">
    @csrf
<div class="modal fade" id="ModalHapusBerita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Hapus</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
          <div class="modal-footer">
              <input type="hidden" name="kd_kontak">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
          </div>
      </div>
    </div>
  </div>
</form>
  <!-- Form Modal Hapus Berita-->

  <form action="kontak/edit" method="post">
    @csrf
<div class="modal fade" id="ModalEditBerita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" >Form Ubah</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="mb-3">
                <label  class="form-label">Kode kontak</label>
                <input type="text" class="form-control" name="kd_kontak" required>
            </div>
            <div class="mb-3">
                <label  class="form-label">Nama kontak</label>
                <input type="text" class="form-control" name="nama_kontak"  required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-primary" name="ubah" value="Ubah">
        </div>
        </div>
    </div>
</div>
</form>
<!-- Form Modal Edit Berita -->

<script>

// Modal Tambah Berita
function ModalTambahBerita () {
       $('#ModalTambahBerita').modal('show');
   }
// Modal Tambah Berita

// Modal Hapus Berita
function ModalHapusBerita ($id) {
        $('[name="kd_kontak"]').val($id);
       $('#ModalHapusBerita').modal('show');
   }
// Modal Tambah Berita


// Modal Edit Berita
 function ModalEditBerita (id,nama) {

        $('[name="kd_kontak"]').val(id);
        $('[name="nama_kontak"]').val(nama);
       $('#ModalEditBerita').modal('show');
   }
// Modal Edit Berita

</script>

@endsection