<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/8.5.21/mmenu.js"
    integrity="sha512-lIylIwmEOkr7tetP4IsQcCwAQc7CXNFyVh/dqTSlJwnNGZrlSnF6p9o5oTNQ87jJNylT8zjeiAvniMBuAHzqTg=="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-176760551-1"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script src="{{ asset('assets/user/bootstrap/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/user/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/user/bootstrap/js/bootstrap-4.2.1.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

@routes

 <script>
     window.dataLayer = window.dataLayer || [];

     function gtag() {
         dataLayer.push(arguments);
     }
     gtag('js', new Date());

     gtag('config', 'UA-176760551-1');

 </script>

 <script async src="https://www.googletagmanager.com/gtag/js?id=UA-16857273-19"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-16857273-19');

    </script>
<!--Start of Tawk.to Script-->
@auth
@else
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5f42a3761e7ade5df4433a51/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
@endauth
<!--End of Tawk.to Script-->

<!--  Main JS Entry file -->
<script src="{{ asset('js/treeview.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<!-- LiveWire Script -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
@livewireScripts

<script>
    window.addEventListener("load", function(){
        window.cookieconsent.initialise({
            "palette": {
                "popup": {
                    "background": "#03211d"
                },
                "button": {
                    "background": "#33A695"
                }
            },
            "theme": "classic",
            "content": {
                "message": "We use cookies to ensure the best experience on our website. If you continue to use this site we will assume that you are okey with it.",
                "href": "https://b2bwood.com/page/5"
            }
        })});
</script>