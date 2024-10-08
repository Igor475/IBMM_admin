function RedirectionEvent(message, url) {
    Swal.fire({
      icon: "warning",
      title: '<span class="redirect_title">' + message + '</span>',
      showConfirmButton: false,
      html: `<a href='evento-` + url + `' class="link_redirect_event">Retornar</a>`,
      allowOutsideClick: true,
      willClose: () => {
        window.location.href= 'evento-' + url;
      }
  })};

  function RedirectionNews(url) {
    Swal.fire({
      icon: "warning",
      showConfirmButton: false,
      html: `<a href='igreja' class="link_redirect_event">Retornar</a>`,
      allowOutsideClick: true,
      willClose: () => {
        window.location.href= 'igreja';
      }
  })};