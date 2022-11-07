@include('perpus.partials.sidebar')
<?php
    $name = auth()->user()->name;
    $no=1;
    
?>
<head>
    <title>List Pembeli</title>
</head>
<div class="container p-3 m-4 h-100"
    style="background-color: #FFFFFF; border-top: 5px solid #Ff4e44; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="body d-flex justify-content-between">
        <h4 style="flex: 1 1 50%">LIST PEMBELI PERNAH MEMBELI MAJALAH</h4>
    </div>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pembeli</th>
                <th scope="col">Judul Majalah</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pembelian as $item)
            <?php
                $majalahs = DB::table('majalahs')->where('id',$item->majalah_id)->pluck("judul");
                $pembelis = DB::table('users')->where('id', $item->pembeli_id)->pluck('name'); 
                    
            ?> 
            <tr> 
                <th scope="row">{{ $no }}</th>
                @foreach ($pembelis as $pembeli)
                    <td>{{ $pembeli }}</td>
                @endforeach 
                @foreach ($majalahs as $majalah)
                    <td>{{ $majalah }}</td>
                @endforeach 
                <td>{{ $item->status }}</td>
            </tr>
                <?php
                    $no++;
                ?>
            @empty
                <tr> 
                    <td colspan="7"> Belum Ada Pembeli </td> 
                </tr>
            @endforelse    
        </tbody>
    </table>
    {{$pembelian->links()}}
</div>
</aside>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>