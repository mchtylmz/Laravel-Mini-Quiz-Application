$(function() {
      $("form").on('submit', function(event){
           $(this).find('button[type=submit]').attr('disabled', 'disabled').toggleClass('running');
      });
      $("form.quiz").on('submit', function(event){
            event.preventDefault();
            swal.fire({
                  title: 'Kayıt edilsin mi?',
                  text: 'Quiz bitirilecek ve cevaplar kayıt edilecek, cevaplar emin misiniz?',
                  icon: 'question',
                  showCancelButton: true,
                  showCloseButton: true,
                  buttonsStyling: false,
                  confirmButtonClass: 'btn btn-success',
                  confirmButtonText: 'Kaydet ve Bitir',
                  cancelButtonText: 'Vazgeç',
                  cancelButtonClass: 'btn btn-secondary'
            }).then((result) => {
                  if (result.value) {
                        $("form.quiz").off("submit").submit();
                  }
            });
       });
      window.deleteConfirm = function (route, message) {
            swal.fire({
                  title: 'Siliniyor',
                  text: message  + ' siliniyor, onaylıyor musun?',
                  icon: 'question',
                  showCancelButton: true,
                  showCloseButton: true,
                  buttonsStyling: false,
                  confirmButtonClass: 'btn btn-danger',
                  confirmButtonText: 'Sil',
                  cancelButtonText: 'Vazgeç',
                  cancelButtonClass: 'btn btn-secondary'
            }).then((result) => {
                  if (result.value) {
                        $.ajax({
                              type:'DELETE',
                              url: route,
                              data: {
                                    _token: $('meta[name="csrf-token"]').attr('content')
                              },
                              dataType: "json",
                              success:function(data, status) {
                                    Swal.fire({
                                          icon: 'success',
                                          title: 'Başarılı',
                                          timer: 1000,
                                          showCancelButton: false,
                                          showCloseButton: false,
                                          showConfirmButton: false,
                                    }).then((result) => {
                                          location.reload();
                                    });
                              },
                              error:function(data, status) {
                                    Swal.fire({
                                          icon: 'error',
                                          title: 'Başarısız',
                                          timer: 1000,
                                          showCancelButton: false,
                                          showCloseButton: false,
                                          showConfirmButton: false,
                                    });
                              }
                        });
                  }
            })
       };
       $('#isStarted').on('change', function() {
            $('#sdate').attr('readonly', 'readonly').removeAttr('required');
            if (this.value == 1) {
                  $('#sdate').removeAttr('readonly').attr('required', 'required');
            }
            if (this.value == 0) {
                  $('#sdate').val('');
            }
       });
       $('#isFinished').on('change', function() {
            $('#edate').attr('readonly', 'readonly').removeAttr('required');
            if (this.value == 1) {
                  $('#edate').removeAttr('readonly').attr('required', 'required');
            }
            if (this.value == 0) {
                  $('#sdate').val('');
            }
       });
});