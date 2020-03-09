# LUPE
 
LUPE, Leved Up Ponto Eletrônico é um projeto de verificação de ponto eletrônico que mais tarde servirá como biblioteca para o meu TCC. 
  
## Primeiro projeto com PHP

Olá, este é o meu primeiro projeto realizado na linguagem PHP, endo desenvolvido junto ao curso de [PHP 7](https://www.udemy.com/course/php-7-completo/). Pretendo reaproveitar parte dos códigos para construção do meu TCC.
Obs: Acabei adicionando algumas coisas ao projeto para deixar mais completo.

### Qual o objetivo de desenvolver este projeto?
O objetivo principal é obter conhecimento da forma mais aprofundada possível da linguagem PHP em sua essência, sem ferramentas e frameworks, para assim, partir para a próxima etapa, que será com **SLIM e COMPOSER**.

## O projeto exige algumas configurações

1. Que você configure o seu DocumentRoot no apache para a pasta public do sistema (O LUPE)
      	
       DocumentRoot /SEU/DIRETORIO_DE/PASTAS_WEB/LUPE/public 
          
2. Que você habilite o uso de .htacess no seu arquivo (Linux): 
     2.1 Arquivo apache2.conf em /etc/apache2/apache2.conf 
      ```
         <Directory /var/www/>
            Options Indexes FollowSymLinks MultiViews
            AllowOverride All
            Order allow,deny
            allow from all
         </Directory>
      ```
     2.2 Digite no terminal o comando:
       
        sudo a2enmod rewrite
     
     2.3 Digite no terminal o comando 
        
        sudo service apache2 restart
  
  ou (Windows):
     
   1. http.conf:
    
           <Directory /var/www/>
              Options Indexes FollowSymLinks MultiViews
              AllowOverride All
              Order allow,deny
              allow from all
           </Directory>
