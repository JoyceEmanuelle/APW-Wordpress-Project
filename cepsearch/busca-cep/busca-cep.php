<?php

/*
 * Plugin name: Busca Pelo Cep
 * Description: Plugin que busca dados do endereço de uma pessoa pelo cep
 * Version: 1.0
 */ 

function busca_cep() {
    echo file_get_contents(plugins_url().'/busca-cep/FormBusca.php');
}
add_shortcode('buscaCep', 'busca_cep');
?>