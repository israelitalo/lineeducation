<?php

define('HOST', '127.0.0.1');
define('USUARIO', 'root');
define('SENHA', 'root');
define('DB', 'lineeducation');

/*define('HOST', 'localhost');
define('USUARIO', 'id11098679_lineeducation');
define('SENHA', 'italo201(');
define('DB', 'id11098679_lineeducation');*/

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');