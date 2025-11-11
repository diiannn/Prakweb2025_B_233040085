$(function () {
  $('.tombolTambahData').on('click', function () {
    $('#judulModalLabel').html('Tambah Data Mahasiswa');

    $('.modal-footer button[type=submit]').html('Tambah data');
  });

  //
  $('.tampilModalUbah').on('click', function () {
    $('#judulModalLabel').html('Ubah Data Mahasiswa');
    $('.modal-footer button[type=submit]').html('Ubah Data');
    $('.modal-body form').attr('action', 'http://localhost/pertemuan2/tugas/mvc/public/mahasiswa/ubah');

    const id = $(this).data('id');

    $.ajax({
      url: 'http://localhost/pertemuan2/tugas/mvc/public/mahasiswa/getubah',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#nama').val(data.nama);
        $('#nrp').val(data.nrp);
        $('#email').val(data.email);
        $('#jurusan').val(data.jurusan);
        $('#id').val(data.id);
      },
    });
  });

  $('.tampilModalUbah').on('click', function () {
    $('#judulModalLabel').html('Ubah Data user');
    $('.modal-footer button[type=submit]').html('Ubah Data');
    $('.modal-body form').attr('action', 'http://localhost/pertemuan2/tugas/mvc/public/user/ubah');

    const id = $(this).data('id');

    $.ajax({
      url: 'http://localhost/pertemuan2/tugas/mvc/public/user/getubah',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#name').val(data.name);
        $('#email').val(data.email);
        $('#id').val(data.id);
      },
    });
  });
});
