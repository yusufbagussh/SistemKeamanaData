<html>

<head>
    <title>Chaesar Chiper</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <br><br><br><br><br>
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <caption>
                            <h2 style="text-align: center;"><b>Chaesar Cipher</b></h2>
                        </caption>
                    </div>
                    <div class="card-body">
                        <form action="enkcaesar.php" method="get">
                            <div class="form-group">
                                <label for="Kunci">Kunci</label>
                                <input type="text" class="form-control" name="key" id="kunci" aria-describedby="inputKunci" placeholder="Masukkan Kunci">
                            </div>
                            <div class="form-group">
                                <label for="Plaintext">Plaintext</label>
                                <textarea class="form-control" name="kata" id="kata" rows="5" placeholder="Masukkan Kalimat"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success" value="kirim">Encrypt</button>
                            <button type="reset" class="btn btn-danger" value="ulangi">Reset</button>
                        </form>
                    </div>
                    <div class="card-body">
                        <form action="dekcaesar.php" method="get">
                            <div class="form-group">
                                <label for="Kunci">Kunci</label>
                                <input type="text" class="form-control" name="key" id="kunci" aria-describedby="inputKunci" placeholder="Masukkan Kunci">
                            </div>
                            <button type="submit" class="btn btn-success" value="dekripsi">Decrypt</button>
                            <button type="reset" class="btn btn-danger" value="ulangi">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>