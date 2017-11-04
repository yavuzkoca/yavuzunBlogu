<?php

$Routes = array(
/*
    # Ana sayfa
    array('/home', 'home'),

    # RSS
    array('/rss/haberler', 'rss', array('type' => 'post', 'is_article' => 0)),
    array('/rss/koseyazilari', 'rss', array('type' => 'post', 'is_article' => 1)),
    array('/rss/etkinlikler', 'rss', array('type' => 'event')),

    # Yönetim Paneli
    array('/panel', 'panel'),
    array('/logout', 'logout'),

    # Kurumsal
    array('/kurumsal', 'kurumsal'),
    array('/iletisim', 'iletisim'),
    array('/iletisim/gonder', 'iletisim', array('islem' => 'gonder')),

    # Haberler
    array('/haberler/([0-9]+)/?', 'haberler', array('pg' => '$1')),
    array('/haberler/([0-9]+)/([0-9]+)/?', 'haberler', array('pg' => '$1', 'term' => '$2')),
    array('/haberler', 'haberler'),
    array('/haber/([A-Za-z0-9-]+)-([0-9]+)/?', 'haber', array('id' => '$2')),
    array('/haber/([A-Za-z0-9]+)/?', 'haber', array('oldid' => '$1')),

    # Eğitimler
    array('/3dsmaxegitimi/?', 'haber', array('id' => '1776')),

    # Köşe Yazıları
    array('/koseyazilari/([0-9]+)/?', 'koseyazilari', array('pg' => '$1')),
    array('/koseyazilari/([0-9]+)/([0-9]+)/?', 'koseyazilari', array('pg' => '$1', 'term' => '$2')),
    array('/koseyazilari/([A-Za-z0-9-]+)/?', 'koseyazilari', array('user' => '$1')),
    array('/koseyazilari/([A-Za-z0-9-]+)/([0-9]+)/?', 'koseyazilari', array('user' => '$1', 'pg' => '$2')),
    array('/koseyazilari', 'koseyazilari'),
    array('/yazi/([A-Za-z0-9-]+)-([0-9]+)/?', 'yazi', array('id' => '$2')),

    # Etkinlikler
    array('/etkinlikler/([0-9]+)/?', 'etkinlikler', array('pg' => '$1')),
    array('/etkinlikler', 'etkinlikler'),
    array('/etkinlik/([A-Za-z0-9-]+)-([0-9]+)/?', 'etkinlik', array('id' => '$2')),
    array('/etkinlik/([A-Za-z0-9-]+)/?', 'etkinlik', array('oldid' => '$1')),

    # Etkinlik Ekleme
    array('/etkinlikekle', 'etkinlik_ekle'),
    array('/etkinlikekle/gonder', 'etkinlik_ekle', array('islem' => 'gonder')),

    # Üye Ekleme
    array('/uyeekle', 'uye_ekle'),

    # Üye Giriş
    array('/uyegiris', 'uye_giris'),


    # Kulüpler
    array('/kulupler/?', 'kulupler'),
    array('/kulupler/(kultur\-sanat|uzmanlik|spor)/?', 'kulupler', array('kulupturu'=>'$1')),
    array('/kulupler/(kultur\-sanat|uzmanlik|spor)/(puan|ad)/?', 'kulupler', array('kulupturu'=>'$1', 'siralama'=>'$2')),
    array('/kulupler/(puan|ad)/?', 'kulupler', array('siralama'=>'$1')),

    # Diğer sayfalar...
    array('/taskislasenlik19', 'misc/taskislasenlik19'),
    array('/bedukonlansman', 'misc/bedukonlansman'),
    array('/infografik_2013', 'misc/infografik13'),

    # Ajax Dosyaları
    array('/etkinlik_ajax', 'etkinlik_ajax'),
    array('/giris', 'giris'),
    array('/cikis', 'cikis'),
    array('/ituonay', 'itu_sifre_onay'),
    array('/ituemailonay', 'itu_email_onay'),

    array('/hesaponay', 'hesap_onay'),

    array('/ara', 'ara'),

    array('/imageupload', 'imageuploader'),

    array('/([0-9A-Za-z-]*)', 'kulup', array('permalink' => '$1')),
*/
);
