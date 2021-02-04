<?php
    class Password {
        const SALT = 'EstoEsUnSalt';
        public static function hash($password) {
            return hash('sha512', self::SALT . $password);
        }
        public static function verify($password, $hash) {
            return ($hash == self::hash($password));
        }
    }
    // Crear la contraseña:
    $hash = Password::hash('micontraseña'); // esto lo hemos visto en clase
    // Comprobar la contraseña introducida
    if (Password::verify('micontraseña', $hash)) {
        echo 'Contraseña correcta!\n';
    } else {
        echo "Contraseña incorrecta!\n";
    }



    // mas cosas 
    echo $hash = password_hash('micontraseña', PASSWORD_DEFAULT, [15]);

    if (password_verify('micontraseña', $hash))
    echo "correcto";
    else echo 'incorrecto';
?>


