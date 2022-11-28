1.  hosts file
    Open bash as adminstrator
    for mac users: /etc/hosts (sudo)
    for win users: c:\Windows\System32\Drivers\etc\hosts
    127.0.0.1 test.local

2.  mac: conf/apache/httpd.conf
    win: C:\xampp\apache\conf\httpd.conf
    Include etc/extra/httpd-vhosts.conf (remove the hash tag on this line)

3.  mac: conf/apache/extra/httpd-vhosts.conf
    win: xampp/apache/conf/extra/httpd-vhosts.conf

    for win users:
    <VirtualHost \*:80>
    ServerAdmin webmaster@htudemo.local
    ServerName htudemo.local
    DocumentRoot "/Applications/XAMPP/htdocs/htudemo"
    <Directory "/Applications/XAMPP/htdocs/htudemo">
    Options Indexes FollowSymLinks Includes ExecCGI
    AllowOverride All
    Require all granted
    </Directory>

        ErrorLog "logs/htudemo.local-error_log"
        CustomLog "logs/htudemo.local-access_log" common

     </VirtualHost>
