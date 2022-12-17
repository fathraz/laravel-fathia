@extends('Layout')
@section('Content')

<a href="#" onclick="ModalTambahBerita()"  class="btn btn-success"> + Add New Data</a>

<table border="1">
    <tr>
        <th>No</th>
        <th>Kode profile</th>
        <th>Nama profile</th>
        <th>Opsi</th>
    </tr>
    <?php $no = 1; ?>
    @foreach($profile as $Get)
    <tr>
        <td><?= $no; ?></td>
        <td>{{ $Get->kd_profile }}</td>
        <td>{{ $Get->nama_profile }}</td>
        <td>
            <a href="#" onclick="ModalEditBerita({{ $Get->kd_profile }} ,'{{ $Get->nama_profile }}')" class="btn btn-info" >Update</a>
            |
            <a href="#" onclick="ModalHapusBerita({{ $Get->kd_profile }})" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    <?php $no++; ?>
    @endforeach
</table>

<!-- Form Modal Tambah Berita -->
<form action="profile/tambah" method="post">
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
                <label  class="form-label">Kode profile</label>
                <input type="text" class="form-control" name="kd_profile" required>
            </div>
            <div class="mb-3">
                <label  class="form-label">Nama profile</label>
                <textarea name="nama_profile" class="form-control" required></textarea>
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
<form action="profile/hapus" method="post">
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
              <input type="hidden" name="kd_profile">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
          </div>
      </div>
    </div>
  </div>
</form>
  <!-- Form Modal Hapus Berita-->

  <!-- Form Modal Edit Berita -->
<form action="profile/edit" method="post">
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
                <label  class="form-label">Kode Profile</label>
                <input type="text" class="form-control" name="kd_profile" required>
            </div>
            <div class="mb-3">
                <label  class="form-label">Nama Profile</label>
                <input type="text" class="form-control" name="nama_profile"  required>
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
        $('[name="kd_profile"]').val($id);
       $('#ModalHapusBerita').modal('show');
   }
// Modal Tambah Berita

// Modal Edit Berita
 function ModalEditBerita (id,nama) {

        $('[name="kd_profile"]').val(id);
        $('[name="nama_profile"]').val(nama);
       $('#ModalEditBerita').modal('show');
   }
// Modal Edit Berita
   

</script>
@endsection