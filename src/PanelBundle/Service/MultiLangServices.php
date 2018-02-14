<?php

/**
 * Created by PhpStorm.
 * User: uveys
 * Date: 24.01.2018
 * Time: 11:13
 */
namespace PanelBundle\Service;
use Symfony\Component\EventDispatcher\Tests\Service;
use Symfony\Component\Form\Exception\BadMethodCallException;
use Symfony\Component\HttpFoundation\Session\Session;

class MultiLangServices
{

    public function lang($mod){
        if ($mod != null)
        {
           switch ($mod){
               case 'ModUser':
                   return $this->$mod();
                   break;
               default:
                   return 'method_not_found';
           }
        }else
        {
            return 'method_name_null';
        }
    }

    private function ModUser(){
        /*** ModUser **/
        $lang['ModUser']['tr']=array(

            ///** Insert And Edit Panel Translate Item */
            'username'               =>'Kullanıcı Adı',
            'password'               =>'Şifre',
            'email'                  =>'E-posta',
            'nameSurname'                   =>'Adı Soyadi',
            'birthday'               =>'Doğum Tarihi',
            'job'                    =>'Meslek',
            'mobile_no'              =>'Cep No',
            'city'                   =>'Şehir',
            'address'                =>'Adres',
            'now_password'           =>'Şimdiki Şifreniz',
            'new_password'           =>'Yeni Şifreniz',
            'new_password_repeat'    =>'Yeni Şifre Tekrar',
            'member_group'           =>'Uye Grubu',
            ///** Insert And Edit Panel Translate Item */


            ///** Member Login Pane Translate Item */
            'member_login'           =>'Üye Girişi',
            'member_panel'           =>'Üye Paneli',
            'success.login'          =>'Giriş Başarılı <br/> Lütfen Bekleyin Yönlendiriliyorsunuz..',
            'error.username'         =>'Kullanici Adi Hatali',
            'error.password'         =>'Sifre Hatali',
            'error.xss'              =>'Oturum Hatali',
            'error.login'            =>'Hatali Giris',
            ///** Member Login Pane Translate Item */


            'not_roll'               =>'Bu İşlemi Yapmaya Yetkiniz Yok',
            'please_login'           =>'Lütfen Giriş yapın.',
            'login'                  =>'Giriş',
            'logout'                 =>'Çıkış',
            'change_password'        =>'Şifre Değişikliği',
            'change'                 =>'Değiştir',

            'success_change_password'=>'Şifreniz Başarıyla Değiştirildi!',
            'website'                =>'Website Adresi',
            'info_change'            =>'Bilgi Değişikliği',

            'your_eposta'       =>'E-Posta Adresiniz',
            'info_change_update'=>'Bilgileriniz Başarıyla Güncellendi!',
            'profile_image'     =>'Profil Resmi',
            'remember_password' =>'Şifremi Unuttum',
            'account_activation'=>'Hesap Aktifleştirme',
            'register'          =>'Kayıt Ol',
            'corner_name'       =>'Köşe Adı',
            'about_me'          =>'Hakkımda',
            'max_characher'     =>'En Fazla 255 Karekter Olabilir.',
            'sum_message'       =>'Toplam %s Adet Okunmamış Mesajınız Bulunmakta.',
            'admin'             => array(
                '1'=>'Üye Ekleme Alanı',
                '2'=>'Üyeyi Ekle',
                '3'=>'Üye Eklendi!',
                '4'=>'Yeni Üye Ekle',
                '5'=>'Üye Listesi',
                '6'=>'Üye Düzenleme Alanı',
                '7'=>'Üyeyi Düzenle',
                '8'=>'Üye Başarıyla Düzenlendi',
                '9'=>'Üye Grup Roll Kontrol ( ACL )',
                '10'=>'Roller',
                '11'=>'Yetkileri Yenile',
                '12'=>'Üye Yetkileri Başarıyla Güncellendi',
                '13'=>'Üye Grubu',
                '14'=>'Üyelik Yönetimi',
                '15'=>'Üyelik Ayarları',
                '16'=>'Üyelik Ayarlarını Güncelle',
                '17'=>'Üyelik Ayarları Güncellendi!',
                '18'=>'Evet',
                '19'=>'Hayır',
                '20'=>'Sil',
                '21'=>'Profil Resminizi Kaldırmak İstediğinize Eminmisiniz?',
                '22'=>'Bilgileriniz Başarıyla Güncellendi!<br>
						Fakat Profil Resminizi Değiştiremedik!',
                '23'=>'Profil Resminiz Kaldırıldı',
                'ayar' => array(
                    '1'=>'Açık',
                    '2'=>'Kapalı',
                    '3'=>'Yeni Üye Grubu',
                    '4'=>'Üyelik Açıkmı',
                    '5'=>'Üyelik Aktivasyonu',
                    '6'=>'Otomatik Onaylı',
                    '7'=>'E-Posta Onaylı',
                    '8'=>'Admin Onaylı',
                    '9'=>'Bir Hesapla Aynı Anda İki Kişi Sisteme Bağlanabilsinmi ?',
                    '10'=>'Evet',
                    '11'=>'Hayır'


                ),
                'aktif' => array(
                    '1'=>'Merhabalar Sayın <b>%s %s</b>.',
                    '2'=>'%s Adresinde Bulunan Hesabınızın Yönetici Tarafından Aktifleştirildi<br/>
Dilerseniz Artık Kullanıcı Adı Ve Şifrenizle Giriş Yapabilirsiniz.'


                )
            ),
            // Flexi Grid İçin Gerekli
            'grid'  => array(
                '1' =>'Toplam {total} Sonuçtan {from} den {to}\\\'a Kadar Olanlar Görüntüleniyor.',
                '2' =>'Sayfa',
                '3' =>'Sayfa Sayısı',
                '4' =>'Veriler Yükleniyor, Lütfen Bekleyin ...',
                '5' =>'Hiçbir Veri Bulunamadı',
                '6' =>'Bağlantı Hatası',
                '7' =>'Arama',
                '8' =>'Kullanıcı Adı',
                '9' =>'E-Posta',
                '10'=>'Ekle',
                '11'=>'Düzenle',
                '12'=>'Yenile',
                '13'=>'Sil',
                '14'=>'Üye Listesi',
                '15'=>'Düzenleme yapmak için lütfen bir satır seçin',
                '16'=>'Lütfen Silmek İçin En Az Bir Satır Seçin!',
                '17'=>"Toplam <font color=red>' + $('.trSelected',grid).length + '</font> Üye Silinecek. <br/>Bu İşlemi Yapmak İstediğinize Emin misiniz?</br> Unutmayınki Bu Üyelerin Ekledikleri İçerikler Kategoriler vs.. Herşey Silinecek!",
                '18'=>'Üye Listesi Yenilendi',
                '19'=>'Üye Silindi',
                '20'=>'Evet',
                '21'=>'Vazgeç',
                '22'=>'Üye Grubu',
                '23'=>'Aktifleştir',
                '24'=>'Pasiflestir',
                '25'=>'Lütfen Aktifleştirmek İstediğiniz Hesabı Seçin',
                '26'=>'Seçili Hesapları Aktifleştirmek İstediğinize Eminmisiniz?',
                '27'=>'Hesaplar Aktifleştirildi!',
                '28'=>'Lütfen Pasiflestirmek İstediğiniz Hesabı Seçin',
                '29'=>'Seçili Hesapları Pasiflestirmek İstediğinize Eminmisiniz?',
                '30'=>'Hesaplar Aktifleştirildi!',
                '31'=>'<font color="green">Aktif</font>',
                '32'=>'<font color="red">E-Posta Aktivasyonu Bekleniyor</font>',
                '33'=>'<font color="red">Yönetici Aktivasyonu Bekleniyor.</font>',
                '34'=>'Durumu',
                '35'=>'Adi Soyadi',
            ),
            // Hatalar
            'hata' => array(
                '1'=>'Lütfen Bir Kullanıcı Adı Belirtin',
                '2'=>'Lütfen Bir Şifre Belirtin',
                '3'=>'Lütfen Bir E-Posta Belirtin',
                '4'=>'Lütfen Geçerli Bir Mail Adresi Belirtin',
                '5'=>'Belirtmiş Olduğunuz Kullanıcı Adı Sistemde Kayıtlı',
                '6'=>'Belirtmiş Olduğunuz E-Mail Sistemde Kayıtlı',
                '7'=>'Kullanıcı Adınız a-z A-Z 0-9 Karekterlerinden Oluşabilir',
                '8'=>'Kullanıcı Adınız En Az 3 En Fazla 12 Karekterden Oluşabilir',
                '9'=>'Şifreniz En Az 6 En Fazla 16 Karekterden Oluşabilir',
                '10'=>'Yazdığınız Kullanıcı Adı Bulunamadı',
                '11'=>'Kullanıcı Adı veya Şifre Yanlış.',
                '12'=>'Yetki Hatası',
                '13'=>'Lütfen Şimdi Kullandığınız Şifrenizi Yazın',
                '14'=>'Lütfen Yeni Şifrenizi Yazın',
                '15'=>'Lütfen Yeni Şifrenizi Tekrarlayın',
                '16'=>'Yeni Şifreniz İle Yeni Şifrenizin Tekrarı Aynı Olmalıdır.',
                '17'=>'Belirtmiş Olduğunuz Şifre Yanlış',
                '18'=>'Lütfen Adınızı Belirtin',
                '19'=>'Lütfen Soyadınızı Belirtin',
                '20'=>'Lütfen Doğum Tarihinizi Belirtin',
                '21'=>'Adınız En Az 2 En Fazla 50 Karekter Olabilir',
                '22'=>'Soyadınız En Az 2 En Fazla 50 Karekter Olabilir',
                '23'=>'Adınız [^a-zA-ZığüşöçİĞÜŞÖÇîêûÎÊÛ ] Karekterlerinden Oluşabilir',
                '24'=>'Soyadınız [^a-zA-ZığüşöçİĞÜŞÖÇîêûÎÊÛ ] Karekterlerinden Oluşabilir',
                '25'=>'Lütfen Geçerli Bir Tarih Girin.Tarih Formatı YYYY-MM-DD Şeklinde Olmalıdır.',
                '26'=>'Lütfen Geçerli Bir E-Posta Adresi Yazın.',
                '27'=>'Yazdığınız Cep Telefonu Numarası Geçersiz.',
                '28'=>'Hesabınız Bulunuyor Fakat Aktif Değil.<br/> Lütfen Üyeliğinizi 
						<a href="aktivasyon/" style="color:#000">Aktifleştirin</a>.',
                '29'=>'Bu Hesap İçin İp Koruması Tanımlanmış ve İp adresiniz Uyuşmuyor',
                '30'=>'Bu Hesap Şu Anda Sisteme Bağlı Görünüyor,Hesabınızı Başka Bir Bilgisayarda Açık Unutmuş Olabilirsiniz!',
                '31'=>'Üye Bulunamadı!',
                '32'=>'Sistem Hatası',
                '33'=>'Lütfen Gerekli Alanları Doldurunuz'
            ),
            'kayit' => array(
                '1'=>'Geçici Bir Süre İçin Üye Alımı Durdurulmuştur.<br/>
		Anlayışınız İçin Teşekkür Ederiz.',
                '2'=>'Üye Kayıt Formu',
                '3'=>'Adınız',
                '4'=>'Soyadınız',
                '5'=>'Kullanıcı Adınız',
                '6'=>'E-Posta',
                '7'=>'Şifreniz',
                '8'=>'Şifre Tekrar',
                '9'=>'Cep No',
                '10'=>'Güvenlik Kodu',
                '11'=>'Kayıt Ol',
                '12'=>'Lütfen Kayıt İşleminizi Tamamlayabilmemiz İçin Aşağıdaki Bilgileri Eksiksiz Doldurun',
                '13'=>'Üyeliğiniz Başarıyla Tamamlandı Hesabınıza Şimdi Giriş Yapabilirsiniz.',
                '14'=>'Üyeliğiniz Başarıyla Tamamlandı Fakat Hesabınız Aktif Değil.
	<br/> Hesabınızı Aktifleştirebilmemiz İçin Size Gönderdiğimiz E-Posta Yardımı İle Hesabınızı Aktifleştirin',
                '15'=>'Üyelik Aktivasyonu',
                '16'=>'Şifre Sıfırlama İsteği',
                '17'=>'Yeni Şifreniz',
                '18'=>'Üyelik Kaydı',
                '19'=>'Hesabınız Oluşturuldu Fakat Hesabınız Aktif Değil.Hesabınızın Yönetici Tarafından Aktifleştirilmesi Gerekmektedir.<br>
	Yönetici Hesabınızı Onayladıktan Sonra Size Bilgilendirme Postası Gönderilecektir.',
                'hata' => array(
            '1'=>'Lütfen Adınızı Belirtin',
            '2'=>'Lütfen Soyadınızı Belirtin',
            '3'=>'Lütfen Kullanıcı Adınızı Belirtin',
            '4'=>'Lütfen E-Posta Adresinizi Belirtin',
            '5'=>'Lütfen Cep Telefon Numaranızı Belirtin',
            '6'=>'Adınızda Geçersiz Karekterler Bulunmakta',
            '7'=>'Soyadınızda Geçersiz Karekterler Bulunmakta',
            '8'=>'Kullanıcı Adınız En Az 2 En Fazla 12 Karekterden Oluşabilir',
            '9'=>'Kullanıcı Adınız a-z A-Z 0-9 Karekterlerinden Oluşabilir',
            '10'=>'Şifreniz En Az 6 En Fazla 16 Karekterden Oluşabilir',
            '11'=>'Lütfen Geçerli Bir E-Posta Adresi Belirtin',
            '12'=>'Lütfen Geçerli Bir Cep Telefon Numarası Belirtin.',
            '13'=>'Belirtmiş Olduğunuz Kullanıcı Adı Sistemde Kayıtlı',
            '14'=>'Belirtmiş Olduğunuz E-Posta Adresi Sistemde Kayıtlı',
            '15'=>'Güvenlik Kodunu Hatalı Girdiniz, Lütfen Kontrol Ederek Tekrar Deneyiniz.',
            '16'=>'Aktivasyon E-Maili Gönderilirken Hata Oluştu.<br/>
	 Lütfen Sistem Yöneticisi İle İrtibata Geçin. '
        )
            ),
            'aktivasyon' => array(
                '1'=>'Hesap Aktivasyonu',
                '2'=>'Lütfen Aşağıdaki Alana Aktivasyon Kodunuzu Yazınız.',
                '3'=>'Aktivasyon Kodu',
                '4'=>'Güvenlik Kodu',
                '5'=>'Aktifleştir',
                '6'=>'Eğer Aktifleştme Kodunuzu Kaybettiyseniz
	<a href="re_aktivasyon" style="color:#000">Buradan</a> Tekrar Aktivasyon Kodu Talep Edebilirsiniz.',
                '7'=>'Hesabınız Başarıyla Aktifleştirildi Dilerseniz  
	<a href="ModUser/giris" style="color:#000">Buradan</a> Hesabınıza Giriş Yapabilirsiniz.',
                '8'=>'Üyelik Aktivasyonu',
                'hata' => array(
                    '1'=>'Güvenlik Kodunu Hatalı Girdiniz, Lütfen Aktivasyon Kodunuzu 
		Kontrol Ederek Tekrar Deneyiniz.',
                    '2'=>'Lütfen Aktivasyon Kodunuzu Yazın.',
                    '3'=>'Belirttiğiniz Aktivasyon Kodu Geçersiz,
		Lütfen Kontrol Ederek Tekrar Deneyiniz.'
                )
            ),
            're_aktivasyon' => array(
            '1'=>'Aktivasyon Kodunuz Gönderildi Lütfen E-Posta\'nızı Kontrol Ederek Hesabınızı Aktifleştirin',
            '2'=>'Size Aktivasyon Kodu Göndere Bilmemiz İçin.<br/> Aşağıdaki Alana Hesabınızın Bağlı Olduğu E-Posta Adresini Yazın.',
            '3'=>'Aktivasyon Kodu',
            '4'=>'E-Posta',
            '5'=>'Güvelik Kodu',
            '6'=>'Gönder',
            '7'=>'Aktivasyon Kodu',
            'hata' => array(
            '1'=>'Aktivasyon Kodu Gönderilirken Hata Oluştu Lütfen Sistem Yöneticisi İle İrtibata Geçin.',
            '2'=>'Güvenlik Kodunu Hatalı Girdiniz, Lütfen Kontrol Ederek Tekrar Deneyiniz.',
            '3'=>'Lütfen Hesabınızın Bağlı Olduğu E-Posta Adresini Yazın',
            '4'=>'Geçersiz Bir E-Posta Adresi Yazdınız.',
            '5'=>'Belirtmiş Olduğunuz E-Posta Adresi Herhangi Bir Hesaba Kayıtlı Değil.',
            '6'=>'Yazmış Olduğunuz E-Posta Adresine Bağlı Hesap Zaten Aktif Durumda!',
            '7'=>'Yazmış Olduğunuz E-Posta Adresine Bağlı Hesap Sadece Yönetici Tarafından Aktifleştirilebilinir.',
            '8'=>'Yazmış Olduğunuz E-Posta Adresine Ait Aktivasyon Kodu Bulunmuyor!'
        )
        ),
            'sifremiunuttum' => array(
            '1'=>'Şifrenizi Sıfırlayabilmeniz İçin Size Bir E-Posta Gönderdik.<br/>Lütfen E-Posta\'nızı Kontrol Ederek E-Posta\'da  Belirtilen Adımları İzleyin.',
            '2'=>'Şifrenizi Sıfırlayabilmemiz İçin.<br/> Aşağıdaki Alana Hesabınızın Bağlı Olduğu E-Posta Adresini Yazın.',
            '3'=>'Şifre Sıfırlama',
            '4'=>'E-Posta',
            '5'=>'Güvelik Kodu',
            '6'=>'Gönder',
            '7'=>'Şifremi Unuttum',
            'hata' =>array(
            '1'=>'Şifre Sıfırlama Kodu Gönderilirken Hata Oluştu Lütfen Sistem Yöneticisi İle İrtibata Geçin.',
            '2'=>'Güvenlik Kodunu Hatalı Girdiniz, Lütfen Kontrol Ederek Tekrar Deneyiniz.',
            '3'=>'Lütfen Hesabınızın Bağlı Olduğu E-Posta Adresini Yazın',
            '4'=>'Geçersiz Bir E-Posta Adresi Yazdınız.',
            '5'=>'Belirtmiş Olduğunuz E-Posta Adresi Herhangi Bir Hesaba Kayıtlı Değil.'
        )
        ),
            'saktivasyon' => array(
            '1'=>'Şifre Sıfırlama',
            '2'=>'Yeni Şifrenizi Üretebilmemiz İçin,Lütfen Aşağıdaki Alana Şifre Sıfırlama Aktivasyon Kodunuzu Yazınız.',
            '3'=>'Aktivasyon Kodu',
            '4'=>'Güvenlik Kodu',
            '5'=>'Gönder',
            '6'=>'Tebrikler,Yeni Şifreniz E-Posta Adresinize Gönderildi.<br/>Lütfen E-Posta Adresinizi Kontrol Ediniz.',
            'hata' => array(
            '1'=>'Güvenlik Kodunu Hatalı Girdiniz,Lütfen Kontrol Ederek Tekrar Deneyiniz.',
            '2'=>'Lütfen Aktivasyon Kodunu Yazın.',
            '3'=>'Belirttiğiniz Aktivasyon Kodu Geçersiz,
		Lütfen Kontrol Ederek Tekrar Deneyiniz.',
            '4'=>'E-Posta Gönderilirken Hata Oluştur Lütfen Sistem Yöneticisi İle İrtibata Geçin!'
        )
        ),
            'roll' => array(
                'ad'=>'Üyelik Rolleri',
                'ekle'=>'Üye Ekleyebilir',
                'duzenle'=>'Üyeleri Düzenleyebilir',
                'sil'=>'Üyeleri Silebilir',
                'listele'=>'Üye Yönetimini Görüntüleyebilir',
                'acl'=>'Üye Yetkilerini Düzenleyebilir',
                'ayar'=>'Üyelik Ayarlarını Değiştirebilir',
                'link'=>'Yönetici Linkleri Görüntüleyebilir'
            ),
            'rhata' =>array(
                'ekle'=>'Üye Eklemeye Yetkiniz Yok',
                'sil'=>'Üye Silmeye Yetkiniz Yok',
                'duzenle'=>'Üye Düzenleme Yetkiniz Yok',
                'listele'=>'Üye Yönetimini Görüntülemeye Yetkiniz Yok',
                'acl'=>'Üye Yetkilerini Düzenlemeye Yetkiniz Yok',
                'ayar'=>'Üyelik Ayarlarını Yönetmeye Yetkiniz Yok',
                'link'=>'Yönetici Linklerini Görüntülemeye Yetkiniz Yok'
            ),
            'genel' => $this->otherLang()
        );
        $lang['ModUser']['en']=array(

            ///** Insert And Edit Panel Translate Item */
            'username'               =>'Kullanıcıs Adı',
            'password'               =>'Şifre',
            'email'                  =>'E-posta',
            'name'                   =>'Adınız',
            'lastname'               =>'Soyadınız',
            'birthday'               =>'Doğum Tarihi',
            'job'                    =>'Meslek',
            'mobile_no'              =>'Cep No',
            'city'                   =>'Şehir',
            'address'                =>'Adres',
            'now_password'           =>'Şimdiki Şifreniz',
            'new_password'           =>'Yeni Şifreniz',
            'new_password_repeat'    =>'Yeni Şifre Tekrar',
            'member_group'           =>'Uye Grubu',
            ///** Insert And Edit Panel Translate Item */


            ///** Member Login Pane Translate Item */
            'member_login'           =>'Üye Girişi',
            'member_panel'           =>'Üye Paneli',
            'success.login'          =>'Giriş Başarılı <br/> Lütfen Bekleyin Yönlendiriliyorsunuz..',
            'error.username'         =>'Kullanici Adi Hatali',
            'error.password'         =>'Sifre Hatali',
            'error.xss'              =>'Oturum Hatali',
            'error.login'            =>'Hatali Giris',
            ///** Member Login Pane Translate Item */


            'not_roll'               =>'Bu İşlemi Yapmaya Yetkiniz Yok',
            'please_login'           =>'Lütfen Giriş yapın.',
            'login'                  =>'Giriş',
            'logout'                 =>'Çıkış',
            'change_password'        =>'Şifre Değişikliği',
            'change'                 =>'Değiştir',

            'success_change_password'=>'Şifreniz Başarıyla Değiştirildi!',
            'website'                =>'Website Adresi',
            'info_change'            =>'Bilgi Değişikliği',

            'your_eposta'       =>'E-Posta Adresiniz',
            'info_change_update'=>'Bilgileriniz Başarıyla Güncellendi!',
            'profile_image'     =>'Profil Resmi',
            'remember_password' =>'Şifremi Unuttum',
            'account_activation'=>'Hesap Aktifleştirme',
            'register'          =>'Kayıt Ol',
            'corner_name'       =>'Köşe Adı',
            'about_me'          =>'Hakkımda',
            'max_characher'     =>'En Fazla 255 Karekter Olabilir.',
            'sum_message'       =>'Toplam %s Adet Okunmamış Mesajınız Bulunmakta.',
            'admin'             => array(
                '1'=>'Üye Ekleme Alanı',
                '2'=>'Üyeyi Ekle',
                '3'=>'Üye Eklendi!',
                '4'=>'Yeni Üye Ekle',
                '5'=>'Üye Listesi',
                '6'=>'Üye Düzenleme Alanı',
                '7'=>'Üyeyi Düzenle',
                '8'=>'Üye Başarıyla Düzenlendi',
                '9'=>'Üye Grup Roll Kontrol ( ACL )',
                '10'=>'Roller',
                '11'=>'Yetkileri Yenile',
                '12'=>'Üye Yetkileri Başarıyla Güncellendi',
                '13'=>'Üye Grubu',
                '14'=>'Üyelik Yönetimi',
                '15'=>'Üyelik Ayarları',
                '16'=>'Üyelik Ayarlarını Güncelle',
                '17'=>'Üyelik Ayarları Güncellendi!',
                '18'=>'Evet',
                '19'=>'Hayır',
                '20'=>'Sil',
                '21'=>'Profil Resminizi Kaldırmak İstediğinize Eminmisiniz?',
                '22'=>'Bilgileriniz Başarıyla Güncellendi!<br>
						Fakat Profil Resminizi Değiştiremedik!',
                '23'=>'Profil Resminiz Kaldırıldı',
                'ayar' => array(
                    '1'=>'Açık',
                    '2'=>'Kapalı',
                    '3'=>'Yeni Üye Grubu',
                    '4'=>'Üyelik Açıkmı',
                    '5'=>'Üyelik Aktivasyonu',
                    '6'=>'Otomatik Onaylı',
                    '7'=>'E-Posta Onaylı',
                    '8'=>'Admin Onaylı',
                    '9'=>'Bir Hesapla Aynı Anda İki Kişi Sisteme Bağlanabilsinmi ?',
                    '10'=>'Evet',
                    '11'=>'Hayır'


                ),
                'aktif' => array(
                    '1'=>'Merhabalar Sayın <b>%s %s</b>.',
                    '2'=>'%s Adresinde Bulunan Hesabınızın Yönetici Tarafından Aktifleştirildi<br/>
Dilerseniz Artık Kullanıcı Adı Ve Şifrenizle Giriş Yapabilirsiniz.'


                )
            ),
            // Flexi Grid İçin Gerekli
            'grid'  => array(
                '1' =>'Toplam {total} Sonuçtan {from} den {to}\\\'a Kadar Olanlar Görüntüleniyor.',
                '2' =>'Sayfa',
                '3' =>'Sayfa Sayısı',
                '4' =>'Veriler Yükleniyor, Lütfen Bekleyin ...',
                '5' =>'Hiçbir Veri Bulunamadı',
                '6' =>'Bağlantı Hatası',
                '7' =>'Arama',
                '8' =>'Kullanıcı Adı',
                '9' =>'E-Posta',
                '10'=>'Ekle',
                '11'=>'Düzenle',
                '12'=>'Yenile',
                '13'=>'Sil',
                '14'=>'Üye Listesi',
                '15'=>'Düzenleme yapmak için lütfen bir satır seçin',
                '16'=>'Lütfen Silmek İçin En Az Bir Satır Seçin!',
                '17'=>"Toplam <font color=red>' + $('.trSelected',grid).length + '</font> Üye Silinecek. <br/>Bu İşlemi Yapmak İstediğinize Emin misiniz?</br> Unutmayınki Bu Üyelerin Ekledikleri İçerikler Kategoriler vs.. Herşey Silinecek!",
                '18'=>'Üye Listesi Yenilendi',
                '19'=>'Üye Silindi',
                '20'=>'Evet',
                '21'=>'Vazgeç',
                '22'=>'Üye Grubu',
                '23'=>'Aktifleştir',
                '24'=>'Pasiflestir',
                '25'=>'Lütfen Aktifleştirmek İstediğiniz Hesabı Seçin',
                '26'=>'Seçili Hesapları Aktifleştirmek İstediğinize Eminmisiniz?',
                '27'=>'Hesaplar Aktifleştirildi!',
                '28'=>'Lütfen Pasiflestirmek İstediğiniz Hesabı Seçin',
                '29'=>'Seçili Hesapları Pasiflestirmek İstediğinize Eminmisiniz?',
                '30'=>'Hesaplar Aktifleştirildi!',
                '31'=>'<font color="green">Aktif</font>',
                '32'=>'<font color="red">E-Posta Aktivasyonu Bekleniyor</font>',
                '33'=>'<font color="red">Yönetici Aktivasyonu Bekleniyor.</font>',
                '34'=>'Durumu',
                '35'=>'Adi Soyadi',
            ),
            // Hatalar
            'hata' => array(
                '1'=>'Lütfen Bir Kullanıcı Adı Belirtin',
                '2'=>'Lütfen Bir Şifre Belirtin',
                '3'=>'Lütfen Bir E-Posta Belirtin',
                '4'=>'Lütfen Geçerli Bir Mail Adresi Belirtin',
                '5'=>'Belirtmiş Olduğunuz Kullanıcı Adı Sistemde Kayıtlı',
                '6'=>'Belirtmiş Olduğunuz E-Mail Sistemde Kayıtlı',
                '7'=>'Kullanıcı Adınız a-z A-Z 0-9 Karekterlerinden Oluşabilir',
                '8'=>'Kullanıcı Adınız En Az 3 En Fazla 12 Karekterden Oluşabilir',
                '9'=>'Şifreniz En Az 6 En Fazla 16 Karekterden Oluşabilir',
                '10'=>'Yazdığınız Kullanıcı Adı Bulunamadı',
                '11'=>'Kullanıcı Adı veya Şifre Yanlış.',
                '12'=>'Yetki Hatası',
                '13'=>'Lütfen Şimdi Kullandığınız Şifrenizi Yazın',
                '14'=>'Lütfen Yeni Şifrenizi Yazın',
                '15'=>'Lütfen Yeni Şifrenizi Tekrarlayın',
                '16'=>'Yeni Şifreniz İle Yeni Şifrenizin Tekrarı Aynı Olmalıdır.',
                '17'=>'Belirtmiş Olduğunuz Şifre Yanlış',
                '18'=>'Lütfen Adınızı Belirtin',
                '19'=>'Lütfen Soyadınızı Belirtin',
                '20'=>'Lütfen Doğum Tarihinizi Belirtin',
                '21'=>'Adınız En Az 2 En Fazla 50 Karekter Olabilir',
                '22'=>'Soyadınız En Az 2 En Fazla 50 Karekter Olabilir',
                '23'=>'Adınız [^a-zA-ZığüşöçİĞÜŞÖÇîêûÎÊÛ ] Karekterlerinden Oluşabilir',
                '24'=>'Soyadınız [^a-zA-ZığüşöçİĞÜŞÖÇîêûÎÊÛ ] Karekterlerinden Oluşabilir',
                '25'=>'Lütfen Geçerli Bir Tarih Girin.Tarih Formatı YYYY-MM-DD Şeklinde Olmalıdır.',
                '26'=>'Lütfen Geçerli Bir E-Posta Adresi Yazın.',
                '27'=>'Yazdığınız Cep Telefonu Numarası Geçersiz.',
                '28'=>'Hesabınız Bulunuyor Fakat Aktif Değil.<br/> Lütfen Üyeliğinizi 
						<a href="aktivasyon/" style="color:#000">Aktifleştirin</a>.',
                '29'=>'Bu Hesap İçin İp Koruması Tanımlanmış ve İp adresiniz Uyuşmuyor',
                '30'=>'Bu Hesap Şu Anda Sisteme Bağlı Görünüyor,Hesabınızı Başka Bir Bilgisayarda Açık Unutmuş Olabilirsiniz!',
                '31'=>'Üye Bulunamadı!',
                '32'=>'Sistem Hatası',
                '33'=>'Lütfen Gerekli Alanları Doldurunuz'
            ),
            'kayit' => array(
                '1'=>'Geçici Bir Süre İçin Üye Alımı Durdurulmuştur.<br/>
		Anlayışınız İçin Teşekkür Ederiz.',
                '2'=>'Üye Kayıt Formu',
                '3'=>'Adınız',
                '4'=>'Soyadınız',
                '5'=>'Kullanıcı Adınız',
                '6'=>'E-Posta',
                '7'=>'Şifreniz',
                '8'=>'Şifre Tekrar',
                '9'=>'Cep No',
                '10'=>'Güvenlik Kodu',
                '11'=>'Kayıt Ol',
                '12'=>'Lütfen Kayıt İşleminizi Tamamlayabilmemiz İçin Aşağıdaki Bilgileri Eksiksiz Doldurun',
                '13'=>'Üyeliğiniz Başarıyla Tamamlandı Hesabınıza Şimdi Giriş Yapabilirsiniz.',
                '14'=>'Üyeliğiniz Başarıyla Tamamlandı Fakat Hesabınız Aktif Değil.
	<br/> Hesabınızı Aktifleştirebilmemiz İçin Size Gönderdiğimiz E-Posta Yardımı İle Hesabınızı Aktifleştirin',
                '15'=>'Üyelik Aktivasyonu',
                '16'=>'Şifre Sıfırlama İsteği',
                '17'=>'Yeni Şifreniz',
                '18'=>'Üyelik Kaydı',
                '19'=>'Hesabınız Oluşturuldu Fakat Hesabınız Aktif Değil.Hesabınızın Yönetici Tarafından Aktifleştirilmesi Gerekmektedir.<br>
	Yönetici Hesabınızı Onayladıktan Sonra Size Bilgilendirme Postası Gönderilecektir.',
                'hata' => array(
                    '1'=>'Lütfen Adınızı Belirtin',
                    '2'=>'Lütfen Soyadınızı Belirtin',
                    '3'=>'Lütfen Kullanıcı Adınızı Belirtin',
                    '4'=>'Lütfen E-Posta Adresinizi Belirtin',
                    '5'=>'Lütfen Cep Telefon Numaranızı Belirtin',
                    '6'=>'Adınızda Geçersiz Karekterler Bulunmakta',
                    '7'=>'Soyadınızda Geçersiz Karekterler Bulunmakta',
                    '8'=>'Kullanıcı Adınız En Az 2 En Fazla 12 Karekterden Oluşabilir',
                    '9'=>'Kullanıcı Adınız a-z A-Z 0-9 Karekterlerinden Oluşabilir',
                    '10'=>'Şifreniz En Az 6 En Fazla 16 Karekterden Oluşabilir',
                    '11'=>'Lütfen Geçerli Bir E-Posta Adresi Belirtin',
                    '12'=>'Lütfen Geçerli Bir Cep Telefon Numarası Belirtin.',
                    '13'=>'Belirtmiş Olduğunuz Kullanıcı Adı Sistemde Kayıtlı',
                    '14'=>'Belirtmiş Olduğunuz E-Posta Adresi Sistemde Kayıtlı',
                    '15'=>'Güvenlik Kodunu Hatalı Girdiniz, Lütfen Kontrol Ederek Tekrar Deneyiniz.',
                    '16'=>'Aktivasyon E-Maili Gönderilirken Hata Oluştu.<br/>
	 Lütfen Sistem Yöneticisi İle İrtibata Geçin. '
                )
            ),
            'aktivasyon' => array(
                '1'=>'Hesap Aktivasyonu',
                '2'=>'Lütfen Aşağıdaki Alana Aktivasyon Kodunuzu Yazınız.',
                '3'=>'Aktivasyon Kodu',
                '4'=>'Güvenlik Kodu',
                '5'=>'Aktifleştir',
                '6'=>'Eğer Aktifleştme Kodunuzu Kaybettiyseniz
	<a href="re_aktivasyon" style="color:#000">Buradan</a> Tekrar Aktivasyon Kodu Talep Edebilirsiniz.',
                '7'=>'Hesabınız Başarıyla Aktifleştirildi Dilerseniz  
	<a href="ModUser/giris" style="color:#000">Buradan</a> Hesabınıza Giriş Yapabilirsiniz.',
                '8'=>'Üyelik Aktivasyonu',
                'hata' => array(
                    '1'=>'Güvenlik Kodunu Hatalı Girdiniz, Lütfen Aktivasyon Kodunuzu 
		Kontrol Ederek Tekrar Deneyiniz.',
                    '2'=>'Lütfen Aktivasyon Kodunuzu Yazın.',
                    '3'=>'Belirttiğiniz Aktivasyon Kodu Geçersiz,
		Lütfen Kontrol Ederek Tekrar Deneyiniz.'
                )
            ),
            're_aktivasyon' => array(
                '1'=>'Aktivasyon Kodunuz Gönderildi Lütfen E-Posta\'nızı Kontrol Ederek Hesabınızı Aktifleştirin',
                '2'=>'Size Aktivasyon Kodu Göndere Bilmemiz İçin.<br/> Aşağıdaki Alana Hesabınızın Bağlı Olduğu E-Posta Adresini Yazın.',
                '3'=>'Aktivasyon Kodu',
                '4'=>'E-Posta',
                '5'=>'Güvelik Kodu',
                '6'=>'Gönder',
                '7'=>'Aktivasyon Kodu',
                'hata' => array(
                    '1'=>'Aktivasyon Kodu Gönderilirken Hata Oluştu Lütfen Sistem Yöneticisi İle İrtibata Geçin.',
                    '2'=>'Güvenlik Kodunu Hatalı Girdiniz, Lütfen Kontrol Ederek Tekrar Deneyiniz.',
                    '3'=>'Lütfen Hesabınızın Bağlı Olduğu E-Posta Adresini Yazın',
                    '4'=>'Geçersiz Bir E-Posta Adresi Yazdınız.',
                    '5'=>'Belirtmiş Olduğunuz E-Posta Adresi Herhangi Bir Hesaba Kayıtlı Değil.',
                    '6'=>'Yazmış Olduğunuz E-Posta Adresine Bağlı Hesap Zaten Aktif Durumda!',
                    '7'=>'Yazmış Olduğunuz E-Posta Adresine Bağlı Hesap Sadece Yönetici Tarafından Aktifleştirilebilinir.',
                    '8'=>'Yazmış Olduğunuz E-Posta Adresine Ait Aktivasyon Kodu Bulunmuyor!'
                )
            ),
            'sifremiunuttum' => array(
                '1'=>'Şifrenizi Sıfırlayabilmeniz İçin Size Bir E-Posta Gönderdik.<br/>Lütfen E-Posta\'nızı Kontrol Ederek E-Posta\'da  Belirtilen Adımları İzleyin.',
                '2'=>'Şifrenizi Sıfırlayabilmemiz İçin.<br/> Aşağıdaki Alana Hesabınızın Bağlı Olduğu E-Posta Adresini Yazın.',
                '3'=>'Şifre Sıfırlama',
                '4'=>'E-Posta',
                '5'=>'Güvelik Kodu',
                '6'=>'Gönder',
                '7'=>'Şifremi Unuttum',
                'hata' =>array(
                    '1'=>'Şifre Sıfırlama Kodu Gönderilirken Hata Oluştu Lütfen Sistem Yöneticisi İle İrtibata Geçin.',
                    '2'=>'Güvenlik Kodunu Hatalı Girdiniz, Lütfen Kontrol Ederek Tekrar Deneyiniz.',
                    '3'=>'Lütfen Hesabınızın Bağlı Olduğu E-Posta Adresini Yazın',
                    '4'=>'Geçersiz Bir E-Posta Adresi Yazdınız.',
                    '5'=>'Belirtmiş Olduğunuz E-Posta Adresi Herhangi Bir Hesaba Kayıtlı Değil.'
                )
            ),
            'saktivasyon' => array(
                '1'=>'Şifre Sıfırlama',
                '2'=>'Yeni Şifrenizi Üretebilmemiz İçin,Lütfen Aşağıdaki Alana Şifre Sıfırlama Aktivasyon Kodunuzu Yazınız.',
                '3'=>'Aktivasyon Kodu',
                '4'=>'Güvenlik Kodu',
                '5'=>'Gönder',
                '6'=>'Tebrikler,Yeni Şifreniz E-Posta Adresinize Gönderildi.<br/>Lütfen E-Posta Adresinizi Kontrol Ediniz.',
                'hata' => array(
                    '1'=>'Güvenlik Kodunu Hatalı Girdiniz,Lütfen Kontrol Ederek Tekrar Deneyiniz.',
                    '2'=>'Lütfen Aktivasyon Kodunu Yazın.',
                    '3'=>'Belirttiğiniz Aktivasyon Kodu Geçersiz,
		Lütfen Kontrol Ederek Tekrar Deneyiniz.',
                    '4'=>'E-Posta Gönderilirken Hata Oluştur Lütfen Sistem Yöneticisi İle İrtibata Geçin!'
                )
            ),
            'roll' => array(
                'ad'=>'Üyelik Rolleri',
                'ekle'=>'Üye Ekleyebilir',
                'duzenle'=>'Üyeleri Düzenleyebilir',
                'sil'=>'Üyeleri Silebilir',
                'listele'=>'Üye Yönetimini Görüntüleyebilir',
                'acl'=>'Üye Yetkilerini Düzenleyebilir',
                'ayar'=>'Üyelik Ayarlarını Değiştirebilir',
                'link'=>'Yönetici Linkleri Görüntüleyebilir'
            ),
            'rhata' =>array(
                'ekle'=>'Üye Eklemeye Yetkiniz Yok',
                'sil'=>'Üye Silmeye Yetkiniz Yok',
                'duzenle'=>'Üye Düzenleme Yetkiniz Yok',
                'listele'=>'Üye Yönetimini Görüntülemeye Yetkiniz Yok',
                'acl'=>'Üye Yetkilerini Düzenlemeye Yetkiniz Yok',
                'ayar'=>'Üyelik Ayarlarını Yönetmeye Yetkiniz Yok',
                'link'=>'Yönetici Linklerini Görüntülemeye Yetkiniz Yok'
            )
        );

        /*** ModUser **/
        return $lang;
    }

    private function otherLang(){
        return array(
            'tr' =>array(
            '1'=> 'Bilinmeyen Hata',
            '2' => 'Ekleme Islemi Tamamlandi'
            )
        );
    }
}
