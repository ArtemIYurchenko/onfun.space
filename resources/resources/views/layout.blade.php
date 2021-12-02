<!DOCTYPE HTML>
<html lang="{{app()->getLocale()}}">

<head>

    <title>Winkel </title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
    <meta name="descriptor" content="">
    <link rel="icon" href="/logo/winkel_logo.jpg" type="image/x-icon">
	<link href="/css/footer.css?<?=time()?>" rel="stylesheet"> 
	
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(85825544, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/85825544" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</head>

<body class="back_body">
		
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="/" style="margin-right: 50px;margin-left: 30px;">Winkel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Главная 
			</a>
          </li>
        </ul>
		@yield('btn')
        	
      </div>
  </nav>
 
  
  @yield('content')
</body>
   
  <footer class="footer_div">
   
      
      <p class="text-muted" style="margin-left:30px; float:left; line-height: 60px;">© 2021 - 2022 Fun Company, Inc</p>
   

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex" style="float:right;line-height: 60px;padding-right:20px;">
      <li class="ms-3"><a class="text-muted" href="https://www.instagram.com/fun_agel/?hl=ru" target="_blank"><img src="/logo/instagram_logo.png" width="24" height="24"> </a></li>
      <li class="ms-3"><a class="text-muted" href="https://vk.com/artem_yrchenko" target="_blank"><img src="/logo/vk_logo.png" width="24" height="24"></a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.linkedin.com/in/%D0%B0%D1%80%D1%82%D1%91%D0%BC-%D1%8E%D1%80%D1%87%D0%B5%D0%BD%D0%BA%D0%BE-553308220/" target="_blank"><img src="/logo/linkedin_logo.png" width="24" height="24"></a></li>
    </ul>
  </footer>
  
</html>