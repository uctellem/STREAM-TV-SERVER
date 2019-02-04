# STREAM-TV-SERVER
" Stream TV Server " By @UC_TELLEM [Cr@sh_C0m£T]
Serveur de Streaming simple et robuste.



Executer les commandes suivante pour installer le Serveur:
sudo -s
apt-get install curl -y
curl -sL https://raw.githubusercontent.com/upggr/IELKO-MEDIA-SERVER/master/install.sh | sudo bash -


++++ Diffusion ++++
rtmp://strmtvserver.tech/test/stream

++++ Reception ++++
Adresse hls: http://strmtvserver.tech:8080/test/stream.m3u8
Adresse rtmp: rtmp://strmtvserver.tech/test/stream
Lecteur de sur serveur: http://strmtvserver.tech/player/play.php?play=http://strmtvserver.tech:8080/test/stream.m3u8

++++ Commandes Utiles ++++

- Teste du fichier de configuration:
/usr/local/nginx/sbin/nginx -t

- Demarer Nginx en background:
/usr/local/nginx/sbin/nginx

- Demarer Nginx en foreground:
/usr/local/nginx/sbin/nginx -g 'daemon off;'

- Tester le dichier de configuration et relancer Nginx:
/usr/local/nginx/sbin/nginx -t && nginx -s reload

- Arreter Nginx:
/usr/local/nginx/sbin/nginx -s stop

- Repertoire html:
/usr/local/nginx/html

- Mise a jour du lecteur:
cd /usr/local/nginx/html/player
git pull

- Fichier de configuration nginx.conf:
nano /usr/local/nginx/conf/nginx.conf
