function RedirectionEvent(message, url) {
    Swal.fire({
      icon: "warning",
      title: '<span class="redirect_title">' + message + '</span>',
      showConfirmButton: false,
      html: `<a href='` + url + `' class="link_redirect_event">Retornar</a>`,
      allowOutsideClick: true,
      willClose: () => {
        window.location.href= url;
      }
  })};