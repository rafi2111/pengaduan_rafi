$('.tombol-hapus').on('click', function(e){
    e.preventDefault();
    const href = $(this).attr('href');
    
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: 'Untuk menghapus data ini secara permanen',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
      }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
      });

});


const datatrue = $('.datatrue').data('datatrue');
if(datatrue){
     
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: datatrue,
  });
}

const datafalse = $('.datafalse').data('datafalse');

if(datafalse){
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: datafalse,
      });
}

$('.logout').on('click', function(e){
  e.preventDefault();
  const href = $(this).attr('href');
  
  Swal.fire({
      title: 'Apakah anda ingin logout?',
      text: 'Jangan Kangen Loh Yaaaa',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Logout'
    }).then((result) => {
      if (result.value) {
          document.location.href = href;
      }
    });

});