<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SCAN ME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

    <div class="container col-lg-4 py-5">
        {{--Scanner--}}
        <div class="card bg-warning shadow rounded-3 p-3 border-0">
            {{--Pesan--}}

            @if (session()->has('gagal'))
                <p>Gagal</p>
            @endif

            @if (session()->has('success'))
            <p>Masuk</p>
            @endif

            <p class="text-center bold">
            Scan me!!
            </p>
            <video id="preview"></video>

            {{--Form--}}
            <form action=" {{ route('store') }}" method="POST" id="form">
                @csrf
                <input type="hidden" name="id_tamu" id="id_tamu">
            </form>
        </div>
        {{--Scanner--}}

        <div class="table-responsive mt-4">
            <table class="table table-bordered table hover bg-warning">
                <tr>
                    <th>Nama</th>
                    <th>Tanggal</th>
                </tr>
            </table>
        </div>
    </div>
    
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript">
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
        scanner.addListener('scan', function (content) {
          console.log(content);
        });
        Instascan.Camera.getCameras().then(function (cameras) {
          if (cameras.length > 0) {
            scanner.start(cameras[0]);
          } else {
            console.error('No cameras found.');
          }
        }).catch(function (e) {
          console.error(e);
        });

        scanner.addListener('scan', function(c){
            document.getElementById('id_tamu').value = c;
            document.getElementById('form').submit();
        })
      </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>