@include('perpus.partials.sidebar')

<head>
    <title>Edit Buku</title>
</head>
<div class="container p-3 m-4 h-100"
    style="background-color: #FFFFFF; border-top: 5px solid #Ff4e44; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="body d-flex justify-content-between">
        <h4 style="flex: 1 1 50%">EDIT BUKU</h4>

    </div>
    <hr>
    <table>
        <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <tr>
                <td>Nama Buku</td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td>
                    <input class="form-control mt-2 mb-2 @error('judul') is-invalid @enderror" type="text" id="judul" name="judul"
                    value="{{ $buku->judul }}" placeholder="Judul Buku" />
                </td>
                @error('judul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                 @enderror
            </tr>
            <tr>
                <td>Gambar</td>
            </tr>
            <tr>
                <td>
                    <img src="{{ asset('storage/'.$buku->gambar) }}" class="img-preview img-fluid" style="width: 150px">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="oldImage" value="{{ $buku->gambar }}">
                    <input type="file" accept="image/jpeg" class="form-control mt-2 mb-2 @error('gambar') is-invalid @enderror" id="gambar" name="gambar" value="{{ asset('storage/'.$buku->gambar) }}" onchange="changeImage()">
                </td>
                @error('gambar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                 @enderror
            </tr>
            <tr>
                <td>Jumlah</td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td>
                    <input class="form-control mt-2 mb-2 @error('jumlah') is-invalid @enderror" type="number" id="jumlah" name="jumlah"
                        placeholder="Jumlah Buku" value="{{ $buku->jumlah }}"/>
                </td>
                @error('jumlah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </tr>
            <tr>
                <td>
                    <button type="submit" class="btn btn-warning" name="confirm"
                        style="background-color:#ff4e44;">Konfirmasi</button>
                    <a class="btn btn-warning" href="/listBuku" role="button"
                        style="background-color:#ff4e44;">Batal</a>
                </td>
            </tr>
        </form>
    </table>
</div>
</aside>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script defer src="/js/scriptPerpus.js"></script>
</body>

</html>