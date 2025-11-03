$(document).ready(function () {
    $('#file').change( function () {
        if (this.files.leghth > 0) {
            $('#upload-button').prop('disabled', false).css_('opacity', 1);
        } else {
            $('.upload-button').prop('disabled', true).css('opacity', 0.5);
        }
    });

    //hasil modifikasi (after)
   ('#uploadForm').on('submit', function (e) {
      e.preventDefault();

      var formData = new FormData(this);
    
    //kode praktikum sebelunya (before)
   //('#uploadForm').on('submit', function (e) {
   //   e.preventDefault();



        //kode pada praktikum sebelumnya
        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: 'upload_ajax.php',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                    $('#Status').html(response);
                },
            error: function(){
                $('#Status').html('Terjadi kesalahan saat mengunggah file.');
            
            }
        });
    });
});