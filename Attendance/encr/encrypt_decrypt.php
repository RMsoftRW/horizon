<?php
function encryptIt($str) {
	$ck = "sdl";
	$str = base_convert($str, 10, 36);
	$str = @mcrypt_encrypt(MCRYPT_ARCFOUR, $ck, $str, MCRYPT_MODE_STREAM);
	$encoded = str_replace('=','', base64_encode($str));
	   			return $encoded;
}
function decryptIt($str) {
	$ck = "sdl";
	$str =base64_decode($str.'==');
	 
	$str = @mcrypt_encrypt(MCRYPT_ARCFOUR, $ck, $str, MCRYPT_MODE_STREAM);
	$decoded = base_convert($str, 36, 10);
	   			return $decoded;
}
?>

<?php
$ck  = 'sdl';
$str = 'VGhpcyBpcyBhbiBlbmNvZGVkIHN0cmluZw==';
$str = 'This is an encoded string';
$str = base_convert($str, 10, 36);
$str = @mcrypt_encrypt(MCRYPT_ARCFOUR, $ck, $str, MCRYPT_MODE_STREAM);
echo($str);
echo base64_decode($str);
echo base64_encode($str);
?>


<?php
function base64url_encode( $data ){
  return rtrim( strtr( base64_encode( $data ), '+/', '-_'), '=');
}

function base64url_decode( $data ){
  return base64_decode( strtr( $data, '-_', '+/') . str_repeat('=', 3 - ( 3 + strlen( $data )) % 4 ));
}

// proof
for( $i = 0, $s = ''; $i < 24; ++$i, $s .= substr("$i", -1 )){
  $base64_encoded    = base64_encode(    $s );
  $base64url_encoded = base64url_encode( $s );
  $base64url_decoded = base64url_decode( $base64url_encoded );
  $base64_restored   = strtr( $base64url_encoded, '-_', '+/')
                     . str_repeat('=',
                         3 - ( 3 + strlen( $base64url_encoded )) % 4
                       );
}
  echo "$s<br>$base64url_decoded<br>$base64_encoded<br>$base64_restored<br>$base64url_encoded<br><br>";
echo(base64url_encode('kamana Felix').'<br>');
echo(base64url_decode(base64url_encode('kamana Felix')).'<br>');
?>

<?php
    # --- ENCRYPTION ---

    # the key should be random binary, use scrypt, bcrypt or PBKDF2 to
    # convert a string into a key
    # key is specified using hexadecimal
    $key = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
    
    # show key size use either 16, 24 or 32 byte keys for AES-128, 192
    # and 256 respectively
    $key_size =  strlen($key);
    echo "Key size: " . $key_size . "\n";
    
    $plaintext = "This string was AES-256 / CBC / ZeroBytePadding encrypted.";

    # create a random IV to use with CBC encoding
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    
    # creates a cipher text compatible with AES (Rijndael block size = 128)
    # to keep the text confidential 
    # only suitable for encoded input that never ends with value 00h
    # (because of default zero padding)
    $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,
                                 $plaintext, MCRYPT_MODE_CBC, $iv);

    # prepend the IV for it to be available for decryption
    $ciphertext = $iv . $ciphertext;
    
    # encode the resulting cipher text so it can be represented by a string
    $ciphertext_base64 = base64_encode($ciphertext);

    echo  $ciphertext_base64 . "\n";

    # === WARNING ===

    # Resulting cipher text has no integrity or authenticity added
    # and is not protected against padding oracle attacks.
    
    # --- DECRYPTION ---
    
    $ciphertext_dec = base64_decode($ciphertext_base64);
    
    # retrieves the IV, iv_size should be created using mcrypt_get_iv_size()
    $iv_dec = substr($ciphertext_dec, 0, $iv_size);
    
    # retrieves the cipher text (everything except the $iv_size in the front)
    $ciphertext_dec = substr($ciphertext_dec, $iv_size);

    # may remove 00h valued characters from end of plain text
    $plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,
                                    $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
    
    echo  $plaintext_dec . "\n";
?>