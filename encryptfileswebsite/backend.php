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
               
                echo '<h2>Check file for Encrypted Data</h2>';

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
                    
                    echo '<h2>Check file for Decrypted Data</h2>';
                    
                    // echo '<h2>Encrypted Data</h2>';
                    // echo '<p>'.$data.'</p>';
                    // echo '<h2> Data</h2>';
                    // echo '<p>'.$decrypted.'</p>';
                }
            ?>