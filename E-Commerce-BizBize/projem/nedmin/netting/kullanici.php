<?php 
@ob_start();
@session_start();
date_default_timezone_set('Europe/Istanbul');
include 'baglan.php';
include '../production/fonksiyon.php';




if (isset($_POST['musterikaydet'])) {

	$kullanici_mail  			=	htmlspecialchars(trim($_POST['kullanici_mail'])); 

	$kullanici_passwordone 		=	htmlspecialchars(trim($_POST['kullanici_passwordone'])); 
	$kullanici_passwordtwo 		=	htmlspecialchars(trim($_POST['kullanici_passwordtwo'])); 



	if ($kullanici_passwordone==$kullanici_passwordtwo) {



		if (strlen($kullanici_passwordone)>=6) {

			// Başlangıç

			$kullanicisor=$db->prepare("select * from kullanici where kullanici_mail=:mail");
			$kullanicisor->execute(array(
				'mail' => $kullanici_mail
			));

			//dönen satır sayısını belirtir
			$say=$kullanicisor->rowCount();



			if ($say==0) {

				//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
				$password=md5($kullanici_passwordone);

				$kullanici_yetki=1;

				//Kullanıcı kayıt işlemi yapılıyor...
				$kullanicikaydet=$db->prepare("INSERT INTO kullanici SET
					kullanici_ad 			=:kullanici_ad,
					kullanici_soyad 		=:kullanici_soyad,
					kullanici_mail 			=:kullanici_mail,
					kullanici_password 		=:kullanici_password,
					kullanici_yetki 		=:kullanici_yetki
					");
				$insert=$kullanicikaydet->execute(array(
					'kullanici_ad' 			=> htmlspecialchars($_POST['kullanici_ad']),
					'kullanici_soyad' 		=> htmlspecialchars($_POST['kullanici_soyad']),
					'kullanici_mail' 		=> $kullanici_mail,
					'kullanici_password' 	=> $password,
					'kullanici_yetki' 		=> $kullanici_yetki
				));

				if ($insert) {

					header("Location:../../login?durum=kayitok");
					exit;

				} else {


					header("Location:../../register?durum=basarisiz");
					exit;
				}

			} else {

				header("Location:../../register?durum=mukerrerkayit");
				exit;



			}




		// Bitiş



		} else {


			header("Location:../../register.php?durum=eksiksifre");
			exit;


		}



	} else {



		header("Location:../../register.php?durum=farklisifre");
		exit;
	}
	


}


if (isset($_POST['musterigiris'])) {



	require_once '../../securimage/securimage.php';

	$securimage = new Securimage();

	if ($securimage->check($_POST['captcha_code']) == false) {

		header("Location:../../login?durum=captchahata");
		exit;

	}
	
	echo $kullanici_mail 			=	htmlspecialchars($_POST['kullanici_mail']); 
	echo $kullanici_password 		=	md5(htmlspecialchars($_POST['kullanici_password'])); 



	$kullanicisor=$db->prepare("select * from kullanici where kullanici_mail=:mail and kullanici_yetki=:yetki and kullanici_password=:password and kullanici_durum=:durum");
	$kullanicisor->execute(array(
		'mail' 						=> $kullanici_mail,
		'yetki' 					=> 1,
		'password' 					=> $kullanici_password,
		'durum' 					=> 1
	));


	$say=$kullanicisor->rowCount();



	if ($say==1) {

		$kullanici_ip=$_SERVER['REMOTE_ADDR'];

		$zamanguncelle=$db->prepare("UPDATE kullanici SET


			kullanici_sonzaman 		=:kullanici_sonzaman,
			kullanici_sonip 		=:kullanici_sonip

			WHERE kullanici_mail 	='$kullanici_mail'");


		$update=$zamanguncelle->execute(array(


			'kullanici_sonzaman' 	=> date("Y-m-d H:i:s"),
			'kullanici_sonip' 		=> $kullanici_ip

		));


		$_SESSION['userkullanici_sonzaman'] 	=	strtotime(date("Y-m-d H:i:s"));
		$_SESSION['userkullanici_mail'] 		=	$kullanici_mail;


		header("Location:../../index.php?durum=girisbasarili");
		exit;
		




	} else {


		header("Location:../../login?durum=hata");
		exit;

	}


}



if (isset($_POST['musteribilgiguncelle'])) {
	



	$kullaniciguncelle=$db->prepare("UPDATE kullanici SET

		kullanici_ad 			=:kullanici_ad,
		kullanici_soyad 		=:kullanici_soyad,
		kullanici_gsm 			=:kullanici_gsm
		WHERE kullanici_id 		={$_SESSION['userkullanici_id']}");


	$update=$kullaniciguncelle->execute(array(

		'kullanici_ad' 			=> htmlspecialchars($_POST['kullanici_ad']),
		'kullanici_soyad' 		=> htmlspecialchars($_POST['kullanici_soyad']),
		'kullanici_gsm' 		=> htmlspecialchars($_POST['kullanici_gsm'])

	));

	if ($update) {
		
		Header("Location:../../hesabim?durum=ok");
		exit;

	} else {

		Header("Location:../../hesabim?durum=hata");
		exit;
	}



}


if (isset($_POST['musteriadresguncelle'])) {
	



	$kullaniciguncelle=$db->prepare("UPDATE kullanici SET

		kullanici_tip 			=:kullanici_tip,
		kullanici_tc 			=:kullanici_tc,
		kullanici_unvan 		=:kullanici_unvan,
		kullanici_vdaire 		=:kullanici_vdaire,
		kullanici_vno 			=:kullanici_vno,
		kullanici_adres  		=:kullanici_adres,
		kullanici_il 			=:kullanici_il,
		kullanici_ilce 			=:kullanici_ilce
		WHERE kullanici_id  	={$_SESSION['userkullanici_id']}");


	$update=$kullaniciguncelle->execute(array(

		'kullanici_tip' 		=> htmlspecialchars($_POST['kullanici_tip']),
		'kullanici_tc' 			=> htmlspecialchars($_POST['kullanici_tc']),
		'kullanici_unvan' 		=> htmlspecialchars($_POST['kullanici_unvan']),
		'kullanici_vdaire' 		=> htmlspecialchars($_POST['kullanici_vdaire']),
		'kullanici_vno' 		=> htmlspecialchars($_POST['kullanici_vno']),
		'kullanici_adres' 		=> htmlspecialchars($_POST['kullanici_adres']),
		'kullanici_il' 			=> htmlspecialchars($_POST['kullanici_il']),
		'kullanici_ilce' 		=> htmlspecialchars($_POST['kullanici_ilce'])

	));

	if ($update) {
		
		Header("Location:../../adres-bilgileri?durum=ok");
		exit;

	} else {

		Header("Location:../../adres-bilgileri?durum=hata");
		exit;
	}



}


if (isset($_POST['musterisifreguncelle'])) {
	

	$kullanici_eskipassword 	=	htmlspecialchars($_POST['kullanici_eskipassword']);
	$kullanici_passwordone 		=	htmlspecialchars($_POST['kullanici_passwordone']);
	$kullanici_passwordtwo 		=	htmlspecialchars($_POST['kullanici_passwordtwo']);

	$kullanici_password=md5($kullanici_eskipassword);

	$kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_password=:password");
	$kullanicisor->execute(array(
		'password' 				=>	$kullanici_password
	));

	$say=$kullanicisor->rowCount();

	if ($say==0) {
		
		Header("Location:../../sifre-guncelle?durum=eskisifrehata");
		exit;


	}



	if ($kullanici_passwordone==$kullanici_passwordtwo) {


		if (strlen($kullanici_passwordone)>=6) {


			$sifre=md5($kullanici_passwordone);


			$kullaniciguncelle=$db->prepare("UPDATE kullanici SET

				kullanici_password=:kullanici_password

				WHERE kullanici_id={$_SESSION['userkullanici_id']}");


			$update=$kullaniciguncelle->execute(array(

				'kullanici_password' => $sifre
				

			));

			if ($update) {

				Header("Location:../../sifre-guncelle?durum=ok");
				exit;

			} else {

				Header("Location:../../sifre-guncelle?durum=hata");
				exit;
			}




			


		} else {

			Header("Location:../../sifre-guncelle?durum=eksiksifre");
			exit;

		}

		




	} else {


		Header("Location:../../sifre-guncelle?durum=sifreleruyusmuyor");
		exit;


	}


}



if (isset($_POST['musterimagazabasvuru'])) {
	



	$kullaniciguncelle=$db->prepare("UPDATE kullanici SET

		kullanici_ad 			=:kullanici_ad,
		kullanici_soyad 		=:kullanici_soyad,
		kullanici_gsm 			=:kullanici_gsm,
		kullanici_banka 		=:kullanici_banka,
		kullanici_iban 			=:kullanici_iban,
		kullanici_tip 			=:kullanici_tip,
		kullanici_tc 			=:kullanici_tc,
		kullanici_unvan 		=:kullanici_unvan,
		kullanici_vdaire 		=:kullanici_vdaire,
		kullanici_vno 			=:kullanici_vno,
		kullanici_adres 		=:kullanici_adres,
		kullanici_il 			=:kullanici_il,
		kullanici_ilce 			=:kullanici_ilce,
		kullanici_magaza 		=:kullanici_magaza
		WHERE kullanici_id 		={$_SESSION['userkullanici_id']}");


	$update=$kullaniciguncelle->execute(array(

		'kullanici_ad' 			=> htmlspecialchars($_POST['kullanici_ad']),
		'kullanici_soyad' 		=> htmlspecialchars($_POST['kullanici_soyad']),
		'kullanici_gsm' 		=> htmlspecialchars($_POST['kullanici_gsm']),
		'kullanici_banka' 		=> htmlspecialchars($_POST['kullanici_banka']),
		'kullanici_iban' 		=> htmlspecialchars($_POST['kullanici_iban']),
		'kullanici_tip' 		=> htmlspecialchars($_POST['kullanici_tip']),
		'kullanici_tc' 			=> htmlspecialchars($_POST['kullanici_tc']),
		'kullanici_unvan' 		=> htmlspecialchars($_POST['kullanici_unvan']),
		'kullanici_vdaire' 		=> htmlspecialchars($_POST['kullanici_vdaire']),
		'kullanici_vno' 		=> htmlspecialchars($_POST['kullanici_vno']),
		'kullanici_adres' 		=> htmlspecialchars($_POST['kullanici_adres']),
		'kullanici_il' 			=> htmlspecialchars($_POST['kullanici_il']),
		'kullanici_ilce' 		=> htmlspecialchars($_POST['kullanici_ilce']),
		'kullanici_magaza' 		=> 1
	));

	if ($update) {
		
		Header("Location:../../magaza-basvuru");
		exit;

	} else {

		Header("Location:../../magaza-basvuru?durum=hata");
		exit;
	}



}


if (isset($_POST['sipariskaydet'])) {
	


	$kaydet=$db->prepare("INSERT INTO siparis SET

		kullanici_id 			=:id,
		kullanici_idsatici 		=:idsatici
		");

	$insert=$kaydet->execute(array(

		'id' 					=> htmlspecialchars($_SESSION['userkullanici_id']),
		'idsatici' 				=> htmlspecialchars($_POST['kullanici_idsatici'])

	));

	if ($insert) {
		
		
		$siparis_id=$db->lastInsertId();


		$sipariskaydet=$db->prepare("INSERT INTO siparis_detay SET

			siparis_id 			=:siparis_id,
			kullanici_id 		=:id,
			kullanici_idsatici 	=:idsatici,
			urun_id 			=:urun_id,
			urun_fiyat 			=:urun_fiyat
			");



		$insertkaydet=$sipariskaydet->execute(array(

			'siparis_id' 		=> $siparis_id,
			'id' 				=> htmlspecialchars($_SESSION['userkullanici_id']),
			'idsatici' 			=> htmlspecialchars($_POST['kullanici_idsatici']),
			'urun_id' 			=> htmlspecialchars($_POST['urun_id']),
			'urun_fiyat' 		=> htmlspecialchars($_POST['urun_fiyat'])

		));



		if ($insertkaydet) {
			

			Header("Location:../../siparislerim.php");
			exit;


		}





	} else {

		Header("Location:../../404.php");
		exit;

	}


}



if (@$_GET['urunonay']=="ok") {

	$siparis_id=$_GET['siparis_id'];


	$siparis_detayguncelle=$db->prepare("UPDATE siparis_detay SET
		
		siparisdetay_onay 			=:siparisdetay_onay
		
		WHERE siparisdetay_id 		={$_GET['siparisdetay_id']}");


	$update=$siparis_detayguncelle->execute(array(

		
		'siparisdetay_onay' 		=> 2
		
	));

	if ($update) {
		
		Header("Location:../../siparis-detay.php?siparis_id=$siparis_id");
		exit;

	} else {

		//Header("Location:../production/magazalar.php?durum=no");
	}



}


if (@$_GET['urunteslim']=="ok") {

	$siparis_id=$_GET['siparis_id'];

	$siparis_detayguncelle=$db->prepare("UPDATE siparis_detay SET
		
		siparisdetay_onay 			=:siparisdetay_onay
		
		WHERE siparisdetay_id 		={$_GET['siparisdetay_id']}");


	$update=$siparis_detayguncelle->execute(array(

		
		'siparisdetay_onay' 		=> 1
		
	));

	if ($update) {
		
		Header("Location:../../yeni-siparisler.php?siparis_id=$siparis_id");
		exit;

	} else {

		//Header("Location:../production/magazalar.php?durum=no");
	}



}


if (isset($_POST['puanyorumekle'])) {
	


	$kaydet=$db->prepare("INSERT INTO yorumlar SET

		yorum_puan 		=:yorum_puan,
		urun_id 		=:urun_id,
		yorum_detay 	=:yorum_detay,
		kullanici_id 	=:kullanici_id
		");

	$insert=$kaydet->execute(array(

		'yorum_puan' 	=> htmlspecialchars($_POST['yorum_puan']),
		'urun_id' 		=> htmlspecialchars($_POST['urun_id']),
		'yorum_detay' 	=> htmlspecialchars($_POST['yorum_detay']),
		'kullanici_id' 	=> $_SESSION['userkullanici_id']

	));

	$siparis_id=$_POST['siparis_id'];


	if ($insert) {

		$siparis_detayguncelle=$db->prepare("UPDATE siparis_detay SET

			siparisdetay_yorum 		=:siparisdetay_yorum

			WHERE siparis_id 		={$_POST['siparis_id']}");


		$update=$siparis_detayguncelle->execute(array(


			'siparisdetay_yorum' 	=> 1

		));


		Header("Location:../../siparis-detay?siparis_id=$siparis_id");
		exit;

	} else {

		Header("Location:../../siparis-detay?siparis_id=$siparis_id");
		exit;

	}

}



if (isset($_POST['mesajgonder'])) {

	$kullanici_gel=$_POST['kullanici_gel'];
	


	$kaydet=$db->prepare("INSERT INTO mesaj SET

		mesaj_detay 		=:mesaj_detay,
		kullanici_gel 		=:kullanici_gel,
		kullanici_gon 		=:kullanici_gon
		");

	$insert=$kaydet->execute(array(

		'mesaj_detay' 		=> $_POST['mesaj_detay'],
		'kullanici_gel'		=> htmlspecialchars($_POST['kullanici_gel']),
		'kullanici_gon' 	=> htmlspecialchars( $_SESSION['userkullanici_id'])

	));

	if ($insert) {
		
		
		Header("Location:../../mesaj-gonder?durum=ok&kullanici_gel=$kullanici_gel");
		exit;

	} else {

		Header("Location:../../mesaj-gonder?durum=no&kullanici_gel=$kullanici_gel");
		exit;


	}


}


if (isset($_POST['mesajcevapver'])) {

	$kullanici_gel=$_POST['kullanici_gel'];
	


	$kaydet=$db->prepare("INSERT INTO mesaj SET

		mesaj_detay 		=:mesaj_detay,
		kullanici_gel 		=:kullanici_gel,
		kullanici_gon 		=:kullanici_gon
		");

	$insert=$kaydet->execute(array(

		'mesaj_detay' 		=> $_POST['mesaj_detay'],
		'kullanici_gel'		=> htmlspecialchars($_POST['kullanici_gel']),
		'kullanici_gon' 	=> htmlspecialchars( $_SESSION['userkullanici_id'])

	));

	if ($insert) {
		
		
		Header("Location:../../gelen-mesajlar?durum=ok");
		exit;

	} else {

		Header("Location:../../gelen-mesajlar?durum=hata");
		exit;


	}


}


if (@$_GET['gidenmesajsil']=="ok") {

	
	
	$sil=$db->prepare("DELETE from mesaj where mesaj_id=:mesaj_id");
	$kontrol=$sil->execute(array(
		'mesaj_id' => $_GET['mesaj_id']
	));

	if ($kontrol) {

		Header("Location:../../giden-mesajlar.php?durum=ok");
		exit;

	} else {

		Header("Location:../../giden-mesajlar.php?durum=hata");
		exit;
	}

}

if (@$_GET['gelenmesajsil']=="ok") {

	
	
	$sil=$db->prepare("DELETE from mesaj where mesaj_id=:mesaj_id");
	$kontrol=$sil->execute(array(
		'mesaj_id' => $_GET['mesaj_id']
	));

	if ($kontrol) {

		Header("Location:../../gelen-mesajlar.php?durum=ok");
		exit;

	} else {

		Header("Location:../../gelen-mesajlar.php?durum=hata");
		exit;
	}

}

if (isset($_POST['blogekle'])) {

	
	if ($_FILES['blog_resim']['size']>1048576) {
		
		echo "Bu dosya boyutu çok büyük";

		Header("Location:../../blog-ekle.php?durum=hata");
		exit;

	}


	$izinli_uzantilar=array('jpg','png');

	//echo $_FILES['ayar_logo']["name"];

	$ext=strtolower(substr($_FILES['blog_resim']["name"],strpos($_FILES['blog_resim']["name"],'.')+1));


	

	if (in_array($ext, $izinli_uzantilar) === false) {
		echo "Bu uzantı kabul edilmiyor";
		Header("Location:../../blog-ekle.php?durum=uzantıhata");
		exit;
	}

	@$tmp_name = $_FILES['blog_resim']["tmp_name"];
	@$name = $_FILES['blog_resim']["name"];

	//İmage Resize İşlemleri
	include('SimpleImage.php');
	$image = new SimpleImage();
	$image->load($tmp_name);
	$image->resize(829,422);
	$image->save($tmp_name);

	$uploads_dir = '../../dimg/blogfoto';

	

	$uniq=uniqid();
	$refimgyol=substr($uploads_dir, 6)."/".$uniq.".".$ext;

	@move_uploaded_file($tmp_name, "$uploads_dir/$uniq.$ext");

	// BURDA KALDIK HİDDEN İD GÖNDER	

	$duzenle=$db->prepare("INSERT INTO blog SET
		
		kullanici_id 				=:kullanici_id,
		blog_baslik 				=:blog_baslik,
		blog_tarih					=:blog_tarih,
		blog_icerik 				=:blog_icerik,
		blog_etiket					=:blog_etiket,
		blog_resim					=:blog_resim
		");

	$update=$duzenle->execute(array(

		'kullanici_id' 				=> htmlspecialchars($_SESSION['userkullanici_id']),
		'blog_baslik' 				=> htmlspecialchars($_POST['blog_baslik']),
		'blog_tarih' 				=> htmlspecialchars($_POST['blog_tarih']),
		'blog_icerik' 				=> htmlspecialchars($_POST['blog_icerik']),
		'blog_etiket' 				=> htmlspecialchars($_POST['blog_etiket']),		
		'blog_resim' 				=> $refimgyol
	));

	

	if ($update) {


		Header("Location:../../bloglarim.php?durum=ok");
		exit;

	} else {

		Header("Location:../../blog-ekle.php?durum=hata");
		exit;
	}

}

if (isset($_POST['kullanicireklamresimguncelle'])) {

	
	if ($_FILES['kullanici_resim']['size']>1048576) {
		
		echo "Bu dosya boyutu çok büyük";

		Header("Location:../production/genel-ayar.php?durum=dosyabuyuk");
		exit;

	}


	$izinli_uzantilar=array('jpg','png');

	//echo $_FILES['ayar_logo']["name"];

	$ext=strtolower(substr($_FILES['kullanici_resim']["name"],strpos($_FILES['kullanici_resim']["name"],'.')+1));

	if (in_array($ext, $izinli_uzantilar) === false) {
		echo "Bu uzantı kabul edilmiyor";
		Header("Location:../../ayarlar?durum=formathata");

		exit;
	}


	$uploads_dir = '../../dimg';

	@$tmp_name = $_FILES['kullanici_resim']["tmp_name"];
	@$name = $_FILES['kullanici_resim']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

	
	$duzenle=$db->prepare("UPDATE kullanici SET
		kullanici_resim=:kullanici_resim
		WHERE kullanici_id=:kullanici_id");
	$update=$duzenle->execute(array(
		'kullanici_resim' 	=> $refimgyol,
		'kullanici_id'		=> htmlspecialchars($_SESSION['userkullanici_id'])
	));



	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");
		Header("Location:../../ayarlar?durum=ok");
		exit;

	} else {

		Header("Location:../../ayarlar?durum=no");
		exit;
	}

}
if(isset($_POST['sosyalmedyakaydet']))
{
	$facebook="https://www.facebook.com/".htmlspecialchars($_POST['facebook']);
	$twitter="https://www.twitter.com/".htmlspecialchars($_POST['twitter']);
	$instagram="https://www.instagram.com/".htmlspecialchars($_POST['instagram']);


	$ekle=$db->prepare("INSERT INTO sosyal_medya SET
		kullanici_id=:kullanici_id,
		facebook=:facebook,
		twitter=:twitter,
		instagram=:instagram
		");
	$cmd=$ekle->execute(array(
		'kullanici_id'=>$_SESSION['userkullanici_id'],
		'facebook'=>$facebook,
		'twitter'=>$twitter,
		'instagram'=>$instagram
		));
	if($cmd)
	{
		Header("Location:../../sosyal?durum=ok");
		exit;
	}
	else
	{
		Header("Location:../../sosyal?durum=hata");
		exit;
	}
}

?>