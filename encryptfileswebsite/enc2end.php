<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=David+Libre&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">

    <title>ENCRYPT</title>
    <link rel="stylesheet" href="style2.css">

</head>

<body>

    <header>
        <nav>
            <img class="imgg" src="glowtext.jpg">
            <ul>
                <li>ABOUT</li>
                <li>CONTACT</li>
            </ul>
        </nav>
        <div class="main">
            <div class="contnr">
                <div class="left">
                    <div class="hero">
                        <h1>ENCRYPTION TECHINIQUE</h1>
                        <p class="italic">ENCRYPTION: /ɪŋˈkrɪpʃ(ə)n,ɛŋˈkrɪpʃ(ə)n/</p>
                        <p class="italic">The process of converting information or data into a code, especially to
                            prevent unauthorized access.</p>
                    </div>
                </div>
                <div class="right">
                    <div class="op">
                    <?php
                $key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
                
                function encryptthis($data, $key) {
                $encryption_key = base64_decode($key);
                $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
                $encrypted = openssl_encrypt($data, 'aes-128-cbc', $encryption_key, 0, $iv);
                return base64_encode($encrypted . '::' . $iv);
                }
                
                function decryptthis($data, $key) {
                $encryption_key = base64_decode($key);
                list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2),2,null);
                return openssl_decrypt($encrypted_data, 'aes-128-cbc', $encryption_key, 0, $iv);
                }
                
                if(isset($_POST['encrypt'])){
                $filename=$_POST['foo'];
                $data=file_get_contents($_POST['foo']);
                $encrypted=encryptthis($data, $key);
                
                // $encData=file_put_contents('CRYPTEDtext.txt',$encrypted);    

                $file = fopen($filename, 'wb');
                fwrite($file, $encrypted);
                fclose($file);
               
                echo '<h2>Encryption is Complete.</h2>';

                // echo '<h2>Original Data</h2>';
                // echo '<p>'.$data.'</p>';
                // echo '<h2>Encrypted Data</h2>';
                // echo '<p>'.$encrypted.'</p>';
                }   

                else if(isset($_POST['decrypt'])){
                    $filename=$_POST['foo'];
                    $data=file_get_contents($_POST['foo']);
                    $decrypted=decryptthis($data, $key);
                   
                    // $decData=file_put_contents('CRYPTEDtext.txt',$decrypted);
                
                    $file = fopen($filename, 'wb');
                    fwrite($file, $decrypted);
                    fclose($file);
                    
                    echo '<h2>Decryption is Complete.</h2>';
                    
                    // echo '<h2>Encrypted Data</h2>';
                    // echo '<p>'.$data.'</p>';
                    // echo '<h2> Data</h2>';
                    // echo '<p>'.$decrypted.'</p>';
                }
            ?>
                    <a href="encrypt2.php"><button class="buttonn">BACK</button></a>
           
                    </div>

                </div>
                <!-- <button type="button" class="backbtn">BACK TO TOP</button> -->
            </div>
            <a href="#here">
                <div class="bottom">
                    <p class="italic">read more</p>
                    <i class="arrow"></i>
                </div>
            </a>

        </div>
    </header>
    <!-- Main Content Starts here -->
    <div class="heading" id="here">
        <h1>ENCRYPTION&#128273;</h1>
        <h2><b>
                Encryption can be defined as the conversion of data to code and symbols so that when intercepted, its
                contents cannot be understood.</b><i> Example of Encryption When a confidential email needs to be sent
                and you use a program that obscures its content.</i></h2>
        <img src="1.png" alt="">
    </div>
    <div class="area">
        <h1 style="color: white;">Terms of Encryption</h1>
        <div class="containerr">
            <div class="elementt">
                <h2>Plain Text</h2>
                <p><i> It is the data to be protected during transmission.</i></p>
            </div>
            <div class="elementt">
                <h2>Encryption Algorithm</h2>
                <p><i>It is a mathematical process that produces a ciphertext for any given plaintext and encryption
                        key. It is a cryptographic algorithm that takes plaintext and an encryption key as input and
                        produces a ciphertext.</i></p>
            </div>
            <div class="elementt">
                <h2>Ciphertext</h2>
                <p><i>It is a mathematical process that produces a ciphertext for any given plaintext and encryption
                        key. It is a cryptographic algorithm that takes plaintext and an encryption key as input and
                        produces a ciphertext.</i></p>
            </div>
            <div class="elementt">
                <h2>Decryption Algorithm</h2>
                <p><i>It is a mathematical process that produces a unique plaintext for any given ciphertext and
                        decryption key. It is a cryptographic algorithm that takes a ciphertext and a decryption key as
                        input, and outputs a plaintext. The decryption algorithm essentially reverses the encryption
                        algorithm and is thus closely related to it.</i></p>
            </div>
            <div class="elementt">
                <h2>Encryption Key</h2>
                <p><i>It is a value that is known to the sender. The sender inputs the encryption key into the
                        encryption algorithm along with the plaintext in order to compute the ciphertext.
                    </i></p>
            </div>
            <div class="elementt">
                <h2>Decryption Key</h2>
                <p><i>It is a value that is known to the receiver. The decryption key is related to the encryption key,
                        but is not always identical to it. The receiver inputs the decryption key into the decryption
                        algorithm along with the ciphertext in order to compute the plaintext.
                    </i></p>
            </div>
        </div>
    </div>

    <div class="mainimg"><img src="imggg.png" alt=""></div>

    <div class="content">
        <div class="leftpart1">
            <h2> Key Encryption:</h2>
            <p> The encryption process where the same keys are used for encrypting and decrypting the information is
                known as Symmetric Key Encryption. In a group of n people, to enable two-party communication between any
                two persons, the number of keys required for the group is n × (n – 1)/2.</p>
        </div>

        <div class="rightpart1"><img src="13.png" alt="">
        </div>
    </div>

    <div class="content">
        <div class="leftpart1">
            <img src="2.png" alt="">
        </div>

        <div class="rightpart1">
            <h2>Stream Ciphers:</h2>
            <p> the plaintext is processed one bit at a time i.e. one bit of plaintext is taken, and a series of
                operations is performed on it to generate one bit of ciphertext. Technically, stream ciphers are block
                ciphers with a block size of one bit.</p>
        </div>
    </div>

    <div class="content">
        <div class="leftpart1">
            <h2>Block Cipher:</h2>
            <p>In this scheme, the plain binary text is processed in blocks (groups) of bits at a time; i.e. a block of
                plaintext bits is selected, a series of operations is performed on this block to generate a block of
                ciphertext bits. The number of bits in a block is fixed.</p>
        </div>

        <div class="rightpart1">
            <img src="3.png" alt="">
        </div>
        <a href="#top">
            <button type="button" class="backbtn">TOP &uarr;</button>
        </a>
    </div>

    <div class="content">
        <div class="leftpart1">
            <img src="6.png" alt="">
        </div>

        <div class="rightpart1">
            <h2>Asymmetric Key Encryption:</h2>
            <p> The encryption process where different keys are used for encrypting and decrypting the information is
                known as Asymmetric Key Encryption. Though the keys are different, they are mathematically related and
                hence, retrieving the plaintext by decrypting ciphertext is feasible</p>
        </div>
    </div>
    <div class="ending">
    </div>

    <footer>
        <div class="foot">
            <h3>copyright&copy;</h3>
        </div>
    </footer>

</body>

</html>