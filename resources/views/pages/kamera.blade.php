@extends('layout.app')
@section('main')
<main class="main">
    <section>
        <video id="video" autoplay></video>
<button onclick="takeSnapshot()">Ambil Foto</button>
<input type="hidden" name="latitude" id="latitude">
<input type="hidden" name="longitude" id="longitude">
<canvas id="canvas" style="display: none;"></canvas>

<script>
navigator.mediaDevices.getUserMedia({ video: true })
  .then(stream => {
    document.getElementById('video').srcObject = stream;
  });

navigator.geolocation.getCurrentPosition(position => {
  document.getElementById('latitude').value = position.coords.latitude;
  document.getElementById('longitude').value = position.coords.longitude;
});

function takeSnapshot() {
  const video = document.getElementById('video');
  const canvas = document.getElementById('canvas');
  const context = canvas.getContext('2d');
  canvas.width = video.videoWidth;
  canvas.height = video.videoHeight;
  context.drawImage(video, 0, 0);

  canvas.toBlob(blob => {
    const formData = new FormData();
    formData.append('foto', blob, 'absen.jpg');
    formData.append('latitude', document.getElementById('latitude').value);
    formData.append('longitude', document.getElementById('longitude').value);
    formData.append('waktu_absen', new Date().toISOString());

    fetch('/absen', {
      method: 'POST',
      body: formData,
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      }
    }).then(res => alert("Absen berhasil!"));
  });
}
</script>

    </section>

</main>
@endsection