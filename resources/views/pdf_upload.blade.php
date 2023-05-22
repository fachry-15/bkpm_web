<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dropzone PDF Upload in Laravel</title>
  <link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">Dropzone PDF Upload in Laravel</h1><br>
        <form action="{{ route('pdf.store') }}" method="POST" name="file" files="true" enctype="multipart/form-data"
          class="dropzone" id="pdf-upload">
          @csrf
        </form>
        <button type="button" id="button" class="btn btn-primary">Upload</button>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone('#pdf-upload', {
      maxFilesize: 1,
      acceptedFiles: ".pdf",
      addRemoveLinks: true,
      autoProcessQueue: false,
      init: function () {
        // AKSI KETIKA BUTTON UPLOAD DI KLIK
        $("#button").click(function (e) {
          e.preventDefault();
          myDropzone.processQueue();
        });

        this.on('sending', function(file, xhr, formData) {
          // Tambahkan semua input form ke formData Dropzone yang akan POST
          var data = $('#pdf-upload').serializeArray();
          $.each(data, function(key, el) {
            formData.append(el.name, el.value);
          });
        });
      }
    });
  </script>
</body>

</html>