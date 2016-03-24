<style type="text/css">

#lang-portal h1 {
	color:white;
	text-align:center;
	padding:10px 0 0 0;
	font-size:60px;
}	

#lang-portal h3 {
	text-align:center;
	padding:10px 0 40px 0;
	font-size:20px;
}

#lang-portal h2 {
	background:#e1e1e1;
	margin-bottom:30px;
}

#lang-portal {
	width:100%;
	display:none;
}

#lang-portal .lang-banner {
	background-color:black;
	background-repeat:no-repeat;
	min-height:364px;
	width:100%;
	background-image:url('/sites/all/themes/portescap/images/language-page-globe.jpg');
	background-size:contain;
	background-position:center center;
}

#lang-portal .black {
	background:black;
}

#lang-portal #language-select {
	margin-bottom:40px;
}

#lang-portal .lang-jomp.span2 {
	border-right:1px solid #ccc;
	text-align:center;
	
}

#lang-portal .lang-jomp img {
	display:block;
	margin:0 auto;
}

#lang-portal .lang-jomp.span2 a {
	text-decoration:none;
	color:black;
}

#lang-portal .lang-jomp.span2 a .red {
	color:red;
}
#lang-portal .lang-jomp.span2:last-child {
	border-right:none;
}
</style>
<script type="text/javascript">
var portLang = 'en';
function checkCookies() {
    // check if the cookie is enabled
    if (navigator.cookieEnabled) return true;

    // set and read cookie
    document.cookie = "cookietest=1";
    var ret = document.cookie.indexOf("cookietest=") != -1;

    // delete cookie
    document.cookie = "cookietest=1; expires=Thu, 01-Jan-1970 00:00:01 GMT";
    return ret;
}

function checkLangPortalView() {
    // check if the cookie is set
    var ret = document.cookie.indexOf("langPortalView=") != -1;
    return ret;
}

function setLangPortalView() {
    // set cookie
    document.cookie = "langPortalView=true; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";
}

function checkLanguage() {
    // check if browser language is non-English
    lang = window.navigator.userLanguage || window.navigator.language;
    lang = lang.substring(0,2).toLowerCase();
	//alert(lang);
	portLang = lang;
    return(lang!="en");
}

function checkDomain() {
    // check domain name to be portescap.com or www.portescap.com
   // var pattern = /(^http:\/\/portescap.com[^.br]|http:\/\/www.portescap.com[^.br])/;
   // return(pattern.test(url));
   var theURL = document.URL;
   if(theURL == 'http://rdc.portescap.com' || theURL == 'http://www.portescap.com' || theURL == 'http://portescap.com') {
	return true;
   } else {
	return false;
   }
}

</script>

<div id="lang-portal" style="">
	<div class="black">
		<h1>Welcome to Portescap</h1>
		<h3 class="red">Your global partner for miniature motion technology</h3>
	</div>
    <div class="lang-banner">
	</div>
	<h2 class="red">Select your language</h2>
	<div class="container">
		<div class="row-fluid">
			<div class="span12">
							
				<div class="row-fluid" id="language-select">
				<div class="lang-jomp span2 en">
					<a href='http://portescap.com'>
						<div class=""><img src='/sites/all/themes/portescap/images/01-flag-english.jpg'></div>
						<h5>English</h5>
						<div class="red">portescap.com</div>
					</a>
				</div>
				<div class="lang-jomp span2 pt">
					<a href='http://portescap.com.br'>
						<div class=""><img src='/sites/all/themes/portescap/images/02-flag-portugues.jpg'></div>
						<h5>Português</h5>
						<div class="red">portescap.com.br</div>
					</a>
				</div>	
				<div class="lang-jomp span2 de">
					<a href='http://portescap.de'>
						<div class=""><img src='/sites/all/themes/portescap/images/03-flag-german.jpg'></div>
						<h5>Deutsch</h5>
						<div class="red">portescap.de</div>
					</a>
				</div>
				<div class="lang-jomp span2 cn">
					<a href='http://portescapmotor.cn'>
						<div class=""><img src='/sites/all/themes/portescap/images/04-flag-chinese.jpg'></div>
						<h5>简体中文</h5>
						<div class="red">portescapmotor.cn</div>
					</a>
				</div>
				<div class="lang-jomp span2 jp">
					<a href='http://danahermotion.co.jp'>
						<div class=""><img src='/sites/all/themes/portescap/images/05-flag-japanese.jpg'></div>
						<h5>日本の</h5>
						<div class="red">danahermotion.co.jp</div>
					</a>
				</div>
				<div class="lang-jomp span2 kr">
					<a href='http://portescap.kr'>
						<div class=""><img src='/sites/all/themes/portescap/images/06-flag-korean.jpg'></div>
						<h5>한국어</h5>
						<div class="red">portescap.kr</div>
					</a>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

function localizePortalText(lang) {
	var langPortalH1 = jQuery('#lang-portal h1');
	var langPortalH3 = jQuery('#lang-portal h3');
	var langPortalH2 = jQuery('#lang-portal h2');
	var langPortalEN = jQuery('#lang-portal .en h5');
	var langPortalDE = jQuery('#lang-portal .de h5');
	var langPortalPT = jQuery('#lang-portal .pt h5');
	var langPortalKR = jQuery('#lang-portal .kr h5');
	var langPortalJP = jQuery('#lang-portal .jp h5');
	var langPortalCN = jQuery('#lang-portal .cn h5');
	switch(lang) {
		case 'Chinese':
			langPortalH1.text('欢迎访问Portescap');
			langPortalH3.text('微型传动技术的全球合作伙伴');
			langPortalH2.text('选择语言');	
			langPortalEN.text('英文');
			langPortalDE.text('德文');
			langPortalPT.text('葡萄牙文');
			langPortalKR.text('韩文');
			langPortalJP.text('日文');
			langPortalCN.text('中文');
			break;
		case 'Korean':
			langPortalH1.text('Portescap에 오신것을 환영합니다');
			langPortalH3.text('귀사의 초소형 모션기술을 향상시키는 글로벌 파트너');
			langPortalH2.text('언어선택');	
			langPortalEN.text('영어');
			langPortalDE.text('독일어');
			langPortalPT.text('서반아어');
			langPortalKR.text('한국어');
			langPortalJP.text('일본어');
			langPortalCN.text('중국어');			
			break;		
		case 'German':
			//langPortalH1.text('');
			//langPortalH3.text('');
			//langPortalH2.text('');
			//langPortalEN.text('');
			//langPortalDE.text('');
			//langPortalPT.text('');
			//langPortalKR.text('');
			//langPortalJP.text('');
			//langPortalCN.text('');			
			break;	
		case 'Portuguese':
			langPortalH1.text('Bem vindos à Portescap');
			langPortalH3.text('Seu parceiro global para tecnologia de movimento em miniatura');
			langPortalH2.text('Selecione seu idioma');	
			langPortalEN.text('Inglês');
			langPortalDE.text('Alemão');
			langPortalPT.text('Português');
			langPortalKR.text('Coreano');
			langPortalJP.text('Japonês');
			langPortalCN.text('Chinês');			
			break;	
		case 'Japanese':
			langPortalH1.text('ようこそポルテスキャップへ');
			langPortalH3.text('ミニチュアモーションテクノロジーのグローバルパートナー');
			langPortalH2.text('言語選択');	
			langPortalEN.text('英語');
			langPortalDE.text('ドイツ語');
			langPortalPT.text('ポルトガル語');
			langPortalKR.text('韓国語');
			langPortalJP.text('日本語');
			langPortalCN.text('中国語');			
			break;			
	}
}

// check for cookies, if exist, do nothing
// if cookie enabled, check to see if on portescap.com and language not "en" then display "portal"  and set cookie
 if (checkCookies()) {
    if (!checkLangPortalView()) {
        //if (checkLanguage() && !checkDomain(document.URL)) {
		if(checkLanguage()) {
 	         setLangPortalView();
			jQuery(document).ready(function() {
				jQuery('#homepage-slideshow, #homepage-title, #content, #homepage-highlights, #references, #mobile_menu, #header, #header_upper').each(function() {
					jQuery(this).hide();
				});	
				jQuery('#lang-portal').show();		

				switch(portLang) {
					case 'zh':
						localizePortalText('Chinese');
						break;
					case 'zh-hk':
						localizePortalText('Chinese');
						break;
					case 'zh-cn':
						localizePortalText('Chinese');
						break;	
					case 'zh-sg':
						localizePortalText('Chinese');
						break;	
					case 'zh-tw':
						localizePortalText('Chinese');
						break;						
					case 'ja':
						localizePortalText('Japanese');
						break;
					case 'de':
						localizePortalText('German');
						break;
					case 'de-at':
						localizePortalText('German');
						break;
					case 'de-de':
						localizePortalText('German');
						break;		
					case 'de-li':
						localizePortalText('German');
						break;	
					case 'de-lu':
						localizePortalText('German');
						break;	
					case 'de-ch':
						localizePortalText('German');
						break;						
					case 'pt':
						localizePortalText('Portuguese');
						break;
					case 'pt-br':
						localizePortalText('Portuguese');
						break;						
					case 'ko':
						localizePortalText('Korean');
						break;
					case 'ko-kp':
						localizePortalText('Korean');
						break;
					case 'ko-kr':
						localizePortalText('Korean');
						break;						
					default:
						break;
				}
			});
         }
    }
} 
</script>