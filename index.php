<?php

// URL solicitada em requisição GET
$url = 'https://minhaconta.levelupgames.com.br/web/login';

// Inicia o CURL
$curl = curl_init();

// Define a URL do Formulário de Login
curl_setopt($curl, CURLOPT_URL, $url);

// Controlam a rigorosidade na verificação da identidade
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

// Rastreia o cookie e grava para utilização na sessão
curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($curl, CURLOPT_COOKIEFILE, "cookie.txt");

// Retorna o resultado em vez de imprimir
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Segue a requisição caso haja redirecionamento
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

// Deifne o User Agente no Cabeçalho da requisição
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.10 (KHTML, like Gecko) Chrome/8.0.552.224 Safari/534.10');

// Executa o CURL
$page = curl_exec($curl); 

// Encerra a requisição
curl_close($curl);

// Grava o retorno na página page.html - Ideal para verificar se o retorno foi o esperado 
file_put_contents('page.html', $page);

// Cria um DomDocument para leitura em html 
//$dom=new DOMDocument;
//@$dom->loadHTML($page);
//$xpath = new DOMXPath($dom);

// Inicia um novo CURL
$curl = curl_init();

// Parâmetros utilizados para o POST
$fields = [
    'Username' => 'test',
    'Password' => '***',
];

// Controlam a rigorosidade na verificação da identidade
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.10 (KHTML, like Gecko) Chrome/8.0.552.224 Safari/534.10');
curl_setopt($curl, CURLOPT_URL, 'https://minhaconta.levelupgames.com.br/web/login-auth');

// Define que o método da solcitação POST está ativo
curl_setopt($curl, CURLOPT_POST, true);

// Monta o POST com os parâmetros adicionados
curl_setopt($curl, CURLOPT_POSTFIELDS, $fields);

// Rastreia o cookie e grava para utilização na sessão
curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');

// Executa o CURL
$page = curl_exec($curl); 

// Encerra a requisição
curl_close($curl);

// Grava o retorno na página page2.html - Ideal para verificar se o retorno foi o esperado 
file_put_contents('page2.html', $page);

?>