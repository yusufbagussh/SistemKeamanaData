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
                        <?php

                        if (isset($_POST['submit1'])) {
                            function Cipher($ch, $key)
                            {
                                if (!ctype_alpha($ch))
                                    return $ch;

                                $offset = ord(ctype_upper($ch) ? 'A' : 'a');
                                return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
                            }

                            function Encipher($input, $key)
                            {
                                $output = "";

                                $inputArr = str_split($input);
                                foreach ($inputArr as $ch)
                                    $output .= Cipher($ch, $key);

                                return $output;
                            }

                            function Decipher($input, $key)
                            {
                                return Encipher($input, 26 - $key);
                            }
                        } else if (isset($_POST['submit2'])) {
                            function Cipher($ch, $key)
                            {
                                if (!ctype_alpha($ch))
                                    return $ch;

                                $offset = ord(ctype_upper($ch) ? 'A' : 'a');
                                return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
                            }

                            function Encipher($input, $key)
                            {
                                $output = "";

                                $inputArr = str_split($input);
                                foreach ($inputArr as $ch)
                                    $output .= Cipher($ch, $key);

                                return $output;
                            }

                            function Decipher($input, $key)
                            {
                                return Encipher($input, 26 - $key);
                            }
                        }
                        ?>
                        <form action="" method="post" name="enkripsi">
                            <div class="form-group">
                                <label for="Kunci">Kunci</label>
                                <input title="Pilih Key." required="true" oninvalid="this.setCustomValidity('Tidak boleh kosong!')" oninput="setCustomValidity('')" type="number" class="form-control" name="metode" placeholder="Masukan Key">
                            </div>
                            <div class="form-group">
                                <label for="Plaintext">Plaintext</label>
                                <textarea name="plain" required="true" oninvalid="this.setCustomValidity('Tidak boleh kosong!')" oninput="setCustomValidity('')" type="text" class="form-control" rows="2" placeholder="Isikan teks disini"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success" name="submit1" value="Enkrip">Encrypt</button>
                            <button type="submit" class="btn btn-success" name="submit2" value="Dekrip">Decrypt</button>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="card-footer text-center text-success">
                            <strong><?php echo "Pengubahan Telah Berhasil"; ?></strong>
                        </div>
                        <div class="form-group">
                            <label for="Plaintext">Hasil</label>
                            <textarea class="form-control" name="text" id="text" rows="5"><?php if (isset($_POST['submit1'])) {
                                                                                                echo Encipher($_POST['plain'], $_POST['metode']);
                                                                                            }
                                                                                            if (isset($_POST['submit2'])) {
                                                                                                echo Decipher($_POST['plain'], $_POST['metode']);
                                                                                            } ?></textarea>

                            <label for="Plaintext">Teks Awal</label>
                            <textarea class="form-control" name="text" id="text" rows="5"><?php if (isset($_POST['submit1'])) {
                                                                                                echo Decipher(Encipher($_POST['plain'], $_POST['metode']), $_POST['metode']);
                                                                                            }
                                                                                            if (isset($_POST['submit2'])) {
                                                                                                echo Encipher(Decipher($_POST['plain'], $_POST['metode']), $_POST['metode']);
                                                                                            }; ?></textarea>

                            <label for="Plaintext">Kunci</label>
                            <text class="form-control" name="text" id="text" rows="5"><?php if (isset($_POST['submit1'])) {
                                                                                            echo $_POST['metode'];
                                                                                        }
                                                                                        if (isset($_POST['submit2'])) {
                                                                                            echo $_POST['metode'];
                                                                                        } ?></text>
                        </div>
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