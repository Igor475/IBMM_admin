function alertaTempo(msg) {
  Swal.fire({
    icon: "error",
    title: '<span class="txt_msg">' + msg + '</span>',
    showConfirmButton: false,
    html: `<a href="index.php?pag=inicial" class="txt_sweet_alert">OK</a>`
  });
  /* let timerInterval;
  Swal.fire({
    title: '<small>' + msg + '</small>',
    timer: tempo,
    timerProgressBar: true,
    didOpen: () => {
      Swal.showLoading();
      const timer = Swal.getPopup().querySelector("b");
      timerInterval = setInterval(() => {
        timer.textContent = `${Swal.getTimerLeft()}`;
      }, 100);
    },
    willClose: () => {
      clearInterval(timerInterval);
    }
  }).then((result) => {
    /* Read more about handling dismissals below */
    /* if (result.dismiss === Swal.DismissReason.timer) {
      window.location = 'index.php';
    }
  }); */
}

