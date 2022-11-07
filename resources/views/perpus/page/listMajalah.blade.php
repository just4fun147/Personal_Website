@include('perpus.partials.sidebar')

<?php
    $name = auth()->user()->name;
    $no=1;
?>
<head>
    <title>List Majalah</title>
</head>
<div class="container p-3 m-4 h-100"
    style="background-color: #FFFFFF; border-top: 5px solid #Ff4e44; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="body d-flex justify-content-between">
        <h4 style="flex: 1 1 50%">LIST MAJALAH</h4>
        <?php
        if($name=="admin"){
            echo'
            <a href="../page/addBukuPage.php"> <i style="color: blue" class="fa fa-add fa-2x"></i> </a> </h4>';
        }
        ?>
    </div>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Majalah</th>
                <th scope="col">Topik</th>
                <th scope="col">Jumlah Halaman</th>
                <th scope="col">Harga</th>
                <?php
                if($name!="admin"){
                    echo'
                    <th scope="col">Beli</th>';
                }
                if($name=="admin"){
                    echo'
                    <th scope="col">Edit</th>
                    <th scope="col">Hapus</th>';
                }
                ?>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
                @forelse ($majalah as $item) 
                <tr> 
                    <tr> 
                        <th scope="row">{{ $no }}</th> 
                        <td>{{ $item->judul }}</td> 
                        <td>{{ $item->topik }}</td> 
                        <td>{{ $item->jumlah_halaman }}</td> 
                        <td>{{ $item->harga }}</td>
                        <td>
                            <?php
                            if($name!="admin"){
                                echo' 
                                <a href="../process/pembelianMajalahProcess.php?id=' . $item['id'] . '"> <i style="color: blue" class="fa-solid fa-cart-shopping fa-2x"></i>  
                                </td>';
                            }
                        
                        
                        if($name=="admin"){
                            echo'
                            <a href="../page/editMajalahPage.php?id=' . $item['id'] . '"> <i style="color: red" class="fa fa-pencil fa-2x"></i> 
                            <td> 
                            <a href="../process/deleteMajalahProcess.php?id=' . $item['id'] . '"> <i style="color: red" class="fa fa-trash fa-2x"></i> 
                            </td>';
                        }
                            ?>
                </tr>
                <?php
                $no++;
                ?>
                @empty
                <tr> 
                    <td colspan="7"> Tidak ada majalah </td> 
                </tr>
                @endforelse    
        </tbody>
    </table>
</div>
</aside>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>
